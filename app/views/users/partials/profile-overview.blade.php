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
                @if($currentUser->id === $user->id)
                    {{ Form::model($currentUser, ['route' => 'profile.update']) }}
                    {{ Form::token() }}
                    <div class="form-group">
                        {{ Form::label('Age:') }}
                        {{ Form::text('age', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Location:') }}
                        {{ Form::text('location', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Description:') }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'maxlength' => '512']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Done', ['class' => 'btn btn-info-outline']) }}
                    </div>
                    {{ Form::close() }}
                @else
                    <div class="table-responsive">
                        <table class="table">
                            @if( $user->hasAge() )
                                <tr class="user-profile-row user-profile-row-age">
                                    <td class="user-profile-row-header">Age:</td>
                                    <td>{{$user->age}}</td>
                                </tr>
                            @endif

                            @if($user->hasLocation())
                                <tr class="user-profile-row user-profile-row-age">
                                    <td class="user-profile-row-header">Location:</td>
                                    <td>{{$user->location}}</td>
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