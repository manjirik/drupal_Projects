<?php 
class Myentries extends BaseModel {

	public function __construct() {
		parent::__construct();
		$this->table_user='user';
	}
	
	public function getUsersData()
	{
		$sql = "SELECT * from user";
	 	$resultSet=$this->db->get_results($sql);
		if(count($resultSet) > 0){
		 	foreach ($resultSet as $key => $value) {
		 		$userData[$value->user_id] = $value;
		 	}
	 	}
	 	return $userData;
	}

		
	public function getLocationData($location_id)
	{
		
		$sql = "SELECT l.location_id,l.city_name,l.short_desc,l.city_image,l.city_image2,l.country_name,l.latitude,l.longitude,c.* from location as l LEFT JOIN continent as c ON  c.continent_id = l.continent_id where l.location_id='".$location_id."'";

		$resultSet=$this->db->get_results($sql);

				
		if(count($resultSet) > 0){
		 	foreach ($resultSet as $key => $value) {
				
				$locationData['latitude'] = $value->latitude;
		 		$locationData['longitude'] = $value->longitude;
		 		$locationData['city_name'] = $value->city_name;
		 		$locationData['short_desc'] = $value->short_desc;
		 		$locationData['country_name'] = $value->country_name;
		 		$locationData['continent_name'] = $value->continent_name;
				$locationData['city_image'] = $value->city_image;
				$locationData['city_image2'] = $value->city_image2;				
		 	}
	 	}
		
	 	return $locationData;
	}
	
	public function getUserEntries($user_id)
	{
		//$userData = $this->getUsersData();
		
		$sql = "SELECT ue.*,ued.* from user_entry as ue LEFT JOIN user_entry_details as ued ON  ued.user_entry_id = ue.user_entry_id WHERE ue.user_id=".$user_id;
		
	 	$resultSet=$this->db->get_results($sql);
	 	if(count($resultSet) > 0){
		 	foreach ($resultSet as $key => $value) {

				$entryData[$value->user_entry_id]['ticketEntry'][] = $value;
		 	}
	 	}
		
	 	return $entryData;
	}
	
	public function getStory()
	{
		$query = "SELECT ue.entry_story, l.city_image FROM `user_entry` as ue, `location` as l where ue.location_id=l.location_id and ue.is_featured = 1 order by user_entry_id desc";
		$results = $this->db->get_results($query);
		if($results)
			return $results;
		return false;
	}

	public function getFriendList($uid)
	{

		$query_friendslist = "SELECT ued.friend_id from user_entry as ue LEFT JOIN user_entry_details as ued ON  ued.user_entry_id = ue.user_entry_id WHERE ue.user_id='".$uid."'";
		$results_friendlist = $this->db->get_results($query_friendslist);
		if($results_friendlist)
			return $results_friendlist;
		return false;
	}
	/*Added for the privacy Policy return button function code start .*/
	public function getCountUserEntries($user_id)
	{

		$sql = "SELECT FOUND_ROWS() AS found_rows from user_entry as ue LEFT JOIN user_entry_details as ued ON  ued.user_entry_id = ue.user_entry_id WHERE ue.user_id=".$user_id;
		$rows = $this->db->get_row($querycount_friendslist);
		return $rows->found_rows; 
		
	}
	/*Added for the privacy Policy return button function code end.*/

	public function insert($params,$table_name) {         
            return parent::insert($params,$table_name);
      }

	  public function update($paramArray,$table_name,$where) { 
		   return parent::update($paramArray,$table_name,$where);
      }


    public function getResults($fields, $table_name, $where, $limit,$order_by) {		
		return parent::getResults($fields, $table_name, $where, $limit,$order_by);
	}
	
	/*
	 * Function name: replace
	 * Purpose: replace table data (multiple rows supported)
	 * Parameters:
	 * 	$fields = array, table columns
	 * 	$values = array, columns values
	 * 	$table_name = string
	 * Return value: 
	 * 	True: inserted rows
	 * 	False: fail
	 * Created By: Sandeep Jahagirdar / 02-03-2013
	 * Updated By: Your Name / Date	 
	 *
	 */
	public function replace($fields, $values,$table_name) {		
		return parent::replace($fields,$values,$table_name);
	}


	/*
	 * Function name: checkskywardsmember
	 * Purpose: check user is skywards user or not
	 * Parameters:
	 * 	$fields = fbid or email
	 * 	$values = string,string
	 * 	* Return value: 
	 * 	True: count
	 * 	False: fail
	 * Created By: nitin tatte / 02-03-2013
	 * Updated By: nitin tatte/ 02-03-2013	 
	 *
	 */


	public function checkskywardsmember($usersemails)
	{
        $sql_sky_mem = "SELECT count(user_id) as cnt FROM $this->table_user WHERE sky_mem_id!='' and is_active=1 and (email in ('".$usersemails."') or fb_id in ('".$usersemails."'))";
		$sky_mem_data=$this->db->get_results($sql_sky_mem);
		return $sky_mem_data[0]->cnt;
	}
	
	public function delete($table_name, $where) {		
		return parent::delete($table_name, $where);
	}
	
	public function getEntries(){
		$query = "SELECT ue.`user_entry_id` , ue.`user_id` , ue.`location_id` , l.city_image3 as city_image , l.city_name,
				u.firstname, u.lastname,u.fb_id, ued.friend_details
				FROM  `user_entry` ue 
				INNER JOIN  `location` l ON l.location_id = ue.location_id
				INNER JOIN (SELECT user_entry_id, GROUP_CONCAT(concat(' ',firstname,' ',lastname )) AS friend_details
							FROM  `user_entry_details` 
							GROUP BY user_entry_id)ued 
				ON ue.`user_entry_id` = ued.`user_entry_id`
				INNER JOIN user u ON u.user_id = ue.user_id
				ORDER BY  `ue`.`user_entry_id` DESC
				LIMIT 0 , 10";
		$results = $this->db->get_results($query);
		if($results)
			return $results;
		return false;
	}
		
	
}