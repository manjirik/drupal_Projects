<?php
	/*
	|===================================================================================================|
	|	Project Name:	PEOJECT NAME HERE
	|	Page Name:		config.php
	|	Developed By:	Harshal S. Hirve
	|	Email:			harshalh@synechron.com
	|	Date:			00-00-0000
	|	Purpose:		basic configuration file, containing all Constant values.
	|===================================================================================================|
	*/
	//--------------------------------------------------------------------------------
		if($_SERVER['HTTP_HOST']=="localhost")
		{
			$sitePath = "http://localhost/harshal/timesheet/";			
			define("DB_HOST_NAME", "localhost");
			define("DB_USERNAME", "root");
			define("DB_PASSWORD", "");
			$dbName = "timesheet";
		}
		elseif($_SERVER['HTTP_HOST']=="creative2.synechron.com")
		{
			$sitePath = "http://creative2.synechron.com/timesheetNew/";			
			define("DB_HOST_NAME", "localhost");
			define("DB_USERNAME", "root");
			define("DB_PASSWORD", "root.123");
			$dbName = "timesheetNew";
		}
		elseif($_SERVER['HTTP_HOST']=="www.yoursitename.com")	//e.g. www.yoursitename.com (do not add "http://" in the begining)
		{
			$sitePath = "http://www.yoursitename.com/"; // needs trailing slash			
			define("DB_HOST_NAME", "255.255.255.255");
			define("DB_USERNAME", "siteusername");
			define("DB_PASSWORD", "sitepassword"); //password if applicable, otherwise leave it blank.
			$dbName = "timesheet";
		}	
		$cssPath = $sitePath."css/";
		$imagePath = $sitePath."images/";		
		$jsPath = $sitePath."js/";
		$includesPath = $sitePath."includes/";
		$uploadsPath = $sitePath."uploads/";
		$adminPath = $sitePath."admin/";
		$classPath = $sitePath."classes/";		
		$ckEditiorPath = $sitePath."ckeditor/";
		$currentPage = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];		
	//--------------------------------------------------------------------------------
		//DECLARE ALL CONSTANTS HERE...		
		define("DB_NAME",$dbName);
		define("SITE_PATH", $sitePath);
		define("CSS_PATH", $cssPath);
		define("IMAGE_PATH", $imagePath);		
		define("JS_PATH", $jsPath);			
		define("INCLUDES_PATH", $includesPath);		
		define("ADMIN_PATH", $adminPath);
		define("CURRENT_PAGE", $currentPage);
		define("ROOT_IMAGE_PATH", "images/");
		define("FILE_MAX_UPLOAD_SIZE", "2147483648");  //2GB
		define("ADMIN_EMAIL", "admin@admin.com");
		define("SITE_HEADING", "siteName");		
	//--------------------------------------------------------------------------------
?>