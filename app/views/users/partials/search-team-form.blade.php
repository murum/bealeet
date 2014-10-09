{{ Form::open(['route' => 'user_search_team']) }}
<div class="user-profile-subheader-searching-switcher-item">
    <input
      type="checkbox"
      name="user-profile-searching-switcher"
      id="user-profile-searching-switcher"
      class="user-profile-subheader-searching-switcher-item-checkbox"
      @if( !$currentUser->searching_team )
        checked
      @endif
    >
    <label
      class="user-profile-subheader-searching-switcher-item-label"
      for="user-profile-searching-switcher"
    >
        <span class="user-profile-subheader-searching-switcher-item-inner"></span>
        <span class="user-profile-subheader-searching-switcher-item-switch"></span>
    </label>
</div>
{{ Form::close() }}