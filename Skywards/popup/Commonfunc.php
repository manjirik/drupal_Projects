<style>
*{margin:0; padding:0;}
body{font-size:12px; color:#444; text-align:center; font-family:Arial, Helvetica, sans-serif;}
a{color:#444;}

.popup{width:291px; background:#d50915; /*box-shadow: 0 0 5px #888888;*/ }

.popup .img{display:block; height:181px;}
.popup span.cityName{position:absolute; top:50px; left:12px; font-size:36px; color:#ffffff; text-align:left; font-family: 'ek03serif-b01b01';}
.popup span.cityName span{display:block; font-size:24px; font-family:Arial, Helvetica, sans-serif;}
.popup span.desc{position:absolute; top:165px; left:12px; font-size:11px; color:#ffffff; text-align:left;}
.popup .img .weather{position:absolute; right:10px; bottom:90px; font-size:24px; font-weight:bold; color:#fff; background:url(<?php echo SITE_URL; ?>/images/popup_images/weather-icon.png)0 3px no-repeat; padding:0 0 0 27px;}
.popup .selDestination{display:block; padding:13px 10px; text-decoration:none; }
.popup .selDestination span.selectButton{display:block; background:url(<?php echo SITE_URL; ?>/images/popup_images/selectdest-bg.jpg)0 0 repeat-x; cursor:pointer; border:1px solid #b5ada9; } 
.popup .selDestination span.selectButton span{display:block; padding:9px 10px 8px 30px; text-align:left; color:#564534;font-family: 'ek03serif-b01b01'; font-size:17px;display:block; background:url(<?php echo SITE_URL; ?>/images/popup_images/dest-arrow.png)12px 14px no-repeat;}


@font-face {
    font-family: 'ek03plain-b02b02';
    src: url('<?php echo SITE_URL; ?>/images/popup_images/fonts/ek03plain-b02-webfont.eot');
    src: url('<?php echo SITE_URL; ?>/images/popup_images/fonts/ek03plain-b02-webfont.eot?#iefix') format('embedded-opentype'),
         url('<?php echo SITE_URL; ?>/images/popup_images/fonts/ek03plain-b02-webfont.woff') format('woff'),
         url('<?php echo SITE_URL; ?>/images/popup_images/ek03plain-b02-webfont.ttf') format('truetype'),
         url('<?php echo SITE_URL; ?>/images/popup_images/ek03plain-b02-webfont.svg#ek03plain-b02b02') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'ek03plain-m02m02';
    src: url('<?php echo SITE_URL; ?>/images/popup_images/fonts/ek03plain-m02-webfont.eot');
    src: url('<?php echo SITE_URL; ?>/images/popup_images/fonts/ek03plain-m02-webfont.eot?#iefix') format('embedded-opentype'),
         url('<?php echo SITE_URL; ?>/images/popup_images/fonts/ek03plain-m02-webfont.woff') format('woff'),
         url('<?php echo SITE_URL; ?>/images/popup_images/fonts/ek03plain-m02-webfont.ttf') format('truetype'),
         url('<?php echo SITE_URL; ?>/images/popup_images/fonts/ek03plain-m02-webfont.svg#ek03plain-m02m02') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'ek03serif-b01b01';
    src: url('<?php echo SITE_URL; ?>/images/popup_images/fonts/ek03serif-b01-webfont.eot');
    src: url('<?php echo SITE_URL; ?>/images/popup_images/fonts/ek03serif-b01-webfont.eot?#iefix') format('embedded-opentype'),
         url('<?php echo SITE_URL; ?>/images/popup_images/fonts/ek03serif-b01-webfont.woff') format('woff'),
         url('<?php echo SITE_URL; ?>/images/popup_images/fonts/ek03serif-b01-webfont.ttf') format('truetype'),
         url('<?php echo SITE_URL; ?>/images/popup_images/fonts/ek03serif-b01-webfont.svg#ek03serif-b01b01') format('svg');
    font-weight: normal;
    font-style: normal;

}
</style>
<?php
class Commonfunc {
	
	public function __construct()
	{
		//$this->loadLibrary('Weather');
	}
		
public function getEmiratesDestinations()
	{
		ob_clean();
		$obj =  new Getcity();
		$data =$obj->getcitydata();
	
		 foreach($data as $cityinfo) 
		{ 
				$city = $cityinfo->city_name;
				$destinations[$city] = $cityinfo->latitude.",".$cityinfo->longitude;
		}
	
		return $destinations;
	}
	
	/**
	 * @author Chaitenya yadav
	 * Below function will collect all the selected destinations by user 
	 */
	public function getDreamDestinations()
	{
		$dreamDestinations['London'] = '51.5171, -0.1062';
		return $dreamDestinations;
	}
	

      
	 public function get_city_info_html($arr_city_info,$arr_weather_info)
	{		
			$temp = $this->getexcettemp($arr_weather_info["temp"]);
	
			$html_info_city_weather="<img align='right' style=' position: relative; cursor: pointer; margin: -4px -14px 0px 0px;' src='".SITE_URL."/images/popup_images/close.png' onclick='hideInfo();'><div class='popup'><span class='img' style='background:url(".$arr_city_info["img"].") 0 0 no-repeat;'><span class='cityName'>".$arr_city_info["name"]."</span><span class='desc'>I am not convinced</span><span class='weather'>".$temp."&deg;</span></span><div class='selDestination'><span class='selectButton'><span>Select this destination</span></span></div></div>"; 					
	
			return $html_info_city_weather;
	}
	
	public function getexcettemp($getemp)
	{
		$temp1=(($getemp-32)*5)/9;
		return round($temp1,1);
	
	}
	
	public function logError($e) 
	{
	}
	
}