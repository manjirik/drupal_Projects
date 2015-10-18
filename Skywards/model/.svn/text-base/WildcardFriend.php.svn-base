<?php 
class WildcardFriend extends BaseModel {
	
	public function __construct() {
		parent::__construct();
		$this->table_user='user';
	}
	
		
		/*
	 * Function name: checkWildCardUser
	 * Purpose: check user email address is present or not
	 * Parameters:
	 * 	$fields = email
	 * 	$values = columns values
	 * 	$table_name =  user
	 * Return value: 
	 * 	True: count of email
	 * 	False: fail
	 * Created By: nitin tatte 
	 * Updated By: nitin tatte / 1/2/2013	 
	 *
	 */

	public function checkWildCardUser($usersemails)
	{
        $sql_wild_card = "SELECT count(email) as cnt FROM $this->table_user WHERE email in ('".$usersemails."') or fb_id in ('".$usersemails."')";
		$wild_card_data=$this->db->get_results($sql_wild_card);
		return $wild_card_data[0]->cnt;
	}
	
	public function insert($params,$table_name) {		
		return parent::insert($params,$table_name);
	}
	public function update($params,$table_name,$where) {		
		return parent::update($params,$table_name,$where);
	}
	
	public function getResults($fields, $table_name, $where, $limit,$order_by) {		
		return parent::getResults($fields, $table_name, $where, $limit,$order_by);
	}
	
	
}