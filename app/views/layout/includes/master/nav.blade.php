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
        <li>
          <a href="{{ route('logout') }}">
            <i class="fa fa-cog"></i>
            Log out
          </a>
        </li>
      </ul>
    </div>
  @endif
</div>