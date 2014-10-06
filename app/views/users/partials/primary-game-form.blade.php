@if( $currentUser->hasMoreThanOneGame() )
  {{ Form::open(['route' => 'primary_game']) }}
    {{ Form::label('game') }}
  {{ Form::close() }}
@endif