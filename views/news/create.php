<?php $this->title = 'create'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>
<main>
    <div class="container">
        <script src="<?=APP_ROOT?>/content/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>

        <form class="form-horizontal" method="post" accept-charset="UTF-8">
            <h5>Place Create News!</h5>

            <label class="control-label" for="title">Title</label>
            <input class="form-control" type="text" name="title" maxlength="300"/><br/>

            <textarea class="content" name="body"></textarea>
            <br/>

            <button class="btn btn-primary btn-success pull-left" type="submit" name="submit" >
                <span class="glyphicon glyphicon-plus-sign"> <b>Create</b></span></button>

        </form>
        <a title="Back" class="btn btn-primary pull-right" href="<?=APP_ROOT?>/news" >
            <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
    </div>
</main>



