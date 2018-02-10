<?php $this->title = 'remove'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>
<main>
    <form class="form-horizontal" method="post" accept-charset="UTF-8">
        <label class="control-label" for="title">If you want to delete this news place enter the title.</label>
        <input class="form-control" type="text" name="title" maxlength="300"/><br/>
        <input type="submit" value="delete"/>
    </form>
</main>