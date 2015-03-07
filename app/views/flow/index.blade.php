@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Flow</h1>

            <div class="row">
                @foreach($players as $player)
                    @include('players.partials.user')
                @endforeach
            </div>
        </div>
    </div>
@stop