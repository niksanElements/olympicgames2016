<h1>Add Venue</h1>
<main>
  <div class="container">
    <form method="post">
      <table class="table table-responsive">
        <tr>
          <th>Venue Name:</th>
          <th><input class="form-control" placeholder="Venue Name" type="text" name="venue_name" /></th>
        </tr>
        <tr>
          <th>Sports Played:</th>
          <th><input class="form-control" placeholder="Sports Played" type="text" name="sport" /></th>
        </tr>
        <tr>
          <th>Venue Capacity:</th>
          <th><input class="form-control" placeholder="Venue Capacity" type="number" name="capacity" /></th>
        </tr>
        <tr>
          <th>Latitude:</th>
          <th><input class="form-control" placeholder="Latitude" type="number" step="0.0000001" name="lat" /></th>
        </tr>
        <tr>
          <th>Longitude:</th>
          <th><input class="form-control" placeholder="Longitude" type="number" step="0.00000001" name="lon" /></th>
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
    <a class="btn btn-primary pull-right" href="<?=APP_ROOT?>/managevenues" >
      <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
  </div>
</main>