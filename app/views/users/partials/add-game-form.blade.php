<div class="pull-left">
  <div class="user-profile-subheader-games-add">
    <button class="btn btn-primary user-profile-subheader-games-add-button user-profile-subheader-games-add-button-open">
      <i class="fa fa-plus"></i>
      Add Games
    </button>

    <button class="btn btn-danger user-profile-subheader-games-add-button user-profile-subheader-games-add-button-close">
      <i class="fa fa-close"></i>
      Close
    </button>

    <div class="dropdown">
      {{ Form::open(['route' => 'change_games']) }}
        {{ Form::label('add_game', 'Add Game') }}
        {{ Form::select('add_game', $currentUser->listGames(), $currentUser->listUserGamesId(), ['multiple' => 'multiple', 'class' => 'form-control chosen-list', 'data-placeholder' => 'Choose a game'] ) }}
      {{ Form::close() }}
    </div>
  </div>
</div>