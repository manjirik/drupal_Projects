<?php
include_once("inc/database.php");
include_once("controller/tblSongsController.php");	
//$_POST['songID'] = 1;
$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblSongNameObj = new tblSongsController($conObj);
$songNameArr = $tblSongNameObj->getSongName(array("songid"=>$_POST['songID']));
$songNameArrCnt = count($songNameArr);
//exit;
			if($songNameArrCnt >0) {?>

			<?php
			for($i=0; $i<$songNameArrCnt; $i++)
				{
				echo $tmp_musician_name = $songNameArr[$i]["mname"];
				}
			?>
		
<?php }	?>