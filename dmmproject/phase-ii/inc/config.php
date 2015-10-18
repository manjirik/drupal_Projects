<?php

	error_reporting(0);
	session_start();
	ob_start();
	
	//===================================================================================================	
	//CHANGE YOUR VALUES HERE...
		//----------------------------------------------
		//'admin' + 'common'	

			if(isset($_SERVER['HTTPS'])) {
				$protocol = 'https://';
			} else {
				$protocol = 'http://';
			}
			
			
			if('/' == substr($_SERVER['DOCUMENT_ROOT'], -1)) {
				$document_root = substr($_SERVER['DOCUMENT_ROOT'], 0, -1);
			} else {
				$document_root = $_SERVER['DOCUMENT_ROOT'];
			}
			define('DOCUMENT_ROOT', $document_root);
			
			/** 
			 * For example if your site is at http://example.com/dmmcompany then set BASE_PATH as /dmmcompany
			 * else leave blank
			 */
			define('BASE_PATH', '/dmmcompany/phase-II');
			
			define('HOST_URL', $protocol . $_SERVER['HTTP_HOST'] . BASE_PATH);
			define('SITE_URL', $protocol . $_SERVER['HTTP_HOST'] . BASE_PATH);
		 
			// define('PREFIX_URL', '');
			
			// $prefix_url = "";
			$adminCssPath = HOST_URL . "/css";
			$adminImagePath = HOST_URL . "/css/images";
			$adminJsPath = HOST_URL . "/js";
			$adminIncludePath = $_SERVER['DOCUMENT_ROOT'] . BASE_PATH . "/inc/";
			$adminUploadPath = $_SERVER['DOCUMENT_ROOT'] . BASE_PATH . "/uploads/";
			$adminAvatarPath = HOST_URL . "/uploads/";
			$adminAdvPath = HOST_URL . "/uploads_adv/";
			
			$adminEmail = "chacon@helen-marie.com,chaconjohnson@gmail.com,dedrep1@gmail.com";
			// $adminEmail = "atul.bhosale@synechron.com";

			//mail to USERS
			//for new music
			// $adminSecure_FOR_user_ALERT
			$notify_user_alert = "dmmalerts-noreply@dmmcompany.com";
			// $notify_user_alert = "atul.bhosale@synechron.com";
			
			//for new Password Reset & New Payment Confirmation
			// $adminSecure_FOR_user_PASSWORD_AND_PAYMENT
			$notify_pass_payment = "dmmsecure-noreply@dmmcompany.com";
			// $notify_pass_payment = "atul.bhosale@synechron.com";
			
			//for new Registration Confirmation
			$notify_registration = "dmmregistration-noreply@dmmcompany.com";
			// $notify_registration = "atul.bhosale@synechron.com";

			//mail to ADMIN
			// $adminSecure_FOR_admin;
			$notify_by_admin = "dmmadmin@dmmcompany.com";
			// $notify_by_admin = "atul.bhosale@synechron.com";
			
			//mail to Message Musician
			// $adminMessageMusician_FOR_admin;
			$messaging_mail_id = "dmmessaging-noreply@dmmcompany.com";
			// $messaging_mail_id = "atul.bhosale@synechron.com";
			

			$adminPageTitle = "DMM :: Admin :: ";	
			$maxFileUploadSize = 2147484; //2mb		
			$maxFileUploadSizeInMb = 15; //15mb
			$serverIPAddress = $_SERVER["REMOTE_ADDR"];
			$editImg = $adminImagePath . "edit.png";
			$deleteImg = $adminImagePath . "delete.png";
			$activeImg = $adminImagePath . "active.png";
			$inactiveImg = $adminImagePath . "inactive.png";
			$translateImg = $adminImagePath . "language.png";
		//----------------------------------------------	

		//'Pages'
		$pageItemsPerPage = 20;

	
	//===================================================================================================
	//DO NOT MODIFY ANYTHING BEYIND THIS LINE...
		//----------------------------------------------
		//'admin' + 'common'	
			define("ADMIN_CSS_PATH", $adminCssPath);
			define("ADMIN_IMAGE_PATH", $adminImagePath);				
			define("ADMIN_JS_PATH", $adminJsPath);					
			define("ADMIN_INC_PATH", $adminIncludePath);	
			define("ADMIN_UPLOAD_PATH", $adminUploadPath);
		 	define("ADMIN_AVATAR_PATH", $adminAvatarPath);
			define("ADMIN_ADV_PATH", $adminAdvPath);
		 
			define("ADMIN_EMAIL", $adminEmail);
			define("ADMIN_PAGE_TITLE", $adminPageTitle);		
			define("ADMIN_FILE_MAX_UPLOAD_SIZE", $maxFileUploadSize);	
			define("ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB", $maxFileUploadSizeInMb);
			define("ADMIN_FILE_MAX_UPLOAD_SIZE_NAME", "8mb");					
			define("IP_ADDRESS", $serverIPAddress);
			define("EDIT_IMG", $editImg);
			define("DELETE_IMG", $deleteImg);
			define("ACTIVE_IMG", $activeImg);
			define("INACTIVE_IMG", $inactiveImg);
			define("TRANSLATE_IMG", $translateImg);
			define("ADV_START_TIME", 50000);
			define("ADV_TIME_INTERVAL", 5000);
		//----------------------------------------------		

		//'PAGE'
			define("PAGE_ITEMS_PER_PAGE", $pageItemsPerPage);
		
	//===================================================================================================
	
?>