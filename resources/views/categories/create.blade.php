@extends('layouts.app')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2>Nova Categoria</h2>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{route('categories.store')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" name="name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Salvar" class="btn btn-block btn-info"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
