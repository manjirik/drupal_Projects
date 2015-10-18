<?php
require_once("facebook.php");
class Fb_common_func {
//------------------------------------------------------
	public function parsePageSignedRequest()
	{	 
		if( isset( $_REQUEST['signed_request'] ) )
		{			
			$encoded_sig = null;
			$payload = null;
			list( $encoded_sig, $payload ) = explode( '.', $_REQUEST['signed_request'], 2 );
			$sig = $this->base64_url_decode( strtr( $encoded_sig, '-_', '+/' ) );
			$data = json_decode( $this->base64_url_decode( strtr( $payload, '-_', '+/' ), true ) );
			return $data;
		}
		return false;
	}
//------------------------------------------------------
//Check FB apps like or not by current user
	public function fbAppLikeOrUnlike($facebook) {
		 		
		$signedRequest = $this->parsePageSignedRequest(); 
		if (is_object($signedRequest)) {	
			if( $signedRequest->page->liked )
				
				$res = 1;
			else
				$res = 0;	
		} else
			$res = 0;	
			
		return $res;	
	}
//------------------------------------------------------	
		public function getPermissionUrl($permissions,$next){		
		 $_SESSION['state'] = md5(uniqid(rand(), TRUE)); // CSRF protection
    	 $dialog_url = "https://www.facebook.com/dialog/oauth?client_id=" 
       . APP_ID . "&redirect_uri=" . urlencode($next) . "&state="
       . $_SESSION['state'] . "&scope=".$permissions;
	   return $dialog_url; 
     		
	}
//------------------------------------------------------
	public function base64_url_decode($input) 
	{
		return base64_decode(strtr($input, '-_', '+/'));
	}
	
 //------------------------------------------------------
	
	public function get_fb_user_pic($fb_user_id, $size=''){		 
		$type = '?type=square';
		/*
		 * types: 
		 * small  : The image can have a maximum width of 50px and a maximum height of 150px
		 * square : The image can have a maximum width and height of 50px
		 * large: : The image can have a maximum width of 200px and a maximum height of 600px.  
		 * normal: The image can have a maximum width of 100px and a maximum height of 300px
		 */
		
		return $user_img_url = "https://graph.facebook.com/$fb_user_id/picture$type";
	}
	
	//------------------------------------------------------
	public function get_fb_user_link($fb_user_id){		 
		return 'http://www.facebook.com/'.$fb_user_id;
	}	
	//------------------------------------------------------

	public function getUserLikedPages($facebook,$access_token){
		//This fql requires user_likes permisson
		$fql = "SELECT name, page_id from page where page_id in (SELECT page_id from page_fan where uid in (SELECT uid2 FROM friend WHERE uid1 = me()))";
     	$pages_i_liked = $facebook->api(array(
			  'method'       => 'fql.query',
			  'access_token' => $access_token,
			  'query'        => $fql,
			));	
		// Or by using graph api		
		//$pages_i_liked = $facebook->api("/me/likes");
		return $pages_i_liked; 		
	}
	
	public function getUserFriendswithLocation($facebook,$access_token,$userId,$current_location='',$isAppUser = false) {
		$fql = "SELECT uid, first_name, last_name, current_location, hometown_location FROM user 
				WHERE 
					(current_location!='' OR hometown_location!='') AND 
					uid in (SELECT uid2 FROM friend where uid1 = $userId)
				LIMIT 10 ";
					
		 //echo $fql.'<br />';
		 try {
		$friends = $facebook->api(array(
							  'method'       => 'fql.query',
							  'access_token' => $access_token,
							  'query'        => $fql,
							));
			}
			catch(Exception $e)
			{
				ApplicationErrorHandler("",serialize($e),__FILE__,__LINE__);
				
			}
			return $friends;
	}
	
	public function getUserFriendswithoutLocation($facebook,$access_token,$userId,$current_location='',$isAppUser = false) {
		$fql = "SELECT uid, first_name, last_name, current_location, hometown_location FROM user 
				WHERE 
					(current_location=='' AND hometown_location=='') AND 
					uid in (SELECT uid2 FROM friend where uid1 = $userId)
				LIMIT 10 ";
					
		 //echo $fql.'<br />';
		 try {
		$friends = $facebook->api(array(
							  'method'       => 'fql.query',
							  'access_token' => $access_token,
							  'query'        => $fql,
							));
			}
			catch(Exception $e)
			{
				ApplicationErrorHandler("",serialize($e),__FILE__,__LINE__);
				//logError($e);
			}
			
			return $friends;
	}
	//------------------------------------------------------
	public function getUserFriends($facebook,$access_token,$userId,$current_location='',$isAppUser = false){   
	
		$append = "";
		$friends = '';
		if($current_location !=''){
			$append .= " AND current_location.city = '$current_location'";
		}

		if($isAppUser == true){
			$append .= " AND is_app_user = 1"; // check the user has logged in to the current application
			//$append .= " AND install_type  = 1"; // App install type of the user
		}
		
		//$append .= " AND online_presence IN ('active', 'idle')";
		
		 $fql = "SELECT uid, first_name, last_name, pic_small, current_location, hometown_location FROM user WHERE uid in (SELECT uid2 FROM friend where uid1 = $userId)  ";
		 //echo $fql.'<br />';
		 try {
		$friends = $facebook->api(array(
							  'method'       => 'fql.query',
							  'access_token' => $access_token,
							  'query'        => $fql,
							));
			}
			catch(Exception $e)
			{
				ApplicationErrorHandler("/fql failed",serialize($e)."\n".$access_token,__FILE__,__LINE__);
				
			}
			
		return $friends; 
	}
	
	public function search_gapi(){
		$url = "https://graph.facebook.com/search?q=coffee&type=place&center=37.76,-122.427&distance=1000";
	}
	
	
	/*
	 * Function name: wall_post
	 * Purpose: This function post messages on FB wall.
	 *   Parameters:
	 * 	$fields= data,userId,facebook
	 * 	$values = message(string),userid,facebook object
	 * 
	 * Return value: 
	 * 	True: fb post id
	 * 	False: 0
	 * Created By: nitin tatte / 5/2/2013	 
	 * Updated By: nitin tatte / 5/2/2013	 	 
	 *
	 */
	
	
	public function wall_post($data, $userId, $facebook){

		//try
		//{
			$resp = $facebook->api("/".$userId."/feed", 'POST',array(
                                      'message' => $data
					                   ));
									  
		    return $resp; 
		//}
		/*catch (Exception $e) 
		{
           echo 'Caught exception: ',  $e->getMessage(), "\n";
		}*/

		//$resp = $facebook->api("/".$userId."/feed", 'POST',$data);
		
	}


	/*
	 * Function name: wall_post
	 * Purpose: This function post destination message on FB wall.
	 *   Parameters:
	 * 	$fields= data,userId,facebook
	 * 	$values = message(string),userid,facebook object
	 * 
	 * Return value: 
	 * 	True: fb post id
	 * 	False: 0
	 * Created By: nitin tatte / 5/2/2013	 
	 * Updated By: nitin tatte / 5/2/2013	 	 
	 *
	 */
	
	
	public function wall_post_destination($data,$link,$name,$picture, $userId, $facebook){
         
		try
		{
			$result_dest_wall = $facebook->api("/".$userId."/feed", 'POST',array(
                                       'link' => $link,
						               'name' => $name,
			                           'description' => $data,
				                       'picture' => $picture
					                   ));
									  
		    return $result_dest_wall; 
		}
		catch (Exception $e) 
		{
			ApplicationErrorHandler("",serialize($e),__FILE__,__LINE__);
           //echo 'Caught exception: '. $e->getMessage(). "\n";
		}
	
		
	}


	/*
	 * Function name: wall_post_tagging
	 * Purpose: This function post destination message on FB wall with user and destination tagging.
	 * 	True: fb post id
	 * 	False: 0
	 * Created By: nitin tatte / 18/2/2013	 
	 * Updated By: nitin tatte / 18/2/2013	 	 
	 *
	 */
	
	

        
	public function wall_post_tagging($message,$picture,$friend_tagged_ids,$user_id,$facebook,$app_namespace,$object_name,$obj_url,$place_tags,$ref_data)
		{
			
			try
			{   
				
				  if(empty($message) || empty($picture) || empty($user_id) || empty($facebook) || empty($app_namespace) || empty($object_name) || empty($obj_url))
				  {
					 return false;
				  }
                  
				  
				  if(!(empty($friend_tagged_ids)) && (empty($place_tags)) )
				  {
					$post_data=array('with_emirates' => $obj_url,'image' => $picture,'message' => $message,'tags' => $friend_tagged_ids,'ref' => $ref_data);
				  }
				  else if(!(empty($friend_tagged_ids)) && !(empty($place_tags)) )
				  {
					$post_data=array('with_emirates' => $obj_url,'image' => $picture,'message' => $message,'tags' => $friend_tagged_ids,'place' => $place_tags,'ref' => $ref_data);
				  }
				  else if((empty($friend_tagged_ids)) && !(empty($place_tags)) )
				  {
					$post_data=array('with_emirates' => $obj_url,'image' => $picture,'message' => $message,'place' => $place_tags,'ref' => $ref_data);
				  }
				  else
				  {
                     $post_data=array('with_emirates' => $obj_url,'image' => $picture,'message' => $message,'ref' => $ref_data);
				  }
				  						  
				  $response_wall_tagged = $facebook->api($user_id.'/'.$app_namespace.':'.$object_name,'POST',$post_data);
				  return $response_wall_tagged;
				
			}
			catch (Exception $e) 
			{
				ApplicationErrorHandler("",serialize($e),$_SERVER['PHP_SELF'],259);
			   //echo 'Caught exception: '. $e->getMessage(). "\n";
			}
	
		
	}
	

	public function send_notification($facebook,$message, $user_ids, $app_token,$originator_id,$status='test')
		{
           $noti_status=""; 
		   if(empty($facebook)|| empty($message) || empty($user_ids) || empty($app_token) || empty($originator_id)  )
			{
			   return false;
			}
		  	   
		
		foreach($user_ids as $user)
		{
			 // to check the originator
            if($user==$originator_id)
			{
				 $link_to_send="index.php?r=gmap/notify_handler&status=".$status;
			}
			else
			{
				$link_to_send="index.php?r=gmap/notify_handler&status=".$status;
			}
			
			// parameter for the notification
			$data = array(
			'href'=> $link_to_send,
			'access_token'=> $app_token,
			'template'=> $message
			);

			try {
		   // api call for notification
			$facebook->api("/".$user."/notifications",'POST',$data);
			$noti_status=true;
			
			} catch (FacebookApiException $e) {
				ApplicationErrorHandler("Notification failed",serialize($e),__FILE__,__LINE__);
				//echo 'Caught exception: '. $e->getMessage(). "\n";
				//die();
				//logError($e);
				$noti_status=false;
				
			}
		}

		return $noti_status;
		
		

	}
	
	public function getUserInfo($facebook) {
		$acc_token=$facebook->getAccessToken();
		$data=$facebook->api("/me?access_token=".$acc_token);
		return $data;
	}

	public function getFriendDetail($facebook,$friendid)
	{  
	   try {	
		     $acc_token=$facebook->getAccessToken();
             $fb_frn_data=$facebook->api("/".$friendid."?fields=first_name,last_name,location,hometown&access_token=".$acc_token);
	         return $fb_frn_data;
	   }
	   catch(Exception $e)
		{
			ApplicationErrorHandler("",serialize($e),__FILE__,__LINE__);
		} 
   	}
   	
	public function getUserFriendsData($facebook) {
		try {
			$acc_token=$facebook->getAccessToken();
			$data=$facebook->api('/me/friends/?fields=id&access_token='.$acc_token);
		}
		catch(Exception $e) {
			ApplicationErrorHandler("",serialize($e),__FILE__,__LINE__);
			$data=array();
		}
		return $data;
	}


	/*
	 * note this wrapper function exists in order to circumvent PHP's 
	 * strict obeying of HTTP error codes.  In this case, Facebook 
	 * returns error code 400 which PHP obeys and wipes out 
	 * the response.
	*/

	public function curl_get_file_contents($url) {
		if($url == '') {
			return false;
		}
		$c = curl_init();
		
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c, CURLOPT_URL, $url);
		
		$contents = curl_exec($c);
		
		$err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
		curl_close($c);
		
		if ($contents) {
			return $contents;
		} else {
			return false;
		}
  }
	
 
	
	 
}