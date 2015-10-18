<script type="text/javascript">

	changeProgressbar('75%','VALIDATE YOUR SKYWARDS MEMBERSHIP');

 </script>
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
 <?php include_once BASEPATH.DS."view".DS."navigation.php"; ?>
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
	                            	<form name="validate_form" method="POST" action="<?php echo SITE_URL."?r=skywardsmember/skywardsmembercheck_submit"; ?>" onsubmit="return validateSkywardNumber()">
                                    <div class="memc-input-helper fL">Please enter a 13-digit Skywards number</div>
                                    <div class="clearfix"></div>
                                    <p>Enter your Skywards no.</p>
	                            	<input type="text" name="vmn" value="<?php if($_SESSION['post_vmn']) { echo $_SESSION['post_vmn']; } else { echo "Your Skywards number"; }?>"/> <span class="lH40 mL10">(Please enter your 13-digit Skywards number)</span>
	                                <div class="clearfix"></div>                                    
                                    <div class="memc-input-row mT10">
                                	<ul style="width:545px;">
                                    
                                    <li class="radioBtn">
                                    <p>How many countries does Emirates fly to?</p>
									<input type="radio" name="reg_answer_validate" id="r1_validate" value="01" <?php if($_SESSION['post_reg_answer_validate']=='01') {?> checked="checked" <?php }?>/>
									<label for="r1_validate">01</label>
                                    <input type="radio" name="reg_answer_validate" id="r2_validate" value="07" <?php if($_SESSION['post_reg_answer_validate']=='07') {?> checked="checked" <?php }?>/>
									<label for="r2_validate">07</label>
                                    <input type="radio" name="reg_answer_validate" id="r3_validate" value="over 130" <?php if($_SESSION['post_reg_answer_validate']=='over 130') {?> checked="checked" <?php }?>/>
									<label for="r3_validate">over 130</label>
                                    </li>
									<div class="clearfix"></div>
									<li class="wid545 mT30">
                                    	 <div class="fL lH40">
                                         <input type="checkbox" name="tnc_validate" id="tnc_validate" class="tnc"  style="float:left;"/>
                                		<label for="tnc_validate" class="fL">I agree to Skyward Terms &amp; Conditions</label>
                                         </div>
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
                            	<form name="enroll_form" method="POST"  onsubmit="return validateNewSkywardRegistration()" action="<?php echo SITE_URL."?r=skywardsmember/skywardsmembercheck_submit"; ?>">
                                <div class="memc-input-helper fL">Please choose your city of residence</div>
                                <div class="clearfix"></div>
                            	<div class="memc-input-row">
                                	<ul>
                                    <li>
                                	<p>Title:</p>
                                    <select name="title" class="mR15">
									  <option value="">Title</option>
									  <option value="Mr" <?php if($_SESSION['post_title']=='Mr') {?> selected="selected" <?php }?>>Mr</option>
									  <option value="Mrs" <?php if($_SESSION['post_title']=='Mrs') {?> selected="selected" <?php }?>>Mrs</option>
									</select>
                                    </li>
                                    <li class="marRt25"> 
                                    <p>First Name:</p>
                                    <input type="text" name="fn" value="<?php if(isset($data['first_name'])) { echo $data['first_name']; } else {echo $_SESSION['post_first_name']; }  ?>"/></li>
                                    <li>
                                    <p>Last Name:</p>
                                    <input type="text" name="ln" class="mR0" value="<?php if(isset($data['last_name'])) { echo $data['last_name']; } else {echo $_SESSION['post_last_name']; }  ?>"/></li>
                                    <li class="marRt17"><p>Country of residence:</p>
                                    <!-- <input type="text" name="country" value="<?php if(isset($data['home_town'])) { echo $data['home_town']; } else { }?>"/> -->
                                    <?php $array_country_code=array('AF' , 'AL' , 'DZ' , 'AS' , 'AD' , 'AG' , 'AI' , 'AG' , 'AR' , 'AA' , 'AW' , 'AU' , 'AT' , 'AZ' , 'BS' , 'BH' , 'BD' , 'BB' , 'BY' , 'BE' , 'BZ' , 'BJ' , 'BM' , 'BT' , 'BO' , 'BL' , 'BA' , 'BW' , 'BR' , 'BC' , 'BN' , 'BG' , 'BF' , 'BI' , 'KH' , 'CM' , 'CA' , 'IC' , 'CV' , 'KY' , 'CF' , 'TD' , 'CD' , 'CL' , 'CN' , 'CI' , 'CS' , 'CO' , 'CC' , 'CG' , 'CK' , 'CR' , 'CT' , 'HR' , 'CU' , 'CB' , 'CY' , 'CZ' , 'DK' , 'DJ' , 'DM' , 'DO' , 'TM' , 'EC' , 'EG' , 'SV' , 'GQ' , 'ER' , 'EE' , 'ET' , 'FA' , 'FO' , 'FJ' , 'FI' , 'FR' , 'GF' , 'PF' , 'FS' , 'GA' , 'GM' , 'GE' , 'DE' , 'GH' , 'GI' , 'GB' , 'GR' , 'GL' , 'GD' , 'GP' , 'GU' , 'GT' , 'GN' , 'GY' , 'HT' , 'HW' , 'HN' , 'HK' , 'HU' , 'IS' , 'IN' , 'ID' , 'IA' , 'IQ' , 'IR' , 'IM' , 'IL' , 'IT' , 'JM' , 'JP' , 'JO' , 'KZ' , 'KE' , 'KI' , 'NK' , 'KS' , 'KW' , 'KG' , 'LA' , 'LV' , 'LB' , 'LS' , 'LR' , 'LY' , 'LI' , 'LT' , 'LU' , 'MO' , 'MK' , 'MG' , 'MY' , 'MW' , 'MV' , 'ML' , 'MT' , 'MH' , 'MQ' , 'MR' , 'MU' , 'ME' , 'MX' , 'MI' , 'MD' , 'MC' , 'MN' , 'MS' , 'MA' , 'MZ' , 'MM' , 'NA' , 'NU' , 'NP' , 'AN' , 'NL' , 'NV' , 'NC' , 'NZ' , 'NI' , 'NE' , 'NG' , 'NW' , 'NF' , 'NO' , 'OM' , 'PK' , 'PW' , 'PS' , 'PA' , 'PG' , 'PY' , 'PE' , 'PH' , 'PO' , 'PL' , 'PT' , 'PR' , 'QA' , 'ME' , 'RS' , 'RE' , 'RO' , 'RU' , 'RW' , 'NT' , 'EU' , 'HE' , 'KN' , 'LC' , 'MB' , 'PM' , 'VC' , 'SP' , 'SO' , 'AS' , 'SM' , 'ST' , 'SA' , 'SN' , 'SC' , 'SL' , 'SG' , 'SK' , 'SI' , 'SB' , 'OI' , 'ZA' , 'ES' , 'LK' , 'SD' , 'SR' , 'SZ' , 'SE' , 'CH' , 'SY' , 'TA' , 'TW' , 'TJ' , 'TZ' , 'TH' , 'TG' , 'TK' , 'TO' , 'TT' , 'TN' , 'TR' , 'TU' , 'TC' , 'TV' , 'UG' , 'UA' , 'AE' , 'GB' , 'US' , 'UY' , 'UZ' , 'VU' , 'VS' , 'VE' , 'VN' , 'VB' , 'VA' , 'WK' , 'WF' , 'YE' , 'ZR' , 'ZM' , 'ZW');
                                    $array_country_name=array('Afghanistan' , 'Albania' , 'Algeria' , 'American Samoa' , 'Andorra' , 'Angola' , 'Anguilla' , 'Antigua &amp; Barbuda' , 'Argentina' , 'Armenia' , 'Aruba' , 'Australia' , 'Austria' , 'Azerbaijan' , 'Bahamas' , 'Bahrain' , 'Bangladesh' , 'Barbados' , 'Belarus' , 'Belgium' , 'Belize' , 'Benin' , 'Bermuda' , 'Bhutan' , 'Bolivia' , 'Bonaire' , 'Bosnia &amp; Herzegovina' , 'Botswana' , 'Brazil' , 'British Indian Ocean Ter' , 'Brunei' , 'Bulgaria' , 'Burkina Faso' , 'Burundi' , 'Cambodia' , 'Cameroon' , 'Canada' , 'Canary Islands' , 'Cape Verde' , 'Cayman Islands' , 'Central African Republic' , 'Chad' , 'Channel Islands' , 'Chile' , 'China' , 'Christmas Island' , 'Cocos Island' , 'Colombia' , 'Comoros' , 'Congo' , 'Cook Islands' , 'Costa Rica' , 'Cote D\'Ivoire' , 'Croatia' , 'Cuba' , 'Curacao' , 'Cyprus' , 'Czech Republic' , 'Denmark' , 'Djibouti' , 'Dominica' , 'Dominican Republic' , 'East Timor' , 'Ecuador' , 'Egypt' , 'El Salvador' , 'Equatorial Guinea' , 'Eritrea' , 'Estonia' , 'Ethiopia' , 'Falkland Islands' , 'Faroe Islands' , 'Fiji' , 'Finland' , 'France' , 'French Guiana' , 'French Polynesia' , 'French Southern Ter' , 'Gabon' , 'Gambia' , 'Georgia' , 'Germany' , 'Ghana' , 'Gibraltar' , 'Great Britain' , 'Greece' , 'Greenland' , 'Grenada' , 'Guadeloupe' , 'Guam' , 'Guatemala' , 'Guinea' , 'Guyana' , 'Haiti' , 'Hawaii' , 'Honduras' , 'Hong Kong' , 'Hungary' , 'Iceland' , 'India' , 'Indonesia' , 'Iran' , 'Iraq' , 'Ireland' , 'Isle of Man' , 'Israel' , 'Italy' , 'Jamaica' , 'Japan' , 'Jordan' , 'Kazakhstan' , 'Kenya' , 'Kiribati' , 'Korea North' , 'Korea South' , 'Kuwait' , 'Kyrgyzstan' , 'Laos' , 'Latvia' , 'Lebanon' , 'Lesotho' , 'Liberia' , 'Libya' , 'Liechtenstein' , 'Lithuania' , 'Luxembourg' , 'Macau' , 'Macedonia' , 'Madagascar' , 'Malaysia' , 'Malawi' , 'Maldives' , 'Mali' , 'Malta' , 'Marshall Islands' , 'Martinique' , 'Mauritania' , 'Mauritius' , 'Mayotte' , 'Mexico' , 'Midway Islands' , 'Moldova' , 'Monaco' , 'Mongolia' , 'Montserrat' , 'Morocco' , 'Mozambique' , 'Myanmar' , 'Nambia' , 'Nauru' , 'Nepal' , 'Netherland Antilles' , 'Netherlands (Holland' , 'Nevis' , 'New Caledonia' , 'New Zealand' , 'Nicaragua' , 'Niger' , 'Nigeria' , 'Niue' , 'Norfolk Island' , 'Norway' , 'Oman' , 'Pakistan' , 'Palau Island' , 'Palestine' , 'Panama' , 'Papua New Guinea' , 'Paraguay' , 'Peru' , 'Philippines' , 'Pitcairn Island' , 'Poland' , 'Portugal' , 'Puerto Rico' , 'Qatar' , 'Republic of Montenegro' , 'Republic of Serbia' , 'Reunion' , 'Romania' , 'Russia' , 'Rwanda' , 'St Barthelemy' , 'St Eustatius' , 'St Helena' , 'St Kitts-Nevis' , 'St Lucia' , 'St Maarten' , 'St Pierre &amp; Miquelon' , 'St Vincent &amp; Grenadines' , 'Saipan' , 'Samoa' , 'Samoa American' , 'San Marino' , 'Sao Tome &amp; Principe' , 'Saudi Arabia' , 'Senegal' , 'Seychelles' , 'Sierra Leone' , 'Singapore' , 'Slovakia' , 'Slovenia' , 'Solomon Islands' , 'Somalia' , 'South Africa' , 'Spain' , 'Sri Lanka' , 'Sudan' , 'Suriname' , 'Swaziland' , 'Sweden' , 'Switzerland' , 'Syria' , 'Tahiti' , 'Taiwan' , 'Tajikistan' , 'Tanzania' , 'Thailand' , 'Togo' , 'Tokelau' , 'Tonga' , 'Trinidad &amp; Tobago' , 'Tunisia' , 'Turkey' , 'Turkmenistan' , 'Turks &amp; Caicos Is' , 'Tuvalu' , 'Uganda' , 'Ukraine' , 'United Arab Emirates' , 'United Kingdom' , 'United States of America' , 'Uruguay' , 'Uzbekistan' , 'Vanuatu' , 'Vatican City State' , 'Venezuela' , 'Vietnam' , 'Virgin Islands (Brit)' , 'Virgin Islands (USA)' , 'Wake Island' , 'Wallis &amp; Futana Is' , 'Yemen' , 'Zaire' , 'Zambia' , 'Zimbabwe' );
                                    ?>
                                    <select name="country" class="mR15 wid289">
	                                    <option value="">Country...</option>
	                                    <?php for($i=0;$i<count($array_country_code);$i++)
	                                    {?>
	                                    	<option value="<?php echo $array_country_code[$i]?>" <?php if($_SESSION['post_country']==$array_country_code[$i]) {?> selected="selected" <?php }?>><?php echo $array_country_name[$i]?></option>
	                                    <?php 	
	                                    }
	                                    ?>
                                    </select>
                                 	</li> 
                                    <li class="dob">
                                    <p>Date of birth:</p>
                                    <!-- <input type="text" name="dob" value=""/> YYYY-MM-DD -->
                                    <input class="defaultText" type="text" name="month" value="" <?php if(!isset($_SESSION['post_month'])) { ?> title="MM" <?php } else { ?> title="<?php echo $_SESSION['post_month']; ?>" <?php }?>/>
                                    <input class="defaultText" type="text" name="date" value="" <?php if(!isset($_SESSION['post_date'])) { ?> title="DD" <?php } else { ?> title="<?php echo $_SESSION['post_date']; ?>" <?php }?>/>
                                    <input class="defaultText" type="text" name="year" value="" <?php if(!isset($_SESSION['post_year'])) { ?> title="YYYY" <?php } else { ?> title="<?php echo $_SESSION['post_year']; ?>" <?php }?>/></li>
                                    <li><p>Email:</p>
                                    <input type="text" class="wid269" name="email" value="<?php if(isset($data['email'])) { echo $data['email']; } else { echo $_SESSION['post_email'];}  ?>"/></li><div class="clearfix" ></div>
                                    <li class="marRt25"><p>Choose a password:</p>
                                    <input type="password" name="pwd" value="" class="wid269"/>
									</li>
                                    <li>
                                    <p>Confirm your password:</p>
                                    <input type="password" name="confirm_pwd" value=""/></li>
                                    <div class="clearfix"></div>
                                    <li class="radioBtn">
                                    <p>How many countries does Emirates fly to?</p>
                                    
									<input type="radio" name="reg_answer" id="r1" value="01" <?php if($_SESSION['post_reg_answer']=='01') {?> checked="checked" <?php }?>/>
									<label for="r1">01</label>
                                    <input type="radio" name="reg_answer" id="r2" value="07" <?php if($_SESSION['post_reg_answer']=='07') {?> checked="checked" <?php }?>/>
									<label for="r2">07</label>
                                    <input type="radio" name="reg_answer" id="r3" value="over 130" <?php if($_SESSION['post_reg_answer']=='over 130') {?> checked="checked" <?php }?>/>
									<label for="r3">over 130</label>
                                    </li>									
                                    <div class="clearfix"></div>
									</ul>
                                </div>
                                <div class="memc-input-row mT30 wid545">
                                	<div class="fL lH40">
                                    	<input type="checkbox" name="tnc" id="tnc" class="tnc" />
                                		<label for="tnc" class="fL">I agree to Skyward Terms &amp; Conditions</label>
                                    </div>
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