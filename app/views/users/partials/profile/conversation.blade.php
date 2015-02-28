<li class="list-group-item {{ $conversation->present()->readClass() }}">
  <a href="{{ route('profile.conversations.show', $conversation->id) }}">
    <h3>{{ $conversation->name }}</h3>
  </a>
</li>