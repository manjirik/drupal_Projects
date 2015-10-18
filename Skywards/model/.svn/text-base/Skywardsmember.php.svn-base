<?php 
class Skywardsmember extends BaseModel {

	public function __construct() {
		parent::__construct();
	}

	public function view() {
		return array('id'=>1,'name'=>'poc');
	}
	public function insert($params,$table_name) {		
		return parent::insert($params,$table_name);
	}
	public function update($params,$table_name,$where) {		
		return parent::update($params,$table_name,$where);
	}
	
	public function delete($table_name, $where) {		
		return parent::delete($table_name, $where);
	}
	
	public function getResults($fields, $table_name, $where, $limit,$order_by) {		
		return parent::getResults($fields, $table_name, $where, $limit,$order_by);
	}
	
	public function isValidEntry($entry_id, $data,$fb_user_info) {
		$sql="SELECT user_entry_details_id FROM user_entry_details WHERE friend_id='".$data."' AND user_entry_id=".$entry_id." AND friend_id='".$fb_user_info['id']."'";
		if($this->db->get_row($sql)) {
			return true;
		}
		else {
			$sql2="SELECT user_entry_details_id FROM user_entry_details WHERE friend_email='".$data."' AND user_entry_id=".$entry_id." AND friend_email='".$fb_user_info['email']."'";
			if($this->db->get_row($sql2)) {
				return true;
			}
			else {
				false;
			}
		}
	}
	
	public function AcceptInvitation($entry_id, $data) {
		$sql="UPDATE user_entry_details SET 
				acceptance_status=1,
				acceptance_date='".date('Y-m-d h:i:s')."'
			WHERE 
				user_entry_id=".$entry_id." AND (
					friend_id='".$data."' OR 
					friend_email='".$data."'
			)";
			
		if($this->db->query($sql)) {
			return true;
		}
		else {
			return false;
		}
		
	}
	
	public function getEntry($entry_id) {
		if(!isset($entry_id) || $entry_id=="") return false;
		$sql="SELECT u1.*, l.city_name, u2.fb_id FROM user_entry u1, location l,user u2 
		
			WHERE 
			u1.location_id = l.location_id AND
				u1.user_entry_id=".$entry_id." AND 
				u2.user_id=u1.user_id";
		$data=$this->db->get_row($sql);
		if($data) {
			return $data;
		}
		else
		{
			return false;
		}
	}
	
	public function entryDetails($entry_id, $data) {
		if(!isset($entry_id) || $entry_id=="" || !isset($data) || $data=="") 
			return false;
			
		$sql="SELECT user_entry_details_id, firstname as first_name, lastname as last_name FROM user_entry_details WHERE user_entry_id=".$entry_id." AND 
			(
				friend_id='".$data."' OR
				friend_email='".$data."'
			)";
			
		$data=$this->db->get_row($sql);
		if($data) 
		{
			return $data;
		}
		else
		{
			return false;
		}
	}
}
?>