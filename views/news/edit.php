<?php $this->title = 'Edit'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>
<main>
    <div class="container">
        
        <script src="<?=APP_ROOT?>/content/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>

        <form class="form-horizontal" method="post" accept-charset="UTF-8">
            <label class="control-label" for="title"><b>Title</b></label>
            <input class="form-control" type="text" name="title"
                   value="<?=htmlspecialchars($this->news['title'])?>" maxlength="300"/><br/>

            <textarea class="content" name="body"><?=htmlspecialchars($this->news['body'])?></textarea>
            <br/>

            <button class="btn btn-primary" type="submit" name="submit">
                <span class="glyphicon glyphicon-save"> Save</span>
            </button>

        </form>

        <a title="Back" class="btn btn-primary pull-right" href="<?=APP_ROOT?>/managenews" >
            <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
    </div>
</main>
