@extends('layouts.app')
@section('content')
    <h1>Detalhes</h1>
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3>{!!$category->name!!}</h3>
                </div>
                <div class="panel-body">
                    <ul>
                        <li><b>Nome:</b>{{$category->name}}</li>
                    </ul>
                    @if(Auth::user()->role->name == 'admin')
                        <a class="btn btn-info" href="{{route('categories.edit',$category)}}">Editar</a>
                        <div class="pull-right">
                            {!! Form::open(['method'=>'DELETE','route'=>['categories.destroy',$category]]) !!}
                            {!! Form::submit('Excluir',['class'=>'btn btn-danger'])!!}
                            {!! Form::close() !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

