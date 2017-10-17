<?php

namespace App\Http\Controllers;

use App\Model\Event;
use App\Model\Category;
use App\Model\Place;
use App\Model\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Input;
use \Illuminate\Support\Facades\File;
use App\Http\Requests\EventRequest;
use App\Model\Seat;

class EventController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $event;

    function __construct(Event $event)
    {
        $this->event = $event;
        $this->middleware('admin:admin', ['only' => ['create', 'edit', 'totalOfTicketsEvent']]);
        $this->middleware('auth');
    }

    public function pathCover(Request $request)
    {
        $poster = Input::file('poster');
        $extensao = $poster->getClientOriginalExtension();
        $name = $poster->getClientOriginalName();
        $path = '/poster/' . $name . '.' . $extensao;
        File::move($poster, public_path() . $path);
        return $path;
    }

    public function index()
    {
        if (Auth::user()->role->name == 'admin') {
            $this->event = Event::all();
            return view('events.index')->withEvents($this->event);
        }
        $this->event = Event::where('date', '>=', date('y-m-d'))->get();
        return view('events.index')->withEvents($this->event);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $places = Place::all();
        return view('events.create')->with(["categories" => $categories, "places" => $places]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $this->event->fill($request->except('poster'));
        $this->event->category_id = $request->input('category');
        $this->event->place_id = $request->input('place');
        $this->event->poster = $this->pathCover($request);
        $this->event->save();
        $this->event = Event::where('name', '=', $request->input('name'))->first();
        $total = $this->event->place->number_of_seats;
        for ($i = 1; $i <= $total; $i++) {
            $seat = new Seat();
            $seat->place_id = $this->event->place->id;
            $seat->event_id = $this->event->id;
            $seat->status = "disponivel";
            $seat->number = $i;
            $seat->save();
        }
        return redirect()->route('events.index');
    }


    public function show(Event $event)
    {
        return view('events.show')->withEvent($event);
    }


    public function edit(Event $event)
    {
        $categories = Category::all();
        $places = Place::all();
        return view('events.edit')->with(["categories" => $categories, "places" => $places, "event" => $event]);
    }


    public function update(Request $request, Event $event)
    {
        $event->fill($request->except('poster'));
        if ($request->input('poster') != null) {
            $event->poster = $this->pathCover($request);
        }
        $event->save();
        return redirect()->route('events.index');
    }

    public function seats($id)
    {
        $event = Event::find($id);
        return view('seats.seats')->withEvent($event);
    }

    public function saveSeat(Request $request)
    {
        if (count(Ticket::where('user_id', '=', Auth::user()->id)->where('event_id', '=', $request->input('event'))->get()) == 0) {
            $this->event = Event::find($request->input('event'));
            $seat = Seat::find($request->input('seat'));
            $array = ['user_id' => Auth::user()->id, 'seat_id' => $seat->id, 'event_id' => $this->event->id];
            Ticket::create($array);
            Seat::where('id', $seat->id)->update(['status' => 'ocupado']);
            return view('auth.myTickets')->withTickets(Auth::user()->tickets);
        }else{
            $message = "Você já possui um bilhete para este evento!";
            return view('auth.myTickets')->withTickets(Auth::user()->tickets)->withMessage($message);
        }
    }


    public function findByName(Request $request)
    {
        $name = $request->only('name');
        $data = Event::where('name', 'like', '%' . $name['name'] . '%')->get();
        return view('events.index')->withEvents($data);

    }

    public function sortByCategory()
    {
        //$this->event = Event::where('date','>',date('y-m-d'))->orderBy('category_id')->get();
        $this->event = Event::join('categories', 'events.category_id', '=', 'categories.id')->orderBy('categories.name')->get();
        $this->event;
        return view('events.index')->withEvents($this->event);
    }

    public function sortByDate()
    {
        $this->event = Event::where('date', '>', date('y-m-d'))->orderBy('date', 'asc')->get();
        return view('events.index')->withEvents($this->event);
    }

    public function totalOfTicketsEvent()
    {
        $this->event = Event::all();
        return view('events.ticket')->withEvents($this->event);
    }


    public function destroy(Event $event)
    {
        Event::destroy($event->id);
        return redirect()->route('events.index');
    }

}
