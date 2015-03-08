@extends('layout.master')

@section('content')
    <h1>Conversations</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-5">
            <div class="conversations__left">
                @include('conversations.partials.sidebar')
            </div>
        </div>
        <div class="col-sm-7">
            <div class="conversations__right">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            {{ Form::open(['route' => ['conversation.add_user', $conversation->id]]) }}
                            <div class="col-xs-5">
                                <div class="form-group">
                                    {{ Form::text('username', null, ['placeholder' => 'Username...', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    {{ Form::submit('Add user', ['class' => 'btn btn-block btn-sm btn-success']) }}
                                </div>
                            </div>

                            {{ Form::close() }}
                            <div class="col-xs-4">
                                <div class="form-group">
                                    {{ Form::open(['route' => ['conversation.leave', $conversation->id]]) }}
                                    <div class="form-group">
                                        {{ Form::submit('Leave conversation', ['class' => 'btn btn-block btn-sm btn-danger']) }}
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>

                        <ul class="conversation__users">
                            @foreach($conversation->users as $user)
                                @include('conversations.partials.user')
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            {{ Form::open(['route' => ['profile.conversation.post', $conversation->id]]) }}
                            <div class="col-xs-8">
                                <div class="form-group">
                                    {{ Form::textarea('message', null, ['placeholder' => 'Write your message...', 'class' => 'form-control']) }}
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="form-group">
                                    {{ Form::submit('Send', ['class' => 'btn btn-block btn-sm btn-primary']) }}
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>

                        <ul class="row conversation__messages">
                            @foreach($conversation->messages()->orderBy('created_at', 'DESC')->get() as $message)
                                @include('conversations.partials.message')
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection