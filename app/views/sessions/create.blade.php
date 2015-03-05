@extends('layout.start')

@section('content')

<div class="login">
    <h1 class="text-center">
        <img src="/images/logo.svg" alt="Bealeet - Helps gamers to a whole new level"/>
    </h1>
    {{ Form::open(['route' => 'login']) }}
    <!-- Email Form Input -->
    <div class="form-group login__user">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="bealeet-profile"></i>
            </div>
            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail',  'required' => 'required']) }}
        </div>
    </div>

    <!-- Password Form Input -->
    <div class="form-group login__password">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="bealeet-lock"></i>
            </div>
            {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required']) }}
        </div>
    </div>

    <!-- Sign In Input -->
    <div class="form-group">
        {{ Form::submit('Log In', ['class' => 'btn btn-block btn-primary login-button']) }}
    </div>
    {{ Form::close() }}

    <div class="text-center login__links">
        <a class="text-primary" href="{{ route('register') }}">Sign up</a>
        -
        <a href="{{ route('forgot_password') }}">Forgot your password?</a>
    </div>

    <div class="text-center login__bealeet">
        <a href="#">
            What's Be A Leet?
        </a>
    </div>
</div>

@stop