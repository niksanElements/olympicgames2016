<form>
    <div class="ui violet button dropdown col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class=" btn-block dropdown-toggle" data-toggle="dropdown">Recent</div>
        <ul class="dropdown-menu">
            <?php foreach ($this->recentPosts as $post) : ?>
                <li>
                    <a title="<?= $post['title'] ?>" href="<?= APP_ROOT ?>/forum/read/<?= $post['title'] ?>_&_<?=$post['id']?>">
                        <?= $post['title'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="ui violet button dropdown col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="dropdown-toggle" data-toggle="dropdown">Dictionary</div>
        <ul class="dropdown-menu">
            <li><a href="<?= APP_ROOT ?>/forum/dictionary/all">all</a> </li>
            <?php for ($i = 65;$i <= 90;$i++) { ?>
                <li>
                    <a title="<?= chr($i) ?>" href="<?= APP_ROOT ?>/forum/dictionary/<?= chr($i) ?>"><?= chr($i) ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <?php if($this->isLoggedIn){ ?>
    <a title="Add" href="<?=APP_ROOT?>/forum/add">
    <div class="ui green button col-lg-4 col-md-4 col-sm-4 col-xs-4">Add</div>
    </div>
        </a>
    <?php } ?>

</form>