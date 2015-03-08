@extends('layout.master')

@section('content')
    <h1>Messages</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="conversations__left">
                @include('conversations.partials.sidebar')
            </div>
        </div>
    </div>
@endsection