<div class="row">
    {{ Form::open(['route' => 'conversations.store']) }}
    <div class="col-xs-8">
        <div class="form-group">
            {{ Form::text('conversation', null, ['placeholder' => 'Chat group name', 'class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group">
            {{ Form::submit('Create', ['class' =>'btn btn-block btn-primary']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>

<ul class="list-unstyled conversations">
    @foreach( $conversations as $conversation )
        @include('conversations.partials.conversation')
    @endforeach
</ul>