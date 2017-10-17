@extends('layouts.app')
@section('content')
    <h1>Locais</h1>
    <p class="lead"><a href="{{route('places.create')}}">Adicionar novo</a></p>
    <hr>
    <div class="table-responsive">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Número de assentos</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($places as $place)
                <tr>
                    <td>{!! $place->name !!}</td>
                    <td>{!! $place->number_of_seats !!}</td>
                    <td><a href="#">detalhes</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
