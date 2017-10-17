@extends('layouts.app')
@section('content')
    <h1>Eventos</h1>
    @if(Auth::user()->role->name == 'admin')
    <p class="lead"><a href="{{route('events.create')}}">Adicionar novo</a></p>
    @endif
    Classificar:
    <a href="{{action('EventController@sortByCategory')}}">categoria</a>|
    <a href="{{action('EventController@sortByDate')}}">data</a>
    <hr>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <form action="{{action('EventController@findByName')}}" method="post">
                    {{ csrf_field() }}
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label>Pesquisar por título:</label>
                            <input type="text" name="name" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <input type="submit" value="buscar" style="margin-top: 25px;" class="btn btn-success"/>
                    </div>
                </form>
            </div>
        </div>
        @foreach($events as $event)
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3>{!!$event->name!!}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="">
                            <img style="width: 400px;height: 400px;" src="{!! $event->poster !!}"
                                 class="img-responsive"/>
                        </div>
                        <hr/>
                        <ul>
                            <li><b>Categoria:</b>{{$event->category->name}}</li>
                            <li><b>Data:</b> {{$event->date}}</li>
                            <li><b>Horário:</b>{{$event->schedule}}</li>
                            <li><b>Local:</b>{{$event->place->name}}</li>
                        </ul>
                        <a href="{{action('EventController@seats',$event->id)}}" class="pull-left">visualizar assentos</a>
                        <a href="{{route('events.show',$event)}}" class="pull-right">Detalhes</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

