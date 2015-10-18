<?php 
class Vote extends BaseModel {

	public function __construct() {
		parent::__construct();
	}

	public function view() {
		return array('id'=>1,'name'=>'rahul');
	}
}