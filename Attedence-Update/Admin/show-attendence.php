



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
<body background="../images/diary-92652_1920.jpg" class="text-center">
        <div class="table-scrol">
            <?php if(isset($_POST['class_name'])){ ?>
             <h1 align="center">Attetudents of class  <?php echo $_GET['class']; ?></h1>
               <!-- <div class="table-responsive">-->
                <table class="table table-bordered table-hover table-striped" >
                    <thead>
                    <tr>
                        <th>Roll No</th>
                        <th>Student Name</th>
						
                        <?php  // print date on top of table
						
			
				
							//$rf_id = $_GET['rf_id'];
							$class = $_GET['class'];
							$sub   = $_GET['sub'];
							include("database/db_conection.php");
							
							$date_list = "SELECT * FROM `attendances` WHERE `class`=\"$class\" AND `sub`=\"$sub\" ORDER BY `id` ASC";
							$run_date_list = mysqli_query($dbcon,$date_list);

							while($row_date_list=mysqli_fetch_array($run_date_list))
							{   //`class`, `sub`, `rfid`, `date`, `attendence`
								$class 		= 	$row_date_list['class'];
								$sub 		= 	$row_date_list['sub'];
								$rfid 		= 	$row_date_list['rfid'];
								$date 		= 	$row_date_list['date'];
								$attendence = 	$row_date_list['attendence'];
								//$attendenceList = json_decode($attendence);
								?>
								<th><?php echo $date ?></th>
								<?php
							}
							?>
						</tr>
                    </thead>
					
					
					
					
					
					<?php // prints names and roll numbers
				
					$class_name=$_GET['class'];
					
					$menu_list_data = "select * from `students_of_$class_name`";//select query for viewing users.
					
					$run = mysqli_query($dbcon,$menu_list_data);
 
					while($row=mysqli_fetch_array($run))
					{
						$id  			= 	$row['id'];
						$roll_no 		= 	$row['roll_no'];
						$student_name 	= 	$row['student_name'];
					?>

					<tr>
					 
							<td><?php echo $roll_no;?></td>
							<td><?php echo $student_name; ?></td>
							
							<?php
							//print attendence
							
							
							$attendence_list = "SELECT * FROM `attendances` WHERE `rfid`=\"$rf_id\" AND `class`=\"$class\" AND `sub`=\"$sub\" ORDER BY `id` ASC";
							$run_attendence_list = mysqli_query($dbcon,$attendence_list);

							while($row_attendence_list=mysqli_fetch_array($run_attendence_list))
							{   //`class`, `sub`, `rfid`, `date`, `attendence`
								
								$class 		= 	$row_attendence_list['class'];
								$sub 		= 	$row_attendence_list['sub'];
								$rfid 		= 	$row_attendence_list['rfid'];
								$date 		= 	$row_attendence_list['date'];
								$attendence = 	$row_attendence_list['attendence'];
								$attendenceList = json_decode($attendence);
								
								//var_dump($class);
								$my_attendance_status = "A";
								
								foreach($attendenceList as $atRollNo)
								{
									if($atRollNo == $roll_no){
										$my_attendance_status = "P";
										
									}
									
								}
								?> 
								<td><?php echo $my_attendance_status; ?></td>
								<?php
								
							}
							
							
					}?>
			  

						
						
		<?php
											
				}
				else{
					echo "<script>alert('Attendence not Avilable Yet!')</script>";		
					echo "<script>window.open('manage-classes.php','_self')</script>";
				}?>				
						
						
						<!--btn btn-danger is a bootstrap button to show danger-->
					</tr>
                </table>
                
        </div>
       
 </body>


</html>

