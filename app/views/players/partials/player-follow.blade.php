@if ($player->isFollowedBy($currentUser))
    {{ Form::open(['method' => 'DELETE', 'route' => ['unfollow', $player->id]]) }}
    {{ Form::hidden('userIdToUnfollow', $player->id) }}
    <button type="submit" class="btn block btn-danger-outline">
        Unfollow
    </button>
    {{ Form::close() }}
@else
    {{ Form::open(['route' => 'follow']) }}
    {{ Form::hidden('userIdToFollow', $player->id) }}
    <button type="submit" class="btn btn-block btn-primary-outline">
        Follow
    </button>
    {{ Form::close() }}
@endif