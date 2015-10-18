<?php
class VoteController extends BaseController {
	
	public function __construct() {
		parent::__construct();
		$this->loadModel('Vote');
	}
	
	public function index(){
		$this->assign('msg','hi');
		//$this->template="landing";
		$this->render();
	}
	
	public function vote() {
		$this->assign('msg','vote');
		$this->template="landing";
		$this->render();
	}
	
	public function view() {
		echo 'here';
		//$data=$this->Vote->view();		
	}
} 
?>