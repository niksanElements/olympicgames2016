<h1>Add Athlete</h1>
<main>
  <div class="container" >
    <form method="post">
      <table class="table table-responsive">
        <tr>
          <th colspan="2">
            <input type="radio" name="isTeam" value="0" checked="checked" /> Add an athlete
            <input type="radio" name="isTeam" value="1" /> Add team<br>
          </th>
        </tr>
        <tr>
          <th>Name:</th>
          <th><input class="form-control" type="text" name="full_name" </th>
        </tr>
        <tr>
          <th>Age:</th>
          <th><input class="form-control" type="number" name="age" /></th>
        </tr>
        <tr>
          <th>Sport:</th>
          <th>
            <select class="form-control" name="sportID">
              <?php foreach($this->sports as $sport): ?>
                <option value="<?=$sport["id"]?>"><?=$sport["name"]?></option>
              <?php endforeach ?>
            </select>
          </th>
        </tr>
        <tr>
          <th>Country:</th>
          <th>
            <select class="form-control" name="countryID">
              <?php foreach($this->countries as $country): ?>
                <option value="<?=$country["id"]?>"><?=$country["full_name"]?></option>
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
    <a class="btn btn-primary pull-right" href="<?=APP_ROOT?>/manageathletes" >
      <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
  </div>
</main>
