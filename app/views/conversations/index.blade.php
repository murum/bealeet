@extends('layout.master')

@section('content')
    <h1>Conversations</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-3">
            {{ Form::open(['route' => 'conversations.store']) }}
                <div class="form-group">
                    {{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('Start a new conversation', ['class' =>'btn btn-block btn-success']) }}
                </div>
            {{ Form::close() }}
        </div>
        <div class="col-xs-12 col-sm-9">
            <div class="user-profile-box user-profile-box-conversations">
                <div class="user-profile-box-body">
                    <ul class="row list-group user-profile-conversations">
                        @foreach( $conversations as $conversation )
                            @include('users.partials.profile.conversation')
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection