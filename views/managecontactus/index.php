<h1>Manage Team Members</h1>
<main>
  <div class="container">
    <form>
      <div class="text-right ">
        <a class="positive ui button  " href="<?=APP_ROOT?>/managecontactus/add">
          <span class=" glyphicon glyphicon-plus-sign" style="vertical-align: middle">Add-Member</span> </a><br />
      </div>
      <table class="ui table tablet stackable">
        <th>ID:</th>
        <th>Team Member Name:</th>
        <th>Age:</th>
        <th>Body:</th>
        <th>Education:</th>
        <th>Passion:</th>
        <th>Work:</th>
        <th>Actions:</th>
        <?php foreach($this->contactus as $contact): ?>
            <tr>
            <th><?=$contact["id"]?></th>
            <th><?=$contact["name"]?></th>
            <th><?=$contact["age"]?></th>
            <th><div class="limtiCharClass"><?=$contact["body"]?></div></th>
            <th><?=$contact["education"]?></th>
            <th><?=$contact["passion"]?></th>
            <th><?=$contact["work"]?></th>
            <th>
              <a href="<?=APP_ROOT?>/managecontactus/edit/<?=$contact["id"]?>">
                <i class="glyphicon glyphicon-edit"></i></a>
              <a href="<?=APP_ROOT?>/managecontactus/delete/<?=$contact["id"]?>"
                            " onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash text-danger"></i></a>
            </th>
            </tr>
        <?php endforeach ?>
      </table>
      </form>
    <a class="btn btn-primary pull-right" href="<?=APP_ROOT?>/adminpanel" >
      <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
    </div>
  </main>
