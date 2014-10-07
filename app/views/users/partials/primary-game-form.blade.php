@if( $currentUser->hasMoreThanOneGame() )
  <div class="pull-left">
    <div class="user-profile-subheader-games-primary">
      {{ Form::open(['route' => 'primary_game']) }}
        {{ Form::label('game', 'Primary game') }}
        {{ Form::select('game', $currentUser->listUserGames(), $currentUser->favoriteGame()->id) }}
      {{ Form::close() }}
    </div>
  </div>
@endif