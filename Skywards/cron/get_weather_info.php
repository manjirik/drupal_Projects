<?php
$host_name="localhost";
$db_user_name="root";
$db_user_password="root.123";
$db_name="skywards";
$table_name='location';

// MySql connection

$db_con = mysql_connect($host_name, $db_user_name, $db_user_password);
if (!$db_con) {
    die('Could not connect: ' . mysql_error());
}

//echo 'Connected successfully';

// select db
$db_selected = mysql_select_db($db_name, $db_con);
if (!$db_selected) {
    die ('Can\'t use '.$table_name.' : ' . mysql_error());
}

// fetch all cities

$result_city = mysql_query("SELECT city_name FROM ".$table_name);

if (!$result_city) {
    die ('Can\'t get data from '.$table_name.' : ' . mysql_error());
}

function getexcettemp($getemp)
	{
		$temp1=(($getemp-32)*5)/9;
		return round($temp1,1);
	
	}

while($row = mysql_fetch_array($result_city))
  {
            $city_name=$row['city_name'] ;

	        $call_open_weather="http://openweathermap.org/data/2.1/find/name?q=".urlencode(utf8_encode($city_name))."&units=imperial";
			$ch = curl_init();
			$timeout = 10;
			curl_setopt($ch,CURLOPT_URL,$call_open_weather);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
			$fileContent = curl_exec($ch);
			curl_close($ch);
			$data3=json_decode($fileContent);
           	$temp=getexcettemp($data3->list[0]->main->temp);
			if(!empty($temp))
			{
                $sql_temp = "UPDATE ".$table_name." SET temprature='".$temp."' WHERE city_name='".$city_name."'";
						 $ins = mysql_query($sql_temp);
						 if(!$ins)
					     {
                            die ('Can\'t update data into '.$table_name.' : ' . mysql_error());
						 }
			}
			else
			{
               die ('some issue occur during call.');
			}
			
			
			
  
 }
 ?>
 <h1>Plese click on below button to go to admin dashboard. </h1>
 <p align="center"><a href="admin/adminUsersList.php" title="GO TO ADMIN" alt="GO TO ADMIN"><input type="button" name="go_back_btn" value="GO TO ADMIN"/></a></p>

 <?php
 mysql_close($db_con);
?>
