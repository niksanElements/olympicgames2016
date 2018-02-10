<h1>Manage Sports</h1>
<main>
  <div class="container">
    <form>
      <div class="text-right ">
        <a class="positive ui button"  href="<?=APP_ROOT?>/managesports/add">
          <span class="glyphicon glyphicon-plus">Add Sport</span> </a><br /><br />
      </div>
      <table class="table table-responsive">
        <tr>
          <th>Sport:</th>
          <th>Venue:</th>
          <th>Actions:</th>
        </tr>
        <?php foreach($this->sports as $sport): ?>
          <tr>
            <th><?=$sport["name"]?></th>
            <th><?=$sport["venue"]?></th>
            <th>
              <a href="<?=APP_ROOT?>/managesports/edit/<?=$sport["id"]?>">
                <i class="glyphicon glyphicon-edit"></i></a>
              <a href="<?=APP_ROOT?>/managesports/delete/<?=$sport["id"]?>"
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
