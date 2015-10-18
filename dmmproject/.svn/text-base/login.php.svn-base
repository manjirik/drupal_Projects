<?php
include("inc/config.php");
?>
<script type="text/javascript">
	function submitonenter(formid,evt,thisObj) 
	{			
		evt = (evt) ? evt : ((window.event) ? window.event : "")
		if (evt) 
		{
			if ( evt.keyCode==13 || evt.which==13 ) 
			{
			   formValidate();
			   return false;
			}
			else
			{
				return true;
			}
		}
    }
</script>
<div class="popup popupBg" id="inline_example1">
<div id="steps2">
	<div id="loginSec" class="step">
        <div class="content">
            <h2>Welcome To DMMCompany!</h2>
            <div class="welcomeBox">
                <div class="imgCol">
                    <img src="<?php echo $prefix_url;?>images/img_dmm.gif" alt="DMM" />
                </div>
                <div class="txt">
                    The barriers that once separated the haves from the have-nots are non existent within DMMCompany.
                </div>
                <div class="clear"></div>
            </div>
            <!--<div id="errMsg" style="height:20px; color:#FF0000; "></div>-->
            <div class="signInForm">
                <form name="SignIn" method="post" action="validateLogin.php">
                    <div class="leftDiv">
                        <label class="signLabel">
                            DMMName (Zone)
                            <span class="errorMsg" id="err_login_username" style="display:none">You must enter a Username</span>
                        </label>
                        <input id="txtUserName" class="signInput" type="text" name="txtUserName" />
                    </div>
                    <div class="rhtDiv">
                        <label class="signLabel">
                            Password
                            <span class="errorMsg" id="err_login_password" style="display:none">You must enter a DMMCompany Name</span>
                        </label>
                        <input id="txtPassword" class="signInput" type="password" name="txtPassword" onkeypress="return submitonenter('formlogin',event,this)" />
                    </div>
                </form>
                <div class="clear"></div>
            </div>
        </div>
        <div class="btmPanel">
            <ul class="rhtMenu">
                <li><a id="forgetPass" class="btnLtGry" href="javascript:void(0);">Forget Password</a></li>
                <li><a class="btnLtGry createAcPopup" href="javascript:void(0);">Create Account</a></li>
                <li><a class="btnLtBlue" href="#" onClick="return formValidate(0);">Sign In</a></li>
                <li class="clear"><!----></li>
            </ul>
        </div>
    </div>
    
    <div id="forgetPassSec" class="step">
    	<form name="forget_Password" method="post" action="javascript:void(0);">
        <div class="content">
          	<h2>Forgot Your Password? No Problem!</h2>
          	<div class="welcomeBox">
                <div class="imgCol"> <img src="<?php echo $prefix_url;?>images/img_dmm.gif" alt="DMMCompany" /> </div>
                <div class="txt">Enter your DMMCompany name below and an email will be sent<br /> contiaining your password.</div>
                <div class="clear"></div>
          	</div>
          	<div class="signInForm">
                <div class="leftDiv">
                    <label class="signLabel"> 
                    	DMMCompany Name 
                        <span class="errorMsg" id="err_forgot_pass" style="display:none"></span>
                    </label>
                    <input class="signInput" type="text" id="dmm_company_name" name="dmm_company_name" TABINDEX=-5 />
                </div>
            	<div class="clear"></div>
          	</div>
        </div>
      	<div class="btmPanel">
          	<div class="progressBar"> </div>
            <ul class="rhtMenu">
            	<li><a class="btnDkGry" href="javascript:void(0);" onclick="backToLogin()" TABINDEX=-5 >Back</a></li>
                <li><a class="btnLtBlue" href="javascript:void(0);" onclick="passSubmit()" TABINDEX=-5 >Send it</a></li>
                <li class="clear">
                  <!---->
                </li>
            </ul>
      	</div>
        </form>
    </div>
</div>
</div>