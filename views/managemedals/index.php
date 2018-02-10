<h1>Manage Medals</h1>
<main>
  <div class="container">
    <form>
      <div class="text-right ">
        <a class="positive ui button"  href="<?=APP_ROOT?>/managemedals/add">
          <span class="glyphicon glyphicon-plus">Add Medal</span> </a><br /><br />
      </div>
      <table class="ui table tablet stackable">
        <tr>
          <th>ID:</th>
          <th>Medal:</th>
          <th>Type:</th>
          <th>Winner:</th>
          <th>Actions:</th>
        </tr>
        <?php foreach($this->medals as $medal): ?>
          <tr>
            <th><?=$medal["id"]?></th>
            <th><?=$medal["name"]?></th>
            <th>
              <?php if ($medal["type"] == 1): ?>
                Gold
              <?php elseif ($medal["type"] == 2):?>
                Silver
              <?php else:?>
                Bronze
              <?php endif?>
            </th>
            <th><?=$medal["winner"]?></th>
            <th>
              <a href="<?=APP_ROOT?>/managemedals/edit/<?=$medal["id"]?>">
                <i class="glyphicon glyphicon-edit"></i></a>
              <a href="<?=APP_ROOT?>/managemedals/delete/<?=$medal["id"]?>"
                 onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash text-danger"></i></a>
            </th>
          </tr>
        <?php endforeach ?>
      </table>
    </form>
    <a class="btn btn-primary pull-right" href="<?=APP_ROOT?>/adminpanel" >
      <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
  </div>
</main>