<?php 

class Weather
{
	public static $response;
	public static $error = false;
	
	public function __construct()
	{
		$this->location = '';
	}
	
	public function get()
	{
		if (empty($this->location)) {
			$this->error = true;
			return false;
		}
		//$requestAddress = "http://www.google.com/ig/api?weather=".trim(urlencode($this->location))."&hl=en";
		$requestAddress = "http://api.wunderground.com/auto/wui/geo/WXCurrentObXML/index.xml?query=".trim(urlencode($this->location));
		$xml_str = file_get_contents($requestAddress);

		//var_dump($xml_str);
		$xml = new SimplexmlElement($xml_str);
		
		if (!$xml->response) {
			$this->response = $xml;
			//$this->parse();
			$this->error = false;
		}else{
			$this->error = true;
		}
	}
	
		
	public function display()
	{
			$weather_info_data=array("temp_observation_time" => $this->response->observation_time_rfc822,"min_temp"=>$this->response->dewpoint_string,"min_temp"=>$this->response->dewpoint_string,"max_temp"=>$this->response->temperature_string,"humidity"=>$this->response->relative_humidity,"wind"=>$this->response->wind_string);
			
			/*$weather_info_data='<div class="weatherIcon"><h2>'.$this->response->observation_time_rfc822.' </h2> <br /><b>Min:</b> '.$this->response->dewpoint_string.'<br /><b>Max:</b> '.$this->response->temperature_string.'<br /><b>Humidity:</b> '.$this->response->relative_humidity.' <br /><b>Wind: </b>'.$this->response->wind_string.'</div>';*/
				
			return 	$weather_info_data;	
			
	}
	
	
}