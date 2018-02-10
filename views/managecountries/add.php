<h1>Add Country</h1>
<main>
    <div class="container">
<form method="post">
    <table class="table table-responsive">
        <tr>
            <th>Full name:</th>
            <th><input class="form-control" type="text" name="full_name" /></th>
        </tr>
        <tr>
            <th>Short name:</th>
            <th><input class="form-control" type="text" name="short_name" /></th>
        </tr>
        <tr>
            <th colspan="2">
                <button class="btn btn-primary" type="submit" name="submit-add" >
                    <span class="glyphicon glyphicon-save"> Save</span>
                </button>
            </th>
        </tr>
    </table>
</form>
        <a class="btn btn-primary pull-right" href="<?=APP_ROOT?>/managecountries" >
            <span class="glyphicon glyphicon-backward"> <b>Back</b></span></a>
</div>
    </main>