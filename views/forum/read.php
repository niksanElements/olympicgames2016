<main>
    <div class="container">
        <div class="ui  three attached buttons">
            <?php
            include("_layout/actions.php");
            ?>
        </div>

        <form method="post">
            <div class="ui attached segment">
                <div class="ui violet segment">

                <article class="panel panel-group center-block news">
                    <h4 class="panel panel-heading"><?= htmlspecialchars($this->post['title']) ?></h4>
                    <div class="date panel panel-info">Post on:
                        <?= (new DateTime($this->post['date']))->format('d-M-Y') ?>
                        <i>by</i> <?= htmlspecialchars($this->post['full_name']) ?>
                    </div>
                    <p class="body panel panel-body"><?= $this->post['body']?></p>

                </article>
                </div>
                <?php include ("_layout/comments.php"); ?>
            </div>
        </form>
        <a title="Back" class="btn btn-primary pull-right" href="<?=APP_ROOT?>/forum" >
            <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
    </div>
</main>
