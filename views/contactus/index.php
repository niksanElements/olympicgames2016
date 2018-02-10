<main>
    <div class="container">
    <a title="Project members" class="btn btn-primary" href="<?= APP_ROOT ?>/contactus/members">Members </a>  
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
                
                <div class="comments">
                    <div class="ui vertical steps stepin">
                        <?php foreach ($this->comments as $comment): ?>
                            <div class="ui active step teal segment">
                                <i class="comment icon"></i>
                                <div class="center-block">
                                    <div class="title"><?= (new DateTime($comment['date']))->format('d-M-Y') ?></div>
                                    <div class="description"><?=$comment['body']?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>


<form class="ui reply form" method="post" accept-charset="UTF-8">
    <div class="field">
        <textarea class="content-2" name="comment"></textarea>
    </div>
    <button class="ui blue labeled submit icon button" type="submit" name="submit" >
        <i class="icon edit"></i> Add Reply
    </button>
</form>

            </div>
        </form>

    </div>
</main>
