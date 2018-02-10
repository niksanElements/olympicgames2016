<h1>Manage Users</h1>
<main>
    <div class="container">
        <form>
            <table class="ui table tablet stackable">
                <tr>
                    <th>Username:</th>
                    <th>Full name:</th>
                    <th>E-mail:</th>
                    <th>Status:</th>
                    <th>Actions:</th>
                </tr>
                <?php foreach($this->users as $user): ?>
                    <tr>
                        <th><?=$user["username"]?></th>
                        <th><?=$user["full_name"]?></th>
                        <th><?=$user["email"]?></th>
                        <th>
                            <?php if($user["status"] == "A"){ ?>
                                Admin
                            <?php }else if($user["status"] == "U") { ?>
                                User
                            <?php } else { ?>
                                Redactor
                            <?php } ?>
                        </th>
                        <th>
                            <a href="<?=APP_ROOT?>/manageusers/edit/<?=$user["id"]?>">
                                <i class="glyphicon glyphicon-edit"></i></a>
                            <a href="<?=APP_ROOT?>/manageusers/delete/<?=$user["id"]?>"
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