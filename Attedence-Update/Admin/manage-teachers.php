<?php
session_start();

//if(!$_SESSION['email'])
//{

   // header("Location: index.php");
//}

?>
<!doctype html>
<html>
<head lang="en">
   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Manage Teachers</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;

</style>

  <body class="text-center" background="../images/desk-1081708_960_720.jpg">
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<div class='page-header'>
		<div class="row">
			<div class="col-md-4">
				<div class="col-md-4">
					<a href="admin-account.php" class="btn btn-success btn-block mw-50">Home</a>
				</div>
			</div>
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<a href="add-new-teacher.php" class="btn btn-warning btn-block mw-50">Add New</a>
				</div>
			</div>
		</div>
	
	</div>
	
	
</div>
        <div class="table-scrol">
             <h1 align="center"></h1>
               <!-- <div class="table-responsive">-->
                <table class="table table-bordered table-hover table-striped ">
                    <thead>
                    <tr>
                        <th>Teacher's Name</th>
                        <th>Email</th>
                        <th>Pass</th>
						<th>RFID</th>
						<th>Lecture 1 class</th>
						<th>SUB1</th>
						<th>START TIME</th>
						<th>END TIME</th>
						<th>Lacture 2 class</th>
						<th>SUB2</th>
						<th>START TIME</th>
						<th>END TIME</th>
						<th>Lacture 3 class</th>
						<th>SUB3</th>
						<th>START TIME</th>
						<th>END TIME</th>
						<th>Lacture 4 class</th>
						<th>SUB4</th>
						<th>START TIME</th>
						<th>END TIME</th>
						<th>DELETE</th>
                    </tr>
                    </thead>
					
					<?php
					// `rf_id`, `name`, `email`, `pass`, `sub1`, `stime1`, `etime1`, `sub2`, `stime2`, `etime2`, `sub3`, `stime3`, `etime3`, `sub4`, `stime4`, `etime4` FROM `teachers`
					include("../database/db_conection.php");
					$menu_list_data = "select * from teachers";
					$run = mysqli_query($dbcon,$menu_list_data);
 
					while($row=mysqli_fetch_array($run))
					{ //SELECT `id`, `name`, `code` FROM `stations_list` WHERE 1
						$id 		= 	$row['id'];
						$rf_id 		= 	$row['rf_id'];
						$name 		= 	$row['name'];
						$email 		= 	$row['email'];
						$pass 		= 	$row['pass'];
						
						$class1     = $row['class1'];
						$sub1 		= $row['sub1'];
						$stime1 	= $row['stime1'];
						$etime1 	= $row['etime1'];
						
						
						$class2     = $row['class2'];
						$sub2 		= $row['sub2'];
						$stime2 	= $row['stime2'];
						$etime2 	= $row['etime2'];
						
						
						$class3     = $row['class3'];
						$sub3 		= $row['sub3'];
						$stime3 	= $row['stime3'];
						$etime3 	= $row['etime3'];
						
						
						$class4     = $row['class4'];
						$sub4 		= $row['sub4'];
						$stime4 	= $row['stime4'];
						$etime4 	= $row['etime4'];
						
					?>

					<tr>
			<!--here showing results in the table -->
					  
						<!--<td><?php /*echo $station_id;*/?></td>-->
						
						
						<td><?php echo $name;?></td>
						<td><?php echo $email; ?></td>
						<td><?php echo $pass;?></td>
						<td><?php echo $rf_id; ?></td>
						
						
						<td class="table-info"><?php echo $class1;?></td>
						<td><?php echo $sub1;?></td>
						<td><?php echo $stime1; ?></td>
						<td><?php echo $etime1;?></td>
						
						
						<td class="table-info"><?php echo $class2;?></td>
						<td><?php echo $sub2;?></td>
						<td><?php echo $stime2; ?></td>
						<td><?php echo $etime2;?></td>
						
						
						<td class="table-info"><?php echo $class3;?></td>
						<td><?php echo $sub3;?></td>
						<td><?php echo $stime3; ?></td>
						<td><?php echo $etime3;?></td>
						
						
						<td class="table-info"><?php echo $class4;?></td>
						<td><?php echo $sub4;?></td>
						<td><?php echo $stime4; ?></td>
						<td><?php echo $etime4;?></td>
						
						
						
						
						
					    <!--<td><a href="#"><button class="btn btn-success">Edit</button></a></td>-->
						<td><a href="delete-teacher.php?teacher_id=<?php echo $id;?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
					</tr>
					<?php } ?>
                </table>
              
        </div>
       
  </body>
</html>