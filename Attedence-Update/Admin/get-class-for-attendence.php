<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="..\bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>Add New Class</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;

</style>

<body background="../images/diary-92652_1920.jpg">


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New Class</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="add-new-class.php">
                        <fieldset>
							<div class="form-group"  >
                                <input class="form-control" placeholder="" name="class_name" type="text" autofocus>
                            </div>
							
							<input class="btn btn-md btn-success btn-block" type="submit" value="Add" name="add">
							<a href="manage-classes.php" class="btn btn-md btn-primary btn-block" type="submit" value="Manage" >Manage</a>
							<a href="admin-account.php" class="btn btn-md btn-info btn-block" type="submit" >Home</a>
							
                        
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

if(isset($_POST['rf_id'])){
	
	$rf_id = $_POST['rf_id'];
	$time = $_POST["time"];
	
	
	
	
	
}


?>




