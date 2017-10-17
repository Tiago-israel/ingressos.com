@extends('layouts.app')
@section('content')
    <h1>Categorias</h1>
    <p class="lead"><a href="{{route('categories.create')}}">Adicionar nova</a></p>
    <hr>
    <div class="table-responsive">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nome</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{!! $category->name !!}</td>
                    <td><a href="{{route('categories.show',$category)}}">detalhes</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
