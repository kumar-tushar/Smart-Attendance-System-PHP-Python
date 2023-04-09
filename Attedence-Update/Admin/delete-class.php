<?php

include("../database/db_conection.php");

$class_id=$_GET['class_id'];
$class_name = $_GET['class_name'];
$delete_query = "DELETE FROM `classes` WHERE `id` = \"$class_id\"";
$run=mysqli_query($dbcon,$delete_query);
if($run)
{
	echo "<script>alert('Class has been deleted.')</script>";
	
	$delete_query_table = "DROP TABLE `students_of_$class_name`";
	
	$del_run=mysqli_query($dbcon,$delete_query_table);
	if($del_run)
	{
		echo "<script>alert('Student Table has been deleted.')</script>";
	}
	else{
		echo "<script>alert('Student Table is fail to delete.')</script>";
	}
	
    echo "<script>window.open('manage-classes.php','_self')</script>";
}
else{
	echo "<script>alert('Fail to delete Class.')</script>";
    echo "<script>window.open('manage-classes.php','_self')</script>";
}



?>