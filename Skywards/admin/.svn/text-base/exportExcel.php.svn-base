<?php 
include("inc/config.php"); 
include_once("controller/tblExportController.php");
$tblpageObj = new tblExportController();
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
$data="";

if($_REQUEST['type']=="getApplyNow"){
	header('Content-Disposition: attachment; filename="ApplyNowRecords.xls"; charset=utf-8');
		$data = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /></head><body><table border='1'>";
		$data .= "<tr><td align='center'><b>Sr.No</b></td><td align='center'><b>Full Name</b></td><td align='center'><b>Phone</b></td><td align='center'><b>Date Of Birth</b></td><td align='center'><b>Nationality</b></td><td align='center'><b>Company</b></td><td align='center'><b>Annual Income</b></td><td align='center'><b>Email</b></td><td align='center'><b>Mobile</b></td><td align='center'><b>Gender</b></td><td align='center'><b>Emirate</b></td><td align='center'><b>Job Title</b></td><td align='center'><b>Added Date</b></td></tr>";
		
		$tblArr = $tblpageObj->getApplyNow();
		$tblArrCount = count($tblArr);
		for($i=0; $i<$tblArrCount; $i++)
		{
			$j=$i+1;
			$full_name = $tblArr[$i]["full_name"];
			$phone = $tblArr[$i]["phone"];
			$dob = $tblpageObj->getStrFrmDb($tblArr[$i]["dob"]);
			$nationality = $tblpageObj->getStrFrmDb($tblArr[$i]["nationality"]);
			$company = $tblpageObj->getStrFrmDb($tblArr[$i]["company"]);
			$annual_income = $tblpageObj->getStrFrmDb($tblArr[$i]["annual_income"]);
			$email = $tblpageObj->getStrFrmDb($tblArr[$i]["email"]);
			$mobile = $tblpageObj->getStrFrmDb($tblArr[$i]["mobile"]);
			$gender = $tblpageObj->getStrFrmDb($tblArr[$i]["gender"]);
			$emirate = $tblpageObj->getCity($tblArr[$i]["emirate"]);
			$job_title = $tblpageObj->getStrFrmDb($tblArr[$i]["job_title"]);
			$date_added = $tblpageObj->getStrFrmDb($tblArr[$i]["date_added"]);
			
			$data .= "<tr><td align='center' valign='top'>".$j. "</td><td align='center' valign='top'>".$full_name. "</td><td align='center' valign='top'>".$phone."</td><td align='center' valign='top'>" .$dob."</td><td align='center' valign='top'>" .$nationality."</td><td align='center' valign='top'>".$company."</td><td align='center' valign='top'>".$annual_income."</td><td align='center' valign='top'>".$email."</td><td align='center' valign='top'>".$mobile."</td><td align='center' valign='top'>".$gender."</td><td align='center' valign='top'>".$emirate[0]["city_en"]."</td><td align='center' valign='top'>".$job_title."</td><td align='center' valign='top'>".$date_added."</td></tr>";
			
		} //end of for loop
		$data .= "</table></body></html>";
}elseif($_REQUEST['type']=="getApplyOnline"){
	header('Content-Disposition: attachment; filename="ApplyOnlineRecords.xls"; charset=utf-8');
		$data = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /></head><body><table border='1'>";
		$data .= "<tr><td align='center'><b>Sr.No</b></td><td align='center'><b>Full Name</b></td><td align='center'><b>Father's Name</b></td><td align='center'><b>Mother's Name</b></td><td align='center'><b>Date of Birth</b></td><td align='center'><b>Home Address</b></td><td align='center'><b>PO BOX</b></td><td align='center'><b>Street/City</b></td><td align='center'><b>Telephone</b></td><td align='center'><b>Home Telephone</b></td><td align='center'><b>Mobile</b></td><td align='center'><b>Email</b></td><td align='center'><b>University degree attained</b></td><td align='center'><b>Have you graduated yet?</b></td><td align='center'><b>University Name</b></td><td align='center'><b>University Address</b></td><td align='center'><b>Major</b></td><td align='center'><b>GPA</b></td><td align='center'><b>Added Date</b></td></tr>";
		
		$tblArr = $tblpageObj->getApplyOnline();
		$tblArrCount = count($tblArr);
		for($i=0; $i<$tblArrCount; $i++)
		{
			$j=$i+1;
			$tmp_full_name = $tblArr[$i]['full_name'];
			$tmp_fathers_name = $tblArr[$i]['fathers_name'];
			$tmp_mothers_name = $tblArr[$i]['mothers_name'];
			$tmp_dob = $tblArr[$i]['dob'];
			$tmp_home_address = $tblArr[$i]['home_address'];
			$tmp_p_o_box = $tblArr[$i]['p_o_box'];
			$tmp_street_city = $tblArr[$i]['street_city'];
			$tmp_phone = $tblArr[$i]['phone'];
			$tmp_home_phone = $tblArr[$i]['home_phone'];
			$tmp_mobile = $tblArr[$i]['mobile'];
			$tmp_email = $tblArr[$i]['email'];
			$tmp_university_degree = $tblArr[$i]['university_degree'];
			$tmp_graduated_yet = $tblArr[$i]['graduated_yet'];
			$tmp_university_name =$tblArr[$i]['university_name'];
			$tmp_university_address =$tblArr[$i]['university_address'];
			$tmp_major =$tblArr[$i]['major'];
			$tmp_gpa =$tblArr[$i]['gpa'];
			$tmp_date_added =$tblArr[$i]['date_added'];
			
			$data .= "<tr><td align='center' valign='top'>".$j. "</td><td align='center' valign='top'>".$tmp_full_name. "</td><td align='center' valign='top'>".$tmp_fathers_name."</td><td align='center' valign='top'>" .$tmp_mothers_name."</td><td align='center' valign='top'>" .$tmp_dob."</td><td align='center' valign='top'>".$tmp_home_address."</td><td align='center' valign='top'>".$tmp_p_o_box."</td><td align='center' valign='top'>".$tmp_street_city."</td><td align='center' valign='top'>".$tmp_phone."</td><td align='center' valign='top'>".$tmp_home_phone."</td><td align='center' valign='top'>".$tmp_mobile."</td><td align='center' valign='top'>".$tmp_email."</td><td align='center' valign='top'>".$tmp_university_degree."</td><td align='center' valign='top'>".$tmp_graduated_yet."</td><td align='center' valign='top'>".$tmp_university_name."</td><td align='center' valign='top'>".$tmp_university_address."</td><td align='center' valign='top'>".$tmp_major."</td><td align='center' valign='top'>".$tmp_gpa."</td><td align='center' valign='top'>".$date_added."</td></tr>";
			/*$full_name = $tblArr[$i]["full_name"];
			$phone = $tblArr[$i]["phone"];
			$dob = $tblpageObj->getStrFrmDb($tblArr[$i]["dob"]);
			$nationality = $tblpageObj->getStrFrmDb($tblArr[$i]["nationality"]);
			$company = $tblpageObj->getStrFrmDb($tblArr[$i]["company"]);
			$annual_income = $tblpageObj->getStrFrmDb($tblArr[$i]["annual_income"]);
			$email = $tblpageObj->getStrFrmDb($tblArr[$i]["email"]);
			$mobile = $tblpageObj->getStrFrmDb($tblArr[$i]["mobile"]);
			$gender = $tblpageObj->getStrFrmDb($tblArr[$i]["gender"]);
			$emirate = $tblpageObj->getCity($tblArr[$i]["emirate"]);
			$job_title = $tblpageObj->getStrFrmDb($tblArr[$i]["job_title"]);
			$date_added = $tblpageObj->getStrFrmDb($tblArr[$i]["date_added"]);*/
			
			
			
		} //end of for loop
		$data .= "</table></body></html>";
}elseif($_REQUEST['type']=="getContactOnline"){
	header('Content-Disposition: attachment; filename="ContactOnlineRecords.xls"; charset=utf-8');
		$data = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /></head><body><table border='1'>";
		$data .= "<tr><td align='center'><b>Sr.No</b></td><td align='center'><b>Full Name</b></td><td align='center'><b>Phone</b></td><td align='center'><b>Email</b></td><td align='center'><b>Comments</b></td><td align='center'><b>Added Date</b></td></tr>";
		
		$tblArr = $tblpageObj->getContact();
		$tblArrCount = count($tblArr);
		for($i=0; $i<$tblArrCount; $i++)
		{
			$j=$i+1;
			$full_name = $tblArr[$i]["full_name"];
			$phone = $tblArr[$i]["phone"];
			$email = $tblpageObj->getStrFrmDb($tblArr[$i]["email"]);
			$comments = $tblpageObj->getStrFrmDb($tblArr[$i]["comments"]);
			$date_added = $tblpageObj->getStrFrmDb($tblArr[$i]["date_added"]);
			
			$data .= "<tr><td align='center' valign='top'>".$j. "</td><td align='center' valign='top'>".$full_name. "</td><td align='center' valign='top'>".$phone."</td><td align='center' valign='top'>".$email."</td><td align='center' valign='top'>".$comments."</td><td align='center' valign='top'>".$date_added."</td></tr>";
			
		} //end of for loop
		$data .= "</table></body></html>";
}elseif($_REQUEST['type']=="getCallBack"){
	header('Content-Disposition: attachment; filename="RequestCallBackRecords.xls"; charset=utf-8');
		$data = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /></head><body><table border='1'>";
		$data .= "<tr><td align='center'><b>Sr.No</b></td><td align='center'><b>Full Name</b></td><td align='center'><b>Phone</b></td><td align='center'><b>Email</b></td><td align='center'><b>Comments</b></td><td align='center'><b>Added Date</b></td></tr>";
		
		$tblArr = $tblpageObj->getCallBack();
		$tblArrCount = count($tblArr);
		for($i=0; $i<$tblArrCount; $i++)
		{
			$j=$i+1;
			$full_name = $tblArr[$i]["full_name"];
			$phone = $tblArr[$i]["phone"];
			$email = $tblpageObj->getStrFrmDb($tblArr[$i]["email"]);
			$comments = $tblpageObj->getStrFrmDb($tblArr[$i]["comments"]);
			$date_added = $tblpageObj->getStrFrmDb($tblArr[$i]["date_added"]);
			
			$data .= "<tr><td align='center' valign='top'>".$j. "</td><td align='center' valign='top'>".$full_name. "</td><td align='center' valign='top'>".$phone."</td><td align='center' valign='top'>".$email."</td><td align='center' valign='top'>".$comments."</td><td align='center' valign='top'>".$date_added."</td></tr>";
			
		} //end of for loop
		$data .= "</table></body></html>";
}

echo $data;
?>