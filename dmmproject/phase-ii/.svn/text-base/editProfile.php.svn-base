<?php 
session_start();
include_once "inc/config.php";
include_once "controller/tblUserController.php";
include_once "controller/tblBillboardController.php";

$paramArray = array
(	
	"table_name" => "user",
	"id" => $_SESSION['user_id'],
);
$paramArray1 = array
(	
	"table_name" => "billboard",
	"user_id" => $_SESSION['user_id'],
);
$dbObj = new database();
$conObj = $dbObj->connectDB();
$userObj = new tblUserController($conObj);
$userDetails = $userObj->getUserDetails($paramArray);
$billboardObj = new tblBillboardController($conObj);
$billBordDetails = $billboardObj->getBillboardByUserId($paramArray1);
$birth_date_arr = explode("-",$userDetails[0]['date_of_birth']);
?>
<div class="popup popupBg" id="inline_edit_profile">
<div class="editProfile_main">
<form name="edit_profile" method="post" action="javascript:void();">

<div class="headerEditProfile">
	<?php
	if($userDetails[0]['avatar'] != '') {
		$avtarImage = 'uploads/user_'.$_SESSION['user_id'].'/avatar/'.$userDetails[0]['avatar'];
	} else {
		$avtarImage = HOST_URL . '/images/avatarSmll.jpg';
	}
	$uid1 = md5(uniqid(rand()));
	$uid2 = md5(uniqid(rand()));
	?>
    <div class="info btmpadd profile_upload_avatar pic">
        <input id="edit_dmm_avtarImage_path" name="edit_dmm_avtarImage_path" type="hidden" value="" />
        <input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key_profile_avatar" value="<?php echo $uid1; ?>" />
        <img src="<?php echo $avtarImage; ?>" alt="Avatar" />
    </div>
    <div id="textContent">
    	<div class="title"><?php echo $userDetails[0]['dmm_company_name']; ?></div>
    	<p class="Chngpic" id="profile_avatar">Change Avatar</p>
        <p>(64 x 64px)</p>
    </div>
</div>
<div class="editPanel">
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
    	<tr>
        	<td valign="top" class="pane1 first" width="20%">
				<?php
				if($billBordDetails[0]['file_path'] != '') {
					$billBoardImage = HOST_URL . '/uploads/user_'.$_SESSION['user_id'].'/billboard/'.$billBordDetails[0]['file_path'];
				} else {
					$billBoardImage = HOST_URL . '/images/avatarSmll.jpg';
				}
				?>
            	<div class="data">
                    <label class="formLabel">
                    </label>
                    <input id="edit_dmm_billBordImage_path" name="edit_dmm_billBordImage_path" type="hidden" value="" />
                    <input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key_profile_billboard" value="<?php echo $uid2; ?>" />
                    <p><a class="zip" href="#" id="profile_billboard">Upload a new Zone image</a> (1200 x 700px) </p>

				    <p> 
					<a class="zip" href="http://dmmcompany.com/tutorial/" >Getting Started Tutorial</a> </p>
					<p> 
					<a class="zip" href="http://dmmcompany.com/zones/whatarezones.html" >About Zones</a> </p>
					<p>
					<a class="zip" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6ERABK2BCMTMA">Upgrade your Zone using PayPal</a> – Add up to 20 songs and 5 Ads ($24.99/yr)</p>
                    <p> 
					<a class="zip" href="http://dmmcompany.com/dmmqna/" id="profile_billboard">Member FAQ</a> </p>
					<p>For further assistance contact 
					<a class="zip" href="mailto:support@dmmcompany.com?subject=Special Request" id="profile_billboard">DMMSupport</a> </p>
                </div>
            </td>
            <td valign="top" class="pane2" width="25%">
            	<div class="data">
                	<label class="formLabel">
                    	Full Name
                    </label>
                    <div class="info">
                    	<input id="edit_dmm_name" name="edit_dmm_name" class="formInput" type="text" value="<?php echo $userDetails[0]['name']; ?>" />
                    </div>
                    
                	<label class="formLabel">
                    	DMMName
                    </label>
                    <div class="info">
                    	<input id="edit_dmm_company_name" name="edit_dmm_company_name" class="formInput" type="text" value="<?php echo $userDetails[0]['dmm_company_name']; ?>" readonly/>
                    </div>
                    
                    <label class="formLabel">
                    	Change Email
                    </label>
                    <div class="info">
                    	<input id="edit_dmm_email" name="edit_dmm_email" class="formInput" type="text" value="<?php echo $userDetails[0]['email']; ?>" />
                    </div>
                    
                    <label class="formLabel">
                    	Change Password
                    </label>
                    <div class="info">
                    	<input id="edit_dmm_password" name="edit_dmm_password" class="formInput" type="password" value="<?php //echo $userDetails[0]['password']; ?>" />
                    </div>
                    
                    <label class="formLabel">
                    	Twitter
                    </label>
                    <div class="info">
                    	<input id="edit_dmm_twitter" name="edit_dmm_twitter" class="formInput" type="text" value="<?php echo $userDetails[0]['twitter']; ?>" />
                    </div>
                    
                    <label class="formLabel">
                    	Facebook
                    </label>
                    <div class="info last">
                    	<input id="edit_dmm_facebook" name="edit_dmm_facebook" class="formInput" type="text" value="<?php echo $userDetails[0]['facebook']; ?>" />
                    </div>
                    
                </div>
            </td>
            <td valign="top" class="pane3" width="35%">
            	<div class="data">
                	<label class="formLabel">
                    	About You
                        <span>Tell the public important facts about your talents and journey.</span>
                    </label>
                    <div class="info">
                    	<textarea id="edit_dmm_musician_info" name="edit_dmm_musician_info" class="formTxtarea"><?php echo $userDetails[0]['musician_info']; ?></textarea>
                    </div>
					
                    <label class="formLabel">
                    	Strengths
                        <span>Separate each strength with a comma.<br />(Ex. Musician, Manager, Software, PR)</span>
                    </label>
                    <div class="info">
                    	<textarea id="edit_dmm_strengths" name="edit_dmm_strengths" class="formTxtarea1" ><?php echo $userDetails[0]['strengths']; ?></textarea>
                    </div>
					
					<label class="formLabel">
                    	Gender
                    </label>
                    <div class="info last">
						<?php if("m" == strtolower($userDetails[0]['gender'])) { ?>
							<input id="edit_dmm_gender" type="radio" checked="checked" name="edit_dmm_gender" value="m" /> Male
							<input id="edit_dmm_gender" type="radio" name="edit_dmm_gender" value="f" /> Female
						<?php } else if("f" == strtolower($userDetails[0]['gender'])) { ?>
							<input id="edit_dmm_gender" type="radio" name="edit_dmm_gender" value="m" /> Male
							<input id="edit_dmm_gender" type="radio" checked="checked" name="edit_dmm_gender" value="f" /> Female
						<?php } ?>
                    </div>
					
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="btmPanel">
    <ul class="rhtMenu">
        <li>
        <input class="btnLtBlue" id="btnProfileSubmit" onClick="submitProfile()" type="button" value="Save" />
        </li>
        <li class="clear"><!----></li>
    </ul>
    <div class="progressBar" id="pb_outer_edit_profile">
        <div class="progressBarBg">
            <span class="totlProgress" id="pb_inner_edit_profile"><!----></span> 
        </div>
    </div>
    <div class="btmStrip">
        <img src="<?php echo HOST_URL;?>/images/ico_info.gif" alt="" />DMMCompany The Musician's Brand
    </div>
</div>
</form>
</div>
</div>