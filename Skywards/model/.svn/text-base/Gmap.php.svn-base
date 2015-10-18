<?php 
class Gmap extends BaseModel {
	
	public function __construct() {
		parent::__construct();
		$this->table = 	'location';
		$this->table_user='user';
	}
	
	public function isDestinationLock($latLan)
	{
		$lockDestinations[0] = '18.52242271380059,73.8552474975586';
		$lockDestinations[1] = '26.863280626766237,75.76171875';
		$lockDestinations[2] = '13.111580118251648,80.244140625';
		if(in_array($latLan,$lockDestinations)){
			return true;
		}
		return false;
	} 
	public function selectDestination($latLan){
		$isDestinationLock = $this->isDestinationLock($latLan);
		if($isDestinationLock === true){
			return false;
		}else{
			return true;
		}
	}
	
	/*
	 * Function name: getWeatherInformation() do not use this function this function is discarted
	 * Purpose: get the city temprature from API
	 * Parameters: Cit name 
	 * 	$fields = array, table columns
	 * 	$values = array, columns values
	 * 	$table_name = string
	 * Return value: 
	 * 	True: inserted rows
	 * 	False: fail
	 * Created By: Rajesh Patil / 2013-01-02
	 * Updated By: Rajesh Patil / Date	 
	 *
	 */
	 
	function getWeatherInformation($city) 
	{
		
		$sql = "SELECT * FROM $this->table WHERE city_name='$city'";
	 	$data=$this->db->get_results($sql);
		
		if($data[0]->city_temp=="")
		{	
			$file3="http://openweathermap.org/data/2.1/find/name?q=".urlencode(utf8_encode($city))."&units=imperial";
			$ch = curl_init();
			$timeout = 5;
			curl_setopt($ch,CURLOPT_URL,$file3);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
			$fileContent = curl_exec($ch);
			curl_close($ch);
			$data3=json_decode($fileContent);
		
			foreach($data3->list as $weatherinfo)
			{
				
				foreach($weatherinfo->main as $weather)
				{	
						
						/* $sql = "UPDATE $this->table SET city_temp='".$weatherinfo->main->temp."' WHERE city_name='".$weatherinfo->name."'";
						$ins = $this->db->query($sql); */
						
						$arrofweather["name"] = $weatherinfo->name;
						$temp = $this->getexcettemp($weatherinfo->main->temp);
						$arrofweather["temp"] = $temp;
					/* 	$arrofweather["temp_min"] =$weatherinfo->main->temp_min;
						$arrofweather["temp_max"] = $weatherinfo->main->temp_max;
						$arrofweather["humidity"] = $weatherinfo->main->humidity;
						$arrofweather["speed"] = $weatherinfo->wind->speed;
						$arrofweather["deg"] = $weatherinfo->wind->deg;
						$arrofweather["gust"] = $weatherinfo->wind->gust;
						$arrofweather["clouds"] = $weatherinfo->clouds->all;
						$arrofweather["date"] = $weatherinfo->date; */
				}
			}
		 }else
		 {
			$sql = "SELECT * FROM $this->table WHERE city_name='$city'";
			$data=$this->db->get_results($sql);
			
			$arrofweather["name"] = $data[0]->city_name;
			$arrofweather["temp"] = $data[0]->city_temp;
		 }

		return $arrofweather;
	}
	
	public function getexcettemp($getemp)
	{
		$temp1=(($getemp-32)*5)/9;
		return round($temp1,1);
	
	}
	/* public function SaveDestination($location_id,$CurrentFBID)
	{	
		
		$sql="SELECT ue.user_entry_id from user as u ,user_entry as ue   where u.user_id=ue.user_id and u.fb_id=".$CurrentFBID." and ue.location_id=".$location_id;
		$data=$this->db->get_row($sql);
		
		if($data->user_entry_id) 
		{
			$returndata = "ALREADYADDED";
			
		}else
		{
			$returndata = "NEWENTRY";
		}
		 
		return $returndata; 
	} */
	
	public function getCityInfo($city)
	{
					 
		$sql = "SELECT * FROM $this->table WHERE city_name='$city'";
	 	$data=$this->db->get_results($sql);
				
		 $city_info_array=array("name"=>$data[0]->city_name,"desc"=>"","img"=> SITE_URL."images/emirates_destination/".$data[0]->city_image,"link"=>"","lati"=>$data[0]->latitude,"longi"=>$data[0]->longitude);

		return $city_info_array;

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
	
	public function SaveEntryDetails($params) {
		$data['user_entry_id']=$params['entry_id'];
		$data['friend_id']=$params['user_id'];
		$data['friend_email']=$params['email'];
		
		$this->insert($data,"user_entry_details");
	}
	
	
	public function getuserwheredesti($loc_id)
	{
		$query = "SELECT u.fb_id FROM `user` as u, `user_entry` as ue where u.user_id=ue.user_id and ue.location_id = ".$loc_id."";
		$results = $this->db->get_results($query);
		if($results)
			return $results;
		return false;
	}
	
	public function getLocationDeatils($location_id)
	{
		$sql="SELECT  	location_id,city_name,city_image,latitude,country_name,continent_id,longitude,temprature,short_desc FROM location WHERE location_id =".$location_id;
		
		$results = $this->db->get_results($sql);
		if($results)
			return $results;
		return false;
	}
	
	/* Depricated method - not in use */
	public function getDestinationFreinds($location_id,$fb_friends)
	{
		$sql="SELECT u.fb_id,u.firstname,u.lastname,ue.user_entry_id from user as u ,user_entry as ue WHERE u.user_id=ue.user_id and ue.user_id IN (".$fb_friends.") and ue.location_id=".$location_id;
		
		$results = $this->db->get_results($sql);
		if($results)
			return $results;
		return false;
	}

	public function getDestinationFriends ($location_id,$fb_friends) {	
		if($location_id != '' && $fb_friends != '') {
			$sql_friends = "(SELECT  `user_id` 
							FROM  `user` 
							WHERE 
							`fb_id` 
							IN ( ".$fb_friends." ))";
			$sql="SELECT u.fb_id
					,u.firstname
					,u.lastname
					,ue.user_entry_id 
				FROM user as u ,user_entry as ue 
				WHERE u.user_id=ue.user_id and ue.user_id IN (".$sql_friends.") and ue.location_id=".$location_id;
			
			$results = $this->db->get_results($sql);
			if($results)
				return $results;
			return false;
		} else {
			return false;
		}
	}
	public function setCurrentLocation($data) {
		$params=array();
		$params['current_location']=$data['city'];
		$where=" fb_id=".$data['fbid'];
		$this->update($params,'user',$where);
	}


	/*
	 * Function name: fetch_locked_continents
	 * Purpose: This function fetches continents data.
	 *   Parameters:
	 * 	$fields= user_id
	 * 	$values = int
     * Return value:  array of continents
	 * Created By: nitin tatte / 9/2/2013	 
	 * Updated By: nitin tatte / 9/2/2013	 	 
	 *
	 */

	public function fetch_locked_continents($user_id)
	{
		if(empty($user_id))
		{
			return false;
		}
		else
		{
		
			$continent_sql = "SELECT c.* FROM user_entry as ue LEFT JOIN location as l
							ON ue.location_id=l.location_id LEFT JOIN continent as c ON c.continent_id  = l.continent_id where ue.user_id='".$user_id."' and ue.continent_lock_status='1'";
			$continent_data=$this->db->get_results($continent_sql);
			foreach($continent_data as $cont_data)
			{
				$cont_data_arr[]= array('continent_id'=>$cont_data->continent_id,'continent_name'=>$cont_data->continent_name);
				
			}

			return $cont_data_arr;
		}
	}

}