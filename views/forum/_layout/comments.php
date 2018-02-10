<?php $this->title = 'Comments'; ?>

<h4 class="text-align-center"><?=htmlspecialchars($this->title)?></h4>

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