<h1>Registration</h1>
    <div style="align-content: center; margin-left:10%;margin-right: 10%;width: 80%;">
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <form class="form-horizontal" id="register" method="post" accept-charset='UTF-8'>
            <div class="form-group">
                <label for="fullName" class="col-sm-2 control-label">Full Name*:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='fullName' id='fullName' maxlength="50" placeholder="Full Name">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email Address*:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='email' id='email' maxlength="50" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username*:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='username' id='username' maxlength="50" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password*:</label>
                <div class="col-sm-10">
                    <input type="password" name='password' class="form-control" id="password" placeholder="Password" maxlength="50">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Repeat Password*:</label>
                <div class="col-sm-10">
                    <input type="password" name='password-repeat' class="form-control" id="password" placeholder="Password Repeat" maxlength="50">
                </div>
            </div>
            <div class="form-group" style="align-content: center; margin-left:40%;margin-right: 10%;">
                <div class="col-sm-offset-2 col-sm-10" >
                    <button type="submit" name="Submit" class="btn btn-primary">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
