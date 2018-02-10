<?php $this->title = 'add'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<main>
    <div class="container">
        <div class="ui  three attached buttons">
            <?php
            include("_layout/actions.php");
            ?>
        </div>


        <form class="form-horizontal" method="post" accept-charset="UTF-8">
            <div class="ui attached segment">
            <label class="control-label" for="title">Title</label>
            <input class="form-control" type="text" name="title" maxlength="300"/><br/>

            <textarea class="content-2" name="body"></textarea>
            <br/>

            <input class="submit" type="submit" name="submit" value="submit"/>
            </div>
        </form>
        <div>
            <a title="Back" class="btn btn-primary" href="<?=APP_ROOT?>/forum" >
                <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
        </div>

    </div>
</main>