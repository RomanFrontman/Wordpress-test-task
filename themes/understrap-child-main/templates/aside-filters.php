<form class="form-filter" action="" method="post">
  <label>
    <span>Search</span>
    <input class="search-filter" type="search" name="search">
  </label>

  <label>
    <span>Max number of floors</span>
    <input type="number" name="floor_num" min="1" max="100" >
  </label>

  <label>
    <span class="">Building type </span>
    <select name="build_type">
      <option value="" default>All</option>
      <option value="panel">Panel</option>
      <option value="brick">Brick</option>
      <option value="foam_block">Foam block</option>
    </select>
  </label>

  <input class="btn btn--primary" type="submit" value="Apply">
</form>
