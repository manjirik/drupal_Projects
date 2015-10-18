<?php 
class Getcity extends BaseModel {
	
	public function __construct() {
		parent::__construct();
		$this->table = 	'tbl_cityname';
	}
	
	public function getcitydata() {
		$sql = "SELECT * FROM location WHERE is_emirates_location = 1 AND status = 1 order by city_name";
	 	$data=$this->db->get_results($sql);
		//print_r($data);
		return $data;
	}
	
	public function getEmiratesCities() {
		$sql = "SELECT * FROM location WHERE is_emirates_location = 1 AND status = 1 order by city_name";
	 	$data=$this->db->get_results($sql);
		//print_r($data);
		return $data;
	}
	
	public function IsEmiratesCity($city) {
		if(!empty($city)) { 
		$sql="SELECT is_emirates_location FROM location WHERE  status = 1 AND city_name like '$city%'";
		$data=$this->db->get_var($sql);
		
			if($data) 
			 {
				return $data; 
			}
			else{
				return false; 
			}
		}else
		{
			 return false; 
		}
		
	}
	public function getCityLatlant($city) {
		//$cityPart=explode(',',$city);
		//$cityName=$cityPart[0];
		
		if($city!='') {
		$sql = "SELECT latitude as lat, longitude as lng FROM location WHERE city_name LIKE '%$city%' ";
		//echo $sql.'<br />';
	 	$d=$this->db->get_row($sql);
		//if(1) {
		if(!$d) {
			
				$file="https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode(utf8_encode($city))."&sensor=true";
			//echo $file.'<br />';
				$dataJson=file_get_contents($file);
				$data=json_decode($dataJson);	
				//var_dump($data->status);
				if($data->status!="OVER_QUERY_LIMIT" && $data->status!="ZERO_RESULTS") {
					$d=$data->results[0]->geometry->location;
					$sql3="INSERT INTO location 
								(location_id, 
								city_name,
								city_image,
								short_desc,
								latitude,
								longitude,
								continent_id,
								country_name,
								status,
								destination_cnt,
								is_emirates_location,
								temprature,
								city_image2,
								city_image3,
								city_image4,
								city_image5) 
								
							VALUES (
								NULL, 
								'$city',
								'',
								'', 
								'".$data->results[0]->geometry->location->lat."',
								'".$data->results[0]->geometry->location->lng."',
								'',
								'',
								'1',
								'',
								'0',
								'',
								'',
								'',
								'',
								'')";
								
					//echo $sql3.'<br />';
					$this->db->query($sql3);
				}
				else {
					return false;
				}
				
			
			
		}
		
			return $d;
		}
		else 
		{
			return false;
		}
	}
	
	public function getUserLocation($fbid) {
		if(!isset($fbid) || $fbid=='') return false;
		
		$where=" fb_id=".$fbid;
		$fields=array('current_location','home_town');
		$data=$this->getResults($fields,'user',$where);
		if(isset($data[0]->current_location) && $data[0]->current_location!="") {
			$location=$data[0]->current_location;
		}
		else if(isset($data[0]->home_town) && $data[0]->home_town!="") {
			$location=$data[0]->home_town;
		}
		
		return $location;
	}
	
	function getLocationid($location,$latlang) {
		$sql="SELECT location_id FROM location WHERE city_name LIKE '%".$location."%'";
		$data=$this->db->get_row($sql);
			return $data->location_id;
		
	}
	
}