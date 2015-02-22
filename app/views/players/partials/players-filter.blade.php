<div class="form-group">
    <label for="">Games</label>
    <select class="selectpicker" name="games" id="filterGames">
        <option value="" {{ isset($active_game) ? '' : 'selected' }}>All</option>
        @foreach($games as $game)
            <option value="{{ $game->slug }}" {{ (isset($active_game) && $active_game->slug === $game->slug) ? 'selected' : '' }}>
                {{ $game->name }}
            </option>
        @endforeach
    </select>
</div>

{{--
<button type="submit" class="btn btn-block btn-info">
    Filter
</button>
--}}