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
                <h2>Novo Evento</h2>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{route('events.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" name="name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Data:</label>
                        <input type="date" name="date" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Horário:</label>
                        <input type="time" name="schedule" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Categoria:</label>
                        <select name="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Poster:</label>
                        <input type="file" name="poster" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Local:</label>
                        <select name="place" class="form-control">
                            @foreach($places as $place)
                                <option value="{{$place->id}}">{{$place->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Salvar" class="btn btn-block btn-info"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
