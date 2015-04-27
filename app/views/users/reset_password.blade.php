@extends('layout.start')

@section('content')

    <div class="reset-password">
        <h1 class="text-center">
            <img src="/images/logo.svg" alt="Bealeet - Helps gamers to a whole new level"/>
        </h1>
        {{ Form::open(['route' => ['password.reset', $token]]) }}

        <!-- Password Input -->
        <div class="form-group reset-password__user">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="bealeet-lock"></i>
                </div>
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password',  'required' => 'required']) }}
            </div>
        </div>

        <!-- Password Input -->
        <div class="form-group reset-password__user">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="bealeet-lock"></i>
                </div>
                {{ Form::password('password confirmation', ['class' => 'form-control', 'placeholder' => 'Password again',  'required' => 'required']) }}
            </div>
        </div>

        <!-- Sign In Input -->
        <div class="form-group">
            {{ Form::submit('Reset password', ['class' => 'btn btn-block btn-primary login-button']) }}
        </div>
        {{ Form::close() }}

        <div class="text-center reset-password__links">
            <a class="text-primary" href="{{ route('register') }}">Sign up</a>
            -
            <a href="{{ route('login') }}">Log in</a>
        </div>

        <div class="text-center reset-password__bealeet">
            <a href="{{ route("what") }}">
                What's Be A Leet?
            </a>
        </div>
    </div>

@stop