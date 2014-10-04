@extends('layout.master')

@section('content')
  <div class="user-profile">
    <h1>
      User profile - {{{ $user->username }}}
    </h1>
    <div class="user-profile-footer">
      @if( $currentUser->is($user) )
        <a class="btn btn-lg btn-info" href="{{{ route('user_edit', ['id' => $user->id]) }}}">
          <i class="fa fa-edit"></i>
          Edit profile
        </a>
      @endif

      @unless( $currentUser->is($user))
        @include('users.partials.follow-form')
      @endif
    </div>
  </div>
@stop