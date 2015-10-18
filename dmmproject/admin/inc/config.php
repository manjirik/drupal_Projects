<?php session_start();
	ob_start();	
	//===================================================================================================	
	//CHANGE YOUR VALUES HERE...
		//----------------------------------------------
		//'admin' + 'common'	

			// define('ROOT_DIR', realpath(dirname(__FILE__))."/.." );

			if($_SERVER['HTTPS']) {
				$protocol = 'https://';
			} else {
				$protocol = 'http://';
			}
			
			
			/** 
			 * For example if your site is at http://example.com/dmmcompany set BASE_PATH as /dmmcompany
			 * else leave blank
			 */
			define('BASE_PATH', '/dmmcompany');
			
			define('SHARE_ROOT_URL', $protocol . $_SERVER['HTTP_HOST'] . '');
            define('ROOT_URL', $protocol . $_SERVER['HTTP_HOST'] . BASE_PATH . '/admin');
			define('IMAGE_ROOT_URL', $protocol . $_SERVER['HTTP_HOST'] . BASE_PATH . '/uploads/'); 
			define('IMAGE_ROOT_ADV_URL', $protocol . $_SERVER['HTTP_HOST'] . BASE_PATH . '/uploads_adv/');
			
			define('SITE_DOC_PATH', $_SERVER['DOCUMENT_ROOT'] . BASE_PATH . '/uploads/');
			define('UPLOAD_ADV_ROOT_URL', $_SERVER['DOCUMENT_ROOT'] . BASE_PATH . '/');
			define('SITE_ADMIN_PATH', $_SERVER['DOCUMENT_ROOT'] . BASE_PATH . '/admin');
		 
			$adminCssPath = ROOT_URL . '/css/';
			$adminImagePath = ROOT_URL . '/css/images/';
			$adminJsPath = ROOT_URL . '/js/';
			$adminIncludePath = SITE_ADMIN_PATH . '/inc/';
			
			// $adminEmail = "chacon@helen-marie.com";
			$adminEmail = "atul.bhosale@synechron.com";

			//mail to USERS
			//for new music
			// $notify_user_alert = "dmmalerts-noreply@dmmcompany.com";
			$notify_user_alert = "atul.bhosale@synechron.com";
			
			//for new Password Reset & New Payment Confirmation
			// $adminSecure_FOR_user_PASSWORD_AND_PAYMENT
			// $notify_pass_payment = "dmmsecure-noreply@dmmcompany.com";
			$notify_pass_payment = "atul.bhosale@synechron.com";
			
			//for new Registration Confirmation
			// $adminSecure_FOR_user_REGISTRATION
			// $notify_registration = "dmmregistration-noreply@dmmcompany.com";
			$notify_registration = "atul.bhosale@synechron.com";

			//mail to ADMIN
			// $adminSecure_FOR_admin;
			// $notify_by_admin = "dmmadmin@dmmcompany.com";
			$notify_by_admin = "atul.bhosale@synechron.com";

			$adminPageTitle = "DMMCompany ::";	
			$maxFileUploadSize = 2147484; //2mb		
			$serverIPAddress = $_SERVER["REMOTE_ADDR"];
			$editImg = $adminImagePath."edit.png";
			$deleteImg = $adminImagePath."delete.png";
			$activeImg = $adminImagePath."active.png";
			$inactiveImg = $adminImagePath."inactive.png";
			$translateImg = $adminImagePath."language.png";
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
		 
			define("ADMIN_EMAIL", $adminEmail);
			define("ADMIN_PAGE_TITLE", $adminPageTitle);		
			define("ADMIN_FILE_MAX_UPLOAD_SIZE", $maxFileUploadSize);	
			define("ADMIN_FILE_MAX_UPLOAD_SIZE_NAME", "8mb");					
			define("IP_ADDRESS", $serverIPAddress);
			define("EDIT_IMG", $editImg);
			define("DELETE_IMG", $deleteImg);
			define("ACTIVE_IMG", $activeImg);
			define("INACTIVE_IMG", $inactiveImg);
			define("TRANSLATE_IMG", $translateImg);
		//----------------------------------------------		

		//'PAGE'
			define("PAGE_ITEMS_PER_PAGE", $pageItemsPerPage);
		
	//===================================================================================================
	
?>