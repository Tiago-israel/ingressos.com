@extends('layouts.app')
@section('content')
    <h1>Meus Ingressos</h1>
    @if(isset($message))
        <p class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{$message}}
        </p>
    @endif
    @foreach($tickets as $ticket)
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3>{!!$ticket->event->name!!}</h3>
                </div>
                <div class="panel-body">
                    <div class="">
                        <img style="width: 400px;height: 400px;" src="{!! $ticket->event->poster !!}"
                             class="img-responsive"/>
                    </div>
                    <hr/>
                    <ul>
                        <li><b>Categoria:</b>{{$ticket->event->category->name}}</li>
                        <li><b>Data:</b> {{$ticket->event->date}}</li>
                        <li><b>Horário:</b>{{$ticket->event->schedule}}</li>
                        <li><b>Local:</b>{{$ticket->event->place->name}}</li>
                        <li><b>Assento:</b>{{$ticket->seat->number}}</li>
                    </ul>
                    <a href="{{action('UserController@returnTicket',$ticket->id)}}" class="btn btn-danger pull-right">Devolver</a>
                </div>
            </div>
        </div>
        @endforeach
        </div>
@stop

