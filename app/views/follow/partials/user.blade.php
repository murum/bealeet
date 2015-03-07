<div class="col-xs-12 col-sm-4">
    <div data-match-height="player" class="player">

        <a href="{{ route('user_profile', $user->id) }}">
            <div class="player__header">
                <img class="img-responsive pull-left" src="{{ $user->present()->gravatar }}"
                     alt="{{ $user->username }}">

                <div class="player__header__user pull-left">
                    <h3>
                        {{{ $user->username }}}
                    </h3>
                </div>
            </div>
        </a>

        <div class="player__content">
            <div class="row">
                <div class="col-xs-12">
                    @if( $user->hasAFavoriteGame() )
                        <h4 class="player__content__game">
                            {{ $user->favoriteGame()->name }}
                        </h4>
                    @endif
                </div>
            </div>
        </div>

        <div class="player__buttons">
            <div class="row">
                <div class="col-xs-12">
                    <div class="player__buttons__profile">
                        <a class="btn-block button button-bottom-box" href="{{ route('user_profile', $user->id) }}">
                            Go to profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>