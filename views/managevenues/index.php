<h1>Manage Venues</h1>
<main>
  <div class="container">
    <form>
      <div class="text-right ">
        <a class="positive ui button"  href="<?=APP_ROOT?>/managevenues/add">
          <span class="glyphicon glyphicon-plus">Add Venues</span> </a><br /><br />
      </div>
      <table class="ui table tablet stackable">
        <tr>
          <th>Venue Name:</th>
          <th>Sports:</th>
          <th>Capacity:</th>
          <th>Actions:</th>
        </tr>
        <?php foreach($this->venues as $venue): ?>
          <tr>
            <th><?=$venue["venue_name"]?></th>
            <th><?=$venue["sport"]?></th>
            <th><?=$venue["capacity"]?></th>
            <th>
              <a href="<?=APP_ROOT?>/managevenues/edit/<?=$venue["id"]?>">
                <i class="glyphicon glyphicon-edit"></i></a>
              <a href="<?=APP_ROOT?>/managevenues/delete/<?=$venue["id"]?>"
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
