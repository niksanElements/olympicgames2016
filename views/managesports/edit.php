<h1>Edit sport</h1>
<main>
  <div class="container">
<form method="post">
  <table class="table table-responsive">
    <tr>
      <th>Sport:</th>
      <th><input class="form-control" type="text" name="name" value="<?=$this->sport["name"]?>" /></th>
    </tr>
    <tr>
      <th>Venue:</th>
      <th>
        <select class="form-control" name="venueID">
          <?php foreach($this->venues as $venue): ?>
            <?php if($venue["id"] == $this->sport["venue"]): ?>
              <option value="<?=$venue["id"]?>" selected="selected"><?=$venue["venue_name"]?></option>
            <?php else: ?>
              <option value="<?=$venue["id"]?>"><?=$venue["venue_name"]?></option>
            <?php endif ?>
          <?php endforeach ?>
        </select>
      </th>
    </tr>
    <tr>
      <th colspan="2">
        <button class="btn btn-primary" type="submit" name="submit-edit">
          <span class="glyphicon glyphicon-save"> Save</span>
      </th>
    </tr>
  </table>
</form>
<a class="btn btn-primary pull-right" href="<?=APP_ROOT?>/managesports" >
  <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
</div>
</main>
