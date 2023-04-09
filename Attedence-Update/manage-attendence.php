<?php
session_start();//session starts here

?>



<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>Add New Teacher</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;

</style>

<body background="../images/diary-92652_1920.jpg">


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Manage Attendence</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="add-new-teacher.php">
                        <fieldset>							
					
							 <?php
								include("database/db_conection.php");
								$rf_id = $_SESSION['RF_ID'];
								//var_dump($rf_id);

								$menu_list_data = "select * from teachers WHERE rf_id= $rf_id";
								$run = mysqli_query($dbcon,$menu_list_data);
								if($row=mysqli_fetch_array($run))
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
									
								<a href="update-attendence.php?rf_id=<?php echo $rf_id; ?>&class=<?php echo $class1; ?>&sub=<?php echo $sub1; ?>" class="btn btn-md btn-warning btn-block" type="submit" >Update <?php echo $class1; ?>/<?php echo $sub1; ?></a>
								<a href="update-attendence.php?rf_id=<?php echo $rf_id; ?>&class=<?php echo $class2; ?>&sub=<?php echo $sub2; ?>" class="btn btn-md btn-warning btn-block" type="submit" >Update <?php echo $class2; ?>/<?php echo $sub2; ?></a>
								<a href="update-attendence.php?rf_id=<?php echo $rf_id; ?>&class=<?php echo $class3; ?>&sub=<?php echo $sub3; ?>" class="btn btn-md btn-warning btn-block" type="submit" >Update <?php echo $class3; ?>/<?php echo $sub3; ?></a>
								<a href="update-attendence.php?rf_id=<?php echo $rf_id; ?>&class=<?php echo $class4; ?>&sub=<?php echo $sub4; ?>" class="btn btn-md btn-warning btn-block" type="submit" >Update <?php echo $class4; ?>/<?php echo $sub4; ?></a>
								
								
								
								
								
								<a href="show-attendence.php?rf_id=<?php echo $rf_id; ?>&class=<?php echo $class1; ?>&sub=<?php echo $sub1; ?>" class="btn btn-md btn-success btn-block" type="submit" >Show <?php echo $class1; ?>/<?php echo $sub1; ?></a>
								<a href="show-attendence.php?rf_id=<?php echo $rf_id; ?>&class=<?php echo $class2; ?>&sub=<?php echo $sub2; ?>" class="btn btn-md btn-success btn-block" type="submit" >Show <?php echo $class2; ?>/<?php echo $sub2; ?></a>
								<a href="show-attendence.php?rf_id=<?php echo $rf_id; ?>&class=<?php echo $class3; ?>&sub=<?php echo $sub3; ?>" class="btn btn-md btn-success btn-block" type="submit" >Show <?php echo $class3; ?>/<?php echo $sub3; ?></a>
								<a href="show-attendence.php?rf_id=<?php echo $rf_id; ?>&class=<?php echo $class4; ?>&sub=<?php echo $sub4; ?>" class="btn btn-md btn-success btn-block" type="submit" >Show <?php echo $class4; ?>/<?php echo $sub4; ?></a>
								<?php } ?>
								
							
						
							
							
							
						
							<a href="log-out.php" class="btn btn-md btn-info btn-block" type="submit" >Log Out</a>
							
                        
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>