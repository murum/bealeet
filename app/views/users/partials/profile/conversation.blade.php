<li class="col-xs-12 user-profile-messages-item {{ $conversation->present()->readClass() }}">
  <div class="col-sm-6 user-profile-messages-item-message">
    <h3>{{ $conversation->name }}</h3>
  </div>
  <div class="pull-right user-profile-messages-item-button">
      <a href="{{ route('profile.conversations.show', $conversation->id) }}" class="btn btn-info-outline">View conversation</a>
  </div>
</li>