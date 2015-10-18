<?php
// error_reporting(0);
// include_once "inc/config.php";
?>

	<!--<script language="javascript">
		$(function(){
			$('form').jqTransform();
		});
	</script> -->
	
<div id="UserLoginWrapper">
	<div id="musician">
      <form name="SignIn" id="SignIn" method="post" action="validateLogin.php">
               <div class="loginContainer">
                     <div style="height: 15px;">
						<span class="errorTxt" id="err_user_login" style="height: 15px;position: absolute;top: 19px;width: 80%;">You must enter a Zone name/Username</span>
					 </div>
					 <div class="firstField formfieldwrapper">
						   <input type="text" id="txtUserName" class="inputform" value="" tabindex="1" onkeydown="onKeyPress_toggle_default_text('SignIn', 'txtUserName', 'Zone name/User name', event)" onkeyup="onKeyUp_toggle_default_text('SignIn', 'txtUserName', 'Zone name/User name'); submitLoginForm(event); " />
							<span class="placeholder-text txtUserName" onclick="set_focus('txtUserName');">Zone name/User name</span>
                     </div>
                      
					  <div class="remember"><span class="rememberTxt"><input type="checkbox" id="chkbox_remember_me" /> Remember me</span></div>
                      
					  <div class="formfieldwrapper">
						   <!-- <input type="text" id="lr_fake_password" class="inputform" value="" onkeydown="onKeyPress_toggle_default_text('SignIn', 'lr_fake_password', 'Password', event)" onkeyup="onKeyUp_toggle_password_field('SignIn', 'lr_fake_password', 'txtPassword', '', event); submitLoginForm(event);" tabindex="7"  autocomplete="off"/>
						   	<span class="placeholder-text lr_fake_password" onclick="set_focus('lr_fake_password');">Password</span>
							<input style="display: none;" type="password" class="inputform" id="txtPassword" value="" onkeydown="onKeyPress_toggle_default_text('SignIn', 'txtPassword', 'Password', event)" onkeyup="onKeyUp_toggle_password_field('SignIn', 'txtPassword', 'lr_fake_password', 'Password', event); submitLoginForm(event);" tabindex="7" onclick="manage_cursor_position('SignIn', 'txtPassword', 'Password')" /> -->
							
							<input type="password" id="txtPassword" class="inputform" value="" tabindex="2" onkeydown="onKeyPress_toggle_default_text('SignIn', 'txtPassword', 'Password', event)" onkeyup="onKeyUp_toggle_default_text('SignIn', 'txtPassword', 'Password'); submitLoginForm(event);" />
							<span class="placeholder-text txtPassword" onclick="set_focus('txtPassword');">Password</span>
                     </div>
					 
                     <span class="blueTxt" onclick="loadForgotPasswordScreen('user_login');">Forgot password</span>
					 
                     <a href="javascript:void(0);" class="signinLink" title="Sign in" onClick="return validateUserLogin();" onmousedown="return false">Sign in</a>
               </div>
      </form>
    </div>
</div>