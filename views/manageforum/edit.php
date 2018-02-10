<?php $this->title = 'Edit'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>
<main>
    <div class="container">
        <form class="form-horizontal" method="post" accept-charset="UTF-8">
            <label class="control-label" for="title">Title</label>
            <input class="form-control" type="text" name="title"
                   value="<?=htmlspecialchars($this->post['title'])?>" maxlength="300"/><br/>

            <textarea class="content-2" name="body"><?=htmlspecialchars($this->post['body'])?></textarea>
            <br/>

            <button class="btn btn-primary" type="submit" name="submit">
                <span class="glyphicon glyphicon-save"> Save</span></button>
        </form>
        <a class="btn btn-primary pull-right" href="<?=APP_ROOT?>/manageforum" >
            <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
    </div>
</main>
