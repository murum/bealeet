@extends('layout.master')

@section('content')
  <div class="user-profile">
    @if( $currentUser->hasAFavoriteGame() )
      <div class="user-profile-header user-profile-header-{{ $currentUser->favoriteGame()->slug }}">
    @else
      <div class="user-profile-header">
    @endif
      <div class="pull-left user-profile-header-gravatar">
        <img class="user-profile-header-gravatar-image" src="{{ $currentUser->present()->gravatar(75) }}" alt="{{ $currentUser->username }}">
      </div>
      <div class="pull-left user-profile-header-title">
        <h1 class="user-profile-header-title-username">
          {{{ $currentUser->username }}}
        </h1>
        <h2 class="user-profile-header-title-clan">
          Clan name / Searching for clan
        </h2>
      </div>
    </div>

    <div class="modal-box user-profile-subheader">
      <div class="row">
        <div class="col-xs-12">
          <div class="pull-left">
            <div class="user-profile-subheader-games">
              @include('users.partials.primary-game-form')
              @include('users.partials.add-game-form')
            </div>
          </div>
          <div class="pull-right">
            <div class="user-profile-subheader-searching">
              <div class="pull-right user-profile-subheader-searching-switcher">
                @include('users.partials.search-team-form')
              </div>
              <h3 class="pull-right user-profile-subheader-searching-title">Searching for clan / team</h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="equal-height-wrapper">
      <div class="equal-height-row">
        <div class="row">
          <div class="col-xs-12 col-sm-6 equal-height-col modal-box">
            <div class="user-profile-box user-profile-box-overview">
              <div class="user-profile-box-header">
                <h2>Profile overview</h2>
              </div>

              <div class="user-profile-box-body">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
                    <table class="table">
                      <tr class="user-profile-row user-profile-row-age">
                        <td class="user-profile-row-header">Age:</td>
                        <td>16</td>
                      </tr>
                      <tr class="user-profile-row user-profile-row-age">
                        <td class="user-profile-row-header">Location:</td>
                        <td>Sweden</td>
                      </tr>
                      <tr class="user-profile-row user-profile-row-age">
                        <td class="user-profile-row-header">Rank:</td>
                        <td>High skilled</td>
                      </tr>
                      <tr class="user-profile-row user-profile-row-age">
                        <td class="user-profile-row-header">Rating:</td>
                        <td>Pleasant</td>
                      </tr>

                      <tr class="user-profile-row user-profile-row-age">
                        <td class="user-profile-row-header">Looking for:</td>
                        <td>Clan</td>
                      </tr>
                    </table>
                  </div>
                </div>

                <h3>Description:</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 equal-height-col modal-box">
            <div class="user-profile-box user-profile-box-messages">
              <div class="user-profile-box-header">
                <h2>Messages</h2>
              </div>

              <div class="user-profile-box-body">
                <ul class="row user-profile-messages">
                  @foreach( $currentUser->getUnreadRecievedMessages(3) as $message )
                    @include('users.partials.profile.recieved-message')
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="spacer-15"></div>

    <div class="equal-height-wrapper">
      <div class="equal-height-row">
        <div class="row">
          <div class="col-xs-12 col-sm-6 equal-height-col modal-box">
            <div class="user-profile-box user-profile-box-skills">
              <div class="user-profile-box-header">
                <h2>Skills</h2>
              </div>

              <div class="user-profile-box-body">
                @if( $currentUser->hasSkills() )
                  <ul class="user-profile-skills">
                    @foreach($currentUser->groupedSkills() as $skill)
                        <li data-amount="{{{ $skill->count - 1 }}}" class="user-profile-skills-item plusable">
                        {{{ $skill->name }}}
                      </li>
                    @endforeach
                  </ul>
                @else
                  <h3>You've still not added any skills</h3>
                @endif

                @include('users.partials.add-skill-form')

              </div>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 equal-height-col modal-box">
            <div class="user-profile-box user-profile-box-teamhistory">
              <div class="user-profile-box-header">
                <h2>Team history</h2>
              </div>

              <div class="user-profile-box-body">
                <ul class="row user-profile-teams">
                  <li class="col-xs-12 user-profile-teams-item">
                    <div class="pull-left user-profile-teams-item-image">
                      <img src="{{ $currentUser->present()->gravatar(60) }}" />
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
                      <img src="{{ $currentUser->present()->gravatar(60) }}" />
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
                      <img src="{{ $currentUser->present()->gravatar(60) }}" />
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
                      <img src="{{ $currentUser->present()->gravatar(60) }}" />
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop