@extends('layout.master')

@section('content')
  <div class="user-profile">
    @if( $user->hasAFavoriteGame() )
      <div class="user-profile-header user-profile-header-{{ $user->favoriteGame()->slug }}">
    @else
      <div class="user-profile-header">
    @endif
      <div class="pull-left user-profile-header-gravatar">
        <img class="user-profile-header-gravatar-image" src="{{ $user->present()->gravatar(75) }}" alt="{{ $user->username }}">
      </div>
      <div class="pull-left user-profile-header-title">
        <h1 class="user-profile-header-title-username">
          {{{ $user->username }}}
        </h1>
        <h2 class="user-profile-header-title-clan">
          Clan name / Searching for clan
        </h2>
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
            <div class="user-profile-box user-profile-box-skills">
              <div class="user-profile-box-header">
                <h2>Skills</h2>
              </div>

              <div class="user-profile-box-body">
                <ul class="user-profile-skills">
                  <li data-amount="2" class="user-profile-skills-item">Skill number 1</li>
                  <li data-amount="8" class="user-profile-skills-item">Skill number 1</li>
                  <li data-amount="93" class="user-profile-skills-item">Skill number 1</li><li data-amount="2" class="user-profile-skills-item">Skill number 1</li>
                  <li data-amount="10" class="user-profile-skills-item">Skill number 1</li><li data-amount="2" class="user-profile-skills-item">Skill number 1</li><li data-amount="2" class="user-profile-skills-item">Skill number 1</li><li data-amount="2" class="user-profile-skills-item">Skill number 1</li><li data-amount="2" class="user-profile-skills-item">Skill number 1</li>
                  <li data-amount="140" class="user-profile-skills-item">Skill number 1</li>
                  <li data-amount="1" class="user-profile-skills-item">Skill number 40</li>
                  <li data-amount="0" class="user-profile-skills-item">Skill number 1</li><li data-amount="2" class="user-profile-skills-item">Skill number 1</li>
                  <li data-amount="0" class="user-profile-skills-item">Skill number 1</li>
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

                <div class="user-profile-review-form">
                  @include('users.partials.review-form')
                </div>

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
                      <img src="{{ $user->present()->gravatar(60) }}" />
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
                      <img src="{{ $user->present()->gravatar(60) }}" />
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
                      <img src="{{ $user->present()->gravatar(60) }}" />
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
                      <img src="{{ $user->present()->gravatar(60) }}" />
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