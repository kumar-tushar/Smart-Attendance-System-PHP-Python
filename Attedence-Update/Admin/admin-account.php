<?php
session_start();

if(!$_SESSION['USER_PHONE'])
{

   header("Location: index.php");
}

?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="..\bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>Login</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;

</style>

<body background="../images/key-2114046_1920.jpg">


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Admin</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="index.php">
                        <fieldset>

							<div class="form-group">
								<a href="manage-teachers.php" class="btn btn-md btn-warning btn-block" type="submit" value="Manage Stations" name="login_req" >Manage Teachers</a>
							</div>
							<div class="form-group">
								<a href="manage-classes.php" class="btn btn-md btn-warning btn-block" type="submit" value="Manage Trains" name="login_req" >Manage Classes </a>
							</div>
							<div class="form-group">
								<a href="manage-subjects.php" class="btn btn-md btn-warning btn-block" type="submit" value="Manage Trains" name="login_req" >Manage Subject </a>
							</div>
							<div class="form-group">
								<a href="log-out.php" class="btn btn-md btn-primary btn-link" type="submit" value="Manage Trains" name="login_req" >Log out</a>
							</div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

