<?php session_start();
	ob_start();	
	//===================================================================================================	
	//CHANGE YOUR VALUES HERE...
		//----------------------------------------------
		//'admin' + 'common'	

			define('ROOT_DIR',   realpath(dirname(__FILE__))."/.." );

			if($_SERVER['HTTPS'])
			{
				$protocol = "https://";
			}
			else
			{
				$protocol = "http://";
			}
			define('SHARE_ROOT_URL', $protocol. $_SERVER['HTTP_HOST']."");
                        define('ROOT_URL', $protocol. $_SERVER['HTTP_HOST']."/admin"); 
			define("SITE_DOC_PATH", $_SERVER['DOCUMENT_ROOT'].'/uploads/');
			define('IMAGE_ROOT_URL', $protocol. $_SERVER['HTTP_HOST']."/uploads/"); 
			define('UPLOAD_ADV_ROOT_URL', $_SERVER['DOCUMENT_ROOT']."/");
			define('IMAGE_ROOT_ADV_URL', $protocol.$_SERVER['HTTP_HOST']."/uploads_adv/");
		 
			$adminCssPath = ROOT_URL."/css/";
			$adminImagePath = ROOT_URL."/css/images/";
			$adminJsPath = ROOT_URL."/js/";	
			$adminIncludePath = ROOT_DIR."/inc/";		
			$adminEmail = "dmmadmin@dmmcompany.com";
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