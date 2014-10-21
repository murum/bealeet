<div class="user-profile-skills-add">
  <div class="row">
    <div class="col-xs-12">
      <button class="btn btn-primary user-profile-skills-add-button user-profile-skills-add-button-open">
        <i class="fa fa-wrench"></i>
        Handle skills
      </button>

      <button class="btn btn-danger user-profile-skills-add-button user-profile-skills-add-button-close">
        <i class="fa fa-close"></i>
        Close
      </button>

      <div class="dropdown">
        {{ Form::open(['route' => 'add_skills']) }}
          {{ Form::label('add_skill', 'Handle skills') }}
          {{ Form::select('add_skill', $currentUser->listSkills(), $currentUser->listUserSkillsId(), ['multiple' => 'multiple', 'class' => 'form-control chosen-list', 'data-placeholder' => 'Choose a skill'] ) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>