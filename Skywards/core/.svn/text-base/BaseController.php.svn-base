<?php	
class BaseController {
	
	public $data;
	public $template;
	public $facebook;
	public $fb_user_info;
	public $fb_user_friends;
	public $access_token;
	public $currentController;
	public $currentAction;
	public $isAjaxMethod;
	public $dynamicjs=array();
	public $ajaxMethods=array(
				array('Choosefriends','searchFbFriends'),
				array('gmap','checkWildCardUser')
				);
	public $requestsToSkip = array('gmap/index','gmap/map_view_emerites_city','prizes/index');	// added by sandip p. to skip the requests from getting permissions		
	public function __construct() {
		global $facebookObj;
		$this->loadModel('BaseModel');
		$this->loadModel('Users');
		$this->loadModel('Notification');		 
		$this->un_read_notifications = 0;
		$this->read_notifications=0;
		$this->res_title=0;
		$this->user_fb_name = '';	
		$loadFb=(isset($_GET['loadFb']) && $_GET['loadFb']!="")?$_GET['loadFb']:0;
		$this->IsAjaRequest=$this->IsAjaxRequest();
		
//		if(!$this->IsAjaRequest || $loadFb) {
			$this->loadLibrary('fb_common_func');
			$this->loadLibrary('Myentries');
			$this->loadLibrary('Commonfunc');
			
			$this->facebook= $facebookObj;
			
			//$this->checkFbUserPermissionsForCurrentRequest();	 commented by sandip P on 31-01-2013
			
			
			try {
				
				$this->access_token = $this->getFbAccessToken();
				ApplicationErrorHandler("access_token",$this->access_token,__FILE__,__LINE__);
				$this->fb_user_id = $this->facebook->getUser();			
				
				// redirect User
				
				$this->handleAppData();
				if($this->fb_user_id){ 				
					try {
						$fb_user_info = $this->facebook->api("/me?access_token=".$this->access_token);
						$this->fb_user_info=$fb_user_info;
					}
					catch(Exception $e) {
						ApplicationErrorHandler("/me failed",serialize($e)."\n".$this->access_token,__FILE__,__LINE__);
					}
					if($fb_user_info){
						$got_fb_user_data = true; 
						$uid = $this->fb_user_info['id'];
						try {
						$this->fb_user_friends = $this->facebook->api("/me/friends?access_token=".$this->access_token);
						}
						catch(Exception $e) {
							ApplicationErrorHandler("",serialize($e),$_SERVER['PHP_SELF'],58);
						}
						logMe("fb_user_info: ".serialize($this->fb_user_info),__FILE__,__LINE__);
						$this->user_fb_name = $this->fb_user_info['first_name'];
						$type='';
						$status = 0; // for not read
						$this->setFBUserData($this->fb_user_info, $this->fb_user_friends);	
						$noti_not_read = $this->Notification->getUserNotificationsCount($uid,$type,$status);
						 
						if($noti_not_read && isset($noti_not_read[0]->cnt)){
							 
							$this->un_read_notifications = $noti_not_read[0]->cnt; 
						}
						if($this->un_read_notifications==1)
						{
							$res_title=$this->Notification->get_un_read_title();
							$this->res_title=$res_title[0]->notification_desc;
						}
						
						$type='';
						$status = 1; // for read
						//$this->setFBUserData($this->fb_user_info, $this->fb_user_friends);	
						$noti_read = $this->Notification->getUserNotificationsCount($uid,$type,$status);
						if($noti_read && isset($noti_read[0]->cnt)){
							 
							$this->read_notifications = $noti_read[0]->cnt; 
						}
						
						$this->assign("read_notifications",$this->read_notifications);
						$this->assign("un_read_notifications",$this->un_read_notifications);
						$this->assign("res_title",$this->res_title);
						$this->assign("user_fb_name",$this->user_fb_name);
						$this->assign('fb_user_info',$this->fb_user_info);
					}
					
				}
				
				
			}	catch(Exception $e) {	ApplicationErrorHandler("",serialize($e),$_SERVER['PHP_SELF'],78); }
		
		$this->hasCreatedEntry($this->fb_user_info['id']);
	}
	
	/*
	 * Function name: setFBUserData
	 * Purpose: set FB access token in session
	 * Parameters:	 
	 * 	$this->facebook = array / FB tokenizer
	 * Return value: set fb_access_token into session
	 * Created By: Sandip P. / 2013-02-01
	 * Updated By: Your Name / Date	 
	 *
	 */
	public function setFBUserData($fb_user_info, $fb_user_friends){
			$_SESSION['fb_user_id'] =  $fb_user_info['id'];
			$_SESSION['fb_user_first_name'] =  $fb_user_info['first_name'];
			$_SESSION['fb_user_last_name'] =  $fb_user_info['last_name'];
			$_SESSION['fb_user_email'] =  $fb_user_info['email'];
			if(isset($fb_user_info['location'])){
				$_SESSION['fb_user_location'] =  $fb_user_info['location']['name'];
			}
			if(isset($fb_user_info['hometown'])){
				$_SESSION['fb_user_hometown'] =  $fb_user_info['hometown']['name'];
			}
			
			$fr_arr = array();
			$fr_id_arr = array();
			$fr_list = '';
			if (isset($fb_user_friends['data'])){
			$i = 0;
				foreach ($fb_user_friends['data'] as $key=>$val){
						$id =  $val['id'];
						$name =  $val['name'];
						$fr_arr[] = $id.",".$name; 
						$fr_id_arr[] = $id; 
						$i++;
				}
			}
			
			if(count($fr_arr)> 0){
				$fr_list = implode("#",$fr_arr);
				$fr_id_list = implode(",",$fr_id_arr);
			}
			
			if($fr_list !="") {
				$_SESSION['fb_user_friends'] = $fr_list; 
			}

			if($fr_id_list !="") {
				$_SESSION['fb_user_friends_id'] = $fr_id_list; 
			}
		 
	}
	/*
	 * Function name: getFBUserData
	 * Purpose: get FB User Data
	 * Parameters:	 
	 * 	$this->facebook = array / FB tokenizer
	 * Return value: set fb_access_token into session
	 * Created By: sandip P. / 2013-02-01
	 * Updated By: Your Name / Date	 
	 *
	 */
	public function getFBUserData(){
			return  array('fb_user_id'=>$_SESSION['fb_user_id'],
						 'fb_user_first_name'=>$_SESSION['fb_user_first_name'],
						 'fb_user_last_name'=>$_SESSION['fb_user_last_name'],
						 'fb_user_last_name'=>$_SESSION['fb_user_last_name'],		
						 'fb_user_location'=>$_SESSION['fb_user_location'],
			 			 'fb_user_hometown'=>$_SESSION['fb_user_hometown'],
						 'fb_user_email'=>$_SESSION['fb_user_email'],
						 'fb_user_friends'=>$_SESSION['fb_user_friends'],
						 'fb_user_friends_id'=>$_SESSION['fb_user_friends_id']
						 );
	}
	
	public function IsAjaxRequest() {
		if(isset($_GET['r']) && $_GET['r']!="") {
			$request=$_GET['r'];
		}
		else {
			$request="home";
		}
		$requests=explode("/",$request);
		
		
		$isAjaxMethod=0;
		foreach($this->ajaxMethods as $Amethods) {
		
			if($requests[0]==$Amethods[0] && $requests[1]==$Amethods[1])
			{
				$isAjaxMethod=1;
				break;
			}
		}
		return $isAjaxMethod;
		
		
	}
	public function assign($key,$value) {
		$this->data[$key]=$value;
	}
	
	public function loadModel($modelName) {
		
		$modelName_load=ucfirst($modelName);		
		$this->$modelName=new $modelName_load();
	}
	
	public function loadLibrary($libraryName) {
		$libraryName_load=ucfirst($libraryName);
		$this->$libraryName=new $libraryName_load();
	}
	
	public function render($data=array(),$include_header=1,$include_footer=1){
		global $controller, $view;
		
		$countdata = $this->countDownDate();
		$this->assign('countdata',$countdata);
		
		if(isset($this->template) && $this->template!="") 
		{
			$template = $this->template;			
		}
		else 
		{
			$template= $view;
		}
		
		if (trim($template)=='')
		{
			$template ='index';
		}
		//$story=array('id'=>'2','title'=>'spj');
		$fields = array('entry_story');
		$where="is_featured='1'";
		//$result = $this->Myentries->getResults($fields, $table_name='user_entry', $where, $limit=5);
		//$result = $this->Myentries->getStory();
		
		$result_my_entries = $this->Myentries->getEntries();//Adde by Sandeep Jahagirdar to show top 10 my entries in the footer on 13/02/2013
		
		if ($this->data!="")
			extract($this->data);
		
		if($include_header == 1) {	
			$this->includeCSS(IS_CSS_EXPIRE);
			include(BASEPATH.DS."view".DS."header.php");
		}
		include(BASEPATH.DS."view".DS.$controller.DS.$template.".php");
		
		if($include_footer == 1) {
			include(BASEPATH.DS."view".DS."footer.php");
		}
		
		unset($data);
	}

	/*
	 * Function name: setFbAccessToken
	 * Purpose: set FB access token in session
	 * Parameters:	 
	 * 	$this->facebook = array / FB tokenizer
	 * Return value: set fb_access_token into session
	 * Created By: Manish Patel / 2013-01-28
	 * Updated By: Your Name / Date	 
	 *
	 */
	
	public function setFbAccessToken() {				
		/*$this->facebook= new Facebook(array(
				'appId'  => APP_ID,
				'secret' => APP_SEC_KEY,
				'cookie' => true
			)); */
			try {
			
		$_SESSION['fb_access_token'] = $this->facebook->getAccessToken();		
		}
		catch (Exception $e) {
			ApplicationErrorHandler("",serialize($e),$_SERVER['PHP_SELF'],248);
		}
	}
	
	/*
	 * Function name: checkFbUserPermissionsForCurrentRequest
	 * Purpose: Check user has authorised app / given permissions to app or not for this request
	 * Parameters:	 
	 * 	 
	 * Return value:  
	 * Created By: Sandip Patil 2013-01-30
	 * Updated By: Your Name / Date	 
	 *
	 */
	
	public function checkFbUserPermissionsForCurrentRequest() {	 
	$current_request = '';
	$isPermission = false; 
	if(isset($_REQUEST['r'])){
		$current_request = $_REQUEST['r']; 
	}  
		if($current_request != ""){
			$req_not_to_check =  $this->requestsToSkip;
			if(!in_array($current_request, $req_not_to_check)){
				try {
				$fb_user = $this->facebook->getUser();	
				}
				catch(Exception $e) {
					ApplicationErrorHandler("",serialize($e),$_SERVER['PHP_SELF'],275);
				}
				if($fb_user){
					try {
					$permissions = $facebook->api("/me/permissions?access_token=".$this->access_token);	
					
					}
				catch(Exception $e) {
					ApplicationErrorHandler("",serialize($e),$_SERVER['PHP_SELF'],283);
				}
					if (isset($permissions['data'][0]) && isset($permissions['data'][0]['publish_stream']))   
					{
						$isPermission=true;
					}	 		
				}
			}else{
				$isPermission=true;
			}
			
			if($isPermission == false){
				//$redirect_to = '?r=gmap/index';				 
				$redirect_to = $this->fb_common_func->getPermissionUrl(PERMISSION_SCOPE,FB_PAGE_URL_PERMISSION);
				header("Location: $redirect_to"); die;
			}
			
		}	
		
	}
	
	/*
	 * Function name: getFbAccessToken
	 * Purpose: get FB access token in session
	 * Parameters: none	 
	 * Return value: get fb_access_token from session / else get it thru FB call
	 * Created By: Manish Patel / 2013-01-28
	 * Updated By: Manish Patel / 2/20/2013 - Added fallback mechanism to handle access token expiration logic
	 *
	 */
	public function getFbAccessToken() {
		if(isset($_SESSION['fb_access_token']) && $_SESSION['fb_access_token']!="") {
			$access_token= $_SESSION['fb_access_token'];
		}
		else {
			try {
				$access_token=$this->facebook->getAccessToken();
			}
			catch(Exception $e) {
				
			}
		}
		
		return $access_token;
	}	

	public function AddDynamicJs($filename) {
		if(isset($filename) && $filename != '' ){
			$this->dynamicjs[]=$filename;	
		}		
	}
	
	public function loadDynamicJs() {
		foreach($this->dynamicjs as $filename) {
			if(isset($filename) && $filename != '' ){
				include_once($filename);
			}
		}
	}
	
	public function countDownDate() {
	
		$params= array("draw_date","user_entry_id");
		$where = 'user_entry_id is null';
		$table = 'draw_details';
		$limit = '1';
		$order = 'ORDER BY draw_date ASC';
		
		$data = $this->BaseModel->getResults($params,$table,$where,$limit,$order);
		
		if($data)	{			
			$cnddate = explode("-",$data[0]->draw_date);
			$temp = explode(" ",$cnddate[2]);
			$time = explode(":",$temp[1]);
		
			
			$year = $cnddate[0];		
			$month = $cnddate[1];			
			$day = $temp[0];			
			$hour = $time[0];			
			$minute = $time[1];
			
			//exit;
			// make a unix timestamp for the given date
			$the_countdown_date = mktime($hour, $minute, 0, $month, $day, $year, -1);
			$today = time();
			$difference = $the_countdown_date - $today;
			if ($difference < 0) $difference = 0;

			$days_left = floor($difference/60/60/24);
			$hours_left = floor(($difference - $days_left*60*60*24)/60/60);
			$minutes_left = floor(($difference - $days_left*60*60*24 - $hours_left*60*60)/60);
			//$sec_left = ($rem % 60);
			
			if(strlen($days_left) == 1) {
				$cntdown["day"]  = "0".$days_left ;
			}else {
				$cntdown["day"]  = $days_left ;
			}
			
			if(strlen($hours_left) == 1){
				$cntdown["hr"]   = "0".$hours_left ;
			}else{
				$cntdown["hr"]   = $hours_left ;
			}
			
			if(strlen($minutes_left) == 1){
				$cntdown["min"]  = "0".$minutes_left ;
			}else{
				$cntdown["min"]  = $minutes_left ;
			}
		
			$cntdown["sec"]  = "00";
			
			return $cntdown;	
		} 
		return false;	
		
	}
	
	/*
	 * Function name: unsetSession
	 * Purpose: unset session data
	 * Parameters: 
	 * $key - array or single key/ $arr[] = 'sess1';$arr[] = 'sess1'; OR $key = 'sess1'; 		 
	 * Return value: unset session data
	 * Created By: Manish Patel / 2013-02-05
	 * Updated By: Your Name / Date	 
	 *
	 */
	public function unsetSession($key) {
		if(count($key) > 0 ) {
			foreach($key as $k => $v) {
				unset($_SESSION[$v]);
			}		
		} else if(isset($key) && $key != '' ) {
			unset($_SESSION[$key]);
		}
	}
	
	/*
	 * Function name: includeCSS
	 * Purpose: create single css file and minify its content
	 * Parameters:	 
	 * Return value: 
	 * Created By: Manish Patel / 2013-02-07
	 * Updated By: Your Name / Date	 
	 *
	 */
	public function includeCSS($is_expire=true) {	
	$combine_css = BASEPATH.DS.'css'.DS."combine_css.css";
	global $cssFiles;	
		if($is_expire) {
			file_put_contents($combine_css, '');
			foreach($cssFiles as $k => $file) {				
				if( file_exists(BASEPATH.DS.'css'.DS.$file) ) {
					$content = file_get_contents(BASEPATH.DS.'css'.DS.$file);
					$content = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $content);					
					file_put_contents($combine_css, $content, FILE_APPEND | LOCK_EX);
				}
			}	
		}	
	}
	
	/*
	 * Function name: send_notification_email_wallpost
	 * Purpose: This will be called from the SkywardsmemberController.php and MyentriesController.php in controller
	 * Parameters:	 
	 * Return value: 
	 * Created By: Sandeep Jahagirdar / 2013-02-08
	 * Updated By: Your Name / Date	 
	 *
	 */
	public function send_notification_email_wallpost()
	{
		/*Start for the sending the email, notofication and wall post*/
		$selected_friends_details=$_SESSION['selected_friends_details'];
		$location_id=$_SESSION['location_id'];
		$old_location_id=$_SESSION['old_location_id'];
		$fb_id=$_SESSION['fb_user_id'];
		//$fb_id='100003618890095';
		
		/*$selected_friends_details=array (
										0 => Array ( 'friend_id' => '1041266626' ,'friend_email' => '','acceptance_status' => '1','acceptance_date'=>'2013-02-05 00:00:00'), 
										1 => Array ( 'friend_id' => '100001187318347' ,'friend_email' => '','acceptance_status' => '0','acceptance_date'=>''), 
										2 => Array ( 'friend_id' => '100004933985926', 'friend_email' => '','acceptance_status' => '1','acceptance_date'=>'2013-02-05 00:00:00'), 
										3 => Array ( 'friend_id' => '1220631499' ,'friend_email' => '','acceptance_status' => '0','acceptance_date'=>''), 
										4 => Array ( 'friend_id' =>  '','friend_email' => 'spjahagirdar@gmail.com','acceptance_status' => '0','acceptance_date'=>'') ) ;;*/
		//$location_id=84;
		//$old_location_id=85;
		
		$friend_idarray=array();
		$friend_emailarray=array();
		//if($location_id!=$old_location_id)
		//{
			foreach($selected_friends_details as $key=>$values1){
				if($location_id!=$old_location_id && $values1['friend_id']!=''){
					$friend_idarray[]= $values1['friend_id'];
				} else if($location_id==$old_location_id && $values1['friend_id']!='' && $values1["acceptance_status"]!="1"){
					$friend_idarray[]= $values1['friend_id'];
				}else if($values1['friend_email']!='' && $old_location_id=='' && $location_id!='')
				{
					$friend_idarray[]= $values1['friend_id'];
				}
				if($location_id!=$old_location_id && $values1['friend_email']!='' ){
					$friend_emailarray[]= $values1['friend_email'];
				}else if($location_id==$old_location_id && $values1['friend_email']!='' && $values1["acceptance_status"]!="1"){
					$friend_emailarray[]= $values1['friend_email'];
				}
				else if($values1['friend_email']!='' && $old_location_id=='' && $location_id!='')
				{
					$friend_emailarray[]= $values1['friend_email'];
				}
			}
		
			/*Start for sending the notifications*/
			if(!empty($friend_idarray))
			{
				foreach($friend_idarray as $fbid) {
						$subject="Your friend has invited you.";
						$code='invitation|'.$_SESSION['tbl_user_entry_id'].'|'.$fbid;
						$result=$this->Fb_common_func->send_notification($this->facebook,$subject, array($fbid),APP_TOKEN,$_SESSION['fb_user_id'],$code);
						}
			}
			/*End for sending the notifications*/

			/*Start for sending the email*/
			
			$first_name=$_SESSION['fb_user_first_name'];
			$city_name=$_SESSION['cityName'];
			
			if(!empty($friend_emailarray))
			{
				foreach($friend_emailarray as $email2) { 
					$subject="Your friend has invited you.";
					$code=base64_encode($_SESSION['tbl_user_entry_id'].'||'.$email2);
					$link=APP_LINK.'&app_data=invitation|'.$code;
					$msg_body='Dear '.$email2.'<br/> Your friend '.$first_name.' has invited you for a trip to '.$city_name.'. Click on below link to accept or decline his request.<br />'.$link;
					$result=$this->Commonfunc->send_email_acceptance_link(EMAIL_FROM,$email2,$subject,$msg_body);
				}
			}
			/*End for sending the notifications*/	

			/* Start of email to be send to originator id regarding the destination confirmation*/
			$fbfriends=$_SESSION['fb_user_friends'];
			//$fbfriends='100004933985926,Manish Patel#609703494,Atul Nath#626417105,Prabhas Nayak#632531552,Jitendra Singh#1041266626,Rajesh Patil#1220631499,Sameer Kelkar#1268065008,Sandip Patil#1347427052,Rahul Sonar#1606136972,Tejinder Singh Nagee#100001187318347,Nitin Tatte#100004307071114,Chaitanya Satpute#100004377272706,Chaitenya Yadav#100004713606450,Sameer Kelkar#100005095356317,Nader Yassa';
			
	        //$first_name='Sandeep';   
     		
        	//$city_name="Dubai";
        	$fields = array('user_id','email');
			$where = "fb_id='$fb_id' and sky_mem_id != '' ";
			$order_by = '';
			$getresult = $this->Users->getResults($fields, $table_name='user', $where, $limit=1,$order_by);
        	$email= $getresult[0]->email;;
        	$to_email=array($email);
       		//$to_email=array('spjahagirdar@gmail.com');
       
			$fb_name=array();
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
			
			if(!empty($friend_emailarray) && !empty($fb_name) )
			{
				$selected=array_merge($fb_name,$friend_emailarray);
			}
			elseif(!empty($friend_emailarray) && empty($fb_name))
			{
				$selected=$friend_emailarray;
			}
			elseif(!empty($fb_name) && empty($friend_emailarray))
			{
				$selected=$fb_name;
			}
			$selected=array_unique($selected);
			$fb_name_str=implode(",",$selected);
			
			$message_body="Dear ".$first_name.",<br/> You have selected the ".$city_name." destination. You have selected ".$fb_name_str."<br/><a href=".APP_LINK.">Click Here</a> to go to application";
			$result=$this->Commonfunc->send_email_notification(EMAIL_FROM,$to_email,'Destination Confirmation',$message_body);
			
			/* End of email to be send to originator id regarding the destination confirmation*/
			/* Start of Wall Post*/
			$fields = array('city_image');
			$where="location_id='$location_id'";
			//$getresult = $this->Users->getResults($fields, $table_name='location', $where, $limit=1);
			$getresult='images/emirates_logo.gif';
			//$pic=SITE_URL.'city_images/'.$getresult;
			$pic=SITE_URL.$getresult;
			$wall_message="I am meeting friends ".$fb_name_str.", for a reunion in ".$city_name." with Emirates Skywards";
			$this->Fb_common_func->wall_post_destination($wall_message,APP_LINK,DESTINATION_WALL_POST_TITLE,$pic,$fb_id,$this->facebook);
			/*End Of Wall Post*/
			/*End for the sending the email, notofication and wall post*/
	}	
	
	public function hasCreatedEntry($fbid) {
        
		if(isset($fbid) && $fbid!= '') {
			$hasEntry= $this->Users->hasEntry($fbid);          
            $this->assign('hasEntry',$hasEntry);
        }
	}
	
	public function handleAppData() {
	
		$decoded_data = $this->fb_common_func->parsePageSignedRequest();
		if ( isset($decoded_data->app_data) && !empty($decoded_data->app_data) )
		{
			// we can handle the requests from here	
			$appRequests=explode("|",urldecode($decoded_data->app_data));
			if($appRequests[0]=='invitation') {
								
				$entry_id=$appRequests[1];
				$email=$appRequests[2];
				$_SESSION['invitation_data']['entry_id']=$entry_id;
				$_SESSION['invitation_data']['data']=$email;
				header("Location: index.php?r=landing/invitation");
				die();
			}
			
		}
	}
}