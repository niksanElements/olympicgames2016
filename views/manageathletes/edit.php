<h1>Edit athlete</h1>
<main>
  <div class="container">
    <form method="post">
      <table class="table table-responsive">
        <tr>
          <th colspan="2">
            <?php if($this->athlete["isTeam"] == 0): ?>
              <input type="radio" name="isTeam" value="0" checked="checked"> Add an athlete
            <?php else: ?>
              <input type="radio" name="isTeam" value="0"> Add an athlete
            <?php endif ?>
            <?php if($this->athlete["isTeam"] == 1): ?>
              <input type="radio" name="isTeam" value="1" checked="checked"> Add Team
            <?php else: ?>
              <input type="radio" name="isTeam" value="1"> Add Team
            <?php endif ?><br>
          </th>
        </tr>
        <tr>
          <th>
            Athlete's name:
          </th>
          <th>
            <input class="form-control" type="text" name="full_name" value="<?=$this->athlete["playerName"]?>" />
          </th>
        </tr>
        <tr>
          <th>
            Age:
          </th>
          <th>
            <input class="form-control" type="number" name="age" value="<?=$this->athlete["playerAge"]?>" />
          </th>
        </tr>
        <tr>
          <th>
            Sport:
          </th>
          <th>
            <select class="form-control" name="sportID">
              <?php foreach($this->sports as $sport): ?>
                <?php if($this->athlete["sportID"] == $sport["id"]): ?>
                  <option value="<?=$sport["id"]?>" selected="selected"><?=$sport["name"]?></option>
                <?php else: ?>
                  <option value="<?=$sport["id"]?>"><?=$sport["name"]?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
          </th>
        </tr>
        <tr>
          <th>
            Country:
          </th>
          <th>
            <select class="form-control" name="countryID">
              <?php foreach($this->countries as $country): ?>
                <?php if($this->athlete["countryID"] == $country["id"]): ?>
                  <option value="<?=$country["id"]?>" selected="selected"><?=$country["full_name"]?></option>
                <?php else: ?>
                  <option value="<?=$country["id"]?>"><?=$country["full_name"]?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
          </th>
        </tr>
        <tr>
          <th colspan="2">
            <button class="btn btn-primary" type="submit" name="submit-edit">
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