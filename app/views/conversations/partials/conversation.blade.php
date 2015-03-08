<li class="conversation {{ $conversation->present()->readClass() }}">
    <a href="{{ route('profile.conversations.show', $conversation->id) }}">
        @if( $conversation->hasMessages() )
            <img class="pull-left conversation__image" src="{{ $conversation->present()->lastActiveGravatar() }}" alt="" />
        @endif
        <span class="conversation__name">
            {{ $conversation->name }}
        </span>
        @if( $conversation->hasMessages() )
            <span class="conversation__last pull-right">
                Last active
                <span class="conversation__last__time" data-time="{{ $conversation->present()->lastActiveTime() }}"></span>
            </span>
        @endif
    </a>
</li>