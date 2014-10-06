@extends('layout.master')

@section('content')
  <div class="user-profile">
    @if( $currentUser->hasAFavoriteGame() )
      <div class="user-profile-header user-profile-header-{{ $currentUser->favoriteGame()->slug }}">
    @else
      <div class="user-profile-header">
    @endif
      <div class="pull-left user-profile-header-gravatar">
        <img class="user-profile-header-gravatar-image" src="{{ $currentUser->present()->gravatar(75) }}" alt="{{ $currentUser->username }}">
      </div>
      <div class="pull-left user-profile-header-title">
        <h1 class="user-profile-header-title-username">
          {{{ $currentUser->username }}}
        </h1>
        <h2 class="user-profile-header-title-clan">
          Clan name / Searching for clan
        </h2>
      </div>
    </div>
    <div class="modal-box user-profile-subheader">
      <div class="row">
        <div class="col-xs-12">
          <div class="pull-left">
            <div class="user-profile-subheader-games">
              <div class="user-profile-subheader-games-primary">
                @include('users.partials.primary-game-form')
                @include('users.partials.add-game-form')
              </div>
            </div>
          </div>
          <div class="pull-right">
            <div class="user-profile-subheader-searching"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="user-profile-footer">
      <a class="btn btn-lg btn-info" href="{{{ route('user_edit', ['id' => $currentUser->id]) }}}">
        <i class="fa fa-edit"></i>
        Edit profile
      </a>
    </div>
  </div>
@stop