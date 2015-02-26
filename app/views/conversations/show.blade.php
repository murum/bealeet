@extends('layout.master')

@section('content')
    <h1>{{ $conversation->name }}</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-2">
            <ul class="conversation-users">
                <h2>
                    Users
                </h2>
                @foreach($conversation->users as $user)
                    @include('conversations.partials.user')
                @endforeach
            </ul>

            <h2>Add a user</h2>
            {{ Form::open(['route' => ['conversation.add_user', $conversation->id]]) }}

            <div class="form-group">
                {{ Form::text('username', null, ['placeholder' => 'Username...', 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Add user', ['class' => 'btn btn-sm btn-success']) }}
            </div>
            {{ Form::close() }}
        </div>
        <div class="col-xs-12 col-sm-10">
            <h2>Messages</h2>
            <ul class="row conversation-messages">
                @foreach($conversation->messages as $message)
                    @include('conversations.partials.message')
                @endforeach
            </ul>

            <h2>Write a new message</h2>
            {{ Form::open(['route' => ['profile.conversation.post', $conversation->id]]) }}

                <div class="form-group">
                    {{ Form::textarea('message', null, ['placeholder' => 'Write your message...', 'class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::submit('Send', ['class' => 'btn btn-sm btn-success']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection