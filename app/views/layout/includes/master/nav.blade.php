<div class="navbar">
    <a class="navbar-brand" rel="home" href="{{ route('flow') }}">
        <img src="/images/logo.png"/>
    </a>

    {{-- If user is not logged in --}}
    @if ($currentUser)
        <div class="navbar-profile">
            <div class="navbar-profile-user">
                <a href="{{ route('profile') }}">
                    <img class="navbar-profile-user-gravatar" src="{{ $currentUser->present()->gravatar }}"
                         alt="{{ $currentUser->username }}">

                    <div class="navbar-profile-user-meta">
            <span class="navbar-profile-user-username">
              {{{ $currentUser->username }}}
            </span>
                    </div>
                </a>
            </div>
        </div>
    @endif

    <div class="navbar-nav">
        <ul>
            <li>
                <a href="{{ route('profile.conversations') }}">
                    <i class="bealeet-messages"></i>
                    Messages
                    @if($currentUser->hasUnreadConversations())
                        <span class="navbar__unread">
                            {{ $currentUser->getUnreadConversationsCount() }}
                        </span>
                    @endif
                </a>
            </li>
            <li>
                <a href="{{ route('follows') }}">
                    <i class="bealeet-following"></i>
                    Following
                </a>
            </li>
            <li>
                <a href="{{ route('followers') }}">
                    <i class="bealeet-followers"></i>
                    Followers
                </a>
            </li>

            <li class="divider"></li>

            <li>
                <a href="{{ route('flow') }}">
                    <i class="bealeet-flow"></i>
                    Flow
                </a>
            </li>

            <li>
                <a href="{{ route('find_players') }}">
                    <i class="bealeet-playerfind"></i>
                    Find players
                </a>
            </li>

            <li>
                <a href="{{ route('find.teams') }}">
                    <i class="bealeet-teamfind"></i>
                    Find teams
                </a>
            </li>

            <li class="divider"></li>

            <li>
                <a href="{{ route('logout') }}">
                    <i class="bealeet-logout"></i>
                    Log out
                </a>
            </li>

            <li class="divider"></li>

            {{--
            <li>
              <a href="">
                <i class="fa fa-users"></i>
                Find clan
              </a>
            </li>
            <li>
              <a href="">
                <i class="fa fa-star"></i>
                Favourites
              </a>
            </li>
              --}}

            <li class="hidden dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--/.nav-collapse -->

    @include('layout.includes.footer')
</div>