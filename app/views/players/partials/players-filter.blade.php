{{ Form::open() }}

<div class="form-group">
  <label for="">Games</label>
  <select class="selectpicker" name="games" id="">
    <option value="">CS:GO</option>
    <option value="">Dota 2</option>
  </select>
</div>

<button type="submit" class="btn btn-block btn-info">
  Filter
</button>

{{ Form::close() }}