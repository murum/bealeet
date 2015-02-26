@extends('layout.master')

@section('content')
    <h1>Conversations</h1>
    <div class="user-profile-box user-profile-box-conversations">
        <div class="user-profile-box-body">
            <ul class="row user-profile-conversations">
                @foreach( $conversations as $conversation )
                    @include('users.partials.profile.conversation')
                @endforeach
            </ul>
        </div>
    </div>
@endsection