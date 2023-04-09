<?php

class Attendence{
	
	public $rollNo;
	public $name;
	public $attendance;
	
	
	public function __construct($mAttendence, $rollNo, $name, $attendance){
		if($mStudent != null){
			$this->rollNo 	= $mAttendence->rollNo;
			$this->name 	= $mAttendence->name;
			$this->attendance = $mAttendence->attendance;
		}
		else{
			$this->rollNo = $rollNo;
			$this->name = $name;
			$this->attendance = $attendance;
		}
	}
}
?>