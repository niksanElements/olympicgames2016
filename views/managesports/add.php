<h1>Add new sport</h1>
<main>
  <div class="container">
<form method="post">
  <table class="table table-responsive">
    <tr>
      <th>Sport:</th>
      <th><input class="form-control" type="text" name="name" /></th>
    </tr>
    <tr>
      <th>Venue:</th>
      <th>
        <select class="form-control" name="venueID">
          <?php foreach($this->venues as $venue): ?>
            <option value="<?=$venue["id"]?>"><?=$venue["venue_name"]?></option>
          <?php endforeach ?>
        </select>
      </th>
    </tr>
    <tr>
      <th colspan="2">
        <button class="btn btn-primary" type="submit" name="submit-add" >
          <span class="glyphicon glyphicon-save"> Save</span>
        </button>
      </th>
    </tr>
  </table>
</form>
<a class="btn btn-primary pull-right" href="<?=APP_ROOT?>/managesports" >
  <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
</div>
</main>

