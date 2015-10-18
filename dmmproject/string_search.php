<?php
header('Content-Type: text/html; charset=utf-8');
include_once("inc/database.php");
include_once("controller/tblSearchController.php");	
	if(isset($_POST['mysearchString'])) {
		$dbObj = new database();
		$conObj = $dbObj->connectDB();
		$tblCommObj = new tblSearchController($conObj);
		$searchArr = $tblCommObj->getAllSearch(array("searchstring"=>htmlentities($_POST['mysearchString'], ENT_QUOTES)));
		$searchArrCnt = count($searchArr);

		if($searchArrCnt >0) {

			$http_user_agent = 'other';
			$flag_android = strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'android');
			if($flag_android > 0) {
				$http_user_agent = 'android';
			}
		
			echo '<input type="hidden" name="songid" id="songid" value="" />';
			echo '<input type="hidden" name="songdbid" id="songdbid" value="" />';

			$tmp_user_id = 0;
			echo '<ul>';
				for($i=0; $i<$searchArrCnt; $i++)
					{	
						if($_REQUEST['musician_search'] !=""){
						?>
						<li onClick="postsongid('<?php echo $i; ?>', '<?php echo $searchArr[$i]['sid'];?>', '<?php echo $_REQUEST['musician_search'];?>', '<?php echo $http_user_agent; ?>');"><?php echo $searchArr[$i]['sname'].' - '.$searchArr[$i]['dname'];?></li>
						<?php
						}else{

						echo "<li onClick='postsongid1(
							" . $i . ", 
							" . $searchArr[$i]['sid'] . ", 
							\"" . $http_user_agent . "\");'>" . $searchArr[$i]['sname'] . ' - ' . $searchArr[$i]['dname'] . "</li>";
						}
					}
			echo '</ul>';
		} else {
			// Dont do anything.
			echo '<ul>';
			echo "<li>No record found.</li>";
			echo '</ul>';
		}
	} else {
		echo 'Access denied.';
	}

?>