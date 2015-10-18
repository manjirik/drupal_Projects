<?php
session_start();
include_once "inc/config.php";
include_once "inc/database.php";
include_once "controller/tblSongsController.php";

$songId = trim($_POST["songId"]);
if($songId != '' && isset($songId)){
	$paramArray['songid'] = $songId;
	
	$dbObj = new database();
	$conObj = $dbObj->connectDB();
	$tblSongObj = new tblSongsController($conObj);
	
	$credits = $tblSongObj->getSongCredits($songId);
	$songName = $tblSongObj->getSongName($paramArray);
	
	$creditsUn = unserialize($credits);
	
	//echo '<pre>';print_r($creditsUn);
	$zoneUrl = SITE_URL.'/'.$songName[0]['mname'];
	
		$HTML = "<div class='creditHeader '>
	      	<strong style='font-weight:bold;'>".$songName[0]['songname']."</strong> Song Credits 
	      	<img src='" . SITE_URL . "/images/closeIcon.png' alt='' onClick='closeModelPopup()'/>
	    </div>
	    <div class='creditCategories'>";
		if(!empty($creditsUn)){
			foreach($creditsUn as $creditAreaName=>$creditsValues){
			    $formattedArray = $tblSongObj->autocomplete_json_id_map($creditsValues);
			    $str = '';
			    //$separator = '';
			    $i=0;
			    $creditCount = count($formattedArray);
			    if($creditCount>0){
				    foreach($formattedArray as $creditValsWithBracket=>$creditVals){
				    	if($i>0){
				    		$creditsValues = $str;
				    	}
				    	/*if($creditCount>1){
				    		$separator = ',';
				    	}*/
				    	$creditZoneUrl = SITE_URL.'/'.$creditVals;
				    	if($creditAreaName == 'vocal' || $creditAreaName == 'production'){
				    		$replaceWith = ", <a href='".$creditZoneUrl."'>".$creditVals."</a>,";//.$separator;
				    	}else{
				    		$replaceWith = ", ".$creditVals.", ";//.$separator;
				    	}
				    	$str = str_replace('['.$creditValsWithBracket.']', $replaceWith, $creditsValues);
				    	$i++;
				    }	
				    $str = ltrim(trim($str), ',');
				    $str = rtrim(trim($str), ','); 
				    $str = str_replace(', ,', ', ', $str);
				    $str = str_replace(',  , ', ', ', $str);
			    }
			    $str = ($str=='') ? 'NA' : $str;
				
				$HTML .= "<p><span class='category'>".ucfirst($creditAreaName).": </span>".$anchorStartTag.$str.$anchorCloseTag."</p>";
			}
		}else{
			$HTML .= "<p class='no_credit'><b>No Credits Available</b></p>";
		}
	    $HTML .= "</div>
	    <div class='zoneUrl'><a href='".$zoneUrl."'>".$songName[0]['mname']."</a></div>";
}else{
	$HTML = "<div class='creditHeader '>
	      	<p><span>No Songs Available</span></p>
	      	<img src='" . SITE_URL . "/images/closeIcon.png' alt='' onClick='closeModelPopup()'/>
	    </div>";
}
    echo $HTML; 
?>