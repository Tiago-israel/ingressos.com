@extends('layouts.app')
@section('content')
    <h1>Assentos</h1>
    <h2>{{$event->name}}</h2>
    <p class="lead"><a href="{{route('events.index')}}">Voltar para a lista de eventos</a></p>
    <hr>
    <div class="table-responsive">
        <div class="panel panel-default">
            <div class="panel-body">
                @foreach($event->seats as $seat)
                    <div class="col-md-2" style="margin-bottom: 10px;">
                        <div class="{{ $seat->status == 'disponivel' ? ' alert-success' : 'alert-danger' }}">
                            <img src="/img/seat.svg" class="img-responsive center-block"/>
                            <p class="text-center">{{$seat->number}}</p>
                            <p class="text-center">{{$seat->status}}</p>
                            @if($seat->status == 'disponivel')
                                <form method="post" action="{{action('EventController@saveSeat')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="event" value="{{$event->id}}">
                                    <input type="hidden" name="seat" value="{{$seat->id}}">
                                    @if(Auth::user()->role->name == 'customer')
                                        <input type="submit" value="selecionar" style="border-radius: 0px;"
                                               class="btn btn-default btn-block"/>
                                    @endif
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
