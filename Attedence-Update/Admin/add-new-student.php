<!doctype html>

<?php 
	$class_name = $_GET['class_name'];
?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Add new RFID Tag</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
	
  </head>

  <body class="text-center">
	
	<form class="form-signin" role="form"  name="add_new_subject_form" action="#"  onsubmit ="return(validateForm());" method="POST">
	<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">Add new Student</h1>
		
		<label for="inputClassName" class="sr-only">Class Name</label>
		<input type="text" id="inputClassName" name="class_name" class="form-control" placeholder="Subject Name"value="<?php echo $class_name;?>"  readonly>
		</br>
		
		<label for="inputSubjectName" class="sr-only">Roll No</label>
		<input type="number" id="inputSubjectName" name="student_roll_no" class="form-control" placeholder="Roll No" >
		</br>
		
		<label for="inputStudentName" class="sr-only">Student Name</label>
		<input type="text" id="inputStudentName" name="student_name" class="form-control" placeholder="Student Name" >
		</br>
		
		<label for="inputFolderName" class="sr-only">Image Folder Name</label>
		<input type="text" id="inputFolderName" name="file_path" class="form-control" placeholder="Image Folder Name" >
		</br>
		
		
		
	
	
        <button class="btn btn-lg btn-primary btn-block" value="Submit" name="add_new_time_table" type="submit"  method="post" >Add</button>
		</br>
		<a href="manage-students.php?class_name=<?php echo $class_name;?>" class="btn btn-lg btn-primary btn-block">Manage Students</a>
		</br>
		<a href="admin-account.php" class="btn btn-lg btn-primary btn-block">Home</a>
		
		
		
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </body>
</html>



<script>
function validateForm() {
  	if ((document.forms["add_new_subject_form"]["class_name"].value).localeCompare("") == 0){
	  alert("Enter Subject Name First!");
	  return false;
	}
	if ((document.forms["add_new_subject_form"]["student_roll_no"].value).localeCompare("") == 0){
	  alert("Enter Start Time First!");
	  return false;
	}
	if ((document.forms["add_new_subject_form"]["student_name"].value).localeCompare("") == 0){
	  alert("Enter End time First!");
	  return false;
	}
	if ((document.forms["add_new_subject_form"]["file_path"].value).localeCompare("") == 0){
	  alert("Enter Folder Name First!");
	  return false;
	}
	
}
</script>




<?php
include("../database/db_conection.php");
//var_dump($_POST);


if(isset($_POST['add_new_time_table'])){
	
	$class_name 	    = $_POST['class_name'];
	$student_roll_no    = $_POST['student_roll_no'];
	$student_name 		= $_POST['student_name'];
	$filePath 			= $_POST['file_path'];
	
	
	
	$check_contact_is_exist="select * from `students_of_$class_name` WHERE roll_no='$student_roll_no'";
		
	
	$result = mysqli_query($dbcon,$check_contact_is_exist);
	
	if(mysqli_num_rows($result) > 0)
    {
		echo "<script>window.open('#','_self')</script>";
		echo "<script>alert('Student already exist!')</script>";
    }
	else
    {
		$sql_insert_querry = "INSERT INTO `students_of_$class_name` (`roll_no`, `student_name`, `image_name`) VALUES (\"$student_roll_no\",\"$student_name\",\"$filePath\")";
		
		
		$run=mysqli_query($dbcon,$sql_insert_querry);
		if($run)
		{				
			echo "<script>alert('Student Added added successfully!')</script>";
			echo "<script>window.open('manage-students.php?class_name=$class_name','_self')</script>";
		}
		else{
			echo "<script>alert('fail to add Student!')</script>";
		}
		
    }
	

}
?>


























