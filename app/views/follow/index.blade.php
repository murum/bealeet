@extends('layout.master')

@section('content')

  @if( $currentUser->isFollowingUsers() )
    <h1>Follows</h1>

    <div class="list-group">
      @foreach($follows as $follow)
        <a class="list-group-item" href="{{ route('user_profile', $follow->id) }}">
          {{{ $follow->username }}}
        </a>
      @endforeach
    </div>
  @endif

  @unless( $currentUser->isFollowingUsers() )
    <h1>You ain't following any users</h1>
  @endif

@stop