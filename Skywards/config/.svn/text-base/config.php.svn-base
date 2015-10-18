<?php
$hostname = $_SERVER['HTTP_HOST'];
$uri = explode('/',$_SERVER['REQUEST_URI']);

if( ($hostname == 'creative2.synechron.com')) {
	$hostname = $uri[1];
}

switch($hostname) {
	case 'localhost':
		define("SITE_URL","http://localhost/Skywards/");
		define('EMAIL_FROM','noreply@localhost.com');
		define('APP_LINK','https://www.facebook.com/pages/Demo-Emirates-skyward/438038999602449?sk=app_467450859982651');
		define('IS_CSS_EXPIRE',true); 
		define('SEND_NOTIFICATION_EMAIL_WALL',false); 
		break;
	case 'Skywards':
		define("SITE_URL","https://creative2.synechron.com/Skywards/");
		define('EMAIL_FROM','noreply@creative2.com');
		define('APP_LINK','https://www.facebook.com/pages/Demo-Emirates-skyward/438038999602449?sk=app_467450859982651');		
		define('IS_CSS_EXPIRE',true);
		define('SEND_NOTIFICATION_EMAIL_WALL',false);  
		break;
	case 'skywards_qa':
		define("SITE_URL","https://creative2.synechron.com/skywards_qa/");
		define('EMAIL_FROM','noreply@creative2.com');
		define('APP_LINK','https://www.facebook.com/pages/Demo-Emirates-skyward/438038999602449?sk=app_318298064956530');
		define('IS_CSS_EXPIRE',true);
		define('SEND_NOTIFICATION_EMAIL_WALL',false);  
		break;
	case 's142587.gridserver.com':
	case 'bluebarracudame.com':
		define("SITE_URL","http://s142587.gridserver.com/meet-me-there/");
		define('EMAIL_FROM','noreply@meetmethere.com');
		define('APP_LINK','https://www.facebook.com/pages/Demo-Emirates-skyward/438038999602449?sk=app_331267290323968');
		define('IS_CSS_EXPIRE',false);
		define('SEND_NOTIFICATION_EMAIL_WALL',true);  
		break;
	default:
		define("SITE_URL","http://localhost/Skywards/");		
		define('EMAIL_FROM','noreply@localhost.com');
		define('APP_LINK','https://www.facebook.com/pages/Demo-Emirates-skyward/438038999602449?sk=app_467450859982651');
		define('IS_CSS_EXPIRE',true);
		define('SEND_NOTIFICATION_EMAIL_WALL',false);   
}

$config=array('landing'=>'landing','story'=>'story','vote'=>'vote');
define("MIN_CHAR","0");
define("MAX_CHAR","179");
define("SUCC_MYENTRY_ENTRYSTORY","Your enrty story has been added successfully.");
define("CLEAR_CACHE","?t=".time());
define("DISPLAY_IMAGE_FB","5");
//define("SKYWARDS_WS_URL","http://194.170.246.115/Mercator.CRIS.WebService.CISUPD/memberwebservice.asmx?WSDL");
define("SKYWARDS_WS_URL","http://194.170.246.115/Mercator.CRIS.WebService.CISSTG/memberwebservice.asmx?WSDL");
define("UID","SKYWARDS");
define("PWD","SKYWARDS");
/*define("UID","FBA");
define("PWD","FBA");*/
define("NS","http://skywards.com/Mercator.CRIS.WS");
define("MAP_LATITUDE","25.271009345647187");
define("MAP_LONGITUDE","55.30755526123039");
define("MAP_ZOOM","3");
define("DESTINATION_ERROR","Please select your destination first");
//define("STRAIGHT_LINE_DISTANCE",'12300248.807333564');// for drawing straight line on destination selection
define("STRAIGHT_LINE_DISTANCE",'10921391.92276719');// for drawing straight line on destination selection
define("FACEBOOK_GRAPH_PATH","https://graph.facebook.com/");
define('LOGS_FOLDER','logs');
define('DESTINATION_WALL_POST_TITLE','Emirates Skywards meet me there');
define('BLANK_PROFILE_IMG',SITE_URL.'images/profile-pic.jpg');
//define SUB_MYENTRY_MESSASE,MYENTRY_MESSASE_TEXT and MYENTRY_NOTIFICATION_MESSAGE constants for my entry message and notification functionality
define('SUB_MYENTRY_MESSASE','My entry message subject');
define('MYENTRY_MESSASE_TEXT','My entry message text');
define('MYENTRY_NOTIFICATION_MESSAGE','My entry notification message text');
define('MYENTRY_NOTIFICATION_SUCCESS_MESSAGE','User notification has been sent successfully.');
define('MYENTRY_NOTIFICATION_FAIL_MESSAGE','Fail to send notification.');
define('MYENTRY_MAIL_SUCCESS_MESSASE','User message has been sent successfully.');
define('MYENTRY_MAIL_FAIL_MESSASE','Fail to send mail.');
define('CITY_IMAGES','city_images');
define('INVITATION_ACCEPTANCE_MESSAGE','%USER% has accepted your invitation for %CITYNAME%');
//Tip messages on gmap
define('TIP_MESSAGE_DEST', serialize(array('All routes go via Dubai International Airport',
            'For more information click here',
            'You can always change your destination later'
                )
        )
);

define('TIP_MESSAGE_FRND', serialize(array('Select at least one friend that is new to this app',
            "Don't worry. You can always change your mind later",
            'Use the search bar to find your friends', 
            'For more information click here'
                )
        )
);
//css config
$cssFiles = array(
				'jquery.jscrollpane.css'
				,'jquery.bxslider.css'
				,'screen.css'
				,'website.css'
				,'selectmenu.css'
				,'jquery.fancybox.css'
				,'jquery.fancybox-buttons.css'
				,'jquery.fancybox-thumbs.css'
				,'homepageslider.css'/*,
				'jquery.ui.core.css',
				'jquery.ui.autocomplete.css',
				'jquery.ui.base.css',
				'jquery.ui.selectable.css',
				'jquery-ui.css'*/
			);
