@extends('layouts.app')
@section('content')
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Evento</th>
                    <th>Bilhetes retirados</th>
                    <th>Assentos disponíveis</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{$event->name}}</td>
                        <td>{{count($event->tickets)}}</td>
                        <td>{{$event->seats->where('status','disponivel')->count()}}</td>
                        <td><a href="{{route('events.show',$event)}}">Detalhes</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@stop
