<?php 
session_start();
include_once("inc/config.php"); 
include_once("inc/database.php");
include("inc/mailer.php");
include_once("controller/tblAddsController.php");

$adv_name = trim($_POST["adv_name"]);
$adv_add_path = trim($_POST["adv_add_path"]);
$adv_res_party = trim($_POST["adv_res_party"]);

$adv_name_arr = explode(",",$adv_name);
$adv_res_party_arr = explode(",",$adv_res_party);
$adv_file_path_array = explode(",",$adv_add_path);

$top = COMMENT_LIST_COUNT;

$success_flag = 0;
for($i=0; $i<4; $i++)
{
	if($adv_name_arr[$i] != '' && $adv_file_path_array[$i] != '')
	{
		$adv_file_type = 0;
		$adv_file_path_arr = explode("/", $adv_file_path_array[$i]);
		$adv_file = $adv_file_path_arr[count($adv_file_path_arr)-1];
		
		$ext = substr($adv_file, strrpos($adv_file, ".")+1);
		if(strtolower($ext) == 'zip')
		{
			$adv_file_type = 1;
		}
		$adv_file_name = substr($adv_file, 0, strrpos($adv_file, ".")-1);
		$adv_file_name_arr = explode("_", $adv_file_name);
		unset($adv_file_name_arr[count($adv_file_name_arr)-1]);
		$adv_file_act = implode("_",$adv_file_name_arr).".".$ext;
		
		$dbObj = new database();
		$conObj = $dbObj->connectDB();
		$tblAdvObj = new tblAddsController($conObj);	
		
		//saving a new comment
		$paramArray = array
		(
			"table_name" => "advertise",
			"ad_name" => $adv_name_arr[$i],	
			"res_party"	=> $adv_res_party_arr[$i],				
			"file_path" => $adv_file_act,
			"file_type" => $adv_file_type,
			"user_id" => $_SESSION["user_id"],
			"create_date" => date('Y-m-d H:i:s')
		);
		$upload_relative = "uploads/user_".$_SESSION["user_id"]."/user_advertise/";
		if (copy($adv_file_path_array[$i], $upload_relative.$adv_file_act)) 
		{
			$adv_insert_id = $tblAdvObj->saveNewAdv($paramArray);
			if($adv_insert_id>0)
			{		
				unlink($adv_file_path_array[$i]);
			}
			$paramArray1 = array
			(	
				"table_name" => "advertise",
				"user_id" => $_SESSION["user_id"],
			);
			$addsDetails = $tblAdvObj->getAddsDetailsStatusByUser($paramArray1);
			$addsCount = count($addsDetails);
		}
		else
		{
			$success_flag = 1;
		}

	}
}

if($success_flag == 0)
{
	echo "adv insert successfully:".$addsCount.":End";
	mailForNotifyAdvertiseUpload($adminEmail, $_SESSION["user_name"]);
}
else
{
	echo "error";
}
//$dbObj->closeConn($conObj); 
$dbObj = $tblCommentObj = null; ?>