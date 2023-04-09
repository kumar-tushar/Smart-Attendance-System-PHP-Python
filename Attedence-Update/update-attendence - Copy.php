<!doctype html>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Submit Attendence</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
	
  </head>
  
 <style>
.custom-control-label::before, 
.custom-control-label::after {
top: .8rem;
width: 1.25rem;
height: 1.25rem;
}
</style>
<body class="text-center">
	
	<form class="form-signin" role="form"  name="add_new_subject_form" action="#"  method="POST">
	<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">Attendence Student List</h1>

		<?php
			$rf_id = $_GET['rf_id'];
			$class = $_GET['class'];
			$sub   = $_GET['sub'];
			include("database/db_conection.php");
			$menu_list_data = "SELECT * FROM `attendances` WHERE `rfid`=\"$rf_id\" AND `class`=\"$class\" AND `sub`=\"English\"";
			$run = mysqli_query($dbcon,$menu_list_data);

			if($row=mysqli_fetch_array($run))
			{   //`class`, `sub`, `rfid`, `date`, `attendence`
				$class 		= 	$row['class'];
				$sub 		= 	$row['sub'];
				$rfid 		= 	$row['rfid'];
				$date 		= 	$row['date'];
				$attendence = 	$row['attendence'];
				$attendenceList = json_decode($attendence);
			}
				
			var_dump($attendenceList);
				

				/*
				$student_data = "select * from `students_of_$class`";//select query for viewing users.
			
				$run = mysqli_query($dbcon,$student_data);

				while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
				{
					//SELECT `id`, `subject`, `time_start`, `time_end`, `teacher_name` FROM `class_time_table` WHERE 1
					$id  			= 	$row['id'];
					$roll_no 		= 	$row['roll_no'];
					$student_name 	= 	$row['student_name'];
					
				*/
			
				?>
						
						
						
				<div class="custom-control form-control-lg custom-checkbox">
					<input name="checklist[]" type="checkbox" value="<?php //echo $roll_no;?> "class="custom-control-input" id="customCheck<?php echo $roll_no;?>">
					<label class="custom-control-label" for="customCheck<?php //echo $roll_no;?>"><?php //echo $student_name;?></label>
			    </div>
				
							<?php //} ?>
							<?php //if(!$found){echo "<p>no one is ramian</p>";}?>
				<button class="btn btn-lg btn-primary btn-block" value="Submit" name="submit_attendence" type="submit"  method="post" <?php //if(!$found){echo "disabled";}?>>Submitt Attedence</button>
				</br>
				<a href="welcome.php" class="btn btn-lg btn-primary btn-block">Home</a>
				<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
							
	</form>
</body>
</html>
