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
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="..\bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>Manage Classes</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;

</style>

  <body class="text-center" background="../images/desk-1081708_960_720.jpg">
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
					<a href="add-new-class.php" class="btn btn-warning btn-block mw-50">Add New</a>
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
                        <th>Class Id</th>
                        <th>Class Name</th>
						<th>Manage Students</th>
						<!--<th>Show Attendence</th>-->
                        <th>DELETE</th>
                    </tr>
                    </thead>
					
					<?php
					include("../database/db_conection.php");
					$menu_list_data = "select * from classes";
					$run = mysqli_query($dbcon,$menu_list_data);
 
					while($row=mysqli_fetch_array($run))
					{ //SELECT `id`, `name`, `code` FROM `stations_list` WHERE 1
						$id 		= $row['id'];
						$class_name = $row['class_name'];					
					?>

					<tr>
			<!--here showing results in the table -->
					  
						<!--<td><?php /*echo $station_id;*/?></td>-->
						<td><?php echo $id;?></td>
						<td><?php echo $class_name; ?></td>
						
					    <!--<td><a href="#"><button class="btn btn-success">Edit</button></a></td>-->
						<td><a href="manage-students.php?class_id=<?php echo $id;?>&class_name=<?php echo $class_name ?>"><button class="btn btn-warning">Manage Students</button></a></td>
						<!--<td><a href="show-attendence.php?class_id=<?php echo $id;?>&class_name=<?php echo $class_name ?>"><button class="btn btn-warning">Show Attendence</button></a></td>-->
						<td><a href="delete-class.php?class_id=<?php echo $id;?>&class_name=<?php echo $class_name ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
					</tr>
					<?php } ?>
                </table>
              
        </div>
       
  </body>
</html>