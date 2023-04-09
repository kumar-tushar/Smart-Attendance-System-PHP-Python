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

    <title>Manage Subjects</title>
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
					<a href="add-new-subject.php" class="btn btn-warning btn-block mw-50">Add New</a>
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
                        <th>Id</th>
                        <th>Name</th>
                        <th>DELETE</th>
						
                    </tr>
                    </thead>
					
					<?php
					
					include("../database/db_conection.php");
					$menu_list_data = "select * from subjects";
					$run = mysqli_query($dbcon,$menu_list_data);
 
					while($row=mysqli_fetch_array($run))
					{ //SELECT `id`, `name` FROM `subjects` WHERE 1
						$id 		= 	$row['id'];
						$name 		= 	$row['name'];
						
						
					?>

					<tr>
			<!--here showing results in the table -->
					  
						<!--<td><?php /*echo $station_id;*/?></td>-->
						
						
						<td><?php echo $id;?></td>
						<td><?php echo $name; ?></td>
				
						
						
						
						
						
					    <!--<td><a href="#"><button class="btn btn-success">Edit</button></a></td>-->
						<td><a href="delete-subject.php?sub_id=<?php echo $id;?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
					</tr>
					<?php } ?>
                </table>
              
        </div>
       
  </body>
</html>