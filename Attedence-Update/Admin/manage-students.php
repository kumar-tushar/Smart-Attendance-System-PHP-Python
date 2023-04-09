<?php
session_start();

//if(!$_SESSION['email'])
//{

   // header("Location: index.php");
//}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Manage Rf id</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <!--<link href="signin.css" rel="stylesheet">-->
  </head>

  <body class="text-center">
        <div class="table-scrol">
             
             <h1 align="center">Manage students of class  <?php echo $_GET['class_name']; ?></h1>
               <!-- <div class="table-responsive">-->
                <table class="table table-bordered table-hover table-striped" >
                    <thead>
                    <tr>
                        <th>Roll No</th>
                        <th>Student Name</th>
                        <th>DELETE</th>
                    </tr>
                    </thead>
					
					<?php
					// `key_id`, `rf_id`, `class`, `time_table_table`, `students_table` 
					include("../database/db_conection.php");
					
					$class_name=$_GET['class_name'];
					
					$menu_list_data = "select * from `students_of_$class_name`";//select query for viewing users.
					
					$run = mysqli_query($dbcon,$menu_list_data);
 
					while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
					{
						//SELECT `id`, `subject`, `time_start`, `time_end`, `teacher_name` FROM `class_time_table` WHERE 1
						$id  			= 	$row['id'];
						$roll_no 		= 	$row['roll_no'];
						$student_name 	= 	$row['student_name'];
						
						
					?>

					<tr>
			<!--here showing results in the table -->
					 
						<td><?php echo $roll_no;?></td>
						<td><?php echo $student_name;?></td>
						
						<td><a href="delete-student.php?id=<?php echo $id;?>&class_name=<?php echo $class_name;?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
					</tr>
					<?php } ?>
                </table>
                <a href="add-new-student.php?class_name=<?php echo $class_name;?>"<button class="btn btn-success btn-block mw-100">add new</button></a>
				<a href="admin-account.php" class="btn btn-lg btn-primary btn-block mw-100">Home</a>
        </div>
       
  </body>
</html>