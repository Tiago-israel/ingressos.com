@extends('layouts.app')
@section('content')
    <h1>Clientes</h1>
    <p class="lead"><a href="{{action('UserController@create')}}">Adicionar novo</a></p>
    <hr>
    <div class="table-responsive">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
