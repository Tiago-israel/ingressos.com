@extends('layouts.app');
@section('content')
    <ul>
        <li>{!! $customer->name !!}</li>
        <li>{!! $customer->cpf !!}</li>
        <li>{!! $customer->date_of_birth !!}</li>
    </ul>
@stop