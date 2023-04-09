<?php

include("../database/db_conection.php");

$teacher_id=$_GET['teacher_id'];
$delete_query = "DELETE FROM `teachers` WHERE `id` = \"$teacher_id\"";
$run=mysqli_query($dbcon,$delete_query);
if($run)
{
	echo "<script>alert('Teacher has been Deleted.')</script>";
    echo "<script>window.open('manage-teachers.php','_self')</script>";
}
else{
	echo "<script>alert('Fail to delete Teacher.')</script>";
    echo "<script>window.open('manage-teachers.php','_self')</script>";
}

?>