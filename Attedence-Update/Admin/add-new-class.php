<?php
session_start();//session starts here

?>



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
                                <input class="form-control" placeholder="Class Name" name="class_name" type="text" autofocus>
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

if(isset($_POST['class_name']))
{
	$class_name = $_POST['class_name'];
	
	
	$is_station_exist ="select * from classes WHERE class_name='$class_name'";	
	
	$result=mysqli_query($dbcon,$is_station_exist);
	
	if(mysqli_num_rows($result) > 0)
	{
		echo "<script>window.open('#','_self')</script>";
		echo "<script>alert('Class name is already exist!')</script>";
	}
	else
	{
		$sql_insert_querry = "INSERT INTO `classes`( `class_name`) VALUES (\"$class_name\")";
		
		$run=mysqli_query($dbcon,$sql_insert_querry);
		if($run)
		{			
			$sql = "CREATE TABLE `students_of_$class_name` ( `id` INT NOT NULL AUTO_INCREMENT , `roll_no` INT NOT NULL , `student_name`
							VARCHAR(50) NOT NULL , `image_name`  VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
			if ($dbcon->query($sql) === TRUE) {
						echo "<script>alert('Students Table created successfully')</script>";
					} else {
						echo "<script>alert('Error creating Students Table')</script>";
			}
			echo "<script>alert('Class added successfully!')</script>";			
			echo "<script>window.open('manage-classes.php','_self')</script>";
		}
		else{
			echo "<script>alert('fail to add Class!')</script>";
		}
		
	}
	
	
	
	
}
?>