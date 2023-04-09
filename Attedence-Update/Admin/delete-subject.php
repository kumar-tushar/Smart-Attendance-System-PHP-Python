<?php

include("../database/db_conection.php");

$sub_id=$_GET['sub_id'];

$delete_query = "DELETE FROM `subjects` WHERE `id`=\"$sub_id\"";

$run=mysqli_query($dbcon,$delete_query);
if($run)
{
	echo "<script>alert('Subject has been deleted!.')</script>";
	
    echo "<script>window.open('manage-subjects.php','_self')</script>";
}
else{
	echo "<script>alert('Fail to delete Subject!.')</script>";
    //echo "<script>window.open('manage-subjects.php','_self')</script>";
}



?>