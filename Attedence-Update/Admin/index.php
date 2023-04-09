<?php
session_start();//session starts here

?>



<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="..\bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>Admin Log In</title>
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
                    <h3 class="panel-title">Admin Log In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="index.php">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="Phone" name="phone" type="tel" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                            </div>


                                <input href="admin.php" class="btn btn-md btn-danger btn-block" type="submit" value="Login" name="login_req" >
								

                            <!-- Change this to a button or input when using this as a form -->
                          <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>

<?php
include("../database/db_conection.php");

if(isset($_POST['login_req']))
{
    $phone = $_POST['phone'];
    $pass  = $_POST['pass'];
	
	$check_user="select * from admin_account WHERE phone='$phone' AND pass='$pass'";
	$run=mysqli_query($dbcon,$check_user);

    if(mysqli_num_rows($run))
    {
		$_SESSION['USER_PHONE'] = $phone;
		echo "<script>window.open('admin-account.php','_self')</script>";
		
    }
    else
    {
		echo "<script>alert('phone or password is incorrect!')</script>";
    }

}
?>
