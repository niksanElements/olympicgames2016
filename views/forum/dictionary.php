<?php $this->title = 'Forum'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>
<main>
    <div class="container">
        <div class="ui three attached buttons">
            <?php
            include("_layout/actions.php");
            ?>
        </div>

        <form>
            <div class="ui attached segment">
                <div class="comments">
                    <div class="ui vertical">
        <?php foreach ($this->posts as $post):?>

                <a title="<?= $post['title'] ?>" href="<?=APP_ROOT?>/forum/read/<?= $post['title'] ?>_&_<?=$post['id']?>">
                    <div class="ui active teal segment">
                        <i class="newspaper icon"></i>
                        <div class="center-block">
                            <div class="title"><?= htmlspecialchars($post['title']) ?></div>
                        </div>
                    </div>
                </a>

        <?php endforeach ?>    
                </div>
            </div>
        </div>
    </div>
</main>
