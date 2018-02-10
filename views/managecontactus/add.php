<h1>Add New Team Member</h1>

<main>
  <div class="container">
    <form method="post">


      <label class="control-label" for="name">Name</label>
      <input class="form-control" type="text" name="name" maxlength="300"/>

      <label class="control-label" for="body">Body</label>
      <textarea class="form-control" rows="10" name="body"></textarea>

      <label class="control-label" for="age">Age</label>
      <input class="form-control" type="number" name="age"/>

      <label class="control-label" for="education">Education</label>
      <input class="form-control" type="text" name="education"/>

      <label class="control-label" for="work">Work</label>
      <input class="form-control" type="text" name="work"/>

      <label class="control-label" for="passion">Passion</label>
      <input class="form-control" type="text" name="passion"/>
      <br>

      <button class="btn btn-primary" type="submit">
        <span class="glyphicon glyphicon-save"> Save</span>
      </button>
    </form>
    <a class="btn btn-primary pull-right" href="<?=APP_ROOT?>/managecontactus" >
      <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
  </div>
</main>