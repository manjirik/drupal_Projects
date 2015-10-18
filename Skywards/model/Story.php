<?php 
class Story extends BaseModel {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function view() {
		
		$obj = new stdclass();
		$obj->name = 'rahul';
		$obj->id = '5';
		$obj->A = array('temp','temp2');
		return $obj;
	}
	
	public function getData(){
		
	}
}