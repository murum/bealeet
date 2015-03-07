@extends('layout.master')

@section('content')

    @if( $currentUser->hasFollowers() )
        <h1>Followers</h1>

        <ul class="row following__players">
            @foreach($users as $user)
                @include('follow.partials.user')
            @endforeach
        </ul>
    @else
        <h1>You ain't followed by any user</h1>
    @endif

@stop