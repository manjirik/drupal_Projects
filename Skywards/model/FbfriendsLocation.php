<?php 
class FbfriendsLocation extends BaseModel {

	public function __construct() {
		parent::__construct();	
		$this->table = 	'fb_friends_location';
	}

	public function getLangLat($city) {	
		$city_data = array();		 
	    $sql = "SELECT lati, longi FROM $this->table WHERE city like '%$city%'";
	 	$data=$this->db->get_results($sql);
	 	 
	 	if(!$data)
		{
		 	$file="https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode(utf8_encode($city))."&sensor=true";
			
			$dataJson=file_get_contents($file);
			$data=json_decode($dataJson);	
			
			if($data->status == "OVER_QUERY_LIMIT"){
				echo 'in<br />';
				sleep(2);
			}
			
		
			if($data && (isset($data->results) && count($data->results)> 0)){
				 
				$latlang=$data->results[0]->geometry->location;			
				$city_data['lati'] = $lati = $data->results[0]->geometry->location->lat;
		 		$city_data['longi'] = $longi =  $data->results[0]->geometry->location->lng;
		 		echo $ins_db = "INSERT INTO $this->table (id,city,lati,longi) VALUES (NULL ,  '$city',  '$lati',  '$longi');";
		 		$ins = $this->db->query($ins_db);	
		 		echo '<br />'.$ins; 	 		 
		 		
			}	 		
	 	}else{
	 		//echo 'in else..';
	 		$city_data['lati'] = $data[0]->lati;
	 		$city_data['longi'] = $data[0]->longi;
	 	}	 
	 	  	 	 
	 	return $city_data;  		   
	}
	
	public function HasAccessedApp($fbid) {
		$sql="SELECT * FROM user WHERE fb_id=".$fbid;
		//echo $sql.'<br />';
		$data=$this->db->get_row($sql);
		if($data) return true;
		else return false;
	}
}