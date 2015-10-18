<?php 
/*
 * File : To delete unwanted files from temp_upload
 * It displays deleted files
 */
	include_once 'inc/database.php';
	include_once 'controller/tblSongsController.php';
	
	$dbObj = new database();
	$conObj = $dbObj->connectDB();
	
	$songsObj = new tblSongsController($conObj);
	$recordsArray = $songsObj->getSongsFileName();
	$filePathArray = array();
	$userArray = array();
	foreach($recordsArray as $key=>$fileArray){
		$filePathArray[$fileArray['user_id']][] = $fileArray['file_path'];
		$userArray[] = $fileArray['user_id'];
	}
	$userArray = array_unique($userArray);
	//echo '<pre>';
	//print_r($userArray);
	//exit;
	foreach($userArray as $key=>$userid){
		//if($userid == 17){
			$dir = "uploads/user_{$userid}/user_songs/";
			if ($handle = opendir($dir)) {
				while (false !== ($file = readdir($handle))) {
					if ($file != "." && $file != "..") {
						//echo $file;echo '<br>';
						if(!in_array($file, $filePathArray[$userid])){
							//Delete file
							unlink($dir.$file);
							echo "User Id :".$userid."--File Deleted :".$file."<br>";
						}
					}
				}
			}
			closedir($handle);
		//}
	}
?>