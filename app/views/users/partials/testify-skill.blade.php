@if( $user->isNot($currentUser) && $currentUser->canAddSkillPoint($user, $skill->pivot->skill_id))
  {{ Form::open(['route' => ['add_skill_point', $user->id ] ]) }}
    <span class="btn btn-xs btn-primary btn-testify-skill">
      <i class="fa fa-plus"></i>
    </span>
  {{ Form::close() }}
@endif