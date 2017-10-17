@extends('layouts.app')
@section('content')
    <h1>Editar Categoria {{$category->name}}</h1>
    <p class="lead"><a href="{{route('categories.index')}}">Voltar para a lista de categorias</a></p>
    <div class="col-md-4 ">
        {!! Form::model($category,['method'=>'PATCH','route'=>['categories.update',$category]]) !!}
        <div class="form-group">
            {!! Form::label('name','Nome',['class'=>'control-label'])!!}
            {!! Form::text('name',null,['class'=>'form-control'])!!}
        </div>
        {!! Form::submit('Atualizar',['class'=>'btn btn-primary']) !!}
        {!! Form::close()!!}
    </div>

@stop