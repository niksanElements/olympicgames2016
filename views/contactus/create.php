<?php $this->title = 'create'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<form method="post">

    <div>Name</div>
    <input class="form-control" type="text" name="name"/>
    <div>Some other info</div>
    <textarea class="form-control" rows="10" name="body"></textarea>
    <div>Age</div>
    <input class="form-control" type="number" name="age"/>
    <div>Education</div>
    <input class="form-control" type="text" name="education"/>
    <div>Work</div>
    <input class="form-control" type="text" name="work"/>
    <div>Passion</div>
    <input class="form-control" type="text" name="passion"/>

    <div><input type="submit" value="Create"/>
        <a title="Cancel" href="<?=APP_ROOT?>/contactus">[Cancel]</a></div>
</form>