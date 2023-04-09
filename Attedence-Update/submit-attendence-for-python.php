<?php

include("database/db_conection.php");

if(isset($_POST['class']))
{
	$class = $_POST['class'];
	$sub = $_POST['sub'];
	$rfid = $_POST['rfid'];
	$date = $_POST['date'];
	$attendence = $_POST['attendence'];
	
	$querryattendence = str_replace('"','\"',$attendence);// for inserting json replace " with \"
	
	//var_dump($_POST);
	
	
	
	
	$is_attendence_exist ="select * from attendances WHERE date='$date'";	
	
	$result=mysqli_query($dbcon,$is_attendence_exist);
	
	if(mysqli_num_rows($result) > 0)
	{
		echo "Attendance is already exist!";
	}
	else
	{
		$sql_insert_querry = "INSERT INTO `attendances`(`class`, `sub`, `rfid`, `date`, `attendence`) VALUES (\"$class\",\"$sub\",\"$rfid\",\"$date\",\"$querryattendence\")";
		
		$run=mysqli_query($dbcon,$sql_insert_querry);
		if($run)
		{			
			
			echo "Attendance submited!";
		}
		else{
			echo "Fail to submit attendance!";
		}
		
	}
	
	
	
	
}
?>