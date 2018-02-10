<h1>Athletes Management</h1>
<main>
  <div class="container">
    <form>
      <div class="text-right ">
        <a class="positive ui button  "  href="<?=APP_ROOT?>/manageathletes/add">
          <span class="glyphicon glyphicon-plus-sign">Add Athlete</span> </a><br />
      </div>
      <table class="ui table tablet stackable">
        <tr>
          <th>ID:</th>
          <th>Name:</th>
          <th>Team or Athlete</th>
          <th>Age:</th>
          <th>Sport:</th>
          <th>Country:</th>
          <th>Actins:</th>
        </tr>
        <?php foreach($this->athletes as $athlete): ?>
        <tr>
          <th><?=$athlete["playerID"]?></th>
          <th><?=$athlete["playerName"]?></th>
          <th>
            <?php if($athlete["isTeam"] == 1): ?>
              Team
            <?php else: ?>
              Athlete
            <?php endif ?>
          </th>
          <th>
            <?php if($athlete["playerAge"] > 0): ?>
              <?=$athlete["playerAge"]?>
            <?php else: ?>
              N/A
            <?php endif ?>
          </th>
          <th><?=$athlete["sportName"]?></th>
          <th><?=$athlete["countryName"]?></th>

<!--          <th class="fitin">-->
<!--            <div class="ui  buttons">-->
<!--              <a class="ui positive compact button" href="--><?//=APP_ROOT?><!--/managecontactus/edit/--><?//=$athlete["playerID"]?><!--">-->
<!--                <span class="glyphicon glyphicon-edit"></span> Edit</a>-->
<!--              <div class="or"></div>-->
<!--              <a class="ui negative compact button" href="--><?//=APP_ROOT?><!--/managecontactus/delete/--><?//=$athlete["playerID"]?><!--"-->
<!--                 onclick="return confirm('Are you sure?')">-->
<!--                <span class="glyphicon glyphicon-minus-sign"></span> Delete</a>-->
<!--            </div>-->
<!--          </th>-->
          <th>
            <a href="<?=APP_ROOT?>/manageathletes/edit/<?=$athlete["playerID"]?>">
              <i class="glyphicon glyphicon-edit"></i></a>
            <a href="<?=APP_ROOT?>/manageathletes/delete/<?=$athlete["playerID"]?>
                            " onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash text-danger"></i></a></th>
        </tr>
        <?php endforeach ?>
      </table>
    </form>
    <a class="btn btn-primary pull-right" href="<?=APP_ROOT?>/adminpanel" >
      <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
  </div>
</main>
