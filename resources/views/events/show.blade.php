@extends('layouts.app')
@section('content')
    <h1>Detalhes</h1>
    <p class="lead"><a href="{{route('events.index')}}">Voltar para a lista de eventos</a></p>
    <div class="col-md-12">
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
                    @if(Auth::user()->role->name == 'admin')
                    <a class="btn btn-info" href="{{route('events.edit',$event)}}">Editar</a>
                    <div class="pull-right">
                        {!! Form::open(['method'=>'DELETE','route'=>['events.destroy',$event]]) !!}
                        {!! Form::submit('Excluir',['class'=>'btn btn-danger'])!!}
                        {!! Form::close() !!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

