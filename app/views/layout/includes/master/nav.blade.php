<div class="navbar">
  <a class="navbar-brand" rel="home" href="{{ route('home') }}">
    <img src="/images/logo.png" />
  </a>
  <div class="navbar-nav">
    <ul>
      {{-- If user is not logged in --}}
      @if (!$currentUser)
        <li>
          <a href="{{ route('register') }}">
            <i class="fa fa-user"></i>
            Register
          </a>
        </li>
        <li>
          <a href="{{ route('login') }}">
            <i class="fa fa-sign-in"></i>
            Log in
          </a>
        </li>
      @endif

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
  </div><!--/.nav-collapse -->
  {{-- If user is not logged in --}}
  @if ($currentUser)
    <div class="navbar-profile">
      <div class="navbar-profile-user">
        <img class="navbar-profile-user-gravatar" src="{{ $currentUser->present()->gravatar }}" alt="{{ $currentUser->username }}">
        {{{ $currentUser->username }}}
      </div>

      <ul>
        <li class="dropdown">
          <a class="dropdown-toggle" href="#">
            <i class="fa fa-cog"></i>
            Settings
          </a>
          <div class="dropdown-menu">
            <div class="dropdown-header">
              <div class="row">
                <div class="col-xs-12">
                  <img class="dropdown-header-gravatar" src="{{ $currentUser->present()->gravatar(40) }}" alt="{{ $currentUser->username }}">
                  <h4 class="dropdown-header-username">{{{ $currentUser->username }}}</h4>
                </div>
              </div>
            </div>
            <div class="dropdown-body">
              <div class="row">
                <div class="col-xs-12">
                  <ul>
                    <li>
                      <a href="#">
                        Profile
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        Friends
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="dropdown-footer">
              <div class="row">
                <div class="col-xs-12">
                  <ul>
                    <li>
                      <a class="signout-button" href="{{ route('logout') }}">
                        <i class="fa fa-power-off"></i>
                      </a>
                    </li>
                  </ul>
                  <a class="dropdown-close" href="#">
                    <i class="fa fa-times"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  @endif
</div>