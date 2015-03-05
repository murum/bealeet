@if ($user->isFollowedBy($currentUser))
    {{ Form::open(['method' => 'DELETE', 'route' => ['unfollow', $user->id]]) }}
        {{ Form::hidden('userIdToUnfollow', $user->id) }}
        <button type="submit" class="button">
        <i class="fa fa-minus"></i> Unfollow
        </button>
    {{ Form::close() }}
@else
    {{ Form::open(['route' => 'follow']) }}
        {{ Form::hidden('userIdToFollow', $user->id) }}
        <button type="submit" class="button">
          <i class="fa fa-plus"></i> Follow
        </button>
    {{ Form::close() }}
@endif