<?php
include("../database/db_conection.php");

$id=$_GET['id'];
$class_name = $_GET['class_name'];



$delete_query = "DELETE FROM `students_of_$class_name` WHERE `id` = \"$id\"";



$run=mysqli_query($dbcon,$delete_query);
if($run)
{
	echo "<script>alert('Student Deleted Successful.')</script>";
    echo "<script>window.open('manage-students.php?class_name=$class_name','_self')</script>";
}
else{
	echo "<script>alert('Fail to Delete Student.')</script>";
    echo "<script>window.open('manage-students.php?class_name=$class_name','_self')</script>";
}

?>