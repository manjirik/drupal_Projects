<?php
session_start();
include("inc/config.php");
include_once("controller/tblSongsController.php");
$dbObj = new database();
$conObj = $dbObj->connectDB();
$songsObj = new tblSongsController($conObj);
$songsDetails = $songsObj->getUserPaidStatus($_SESSION['user_id']);
?>
<div class="popup popupBg" id="inline_example8">
<?php
if($songsDetails == '1'){
?>
    <div class="song-stat" id="song_upload_form">
        <p>Add Songs To Your Zone</p>
        <div class="icon"><img src="images/DMM_logo_smll.png" alt="DMMCompany" /></div>
    </div>
    <div class="clear"></div>
    <form id="upload_song" name="upload_song" method="post">
    <div class="content1">	
        <div id="add_song_content">
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
							Song Title
                            <span class="errorMsg err_song_add_title" style="display:none">You must enter a Name</span>
						</label>
						<input class="signInputGrySmll song_name" type="text" id="song_name_<?php echo $i; ?>" name="song_name" />
					</div>
					<div class="rhtDiv">
						<label class="signLabel">
							Allow fans to download this song? (yes/no)
						</label>
						<input class="signInputGryBig song_credit" type="text" id="song_credit_<?php echo $i; ?>" name="song_credit" />
						<input class="song_add_path" type="hidden" id="song_add_path_<?php echo $i; ?>" name="song_add_path" />
                        <input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key_add_song_<?php echo $i; ?>" value="<?php echo $uid; ?>" />
						<input id="upload_song_<?php echo $i; ?>" class="selec-zip1" type="button" value="Select MP3 (10MB)" />
                        <span class="errorMsg err_song_add_file" style="display:none">You must enter a Name</span>
					</div>
					<div class="clear"></div>
				</div>		
				<div class="btm"></div>
			</div>
            <div class="clear"></div>
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
            <input type="hidden" id="slide_add_song_prev_hid" value="<?php echo $prev; ?>" />
			<input type="hidden" id="slide_add_song_next_hid" value="<?php echo $next; ?>" />
			</fieldset>
            <?php
			$loop++;
		}
		?>
        </div>
        </div>
        <div class="clear"></div>
        <div class="btmContent">
            <div><a id="slide_add_song_next" class="addSong" href="javascript:void(0);" onclick="slide_add_song(2,'next')">Upload another song</a></div>
            <div class="clearFix"></div>
            
            <div class="btmSec">
                <div class="lftCol">
                    <span></span></p>The STATUS BAR below will animate during song upload.<p></p>The SUBMIT button will turn blue when song upload is complete.
                </div>
                <div class="rhtCol">
                    <img src="images/img_upload_music.png" alt="" />
                </div>
                <div class="clear"></div>
            </div>
        </div>      
        <div class="clear"></div>
    </div>
    <div class="btmPanel">
        <ul class="rhtMenu">
        	<li id="slide_add_song_prev"></li>
            <li>
                <input class="btnLtBlue" id="btnSongSubmit" onClick="songSubmit()" type="button" value="Submit" />
            </li>
            <li class="clear"><!----></li>
        </ul>
        <div class="progressBar" id="pb_outer_song">
        	<div class="progressBarBg">
                <span class="totlProgress" id="pb_inner_song"><!----></span> 
            </div>
        </div>
        <div class="btmStrip long">
            <img src="images/ico_help.gif" alt="" />Your music is always protected!
        </div>
    </div>
    </form>
<?php }elseif($songsDetails == '0'){?>

<div class="paidCont">
<div class="ttl"><img src="images/ttl-ad-song-advt.png" width="421" height="26" border="0" alt="" title=""/> </div>
<div class="floatLt">
<ul class="firstCol">
	<li>From Established Musicians to Basement Brilliants, an artist is constantly evolving, producing complete catalogs of songs, ideas, experiments and musical masterpieces.</li>

</ul>
<ul class="secondCol">
	<li>Once you've exceeded your FREE SONG SUBMISSIONS, upgrade your account to add an additional 20 Songs and 5 Advertisements to your Zone.</li>
</ul>
<p class="yText">Click the icon on the right for upgrade details.</p>
</div>
<div class="payPal"><img src="images/img-payPal.png" width="107" height="139" border="0" usemap="#Map"/>
<map name="Map" id="Map"><area shape="rect" coords="6,9,99,61" href="http://www.dmmcompany.com/zones/compare.html" alt="Get it Now!" target="_blank" />
<area shape="rect" coords="14,94,86,136" href="http://www.dmmcompany.com/zones/compare.html" alt="Paypal Logo" target="_blank" />
</map></div>

</div>
<div class="btmPanel">
        <ul class="rhtMenu">
        	<li id="slide_add_song_prev"></li>
            <li></li>
            <li class="clear"><!----></li>
        </ul>

        <div class="btmStrip long mrgL33">
            <img src="images/ico_help.gif" alt="" />We use PayPal for user protection</div>
    </div>

<?php } ?>

</div>