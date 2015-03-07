@extends('layout.master')

@section('content')
    <div class="user-profile">
        @if( $user->hasAFavoriteGame() )
            <div class="user-profile-header user-profile-header-{{ $user->favoriteGame()->slug }}">
        @else
            <div class="user-profile-header">
        @endif
                <div class="pull-left user-profile-header-gravatar">
                    <img class="user-profile-header-gravatar-image" src="{{ $user->present()->gravatar(75) }}"
                         alt="{{ $user->username }}">
                </div>
                <div class="pull-left user-profile-header-title">
                    <h1 class="user-profile-header-title-username">
                        {{{ $user->username }}}
                    </h1>

                    @if( $user->searching_team )
                        <h2 class="user-profile-header-title-clan">
                            Searching for clan
                        </h2>
                    @endif
                </div>
            </div>

                <div class="modal-box user-profile-subheader">
                    <div class="row">
                        <div class="col-xs-12">
                            @if( $user->hasAFavoriteGame() )
                                <div class="pull-left">
                                    <div class="user-profile-subheader-primary-game">
                                        Primary game {{ $user->favoriteGame()->name }}
                                    </div>
                                </div>
                            @endif
                            <div class="pull-right">
                                <div class="user-profile-subheader-toolbar">
                                    @include('users.partials.follow-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div data-match-height="upper-box" class="modal-box">
                            @include('users.partials.profile-overview')
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div data-match-height="upper-box" class="modal-box">
                            <div class="user-profile-box user-profile-box-skills">
                                <div class="user-profile-box-header">
                                    <h2>Skills</h2>
                                </div>

                                <div class="user-profile-box-body">
                                    @if( $user->hasSkills() )
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <ul class="user-profile-skills">
                                                    @foreach($user->groupedSkills() as $skill)
                                                        <li
                                                                data-skill="{{ $skill->pivot->skill_id }}"
                                                                data-amount="{{{ $skill->count - 1 }}}"
                                                                class="
                                                      user-profile-skills-item
                                                      @if( $currentUser->canAddSkillPoint($user, $skill->pivot->skill_id) )
                                                        plusable
                                                      @endif
                                                                        ">
                                                            {{{ $skill->name }}}
                                                            @include('users.partials.testify-skill')
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <h3>{{ $user->username }} has no available skills</h3>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="spacer-15"></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="modal-box">
                            <div class="user-profile-box user-profile-box-reviews">
                                <div class="user-profile-box-header">
                                    <h2>Reviews ({{ $user->getReviewsCount() }})</h2>
                                </div>

                                <div class="user-profile-box-body">
                                    <ul class="row user-profile-reviews">
                                        @foreach($user->getReviews() as $review)
                                            @include('users.partials.review')
                                        @endforeach
                                    </ul>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="user-profile-review-form">
                                                @include('users.partials.review-form')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="modal-box">
                            <div class="user-profile-box user-profile-box-teamhistory">
                                <div class="user-profile-box-header">
                                    <h2>Team history</h2>
                                </div>

                                <div class="user-profile-box-body">
                                    <h3>Coming soon</h3>
                                    <?php /*
                                    <ul class="row user-profile-teams">
                                        <li class="col-xs-12 user-profile-teams-item">
                                            <div class="pull-left user-profile-teams-item-image">
                                                <img src="{{ $user->present()->gravatar(60) }}"/>
                                            </div>
                                            <div class="col-sm-6 user-profile-teams-item-clan">
                                                <h3>Clan name</h3>

                                                <p>2014/07/08 - 2014/08/07</p>
                                            </div>
                                            <div class="pull-right user-profile-teams-item-button">
                                                <a class="btn btn-info-outline">View clan</a>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 user-profile-teams-item">
                                            <div class="pull-left user-profile-teams-item-image">
                                                <img src="{{ $user->present()->gravatar(60) }}"/>
                                            </div>
                                            <div class="col-sm-6 user-profile-teams-item-clan">
                                                <h3>Clan name</h3>

                                                <p>2014/07/08 - 2014/08/07</p>
                                            </div>
                                            <div class="pull-right user-profile-teams-item-button">
                                                <a class="btn btn-info-outline">View clan</a>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 user-profile-teams-item">
                                            <div class="pull-left user-profile-teams-item-image">
                                                <img src="{{ $user->present()->gravatar(60) }}"/>
                                            </div>
                                            <div class="col-sm-6 user-profile-teams-item-clan">
                                                <h3>Clan name</h3>

                                                <p>2014/07/08 - 2014/08/07</p>
                                            </div>
                                            <div class="pull-right user-profile-teams-item-button">
                                                <a class="btn btn-info-outline">View clan</a>
                                            </div>
                                        </li>

                                        <li class="col-xs-12 user-profile-teams-item">
                                            <div class="pull-left user-profile-teams-item-image">
                                                <img src="{{ $user->present()->gravatar(60) }}"/>
                                            </div>
                                            <div class="col-sm-6 user-profile-teams-item-clan">
                                                <h3>Clan name</h3>

                                                <p>2014/07/08 - 2014/08/07</p>
                                            </div>
                                            <div class="pull-right user-profile-teams-item-button">
                                                <a class="btn btn-info-outline">View clan</a>
                                            </div>
                                        </li>
                                    </ul>
                                    */ ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@stop