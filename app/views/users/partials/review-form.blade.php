{{ Form::open( ['route' => [ 'post_review', $user->id ] ] ) }}
  <div class="form-group">
    {{ Form::label('review', 'Leave a review of this player', ['class' => 'control-label']) }}
    {{ Form::textarea('review', null, ['placeholder' => 'Your review', 'class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::submit('Post Review', ['class' => 'pull-right btn btn-lg btn-info-outline']) }}
  </div>
{{ Form::close() }}