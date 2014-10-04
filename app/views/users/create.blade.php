@extends('layout.master')


@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-offset-4 col-sm-4">
    @if($errors->any())
    <div class="modal-box"> <!-- sign up form -->
    @else
    <div class="modal-box auth-box"> <!-- sign up form -->
    @endif
      <h1>Register an Bealeet account</h1>
      {{ Form::open(array('route' => 'user.store', 'class' => 'bealeet-form') ) }}
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control', 'required' => 'required']) }}
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-envelope"></i>
            </div>
            {{ Form::email('email', null, ['placeholder' => 'E-mail', 'class' => 'form-control', 'required' => 'required']) }}
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-envelope"></i>
            </div>
            {{ Form::email('email_confirmation', null, ['placeholder' => 'E-mail confirmation', 'class' => 'form-control', 'required' => 'required']) }}
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-key"></i>
            </div>
            {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required']) }}
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-key"></i>
            </div>
            {{ Form::password('password_confirmation', ['placeholder' => 'Password Confirmation', 'class' => 'form-control', 'required' => 'required']) }}
          </div>
        </div>

        <!-- Register Input -->
        <div class="form-group">
          {{ Form::submit('Register', ['class' => 'btn btn-lg btn-block btn-info login-button']) }}
        </div>
      {{ Form::close() }}

      <!-- <a href="#0" class="bealeet-close-form">Close</a> -->
    </div> <!-- bealeet-signup -->
  </div>
</div>
@stop