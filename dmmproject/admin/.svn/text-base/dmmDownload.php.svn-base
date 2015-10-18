<?php 
include_once "inc/config.php";
include_once "inc/chkSession.php";
include_once "controller/tblPlayerController.php";
$tblpageObj = new tblPlayerController();
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
$data="";
if($_REQUEST['type']=="all"){
	header('Content-Disposition: attachment; filename="BMWReport.xls"; charset=utf-8');
		$data = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /></head><body><table border='1'>";
		$data .= "<tr><td align='center'><b>Sr.No</b></td><td align='center'><b>Name</b></td><td align='center'><b>Email</b></td><td align='center'><b>Gender</b></td><td align='center'><b>Nickname</b></td><td align='center'><b>Score Time</b></td><td align='center'><b>Score Date</b></td></tr>";
		
		$tblArr = $tblpageObj->getPlayerDownload();
		$tblArrCount = count($tblArr);
		for($i=0; $i<$tblArrCount; $i++)
		{
			$j=$i+1;

			$data .= "<tr><td align='center' valign='top'>".$j. "</td><td align='center' valign='top'>".$tblArr[$i]["fb_username"]. "</td><td align='center' valign='top'>".$tblArr[$i]["fb_email"]."</td><td align='center' valign='top'>" .$tblArr[$i]["fb_gender"]."</td><td align='center' valign='top'>" .$tblArr[$i]["nickname"]."</td><td align='center' valign='top'>".$tblArr[$i]["score_time"]."</td><td align='center' valign='top'>".$tblArr[$i]["s_date"]."</td></tr>";
			
		} //end of for loop
		$data .= "</table></body></html>";

}elseif($_REQUEST['type']=="date"){
	header('Content-Disposition: attachment; filename="BMWDateReport.xls"; charset=utf-8');
		$data = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /></head><body><table border='1'>";
		$data .= "<tr><td align='center'><b>Sr.No</b></td><td align='center'><b>Name</b></td><td align='center'><b>Email</b></td><td align='center'><b>Gender</b></td><td align='center'><b>Nickname</b></td><td align='center'><b>Score Time</b></td><td align='center'><b>Score Date</b></td></tr>";
		
		$tblArr = $tblpageObj->getPlayerDateDownload();
		$tblArrCount = count($tblArr);
		for($i=0; $i<$tblArrCount; $i++)
		{
			$j=$i+1;

			$data .= "<tr><td align='center' valign='top'>".$j. "</td><td align='center' valign='top'>".$tblArr[$i]["fb_username"]. "</td><td align='center' valign='top'>".$tblArr[$i]["fb_email"]."</td><td align='center' valign='top'>" .$tblArr[$i]["fb_gender"]."</td><td align='center' valign='top'>" .$tblArr[$i]["nickname"]."</td><td align='center' valign='top'>".$tblArr[$i]["score_time"]."</td><td align='center' valign='top'>".$tblArr[$i]["s_date"]."</td></tr>";
			
		} //end of for loop
		$data .= "</table></body></html>";

}//end of for loop

echo $data;
?>