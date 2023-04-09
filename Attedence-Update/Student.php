<?php

class Student{
	
	public $rollNo;
	public $name;
	public $imagePath;
	
	
	public function __construct($mStudent, $rollNo, $name, $imagePath){
		if($mStudent != null){
			$this->rollNo = $mStudent->rollNo;
			$this->name = $mStudent->name;
			$this->imagePath = $mStudent->imagePath;
		}
		else{
			$this->rollNo = $rollNo;
			$this->name = $name;
			$this->imagePath = $imagePath;
		}
	}
}
?>