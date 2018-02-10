<h1>Manage News</h1>
<main>
    <div class="container">
        <form>
            <table class="ui table tablet stackable">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Comments:</th>
                    <th>User Id</th>
                    <th>Date</th>
                    <th>Action</th>
                <?php foreach($this->news as $element): ?>
                    <tr>
                        <th><?=$element["id"]?></th>
                        <th><?=$element["title"]?></th>
                        <th >
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Comments</a>
                                <ul class="dropdown-menu" >
                                    <?php foreach($element['comments'] as $comment): ?>
                                        <li>
                                            &nbsp;<a href="<?=APP_ROOT?>/comments/delete/news_comments/<?=$comment["id"]?>"
                                                     onclick="return confirm('Are you sure?')">Delete this
                                                <b><?=$comment["body"]?></b>
                                            </a>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </th>
                        <th><?=$element["users_id"]?></th>
                        <th><?=$element["date"]?></th>
                        <th>
                            <a href="<?=APP_ROOT?>/news/edit/<?=$element["id"]?>">
                                <i class="glyphicon glyphicon-edit"></i></a>
                            <a href="<?=APP_ROOT?>/news/delete/<?=$element["id"]?>"
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

