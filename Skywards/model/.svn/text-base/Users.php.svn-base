<?php 
class Users extends BaseModel {

	public function __construct() {
		parent::__construct();
	}

	public function view() {
		return array('id'=>1,'name'=>'rahul');
	}
	
	public function getResults($fields, $table_name, $where, $limit,$order_by) {		
		return parent::getResults($fields, $table_name, $where, $limit,$order_by);
	}
	
	/*
	 * Function name: insert
	 * Purpose: insert data into database
	 * Parameters:
	 * 	$fields = array with column name
	 * 	$values = array with column value
	 * 	$table_name = pass in function as a parameter
	 * Return value: 
	 * 	True: return true or 1
	 * 	False: fail
	 * Created By: sandeep j 03/02/2013
	 * Updated By: sandeep j	 
	 *
	 */


	public function insert($params,$table_name) {         
            return parent::insert($params,$table_name);
    }
	
	public function hasEntry($fbid) {
		$sql="SELECT user_entry_id FROM user_entry WHERE user_id=(SELECT user_id FROM user WHERE fb_id=".$fbid.")";
		
		$data=$this->db->get_results($sql);
		
		if($data && count($data)>0) {
			return true;
		}		
		else {
			return false;
		}
	}
	
	public function userExists($fb_user_info) {
		$sql="SELECT user_id FROM user WHERE fb_id=".$fb_user_info['id'];
		$data=$this->db->get_row($sql);
		if($data) {
			return $data->user_id;
		}
		else {
			return false;
		}
	}
	
	public function getFromUserEntry($entry_id) {
		$sql="SELECT 
				u1.user_id, 
				u2.firstname as first_name, 
				u2.lastname as last_name, 
				u2.fb_id,
				l.city_name,
				l.country_name
			FROM 
				user_entry u1, 
				user u2,
				location l
			WHERE 
				u1.user_entry_id=".$entry_id." AND 
				u1.user_id=u2.user_id AND
				u1.location_id=l.location_id";
		$data=$this->db->get_row($sql);
		$ret['user_id']=$data->user_id;
		$ret['first_name']=$data->first_name;
		$ret['last_name']=$data->last_name;
		$ret['fb_id']=$data->fb_id;
		$ret['city_name']=$data->city_name;
		$ret['country_name']=$data->country_name;
		return $ret;
	}
	
	public function getUserdata($fbid) {
		if($fbid=='' || !isset($fbid)) return false; 
		$sql="SELECT * FROM user WHERE fb_id=100001187318347";
		$data=$this->db->get_row($sql);
		
		return $data;
	}
	
}