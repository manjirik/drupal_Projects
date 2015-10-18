<?php
require 'FB.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new FB(array(
  'appId'  => '388337351241916',
  'secret' => 'f8db745f0ab110bdd59c97fef9d36375',
));


// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
	
	$access_token = $facebook->getAccessToken();
	
$user_profile = $facebook->api('/me'); // Gets User's information based on permissions the user has granted to your application.
//		var_dump($user);
$usr_name = $user_profile['name'];
$usr_fname = $user_profile['first_name']; 
$usr_lname= $user_profile['last_name']; 
$usr_hometown=$user_profile['location']; 
$usr_cityu=$usr_hometown['name'];


$friends = $facebook->getFriends();

$countFull=count($friends['data']);
//var_dump($friends);

$friends = array_slice($friends, 0, 30);
$details=array();
$fnames=array();
$lnames=array();
$lats=array();
$longs=array();
$picurls=array();
$countFriend=count($friends);
$citys=array();



$frnd = $facebook ->getUserInfo('/me/friends?access_token='.$access_token);

$nr_friends=count($frnd['data']);
$user=array();

for ($i=0; $i<$nr_friends; $i++)

  {
   $friendinfo = $facebook->api('/'.$frnd["data"][$i]["id"]);
   
   if (array_key_exists("location",$friendinfo))
	  {
	  array_push($user,$friendinfo['location']['name']);
	  }
   else if (array_key_exists("hometown",$friendinfo))
	  {
	  array_push($user,$friendinfo['hometown']['name']);
	  }

  
 	
/*  
 foreach( $friendinfo as $key => $value){
	echo "$key, $value <br />";
	 echo('----------------');
		    echo('<br>');

}

$name= $friendinfo['name'];
$hometown=$friendinfo['hometown']['name'];
$location=$friendinfo['location']['name'];


			echo $friendinfo['name'];
			echo('<br>');			
			echo $friendinfo['hometown']['name'];
			echo('<br>');			   
			echo $friendinfo['location']['name'];
			echo('<br>');	
   		    echo('----------------');
		    echo('<br>');
	
	
	
*/
	
  }
  /*
$friendinfo = $facebook->api('/'.$frnd["data"][3]["id"]);
$var_hometown = $friendinfo['hometown']['name'];
*/	
	
	
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}


// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl(array('next' => 'http://10.76.34.144:1234/mashup/friends/index.php'));
  
} else {
  	$loginUrl   = $facebook->getLoginUrl(
	            array(
	                'scope'         => "friends_location,user_location,user_photos,user_hometown,friends_photos,user_about_me,user_activities,user_birthday,user_checkins,user_education_history,user_groups,user_interests,user_likes,user_location,user_notes,user_online_presence,user_photo_video_tags,user_photos,user_relationships,user_relationship_details,user_religion_politics,user_status,user_videos,user_website,user_work_history,email,read_friendlists,read_insights,read_mailbox,read_requests,read_stream,xmpp_login,ads_management,create_event,manage_friendlists,manage_notifications,offline_access,publish_checkins,publish_stream,rsvp_event,sms,publish_actions,manage_pages,friends_hometown,friends_location",
	            )
	    );
}


if(isset($_GET['logout'])) 
{ 
	$facebook->destroySession();
    session_destroy();
	$facebook->setAccessToken('');
	$_SESSION['fb_388337351241916_access_token'] = '' ;
    header("Location:".$logoutUrl) ;


}
