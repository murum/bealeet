@if ($user->isFollowedBy($currentUser))
    {{ Form::open(['method' => 'DELETE', 'route' => ['unfollow', $user->id]]) }}
        {{ Form::hidden('userIdToUnfollow', $user->id) }}
        <button type="submit" class="btn btn-lg btn-danger">
        <i class="fa fa-minus"></i>
        Unfollow {{ $user->username }}
        </button>
    {{ Form::close() }}
@else
    {{ Form::open(['route' => 'follow']) }}
        {{ Form::hidden('userIdToFollow', $user->id) }}
        <button type="submit" class="btn btn-lg btn-primary">
          <i class="fa fa-plus"></i>
          Follow {{ $user->username }}
        </button>
    {{ Form::close() }}
@endif