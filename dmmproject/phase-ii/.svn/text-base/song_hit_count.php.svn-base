<?php
include_once("inc/database.php");
include_once("controller/tblSongsController.php");	

$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblHitCountObj = new tblSongsController($conObj);

$hitcountArr = $tblHitCountObj->getHitCountOfSite();

$tmp_hit_count = 2000000 + $hitcountArr;
$final_hit_count = number_format($tmp_hit_count, 0, ' ', ',');
?>
<?php echo $final_hit_count;?>