@if ($user->isFollowedBy($currentUser))
    {{ Form::open(['method' => 'DELETE', 'route' => ['unfollow', $user->id]]) }}
        {{ Form::hidden('userIdToUnfollow', $user->id) }}
        <button type="submit" class="btn btn-danger">
        Unfollow
        </button>
    {{ Form::close() }}
@else
    {{ Form::open(['route' => 'follow']) }}
        {{ Form::hidden('userIdToFollow', $user->id) }}
        <button type="submit" class="btn btn-primary">
          Follow
        </button>
    {{ Form::close() }}
@endif