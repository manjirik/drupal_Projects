 <style>
 .memc-input-wrapper input[type=radio] {
	margin: 1px 5px 10px 0;
    width: auto;
	float:left;
}
 .memc-input-wrapper .radioBtn label{float:left; margin:0px 15px 0px 0px;}
 .memc-already-member p, .memc-not-already-member p{margin:0px; padding:13px 0px;}
 .memc-content {min-height: auto;}
 .memc-already-member p, .memc-not-already-member p, .memc-input-row p {margin: 0;padding: 6px 0;}
 .radioBtn label{float:left; margin:0px 15px 0px 0px;}
.memc-already-member input[type=radio] {
	margin: 1px 5px 10px 0;
    width: auto;
	float:left;
}
 </style>
 <script>
 $(document).ready(function(){
	$(".btn-wrapper").next().hide();
	
	$(".btn-wrapper").click(function(e){
		$(this).next().slideToggle();
		$(this).toggleClass("memc-btn-wrapper");
		$(this).toggleClass("btn-wrapper");
		e.preventDefault();
		});
 });
 </script>
 <div class="tabs">
 <?php include_once BASEPATH.DS."view".DS."navigation.php";; ?>
                <div class="memc-content-wrapper topBdr">
                	<div class="memc-content">
                    	<h2>Are you a Skywards member?</h2>
                        <div class="memc-already-member">
                            <div class="btn-wrapper">
                                <a href="javascript:void()">Yes, I am already a member</a>
                            </div>
                            <div style="clear: both" id="aldmember">
                            	<p>Please enter your 13-digit Skywards no.</p>
	    						<?php 
	    							if($_POST && !empty($data) && isset($_POST['validate'])){ ?>
				                   		<!-- <div>
					                    	<?php 
											echo "Response:<br/>";
			                    			echo "<pre>";
											print_r($data);
											?>
										</div> -->
										<div class="error_message" style="color: red"> <?php echo $data[wsResult]->Message; ?></div>
						 		<?php }?>
						 		<div class="memc-input-wrapper">
	                            	<form name="validate_form" method="POST" action="<?php echo SITE_URL."?r=skywardsmember/regHandle"; ?>" onsubmit="return validateSkywardNumber()">
	                            	<input type="text" name="vmn" value="Your Skywards number" />
	                                
	                               
	                                <div class="clearfix"></div>
                                    <div class="memc-input-row">
                                	<ul style="width:545px;">
                                    
                                    <li class="radioBtn">
                                    <p>How many countries does Emirates fly to?</p>
                                    
									<input type="radio" name="reg_answer_validate" id="r1_validate" value="30" />
									<label for="r1_validate">30</label>
                                    <input type="radio" name="reg_answer_validate" id="r2_validate" value="25" />
									<label for="r2_validate">25</label>
                                    <input type="radio" name="reg_answer_validate" id="r3_validate" value="over 130" />
									<label for="r3_validate">over 130</label>
                                    <input type="radio" name="reg_answer_validate" id="r4_validate" value="7" />
									<label for="r4_validate">7</label>									
									</li>
									<div class="clearfix"></div>
									<li class="mT10">
										<input type="checkbox" name="tnc_validate" id="tnc_validate" class="tnc"  style="float:left;"/>
                                		<label for="tnc_validate" class="fL">I agree to Skyward Terms &amp; Conditions</label>
									</li>
                                    <div class="clearfix"></div>
                                    <li class="wid545">
                                    	 <div class="memc-input-helper lH40 fL">Please enter a 13-digit Skywards number</div>
                                    	<div class="memc-submit-btn" id="submit_skyward_btn" style="float:right;">
	                                	<input type="submit" name="validate" value="Submit">
	                                </div></li>
									</ul>
                                </div>
	                                </form><br/>
	                            </div>
	                            <!--<a href="#" class="forgot-skyward-number-btn">I don't remember my Skywards number</a>-->
                                
	   						</div>
                        </div>
                        
                        <div class="memc-not-already-member topBdr">
                            <div class="btn-wrapper">
                                <a href="javascript:void()">No, I am not a member yet</a>
                            </div>
                            <div style="clear: both" id="notMember">
                            <p>By completing the membership form below you can enjoy many privileges and benefits every time you fly with Emirates.</p>
    						<?php 
								if($_POST && !empty($data) && isset($_POST['enroll'])){ ?>
			                   		<!-- <div>
				                    	<?php 
										echo "Response:<br/>";
		                    			echo "<pre>";
										print_r($data);
										?>
									</div> -->
									<div class="error_message" style="color: red"> <?php echo $data[wsResult]->Message; ?></div>
					 		<?php }?>
					 		
    						<div class="memc-input-wrapper">
                            	<form name="enroll_form" method="POST"  onsubmit="return validateNewSkywardRegistration()" action="<?php echo SITE_URL."?r=skywardsmember/regHandle"; ?>">
                            	<div class="memc-input-row">
                                	<ul>
                                    <li>
                                	<p>Title:</p>
                                    <select name="title" class="mR15">
									  <option value="">Title</option>
									  <option value="Mr">Mr</option>
									  <option value="Mrs">Mrs</option>
									</select>
                                    </li>
                                    <li class="marRt25"> 
                                    <p>First Name:</p>
                                    <input type="text" name="fn" value="<?php if(isset($data['first_name'])) { echo $data['first_name']; } else { }  ?>"/></li>
                                    <li>
                                    <p>Last Name:</p>
                                    <input type="text" name="ln" class="mR0" value="<?php if(isset($data['last_name'])) { echo $data['last_name']; } else { }  ?>"/></li>
                                    <li class="marRt17"><p>Country of residence:</p>
                                    <!-- <input type="text" name="country" value="<?php if(isset($data['home_town'])) { echo $data['home_town']; } else { }?>"/> -->
                                    <select name="country" class="mR15 wid289">
										<option value="">Country...</option>
										<option value="AF">Afghanistan</option>
										<option value="AL">Albania</option>
										<option value="DZ">Algeria</option>
										<option value="AS">American Samoa</option>
										<option value="AD">Andorra</option>
										<option value="AG">Angola</option>
										<option value="AI">Anguilla</option>
										<option value="AG">Antigua &amp; Barbuda</option>
										<option value="AR">Argentina</option>
										<option value="AA">Armenia</option>
										<option value="AW">Aruba</option>
										<option value="AU">Australia</option>
										<option value="AT">Austria</option>
										<option value="AZ">Azerbaijan</option>
										<option value="BS">Bahamas</option>
										<option value="BH">Bahrain</option>
										<option value="BD">Bangladesh</option>
										<option value="BB">Barbados</option>
										<option value="BY">Belarus</option>
										<option value="BE">Belgium</option>
										<option value="BZ">Belize</option>
										<option value="BJ">Benin</option>
										<option value="BM">Bermuda</option>
										<option value="BT">Bhutan</option>
										<option value="BO">Bolivia</option>
										<option value="BL">Bonaire</option>
										<option value="BA">Bosnia &amp; Herzegovina</option>
										<option value="BW">Botswana</option>
										<option value="BR">Brazil</option>
										<option value="BC">British Indian Ocean Ter</option>
										<option value="BN">Brunei</option>
										<option value="BG">Bulgaria</option>
										<option value="BF">Burkina Faso</option>
										<option value="BI">Burundi</option>
										<option value="KH">Cambodia</option>
										<option value="CM">Cameroon</option>
										<option value="CA">Canada</option>
										<option value="IC">Canary Islands</option>
										<option value="CV">Cape Verde</option>
										<option value="KY">Cayman Islands</option>
										<option value="CF">Central African Republic</option>
										<option value="TD">Chad</option>
										<option value="CD">Channel Islands</option>
										<option value="CL">Chile</option>
										<option value="CN">China</option>
										<option value="CI">Christmas Island</option>
										<option value="CS">Cocos Island</option>
										<option value="CO">Colombia</option>
										<option value="CC">Comoros</option>
										<option value="CG">Congo</option>
										<option value="CK">Cook Islands</option>
										<option value="CR">Costa Rica</option>
										<option value="CT">Cote D'Ivoire</option>
										<option value="HR">Croatia</option>
										<option value="CU">Cuba</option>
										<option value="CB">Curacao</option>
										<option value="CY">Cyprus</option>
										<option value="CZ">Czech Republic</option>
										<option value="DK">Denmark</option>
										<option value="DJ">Djibouti</option>
										<option value="DM">Dominica</option>
										<option value="DO">Dominican Republic</option>
										<option value="TM">East Timor</option>
										<option value="EC">Ecuador</option>
										<option value="EG">Egypt</option>
										<option value="SV">El Salvador</option>
										<option value="GQ">Equatorial Guinea</option>
										<option value="ER">Eritrea</option>
										<option value="EE">Estonia</option>
										<option value="ET">Ethiopia</option>
										<option value="FA">Falkland Islands</option>
										<option value="FO">Faroe Islands</option>
										<option value="FJ">Fiji</option>
										<option value="FI">Finland</option>
										<option value="FR">France</option>
										<option value="GF">French Guiana</option>
										<option value="PF">French Polynesia</option>
										<option value="FS">French Southern Ter</option>
										<option value="GA">Gabon</option>
										<option value="GM">Gambia</option>
										<option value="GE">Georgia</option>
										<option value="DE">Germany</option>
										<option value="GH">Ghana</option>
										<option value="GI">Gibraltar</option>
										<option value="GB">Great Britain</option>
										<option value="GR">Greece</option>
										<option value="GL">Greenland</option>
										<option value="GD">Grenada</option>
										<option value="GP">Guadeloupe</option>
										<option value="GU">Guam</option>
										<option value="GT">Guatemala</option>
										<option value="GN">Guinea</option>
										<option value="GY">Guyana</option>
										<option value="HT">Haiti</option>
										<option value="HW">Hawaii</option>
										<option value="HN">Honduras</option>
										<option value="HK">Hong Kong</option>
										<option value="HU">Hungary</option>
										<option value="IS">Iceland</option>
										<option value="IN">India</option>
										<option value="ID">Indonesia</option>
										<option value="IA">Iran</option>
										<option value="IQ">Iraq</option>
										<option value="IR">Ireland</option>
										<option value="IM">Isle of Man</option>
										<option value="IL">Israel</option>
										<option value="IT">Italy</option>
										<option value="JM">Jamaica</option>
										<option value="JP">Japan</option>
										<option value="JO">Jordan</option>
										<option value="KZ">Kazakhstan</option>
										<option value="KE">Kenya</option>
										<option value="KI">Kiribati</option>
										<option value="NK">Korea North</option>
										<option value="KS">Korea South</option>
										<option value="KW">Kuwait</option>
										<option value="KG">Kyrgyzstan</option>
										<option value="LA">Laos</option>
										<option value="LV">Latvia</option>
										<option value="LB">Lebanon</option>
										<option value="LS">Lesotho</option>
										<option value="LR">Liberia</option>
										<option value="LY">Libya</option>
										<option value="LI">Liechtenstein</option>
										<option value="LT">Lithuania</option>
										<option value="LU">Luxembourg</option>
										<option value="MO">Macau</option>
										<option value="MK">Macedonia</option>
										<option value="MG">Madagascar</option>
										<option value="MY">Malaysia</option>
										<option value="MW">Malawi</option>
										<option value="MV">Maldives</option>
										<option value="ML">Mali</option>
										<option value="MT">Malta</option>
										<option value="MH">Marshall Islands</option>
										<option value="MQ">Martinique</option>
										<option value="MR">Mauritania</option>
										<option value="MU">Mauritius</option>
										<option value="ME">Mayotte</option>
										<option value="MX">Mexico</option>
										<option value="MI">Midway Islands</option>
										<option value="MD">Moldova</option>
										<option value="MC">Monaco</option>
										<option value="MN">Mongolia</option>
										<option value="MS">Montserrat</option>
										<option value="MA">Morocco</option>
										<option value="MZ">Mozambique</option>
										<option value="MM">Myanmar</option>
										<option value="NA">Nambia</option>
										<option value="NU">Nauru</option>
										<option value="NP">Nepal</option>
										<option value="AN">Netherland Antilles</option>
										<option value="NL">Netherlands (Holland, Europe)</option>
										<option value="NV">Nevis</option>
										<option value="NC">New Caledonia</option>
										<option value="NZ">New Zealand</option>
										<option value="NI">Nicaragua</option>
										<option value="NE">Niger</option>
										<option value="NG">Nigeria</option>
										<option value="NW">Niue</option>
										<option value="NF">Norfolk Island</option>
										<option value="NO">Norway</option>
										<option value="OM">Oman</option>
										<option value="PK">Pakistan</option>
										<option value="PW">Palau Island</option>
										<option value="PS">Palestine</option>
										<option value="PA">Panama</option>
										<option value="PG">Papua New Guinea</option>
										<option value="PY">Paraguay</option>
										<option value="PE">Peru</option>
										<option value="PH">Philippines</option>
										<option value="PO">Pitcairn Island</option>
										<option value="PL">Poland</option>
										<option value="PT">Portugal</option>
										<option value="PR">Puerto Rico</option>
										<option value="QA">Qatar</option>
										<option value="ME">Republic of Montenegro</option>
										<option value="RS">Republic of Serbia</option>
										<option value="RE">Reunion</option>
										<option value="RO">Romania</option>
										<option value="RU">Russia</option>
										<option value="RW">Rwanda</option>
										<option value="NT">St Barthelemy</option>
										<option value="EU">St Eustatius</option>
										<option value="HE">St Helena</option>
										<option value="KN">St Kitts-Nevis</option>
										<option value="LC">St Lucia</option>
										<option value="MB">St Maarten</option>
										<option value="PM">St Pierre &amp; Miquelon</option>
										<option value="VC">St Vincent &amp; Grenadines</option>
										<option value="SP">Saipan</option>
										<option value="SO">Samoa</option>
										<option value="AS">Samoa American</option>
										<option value="SM">San Marino</option>
										<option value="ST">Sao Tome &amp; Principe</option>
										<option value="SA">Saudi Arabia</option>
										<option value="SN">Senegal</option>
										<option value="SC">Seychelles</option>
										<option value="SL">Sierra Leone</option>
										<option value="SG">Singapore</option>
										<option value="SK">Slovakia</option>
										<option value="SI">Slovenia</option>
										<option value="SB">Solomon Islands</option>
										<option value="OI">Somalia</option>
										<option value="ZA">South Africa</option>
										<option value="ES">Spain</option>
										<option value="LK">Sri Lanka</option>
										<option value="SD">Sudan</option>
										<option value="SR">Suriname</option>
										<option value="SZ">Swaziland</option>
										<option value="SE">Sweden</option>
										<option value="CH">Switzerland</option>
										<option value="SY">Syria</option>
										<option value="TA">Tahiti</option>
										<option value="TW">Taiwan</option>
										<option value="TJ">Tajikistan</option>
										<option value="TZ">Tanzania</option>
										<option value="TH">Thailand</option>
										<option value="TG">Togo</option>
										<option value="TK">Tokelau</option>
										<option value="TO">Tonga</option>
										<option value="TT">Trinidad &amp; Tobago</option>
										<option value="TN">Tunisia</option>
										<option value="TR">Turkey</option>
										<option value="TU">Turkmenistan</option>
										<option value="TC">Turks &amp; Caicos Is</option>
										<option value="TV">Tuvalu</option>
										<option value="UG">Uganda</option>
										<option value="UA">Ukraine</option>
										<option value="AE">United Arab Emirates</option>
										<option value="GB">United Kingdom</option>
										<option value="US">United States of America</option>
										<option value="UY">Uruguay</option>
										<option value="UZ">Uzbekistan</option>
										<option value="VU">Vanuatu</option>
										<option value="VS">Vatican City State</option>
										<option value="VE">Venezuela</option>
										<option value="VN">Vietnam</option>
										<option value="VB">Virgin Islands (Brit)</option>
										<option value="VA">Virgin Islands (USA)</option>
										<option value="WK">Wake Island</option>
										<option value="WF">Wallis &amp; Futana Is</option>
										<option value="YE">Yemen</option>
										<option value="ZR">Zaire</option>
										<option value="ZM">Zambia</option>
										<option value="ZW">Zimbabwe</option>
									</select></li>
                                    <li class="dob">
                                    <p>Date of birth:</p>
                                    <!-- <input type="text" name="dob" value=""/> YYYY-MM-DD -->
                                    <input class="defaultText" type="text" name="month" value="" title="MM"/>
                                    <input class="defaultText" type="text" name="date" value="" title="DD"/>
                                    <input class="defaultText" type="text" name="year" value="" title="YYYY"/></li>
                                    <li><p>Email:</p>
                                    <input type="text" class="wid269" name="email" value="<?php if(isset($data['email'])) { echo $data['email']; } else { }  ?>"/></li><div class="clearfix" ></div>
                                    <li class="marRt25"><p>Choose a password:</p>
                                    <input type="password" name="pwd" value="" class="wid269"/>
									</li>
                                    <li>
                                    <p>Confirm your password:</p>
                                    <input type="password" name="confirm_pwd" value=""/></li>
                                    <div class="clearfix"></div>
                                    <li class="radioBtn">
                                    <p>How many countries does Emirates fly to?</p>
                                    
									<input type="radio" name="reg_answer" id="r1" value="30" />
									<label for="r1">30</label>
                                    <input type="radio" name="reg_answer" id="r2" value="25" />
									<label for="r2">25</label>
                                    <input type="radio" name="reg_answer" id="r3" value="over 130" />
									<label for="r3">over 130</label>
                                    <input type="radio" name="reg_answer" id="r4" value="7" />
									<label for="r4">7</label>									
									</li>
									<div class="clearfix"></div>
									<li class="mT10">
										<input type="checkbox" name="tnc" id="tnc" class="tnc" />
                                		<label for="tnc" class="fL">I agree to Skyward Terms &amp; Conditions</label>
									</li>
                                    <div class="clearfix"></div>
									</ul>
                                </div>
                                <div class="memc-input-row mT45 wid545">
                                	<div class="memc-input-helper fL">Please choose your city of residence</div>
                                	<div class="memc-submit-btn fR" id="submit_new_skyward_btn">
                                        <input type="submit" name="enroll" value="Submit">
                                  </div>
                                	
                                    <div class="clearfix"></div>
                                </div>
                                </form>
                                </div>
                           </div>
   						</div>
                    </div>
                    
                    <!--<div class="memc-right-panel-wrapper">
                        <h3>Why should I join?</h3>
                        <ul class="memc-right-panel">
                        	<li>
                            	<a href="javascript: void(0);" class="selected">Skywards benefits</a>
                                <div class="memc-right-panel-list-content" style="display:block;">
                                	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure.
                                </div>
                            </li>
                        	<li>
                            	<a href="javascript: void(0);">It's easy and free</a>
                                <div class="memc-right-panel-list-content">
                                	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure.
                                </div>
                            </li>
                        	<li class="brdr-btm">
                            	<a href="javascript: void(0);">Become a member to win</a>
                                <div class="memc-right-panel-list-content">
                                	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure.
                                </div>
                            </li>
                        </ul>
                    </div>-->
                  	
                    <div class="clearfix"></div>
                </div>
            </div>