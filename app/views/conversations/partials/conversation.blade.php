<li class="conversation {{ $conversation->present()->readClass() }}">
    <a href="{{ route('profile.conversations.show', $conversation->id) }}">
        <img class="pull-left conversation__image" src="{{ $conversation->present()->lastActiveGravatar() }}" alt="" />
        <span class="conversation__name">
            {{ $conversation->name }}
        </span>
        <span class="conversation__last pull-right">
            Last active
            <span class="conversation__last__time" data-time="{{ $conversation->present()->lastActiveTime() }}"></span>
        </span>
    </a>
</li>