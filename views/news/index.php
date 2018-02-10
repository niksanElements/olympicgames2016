<?php $this->title = 'News'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>
<main>

    <?php
    if($this->isRedactor)
        include("_layout/user-aside.php");
    else
        include ("_layout/aside.php");
    ?>
    <section class="col-lg-10 col-md-10 col-sm-10">
        <?php foreach ($this->news as $element):?>

            <article class="panel panel-group col-lg-5 col-md-5 col-sm-5">
                <div class="ui teal segment">
                <a title="<?=htmlspecialchars($element['title'])?>" href="<?=APP_ROOT?>/news/read/<?= $element['title'] ?>_&_<?=$element['id']?>">
                    <h3 class="panel panel-heading"><?= htmlspecialchars($element['title']) ?></h3>
                </a>
                <div class="date panel panel-info">Post on:
                    <?= (new DateTime($element['date']))->format('d-M-Y') ?>
                    <i>by</i> <?= htmlspecialchars($element['full_name']) ?>
                </div>
                </div>
            </article>
        <?php endforeach ?>
    </section>
</main>
