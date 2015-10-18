<div id="popupwrapper">
  <form name="ForgotPassword" id="ForgotPassword" method="post" action="forgotPassword.php">
    <div class="popupheader">
      <h3>Forgot Your <span>Password?</span></h3>
    </div>
    <div class="popupcontainer">
      <div class="leftcol">
        <p class="note">To reset your password enter one of the following.</p>
        <div class="txtfieldBg" style="margin:30px 0 0 7px;">
		  <input type="text" id="fpass_username" value="" class="inputform" tabindex="1" onkeypress="onKeyPress_toggle_default_text('ForgotPassword', 'fpass_username', 'Username (Zone name)', event)" onkeyup="onKeyUp_toggle_default_text('ForgotPassword', 'fpass_username', 'Username (Zone name)')" />
		  <span class="placeholder-text fpass_username" onclick="set_focus('fpass_username');">Username (Zone name)</span>
        </div>
        
		<p style="width:298px; margin:12px 0 4px 5px;">Or</p>
        
		<div class="txtfieldBg" style="margin:9px 0 0 7px;">
		  <input type="text" id="fpass_email" value="" class="inputform" tabindex="1" onkeypress="onKeyPress_toggle_default_text('ForgotPassword', 'fpass_email', 'Email address', event)" onkeyup="onKeyUp_toggle_default_text('ForgotPassword', 'fpass_email', 'Email address')" />
		  <span class="placeholder-text fpass_email" onclick="set_focus('fpass_email');">Email address</span>
        </div>
		
		<!-- <span class="errorTxt list_reg_user_name_errorTxt">Please enter a User name</span> -->
		
		<div style="height: 15px;position:relative;">
			<span class="errorTxt err_forgotpass_username">You must enter a Username or email address</span>
		</div>
      </div>
      <div class="rightcol">
		<div class="gbox"><p>Are You human?</p>
			<img id="forgotpass_captcha_img" src="" width="156" height="50" alt="" title="" />
			<div class="txtfieldBg" style="margin:6px 0 18px;">
				<input type="text" value="" class="inputform" id="fpass_captcha" 
				onkeypress="onKeyPress_toggle_default_text('ForgotPassword', 'fpass_captcha', 'Enter above text', event)" onkeyup="onKeyUp_toggle_default_text('ForgotPassword', 'fpass_captcha', 'Enter above text')" />
				<span class="placeholder-text fpass_captcha" onclick="set_focus('fpass_captcha');">Enter above text</span>
				<span class="errorTxt fpass_captcha_errorTxt">Incorrect text</span>
			</div>
				<span class="notreadable" onclick="refreshCaptcha('forgotpass_captcha_img');">Not readable? Change text.</span>
		</div>
      </div>
    </div>
    <div class="popupfooter">
      <div class="foottext">
        <p><span>For support</span> please contact us for direct question and solutions to update your account.</p>
      </div>
      <div class="footbtn">
		<a href="javascript:void(0);" onClick="forgotPassword();" class="nextbtn">Submit</a>
      </div>
    </div>
  </form>
</div>