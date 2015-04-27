@extends('layout.start')


@section('content')
<div class="signup">

    <h1 class="text-center">
        <img src="/images/logo.svg" alt="Bealeet - Takes gaming to a whole new level" />
    </h1>

    {{ Form::open(array('route' => 'user.store', 'class' => 'bealeet-form') ) }}
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="bealeet-profile"></i>
            </div>
            {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control', 'required' => 'required']) }}
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="bealeet-mail"></i>
            </div>
            {{ Form::email('email', null, ['placeholder' => 'E-mail', 'class' => 'form-control', 'required' => 'required']) }}
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="bealeet-mail"></i>
            </div>
            {{ Form::email('email_confirmation', null, ['placeholder' => 'E-mail again', 'class' => 'form-control', 'required' => 'required']) }}
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="bealeet-lock"></i>
            </div>
            {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required']) }}
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="bealeet-lock"></i>
            </div>
            {{ Form::password('password_confirmation', ['placeholder' => 'Password again', 'class' => 'form-control', 'required' => 'required']) }}
        </div>
    </div>

    <!-- Register Input -->
    <div class="form-group">
        {{ Form::submit('Register', ['class' => 'btn btn-block btn-primary register-button']) }}
    </div>
    {{ Form::close() }}

    <div class="text-center signup__links">
        <a class="text-primary" href="{{ route('login') }}">Log in</a>
        -
        <a href="{{ route('forgot_password') }}">Forgot your password?</a>
    </div>

    <div class="text-center signup__bealeet">
        <a href="{{ route("what") }}">
            What's Be A Leet?
        </a>
    </div>

</div>
@stop