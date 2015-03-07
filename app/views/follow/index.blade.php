@extends('layout.master')

@section('content')

  @if( $currentUser->isFollowingUsers() )
    <h1>Following</h1>

    <ul class="row following__players">
      @foreach($users as $user)
        @include('follow.partials.user')
      @endforeach
    </ul>

  @else
    <h1>You ain't following any users</h1>
  @endif

@stop