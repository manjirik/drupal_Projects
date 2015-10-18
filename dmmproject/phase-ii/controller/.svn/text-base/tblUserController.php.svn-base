<?php 
include_once("inc/database.php");
class tblUserController extends database
{
		public function __construct($conObj) 
		{
			$this->conObj = $conObj;
		}
	//----------------------------------------------------------------------------					
		public function validateLogin($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0) {
				// $sql = "select * from user where dmm_company_name = '". $this->getDBString($paramArray["dmm_company_name"])."' and password = '". $this->getDBString($paramArray["password"]) ."' and status = 1";
				// $recordsArray = $this->executeQuery($this->conObj, $sql);
				
				// Validate user name
				$sql = "SELECT * FROM user WHERE dmm_company_name = '" . $this->getDBString($paramArray["dmm_company_name"]) . "'";
				$recordsArray = $this->executeQuery($this->conObj, $sql);
				if(!count($recordsArray)) {
					return 1;
				}
				
				// Validate password as user name is already validated
				$sql = "SELECT * FROM user WHERE dmm_company_name = '" . $this->getDBString($paramArray["dmm_company_name"]) ."' and password = '" . $this->getDBString($paramArray["password"]) . "' and status = 1";
				$recordsArray = $this->executeQuery($this->conObj, $sql);
				if(!count($recordsArray)) {
					return 2;
				}
				
				// Validate user name and password
				$sql = "SELECT * FROM user WHERE dmm_company_name = '" . $this->getDBString($paramArray["dmm_company_name"]) ."' and password = '" . $this->getDBString($paramArray["password"]) . "' and status = 1";
				$recordsArray = $this->executeQuery($this->conObj, $sql);
				if(count($recordsArray)) {
					return $recordsArray;
				}
				
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------		
	
		public function userRegistration($paramArray)
		{			
			$lastInsertId = 0;
			if(count($paramArray)>0)
			{
				$cnt = 0;
				$qry = "";
				$tempArray = array();
				$tableName = $paramArray["table_name"];
				$qry = "insert into " . $tableName . " (";				
				foreach($paramArray as $key => $value)
				{
					if($cnt>0)	
					{
						$qry .= "".trim($key).", ";
						$tempArray[trim($key)] = trim($value);
					}
					$cnt++;
				}
				$qry = substr($qry, 0, (strlen($qry)-2)).") VALUES (";
				foreach($tempArray as $key => $value)
				{					
					$qry .= "'".$this->getDBString3($value)."', ";
				}
				$qry = substr($qry, 0, (strlen($qry)-2));
				$qry .= ");";
				//echo $qry;
				$lastInsertId = $this->insertQuery($this->conObj, $qry);
			}
			return $lastInsertId;
		}
	//----------------------------------------------------------------------------	
	
		public function userRegistrationAvatarUpdate($paramArray)
		{			
			$retValue = 0;
			if(count($paramArray)>0)
			{								
				$qry = "update user set avatar = '".$paramArray["avatar"]."' where id = ".$paramArray["user_id"].";";					
				$retValue = $this->simpleQuery($this->conObj, $qry);
			}
			return $retValue;
		}
	//----------------------------------------------------------------------------	
	
		public function userZoneUpdate($paramArray)
		{			
			$retValue = 0;
			if(count($paramArray)>0)
			{								
				$qry = "update user set zone = '".$paramArray["zone"]."' where id = ".$paramArray["user_id"].";";					
				$retValue = $this->simpleQuery($this->conObj, $qry);
			}
			return $retValue;
		}
	//----------------------------------------------------------------------------	
	
		public function checkuser($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "select * from user where dmm_company_name = '". $this->getDBString($paramArray["dmm_company_name"])."'";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------
		public function checkuserByEmail($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "SELECT * FROM user WHERE email = '". $this->getDBString($paramArray["email"])."'";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------
		public function getUserDetails($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "select * from user where id = '". $this->getDBString($paramArray["id"])."'";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
				
				/* Remove password and rememer me cookie user key*/
				unset($recordsArray[0]['password']);
				unset($recordsArray[0]['user_key']);
				
				/* get published songs count */
				$query = sprintf("SELECT COUNT(*) as song_count FROM songs WHERE status = 1 AND user_id = %d", $paramArray["id"]);
				$song_count = $this->executeQuery($this->conObj, $query);
				$recordsArray[0]['song_count'] = $song_count[0]['song_count'];
				
				/* get all uplaoded songs count */
				$query = sprintf("SELECT COUNT(*) as all_song_count FROM songs WHERE user_id = %d", $paramArray["id"]);
				$song_count = $this->executeQuery($this->conObj, $query);
				$recordsArray[0]['all_song_count'] = $song_count[0]['all_song_count'];
			}
			return $recordsArray;
		}
		
	//----------------------------------------------------------------------------
		public function getUserDetailsById($userId)
		{			
			$recordsArray = array();
			$query = sprintf("SELECT facebook, twitter, personal_website, musician_info, name, dmm_company_name, years_making_music, country, status, admin_review FROM user WHERE id = %d", $userId);
			$recordsArray = $this->executeQuery($this->conObj, $query);
			return $recordsArray[0];
		}
	//----------------------------------------------------------------------------
	
		public function getUserDetailsByDmmCompanyName($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
			$sql = "select * from user where dmm_company_name = '". $this->getDBString($paramArray["dmm_company_name"])."' and status = 1";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------
	
		public function getUserDetailsByEmail($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "select * from user where email = '". $this->getDBString($paramArray["email"])."' and status = 1";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------
	
		public function userPasswordUpdate($paramArray)
		{			
			$retValue = 0;
			if(count($paramArray)>0)
			{								
				$qry = "update user set password = '".$paramArray["password"]."' where id = '".$paramArray["user_id"]."' and status = 1;";					
				$retValue = $this->simpleQuery($this->conObj, $qry);
			}
			return $retValue;
		}
	//----------------------------------------------------------------------------
	
		public function userUpdateNotify($paramArray)
		{			
			$retValue = 0;
			if(count($paramArray)>0)
			{								
				$qry = "update user set notify = '1' where id = '".$paramArray["user_id"]."' and status = 1;";					
				$retValue = $this->simpleQuery($this->conObj, $qry);
			}
			return $retValue;
		}
	//----------------------------------------------------------------------------
	
		public function userProfileUpdate($paramArray, $filesArray)
		{
		
			$same_as_old_values = $this->sameAsOldValues($paramArray, $filesArray);
			if(1 == $this->sameAsOldValues($paramArray, $filesArray)) {
				return -999;
			}

			$retValue = 0;
			if(count($paramArray)>0)
			{
				$cnt = 0;
				$qry = "";
				$qry = "update " . $paramArray["table_name"] . " set ";
				foreach($paramArray as $key => $value)
				{
					if($cnt>1)	
					{	
						$qry .= "".trim($key)."='".addslashes($value)."', ";
					}
					$cnt++;
				}
				$qry = substr($qry, 0, (strlen($qry)-2));
				$qry .= " where id = ".$paramArray["user_id"];
				$retValue = $this->simpleQuery($this->conObj, $qry);
			}
			return $retValue;
		}
		
		public function sameAsOldValues($paramArray, $filesArray) {

			$qry = "SELECT COUNT(*) AS cnt FROM " . $paramArray["table_name"] . " WHERE ";
			
			unset($paramArray["table_name"]);
			$uid = $paramArray["user_id"];
			unset($paramArray["user_id"]);
			
			$query_string = array();
			foreach($paramArray as $key => $value) {
				if(!empty($value)) {
					$query_string[] = trim($key) ." = '" . addslashes($value) . "'";
				}
			}
			
			foreach($filesArray as $key => $value) {
				if(!empty($value)) {
					$query_string[] = trim($key) ." = '" . addslashes($value) . "'";
				}
			}
			
			$query_string[] = "id = '" . $uid . "'";
			
			$qry .= implode($query_string, ' AND ');

			$return = $this->executeQuery($this->conObj, $qry);
			return $return[0]['cnt'];
		}
		
		public function setUserLoginKey($paramArray)
		{			
			$retValue = 0;
			if(count($paramArray)>0)
			{
				$qry = "UPDATE user SET user_key = '%s' WHERE id = '%d'";
				$qry = sprintf($qry, $paramArray['user_key'], $paramArray['user_id']);
				$retValue = $this->simpleQuery($this->conObj, $qry);
			}
			return $retValue;
		}
		

		public function isUserAlreadyLoggedin()
		{
			$dmmid = $_COOKIE['DMMID'];
			$dmmkey = $_COOKIE['DMMKEY'];

			$retValue = 0;
			if(isset($_COOKIE['DMMID']) && isset($_COOKIE['DMMKEY']))
			{
				$qry = "SELECT COUNT(*) as status FROM user WHERE id = %d AND user_key = '%s'";
				$qry = sprintf($qry, $dmmid, $dmmkey);
				$retValue = $this->executeQuery($this->conObj, $qry);
				
				if(1 == $retValue[0]['status']) {
					$user_details = $this->getUserDetails(array('id' => $_COOKIE['DMMID']));
					$_SESSION['user_id'] = $user_details[0]['id'];
					$_SESSION['dmm_company_name'] = trim($user_details[0]['dmm_company_name']);
					$_SESSION['user_type'] = trim($user_details[0]['user_type']);
					$_SESSION['password'] = trim($user_details[0]['password']);
					
					$counterDetails = $this->getCounter($user_details);
					$counterArray = array(	
									"logcounter" =>($counterDetails['login_counter'])+1,
									"id" =>$user_details[0]["id"] 	
							);
					$counterIncre = $this->setCounter($counterArray);
					}
				return $retValue[0]['status'];
			}
			return $retValue;
		}
		
		public function getCounter($userDetails)
		{
			$recordsArray = array();
	$qry = sprintf("select login_counter FROM user WHERE id=%d", mysql_real_escape_string($userDetails[0]["id"]));
			$recordsArray = $this->executeQuery($this->conObj, $qry);
			
			return $recordsArray[0];
		}
		
		public function setCounter($counterArray)
		{
			$counterVal = 0;
			if(count($counterArray)>0)
			{		
			 $qry =sprintf("update user set login_counter = %d  where id =%d",
			 mysql_real_escape_string($counterArray["logcounter"]), mysql_real_escape_string($counterArray["id"]));					
				$counterVal = $this->simpleQuery($this->conObj, $qry);
				setcookie("SHOWZONTIPS", 1, 0, "/");
				
			}
			return $counterVal;
		}
		
		/* ------------------------------------------------------------------------------- */
		public function getDMMCompanyNameList()
		{
			$recordsArray = $nameArray = array();
			$qry = "SELECT dmm_company_name FROM `user` WHERE dmm_company_name != '' ORDER BY dmm_company_name";
			$recordsArray = $this->executeQuery($this->conObj, $qry);
			
			for($i = 0; $i < count($recordsArray); $i++) {
				$dmm_company_name = $recordsArray[$i]['dmm_company_name'];
				$nameArray[] = $dmm_company_name;
			}
			return json_encode($nameArray);
		}
		/* ------------------------------------------------------------------------------- */
		
		public function getAllMusicianType()
		{
			$recordsArray = $typeArray = array();
			$recordsArray = $this->executeQuery($this->conObj, "SELECT * FROM musician_type");
			for($i = 0; $i < count($recordsArray); $i++) {
				$typeArray[$recordsArray[$i]['mid']] = $recordsArray[$i]['type'];
			}
			return $typeArray;
		}
		/* ------------------------------------------------------------------------------- */
		
		public function getMusicianType($mid)
		{
			//echo "SELECT type FROM musician_type WHERE mid = $mid";
			
			$recordsArray = $typeArray = array();
			$query = sprintf("SELECT type FROM musician_type WHERE mid = %d", mysql_real_escape_string(2));
			$recordsArray = $this->executeQuery($this->conObj, $query);
			return $recordsArray[0]['type'];
		}
		
		public function setSelectedLifestyle($lsid, $uid)
		{
			$recordsArray = $typeArray = array();
			$query = sprintf("UPDATE `user` SET selected_lifestyle = %d WHERE id = %d", $lsid, $uid);
			$recordsArray = $this->simpleQuery($this->conObj, $query);
			return 1;
		}
		
	//----------------------------------------------------------------------------
}?>