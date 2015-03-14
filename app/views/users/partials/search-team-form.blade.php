{{ Form::open(['route' => 'user_search_team']) }}
<input
        type="checkbox"
        name="user-profile-searching-switcher"
        id="user-profile-searching-switcher"
        class="user-profile-subheader-searching-switcher-item-checkbox"
@if( !$currentUser->searching_team )
        checked="checked"
        @endif
        >
<label
        class="user-profile-subheader-searching-switcher-item-label"
        for="user-profile-searching-switcher"
        >
</label>
{{ Form::close() }}