<div class="col-xs-12 col-sm-4">
    <div class="player">
        <div class="player-header player-header-{{ $player->favoriteGame()->slug }}"></div>
        <h3>
            {{{ $player->username }}}
        </h3>

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

        <div class="player-buttons">
            <div class="row">
                <div class="col-xs-6">
                    @include('players.partials.player-follow')
                </div>

                <div class="col-xs-6">
                    <a class="btn btn-block btn-info-outline" href="{{ route('user_profile', $player->id) }}">
                        Profile <i class="fa fa-angle-double-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>