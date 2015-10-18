<?php
error_reporting(0);
ini_set("display_errors",0);
/*For POC purpose will remove this*/
class PocController extends BaseController {
	public $facebook;
	
	public function __construct() {
		parent::__construct();
		$this->loadLibrary('Webservice');
		$this->loadLibrary('Fb_common_func');
		$this->loadLibrary('Commonfunc');
		$this->loadModel('Poc');
		$this->loadModel('Users');
		$this->loadModel('Myentries');

		$this->facebook= new Facebook(array(
				'appId'  => APP_ID,
				'secret' => APP_SEC_KEY,
				'cookie' => true
			));
	}
	
	public function index(){
		//$this->membershipvalidation();		
		//$data=$this->Poc->view();	
		//print_r($data);
		//$this->template="fbtesting";
		//$this->render();

		$access_token = $this->getFbAccessToken();
		echo  "==>", $access_token;
	}	

	public function membervalidation()
	{
		$data['validatemem'] = 1;
		$this->template="membervalidation";
		$this->render($data);
	}
	public function membershipvalidation_submit()
	{
		$data['validatemem'] = 1;
		if(isset($_POST['vmn']) && $_POST['vmn']!="")
		{
			
			$params = array('CardNumber'=> $_POST['vmn']);
			$result=$this->webservice->getValidateMembershipNo($params);
			$this->template="membervalidation";
			$this->render($result);
		}
	}
	public function enrollmember($data=array())
	{
		error_reporting(E_ALL);
ini_set("display_errors",1);
echo "hi";
		/*$selected_friends_details= array(
						0=>array('friend_id'=>'100001187318347','friend_email'=>''),
						1=>array('friend_id'=>'100004713606450','friend_email'=>'')
					           );
		foreach($selected_friends_details as $key=>$values1){
						$useridsarray[]= $values1['friend_id'];
					}
		print_r($useridsarray);	
		echo APP_TOKEN;
		print_r($this->facebook);
		$result=$this->Fb_common_func->send_notification($this->facebook,'Skywards meet me here!', $useridsarray,APP_TOKEN,'100003618890095');
		echo $result;*/
		/*$friend_emailarray=array('nits.tatte@gmail.com','spjahagirdar@gmail.com','sameer.kelkar@gmail.com');
		if(!empty($friend_emailarray))
					{
					$result=$this->Commonfunc->send_email_notification(EMAIL_FROM,$friend_emailarray,'test message','this is my test message');
					}
		$result=$this->Commonfunc->send_email_notification(EMAIL_FROM,$friend_emailarray,'test message','this is my test message');
	     echo $result;*/
		$selected_friends_details= array(
						0=>array('friend_id'=>'100001187318347','friend_email'=>''),
						1=>array('friend_id'=>'100004713606450','friend_email'=>''),
						2=>array('friend_id'=>'','friend_email'=>'sameer.kelkar@synechron.com')
					           );
		$fbfriends='609703494,Atul Nath#626417105,Prabhas Nayak#632531552,Jitendra Singh#1041266626,Rajesh Patil#1220631499,Sameer Kelkar#1268065008,Sandip Patil#1347427052,Rahul Sonar#1606136972,Tejinder Singh Nagee#100001187318347,Nitin Tatte#100004307071114,Chaitanya Satpute#100004377272706,Chaitenya Yadav#100004713606450,Sameer Kelkar#100005095356317,Nader Yassa';
        //$first_name=$_SESSION[fb_user_first_name];
        $first_name='Sandeep';   
        //$city_name=$_SESSION[cityName];
        //$to_email=array($_SESSION[fb_user_email]);
        $to_email=array('spjahagirdar@gmail.com','sameer.kelkar@gmail.com');
        $city_name="Dubai";
		foreach($selected_friends_details as $key=>$values1){
				if($values1['friend_id']!=''){
				$friend_idarray[]= $values1['friend_id'];
				}
				if($values1['friend_email']!=''){
				$friend_emailarray[]= $values1['friend_email'];
				}
			}
					
		
		if(!empty($friend_idarray))
		{
			foreach($friend_idarray as $values)
			{
				
				$temp=explode($values,$fbfriends);
				$temp=explode(',',$temp[1]);
				$temp=explode('#',$temp[1]);
				$fb_name[] = $temp[0];				
			}
		}
		
		if(!empty($friend_emailarray) && !empty($friend_idarray) )
		{
			$slected=array_merge($fb_name,$friend_emailarray);
		}
		elseif(!empty($friend_emailarray))
		{
			$slected=$friend_emailarray;
		}
		else
		{
			$slected=$fb_name;
		}
		$fb_name_str=implode(",",$slected);
		$message_body="Dear ".$first_name.",<br/> You have selected the ".$city_name." destination. You have selected ".$fb_name_str."<br/><a href=".APP_LINK.">Click Here</a> to go to application";
		$result=$this->Commonfunc->send_email_notification(EMAIL_FROM,$to_email,'Destination Confirmation',$message_body);
		echo $result;
		die();
		/*Start to insert user info in to user table by Sandeep J 24/01/2013*/
		/*print_r($this->fb_user_info);
		if($this->fb_user_info){
				$data['firstname']  = $this->fb_user_info['first_name'];
				$data['lastname']  = $this->fb_user_info['last_name'];
				$data['fb_id'] = $this->fb_user_info['id'];
				$data['email'] = $this->fb_user_info['email'];
				if(array_key_exists('location',$this->fb_user_info))
				{ 
					$data['current_location'] = $this->fb_user_info['location']['name'];  
				}
				
				if(array_key_exists('hometown',$this->fb_user_info))
				{ 
					$data['home_town'] = $this->fb_user_info['hometown']['name'];  
				}
				$data['sky_mem_id'] = '';	
				$data['is_active'] = 1;	
				$data['created_date'] = date('Y-m-d H:i:s');
				$data['updated_date'] = date('Y-m-d H:i:s');
			}	
			//print_r($data);
			$fields = array('user_id');
			$fb_id=$this->fb_user_info['id'];
			$where="fb_id='".$fb_id."'";
			$getresult = $this->Poc->getResults($fields, $table_name='user', $where, $limit=1);
			//print_r($getresult);
			if($getresult[0]->user_id==""  && $data['fb_id']!="")
			{
				$result = $this->Poc->insert($data,$table_name='user');
			}
			*/
		/*End to insert user info in to user table by Sandeep J 24/01/2013*/
		
		//$getuserinfo=$this->Fb_common_func->getUserInfo($this->facebook);
		//print_r($getuserinfo);
		$data['enrollmem'] = 1;
		//$data['first_name'] = $getuserinfo['first_name'];
		//$data['last_name'] = $getuserinfo['last_name'];
		//$data['email'] = $getuserinfo['email'];
		//$this->template="enrollmember";
		//$this->render($data);
		/* Start of list of parameters sending for easy enrollement*/
		//echo '<pre>';
		/*Sending the form parameters as an array for easy registration*/
		//$params = array('FirstName'=> 'Sandeep','LastName'=>'Jahagirdar','EmailAddress'=>'spjahagirdar@gmail.com','Password'=>'Spj@5992','Country'=>'AE');
		/*Sending the form parameters as multi dimentional array for easy registration*/
		//$params = array('Member'=>array('FirstName'=> 'Sandeep','LastName'=>'Jahagirdar','EmailAddress'=>'spjahagirdar@gmail.com','Password'=>'Spj@5992'),'Addresses'=>array('Country'=>'AE'));
		/*Sending all the parameters as multi dimentional array for easy registration*/
		//$params = array('Member'=>array('Password'=>'Spj@5992','FirstName'=> 'Sandeep','Title'=>'Mr','LastName'=>'Jahagirdar','BirthDate'=>'01/01/1982','EmailAddress'=>'spjahagirdar@gmail.com','EnrolmentMethod'=>'Web','EcmCode'=>'M','RegistrationType'=>'M'),'Addresses'=>array('Country'=>'AE','IsPreferred'=>'TRUE','Usages'=>'HOME'));
		/*Sending all the parameters in an array for easy registration*/
		//$params = array('Password'=>'Spj@5992','FirstName'=> 'Sandeep','Title'=>'Mr','LastName'=>'Jahagirdar','BirthDate'=>'01/01/1982','EmailAddress'=>'spjahagirdar@gmail.com','EnrolmentMethod'=>'Web','EcmCode'=>'M','RegistrationType'=>'M','Country'=>'AE','IsPreferred'=>'TRUE','Usages'=>'HOME');
		
		//$params = array('skywardsProfile'=>array('Password'=>'Spj@5992','FirstName'=> 'Sandeep','Title'=>'Mr','LastName'=>'Jahagirdar','BirthDate'=>'01/01/1982','EmailAddress'=>'spjahagirdar@gmail.com','EnrolmentMethod'=>'Web','EcmCode'=>'M','RegistrationType'=>'M','Country'=>'AE','IsPreferred'=>'TRUE','Usages'=>'HOME'));
		/*$params = array('skywardsProfile'=>array('Member'=>array('Password'=>'Spj@5992','FirstName'=> 'Sandeep','Title'=>'Mr','LastName'=>'Jahagirdar','BirthDate'=>'1982-12-14T00:00:00','EmailAddress'=>'spjahagirdar@gmail.com','EnrolmentMethod'=>'INT','EcmCode'=>'SCDXB','RegistrationType'=>'M')));
		//$params = array('Password'=>'Spj@5992','FirstName'=> 'Sandeep','Title'=>'Mr','LastName'=>'Jahagirdar','BirthDate'=>'2013-01-01','EmailAddress'=>'spjahagirdar@gmail.com','EnrolmentMethod'=>'INT','EcmCode'=>'SCDXB','RegistrationType'=>'M');
		echo "Request===<br>";
		echo "<pre>";
		print_r($params);
		$result=$this->webservice->submitenrollmember($params);
		echo "Response====<br>";
		echo "<pre>";
		print_r($result);*/
		/* End of list of parameters sending for easy enrollement*/
	}
	public function enrollmember_submit()
	{
		$data['enrollmem'] = 1;
		if(isset($_POST['fn']) && $_POST['fn']!="" && isset($_POST['ln']) && $_POST['ln']!="" && isset($_POST['country']) && $_POST['country']!="" && isset($_POST['email']) && $_POST['email']!="" && isset($_POST['country']) && $_POST['country']!="" && isset($_POST['password']) && $_POST['password']!="" && isset($_POST['que']) && $_POST['que']!="")
		{
			$params = array('FirstName'=> $_POST['fn'],'LastName'=>$_POST['ln'],'Country'=>$_POST['country'],'EmailAddress'=>$_POST['email'],'Password'=>$_POST['password']);
			//print_r($params);
			$result=$this->webservice->submitenrollmember($params);
			$this->template="enrollmember";
			$this->render($result);
		}
	}

    // function for triggering the notification
	//public function trigger_notification($friend_list,$originator,$message_body,$notification_link,$app_token)
	public function trigger_notification()
	{
       		
		 $result=$this->Fb_common_func->send_notification($this->facebook,'Skywards meet me here!',array('100001187318347','1220631499','1268065008','1347427052','566769531'),'467450859982651|cf5YXgYRZZDJuvBF1_ZOyDyRJHM','100001187318347');

	     echo $result;
	}	
	public function insert($data=array()) {
		$data['id'] = '1';
		$data['name'] = 'name1';
		$data['pass'] = 'pass1';
		echo $query = $this->Poc->insert($data,$table_name='poc');		
	}
	
	
	/*
	 * Function name: updateEntryLocation
	 * Purpose: update location id in user_entry table
	 * Parameters:
	 * 	$user_entry_id = int
	 * 	$current_location = int
	 * 	$prev_location = int
	 * Return value: 
	 * 	True: affected rows
	 * 	False: fail
	 * Created By: Manish Patel / 2013-01-27
	 * Updated By: Your Name / Date	 
	 *
	 */
	
	public function updateEntryLocation() {
		
		//NOTE: Replace sample data with get/post/session/db
		$user_entry_id=1;
		$current_location=37;
		$prev_location=113;
		
		if($user_entry_id != ''
			&& $current_location != '' 
			&& $prev_location != '' 
			&& $prev_location != $current_location)
		{
			$params['location_id'] = $current_location;
			$where = " user_entry_id = ".$user_entry_id;
			$where .= " AND location_id = ".$prev_location;
			return $this->Poc->update($params,$table_name='user_entry',$where);				
		}
		return false;
	}
	
	/*
	 * Function name: deleteEntryDetails
	 * Purpose: update friend id in user_entry_details table
	 * Parameters:
	 * 	$user_entry_id = int
	 * 	$current_location = int
	 * 	$prev_location = int
	 * Return value: 
	 * 	True: affected rows
	 * 	False: fail
	 * Created By: Manish Patel / 2013-01-27
	 * Updated By: Your Name / Date	 
	 *
	 */
	
	public function updateEntryDetails() {
		
		//NOTE: Replace sample data with get/post/session/db
		$user_entry_id=1;
		$friend_ids='12,9,16';		
		
		if($user_entry_id != ''
			&& $friend_ids != '')
		{
			//first delete old friend reference from user_entry_details table
			$this->deleteEntryDetails($user_entry_id=1,$friend_ids='12,9,16');	

			//now replace new friends lists
			$this->replaceEntryDetails();			
		}
		return false;
	}
	
	/*
	 * Function name: deleteEntryDetails
	 * Purpose: delete friend id from user_entry_details table
	 * Parameters:
	 * 	$user_entry_id = int
	 * 	$friend_ids = string	 
	 * Return value: 
	 * 	True: affected rows
	 * 	False: fail
	 * Created By: Manish Patel / 2013-01-27
	 * Updated By: Your Name / Date	 
	 *
	 */
	
	public function deleteEntryDetails($user_entry_id=1,$friend_ids='12,9,16') {
		if($user_entry_id != ''
			&& $friend_ids != '')
		{
			$where = " user_entry_id = ".$user_entry_id;
			$where .= " AND friend_id NOT IN (".$friend_ids .")";
			return $this->Poc->delete($table_name='user_entry_details', $where);				
		}
		return false;
	}
	
	/*
	 * Function name: replaceEntryDetails
	 * Purpose: replace data into user_entry_details table / insert if new else update existing
	 * Parameters:
	 * 	$fields = array
	 * 	$values = array	 
	 * Return value: 
	 * 	True: affected rows
	 * 	False: fail
	 * Created By: Manish Patel / 2013-01-27
	 * Updated By: Your Name / Date	 
	 *
	 */
	
	public function replaceEntryDetails() {		
		//NOTE: Replace sample data with get/post/session/db		
		$fields='`user_entry_id`,`friend_id`,`friend_email`'; 
		$values = array();
		//as per fields order maitain values order
		$values[0]['user_entry_id'] = '1';
		$values[0]['friend_id']= '12';
		$values[0]['friend_email'] = 'test1@test.com';
		
		$values[1]['user_entry_id'] = '1';
		$values[1]['friend_id'] = '9';
		$values[1]['friend_email'] = 'test2@test.com';
		
		$values[2]['user_entry_id'] = '1';
		$values[2]['friend_id'] = '16';
		$values[2]['friend_email'] = 'test3@test.com';
		
		$values[3]['user_entry_id'] = '1';
		$values[3]['friend_id'] = '22' ;
		$values[3]['friend_email'] = 'test4@test.com';
		//print "<pre>";
		//print_r($values);
		
		$this->Poc->replace($fields, $values,$table_name='user_entry_details');		
		
	}
	
	public function socialsupportbar()
	{
		$friends = $this->Fb_common_func->getUserFriendsData($this->facebook);
		foreach ($friends['data'] as $key=>$val)
		{
			$data1[$key] = $val['id'];
		}
		$fields = array('fb_id');
		$getresult = $this->Poc->getResults($fields, $table_name='user', $where, $limit='all');
		foreach ($getresult as $key=>$value) {
			$data2[] = $getresult[$key]->fb_id;
		}
		$result = array_intersect($data1,$data2);
		foreach ($result as $res) {
			echo '<img src="https://graph.facebook.com/'.$res.'/picture/"><br/>';
		}	
	}


	public function send_wall_post()
	{
       	 $data="I am meeting friends nitin,rahul, for a reunion in london with Emirates Skywards.";
		 $pic='http://creative2.synechron.com/skywards_qa/images/emirates_logo.gif';
		 $link=APP_LINK."&app_data=nitin";
		 $result=$this->Fb_common_func->wall_post_destination($data,$link,DESTINATION_WALL_POST_TITLE,$pic,'100001187318347',$this->facebook);

	     print_r($result);
	}	
	
	public function update_modified_details()
	{
		//$tbl_user_id=$_SESSION['tbl_user_id'];
		//$tbl_user_entry_id=$_SESSION['tbl_user_entry_id'];
		$tbl_user_id=32;
		$tbl_user_entry_id=56;
		
		$tbl_user_entry_details='user_entry_details';
		$tbl_user_entry='user_entry';
		$tbl_user='user';
		/*$location_id=$_SESSION['location_id']; //modified location id if any
		$selected_friends_details=$_SESSION['selected_friends_details']; //session modified friend list if any
		$old_location_id=$_SESSION['old_location_id']; //alrady stored when clicked on the click of modify entry*/ 
		$location_id=84; 
		$selected_friends_details=array();
		$selected_friends_details = array (
										0 => Array ( 'friend_id' => '1041266626' ,'friend_email' => '','acceptance_status' => '1','acceptance_date'=>'2013-02-05 00:00:00'), 
										1 => Array ( 'friend_id' => '6097034943' ,'friend_email' => '','acceptance_status' => '0','acceptance_date'=>''), 
										2 => Array ( 'friend_id' => '1220631499', 'friend_email' => '','acceptance_status' => '1','acceptance_date'=>'2013-02-05 00:00:00'), 
										3 => Array ( 'friend_id' => '100000933182318' ,'friend_email' => '','acceptance_status' => '0','acceptance_date'=>''), 
										4 => Array ( 'friend_id' =>  '','friend_email' => 'spjahagirdar1@gmail.com','acceptance_status' => '0','acceptance_date'=>'') ) ;
		
										
		$old_location_id=85;
		foreach($selected_friends_details as $key=>$values1){
						if($values1['friend_id']!=''){
						$friend_idarray[]= $values1['friend_id'];
						}
						if($values1['friend_email']!=''){
						$friend_emailarray[]= $values1['friend_email'];
						}
					}
		$selected_friends_details_array=array_merge($friend_idarray,$friend_emailarray);
		$selected_friends_details_str=implode("','",$selected_friends_details_array);		
		$old_selected_friends_details = array (
										0 => Array ( 'friend_id' => '1041266626' ,'friend_email' => '','acceptance_status' => '1','acceptance_date'=>''), 
										1 => Array ( 'friend_id' => '609703494' ,'friend_email' => '','acceptance_status' => '0','acceptance_date'=>''), 
										2 => Array ( 'friend_id' => '1220631499', 'friend_email' => '','acceptance_status' => '1','acceptance_date'=>''), 
										3 => Array ( 'friend_id' => '100000933182318' ,'friend_email' => '','acceptance_status' => '0','acceptance_date'=>''), 
										4 => Array ( 'friend_id' =>  '','friend_email' => 'spjahagirdar@gmail.com','acceptance_status' => '0','acceptance_date'=>'') ) ; 
		
		foreach($old_selected_friends_details as $key=>$values1){
						if($values1['friend_id']!=''){
						$old_friend_idarray[]= $values1['friend_id'];
						}
						if($values1['friend_email']!=''){
						$old_friend_emailarray[]= $values1['friend_email'];
						}
					}
					
		/*if(!empty($friend_idarray) && !empty($old_friend_idarray)){
			$fb_friends_array=array_merge($friend_idarray,$old_friend_idarray);
		}		
		elseif(empty($friend_idarray))
		{
			$fb_friends_array=$old_friend_idarray;
		}	
		elseif(empty($old_friend_idarray))
		{
			$fb_friends_array=$friend_idarray;
		}
		$final_fb_friends_array=array_unique($fb_friends_array);
		$final_fb_friends_str=implode(',',$final_fb_friends_array);
		echo($final_fb_friends_str);*/
		
		if($location_id!=$old_location_id){
			
			$where="user_entry_id=".$tbl_user_entry_id;
			$user_entry_data['location_id']=$location_id;
			$user_entry_data['location_change_flag']=1;
			$user_entry_data['updated_date']= $this->Commonfunc->getDateTime();
			$user_entry_id=$this->Myentries->update($user_entry_data,$table_name='user_entry',$where);	
			
		}
					
		if($location_id==$old_location_id ||$location_id!=$old_location_id)		
		{
		$where="friend_id not in ('".$selected_friends_details_str. "') and user_entry_id=".$tbl_user_entry_id;
		$this->Poc->delete($tbl_user_entry_details,$where);	
		$fields='`user_entry_id`,`friend_id`,`friend_email`,`acceptance_status`,`acceptance_date`'; 
					$values = array();
					foreach($selected_friends_details as $key=>$values1){
						$values[$key]['user_entry_id'] = $tbl_user_entry_id;
						$values[$key]['friend_id']= $values1['friend_id'];
						$values[$key]['friend_email'] = $values1['friend_email'];
						$values[$key]['acceptance_status'] = $values1['acceptance_status'];
						$values[$key]['acceptance_date'] = $values1['acceptance_date'];
					
					}
					$this->Myentries->replace($fields,$values,$table_name='user_entry_details');		
		}
		$this->send_notification_email_wallpost();						
		die();
		
	}
	function check_landing_page()
	{
		
		$fields = array('user_id','email');
		//$fb_id=$_SESSION['fb_user_id'];
		$fb_id='100003618890095';
		$where="fb_id='$fb_id' and sky_mem_id != '' ";
		$getresult_user = $this->Users->getResults($fields, $table_name='user', $where, $limit=1);
		print_r($getresult_user);
		
		if(!empty($getresult_user) && $getresult_user[0]->user_id!='')
		{
			$_SESSION['tbl_user_id']=$getresult_user[0]->user_id;
			
			$fields = array('user_entry_id');
			$user_id=$_SESSION['tbl_user_id'];
			$where="user_id='$user_id'";
			$order_by="order by user_entry_id desc";
			$getresult_user_entry = $this->Users->getResults($fields, $table_name='user_entry', $where, $limit=1,$order_by);
			if($getresult_user_entry[0]->user_entry_id!='' && !empty($getresult_user_entry)) {
				$_SESSION['$tbl_user_entry_id']=$getresult_user_entry[0]->user_entry_id;
				$fields = array('user_entry_details_id');
				$user_entry_id=$_SESSION['$tbl_user_entry_id'];
				$where="user_entry_id='$user_entry_id' && acceptance_status !=1";
				$getresult_user_entry_details = $this->Users->getResults($fields, $table_name='user_entry_details', $where, $limit='all');
				if(!empty($getresult_user_entry_details)){
					header('Location: '.SITE_URL.'index.php?r=myentries/show_entries');
				}
				else
				{
					header('Location: '.SITE_URL.'index.php?r=gmap/map_view_emerites_city');
				}	
				
			}
			else
			{
				header('Location: '.SITE_URL.'index.php?r=gmap/map_view_emerites_city');
			}
		}
		else
		{
			header('Location: '.SITE_URL.'index.php?r=gmap/map_view_emerites_city');
		}
	}

	/*
	 * Function name: get_locked_continents
	 * Purpose: This function returns name of all locked continents.
	 *   Parameters:
	 * 	$fields= user_id
	 * 	$values = int
     * Return value:  array of continents
	 * Created By: nitin tatte / 9/2/2013	 
	 * Updated By: nitin tatte / 9/2/2013	 	 
	 *
	 */

	public function get_locked_continents()
	{
        $fb_id=$_SESSION['fb_user_id'];
		$fields = array('user_id');
		$where="fb_id='".$fb_id."'";
		$getuserresult = $this->Poc->getResults($fields, $table_name='user', $where, $limit=1);
		$user_id = $getuserresult[0]->user_id;
        $continent_data= $this->Poc->fetch_locked_continents($user_id);
		$continent_name='';
		//print_r($continent_data);
		//echo $continent_data[0]['continent_name'];
		foreach ($continent_data as $cont_key=>$cont_val)
		{
			$continent_id=$cont_val['continent_id'];
			$continent_name=$cont_val['continent_name'];
			$where_fields="continent_id=".$continent_id." AND is_emirates_location = '1' AND status = '1'";
			$continent_locked_cities=$this->Poc->getResults(array('city_name'), $table_name='location', $where_fields, $limit='all');
			foreach($continent_locked_cities as $continent_locked_cities_data)
			{
				$continent_locked_cities_arr[]= $continent_locked_cities_data->city_name;
			}
			//print_r($continent_locked_cities);
		}
		print_r($continent_locked_cities_arr);
		//echo "nitin=".$continent_name;
		echo'<!DOCTYPE html><html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Google Maps JavaScript API v3 Example: KmlLayer KML</title>
    <style>
	html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}

#map_canvas {
  height: 100%;
}

@media print {
  html, body {
    height: auto;
  }

  #map_canvas {
    height: 650px;
  }
}
	</style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
      function initialize() {
        var chicago = new google.maps.LatLng(41.875696,-87.624207);
        var mapOptions = {
          zoom: 11,
          center: chicago,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

		marker1 = new google.maps.Marker({
          map: map,
          clickable:false,
          position: new google.maps.LatLng(63.704722429433225,35.5078125)
        });

		marker2 = new google.maps.Marker({
          map: map,
          clickable:false,
          position: new google.maps.LatLng(49.15296965617039,45.3515625)
        });

        var ctaLayer = new google.maps.KmlLayer("'.SITE_URL.'kml/'.$continent_data[0]['continent_name'].'/'.$continent_data[0]['continent_name'].'.kml"
		,{suppressInfoWindows: true,clickable: false,map: map}
		);
		
		//ctaLayer.
		ctaLayer.setMap(map);

		

		//var data= ctaLayer.getDefaultViewport();
		//alert(data);

		

		google.maps.event.addListener(ctaLayer, "click", function(kmlEvent) {
  var kmllatlang = kmlEvent.latLng;
  alert(kmllatlang.lat());
  alert(kmllatlang.lng());
  //var latlngStr = kmllatlang.split(",",2);
   // var lat = parseFloat(latlngStr[0]);
    //var lng = parseFloat(latlngStr[1]);

  
 // alert(lat);
});


 
      }


    </script>
  </head>
  <body onload="initialize()">
    <div id="map_canvas"></div>
  </body>
</html>';

	}
	public function temp()
	{
		echo "hi";
		die();
		$selected_friends_details = array (
										'1041266626' => Array ( 'friend_id' => '1041266626' ,'friend_email' => '','acceptance_status' => '1','acceptance_date'=>'2013-02-05 00:00:00'), 
										'6097034943' => Array ( 'friend_id' => '6097034943' ,'friend_email' => '','acceptance_status' => '0','acceptance_date'=>''), 
										'1220631499' => Array ( 'friend_id' => '1220631499', 'friend_email' => '','acceptance_status' => '1','acceptance_date'=>'2013-02-05 00:00:00'), 
										'100000933182318' => Array ( 'friend_id' => '100000933182318' ,'friend_email' => '','acceptance_status' => '0','acceptance_date'=>''), 
										'spjahagirdar1@gmail.com' => Array ( 'friend_id' =>  '','friend_email' => 'spjahagirdar1@gmail.com','acceptance_status' => '0','acceptance_date'=>'') ) ;
		
		$old_selected_friends_details = array (
										'1041266626' => Array ( 'friend_id' => '1041266626' ,'friend_email' => '','acceptance_status' => '1','acceptance_date'=>''), 
										'609703494' => Array ( 'friend_id' => '609703494' ,'friend_email' => '','acceptance_status' => '0','acceptance_date'=>''), 
										'1220631499' => Array ( 'friend_id' => '1220631499', 'friend_email' => '','acceptance_status' => '1','acceptance_date'=>''), 
										'100000933182318' => Array ( 'friend_id' => '100000933182318' ,'friend_email' => '','acceptance_status' => '0','acceptance_date'=>''), 
										'spjahagirdar@gmail.com' => Array ( 'friend_id' =>  '','friend_email' => 'spjahagirdar@gmail.com','acceptance_status' => '0','acceptance_date'=>'') ) ;
		
		$intersect = array_intersect_key($selected_friends_details, $old_selected_friends_details);
		$diff=array_diff_key($selected_friends_details, $old_selected_friends_details);
		$res=array_merge($diff, $intersect);
		
		echo"<pre>";
		print_r($intersect);
		print_r($diff);
		print_r($res);
	}
	public function newregistration()
	{
		$params = array('skywardsProfile'=>array('Member'=>
				array('PersonID'=>'',
				'PreferencesChanged'=>'',
				'MemUID' => '',
				'DayOfDob' => '',
				'MonthOfDob' => '',
				'YearOfDob' => '',
				'PreferredLanguage' => '',
				'PointsBalanace' => '',
				'TierPointsBalance' => '',
				'MergedToMemUID' => '',
				'DateJoined' => '', 
				'NumberOfFamilyMember' => '', 
				'GroupingNumber' => '', 
				'OgranisationID' => '', 
				'TermDate' => '', 
				'NonExpEnd' => '', 
				'UpgradeProhib' => '', 
				'DgradeProhib' => '', 
				'LastDgradeReviewDate' => '', 
				'LastExp' => '', 
				'WelcomeLetterDate' => '', 
				'EubID' => '', 
				'NumberOfEmployees' => '', 
				'PerCreatedDate' => '', 
				'PmpCreatedDate' => '', 
				'AccOnlineStatusDate' => '', 
				'IsProspect' => '', 
				'IsMinorEnrolment' => '', 
				'OtherMemberCardNo' => '', 
				'FamilyHeadMemUID' => '', 
				'Weight' => '', 
				'DuplicateId' => '', 
				'ForceDuplicateEnrolment' => '', 
				'NominatedDate' => '', 
				'NumberOfPendingActivities' => '', 
				'OrgOrgId' => '', 
				'CorpMemUid' => '', 
				'CorpPointsBal' => '', 
				'CorpNoOfMembersLinked' => '', 
				'CorpJoinDate' => '', 
				'IsMinor' => '', 
				'CardExpiryDate' => '', 
				'MilesExpiryDate' => '',
				'UploadID' => '',			
				'Password'=>'spj1234','FirstName'=> 'sandeep','Title'=>'Mr','LastName'=>'jahagirdar','BirthDate'=>'1982-04-25T00:00:00','EmailAddress'=>'abcdef123456@spj.com','EnrolmentMethod'=>'FAB','RegistrationType'=>'M','EcmCode'=>'FACEB'),
				'Addresses'=>array(
					'Address'=>array('Country'=>'IN','IsPreferred'=>'true',
					'Usages'=>'HOME',
				'OrgID' => '',
				'PersonID' => '',
				'AddressID' => '',
				'LocationID' => '',
				'IsValidate' => ''
				
				))));
				
				
				$result=$this->Webservice->enrollmember($params);
		
				/*$params = array('cardNumber'=> '00499879940');
				$result=$this->Webservice->validatemembershipnumber($params);*/
				echo "<pre>";
				$resultarr=(array)$result;
				print_r($resultarr);
		}


		/*
	 * Function name: post_tagged_wall
	 * Purpose: This function display page for post tagged on the wall.
	 * Created By: nitin tatte / 9/2/2013	 
	 * Updated By: nitin tatte / 9/2/2013	 	 
	 *
	 */

	public function post_tagged_wall()
	{
        //echo "nitin";
		//$this->template="show_tagged_post";
		
		/*$data['art_url'] = SITE_URL."index.php?r=poc/post_tagged_wall";
		$data['art_title'] = "I am going to london after 15 years with Emirates Skywards";
		$data['art_image'] = "http://creative2.synechron.com/Skywards/city_images/Chennai.jpg";
		$data['tagged_users'] = "1220631499,100004933985926,1041266626";
		$data['place_tagged'] = "233749393378348";
		$this->template="show_tagged_post";
		$this->render($data);*/

		 $message='I am going to london after 15 years with Emirates Skywards';
		 $picture=SITE_URL.'city_images/Chennai.jpg';
		 $friend_tagged_ids="1220631499,100004933985926,1041266626,1347427052";
		 //$friend_tagged_ids='';
		 $user_id='100001187318347';
		 $facebook=$this->facebook;
		 $app_namespace=APP_NAMESPACE;
		 $object_name=OPEN_GRAPH_ACTION_NAME;
		 $obj_url=SITE_URL.'view/og_page.php#app_data=nitin';
	 	 $place_tags='233749393378348';
		 $ref_data='app data test';
    	 $result=$this->Fb_common_func->wall_post_tagging($message,$picture,$friend_tagged_ids,$user_id,$facebook,$app_namespace,$object_name,$obj_url,$place_tags,$ref_data);

	     print_r($result);

	}


		
}
?>