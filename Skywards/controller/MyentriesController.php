<?php
class MyentriesController extends BaseController {
	
	public function __construct() {
		parent::__construct();
		$this->loadModel('Myentries');
		$this->loadLibrary('Fb_common_func');
		$this->loadLibrary('Commonfunc');
		//$this->loadModel('Getcity');
		//$this->loadLibrary('Googlemaps');
		//$this->loadModel('FbfriendsLocation');
	}
	
	public function index(){
		
		//echo "nitin";
		//die();
		$this->show_entries();
	}


	/*
	 * Function name: show_entries
	 * Purpose: Display my entries section.
	 * Created By: nitin tatte / 5/2/2013	 
	 * Updated By: nitin tatte / 5/2/2013	 	 
	 *
	 */
	
	public function show_entries() {
		
		if($_REQUEST['status']=='change_destination' || $_REQUEST['status']=='change_friends'){
			$this->update_modified_details();
		}
		$data['myentries'] = 1;
		//$user_data=$this->fb_common_func->getUserInfo($this->facebook);
		$fb_id=$_SESSION['fb_user_id'];
		
		$fields = array('user_id');
		$where="fb_id='".$fb_id."'";
		$getuserresult = $this->Myentries->getResults($fields, $table_name='user', $where, $limit=1);
		$user_id = $getuserresult[0]->user_id;
		
		$data['skywardsEntries'] = $this->Myentries->getUserEntries($user_id);

		//print_r($data['skywardsEntries']);
		if(!empty($_GET["status"]) && $_GET["status"]=="add")
		{ 
           
		  $data['succ_enrty_story']= SUCC_MYENTRY_ENTRYSTORY;

		}
		$data['fb_userid']=$fb_id;
		$this->assign('padBt35','padBt35');
		$this->template="show_entries";
		$this->render($data);		
	}

	public function add_entry_story()
	{  
		$enrty_story=$_POST["enrty_story"];
		$fb_userid=$_POST["fb_userid"];
		$data['entry_story'] = $enrty_story;
		$where="user_entry_id=".$_POST["user_entry_id"];
        //$result_enrty_story= $this->Myentries->getResults(array('entry_story'),'user_entry',$where,$limit=1);
		//$pre_entry_story=$result_enrty_story[0]->entry_story;

		$result = $this->Myentries->update($data,'user_entry',$where);

		if($result==1)
		{
                   //$story_fb_id=$this->fb_common_func->wall_post($enrty_story,$fb_userid,$this->facebook);
				    
					//if($story_fb_id['id']!="")
					//{
						
						header("location:".SITE_URL."/index.php?r=myentries/show_entries&status=add");
						exit;
					//}
		}
		
			        


	}


	
	/*
	 * Function name: send_email_notification
	 * Purpose: This function send email and fb notification to user.
	 *   Parameters for mail:
	 * 	$fields= from,to,subject,message 
	 * 	$values = email address,email address,string,html data/string
     *   Parameters for fb notification:
	 * 	$fields= fb object,notification message,fb_id array,app token,originator id
	 * 	$values = oject,srting,array,string,int
	 * 
	 * Return value: 
	 * 	True: 1
	 * 	False: 0
	 * Created By: nitin tatte / 3/2/2013	 
	 * Updated By: nitin tatte / 3/2/2013	 	 
	 *
	 */

	public function send_email_notification()
	{
       	$mess_id=$_REQUEST["mess_id"];
		$mess_status=$_REQUEST["mess_status"];
	    //echo $mess_id;
		//echo $mess_status;
		//echo "nitin".$mess_status;
		//exit;
		if($mess_status=="email")
		{
			$result=$this->Commonfunc->send_email_notification(EMAIL_FROM,array($mess_id),SUB_MYENTRY_MESSASE,MYENTRY_MESSASE_TEXT);
			if($result)
			{
				$send_message=$mess_status;
			}
			else
			{
				$send_message='fail';
			}


		}
		else
		{
			$result=$this->Fb_common_func->send_notification($this->facebook,MYENTRY_NOTIFICATION_MESSAGE,array($mess_id),APP_TOKEN,'1');
			if($result)
			{
				$send_message=$mess_status;
			}
			else
			{
				$send_message='fail';
			}
		}
		echo $send_message;
	}


	/*
	 * Function name: modify_user_entry_data
	 * Purpose: This function store my entry data into session and redirect to the gamp view.
	 *   Parameters:
	 * 	$fields= user_id,user_entry_id,location_id 
	 * 	$values = int,int,int
     * Return value:  no return value
	 * Created By: nitin tatte / 8/2/2013	 
	 * Updated By: nitin tatte / 8/2/2013	 	 
	 *
	 */

	public function modify_user_entry_data()
	{ 
        if(empty($_REQUEST['entry_id']) || empty($_REQUEST['user_id']) || empty($_REQUEST['location_id']))
		{
			echo "fail";
		}
		else
		{
			$fields = array('friend_id','friend_email','entry_status','acceptance_status','acceptance_date','firstname','lastname');
			$where="user_entry_id='".$_REQUEST['entry_id']."'";
			$get_modify_entry_data = $this->Myentries->getResults($fields, $table_name='user_entry_details', $where, $limit='all');

			$_SESSION['tbl_user_id']=$_REQUEST['user_id'];
            $_SESSION['tbl_user_entry_id']=$_REQUEST['entry_id'];
			$_SESSION['old_location_id']=$_REQUEST['location_id'];
			$_SESSION['old_SelectDestLat']=$_REQUEST['old_latitide'];
			$_SESSION['old_SelectDestlong']=$_REQUEST['old_longitude'];

			foreach($get_modify_entry_data as $entry_data)
			{
			 if($entry_data->friend_id)
			 {
				$profile_img="https://graph.facebook.com/".$entry_data->friend_id."/picture?width=67&height=67";
			 }
			 else
			 {
				$profile_img= BLANK_PROFILE_IMG;
			 }
			if($entry_data->friend_id!="") {
				if($entry_data->friend_id!=$_REQUEST['removeVal'])
				$arr_entry_data[$entry_data->friend_id]=array('friend_id'=>$entry_data->friend_id,'friend_email'=>$entry_data->friend_email,'acceptance_status'=>$entry_data->acceptance_status,'acceptance_date'=>$entry_data->acceptance_date,'firstname'=>$entry_data->firstname,'lastname'=>$entry_data->lastname,"profile_img"=>$profile_img); 
			}else {
				if($entry_data->friend_email!=$_REQUEST['removeVal'])
				$arr_entry_data[$entry_data->friend_email]=array('friend_id'=>$entry_data->friend_id,'friend_email'=>$entry_data->friend_email,'acceptance_status'=>$entry_data->acceptance_status,'acceptance_date'=>$entry_data->acceptance_date,'firstname'=>$entry_data->firstname,'lastname'=>$entry_data->lastname,"profile_img"=>$profile_img); 
			}
			}

			$_SESSION['old_selected_friends_details']=$arr_entry_data;
			
			echo "success";
		}
	}
	
/*
	 * Function name: modify_user_entry_data
	 * Purpose: This function update data in userentry and user_entry_details table when get the modified information when clicked on modify entry on my entries page
	 * Parameters: no parameters requires
	 * Return value:  no return value
	 * Created By: sandeep jahagirdar  8/2/2013	 
	 * Updated By: 	 	 
	 *
	 */
	public function update_modified_details()
	{
		/* echo "<pre>";
		print_r($_SESSION); */
		//die();
		$tbl_user_id=$_SESSION['tbl_user_id'];
		$tbl_user_entry_id=$_SESSION['tbl_user_entry_id'];
		//$tbl_user_id=32;
		//$tbl_user_entry_id=56;
		
		$tbl_user_entry_details='user_entry_details';
		$tbl_user_entry='user_entry';
		$tbl_user='user';
		$location_id=$_SESSION['location_id']; //modified location id if any
		$selected_friends_details=$_SESSION['selected_friends_details']; //session modified friend list if any
		$old_selected_friends_details=$_SESSION['old_selected_friends_details'];
		$old_location_id=$_SESSION['old_location_id']; //alrady stored when clicked on the click of modify entry*/ 
		//$location_id=84; 
		//$old_location_id=85;
		/*$selected_friends_details = array (
										0 => Array ( 'friend_id' => '1041266626' ,'friend_email' => '','acceptance_status' => '1','acceptance_date'=>'2013-02-05 00:00:00'), 
										1 => Array ( 'friend_id' => '6097034943' ,'friend_email' => '','acceptance_status' => '0','acceptance_date'=>''), 
										2 => Array ( 'friend_id' => '1220631499', 'friend_email' => '','acceptance_status' => '1','acceptance_date'=>'2013-02-05 00:00:00'), 
										3 => Array ( 'friend_id' => '100000933182318' ,'friend_email' => '','acceptance_status' => '0','acceptance_date'=>''), 
										4 => Array ( 'friend_id' =>  '','friend_email' => 'spjahagirdar1@gmail.com','acceptance_status' => '0','acceptance_date'=>'') ) ;*/
		
		foreach($selected_friends_details as $key=>$values1){
						if($values1['friend_id']!=''){
						$friend_idarray[]= $values1['friend_id'];
						}
						if($values1['friend_email']!=''){
						$friend_emailarray[]= $values1['friend_email'];
						}
					}
					
		if(!empty($friend_idarray)) { $friend_idarray_str= implode("','",$friend_idarray);}
		if(!empty($friend_emailarray)) { $friend_emailarray_str= implode("','",$friend_emailarray);}
		$selected_friends_details_array=array_merge($friend_idarray,$friend_emailarray);
		$selected_friends_details_str=implode("','",$selected_friends_details_array);		
		/*$old_selected_friends_details = array (
										0 => Array ( 'friend_id' => '1041266626' ,'friend_email' => '','acceptance_status' => '1','acceptance_date'=>''), 
										1 => Array ( 'friend_id' => '609703494' ,'friend_email' => '','acceptance_status' => '0','acceptance_date'=>''), 
										2 => Array ( 'friend_id' => '1220631499', 'friend_email' => '','acceptance_status' => '1','acceptance_date'=>''), 
										3 => Array ( 'friend_id' => '100000933182318' ,'friend_email' => '','acceptance_status' => '0','acceptance_date'=>''), 
										4 => Array ( 'friend_id' =>  '','friend_email' => 'spjahagirdar@gmail.com','acceptance_status' => '0','acceptance_date'=>'') ) ;*/ 
		
		foreach($old_selected_friends_details as $key=>$values1){
						if($values1['friend_id']!=''){
						$old_friend_idarray[]= $values1['friend_id'];
						}
						if($values1['friend_email']!=''){
						$old_friend_emailarray[]= $values1['friend_email'];
						}
					}
		if(!empty($old_friend_idarray)) { $old_friend_idarray_str= implode("','",$old_friend_idarray);}
		if(!empty($old_friend_emailarray)) { $old_friend_emailarray_str= implode("','",$old_friend_emailarray);}	
				
		if($location_id!=$old_location_id){
			
			$where="user_entry_id=".$tbl_user_entry_id;
			$user_entry_data['location_id']=$location_id;
			$user_entry_data['location_change_flag']=1;
			$user_entry_data['updated_date']= $this->Commonfunc->getDateTime();
			$user_entry_id=$this->Myentries->update($user_entry_data,$table_name='user_entry',$where);	
			
		}
					
		if($location_id==$old_location_id ||$location_id!=$old_location_id)		
		{
		$where="user_entry_id=".$tbl_user_entry_id."";
		$this->Myentries->delete($tbl_user_entry_details,$where);	
		
		$fields='`user_entry_id`,`friend_id`,`friend_email`,`acceptance_status`,`acceptance_date`,`firstname`,`lastname`'; 
					$values = array();
					foreach($selected_friends_details as $key=>$values1){
						$friend_id=($values1['friend_id'])? ($values1['friend_id']): null;
						$values[$key]['user_entry_id'] = $tbl_user_entry_id;
						$values[$key]['friend_id']= $friend_id;
						$values[$key]['friend_email'] = $values1['friend_email'];
						$values[$key]['acceptance_status'] = $values1['acceptance_status'];
						$values[$key]['acceptance_date'] = $values1['acceptance_date'];
						$values[$key]['firstname'] = $values1['firstname'];
						$values[$key]['lastname'] = $values1['lastname'];
					
					}
					$this->Myentries->replace($fields,$values,$table_name='user_entry_details');		
		}

		if(SEND_NOTIFICATION_EMAIL_WALL=='true'){
			/*Start for the sending the email, notofication and wall post*/
			$this->send_notification_email_wallpost();						
		}
	}
    
} 
?>