<li class="col-xs-12 user-profile-messages-item {{ $message->present()->readClass() }}">
  <div class="pull-left user-profile-messages-item-image">
    <img src="{{ $message->sender->present()->gravatar(60) }}" />
  </div>
  <div class="col-sm-6 user-profile-messages-item-message">
    <h3>{{ $message->sender->username }}</h3>
    <p> {{ $message->present()->getMessagePreview() }}</p>
  </div>
  <div class="pull-right user-profile-messages-item-button">
      <a class="btn btn-info-outline">View message</a>
  </div>
</li>