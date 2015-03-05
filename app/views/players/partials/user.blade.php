<div class="col-xs-12 col-sm-4">
    <div data-match-height="player" class="player">

        <a href="{{ route('user_profile', $player->id) }}">
            <div class="player__header">
                <img class="img-responsive pull-left" src="{{ $player->present()->gravatar }}"
                     alt="{{ $player->username }}">

                <div class="player__header__user pull-left">
                    <h3>
                        {{{ $player->username }}}
                    </h3>
                </div>
            </div>
        </a>

        <div class="player__content">

            <h4 class="player__content__game">
                {{ $player->favoriteGame()->name }}
            </h4>

            <ul class="player__content__stats">
                <li>
                    Looking for: Team
                </li>
                @if( $player->hasLocation() )
                    <li>
                        From: {{ $player->location }}
                    </li>
                @endif
            </ul>

            @unless($player->skills->isEmpty())
                <ul class="player-skills">
                    @foreach($player->groupedSkills() as $skill)
                        <li
                                data-skill="{{ $skill->pivot->skill_id }}"
                                data-amount="{{{ $skill->count - 1 }}}"
                                class="player-skills-item">
                            <span class="player-skills-item-name">{{{ $skill->name }}}</span>
                            <span class="player-skills-item-value">{{{ $skill->count - 1 }}}</span>
                    @endforeach
                </ul>
            @endunless
        </div>

        <div class="player__buttons">
            <div class="row">
                <div class="col-xs-6">
                    <div class="player__buttons__follow">
                        @include('players.partials.player-follow')
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="player__buttons__profile">
                        <a class="btn-block button button-bottom-box" href="{{ route('user_profile', $player->id) }}">
                            Go to profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>