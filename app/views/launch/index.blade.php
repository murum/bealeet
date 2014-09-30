@extends('layout.landing')

@section('content')
  <div class="row row-margin">
    <div class="col-xs-12 col-sm-4 logo">
      <img src="/images/launch_logo.png" />
    </div>
    <div class="col-xs-12 col-sm-8 content">
      <h1>It's time to take gaming seriously</h1>
      <p>
        We are currently building the easiest solution to search for other players and teams in any game. Counter Strike Global Offensive and Dota 2 will be the first two games that we will focus on.
      </p>
      <p>
        We want to help you find the right people for your team and match you with other players in your region and skill.
      </p>

      {{ Form::open(['route' => 'launch']) }}
        <h2>Want to be updated with our latest news?</h2>
        <div class="input-group">
          {{ Form::text('email', null, ['placeholder' => 'Enter your mail', 'class' => 'form-control']) }}
          <span class="input-group-btn">
            {{ Form::submit('Update me', ['class' => 'btn btn-info']) }}
          </span>
        </div><!-- /input-group -->
      {{ Form::close() }}
    </div>
  </div>

  @include('partials/_flash')
  @include('partials/_errors')
@stop