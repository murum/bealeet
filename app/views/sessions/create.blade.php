@extends('layout.master')

@section('content')

<div class="row">
  <div class="col-xs-12 col-sm-4 col-sm-offset-4">
    @if($errors->any())
    <div class="modal-box"> <!-- sign up form -->
    @else
    <div class="modal-box signin-box"> <!-- sign up form -->
    @endif
      <h1>Sign in!</h1>
      {{ Form::open(['route' => 'login']) }}
        <!-- Email Form Input -->
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail',  'required' => 'required']) }}
          </div>
        </div>

        <!-- Password Form Input -->
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-key"></i>
            </div>
            {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required']) }}
          </div>
        </div>

        <!-- Sign In Input -->
        <div class="form-group">
          {{ Form::submit('Sign In', ['class' => 'btn btn-lg btn-block btn-info login-button']) }}
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@stop