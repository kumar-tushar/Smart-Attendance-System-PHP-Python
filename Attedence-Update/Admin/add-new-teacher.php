<?php
session_start();//session starts here

?>



<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="..\bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>Add New Teacher</title>
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
                    <h3 class="panel-title">Add New Teacher</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="add-new-teacher.php">
                        <fieldset>
						
						
							<div class="form-group"  >
                                <input class="form-control" placeholder="Name" name="name" type="text" autofocus>
                            </div>
							<div class="form-group"  >
                                <input class="form-control" placeholder="Email" name="email" type="email" autofocus>
                            </div>
							<div class="form-group"  >
                                <input class="form-control" placeholder="RFID" name="rf_id" type="text" autofocus>
                            </div>
							<div class="form-group"  >
                                <input class="form-control" placeholder="Password" name="password" type="text" autofocus>
                            </div>
							<div class="form-group"  >
                                <input class="form-control" placeholder="Re-Type Password" name="password2" type="text" autofocus>
                            </div>
						
							
							
							
							
							
					
							<div class="form-group"  >
								<label for="exampleFormControlSelect1">Select Class for Lacture 1</label>
								<select class="form-control" id="exampleFormControlSelect1" name="class1">
								  <?php
								include("../database/db_conection.php");
								$menu_list_data = "select * from classes";
								$run = mysqli_query($dbcon,$menu_list_data);
			 
								while($row=mysqli_fetch_array($run))
								{
									$id 		= $row['id'];
									$class_name = $row['class_name'];					
								?>
								<option> <?php echo $class_name; ?> </option>
								
								<?php } ?>
								</select>
								
                            </div>
							
							
							<div class="form-group"  >
								<label for="exampleFormControlSelect2">Select Subject of Lecture 1</label>
								<select class="form-control" id="exampleFormControlSelect2" name="subject1_name">
								  <?php
								include("../database/db_conection.php");
								$menu_list_data = "select * from subjects";
								$run = mysqli_query($dbcon,$menu_list_data);
			 
								while($row=mysqli_fetch_array($run))
								{
									$id 		= $row['id'];
									$sub_name = $row['name'];					
								?>
								<option> <?php echo $sub_name; ?> </option>
								
								<?php } ?>
								</select>
								
                            </div>
							
							<div class="form-group"  >
                                <input class="form-control" placeholder="Start Time" name="start_time1" type="time" autofocus>
                            </div>
							<div class="form-group"  >
                                <input class="form-control" placeholder="End Time" name="end_time1" type="time" autofocus>
                            </div>
							
							
							
							
							
							<div class="form-group"  >
								<label for="exampleFormControlSelect1">Select Class for Lecture 2</label>
								<select class="form-control" id="exampleFormControlSelect1" name="class2">
								  <?php
								include("../database/db_conection.php");
								$menu_list_data = "select * from classes";
								$run = mysqli_query($dbcon,$menu_list_data);
			 
								while($row=mysqli_fetch_array($run))
								{
									$id 		= $row['id'];
									$class_name = $row['class_name'];					
								?>
								<option> <?php echo $class_name; ?> </option>
								<?php } ?>
								</select>
								
								
                            </div>
							
							<div class="form-group"  >
								<label for="exampleFormControlSelect1">Select Subject of Lecture 2</label>
								<select class="form-control" id="exampleFormControlSelect1" name="subject2_name">
								  <?php
								include("../database/db_conection.php");
								$menu_list_data = "select * from subjects";
								$run = mysqli_query($dbcon,$menu_list_data);
			 
								while($row=mysqli_fetch_array($run))
								{
									$id 		= $row['id'];
									$sub_name = $row['name'];					
								?>
								<option> <?php echo $sub_name; ?> </option>
								
								<?php } ?>
								</select>
								
                            </div>
							
							
							<div class="form-group"  >
                                <input class="form-control" placeholder="Start Time" name="start_time2" type="time" autofocus>
                            </div>
							<div class="form-group"  >
                                <input class="form-control" placeholder="End Time" name="end_time2" type="time" autofocus>
                            </div>
							
							
							
							<div class="form-group"  >
								<label for="exampleFormControlSelect1">Select Class for Lecture 3</label>
								<select class="form-control" id="exampleFormControlSelect1"  name="class3">
								  <?php
								include("../database/db_conection.php");
								$menu_list_data = "select * from classes";
								$run = mysqli_query($dbcon,$menu_list_data);
			 
								while($row=mysqli_fetch_array($run))
								{
									$id 		= $row['id'];
									$class_name = $row['class_name'];					
								?>
								<option> <?php echo $class_name; ?> </option>
								
								<?php } ?>
								</select>
								
                            </div>
							
							
							<div class="form-group"  >
								<label for="exampleFormControlSelect1">Select Subject of Lecture 3</label>
								<select class="form-control" id="exampleFormControlSelect1" name="subject3_name">
								  <?php
								include("../database/db_conection.php");
								$menu_list_data = "select * from subjects";
								$run = mysqli_query($dbcon,$menu_list_data);
			 
								while($row=mysqli_fetch_array($run))
								{
									$id 		= $row['id'];
									$sub_name = $row['name'];					
								?>
								<option> <?php echo $sub_name; ?> </option>
								
								<?php } ?>
								</select>
								
                            </div>
							
							
							<div class="form-group"  >
                                <input class="form-control" placeholder="Start Time" name="start_time3" type="time" autofocus>
                            </div>
							<div class="form-group"  >
                                <input class="form-control" placeholder="End Time" name="end_time3" type="time" autofocus>
                            </div>
							
							
							
							<div class="form-group"  >
								<label for="exampleFormControlSelect1">Select Class for Lecture 4</label>
								<select class="form-control" id="exampleFormControlSelect1"  name="class4">
								  <?php
								include("../database/db_conection.php");
								$menu_list_data = "select * from classes";
								$run = mysqli_query($dbcon,$menu_list_data);
			 
								while($row=mysqli_fetch_array($run))
								{
									$id 		= $row['id'];
									$class_name = $row['class_name'];					
								?>
								<option> <?php echo $class_name; ?> </option>
								
								<?php } ?>
								</select>
								
                            </div>
							
							<div class="form-group"  >
								<label for="exampleFormControlSelect1">Select Subject of Lecture 4</label>
								<select class="form-control" id="exampleFormControlSelect1" name="subject4_name">
								  <?php
								include("../database/db_conection.php");
								$menu_list_data = "select * from subjects";
								$run = mysqli_query($dbcon,$menu_list_data);
			 
								while($row=mysqli_fetch_array($run))
								{
									$id 		= $row['id'];
									$sub_name = $row['name'];					
								?>
								<option> <?php echo $sub_name; ?> </option>
								
								<?php } ?>
								</select>
								
                            </div>
							<div class="form-group"  >
                                <input class="form-control" placeholder="Start Time" name="start_time4" type="time" autofocus>
                            </div>
							<div class="form-group"  >
                                <input class="form-control" placeholder="End Time" name="end_time4" type="time" autofocus>
                            </div>
							
							
							
							
							
							
							<input class="btn btn-md btn-success btn-block" type="submit" value="Add" name="add">
							<a href="manage-teachers.php" class="btn btn-md btn-primary btn-block" type="submit" value="Manage" >Manage Teachers</a>
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

if(isset($_POST['name']))
{
	
	var_dump($_POST);
	
	$name 		= $_POST['name'];
	$email 		= $_POST['email'];
	$rf_id 		= $_POST['rf_id'];
	$password 	= $_POST['password'];
	$password2 	= $_POST['password2'];
	
	
	$class1 		= $_POST['class1'];
	$subject1_name 	= $_POST['subject1_name'];
	$start_time1 	= $_POST['start_time1'];
	$end_time1 		= $_POST['end_time1'];
	
	
	
	$class2 		= $_POST['class2'];
	$subject2_name 	= $_POST['subject2_name'];
	$start_time2 	= $_POST['start_time2'];
	$end_time2 		= $_POST['end_time2'];
	
	
	
	$class3 		= $_POST['class3'];
	$subject3_name 	= $_POST['subject3_name'];
	$start_time3 	= $_POST['start_time3'];
	$end_time3 		= $_POST['end_time3'];
	
	
	$class4 		= $_POST['class4'];
	$subject4_name 	= $_POST['subject4_name'];
	$start_time4 	= $_POST['start_time4'];
	$end_time4 		= $_POST['end_time4'];
	
	
	
	
	
	
	
	$is_station_exist ="select * from teachers WHERE rf_id='$rf_id'";	
	
	$result=mysqli_query($dbcon,$is_station_exist);
	
	if(mysqli_num_rows($result) > 0)
	{
		echo "<script>window.open('#','_self')</script>";
		echo "<script>alert('Teacher RFID name is already exist!')</script>";
	}
	else
	{
		$sql_insert_querry = "INSERT INTO `teachers`(`rf_id`, `name`, `email`, `pass`, `class1`, `sub1`, `stime1`, `etime1`, `class2`, `sub2`, 
		`stime2`, `etime2`, `class3`,  `sub3`, `stime3`, `etime3`, `class4`,  `sub4`, `stime4`, `etime4`) VALUES (\"$rf_id\", \"$name\", \"$email\", \"$password\", \"$class1\", \"$subject1_name\",
		\"$start_time1\", \"$end_time1\", \"$class2\", \"$subject2_name\", \"$start_time2\", \"$end_time2\" ,  \"$class3\", \"$subject3_name\", \"$start_time3\", \"$end_time3\",  \"$class4\", \"$subject4_name\", \"$start_time4\", \"$end_time4\")";
		 
		$run=mysqli_query($dbcon,$sql_insert_querry);
		if($run)
		{
			echo "<script>alert('Teacher added successfully!')</script>";
			echo "<script>window.open('manage-teachers.php','_self')</script>";
		}
		else{
			echo "<script>alert('fail to add Teacher!')</script>";
		}
		
	}
	
	
	
	
}
?>