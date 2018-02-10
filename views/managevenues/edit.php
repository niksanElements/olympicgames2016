<h1>Edit Venues</h1>
<main>
  <div class="container">
    <form method="post">
      <table class="table table-responsive">
        <tr>
          <th>ID:</th>
          <th><?=$this->venues["id"]?></th>
        </tr>
        <tr>
          <th>Venue name:</th>
          <th><input class="form-control" type="text" name="venue_name" value="<?=$this->venues["venue_name"]?>" /></th>
        </tr>
        <tr>
          <th>Sports played:</th>
          <th><input class="form-control" type="text" name="sport" value="<?=$this->venues["sport"]?>" /></th>
        </tr>
        <tr>
          <th>Venue capacity:</th>
          <th><input class="form-control" type="number" name="capacity" value="<?=$this->venues["capacity"]?>" /></th>
        </tr>
        <tr>
          <th>Latitude:</th>
          <th><input class="form-control" type="number" step="0.0000001" name="lat" value="<?=$this->venues["lat"]?>" /></th>
        </tr>
        <tr>
          <th>Longitude:</th>
          <th><input class="form-control" type="number" step="0.00000001" name="lon" value="<?=$this->venues["lon"]?>" /></th>
        </tr>
        <tr>
          <th colspan="2">
            <button class="btn btn-primary" type="submit" name="submit-edit">
              <span class="glyphicon glyphicon-save"> Save</span>
          </th>
        </tr>
      </table>
    </form>
    <a class="btn btn-primary pull-right" href="<?=APP_ROOT?>/managevenues" >
      <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
  </div>
</main>