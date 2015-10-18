<?php
session_start();

include_once "inc/config.php";
include_once "controller/tblCmsPageController.php";

$paramArray = array
(	
	"table_name" => "cms_page",
	"id" => 1,
);
$dbObj = new database();
$conObj = $dbObj->connectDB();
$cmsObj = new tblCmsPageController($conObj);
$cmsDetails = $cmsObj->getCmsPageDetailsById($paramArray);
?>
<div class="popup popupBg" id="inline_example6">
    <div class="content">
        <img src="<?php echo $prefix_url;?>images/DMM_logo.png" alt="DMMCompany" />
        <p>
            <?php print $cmsDetails[0]['dmmcompany_text']; ?>
        </p>
    </div>
    <div class="btmPanel">
        <div class="progressBar"></div>
        <div class="btmStrip long">
            <img src="<?php echo $prefix_url;?>images/ico_qna.gif" alt="" /><a href="http://www.dmmcompany.com/zones/" target="_blank">What is DMMCompany?</a>
        </div>
        <div class="btmStrip long">
            <img src="<?php echo $prefix_url;?>images/ico_help.gif" alt="" /><a href="http://www.dmmcompany.com/zones/whatarezones.html" target="_blank">Zones Features</a>
        </div>
    </div>
</div>