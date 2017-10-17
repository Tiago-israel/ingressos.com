<?php

namespace App\Http\Controllers;

use App\Model\Event;
use App\Model\Ticket;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Seat;
use App\User;


class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $users = User::where('role_id', '=', '2')->get();
        return view('customers.index')->withUsers($users);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $users = User::where('role_id', '=', '2')->get();
        return view('customers.index')->withUsers($users);
    }

    public function myTickets()
    {
        return view('auth.myTickets')->withTickets(Auth::user()->tickets);
    }

    public function returnTicket($id)
    {
        $ticket = Ticket::find($id);
        $teste = $this->calcularData($ticket);
        if ($teste >= 14) {
            Seat::where('id', $ticket->seat->id)->update(['status' => 'disponivel']);
            Ticket::destroy($id);
            return view('auth.myTickets')->withTickets(Auth::user()->tickets);
        } else {
            $message = "O período de devolução é de duas semanas";
            return view('auth.myTickets')->withTickets(Auth::user()->tickets)->withMessage($message);
        }

    }

    private function calcularData(Ticket $ticket)
    {
        $data1 = new \DateTime($ticket->event->date);
        $data2 = new \DateTime(date('y-m-d'));
        $intervalo = $data1->diff($data2);
        return $intervalo->days;
    }
}
