<?php
class Commonfunc {
	
	public function __construct()
	{
		//$this->loadLibrary('Weather');
	}
	
	public function getEmiratesDestinations()
	{
		$destinations['Dubai'] = '25.271009345647187, 55.30755526123039';
		$destinations['Adelaide'] = '35.63692856, -120.69406128';
		$destinations['Washington'] = '48.18180084, -121.97963715';
		$destinations['Mumbai'] = '19.12000084, 72.84999847';
		$destinations['London'] = '35.34138489, -93.23649597';
		return $destinations;
	}
	
	public function get_city_info_html($arr_city_weather_info)
	{
      
	   $html_info_city_weather='<TABLE width="300" cellpadding="2" cellscpacing="2" border="1"> 
								 <TR>
									<TD style="text-align:top"><img src="'.$arr_city_weather_info["img"].'" height="100" width="100"></TD>
									<TD ><b>'.$arr_city_weather_info["name"].' </b><br>'.$arr_city_weather_info["desc"].', <a href="'.$arr_city_weather_info["link"].'">Know More</a></TD>
								 </TR>
								 <TR>
									<TD>Weather Informaition</TD>
									<TD><div class="weatherIcon"><h2>'.$arr_city_weather_info["temp_observation_time"].' </h2> <br /><b>Min:</b> '.$arr_city_weather_info["min_temp"].'<br /><b>Max:</b> '.$arr_city_weather_info["max_temp"].'<br /><b>Humidity:</b> '.$arr_city_weather_info["humidity"].' <br /><b>Wind: </b>'.$arr_city_weather_info["wind"].'</div></TD>
								 </TR>
								 <TR>
									<TD>Friends going</TD>
									<TD>ertyet</TD>
								 </TR>
								 </TABLE>';
	   
	   return $html_info_city_weather;
	}
}