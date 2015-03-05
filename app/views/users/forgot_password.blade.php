@extends('layout.start')

@section('content')

    <div class="forgot-password">
        <h1 class="text-center">
            <img src="/images/logo.svg" alt="Bealeet - Helps gamers to a whole new level"/>
        </h1>
        {{ Form::open(['route' => 'forgot_password']) }}
        <!-- Email Form Input -->
        <div class="form-group forgot-password__user">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="bealeet-mail"></i>
                </div>
                {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail',  'required' => 'required']) }}
            </div>
        </div>

        <!-- Sign In Input -->
        <div class="form-group">
            {{ Form::submit('Send new password', ['class' => 'btn btn-block btn-primary login-button']) }}
        </div>
        {{ Form::close() }}

        <div class="text-center forgot-password__links">
            <a class="text-primary" href="{{ route('register') }}">Sign up</a>
            -
            <a href="{{ route('login') }}">Log in</a>
        </div>

        <div class="text-center forgot-password__bealeet">
            <a href="#">
                What's Be A Leet?
            </a>
        </div>
    </div>

@stop