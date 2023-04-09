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

    <title>Attedence OF Class</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <!--<link href="signin.css" rel="stylesheet">-->
  </head>


	<body class="text-center">
        <div class="table-scrol">
             <h1 align="center">Attendence of class  <?php echo $_GET['class_name']; ?></h1>
               <!-- <div class="table-responsive">-->
                <table class="table table-bordered table-hover table-striped" >
                    <thead>
                    <tr>
						<th>Roll No</th>
						<th>Student Name</th>
					<?php
					include("../database/db_conection.php");
					
					$cols = array();
					
					$class_name=$_GET['class_name'];
					
					$sql = "SHOW COLUMNS FROM `students_of_$class_name`";
					$result = mysqli_query($dbcon,$sql);
					
					
					while($row = mysqli_fetch_array($result)){
						$col = $row['Field'];
						if( $col == "id" ||  $col == "roll_no" || $col == "student_name" || $col == "image_name"){
							continue;
						}
						array_push($cols,$col);
						//var_dump($row);?>
						
						<th><?php echo $col; ?></th>
					
					<?php
						//$after_cloumn = $row['Field'];
					}?>
                        
                        
                    </tr>
                    </thead>
					
					<?php
					// `key_id`, `rf_id`, `class`, `time_table_table`, `students_table` 
					
					
					
					
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
						<?php
						for($i = 0; $i < count($cols); $i++){
							if($row[$cols[$i]] == "P"){
								$value  = "Persent";
								echo "<td class=\"p-3 mb-2 bg-success text-white\">".$value."</td>";
							}
							else{
								$value  = "Absent";
								echo "<td class=\"p-3 mb-2 bg-danger text-white\">".$value."</td>";
							}
							
						}
						?>
						
						
						
					</tr>
					<?php } ?>
                </table>
                <!--<a href="add_new_student.php?class_name=<?php echo $class_name;?>"<button class="btn btn-success btn-block mw-100">add new</button></a>-->
				<a href="admin-account.php" class="btn btn-lg btn-primary btn-block mw-100">Home</a>
        </div>
       
	</body>
</html>