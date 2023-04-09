<?php

class RfIdResponse{
	
	public $className;
    public $subName;
    public $teacherName;
	public $teacherEmail;
	
	
	
	
	public function __construct($mRfIdResponse, $className, $subName, $teacherName, $teacherEmail){
		if($mRfIdResponse != null){
			$this->className 		= $mRfIdResponse->className;
			$this->subName 			= $mRfIdResponse->subName;
			$this->teacherName 		= $mRfIdResponse->teacherName;
			$this->teacherEmail 	= $mRfIdResponse->teacherEmail;
		}
		else{	
			$this->className 		= $className;
			$this->subName 			= $subName;
			$this->teacherName 		= $teacherName;
			$this->teacherEmail 	= $teacherEmail;

		}
    }
	
	
	
}

?>