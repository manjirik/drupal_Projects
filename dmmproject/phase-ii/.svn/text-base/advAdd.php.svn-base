<?php
session_start();
include_once "inc/config.php";
include_once "controller/tblSongsController.php";
$dbObj = new database();
$conObj = $dbObj->connectDB();
$songsObj = new tblSongsController($conObj);
$songsDetails = $songsObj->getUserPaidStatus($_SESSION['user_id']);
?>
<div class="popup popupBg" id="inline_example5">
<?php
if($songsDetails == '1'){
?>
<div class="song-stat" id="adv_upload_form">
        <p>Cross-market Services Within and Beyond Music</p>
        <div class="icon"><img src="images/DMM_logo_smll.png" alt="DMMCompany" /></div>
    </div>
    <div class="clear"></div>
    <form id="upload_adv" name="upload_adv" method="post">
    <div class="content1">
     	<div id="add_adv_content">
        <div style="padding:0 24px;">
        <?php
		$loop = 1;
		$limit = 4;
		
		for($i=0; $i<$limit; $i++)
		{
			$uid = md5(uniqid(rand()));
			?>
            <fieldset class="step">
                <div class="whtBox">
                    <div class="top"></div>
                    <div class="data">
                        <div class="leftDiv">
                            <label class="signLabel">
                                Advertisement Title
                                <span class="errorMsg err_adv_add_title" style="display:none">You must enter a Name</span>
                            </label>
                            <input class="signInputGrySmll adv_name" type="text" id="adv_name_<?php echo $i; ?>" name="adv_name" />
                        </div>
                        <div class="rhtDiv">
                            <label class="signLabel">
                                Link your Ad to website (If applicable)
                            </label>
                            <input class="signInputGryBig adv_res_party" type="text" id="adv_res_party_<?php echo $i; ?>" name="adv_res_party" />
                            <input class="adv_add_path" type="hidden" id="adv_add_path_<?php echo $i; ?>" name="adv_add_path" />
                            <input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key_add_adv_<?php echo $uid; ?>" value="<?php echo $uid; ?>" />
                            <input id="upload_adv_<?php echo $i; ?>" class="selec-zip1" type="button" value="Select File" />
                            <span class="errorMsg err_adv_add_file" style="display:none">You must enter a Name</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                
                    <div class="btm"></div>
                </div>
        	<?php
			$prev = "";
			$next = "";
			if($loop > 1)
			{
				$prev = $loop-1;
			}
			if($loop < $limit)
			{
				$next = $loop+1;
			}
			?>
            <input type="hidden" id="slide_add_adv_prev_hid" value="<?php echo $prev; ?>">
			<input type="hidden" id="slide_add_adv_next_hid" value="<?php echo $next; ?>">
			</fieldset>
            <?php
			$loop++;
		}
		?>
        </div>
        </div>
        <div class="clear"></div>
        <div class="btmContent">
            <div><a id="slide_add_adv_next" class="addSong" href="javascript:void(0);" onclick="slide_add_adv(2,'next')">Upload another advertisement</a></div>
            <div class="clearFix"></div>
            
            <div class="btmSec">
                <div class="lftCol">
                    <span></span>All ads must be designed and sized to the following specs:<p></p>1200(w) x 700(h) px, 10MG Max, Jpeg, Giff, Animated Giff or PNG.<br>
                </div>
                <div class="rhtCol">
                    <img src="images/img_upload_ad.png" alt="" />
                </div>
                <div class="clear"></div>
            </div>
        </div>
        
        <div class="clear"></div>
    </div>
    <div class="btmPanel">
        <ul class="rhtMenu">
        	<li id="slide_add_adv_prev"></li>
            <li>
                <input class="btnLtBlue" id="btnAdvSubmit" onClick="advSubmit()" type="button" value="Submit" />
            </li>
            <li class="clear"><!----></li>
        </ul>
        <div class="progressBar" id="pb_outer_adv">
        	<div class="progressBarBg">
                <span class="totlProgress" id="pb_inner_adv"><!----></span> 
            </div>
        </div>
        <div class="btmStrip long">
            <img src="images/ico_help.gif" alt="" />Your ads are always protected!
        </div>
    </div>
    </form>

<?php }elseif($songsDetails == '0'){?>

<div class="paidCont">
<div class="ttl"><img src="images/ttl-ad-song-advt.png" width="421" height="26" border="0" alt="" title=""/> </div>
<div class="floatLt">
<ul class="firstCol">
	<li>For musicians with small businesses, product endorsers, and services to promote. DMMCompany enables full-screen promo Ads to showcase talents/services in a new way.</li>

</ul>
<ul class="secondCol">
	<li>(Advertisement examples include; collaborative project anncouncements, sponsors, product images, endorsement campaigns, tour schedules, appearance announcements, etc.)</li>
</ul>
<p class="yText">Upgrade your account to add upto 5 promotional advertisements.</p>
</div>
<div class="payPal"><img src="images/img-payPala.png" width="107" height="139" border="0" usemap="#Map"/>
<map name="Map" id="Map"><area shape="rect" coords="6,9,99,61" href="http://www.dmmcompany.com/zones/compare.html" alt="Get it Now!" target="_blank" />
<area shape="rect" coords="14,94,86,136" href="http://www.dmmcompany.com/zones/compare.html" alt="Paypal Logo" target="_blank" />
</map></div>

</div>
<div class="btmPanel">
        <ul class="rhtMenu">
        	<li id="slide_add_song_prev"></li>
            <li>     
            </li>
            <li class="clear"><!----></li>
        </ul>

        <div class="btmStrip long mrgL33">
            <img src="images/ico_help.gif" alt="" />We use PayPal user protection</div>
    </div>

<?php } ?>

</div>