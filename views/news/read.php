<h1><?= htmlspecialchars($this->title) ?></h1>
<main>
    <div class="container">
    <article class="panel panel-group center-block news">
        <h4 class="ui segment padded header blue pilled"><?= htmlspecialchars($this->news['title']) ?></h4>
        <div class="date panel panel-info">Post on:
            <?= (new DateTime($this->news['date']))->format('d-M-Y') ?>
            <i>by</i> <?= htmlspecialchars($this->news['full_name']) ?>
        </div>
        <div class="ui raised segment">
        <p class="body panel panel-body"><?= $this->news['body']?></p>
        </div>
    </article>
    <article class="panel panel-group center-block news">
    <?php
        if($this->isRedactor) {
            ?>
            <div class="ui buttons action">
                <a href="<?= APP_ROOT ?>/news/edit/<?= $this->news['id'] ?>">
                <div class="ui positive button">Edit</div></a>
                <div class="or"></div>
                <a href="<?= APP_ROOT ?>/news/remove/<?= $this->news['id'] ?>">
                <div class="ui negative button">Delete</div></a>
            </div>
            <?php
        }
        include ("_layout/comments.php");
        ?>
    </article>
    </div>
</main>
