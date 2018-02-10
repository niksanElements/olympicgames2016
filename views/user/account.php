<?php $this->title = 'Account'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<main>
    <div class="container">
        <div class="row">
            <form action="account" method="post">
            <table class="table table-responsive">
                <tbody>
                <tr class="col-2">
                    <th>Full name:</th>
                    <th class="col-xs-12">
                        <div class="col-xm-12">
                          <input type="text" name="full_name" value="<?=$this->user["full_name"]?>"
                                 class="form-control" id="full_name" placeholder="Password" maxlength="50">
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>E-mail:</th>
                    <th>
                        <input type="text" name="email" value="<?=$this->user["email"]?>"
                               class="form-control" id="email" placeholder="Password" maxlength="50">
                    </th>
                </tr>
                <tr>
                    <th>Password:</th>
                    <th class="col-xs-2">
                        <div class="col-xm-12">
                        <input type="password" name='password' class="form-control" id="password"
                               placeholder="Password" maxlength="50">
                            </div>
                    </th>
                </tr>
                <tr>
                    <th>Confirm password:</th>
                    <th>
                        <div class="col-xm-12">
                            <input type="password" name="password_confirm" class="form-control" id="password"
                                   placeholder="Password-Confirm" maxlength="50">
                        </div>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">

                        <button type="submit" name="submit-edit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-save"></span>Save</button>
                    </th>
                </tr>
                </tbody>
            </table>
            </form>
        </div>
    </div>
</main>
