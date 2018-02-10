<h1>Manage Forum</h1>
<main>
    <div class="container">
        <form>
            <table class="ui table tablet stackable">

                <th>ID:</th>
                <th>Titile:</th>
                <th>Comments:</th>
                <th>User Id</th>
                <th>Date</th>
                <th>Actions:</th>
                <tbody>
                <?php foreach($this->posts as $post): ?>
                    <tr>
                        <th><?=$post["id"]?></th>
                        <th><?=$post["title"]?></th>
                        <th >
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Comments</a>
                                <ul class="dropdown-menu" >
                                    <?php foreach($post['comments'] as $comment): ?>
                                        <li class>
                                            &nbsp;<a href="<?=APP_ROOT?>/comments/delete/post_comments/<?=$comment["id"]?>"
                                                     onclick="return confirm('Are you sure?')">Delete this
                                                <b><?=$comment["body"]?></b>
                                            </a>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </th>
                        <th>
                            <?=$post["user_id"]?>
                        </th>
                        <th>
                            <?= $post["Date"] ?>
                        </th>
                        <th>
<!--                            <ul class="list-group">-->
<!--                                <li class="list-group-item-text">-->
<!--                                    <a class="text-success"href=" --><?//=APP_ROOT?><!--/manageforum/edit/--><?//=$post["id"]?><!--">-->
<!--                                        <span class="glyphicon glyphicon-edit"></span> Edit</a>-->
<!--                                </li>-->
<!--                                <li class="list-group-item-text">-->
<!--                                    <a class="text-danger" href="--><?//=APP_ROOT?><!--/manageforum/delete/--><?//=$post["id"]?><!--"-->
<!--                                       onclick="return confirm('Are you sure?')">-->
<!--                                        <span class="glyphicon glyphicon-minus-sign text-danger"></span> Delete</a>-->
<!--                                </li>-->
<!--                            </ul>-->
                            <a href="<?=APP_ROOT?>/manageforum/edit/<?=$post["id"]?>">
                                <i class="glyphicon glyphicon-edit"></i></a>
                            <a href="<?=APP_ROOT?>/manageforum/delete/<?=$post["id"]?>"
                               onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash text-danger"></i></a>
                        </th>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </form>
        <a class="btn btn-primary pull-right" href="<?=APP_ROOT?>/adminpanel" >
            <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
    </div>
</main>