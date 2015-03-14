<div class="user-profile-box user-profile-box-overview">
    <div class="user-profile-box-header">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="pull-left">Profile overview</h2>
            </div>
        </div>
    </div>

    <div class="user-profile-box-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="row form-group">
                    <div class="col-xs-3">
                        <img class="user-profile-header-gravatar-image img-round"
                             src="{{ $currentUser->present()->gravatar(75) }}"
                             alt="{{ $currentUser->username }}"
                        />
                    </div>
                    <div class="col-xs-9 user-profile-username">
                        {{ $currentUser->username }}
                    </div>
                </div>

                @if($currentUser->id === $user->id)
                    {{ Form::model($currentUser, ['route' => 'profile.update']) }}
                    {{ Form::token() }}

                    <div class="row form-group">
                        <div class="col-xs-6">
                            {{ Form::text('age', null, ['class' => 'form-control', 'placeholder' => 'Age']) }}
                        </div>
                        <div class="col-xs-6">
                            {{ Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Location']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description' ,'maxlength' => '512']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                    </div>
                    {{ Form::close() }}
                @else
                    <div class="table-responsive">
                        <table class="table">
                            @if( $user->hasAge() )
                                <tr class="user-profile-row user-profile-row-age">
                                    <td class="col-xs-4 user-profile-row-header">Age:</td>
                                    <td class="col-xs-8">{{$user->age}}</td>
                                </tr>
                            @endif

                            @if($user->hasLocation())
                                <tr class="user-profile-row user-profile-row-age">
                                    <td class="col-xs-4 user-profile-row-header">Location:</td>
                                    <td class="col-xs-8">{{$user->location}}</td>
                                </tr>
                            @endif

                            {{--
                            <tr class="user-profile-row user-profile-row-age">
                                <td class="user-profile-row-header">Rank:</td>
                                <td>High skilled</td>
                            </tr>
                            <tr class="user-profile-row user-profile-row-age">
                                <td class="user-profile-row-header">Rating:</td>
                                <td>Pleasant</td>
                            </tr>
                            --}}
                        </table>
                    </div>
                    @if( $user->hasDescription() )
                        <h3>Description:</h3>
                        <p>
                            {{{ $user->description }}}
                        </p>
                    @endif
                @endif
            </div>
        </div>

    </div>
</div>