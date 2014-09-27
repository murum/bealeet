<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Skip navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" rel="home" href="{{ route('home') }}">
                <img src="/images/logo.png" />
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-right navbar-nav">

                {{-- If user is not logged in --}}
                @if ($currentUser)
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img class="nav-gravatar" src="{{ $currentUser->present()->gravatar }}" alt="{{ $currentUser->username }}">

                            {{ $currentUser->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Another action</a></li>
                            <li class="divider"></li>
                            <li>{{ link_to_route('logout', 'Log Out', null, ['class' => 'signout-button']) }}</li>
                        </ul>
                    </li>
                @else
                    <li>{{ link_to_route('register', 'Register') }}</li>
                    <li>{{ link_to_route('login', 'Log In') }}</li>
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
    </div>
</div>