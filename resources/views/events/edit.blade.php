@extends('layouts.app')
@section('content')
    <h1>Editar Evento {{$event->name}}</h1>
    <p class="lead"><a href="{{route('events.index')}}">Voltar para a lista de eventos</a></p>
    <hr/>
    <div class="col-md-4">
        <div class="panel panel-default">
            <img class="img-responsive" src="{{$event->poster}}">
        </div>
    </div>
    <div class="col-md-4 ">
        {!! Form::model($event,['method'=>'PATCH','route'=>['events.update',$event]]) !!}
        <div class="form-group">
            {!! Form::label('name','Titulo',['class'=>'control-label'])!!}
            {!! Form::text('name',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('date','Data',['class'=>'control-label'])!!}
            {!! Form::date('date',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('schedule','Horário:',['class'=>'control-label'])!!}
            {!! Form::time('schedule',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('category','Categoria:',['class'=>'control-label'])!!}
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('poster','Poster:',['class'=>'control-label'])!!}
            {!! Form::file('poster',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('place','Local:',['class'=>'control-label'])!!}
            <select name="place_id" class="form-control">
                @foreach($places as $place)
                    <option value="{{$place->id}}">{{$place->name}}</option>
                @endforeach
            </select>
        </div>

        {!! Form::submit('Atualizar',['class'=>'btn btn-primary']) !!}
        {!! Form::close()!!}
    </div>

@stop