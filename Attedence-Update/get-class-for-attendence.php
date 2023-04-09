<?php

include("database/db_conection.php");

require "RfIdResponse.php";


if(isset($_POST['rf_id'])){
	
	$rf_id = $_POST['rf_id'];
	$time = $_POST["time"];
	//echo "TIME".strtotime($time);
	
	$check_user="select * from teachers WHERE rf_id='$rf_id'";
	$run=mysqli_query($dbcon,$check_user);

    if(mysqli_num_rows($run))
    { 
//`id`, `rf_id`, `name`, `email`, `pass`, `class1`, `sub1`, `stime1`, `etime1`, `class2`, `sub2`, `stime2`, `etime2`, `class3`, `sub3`, `stime3`, `etime3`, `class4`, `sub4`, `stime4`, `etime4`
		$row = mysqli_fetch_array($run);
		
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
		
		//echo "<time>";
		//var_dump($time);
		
		
		$mRfIdResponse =  new RfIdResponse(null, "INVALID_TIME_OR_CLASS","INVALID_TIME_OR_CLASS","INVALID_TIME_OR_CLASS","INVALID_TIME_OR_CLASS", "INVALID_TIME_OR_CLASS");
		
		if(strtotime($time) >= strtotime($stime1) &&  strtotime($time) <= strtotime($etime1)){
			//$mRfIdResponse, $className, $subName, $teacherName, $teacherEmail){
			$mRfIdResponse =  new RfIdResponse(null, $class1 , $sub1, $name, $email);
			//echo $class1.$sub1.$stime1.$etime1;
			
		}
		else if(strtotime($time) >= strtotime($stime2) &&  strtotime($time) <= strtotime($etime2)){
			$mRfIdResponse =  new RfIdResponse(null, $class2 , $sub2,  $name, $email);
			//echo $class2.$sub2.$stime2.$etime2;
		}
		else if(strtotime($time) >= strtotime($stime3) &&  strtotime($time) <= strtotime($etime3)){
			$mRfIdResponse =  new RfIdResponse(null, $class3 , $sub3, $name, $email);
			//echo $class3.$sub3.$stime3.$etime3;
		}
		else if(strtotime($time) >= strtotime($stime4) &&  strtotime($time) <= strtotime($etime4)){
			$mRfIdResponse =  new RfIdResponse(null, $class4 , $sub4, $name, $email);
			//echo $class4.$sub4.$stime4.$etime4;
		}
		
		$jsonStr = json_encode($mRfIdResponse);
		
		
    }
    else
    {
		$mRfIdResponse =  new RfIdResponse(null, "RF_ID_NOT_REGISTRED","RF_ID_NOT_REGISTRED","RF_ID_NOT_REGISTRED","RF_ID_NOT_REGISTRED", "RF_ID_NOT_REGISTRED");
		
		$jsonStr = json_encode($mRfIdResponse);
    }
	//echo "</br>";echo "</br>";echo "</br>";
	echo $jsonStr;
	
	
}


?>