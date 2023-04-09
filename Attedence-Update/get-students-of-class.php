<?php

include("database/db_conection.php");

require "Student.php";


if(isset($_POST['class_name'])){
	
	include("database/db_conection.php");
					
					$class_name=$_POST['class_name'];
					
					$menu_list_data = "select * from `students_of_$class_name`";//select query for viewing users.
					
					$run = mysqli_query($dbcon,$menu_list_data);
					
					$students =  array();
 
					while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
					{
						//`roll_no`, `student_name`, `image_name
						$id  			= 	$row['id'];
						$roll_no 		= 	$row['roll_no'];
						$student_name 	= 	$row['student_name'];
						$image_name   	= 	$row['image_name'];
						
						//$mStudent, $rollNo, $name, $imagePath){
						
						$mStudent      = new Student(null,$roll_no, $student_name, $image_name);
						
						array_push($students,$mStudent);
						
					}
					
	$jsonStr = json_encode($students);
	echo $jsonStr;
	
	
}


?>