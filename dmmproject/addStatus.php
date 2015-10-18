<?php
session_start();
include_once "inc/config.php";
include_once "controller/tblAddsController.php";
$paramArray = array
(	
	"table_name" => "advertise",
	"user_id" => $_SESSION["user_id"],
);
$dbObj = new database();
$conObj = $dbObj->connectDB();
$addsObj = new tblAddsController($conObj);
$addsDetails = $addsObj->getAddsDetailsStatusByUser($paramArray);
$addsStatus = array("0"=>"Pending", "1"=>"Aproved", "2"=>"Rejected");
?>
<div class="popup popupBg" id="inline_example7">

    <div class="song-stat">
        <p>Ad Status</p>
        <div class="icon"><img src="<?php echo $prefix_url;?>images/dmm-company-logo.gif" alt="DMMCompany" /></div>
    </div>
    <div class="clear"></div>
    <div class="content1">
        <div class="song-namestat">
            <div class="song-name-title">Ad Name</div>
            <div class="song-name-stat">Status</div>
        </div>
        <div id="adv_content">
		<div style="padding:0 24px;">
        <?php
		$j = 1;
		$loop = 1;
		$divesion = 4;
		
		for($i=0; $i<count($addsDetails); $i++)
		{
			if($j == 1)
			{
			?>
            	<fieldset class="step">
            <?php
			}
		?>
        <div class="clear"></div>
        <div class="song-namestat">
            <div class="song-name"><?php print $addsDetails[$i]['ad_name']; ?></div>
            <?php if($addsDetails[$i]['status'] == 2): ?>
            <div class="song-stat reject"><?php print $addsStatus[$addsDetails[$i]['status']]; ?></div>
            <div class="comment-panel">
                <div class="comment-box">
                    <div class="curvetop"></div>
                    <div class="comment"><?php print $addsDetails[$i]['reject_reason']; ?><!-- <a href="#">T-Racks</a>--></div>
                    <div class="curvebot"></div>
                </div>
            </div>
            <?php elseif($addsDetails[$i]['status'] == 1): ?>
            	 <div class="song-stat">Approved</div>
            <?php else: ?>
            	<div class="song-stat"><?php print $addsStatus[$addsDetails[$i]['status']]; ?></div>
            <?php endif; ?>
        </div>
        <?php
			if($j == $divesion || $i == count($addsDetails)-1)
			{
                $prev = "";
                $next = "";
                if($loop > 1)
                {
                    $prev = $loop-1;
                }
                if($loop < ceil(count($addsDetails)/$divesion))
                {
                    $next = $loop+1;
                }
                ?>
                <input type="hidden" id="slide_adv_status_prev_hid" value="<?php echo $prev; ?>">
                <input type="hidden" id="slide_adv_status_next_hid" value="<?php echo $next; ?>">
                <div>&nbsp;</div>
                </fieldset>
            <?php
				$loop++;
				$j = 1;
			}
			else
			{
				$j++;
			}
		}
		if(ceil(count($addsDetails)/$divesion) > 1)
		{
			$next = 2;
		}
		?>
    </div>
    </div>
    <div class="btmPanel">
        <ul class="rhtMenu">
            <li id="slide_adv_status_prev_li"></li>
            <li id="slide_adv_status_next_li">
            <?php if($next > 1): ?>
            	<a id="slide_adv_status_next" class="btnDkGry" href="javascript:void(0);" onclick="slide_adv_status(<?php echo $next; ?>)">next</a>
            <?php endif; ?>
            </li>
            <li class="clear"><!----></li>
        </ul>
    </div>
</div>
</div>