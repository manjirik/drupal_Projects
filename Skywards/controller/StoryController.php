<?php
class StoryController extends BaseController {
	
	public function __construct() {
		parent::__construct();
		$this->loadModel('Story');
	}
	
	
	public function index(){
		$this->assign('msg','hi');
		//$this->template="landing";
		$this->render();
	}
	
	public function another() {
		$this->assign('msg','another');
		include(BASEPATH.DS."view".DS."header.php");
		$this->template="storylanding";
		include(BASEPATH.DS."view".DS."footer.php");
		$this->render();
	}
	
	public function view() {
		$data=$this->Story->view();
		print_r($data);
	}
} 
?>