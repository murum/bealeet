@extends('layout.master_sidebar')

@section('sidebar')
    <div class="filter">
        <h2>
            <i class="fa fa-filter"></i>
            Filter
        </h2>
        @include('players.partials.players-filter')
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1>Find Players</h1>

            <div class="row">
                @foreach($players as $player)
                    @include('players.partials.user')
                @endforeach
            </div>
        </div>
    </div>
@stop