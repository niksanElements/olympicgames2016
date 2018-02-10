<h1>Edit Medals</h1>
<main>
  <div class="container">
    <form method="post">
      <table class="table table-responsive">
        <tr>
          <th>Medal name:</th>
          <th><input class="form-control" type="text" name="name" value="<?=$this->medals["name"]?>" /></th>
        </tr>
        <tr>
          <th>Winner</th>
          <th>
            <select class="form-control" name="playerID">
              <?php foreach($this->athletes as $athlete): ?>
                <?php if($athlete["id"] == $this->medals["playerID"]): ?>
                  <option value="<?=$athlete["id"]?>" selected="selected"><?=$athlete["full_name"]?></option>
                <?php else: ?>
                  <option value="<?=$athlete["id"]?>"><?=$athlete["full_name"]?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
          </th>
        </tr>
        <tr>
          <th>Medal type:</th>
          <th>
            <select class="form-control" name="type">
              <?php if($this->medals["type"] == 1): ?>
                <option value="1" selected="selected">Gold</option>
              <?php else: ?>
                <option value="1">Gold</option>
              <?php endif ?>
              <?php if($this->medals["type"] == 2): ?>
                <option value="2" selected="selected">Silver</option>
              <?php else: ?>
                <option value="2">Silver</option>
              <?php endif ?>
              <?php if($this->medals["type"] == 3): ?>
                <option value="3" selected="selected">Bronze</option>
              <?php else: ?>
                <option value="3">Bronze</option>
              <?php endif ?>
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
    <a class="btn btn-primary pull-right" href="<?=APP_ROOT?>/managemedals" >
      <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
  </div>
</main>