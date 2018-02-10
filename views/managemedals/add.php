<h1>Add new medal</h1>
<main>
  <div class="container">
    <form method="post">
      <table class="table table-responsive">
        <tr>
          <th>Medal name:</th>
          <th><input class="form-control" type="text" name="name" /></th>
        </tr>
        <tr>
          <th>Winner:</th>
          <th>
            <select class="form-control" name="playerID">
              <?php foreach($this->athletes as $athlete): ?>
                <option value="<?=$athlete["id"]?>"><?=$athlete["full_name"]?></option>
              <?php endforeach ?>
            </select>
          </th>
        </tr>
        <tr>
          <th>Medal type:</th>
          <th>
            <select class="form-control" name="type">
              <option value="1">Gold</option>
              <option value="2">Silver</option>
              <option value="3">Bronze</option>
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
    <a class="btn btn-primary pull-right" href="<?=APP_ROOT?>/managemedals" >
      <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
  </div>
</main>