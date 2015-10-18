<?php
	function getEmiratesDestinations()
	{
		$destinations['Dubai'] = '25.271164578702688, 55.30755526123039';
		$destinations['Adelaide'] = '25.271164578702688, 55.30755526123039';
		$destinations['Washington'] = '25.271164578702688, 55.30755526123039';
		$destinations['Mumbai'] = '25.271164578702688, 55.30755526123039';
		$destinations['London'] = '25.271164578702688, 55.30755526123039';		
		return $destinations;
	}
	
	function logError($error) {
		
	}
	/*
	function getKeycityname($cityname) {
		return str_replace(" ","",str_replace(".","",str_replace(",","",str_replace("(","",str_replace(")","",str_replace("'","",strtolower($cityname)))))));
	} */
?>