var alertTimer;
var notificationLimitedAccessTimer;
var currentClickID;
var userBinder;

/**
 * Reset form data
 */
$.fn.reset = function () {
	$(this).each (function() { 
		this.reset();
		
		/* Radio buttons */
		$('.jqTransformRadio').each(function(){ 
			if($(this).hasClass('jqTransformChecked')) 
				$(this).removeClass('jqTransformChecked');
		});
		
		/* Check boxes */
		$('.jqTransformCheckbox').each(function(){ 
			if($(this).hasClass('jqTransformChecked')) 
				$(this).removeClass('jqTransformChecked');
		});
		
		/* Select field */
		$('div.jqTransformSelectWrapper').each(function() {
			$('div span', this).text($('ul li:first', this).text());
			$('ul li a.selected', this).removeClass('selected');
			$('ul li:first a', this).addClass('selected');
		});
	});
}

function dotrim(strComp) {
	return strComp.replace(/^\s+|\s+$/g, '');
}

/**
 * Function to validate e-mail address
 */
function IsValidEmail(email) {
	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	return filter.test(email);
}

/**
 * Function to check entered string is Alpha Numeric or not
 */
function IsAlphaNumeric(str) {
	var filter = /^[0-9a-zA-Z_-]+$/;
	return filter.test(str);
}

/**
 * Function to check entered URL is correct or not
 */
function IsValidURL(url) {
	
	var filter =  /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/;
	
	return filter.test(url);
}

function closeModelPopup() {
	$('.popupMask').hide(); $('.modelPopupWindow').hide();
}

/**
 * Toggle default text of form field
 * On first key press if value is a default then clear it
 */
function onKeyPress_toggle_default_text(formID, fieldID, text, event) {
	var code = (event.keyCode ? event.keyCode : event.which);
	if(8 != code && 9 != code && 13 != code) {
		$('#' + formID + ' .' + fieldID).hide();
	}
}

/**
 * On last keyup if value is empty then load default text
 */
function onKeyUp_toggle_default_text(formID, fieldID, text) {
	var field_value = $('#' + formID + ' #' + fieldID).val();
	if('' == field_value) {
		$('#' + formID + ' .' + fieldID).show();
	}
}

function manage_cursor_position(formID, fieldID, text) {}

/**
 * Toggle password and fake password fields
 *	By default fake password field is visible to show normal text
 *	on first keyup hide fake password field and show correct password field
 */
function onKeyUp_toggle_password_field(formID, fakeFieldID, fieldID, text, event) {
	var code = (event.keyCode ? event.keyCode : event.which);
	if(9 != code) {
		if('lr_fake_password' == fakeFieldID || 'lr_fake_confirm_password' == fakeFieldID || 'lr_fake_password2' == fakeFieldID) {
			var tmp_key = $('#' + fakeFieldID).val();
			$('#' + formID + ' #' + fakeFieldID).hide();
			$('#' + formID + ' #' + fieldID).show();
			$('#' + formID + ' #' + fieldID).focus();
			$('#' + formID + ' #' + fieldID).val(tmp_key);
		} else {
			var field_value = $('#' + formID + ' #' + fakeFieldID).val();

			if('' == field_value) {
				$('#' + formID + ' #' + fakeFieldID).hide();
				$('#' + formID + ' #' + fieldID).show();
				$('#' + formID + ' #' + fieldID).val('');
				$('#' + formID + ' .' + fieldID).show();
				$('#' + formID + ' #' + fieldID).focus();
			}
		}
	}
}

/**
 * Travel between form steps
 */
function toggle_form_steps(formId, fromStep, toStep) {
	/* stop and clear all previous animation */
	$('#' + formId + ' #' + fromStep + ' .errorTxt').stop(true, true);
	
	/* Hide if any previous error image/text after data correction if any */
	$('#' + formId + ' #' + fromStep + ' .errorTxt').hide();
	$('#' + formId + ' #' + fromStep).hide();
	$('#' + formId + ' #' + toStep).fadeIn(100);
}

/**
 * Func to toggle default text on Focus field event
 */
function onFocus_toggle_default_text(formID, fieldID, text) {
	var fieldValue = $.trim($('#' + formID + ' #' + fieldID).val());
	if(text == fieldValue) {
		$('#' + formID + ' #' + fieldID).val('');
	}
}

/**
 * Toggle default text on Blur field event
 */
function onBlur_toggle_default_text(formID, fieldID, text) {
	var fieldValue = $.trim($('#' + formID + ' #' + fieldID).val());
	if('' == fieldValue) {
		$('#' + formID + ' #' + fieldID).val(text);
	}
}

/**
 * Display validation message
 */
var validationMessageTimer;
function show_validation_message(imgWrapperClass, textWrapperClass, validationMessage) {
	$('.errorTxt').hide();
	clearTimeout(validationMessageTimer);
	$('.errorTxt.' + textWrapperClass).html(validationMessage);
	$('.errorTxt.' + textWrapperClass).show();
	validationMessageTimer = setTimeout("$('.errorTxt').hide()", 5000);
}

/**
 * Display validation message
 */
function showErrorMessage(errorMessage){
	$('.errorTxt').hide();
	clearTimeout(validationMessageTimer);
	$.each(errorMessage, function(i, elem) {
		if(errorMessage[i]) {
			$('.errorTxt.' + elem[0]).html(elem[1]);
			$('.errorTxt.' + elem[0]).show();
		}
	});
	validationMessageTimer = setTimeout("$('.errorTxt').hide()", 5000);
}

function _init_upload_control(buttonText, elementID, uploadType, uploadSize, allowedExtensions, imageUploaderID, imgPreviewID, hiddenFieldID, errorTxtClass) {
	var uploader = new qq.FileUploader({
		element: document.getElementById(elementID),
		action: hostURL + '/ajax_upload.php?type=' + uploadType + '&upload_size=' + uploadSize,
		name: 'uphoto',
		params: {'buttonText' : buttonText},
		allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
		onSubmit: function(id, fileName){
			$('#' + imageUploaderID).show();
		},
		onComplete: function(id, fileName, responseJSON){
			if(1 == responseJSON.status) {
				$('#' + imgPreviewID).load(function() { 
					$('#' + imageUploaderID).hide();
				}).attr('src', responseJSON.path);

				$('#' + hiddenFieldID).val(responseJSON.path);
			} else if(0 == responseJSON.status) {
				$('#' + imageUploaderID).hide();
				show_validation_message('', errorTxtClass, responseJSON.error);
			}
		},
		messages: {
			typeError: 'Only JPG, PNG or GIF files are allowed'
		},
		showMessage: function(message){
			show_validation_message('', errorTxtClass, message);
			$('#' + imageUploaderID).hide();
		}
	});
}

/**
 * Loads welcome screen
 */
function backToWelcomeScreen() {
	/* hack to avoid flick of close button */
	$('#cboxClose').attr('style', 'visibility: hidden');
	loadWelcomeScreen();
}

/**
 * Loads Listener Registration on click 
 * of Next button on welcome/create account page
 */
function callListenersSignUp() {
	$('.errorTxt').hide();
	$('#listenerRegistrationForm').reset();
	$('#listenerRegistrationForm .placeholder-text').show();
	$('#list_reg_user_name').focus();
	refreshCaptcha('list_reg_captcha');

	/* hack to avoid preload close button */
	$('#cboxClose').attr('style', 'visibility: hidden');

	/* Load Listener Registration page */
	$.colorbox({ 
		inline: true, 
		href: '#listenerRegistrationWrapper', 
		width:'700px', 
		height:'600px', 
		transition: 'fade', 
		scrolling: false, 
		close: '', 
		opacity: 1, 
		overlayClose: false, 
		onComplete: function() {
			$('form').jqTransform();
			$('#listenerRegistrationStep1').show();
			$('#listenerRegistrationStep2').hide();

			/* _init_upload_control(buttonText, elementID, uploadType, uploadSize, allowedExtensions, imageUploaderID, imgPreviewID, hiddenFieldID, errorTxtClass) */
			_init_upload_control('Upload Avatar', 'list_reg_avatar', 'profile_avatar', '10', "'jpg', 'jpeg', 'png', 'gif'", 'imageUploaderLoader', 'img_list_reg_avatar_avatar', 'list_reg_avatar_path', 'list_reg_avatar_errorTxt');
			
			/* hack to avoid preload close button */
			$('#cboxClose').attr('style', 'visibility: visible');
		}, 
		onCleanup: function() {
			$('#captcha_image').attr('src', '');
			
			/* hack to avoid preload close button */
			$('#cboxClose').attr('style', 'visibility: hidden');

			closeModelPopup();
		}
	});
}

/**
 * Validate Listener registration step 1
 */
function validateListenerRegisterStep1() {
	
	var list_reg_full_name = $.trim($("#list_reg_full_name").val());
	var list_reg_user_name = $.trim($("#list_reg_user_name").val());
	var list_reg_dob_month = $.trim($("#list_reg_dob_month").val());
	var list_reg_dob_day = $.trim($("#list_reg_dob_day").val());
	var list_reg_dob_year = $.trim($("#list_reg_dob_year").val());
	var list_reg_email = $.trim($("#list_reg_email").val());
	var list_reg_confirm_email = $.trim($("#list_reg_confirm_email").val());
	var list_reg_password = $.trim($("#list_reg_password").val());
	var list_reg_confirm_password = $.trim($("#list_reg_confirm_password").val());
	var list_reg_gender = $("input:radio[id=list_reg_gender]:checked").length;
	var list_reg_toS = $("input:checkbox[id=list_reg_toS]:checked").length;
	
	var errorMessage = new Array();
	
	if('' == list_reg_full_name || 'Full name' == list_reg_full_name) {
		errorMessage[0] = ['list_reg_full_name_errorTxt', 'Please enter a Full name'];
	}
	
	if('' == list_reg_user_name || 'User name' == list_reg_user_name) {
		errorMessage[1] = ['list_reg_user_name_errorTxt', 'Please enter a User name'];
	} else if(!IsAlphaNumeric(list_reg_user_name)) {
		errorMessage[1] = ['list_reg_user_name_errorTxt', 'User name contains invalid characters'];
	} else if(24 < list_reg_user_name.length) {
		errorMessage[1] = ['list_reg_user_name_errorTxt', 'User name should be less than 24 characters'];
	} else if(0 == checkZoneNameAvalibility(list_reg_user_name)) {
		errorMessage[1] = ['list_reg_user_name_errorTxt', 'This User name is already taken'];
	}
	
	var date = new Date(); 
	var curr_year = date.getFullYear();
	
	if(list_reg_dob_month == '00') {
		errorMessage[2] = ['list_reg_dob_errorTxt', 'Please select Month']; 
	} else if(list_reg_dob_day == 'Day') {
		errorMessage[2] = ['list_reg_dob_errorTxt', 'Please enter Day']; 
	} else if( !(!isNaN(parseFloat(list_reg_dob_day)) && isFinite(list_reg_dob_day)) ) {
		errorMessage[2] = ['list_reg_dob_errorTxt', 'Please enter valid Day']; 
	} else if(list_reg_dob_day <= 0) {
		errorMessage[2] = ['list_reg_dob_errorTxt', 'Please enter valid Day']; 
	} else if(list_reg_dob_day > 31) {
		errorMessage[2] = ['list_reg_dob_errorTxt', 'Please enter valid Day']; 
	} else if(list_reg_dob_year == 'Year') {
		errorMessage[2] = ['list_reg_dob_errorTxt', 'Please enter Year']; 
	} else if( !(!isNaN(parseFloat(list_reg_dob_year)) && isFinite(list_reg_dob_year)) ) {
		errorMessage[2] = ['list_reg_dob_errorTxt', 'Please enter valid Year']; 
	} else if(list_reg_dob_year > curr_year || list_reg_dob_year < 1900) {
		errorMessage[2] = ['list_reg_dob_errorTxt', 'Please enter real year of birth']; 
	} else if(list_reg_dob_year<= 0) {
		errorMessage[2] = ['list_reg_dob_errorTxt', 'Please enter Year']; 
	} else if(list_reg_dob_year.length <= 3) {
		errorMessage[2] = ['list_reg_dob_errorTxt', 'Please enter valid Year']; 
	} else if(list_reg_dob_year != '' || list_reg_dob_year != 'Year') {

		/* code for get current date */
		var date = new Date(); 
		var curr_date = date.getDate();
		var curr_month = date.getMonth();
		var curr_year = date.getFullYear();
		d2 = curr_date + '/' + curr_month + '/' + curr_year;

		/* code for date compare */
		var d1, d2;
		d1 = new Date(list_reg_dob_year, list_reg_dob_month - 1, list_reg_dob_day);
		d2 = new Date(curr_year, curr_month, curr_date);
		/* The number of milliseconds in one day */
		var ONE_DAY = 1000 * 60 * 60 * 24;
		/* Convert both dates to milliseconds */
		var date1_ms = d1.getTime();
		var date2_ms = d2.getTime();

		/* Calculate the difference in milliseconds */
		var difference_ms = Math.abs(date2_ms - date1_ms);
		var final_date_diff = (Math.round(difference_ms / ONE_DAY)) / 365;
		if(final_date_diff < 15) {
			errorMessage[2] = ['list_reg_dob_errorTxt', 'Birth Date must beat least 15 years of age']; 
		}
	}
	
	if(list_reg_email == '') {
		errorMessage[3] = ['list_reg_email_errorTxt', 'Please enter a valid email address'];
	} else if(!IsValidEmail(list_reg_email)) {
		errorMessage[3] = ['list_reg_email_errorTxt', 'Please enter a valid email address'];
	} else if(list_reg_email != list_reg_confirm_email) {
		errorMessage[3] = ['list_reg_confirm_email_errorTxt', 'Email and Confirm email does not match']; 
	} else {
		$.ajax({
			type: 'POST', url: siteURL + '/isEmailAlreadyRegister.php', data: 'email=' + list_reg_email, async: false, cache: false,
			success:
				function(data) {
					if(1 == data) {
						errorMessage[3] = ['list_reg_email_errorTxt', 'Email address already registered'];
					}
				}
		});
	}
	
	if(list_reg_password == '') {
		errorMessage[4] = ['list_reg_password_errorTxt', 'Please enter a password'];
	}
	
	if(list_reg_password != list_reg_confirm_password) {
		errorMessage[4] = ['list_reg_confirm_password_errorTxt', 'Password and Confirm password does not match'];
	}

	if(0 == list_reg_gender) {
		errorMessage[5] = ['list_reg_errorTxt', 'Select gender'];
	}
	
	if(0 == list_reg_toS) {
		errorMessage[6] = ['list_reg_toS_errorTxt', 'You must agree with Terms of Service'];
	}

	if(0 == errorMessage.length) {
		/* Render step 2 form */
		toggle_form_steps('listenerRegistrationForm', 'listenerRegistrationStep1', 'listenerRegistrationStep2');
		refreshCaptcha('captcha_image');
	} else {
		showErrorMessage(errorMessage);
	}

}

/**
 * Validate Listener registration step 2
 */
function validateListenerRegisterStep2() {
	
	var errorMessage = new Array();
	
	var list_reg_country = $("#list_reg_country").val();
	var list_reg_captcha = $("#list_reg_captcha").val();
	
	if('' == list_reg_country) {
		errorMessage[0] = ['list_reg_country_errorTxt', 'Please select country'];
	}
	
	if('' == list_reg_captcha || 'Enter above text' == list_reg_captcha) {
		errorMessage[1] = ['list_reg_captcha_errorTxt', 'Please enter text'];
	} else if('' != list_reg_captcha) {
		$.ajax({
			type: 'POST', url: siteURL + '/validateCaptcha.php', data: 'captcha=' + list_reg_captcha, async: false, cache: false, 
			success:
				function(validateCaptcha) {
					if(0 == validateCaptcha) {
						errorMessage[1] = ['list_reg_captcha_errorTxt', 'Invalid text'];
					}
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) { }
		});
	}
	
	if(0 == errorMessage.length) {
		registerListenerUser();
	} else {
		showErrorMessage(errorMessage);
	}

}

/**
 * Register Listener at DMMCompany
 */
function registerListenerUser() {
	/* Create User registration key : value array */
	var array = { 
		'list_reg_full_name' : $.trim($('#list_reg_full_name').val()),
		'list_reg_user_name' : $.trim($('#list_reg_user_name').val()),
		'list_reg_dob_month' : $.trim($('#list_reg_dob_month').val()),
		'list_reg_dob_day' : $.trim($('#list_reg_dob_day').val()),
		'list_reg_dob_year' : $.trim($('#list_reg_dob_year').val()),
		'list_reg_email' : $.trim($('#list_reg_email').val()),
		'list_reg_password' : $.trim($('#list_reg_password').val()),
		'list_reg_gender' : $('input:radio[id=list_reg_gender]:checked').val(),
		'list_reg_country' : $.trim($('#list_reg_country').val()),
		'reg_avatar_path' : $.trim($('#list_reg_avatar_path').val()),
		'user_type' : 'listener',
		
		/* Default values for Listener user */
		'reg_tell_us' : '',
		'reg_strength' : '',
		'reg_twitter' : '',
		'reg_facebook' : '',
		'reg_notify_me' : ''
	};
	
	/* $.param() similar to http_build_query() */
	var dataString = $.param(array);

	$.ajax({
		type: 'POST', url: siteURL + '/regAddUser.php', data: dataString, async: false, cache: false, 
		success: 
			function(data) {
				if(0 != data) {
					$.cookie('NOTIFICATIONID', 'Welcome to DMMCompany...', { path: '/' });
					/* set LISTENERREG to load lifestyle pop-up after redirect */
					$.cookie('LISTENERREG', '1', { path: '/' });
					window.location = siteURL;
					
				} else {
					$.cookie('NOTIFICATIONID', 'Failed to register !!!', { path: '/' });
					window.location = siteURL;
					return false;
				}
			},
		error: 
			function (XMLHttpRequest, textStatus, errorThrown) {
				$.cookie('NOTIFICATIONID', 'Server error', { path: '/' });
				window.location = siteURL;
			}
	});
}

/**
 * Loads Musician registration form
 */
function callMusicianSignUp() {
	/* Get zone name from welcome screen */
	var zone_name = $.trim($('#welcomeRegistrationForm #zone_name').val());
	var zone_name_avaliable = checkZoneNameAvalibility(zone_name);
	if(0 == zone_name.length) {
		$('#welcomeRegistrationForm #zone_name_error_message').html('Enter a unique zone name');
		setTimeout( function() {
			$('#welcomeRegistrationForm #zone_name_error_message').html('');
		}, 5000);
	} else if(!IsAlphaNumeric(zone_name)) {
		$('#welcomeRegistrationForm #zone_name_error_message').html('Zone name contains invalid characters');
		setTimeout( function() {
			$('#welcomeRegistrationForm #zone_name_error_message').html('');
		}, 5000);
	}
	else if(0 == zone_name_avaliable) {
		$('#welcomeRegistrationForm #zone_name_error_message').addClass('notavailable');
		$('#welcomeRegistrationForm #zone_name_error_message').html('This Zone name is already taken');
		setTimeout( function() {
			$('#welcomeRegistrationForm #zone_name_error_message').html('');
		}, 5000);
	}
	else if(1 == zone_name_avaliable) {
		/* hack to avoid preload close button */
		$('#cboxClose').attr('style', 'visibility: hidden');
	
		/* Load Musician Registration page */
		$.colorbox({ 
			/* inline: true, 
			href: '#musicianRegistrationWrapper',  */
			href: hostURL + '/musicianRegistration.php', 
			width:'700px', 
			height:'610px', 
			transition: 'fade', 
			scrolling: false, 
			close: '', 
			opacity: 1, 
			overlayClose: false, 
			onComplete: function() {
				$('form').jqTransform();
				$('#musicstep1').show();
				
				/* state your purpose */
				$('#stateyourpurposepopupreg .scroll-pane').jScrollPane({verticalDragMinHeight:135,verticalDragMaxHeight:135,maintainPosition:false});
				$('#stateyourpurposepopupreg').css('display', 'none');
				$('#stateyourpurposepopupreg').addClass('modelPopupWindow');
				$('#stateyourpurposepopupreg').addClass('alertmessagebox');
				/* state your purpose */
				
				$('#musicstep2').hide();
				$('#musicstep3').hide();
				$('#musicstep4').hide();

				/* Set selected zone name on zone registration form */
				$('#musicianRegistrationForm #lr_zone_name').val(zone_name);
				
				/* init upload avatar control */
				/* _init_upload_control(buttonText, elementID, uploadType, uploadSize, allowedExtensions, imageUploaderID, imgPreviewID, hiddenFieldID, errorTxtClass) */
				_init_upload_control('Upload Avatar', 'musician_avatar', 'profile_avatar', '10', "'jpg', 'jpeg', 'png', 'gif'", 'imageUploaderLoader', 'img_musician_avatar', 'reg_avatar_path', 'musician_avatar_errorTxt');
				_init_upload_control('Upload a zone image', 'upload_zone', 'zone_image', '10', "'jpg', 'jpeg', 'png', 'gif'", 'imageUploaderLoader', 'img_zone', 'reg_zone_path', 'bill_board_errorTxt');
				
				/* hack to avoid preload close button */
				$('#cboxClose').attr('style', 'visibility: visible');
			}, 
			onCleanup: function() {
				/* hack to avoid preload close button */
				$('#cboxClose').attr('style', 'visibility: hidden');
				closeModelPopup();
			}
		}); /* Colorbox */ 
	}
}

/**
 * Validate Musician registration step 1
 */
function validateMusicianRegisterStep1(formId, fromStep, toStep) {
	var lr_zone_name = $.trim($("#lr_zone_name").val());
	var lr_full_name = $.trim($("#lr_full_name").val());
	var lr_email = $.trim($("#lr_email").val());
	var lr_confirm_email = $.trim($("#lr_confirm_email").val());
	var lr_password = $.trim($("#lr_password").val());
	var lr_confirm_password = $.trim($("#lr_confirm_password").val());
	var lr_gender = $("input:radio[id=lr_gender]:checked").length;
	var lr_dob_month = $.trim($("#lr_dob_month").val());
	var lr_dob_day = $.trim($("#lr_dob_day").val());
	var lr_dob_year = $.trim($("#lr_dob_year").val());
	var terms_of_Service = $("input:checkbox[id=terms_of_Service]:checked").length;
	
	var errorMessage = new Array();

	if(lr_zone_name == '') {
		errorMessage[0] = ['lr_zone_name_errorTxt', 'Please enter a Zone name'];
	}else if(!IsAlphaNumeric(lr_zone_name)) {
		errorMessage[0] = ['lr_zone_name_errorTxt', 'User name contains invalid characters'];
	} else if(24 < lr_zone_name.length) {
		errorMessage[0] = ['lr_zone_name_errorTxt', 'User name should be less than 24 characters'];
	} else if(0 == checkZoneNameAvalibility(lr_zone_name)) {
		errorMessage[0] = ['lr_zone_name_errorTxt', 'This Zone name is already taken'];
	}

	if(lr_full_name == '') {
		errorMessage[1] = ['lr_full_name_errorTxt', 'Please enter a Full Name'];
	}

	if(lr_email == '') {
		errorMessage[2] = ['lr_email_errorTxt', 'Please enter a valid email address'];
	} else if(!IsValidEmail(lr_email)) {
		errorMessage[2] = ['lr_email_errorTxt', 'Please enter a valid email address'];
	} else if(lr_email != lr_confirm_email) {
		errorMessage[2] = ['lr_confirm_email_errorTxt', 'Email and Confirm email does not match'];
	} else {
		$.ajax({
			type: 'POST', url: siteURL + '/isEmailAlreadyRegister.php', data: 'email=' + lr_email, async: false, cache: false,
			success:
				function(data) {
					if(1 == data) {
						errorMessage[2] = ['lr_email_errorTxt', 'Email address already registered'];
					}
				}
		});
	}

	if(lr_password == '') {
		errorMessage[3] = ['lr_password_errorTxt', 'Please enter a password'];
	}
	
	if(lr_password != lr_confirm_password) {
		errorMessage[4] = ['lr_confirm_password_errorTxt', 'Password and Confirm password does not match'];
	}

	if(0 == lr_gender) {
		errorMessage[5] = ['lr_gender_errorTxt', 'Select gender'];
	}
	
	if(0 == terms_of_Service) {
		errorMessage[6] = ['terms_of_Service_errorTxt', 'You must agree with Terms of Service'];
	}
	
	/* code for get current date */
	var date = new Date(); 
	var curr_year = date.getFullYear();
	if(lr_dob_month == '00') {
		errorMessage[7] = ['lr_dob_errorTxt', 'Please select Month']; 
	} else if(lr_dob_day == 'Day') {
		errorMessage[7] = ['lr_dob_errorTxt', 'Please enter Day']; 
	} else if( !(!isNaN(parseFloat(lr_dob_day)) && isFinite(lr_dob_day)) ) {
		errorMessage[7] = ['lr_dob_errorTxt', 'Please enter valid Day']; 
	} else if(lr_dob_day <= 0) {
		errorMessage[7] = ['lr_dob_errorTxt', 'Please enter valid Day']; 
	} else if(lr_dob_day > 31) {
		errorMessage[7] = ['lr_dob_errorTxt', 'Please enter valid Day']; 
	} else if(lr_dob_year == 'Year') {
		errorMessage[7] = ['lr_dob_errorTxt', 'Please enter Year']; 
	} else if( !(!isNaN(parseFloat(lr_dob_year)) && isFinite(lr_dob_year)) ) {
		errorMessage[7] = ['lr_dob_errorTxt', 'Please enter valid Year']; 
	} else if(lr_dob_year > curr_year || lr_dob_year < 1900) {
		errorMessage[7] = ['lr_dob_errorTxt', 'Please enter real year of birth'];
	} else if(lr_dob_year<= 0) {
		errorMessage[7] = ['lr_dob_errorTxt', 'Please enter Year']; 
	} else if(lr_dob_year.length <= 3) {
		errorMessage[7] = ['lr_dob_errorTxt', 'Please enter valid Year']; 
	} else if(lr_dob_year != '' || lr_dob_year != 'Year') {

		/* code for get current date */
		var date = new Date(); 
		var curr_date = date.getDate();
		var curr_month = date.getMonth();
		var curr_year = date.getFullYear();
		d2= curr_date + '/'+ curr_month + '/'+ curr_year;

		/* code for date compare */
		var d1, d2;
		d1 = new Date(lr_dob_year, lr_dob_month-1, lr_dob_day);
		d2 = new Date(curr_year, curr_month, curr_date);
		/* The number of milliseconds in one day */
		var ONE_DAY = 1000 * 60 * 60 * 24;
		/* Convert both dates to milliseconds */
		var date1_ms = d1.getTime();
		var date2_ms = d2.getTime();

		/* Calculate the difference in milliseconds */
		var difference_ms = Math.abs(date2_ms - date1_ms);
		var final_date_diff = (Math.round(difference_ms/ONE_DAY)) / 365;
		if(final_date_diff < 15) {
			errorMessage[7] = ['lr_dob_errorTxt', 'Birth Date must beat least 15 years of age'];
		}
	}
	
	if(0 == errorMessage.length) {
		toggle_form_steps(formId, fromStep, toStep);
		refreshCaptcha('captcha_image');
	} else {
		showErrorMessage(errorMessage);
	}
}

/**
 * Validate Musician registration step 2
 */
function validateMusicianRegisterStep2(formId, fromStep, toStep) {
	
	var errorMessage = new Array();
	
	var facebook_url = $.trim($("#lr_reg_facebook").val());
	var twitter_url = $.trim($("#lr_reg_twitter").val());
	var personal_website_url = $.trim($("#lr_personal_website").val());
	
	if( facebook_url != '' && facebook_url != 'http://' && !IsValidURL(facebook_url) ) {
		errorMessage[0] = ['lr_reg_facebook_errorTxt', 'Please enter valid URL'];
	}
	
	if( personal_website_url != '' && personal_website_url != 'http://' && !IsValidURL(personal_website_url) ) {
		errorMessage[1] = ['lr_personal_website_errorTxt', 'Please enter valid URL'];
	}
	
	if( twitter_url != '' && twitter_url != 'http://' && !IsValidURL(twitter_url) ) {
		errorMessage[2] = ['lr_reg_twitter_errorTxt', 'Please enter valid URL'];
	}

	if(0 == errorMessage.length) {
		/* Render step 2 form */
		toggle_form_steps(formId, fromStep, toStep);
	} else {
		showErrorMessage(errorMessage);
	}

}

/**
 * Validate Musician registration step 3
 */
function validateMusicianRegisterStep3(formId, fromStep, toStep) {
	var errorMessage = new Array();

	if(0 == errorMessage.length) {
		toggle_form_steps(formId, fromStep, toStep);
	} else {
		showErrorMessage(errorMessage);
	}
}

/**
 * Validate Musician registration step 4
 */
function validateMusicianRegisterStep4(formId, fromStep) {
	
	var lr_country = $("#lr_country").val();
	var lr_captcha = $("#lr_captcha").val();
	
	var errorMessage = new Array();

	if('' == lr_country) {
		errorMessage[0] = ['lr_country_errorTxt', 'Please select country'];
	}
	
	if('' == lr_captcha || 'Enter above text' == lr_captcha) {
		errorMessage[1] = ['lr_captcha_errorTxt', 'Please enter text'];
	} else if('' != lr_captcha) {
		$.ajax({
			type: 'POST', url: hostURL + '/validateCaptcha.php', data: 'captcha=' + lr_captcha, async: false, cache: false, 
			success:
				function(validateCaptcha) {
					if(0 == validateCaptcha) {
						errorMessage[2] = ['lr_captcha_errorTxt', 'Invalid text'];
					}
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) { }
		});
	}
	
	if(0 == errorMessage.length) {
		registerMusicianUser();
	} else {
		showErrorMessage(errorMessage);
	}
}

/**
 * Register Musician at DMMCompany
 */
function registerMusicianUser() {
	var default_intro_text = 'Please tell the public something intriguing around you.';
	
	/* Create User registration key : value array */
	var array = { 
		'reg_dmm_comp_name' : $.trim($('#lr_zone_name').val()),
		'reg_name' : $.trim($('#lr_full_name').val()),
		'reg_dob_month' : $.trim($('#lr_dob_month').val()),
		'reg_dob_day' : $.trim($('#lr_dob_day').val()),
		'reg_dob_year' : $.trim($('#lr_dob_year').val()),
		'reg_email' : $.trim($('#lr_email').val()),
		'reg_password' : $.trim($('#lr_password').val()),
		'reg_gender' : $('input:radio[id=lr_gender]:checked').val(),
		'reg_musician_type' : $.trim($('#lr_musician_type').val()),
		'reg_years_making_music' : $.trim($('#lr_years_making_music').val()),
		"reg_twitter" : ($.trim($("#lr_reg_twitter").val()) == 'http://') ? '' : $.trim($("#lr_reg_twitter").val()),
		"reg_facebook" : ($.trim($("#lr_reg_facebook").val()) == 'http://') ? '' : $.trim($("#lr_reg_facebook").val()),
		"reg_personal_website" : ($.trim($("#lr_personal_website").val()) == 'http://') ? '' : $.trim($("#lr_personal_website").val()),
		"reg_avatar_path" : $.trim($("#reg_avatar_path").val()),
		"reg_zone_path" : $.trim($("#reg_zone_path").val()),
		'reg_country' : $.trim($('#lr_country').val()),
		'reg_tell_us' : ($.trim($('#introtext').val()) == default_intro_text) ? '' : $.trim($('#introtext').val()),
		'user_type' : 'musician'
	};
	
	/* $.param() similar to http_build_query() */
	var dataString = $.param(array);

	$.ajax({
		type: 'POST', url: siteURL + '/regAddUser.php', data: dataString, async: false, cache: false, 
		success: 
			function(data) {
				if(0 != data) {
					$.cookie('NOTIFICATIONID', 'Welcome to DMMCompany...', { path: '/' });
					$.cookie('FIRSTVISIT', '1', { path: '/' });
					window.location = siteURL + "/" + data;
				} else {
					$.cookie('NOTIFICATIONID', 'Failed to register...', { path: '/' });
					window.location = siteURL;
				}
			},
		error: 
			function (XMLHttpRequest, textStatus, errorThrown) {
				$.cookie('NOTIFICATIONID', 'Server error !!!', { path: '/' });
				window.location = siteURL;
			}
	});
}

/**
 * Hide all colorbox
 */
function hideAll() {
	$('#cboxClose').click();
}

/**
 * Loads edit profile/account form
 */
function callEditAccount() {
	$('#notificationBox').hide();
	
	/* Load edit account page */
	$.colorbox({ 
		href: hostURL + '/edit_account.php', 
		width: '725px', 
		height: '750px', 
		transition: 'fade', 
		scrolling: false, 
		close: '', 
		opacity: 1, 
		overlayClose: false, 
		onLoad: function() {
			$('#cboxOverlay').addClass('settingsheader');
		},
		onComplete: function() {
			$('form').jqTransform();
			
			$('.billboardwrapper .image-preview').unbind('mouseover');
			$('.billboardwrapper .image-preview').unbind('mouseleave');
			if('' != $('#musi_edit_profile_zone_img').attr('src')) {
				/* Remove song image hover link binding */
				$('.billboardwrapper .image-preview').mouseover(function() {
					$('.remove-image').fadeIn(300);
				}).mouseleave(function() {
					$('.remove-image').hide();
				});
			}
			
			$('.comments p').click(function(){
				$('#musi_edit_notify_message').click();
			});
			
			/* Hide default text if have musician info */
			if( 0 != $.trim($('#musi_edit_musician_info').val()).length) {
				$('.placeholder-text.musi_edit_musician_info').hide();
			}
			
			/* On edit profile */
			$('#edit_profile #musi_edit_musician_info').bind('keyup', function() {
				/* Function to calculate remain text length */
				textCounter('edit_profile', 'musi_edit_musician_info', 578);
			});
			$('.number').html(578 - $('#edit_profile #musi_edit_musician_info').val().length);
			
			toggle_edit_profile_tabs();			
			
			/* _init_upload_control(buttonText, elementID, uploadType, uploadSize, allowedExtensions, imageUploaderID, imgPreviewID, hiddenFieldID, errorTxtClass) */
			
			/*_init_upload_control('Choose an image', 'musi_edit_profile_zone', 'zone_image', '10', "'jpg', 'jpeg', 'png', 'gif'", 'imguploader', 'musi_edit_profile_zone_img', 'musi_edit_zoneimage_path', 'musi_edit_zoneimage_errorTxt');*/
			
			var uploader = new qq.FileUploader({
				element: document.getElementById('musi_edit_profile_zone'),
				action: hostURL + '/ajax_upload.php?type=zone_image&upload_size=10',
				name: 'uphoto',
				params: {'buttonText' : 'Choose an image'},
				allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
				onSubmit: function(id, fileName){
					$('#imguploader').show();
				},
				onComplete: function(id, fileName, responseJSON){
					if(1 == responseJSON.status) {
						$('#musi_edit_profile_zone_img').load(function() { 
							$('#imguploader').hide();
							$('.billboardwrapper .image-preview p').css('display', 'none');
							$('#musi_edit_profile_zone_img').css('display', 'block');
							
							$('.billboardwrapper .image-preview').unbind('mouseover');
							$('.billboardwrapper .image-preview').unbind('mouseleave');
							/* Remove song image hover link binding */
							$('.billboardwrapper .image-preview').mouseover(function() {
								$('.remove-image').fadeIn(100);
							}).mouseleave(function() {
								$('.remove-image').hide();
							});
						}).attr('src', responseJSON.path);

						$('#musi_edit_zoneimage_path').val(responseJSON.path);
					} else if(0 == responseJSON.status) {
						$('#imguploader').hide();
						show_validation_message('', 'musi_edit_zoneimage_errorTxt', responseJSON.error);
					}
				},
				messages: {
					typeError: 'Only JPG, PNG or GIF files are allowed'
				},
				showMessage: function(message){
					show_validation_message('', 'musi_edit_zoneimage_errorTxt', message);
					$('#imguploader').hide();
				}
			});
			
			
			
			/* hack to avoid preload close button */
			$('#cboxClose').attr('style', 'visibility: hidden');
			
			/* state your purpose */
			$('#stateyourpurposepopup .scroll-pane').jScrollPane({verticalDragMinHeight:135,verticalDragMaxHeight:135,maintainPosition:false});
			$('#stateyourpurposepopup').css('display', 'none');
			$('#stateyourpurposepopup').addClass('modelPopupWindow');
			$('#stateyourpurposepopup').addClass('alertmessagebox');
			/* state your purpose */
		}, 
		onCleanup: function() {
			/* hack to avoid preload close button */
			$('#cboxClose').attr('style', 'visibility: hidden');
		}
	}); /* colorbox */
}

/**
 * Loads edit account/profile form
 */
function editListenerAccount() {
	$('#notificationBox').hide();
	
	/* Load edit listener account page */
	$.colorbox({ 
		href: hostURL + '/edit_account.php', 
		width: '700px', 
		height: '510px', 
		transition: 'fade', 
		scrolling: false, 
		close: '', 
		opacity: 1, 
		overlayClose: false, 
		onComplete: function() {
			$('form').jqTransform();
			toggle_edit_profile_tabs();		
			/* _init_upload_control(buttonText, elementID, uploadType, uploadSize, allowedExtensions, imageUploaderID, imgPreviewID, hiddenFieldID, errorTxtClass) */
			_init_upload_control('Upload Avatar', 'list_edit_avatar', 'profile_avatar', '10', "'jpg', 'jpeg', 'png', 'gif'", 'imageUploaderLoader', 'edit_avatar_image', 'list_edit_avatar_path', 'list_edit_avatar_errorTxt');
			
			/* hack to avoid preload close button */
			$('#cboxClose').attr('style', 'visibility: visible');
			
		}, 
		onCleanup: function() {
			/* hack to avoid preload close button */
			$('#cboxClose').attr('style', 'visibility: hidden');
		}
	}); /* colorbox */
}

/**
 * Save listener profile values
 */
function submitListenerProfile() {
	/* stop and clear all previous animation */
	$('.errorImg').stop(true, true);
	$('.errorTxt').stop(true, true);

	/* Hide if any previous error image/text after data correction if any */
	$('.errorImg').hide();
	$('.errorTxt').hide();
	
	var isValidData = 1;
	
	/* Create User registration key : value array */
	if($.trim($("#list_edit_email").val()) == '') {
		show_validation_message('', 'list_edit_email_errorTxt', 'Please enter a valid email address');
		isValidData = 0;
	} else if(!IsValidEmail($.trim($("#list_edit_email").val()))) {
		show_validation_message('', 'list_edit_email_errorTxt', 'Please enter a valid email address');
		isValidData = 0;
	}
	
	if($.trim($("#list_edit_email").val()) != $.trim($("#list_edit_confirm_email").val())) {		
		show_validation_message('', 'list_edit_confirm_email_errorTxt', 'Email and Confirm email does not match');
		isValidData = 0;
	}

	if(($.trim($("#list_edit_password").val()) != $.trim($("#list_edit_confirm_password").val())) ) {
		show_validation_message('', 'list_edit_confirm_password_errorTxt', 'Password and Confirm password does not match');
		isValidData = 0;
	}

	if(1 == isValidData) {
		var array = {
			"edit_dmm_password" : $.trim($("#list_edit_password").val()),
			"edit_dmm_email" : $.trim($("#list_edit_email").val()),
			"edit_dmm_twitter" : '',
			"edit_dmm_facebook" : '',
			"edit_personal_website" : '',
			"musician_type" : '',
			"lr_years_making_music" : '',
			"lr_country" : '',
			"edit_dmm_musician_info" : '',
			"edit_dmm_avtarImage_path" : $.trim($("#list_edit_avatar_path").val()),
			"edit_dmm_zone_path" : '',
			"notify_message" : ''
		};
		
		/* $.param() similar to http_build_query() */
		var dataString = $.param(array);
		
		$.ajax({
			type: "POST", 
			url: hostURL + "/saveEditProfile.php", 
			data: dataString, 
			async: false, 
			cache: false, 
			success: 
				function(data)  {
					$.colorbox.close();
					if(-999 == data) {
						$.cookie('PROFILENOTUPDATED', 'You have not made any changes to your account', { path: '/' });
						$.colorbox.close();
						showNotificationMessage();
					} else if(1 == data) {
						$.cookie('PROFILEUPDATED', 'Changes saved successfully', { path: '/' });
						window.location.href = window.location.pathname;
					} else {
						$.cookie('NOTIFICATIONID', 'Invalid User', { path: '/' });
						window.location.href = window.location.pathname;
					}
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) {
					$.cookie('NOTIFICATIONID', 'Connection timeout...', { path: '/' });
					window.location.href = window.location.pathname;
				}
		});
	}
}

/**
 * Calculate text length
 */
function textCounter(formID, fieldID, maxlimit) {
	var text = $('#' + formID + ' #' + fieldID).val();
	if( text.length > maxlimit) {
		$('#' + formID + ' #' + fieldID).val(text.substring(0, maxlimit));
	} else {
		$('#' + formID + ' .number').html(maxlimit - text.length);
	}
}

/*function formPost(geresFile){								
	$("#hGenresXMLFile").val(geresFile);
	document.frm1.submit();
}*/

/*function showDetails(sIndex){
	var hiddenId = "#hidden" + sIndex;
	var songId = $.trim($(hiddenId).val());				
	if(parseInt(songId)>0){
		var dataString = "songId=" + songId;
		$.ajax({   									
				type: "POST", url: $("link[rel='canonical']").attr("href") + "/getSongDetailsAjax.php", data: dataString,   
				success: 
					function(data) { 								
						$("#songDetailsDiv").hide();		
						$("#songDetailsDiv").html(data);																													
						if($.trim($("#songDetailsDiv").html())!=""){
							var liId = "#jp_playlist_2_item_" + sIndex;
							var p = $(liId);
							var position = p.position();
							var leftPos = parseInt(position.left);
							var topPos = parseInt(position.top);				
							$('#songDetailsDiv').css("left", (leftPos+150));
							$('#songDetailsDiv').css("top", "-295");				
							$("#songDetailsDiv").fadeIn('slow');	
						}
						return false;
					},
				error: 
					function (XMLHttpRequest, textStatus, errorThrown) {
						$("#songDetailsDiv").html('Timeout contacting server..');
					}
			}
		)
	}															
}*/

/*function hideDetails(sIndex){
	$("#songDetailsDiv").fadeOut('slow');
}*/

/*function showComment(){
	$("#addComment").toggle('slow', function(){
			if(($("#addComment").css("display"))=="block"){$("#txtComemnt").focus();}
		} );
}*/

/*function loadMoreComments(){
	var dataString = "songId=" + $.trim($("#songId").val()) + "&top=" + $.trim($("#top").val());								
	$("#songCommentsDiv").load($("link[rel='canonical']").attr("href") + "commentLoaderAjax.php");
	$.ajax({   									
			type: "POST", url: $("link[rel='canonical']").attr("href") + "/songCommentsAjax.php", data: dataString,   
			success: 
				function(data){ 								
					$("#songCommentsDiv").html(data);																				
					$("#songCommentsDiv").fadeIn('slow');
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) {
					$("#songCommentsDiv").html('Timeout contacting server..');								
				}
		}
	)
}*/

/**
 * Function to sumbit comment
 */
function commentSubmit() {
	/* Create query string key : value array */
	var array = { 
		"songId" : $.trim($("#hid_songid").val()),
		"comment" : $.trim($("#txtcommentbox").val())
	};
		
	/* $.param() similar to http_build_query() */
	var dataString = $.param(array);
	
	$.ajax({
		type: 'POST', 
		url: hostURL + '/saveCommentAjax.php', 
		data: dataString, 
		success: 
			function(data) {
				if(data == 'insert successfully') {
					$('#txtcommentbox').val('');
					$('#forLoginBox').children('.data').html('Sent! Your comment will be posted to this song.');
					$('.charCount').html(320);
					$('#forLoginBox').fadeIn(400);
					$('#forLoginBox').delay(5000).fadeOut(400);
				}
				$('.btnSubmit').slideUp();
				$('.btnMessMusicianSubmit').slideUp();
				return false;
			},
		error: 
			function (XMLHttpRequest, textStatus, errorThrown) {
				$('#songCommentsDiv').html('Timeout contacting server..');
			}
	});
}

function messMusicianSubmit(field,cntfield,maxlimit,songId) {
	var dataString = "songId=" + songId + "&comment=" + field.value;	
	$.ajax({   									
			type: "POST", url: $("link[rel='canonical']").attr("href") + "/messageMusicianAjax.php", data: dataString,   
			success: 
				function(data) { 	
				if(data == 'sent successfully'){
						field.value = "";
						$('#forLoginBox').children(".data").html("You have just messaged this musician");
						$('.charCount').html(320);
						$('#forLoginBox').fadeIn(400);
						$('#forLoginBox').delay(5000).fadeOut(400);
					}
					$('.btnSubmit').slideUp();
					$('.btnMessMusicianSubmit').slideUp();
					return false;
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) {
					$("#songCommentsDiv").html('Timeout contacting server..');
				}
		}
	)

}

/**
 * Call validateUserLogin() if ENTER key is press
 */
function submitLoginForm(evt) {
	evt = (evt) ? evt : ((window.event) ? window.event : "")
	
	if (evt) {
		if ( evt.keyCode == 13 || evt.which == 13 ) {
		   validateUserLogin();
		   return false;
		} else {
			return true;
		}
	}
}
	
/**
 * Validate User Login 
 */
function validateUserLogin() {
	var txtUserName = $.trim($('#txtUserName').val());
	var txtPassword = $.trim($('#txtPassword').val());
	var remember_me = $("input:checkbox[id=chkbox_remember_me]:checked").length;

	if(txtUserName == '') {
		$('#txtUserName').focus();
		$('#err_user_login').html('You must enter Zone name/User name');	
		$('#err_user_login').stop().fadeIn(100);
		$('#err_user_login').delay(5000).fadeOut(100);
		return false;				
	}
	
	if(txtPassword == '') {
		$('#txtPassword').focus();
		$('#err_user_login').html('Please enter Password');
		$('#err_user_login').stop().fadeIn(100);
		$('#err_user_login').delay(5000).fadeOut(100);
		return false;				
	}

	var array = { 
		'txtUserName' : txtUserName, 'txtPassword' : txtPassword, 'remember_me' : remember_me
	};
	
	/* $.param() similar to http_build_query() */
	var dataString = $.param(array);
	
	$.ajax({
		type: 'POST', 
		url: hostURL + '/validateLogin.php', 
		data: dataString, 
		success: 
			function(data) {
				if(1 == data) {
					$('#err_user_login').html('Invalid user');
					$('#err_user_login').stop().fadeIn(100);
					$('#err_user_login').delay(5000).fadeOut(100);
					return false;
				} else if(2 == data) {
					$('#err_user_login').html('Invalid password');
					$('#err_user_login').stop().fadeIn(100);
					$('#err_user_login').delay(5000).fadeOut(100);
					return false;
				} else if(3 == data) {
					/* If user is a listener type redirect to main page */
					window.location = $("link[rel='canonical']").attr('href');
				} else {
					/* If user is a musician type redirect to zone page */
					window.location = $("link[rel='canonical']").attr('href') + '/' + data;
				}
			},
		error: 
			function (XMLHttpRequest, textStatus, errorThrown) {
				$('#songCommentsDiv').html('Timeout contacting server..');
			}
		}
	)
	return false;
}


/**
 * Call validateUserLogin() if ENTER key is press for Welcome screen login block
 */
function submitLoginForm2(evt) {
	evt = (evt) ? evt : ((window.event) ? window.event : "")
	
	if (evt) {
		if ( evt.keyCode == 13 || evt.which == 13 ) {
		   validateUserLogin2();
		   return false;
		} else {
			return true;
		}
	}
}

/**
 * Validate User Login2 (Welcome screen login block)
 */
function validateUserLogin2() {
	var txtUserName = $.trim($('#txtUserName2').val());
	var txtPassword = $.trim($('#txtPassword2').val());
	var remember_me = $("input:checkbox[id=chkbox_remember_me2]:checked").length;
	
	if(txtUserName == '') {
		$('#txtUserName2').focus();
		$('#err_user_login2').html('You must enter Zone name/User name');
		$('#err_user_login2').stop().fadeIn(100);
		$('#err_user_login2').delay(5000).fadeOut(100);
		return false;				
	}
	
	if(txtPassword == '') {
		$('#txtPassword2').focus();
		$('#err_user_login2').html('Please Enter Password');
		$('#err_user_login2').stop().fadeIn(100);
		$('#err_user_login2').delay(5000).fadeOut(100);
		return false;				
	}

	var array = { 
		'txtUserName' : txtUserName, 'txtPassword' : txtPassword, 'remember_me' : remember_me
	};
	
	/* $.param() similar to http_build_query() */
	var dataString = $.param(array);
	$.ajax({
		type: 'POST', 
		url: hostURL + '/validateLogin.php', 
		data: dataString, 
		success: 
			function(data) {
				if(1 == data) {
					$('#err_user_login2').html('Invalid user');
					$('#err_user_login2').stop().fadeIn(100);
					$('#err_user_login2').delay(5000).fadeOut(100);
					return false;
				} else if(2 == data) {
					$('#err_user_login2').html('Invalid password');
					$('#err_user_login2').stop().fadeIn(100);
					$('#err_user_login2').delay(5000).fadeOut(100);
					return false;
				}  else if(3 == data) {
					/* If user is a listener type redirect to main page */
					window.location = $("link[rel='canonical']").attr('href');
				} else {
					/* If user is a musician type redirect to zone page */
					window.location = $("link[rel='canonical']").attr('href') + '/' + data;
				}
			},
		error: 
			function (XMLHttpRequest, textStatus, errorThrown) {
				$('#songCommentsDiv').html('Timeout contacting server..');
			}
		}
	)
	return false;
}

/*function changeReview(){
	var dataString = "song_id=" + $("#hid_songid").val();
	$.ajax({   									
			type: "POST", url: $("link[rel='canonical']").attr("href") + "/musicReview.php", data: dataString,   
			success: 
				function(data) { 
					$("#inline_example3").html(data);
					return true;
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) {
					$("#songCommentsDiv").html('Timeout contacting server..');
				}
		}
	)
}*/

/*function redirect(){
var song_id = $("#hid_songid").val();
var dataString = "song_id=" + song_id;
	$.ajax({   									
			type: "POST", url: $("link[rel='canonical']").attr("href") + "/redirect_musician.php", data: dataString,   
			success: 
				function(data) { 
					if(data){
						window.location = $("link[rel='canonical']").attr("href") + "/" + data;
					}
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) {
					$("#songCommentsDiv").html('Timeout contacting server..');
				}
		}
	)
}*/

function download(){
	var dataString = "song_id=" + $("#hid_songid").val();
	$.ajax({   									
			type: "POST", url: $("link[rel='canonical']").attr("href") + "/checkSongDownload.php", data: dataString,   
			success: 
				function(data) { 
					if(data == 'can download'){
						window.location.href = $("link[rel='canonical']").attr("href") + "/songsDownload.php?"+dataString;
					}
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) {
					$("#songCommentsDiv").html('Timeout contacting server..');
				}
		}
	)
}

/*function advSubmit(){
	var adv_name_str = "";
	var adv_res_party_str = "";
	var adv_add_path_str = "";
	var adv_name_flag = 0;
	var adv_add_path_flag = 0;
	for(var i=0; i < document.upload_adv.adv_name.length; i++){
		if(dotrim(document.upload_adv.adv_name[i].value) != ""){
			adv_name_flag = 1;
		}
		if ((i+1) == document.upload_adv.adv_name.length){
			adv_name_str += dotrim(document.upload_adv.adv_name[i].value);
		}
		else{
			adv_name_str += dotrim(document.upload_adv.adv_name[i].value)+",";
		}
	}
	for(var j=0; j < document.upload_adv.adv_res_party.length; j++){
		if ((j+1) == document.upload_adv.adv_res_party.length){
			adv_res_party_str += dotrim(document.upload_adv.adv_res_party[j].value);
		}
		else{
			adv_res_party_str += dotrim(document.upload_adv.adv_res_party[j].value)+",";
		}
	}
	for(var k=0; k < document.upload_adv.adv_add_path.length; k++){
		if(dotrim(document.upload_adv.adv_add_path[k].value) != ""){
			adv_add_path_flag = 1;
		}
		if ((k+1) == document.upload_adv.adv_add_path.length){
			adv_add_path_str += dotrim(document.upload_adv.adv_add_path[k].value);
		}
		else{
			adv_add_path_str += dotrim(document.upload_adv.adv_add_path[k].value)+",";
		}
	}

	var flag = 0;
	if(adv_name_str==",,,"){
		$('#add_adv_content').children().children().children().children().children().children().children('.err_adv_add_title').html("Please enter a Title for your Ad");
		$('#add_adv_content').children().children().children().children().children().children().children('.err_adv_add_title').fadeIn(400);
		$('#add_adv_content').children().children().children().children().children().children().children('.err_adv_add_title').delay(5000).fadeOut(400);
		flag = 1;
	}
	else if(adv_add_path_str==",,,"){
		$('#add_adv_content').children().children().children().children().children().children('.err_adv_add_file').html("Please upload an image or ZIP file");
		$('#add_adv_content').children().children().children().children().children().children('.err_adv_add_file').fadeIn(400);
		$('#add_adv_content').children().children().children().children().children().children('.err_adv_add_file').delay(5000).fadeOut(400);
		flag = 1;
	}	
	if(flag == 0){
		var dataString = "adv_name=" + adv_name_str + "&adv_add_path=" + adv_add_path_str + "&adv_res_party=" + adv_res_party_str;	
		$.ajax({   									
				type: "POST", url: $("link[rel='canonical']").attr("href") + "/saveAdvertiseAjax.php", data: dataString,
				success: 
					function(data){ 	
						var dataMsg = data.substr(0,data.indexOf(":"));
						var addsCount = data.substr(data.indexOf(":")+1);
						var addsCount1 = addsCount.substr(0,addsCount.indexOf(":"));
						if(dataMsg == 'adv insert successfully'){
								$('#add_adv_content').each(function(index) {
								$('#add_adv_content').children(index).children().children().children().children('.adv_name').val("");
								$('#add_adv_content').children(index).children().children().children().children('.adv_add_path').val("");
								$('#add_adv_content').children(index).children().children().children().children('.adv_res_party').val("");
							});
							$.colorbox.close();
							$(".lftIcons").children().children().children(".notification").children("span").html(addsCount1);
							$(".lftIcons").children().children().children(".notification").removeClass("adStatusPopup").addClass("adStatusPopup");
							$(".lftIcons").children().children().children(".notification").removeAttr("onclick");
							var dataString1 = "";	
							$.ajax({   									
									type: "POST", url: $("link[rel='canonical']").attr("href") + "/advAdd.php", data: dataString1,
									success: 
										function(data){ 	
											$('#advAddMain').html(data);
										},
									error: 
										function (XMLHttpRequest, textStatus, errorThrown){																		
										}
								}
							)
							var dataString2 = "";	
							$.ajax({   									
									type: "POST", url: $("link[rel='canonical']").attr("href") + "/addStatus.php", data: dataString2,
									success: 
										function(data){ 	
											$('#addStatusMain').html(data);
										},
									error: 
										function (XMLHttpRequest, textStatus, errorThrown){																		
										}
								}
							)
							$('#forLoginBox').children(".data").html("Sent! Check Ad status below for updates.");
							$('#forLoginBox').fadeIn(400);
							$('#forLoginBox').delay(5000).fadeOut(400);
							return true;
						}
						else{
							$("#errMsg").html("Invalid User");
							return false;
						}
					},
				error: 
					function (XMLHttpRequest, textStatus, errorThrown){
						$("#songCommentsDiv").html('Timeout contacting server..');
					}
			}
		)
	}
	return false;
}*/

function forLogin() {
	$('#forLoginBox').children('.data').html('Oops! It looks like you’re not signed in. Please register or sign in for complete access.');
	$('#forLoginBox').fadeIn(400);
	$('#forLoginBox').delay(5000).fadeOut(400);
}

/**
 * To Subscribe/UnSubscribe notify when musician upload new music/video
 */
var notifySubscribeTimer;
function notifyMeSubscribe() {

	$('#zoneimagetips').css('visibility', 'hidden');
	$('#upgradezonetip').css('visibility', 'hidden');
	$('#musicfeaturetip').css('visibility', 'hidden');
	$('#zonetipsoutterwrap').css('display', 'none');
	
	$('.alertmessagebox').hide();
	clearTimeout(alertTimer);
	
	$('#notifyactivated').hide();
	$('#cancelnotify').hide();
	

	var currentNotifyStatus = $('#notifyMeSubscribe span').hasClass('on');
	var url;

	if(currentNotifyStatus) {
		url = siteURL + '/notify.php?set_notify=0&remove_notify=1';
	} else {
		url = siteURL + '/notify.php?set_notify=1&remove_notify=0';
	}

	$.ajax({
        cache: false,
		type: "POST",
		url: url,
		data: "song_id=" + $.trim($("#hid_songid").val()) + "&musician_name=" + $.trim($("#musician_name").val()),
		success:
			function(data){
				if(-1 == data){
					$('#notifyalertbox').show();
					alertTimer = setTimeout("$('#notifyalertbox').hide()", 7000);
				}
				else if(-2 == data){
					$('#selfnotify').show();
					alertTimer = setTimeout("$('#selfnotify').hide()", 7000);
				}
				else if(1 == data){
					var artist_name = myPlaylist.playlist[myPlaylist.current].artist_name;
					if(currentNotifyStatus) {
						$('#notifyMeSubscribe span').removeClass('on');
						$('#notifyMeSubscribe .notify').attr('original-title', 'Track ' + artist_name);
						$('#cancelnotify p').html('You will nolonger be notified when <strong>' + artist_name + '</strong> posts new music of video. Click the Notify button to revert.');
						$('#cancelnotify').show();
						alertTimer = setTimeout("$('#cancelnotify').hide()", 7000);
					} else {
						$('#notifyMeSubscribe span').addClass('on');
						$('#notifyMeSubscribe .notify').attr('original-title', 'Untrack ' + artist_name);
						$('#notifyactivated p').html('You will now be notified when <strong>' + artist_name + '</strong> posts new music and videos.');
						$('#notifyactivated').show();
						alertTimer = setTimeout("$('#notifyactivated').hide()", 7000);
					}
				}
			},
		error:
			function (XMLHttpRequest, textStatus, errorThrown) {
			}
	});
}

/* Close notify on alert */
function notifySubscribeClose() {
	$('#notifyactivated').toggle();
}

/* Close notify remove alert */
function notifyCancelClose() {
	$('#cancelnotify').toggle();
}

/* Close notify remove alert */
function notifyAlertClose() {
	$('#notifyalertbox').toggle();
}

function closeSelfNotify() {
	$('#selfnotify').hide();
}


/**
 * Update Musician profile
 */
function submitProfile() {
	/* stop and clear all previous animation */
	$('.errorImg').stop();
	$('.errorTxt').stop();

	/* Hide if any previous error image/text after data correction if any */
	$('.errorImg').hide();
	$('.errorTxt').hide();
	
	var isValidData = 1;
	/* Create User registration key : value array */
	if($.trim($("#musi_edit_email").val()) == '') {
		show_validation_message('', 'musi_edit_email_errorTxt', 'Please enter a valid email address');
		isValidData = 0;
	} else if(!IsValidEmail($.trim($("#musi_edit_email").val()))) {
		show_validation_message('', 'musi_edit_email_errorTxt', 'Please enter a valid email address');
		isValidData = 0;
	}
	
	if(!IsValidEmail($.trim($("#musi_edit_confirm_email").val()))) {
		show_validation_message('', 'musi_edit_confirm_email_errorTxt', 'Please enter a valid email address');
		isValidData = 0;
	}
	else if($.trim($("#musi_edit_email").val()) != $.trim($("#musi_edit_confirm_email").val())) {		
		show_validation_message('', 'musi_edit_confirm_email_errorTxt', 'Email and Confirm email does not match');
		isValidData = 0;
	}
	
	if(($.trim($("#musi_edit_password").val()) != $.trim($("#musi_edit_confirm_password").val())) ) {
		show_validation_message('', 'musi_edit_confirm_password_errorTxt', 'Password and Confirm password does not match');
		isValidData = 0;
	}

	if(1 == isValidData) {
		var array = {
			'edit_dmm_password' : $.trim($('#musi_edit_password').val()),
			'edit_dmm_email' : $.trim($('#musi_edit_email').val()),
			'edit_dmm_twitter' : $.trim($('#musi_edit_twitter').val()),
			'edit_dmm_facebook' : $.trim($('#musi_edit_facebook').val()),
			'edit_personal_website' : $.trim($('#musi_edit_personal_website').val()),
			'musician_type' : $.trim($('#musi_edit_musician_type').val()),
			'lr_years_making_music' : $.trim($('#musi_edit_years_making_music').val()),
			'lr_country' : $.trim($('#musi_edit_country').val()),
			'edit_dmm_musician_info' : $.trim($('#musi_edit_musician_info').val()),
			/*'edit_dmm_avtarImage_path' : $.trim($('#musi_edit_avtarImage_path').val()),*/
			'edit_dmm_zone_path' : $.trim($('#musi_edit_zoneimage_path').val()),
			'notify_message' : ($('#musi_edit_notify_message').is(':checked')) ? 1 : 0
		};
		
		/* $.param() similar to http_build_query() */
		var dataString = $.param(array);
		
		$.ajax({
			cache: false, 
			async: false, 
			type: "POST", 
			url: hostURL + "/saveEditProfile.php", 
			data: dataString, 
			success: 
				function(data) {		
					if(-999 == data) {
						$.cookie('PROFILENOTUPDATED', 'You have not made any changes to your account', { path: '/' });
						$.colorbox.close();
						showNotificationMessage();
					} else if(1 == data) {
						$.cookie('PROFILEUPDATED', 'Changes saved successfully', { path: '/' });
						window.location.href = window.location.pathname;
					} else {
						$.cookie('NOTIFICATIONID', 'Invalid User', { path: '/' });
						window.location.href = window.location.pathname;
					}
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) {
					$.cookie('NOTIFICATIONID', 'Server error !!!', { path: '/' });
					window.location.href = window.location.pathname;
				}
		});
	}
}

/*function checkStatus() {
	$('#forLoginBox').children(".data").html("At least one song must be published to view its status.");
	$('#forLoginBox').fadeIn(400);
	$('#forLoginBox').delay(5000).fadeOut(400);
}*/

/*function advStatus(){
	$('#forLoginBox').children(".data").html("At least one advertistement must be published to view its status.");
	$('#forLoginBox').fadeIn(400);
	$('#forLoginBox').delay(5000).fadeOut(400);
}*/

/*function backToLogin(){
	$('#loginSec').animate({ marginLeft: '0px'},500,function(){ });
}*/

/**
 * Toggle default text on welcome screen
 */
function toggle_zone_name_default_text() {
	var zone_name = $.trim($('#welcomeRegistrationForm #zone_name').val());
	if('' == zone_name) {
		$('#welcomeRegistrationForm #zone_name').val('Musician, band, company');
		$('#welcomeRegistrationForm #zone_name_error_message').html('');
	} else if("Musician, band, company" == zone_name) {
		$('#welcomeRegistrationForm #zone_name').val('');
		$('#welcomeRegistrationForm #zone_name_error_message').html('');
	}
}

/**
 * Check user name is available or not
 * Retuen 1 if user name is available else return 0
 */
function checkZoneNameAvalibility(zone_name) {
	var dataString = 'reg_dmm_comp_name=' + zone_name;
	var status;
	$.ajax({
			type: 'POST', url: hostURL + '/regCheckUser.php', data: dataString, async: false, cache: false, 
			success:
				function(isAvailable) {
					if(1 == isAvailable) { status = 1; } 
					else { status = 0; }
				}
	});
	return status;
}				

/**
 * Check wheather Zone name is available or not
 */
function isZoneNameAvaliable() {
	var zone_name = $.trim($('#welcomeRegistrationForm #zone_name').val());
	var dataString = 'reg_dmm_comp_name=' + zone_name;
	if(zone_name.length < 1) {
		$('#welcomeRegistrationForm #zone_name_error_message').removeClass();
		$('#welcomeRegistrationForm #zone_name_error_message').addClass('tooshort');
		$('#welcomeRegistrationForm #zone_name_error_message').html('This Zone name is too short, enter atleast 4 charcter long Zone name.');
	} else {
		var isZoneNameAvaliable = checkZoneNameAvalibility(zone_name);
		if(1 == isZoneNameAvaliable) {
			$('#welcomeRegistrationForm #zone_name_error_message').removeClass();
			$('#welcomeRegistrationForm #zone_name_error_message').html('');
		} else {
			$('#welcomeRegistrationForm #zone_name_error_message').removeClass();
			$('#welcomeRegistrationForm #zone_name_error_message').addClass('notavailable');
			
			$('#welcomeRegistrationForm #zone_name_error_message').html('This Zone name is already taken.');
		}
	}
}

/**
 * Refresh CAPTCHA image
 */
function refreshCaptch() {
	document.getElementById('captcha_image').src = hostURL + '/inc/captcha/captcha.php?time=' + Math.random();
}

function refreshCaptcha(elementID) {
	document.getElementById(elementID).src = hostURL + '/inc/captcha/captcha.php?time=' + Math.random();
}

/**
 * Toggle edit account/profile tabs
 */
function toggle_edit_profile_tabs() {
	/* Hide all tab */
	$('#edit_profile .upperLinks ul li').each(function (i) {
		var div_id = $(this).attr('id');
		$(div_id).css('display', 'none');
	});
	
	/* Show only first tab */
	var first_tab = $('#edit_profile .upperLinks ul li:first').attr('id');
	$(first_tab).css('display', 'block');
	
	/* On click of tab */
	$('#edit_profile .upperLinks ul li').click(function() {
		var clicked_tab = $(this).attr('id');
		
		/* Hide all tab */
		$('#edit_profile .upperLinks ul li').each(function (i) {
			var div_id = $(this).attr('id');
			$(this).removeClass('selected');
			$(div_id).css('display', 'none');
		});
		
		/* Show only clicked tab */
		$(clicked_tab).css('display', 'block');
		$(this).addClass('selected');
	});
}

/**
 * Loads Video pop-up from welcome screen
 */
function loadVideoPopup(popupdivID, videoDivID, height, width, videoId) {
	$("#jquery_jplayer_1").jPlayer("pause");
	$('.contentBoxMain').cycle("pause");
	loadModelPopupWithMask('dialogVideoPopup', 'center');
	
	var iframeSrc = 'http://www.youtube.com/embed/' + videoId + '?rel=0;showinfo=0;controls=1;autoplay=1;iv_load_policy=3';
	var iframe = '<iframe width="' + width + 'px" height="' + height + 'px" src="' + iframeSrc + '" frameborder="0" allowfullscreen></iframe>';
	
	$('#' + popupdivID + ' #' + videoDivID).html(iframe);
}

function openYouTubeVideoPopUp(popupdivID, videoDivID, height, width, videoId) {
	$("#jquery_jplayer_1").jPlayer("pause");
	loadModelPopupWithMask(popupdivID, 'center');
	
	var iframeSrc = 'http://www.youtube.com/embed/' + videoId + '?rel=0;showinfo=0;controls=1;autoplay=1;iv_load_policy=3';
	var iframe = '<iframe width="' + width + 'px" height="' + height + 'px" src="' + iframeSrc + '" frameborder="0" allowfullscreen></iframe>';
	$('#' + popupdivID + ' #' + videoDivID).html(iframe);
	
}

function closeYouTubeVideoPopUp(popupdivID, videoDivID) {
	$('#' + popupdivID + ' #' + videoDivID).html('');
	$('.popupMask').hide(); $('.modelPopupWindow').hide();
	
	/* play main interface player only if it is not pause by user */
	if( '' == $.cookie('FORCEPAUSE') || null == $.cookie('FORCEPAUSE') ) {
		$.cookie('FORCEPAUSE', null, { path: '/' });
		$("#jquery_jplayer_1").jPlayer("play");
	}
}

$(window).resize(function () {
	
	setZoneTipsPosition();
	
	if($('#dialogVideoPopup').is(':visible')) {
		loadVideoPopup();
	}
	else if($('#dialogUserLogin1').is(':visible')) {
		loadLoginScreen('resize');
	}
	else if($('#dialogUserLogin2').is(':visible')) {
		loadWelcomeLoginPopup('resize');
	}
	else if($('#dialogForgotPassword').is(':visible')) {
		loadForgotPasswordScreen('resize');
	}
	else if($('#dialogUploadSong').is(':visible')) {
		loadModelPopupWithMask('dialogUploadSong', 'center');
	}
	else if($('#listenerRegVideoPopup').is(':visible')) {
		loadModelPopupWithMask('listenerRegVideoPopup', 'center');
	}
	else if($('#musicianRegVideoPopup').is(':visible')) {
		loadModelPopupWithMask('musicianRegVideoPopup', 'center');
	}
	else if($('#listenerEditProVideoPopup').is(':visible')) {
		loadModelPopupWithMask('listenerEditProVideoPopup', 'center');
	}
	else if($('#songSettingsVideoPopup').is(':visible')) {
		loadModelPopupWithMask('songSettingsVideoPopup', 'center');
	}
	else if($('#dialogAddSongImage').is(':visible')) {
		loadModelPopupWithMask('dialogAddSongImage', 'default');
	}
	else if($('#dialogAttacheVideo').is(':visible')) {
		loadModelPopupWithMask('dialogAttacheVideo', 'default');
	}
	else if($('#dialogSongDownloadConfirm').is(':visible')) {
		loadModelPopupWithMask('dialogSongDownloadConfirm', 'default');
	}
	else if($('#dialogSongPreview').is(':visible')) {
		loadModelPopupWithMask('dialogSongPreview', 'default');
	}
	else if($('#dialogDeleteSong').is(':visible')) {
		loadModelPopupWithMask('dialogDeleteSong', 'default');
	}
	else if($('#dialogSongCredit').is(':visible')) {
		loadModelPopupWithMask('dialogSongCredit', 'default');
	}
	else if($('#dialogSongGuide').is(':visible')) {
		loadModelPopupWithMask('dialogSongGuide', 'default');
	}
	else if($('#popupAttacheVideoHelp').is(':visible')) {
		loadModelPopupWithMask('popupAttacheVideoHelp', 'default');
	}
});

/**
 * Loads Video pop-up from welcome screen
 */
function loadWelcomeLoginPopup(callback) {
	/* Get the screen height and width */
	var maskHeight = $(document).height();
	var maskWidth = $(document).width();

	/* Set heigth and width to mask to fill up the whole screen */
	$('.popupMask.dialogUserLogin2').css({'width':maskWidth,'height':maskHeight});
	$('.popupMask.dialogUserLogin2').fadeTo('fast', 0);
	
	/* Get the window height and width */
	var winH = $(window).height();
	var winW = $(window).width();
	$('#dialogUserLogin2').css('left', winW/2 + $('#dialogUserLogin2').width() - 82);
	
	if('resize' != callback) {
		$('#dialogUserLogin2').show();
		$('.errorTxt').hide();
		$('#SignIn2').reset();
		$('#dialogUserLogin2 .placeholder-text').show();
		$('#txtUserName2').focus();
	}
}

/**
 * Loads welcome screen
 */
function loadWelcomeScreen() {
	
	$('#notificationBox').hide();
	
	/* Load welome.php on click Create account menu */
	$.colorbox({ 
		inline: true, 
		href: '#welcomeWrapper', 
		width: '700px', 
		height: '550px', 
		transition: 'fade', 
		close: '', 
		opacity: 1, 
		overlayClose: false, 
		scrolling: false, 
		onComplete: function() {
			$('#welcomeRegistrationForm').reset();
			$('#welcomeWrapper .placeholder-text').show();
			$('#zone_name').focus();

			/* hack to avoid preload close button */
			$('#cboxClose').attr('style', 'visibility: visible');
		}, 
		onCleanup: function() {
			/* hack to avoid preload close button */
			$('#cboxClose').attr('style', 'visibility: hidden');
			closeModelPopup();
		}
	});
}

/**
 * Loads User login screen
 */
function loadLoginScreen(callback) {
	if('resize' != callback) {
		$('#dialogUserLogin1').show();
		$('.errorTxt').hide();
		$('#SignIn').reset();
		$('#dialogUserLogin1 .placeholder-text').show();
		$('#txtUserName').focus();
	}
}

function set_focus(ele) {
	$('#' + ele).focus();
}

/* Set zone tip top alignment */
function setZoneTipsPosition() {
	/* Zone tip outter height */
	var outerHeight = $('#zonetipsoutterwrap .zonetipswrap').outerHeight();
	/* 215 is a height of player pannel */
	$('#zonetipsoutterwrap .zonetipswrap').css('top', ($(window).height() - 215 - outerHeight)/2);	
}

$(document).ready(function() {
	/* load user info in javascript global object declear common.js */
	$.ajax({
		type: 'POST', url: siteURL + '/services.php', data: 'service_type=user_details', cache: false,
		success:
			function(data) {
				userBinder = jQuery.parseJSON(data);
			}
	});
		
	$('p').attr('ondragstart', 'return false');
	$('span').attr('ondragstart', 'return false');
	$('a').attr('ondragstart', 'return false');
	
	var imgs = new Array();
	
	imgs = [
		"images/close.png",
		"images/signin.jpg",
		"images/video.jpg",
		"images/middleboxsprite.png",
		"images/middleboxspriteMid.png",
		"images/btmdivbg.png",
		"images/icons.png",
		"images/btnbg.png",
		"images/img-bgshadow.jpg",
		"images/close1.png",
		"images/check_image.jpg",
		"images/signinImg.png",
		"images/video_bg.png",
		"images/video-popup-close.png"
	];	
	
	$.preloadImages({'imagesArray': imgs});

	
	/* Code to toggle field default text place-holder span */
	$('form input:text').keydown(function(event) {
		if(null == $(this).attr('onkeydown')) {
			var fieldID = $(this).attr('id');
			var fieldFormID = $('#' + fieldID).closest('form').attr('id');
			if('' != fieldID && '' != fieldFormID ) {
				onKeyPress_toggle_default_text(fieldFormID, fieldID, '', event)
			}
		}
	}).keyup(function(event) {
		if(null == $(this).attr('onkeyup')) {
			var fieldID = $(this).attr('id');
			var fieldFormID = $('#' + fieldID).closest('form').attr('id');
			if('' != fieldID && '' != fieldFormID ) {
				onKeyUp_toggle_default_text(fieldFormID, fieldID, '');
			}
		}
	});
	
	$('#userLogout').click(function() {
		window.location = hostURL + '/logout.php';
	});
	$('#userLoginScreen1').click(function() {
		loadLoginScreen('user_click');
	});
	$('#welcomeScreen').click(function() {
		loadWelcomeScreen();
	});
	$('#limitedSignIn').click(function() {
		loadLoginScreen('user_click');
	});	
	$('#limitedCreateAccountSignIn').click(function() {
		loadWelcomeScreen();
	});

	/* Welcome popup */
	$('#listRegContinue').click(function() {
		callListenersSignUp();
	});
	$('#musicianRegistrationNxt').click(function() {
		callMusicianSignUp();
	});
	
	
	/* Bind listener validation callback on next button */
	$('#listRegStep1BackBtn').click(function() {
		backToWelcomeScreen();
	});
	$('#listRegStep1NxtBtn').click(function() {
		validateListenerRegisterStep1();
	});
	
	$('#listRegStep2BackBtn').click(function() {
		toggle_form_steps('listenerRegistrationForm', 'listenerRegistrationStep2', 'listenerRegistrationStep1');
	});
	$('#listRegStep2NxtBtn').click(function() {
		validateListenerRegisterStep2();
	});
	
	$('#musicianSettings').click(function() {
		callEditAccount();
	});
	$('#listenerSettings').click(function() {
		editListenerAccount();
	});
	
	setZoneTipsPosition();
	
	/* Welcome pop-up verticle scrolling */
	$('.contentBoxMain').cycle({ 
		fx: 'scrollDown', 
		timeout: 5000, 
		delay: -10
	});

	/* Get the window width and set left for image upload loader */
	var winW = $(window).width();
	var winH = $(window).height();
	$('#imageUploaderLoader').css('left', winW/2 - $('#imageUploaderLoader').width()/2);
	
	$(document).bind('cbox_load', function(){
		$('.errorTxt').hide();
	});
	
	$('form').jqTransform();
	
	$('.footer ul li a').textShadow();

	/* if close button is clicked */
	/*$('#dialogVideoPopup .close').click(function (e) {
		e.preventDefault();
		$('.popupMask').hide(); $('.modelPopupWindow').hide();
		$('.contentBoxMain').cycle('resume');
	});
	
	$('.modelPopupWindow .close').click(function (e) {
		e.preventDefault();
		$('.popupMask').hide(); $('.modelPopupWindow').hide();
	});	*/
	
	$('.jp-thumbs ul li a').click(function() {
		window.location = $(this).attr('href');
	});
	
	/* Code to hide comment box if comment box is empty and user clicks outside comment box */
	$('body').click(function(event){
		var message = $.trim($('#message').val());
		if( '' == message && 'message' != event.target.id && 'btnSend' != event.target.id && '' != event.target.id ) {
			$('#commentform').hide();
		}
	});
	
	/* init notify tool tip */
	$('#notifyMeSubscribe a[rel=tipsy]').tipsy({ gravity: 'se', html: true, offset: 5, opacity: 1, delayIn: 500 });
	
	$('.jp-musicianbox .show_hide').tipsy({ gravity: 's', html: true, offset: 5, opacity: 1, delayIn: 500 });
	
	$.ajax({
		type: 'POST', url: siteURL + '/services.php', data: 'service_type=is_user_logged_in', cache: false,
		success:
			function(data) {
				if(0 == data) {
					notificationLimitedAccessTimer = setTimeout('limitedAccess()', 30000);
				}
			}
	});
	
	$('#userZone').click(function() {
		window.location = $(this).attr('href');
	});
	$('.dmmlogo a').click(function() {
		loadWelcomeScreen();
	});

	$("ul.jqtransform").jqTransform();
	$('#songsettingsscrollpane').jScrollPane({ scrollbarWidth: 12 });
	
	$('#jp_container_1 .jp-play').click(function(){
		$.cookie('FORCEPAUSE', null, { path: '/' });
	});
	
	$('#jp_container_1 .jp-pause').click(function(){
		$.cookie('FORCEPAUSE', '1', { path: '/' });
	});
});

function showNotificationMessage() {
	//clearTimeout(notificationLimitedAccessTimer);
	
	/* Show notofication box with message if any message set in NOTIFICATIONID cookie  */	
	var notificationMessage = $.cookie('NOTIFICATIONID');
	var profileUpdated = $.cookie('PROFILEUPDATED');
	var profileNotUpdated = $.cookie('PROFILENOTUPDATED');
	
	if('' != notificationMessage && null != notificationMessage) {
		$('#notificationBox .data').html(notificationMessage);
		$('.jp-limitaccess').hide();
		$('#notificationBox').show();
		notificationLimitedAccessTimer = setTimeout("$('#notificationBox').hide(); limitedAccess();", 5000);
		
		/* Clear cookie */
		$.cookie('NOTIFICATIONID', null, { path: '/' });
	}else if('' != profileUpdated && null != profileUpdated) {
		$('#notificationBox .data').html(profileUpdated);
		$('.jp-limitaccess').hide();
		$('#notificationBox').show();
		notificationLimitedAccessTimer = setTimeout("$('#notificationBox').hide(); limitedAccess();", 5000);
		$('#notificationBox').addClass('profileUpdated');
		
		/* Clear cookie */
		$.cookie('PROFILEUPDATED', null, { path: '/' });
	}else if('' != profileNotUpdated && null != profileNotUpdated) {
		$('#notificationBox .data').html(profileNotUpdated);
		$('.jp-limitaccess').hide();
		$('#notificationBox').show();
		notificationLimitedAccessTimer = setTimeout("$('#notificationBox').hide(); limitedAccess();", 5000);
		$('#notificationBox').addClass('profileNotUpdated');
		
		/* Clear cookie */
		$.cookie('PROFILENOTUPDATED', null, { path: '/' });
	}

	/* after listener registration open lifestyle pop-up */
	if('1' == $.cookie('LISTENERREG')) {
		openLifestyleMenu();
		$.cookie('LISTENERREG', null, { path: '/' });
	}

	/* load lifestyle pop-up if user is listener and user does not save lifestyle*/
	/* also set LISTENERLIFESTYLEDISPLAY cookie to avoid every time pop-up load after page refresh */
	/* unset LISTENERLIFESTYLEDISPLAY cookie on logout in logout.php */
	if( 'listener' == userBinder.user_type && null == $.cookie('LISTENERLIFESTYLEDISPLAY') ) {
		if(0 == userBinder.selected_lifestyle) {
			openLifestyleMenu();
			$.cookie('LISTENERLIFESTYLEDISPLAY', '1', { path: '/' });
		}
	}
}
	
function limitedAccess() {
	if($('.jp-limitaccess').size()) {
		$('.jp-limitaccess').toggle();
		notificationLimitedAccessTimer = setTimeout('limitedAccess()', 30000);
	}
}

function skip_this() {
	$.colorbox.close();
}

/**
 * Loads User ForgotPassword screen
 */
function loadForgotPasswordScreen(callback) {
	if($('#dialogUserLogin1').is(':visible')) {
		if($('#dialogUserLogin1 .close').size()) {
			closeModelPopup();
		}
	}

	if($('#dialogUserLogin2').is(':visible')) {
		if($('#dialogUserLogin2 .close').size()) {
			closeModelPopup();
		}
	}

	if('resize' != callback) {
		loadModelPopupWithMask('dialogForgotPassword', 'center');
		$('.errorTxt').hide();
		$('#ForgotPassword').reset();
		$('#dialogForgotPassword .placeholder-text').show();
		$('#fpass_username').focus();
		refreshCaptcha('forgotpass_captcha_img');
	}	
}

/**
 * Function to check enter user name/email is valid or not
 * and execute request to send forgot password mail
 */
function forgotPassword() {
	var isValidData = 1;
	var fpass_username = $.trim($("#fpass_username").val());
	var fpass_email = $.trim($("#fpass_email").val());
	var fpass_captcha = $("#fpass_captcha").val();

	if( '' == fpass_username && '' == fpass_email ) {
		$('#fpass_username').focus();
		show_validation_message('', 'err_forgotpass_username', 'You must enter a Username or email address');
		isValidData = 0;
	} else {
		var array = {
			"txtUserName" : fpass_username, "txtEmail" : fpass_email
		};
		
		/* $.param() similar to http_build_query() */
		var dataString = $.param(array);
		
		$.ajax({
			type: "POST", url: hostURL + "/forgotPassword.php?send_mail=0", data: dataString, 
			success: 
				function(data) {
					if(0 == data) {
						if('' != fpass_username) {
							show_validation_message('', 'err_forgotpass_username', 'Invalid Username (Zone name)');
						} else {
							show_validation_message('', 'err_forgotpass_username', 'Invalid Email address');
						}
						return false;
					}
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) {
					$("#err_forgotpass_username").html('Timeout contacting server..');
				}
		});
	}

	if('' == fpass_captcha) {
		show_validation_message('', 'fpass_captcha_errorTxt', 'Please enter text');
		isValidData = 0;
	} else if('' != fpass_captcha) {
		$.ajax({
			type: 'POST', url: siteURL + '/validateCaptcha.php', data: 'captcha=' + fpass_captcha, async: false, cache: false, 
			success:
				function(validateCaptcha) {
					if(0 == validateCaptcha) {
						show_validation_message('', 'fpass_captcha_errorTxt', 'Invalid text');						
						isValidData = 0;
					}
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) {
					$('#songCommentsDiv').html('Timeout contacting server..');
				}
		});
	}	
	
	if(isValidData) {
		var array = { 
			"txtUserName" : fpass_username,
			"txtEmail" : fpass_email
		};
		
		/* $.param() similar to http_build_query() */
		var dataString = $.param(array);
		$.ajax({
			type: "POST", url: siteURL + "/forgotPassword.php?send_mail=1", data: dataString, 
			success: 
				function(data) {
					if(1 == data) {
						$.colorbox.close();
						$('#dialogForgotPassword .close').click();
						$.cookie('NOTIFICATIONID', 'Your reset password instructions have been sent to your account email', { path: '/' });
						showNotificationMessage();
					}
					else {
						if('' != fpass_username) {
							show_validation_message('', 'err_forgotpass_username', 'Invalid Username (Zone name)');
						} else {
							show_validation_message('', 'err_forgotpass_username', 'Invalid Email address');
						}
						return false;
					}
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) {
					$("#err_forgotpass_username").html('Timeout contacting server..');
				}
		});
	}
}


var userLoginCheckTimer;
function userlogincheck(htmlContent) {
	$('.alertmessagebox').hide();
	clearTimeout(alertTimer);
	$('#alertbox p').html(htmlContent);
	$('#alertbox').show();
	alertTimer = setTimeout("$('#alertbox').hide()", 5000);
	
	/* Remove line-height set for notify alert box */
	$('#alertbox p').css('line-height', '');
}

function toggleCommentForm(hiddenComentType) {
	clearTimeout(alertTimer);
	$('#messageconfirm').hide();
	$('#confirmbox').hide();
	
	$('#hiddenComentType').val(hiddenComentType);
	if(document.getElementById("commentform").style.display == "none" ) {
		$("#commentform").toggle();
	}
	else {
		$("#commentform").toggle();
	}
	$('#message').focus();
	$('#commentSongId').val($('#hid_songid').val());
}

var emptyMessageValidationTimer;
function emptyMessageValidation() {
	$('.alertmessagebox').hide();
	clearTimeout(alertTimer);
	$('#alertbox2 p').html('Please enter some text');
	$('#alertbox2').show();
	$('#alertbox2 .alertlinks').hide();
	alertTimer = setTimeout("$('#alertbox2').hide(); $('#alertbox2 .alertlinks').show();", 5000);
}


function submitCommentForm() {
	$('.alertmessagebox').hide();
	clearTimeout(alertTimer);
	
	var comment_type = $('#hiddenComentType').val();
	var message = $.trim($('#message').val());
	var songId = $.trim($('#commentSongId').val());
	var musician_name = $.trim($('#musician_name').val());

	if('' == message) {
		emptyMessageValidation();
		} else if('messageToMusician' == comment_type && '' != musician_name) {
		var dataString = "musician_name=" + musician_name + "&msg=" + message;	
		$.ajax({
			type: "POST", url: siteURL + '/messageMusicianAjax.php', data: dataString, cache: false,
			success:function(data) {
				closeCommentBox();
				var dataOBJ = jQuery.parseJSON(data);
				if(dataOBJ.status=="1"){
					/*$('#messageconfirm p').html("Your message was delivered to <strong>" + dataOBJ.musician_name + "</strong> successfully!<br/>Be sure to check your junk mail for replies.");*/
					$("#message").val("");
					$('#messageconfirm').show();
					alertTimer = setTimeout("$('#messageconfirm').hide()", 5000);
					$('#remLen2').val('321');
				}
			}
		});
	} else if('songComment' == comment_type && '' != songId) {
		var dataString = "songId=" + songId + "&comment=" + message;	
		$.ajax({
			type: "POST", url: siteURL + '/saveCommentAjax.php', data: dataString, cache: false,
			success:function(data) {
				closeCommentBox();
				var dataOBJ = jQuery.parseJSON(data);
				if(dataOBJ.status=="1"){
					/*$('#confirmbox p').html("Your comment was added to <strong>" + dataOBJ.song_name +	"</strong> by " + dataOBJ.musician_name + ".");*/
					$("#message").val("");
					$('#confirmbox').show();
					alertTimer = setTimeout("$('#confirmbox').hide()", 5000);
					$('#remLen2').val('321');
				}
				
			}
		});
	}
	$('#commentSongId').val('');
}

function closeNotifyLoginAlert() {
	$('#notifyalertbox').hide();
}

function closeCommentBox() {
	var comment_type = $('#hiddenComentType').val();
	if('messageToMusician' == comment_type) {
		$("#commentform").hide();
		$('#remLen2').val('321');
		$("#messageconfirm").hide();
	}
	else if('songComment' == comment_type) {
		$("#commentform").hide();
		$('#remLen2').val('321');
		$("#confirmbox").hide();
	}
	else{
		$('#alertbox').hide();
		$("#commentcontent").show();
	}
}

function closeAlertBox2() {
	$('#alertbox2').hide();
}

function commentTextCounter(field,cntfield,maxlimit) {
	if (field.value.length > maxlimit) {
		/* if too long...trim it! */
		field.value = field.value.substring(0, maxlimit);
	}
	else {
		/* otherwise, update 'characters left' counter */
		cntfield.value = maxlimit - field.value.length;
	}
}

function togglePlayListDisplay() {
var ele = document.getElementById("jp-playlist");
	var text = document.getElementById("jp-playlist");
	if(ele.style.display == "block") { ele.style.display = "none"; }
	else { ele.style.display = "block"; }
} 

function showMusicianZoneTips() {
	if('none' == $('#zonetipsoutterwrap').css('display')) {
		$('#zonetipsoutterwrap').css('display', 'block');
		$('#zoneimagetips').css('visibility', 'visible');
		$('#upgradezonetip').css('visibility', 'visible');
		$('#musicfeaturetip').css('visibility', 'visible');
	} else {
		$('#zonetipsoutterwrap').css('display', 'none');
		$('#zoneimagetips').css('visibility', 'hidden');
		$('#upgradezonetip').css('visibility', 'hidden');
		$('#musicfeaturetip').css('visibility', 'hidden');
	}
}


function zoneimageDisplay() {
	if($('#zoneimagetips').css('visibility') == 'visible' ) {
		$('#zoneimagetips').css('visibility', 'hidden');
		outerzoneDisplay();
	}
}
function upgradeDisplay() {
	if($('#upgradezonetip').css('visibility') == 'visible' ) {
		$('#upgradezonetip').css('visibility', 'hidden');
		outerzoneDisplay();
	}
}
function featureDisplay() {
	if($('#musicfeaturetip').css('visibility') == 'visible' ) {
		$('#musicfeaturetip').css('visibility', 'hidden');
		outerzoneDisplay();
	}
}

function outerzoneDisplay() {
   if( $('#zoneimagetips').css('visibility') == 'hidden' 
	&& $('#upgradezonetip').css('visibility') == 'hidden' 
	&& $('#musicfeaturetip').css('visibility')  == 'hidden' ) {
		$('#zonetipsoutterwrap').css('display', 'none');
   }
}

/* upload song */
/* Reset upload song form */
function resetUploadSong() {
	$('#content h2').html('Let\'s add your first song, <strong>FREE!</strong>');
	$('#head_mp3').show();
	$('#chooseMp3ToUpload').show();
	$('#launchSoundControl').css('display', 'none');
	$('#txt_SongName').val('');
	$('.placeholder-text.txt_SongName').show();
}

function loadModelPopupWithMask(divID, position) {
	$('.alertmessagebox').hide();

	/* Get the screen height and width */
	var maskHeight = $(document).height();
	var maskWidth = $(document).width();

	/* Set heigth and width to mask to fill up the whole screen */
	$('.popupMask' + '.' + divID).css({'width':maskWidth,'height':maskHeight});
	$('.popupMask' + '.' + divID).fadeTo('fast', 0);

	if('' == position || 'center' == position) {	
		var winH = $(window).height();
		var winW = $(window).width();
		$('#' + divID).css('top',  (winH/2) - ($('#' + divID).height()/2));
		$('#' + divID).css('left', (winW/2) - ($('#' + divID).width()/2));
		$('#' + divID).show();
	} else if('default' == position) {
		$('#' + divID).show();
	}
	
}

/* Load upload song form */
function loadUploadSong(flag) {

	/* hide zone tips */
	if($('#zoneimagetips').css('visibility') == 'visible' ) {
		$('#zoneimagetips').css('visibility', 'hidden');
	}
	if($('#upgradezonetip').css('visibility') == 'visible' ) {
		$('#upgradezonetip').css('visibility', 'hidden');
	}
	if($('#musicfeaturetip').css('visibility') == 'visible' ) {
		$('#musicfeaturetip').css('visibility', 'hidden');
	}
	$('#zonetipsoutterwrap').css('display', 'none');
	/* hide zone tips */

	$('.errorTxt').hide();
	resetUploadSong();
	loadModelPopupWithMask('dialogUploadSong', 'center');
	
	if(1 == flag) {
		$('#dialogUploadSong #content h2').html('Let\'s add your first song, <strong>FREE!</strong>');
		$('.popupMask.dialogUploadSong').addClass('firstsong');
	} else {
		$('#dialogUploadSong #content h2').html('Add a Song');
		$('.popupMask.dialogUploadSong').removeClass('firstsong');
	}

	$('#close_Btn').click(function(){
		$('.popupMask').hide(); $('.modelPopupWindow').hide();
	});
	$('#uploadpopupcancel').click(function(){
		$('.popupMask').hide(); $('.modelPopupWindow').hide();
	});
	
	_init_upload_file_control('Choose MP3 file', 'chooseMp3ToUpload', 'song', '10', "'mp3'", 'list_reg_avatar_path', 'musi_upload_song_errorTxt');
}

/* Func to init upload song control */
var uploadedSongFilename;
function _init_upload_file_control(buttonText, elementID, uploadType, uploadSize, allowedExtensions, hiddenFieldID, errorTxtClass) {
	var errorMessage = new Array();
	
	var uploader = new qq.FileUploader({
		element: document.getElementById(elementID),
		action: siteURL + '/ajax_upload.php?type=' + uploadType + '&upload_size=' + uploadSize,
		name: 'uphoto',
		params: {'buttonText' : buttonText},
		allowedExtensions: ['mp3'],
		onSubmit: function(id, fileName){
			$('#songuploader').show();
		},
		onComplete: function(id, fileName, responseJSON){
			if(1 == responseJSON.status) {
				$('#songuploader').hide();
				$('#head_mp3').hide();
				$('#chooseMp3ToUpload').hide();
				$('#launchSoundControl').css('display', 'block');
				uploadedSongFilename = responseJSON.filename;
				
				$('#content h2').html('<span id="addSong"><p >File:<span>' + responseJSON.filename + '</span></p></span>');
			} else if(0 == responseJSON.status) {
				$('#songuploader').hide();
				errorMessage[0] = [errorTxtClass, responseJSON.error];
				showErrorMessage(errorMessage);
			}
		},
		messages: {
			typeError: 'Only MP3 files are allowed'
		},
		showMessage: function(message){
			errorMessage[1] = [errorTxtClass, message];
			showErrorMessage(errorMessage);
			$('#songuploader').hide();
		}
	});

}

function validateUrl(urlText){
	var urlregex = new RegExp("^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
	if(urlregex.test(urlText)){
	    return true;
	} else {
		return false;
	}
}


/*
 * Function to load credit details pop up
 */
function loadCreditDetailsPopUp() {
	loadModelPopupWithMask('dialogCreditDetails', 'center');
	$.ajax({
		type: 'POST', url: siteURL + '/getSongCreditDetailsAjax.php', data: 'songId=' + $('#hid_songid').val(), cache: false,
		success:
			function(data){
				//var dataOBJ = jQuery.parseJSON(data);		
				//alert(dataOBJ.vocal);
				$('#dialogCreditDetails').html(data);
			}
	});
}

/*
 * Function to load credit details pop up
 */
function loadReviewDetailsPopUp() {
	loadModelPopupWithMask('dialogReviewDetails', 'center');
	$.ajax({
		type: 'POST', url: siteURL + '/getReviewDetailsAjax.php', data: 'songId=' + $('#hid_songid').val(), cache: false,
		success:
			function(data){
				$('#dialogReviewDetails').html(data);
				$('.reviewPane').jScrollPane({verticalDragMinHeight:115,verticalDragMaxHeight:115});
			}
	});
}

/*
 * Function to show about us pop up
 */
function loadAboutMusicianPopUp() {
	loadModelPopupWithMask('dialogAboutMusicianDetails', 'center');
	$.ajax({
		type: 'POST', url: siteURL + '/getMusicianAboutInfoAjax.php', data: 'songId=' + $('#hid_songid').val(), cache: false,
		success:
			function(data){
				$('#dialogAboutMusicianDetails').html(data);
				$('.popUpContent').jScrollPane({verticalDragMinHeight:115,verticalDragMaxHeight:115});
			}
	});
}

/* Function to save uplaoded song to valid destination */
function submitSong(){
	var errorMessage = new Array();
	
	var songName = $('#txt_SongName').val();
	if('' == songName) {
		errorMessage[0] = ['musi_song_name_errorTxt', 'Enter song name'];
	}
	
	if('' == uploadedSongFilename) {
		errorMessage[1] = ['musi_upload_song_errorTxt', 'Upload valid MP3 file'];
	}

	if(0 == errorMessage.length) {
		var dataString = "songName=" + songName + "&uploadSongFilename=" + uploadedSongFilename;
		$.ajax({
			type: "POST", url: siteURL + "/saveSongsAjax.php", data: dataString, async: false, cache: false, 
			success: 
				function(data){
					var dataOBJ = jQuery.parseJSON(data);
					if(dataOBJ.status == "1"){
						/* Load songs_setting.php on click Create account menu */
						$('.popupMask').hide(); $('.modelPopupWindow').hide();
						
						/* set song count */
						$('#jp_container_1 #music span').html(dataOBJ.song_count);
						if( parseInt(dataOBJ.song_count) == 1){
							$('#uploadFirstSong').attr('onClick', '');
							$('#uploadFirstSong').attr('onClick', 'loadSongSettingsForm();');
							
							/* load first song upload Congratulations screen */
							loadModelPopupWithMask('dialogFirstSongCongratulations', 'default');
							$('#jp_container_1 #music').attr('onclick', '');
							$('#jp_container_1 #music a').attr('onclick', 'loadSongSettingsForm()');
						} else {
							/* load song settings screen */
							loadSongSettingsForm();	
						}
					}
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown){
				}
		});
		
	} else {
		showErrorMessage(errorMessage);
	}
	
	return false;
}

function _initSongBillboardImageUpload() {
	var errorMessage = new Array();
	
	var uploader = new qq.FileUploader({
		element: document.getElementById('songSettingsBillboardImageUpload'),
		action: siteURL + '/ajax_upload.php?type=zone_image&upload_size=10',
		name: 'uphoto',
		params: {'buttonText' : 'Choose an image'},
		allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
		onSubmit: function(id, fileName){
			$('.add-image-panel-header .uploader').show();
		},
		onComplete: function(id, fileName, responseJSON){
			if(1 == responseJSON.status) {
				
				$('#dialogAddSongImage .preview-image img').load(function() { 
					$('.add-image-panel-header .uploader').hide();
					$('#dialogAddSongImage .preview-image img').show();
					$('#dialogAddSongImage .preview-image p').hide();
				}).attr('src', responseJSON.preview_path);
		
				$('#tmpZoneImgHiddenPath').val(responseJSON.path);
				$('#tmpZoneImgPreviewHiddenPath').val(responseJSON.preview_path);
				
				globalRemoveSongImage = 0;
				
				$('.preview-image').unbind('mouseover');
				$('.preview-image').unbind('mouseleave');
				/* Remove song image hover link binding */
				$('.preview-image').mouseover(function() {
					$('.remove-image').show();
				}).mouseleave(function() {
					$('.remove-image').hide();
				});
				
			} else if(0 == responseJSON.status) {
				$('.add-image-panel-header .uploader').hide();
				errorMessage[0] = ['errorTxt', responseJSON.error];
				showErrorMessage(errorMessage);
			}
		},
		messages: {
			typeError: 'Only JPG, PNG or GIF files are allowed'
		},
		showMessage: function(message){
			errorMessage[1] = ['errorTxt', message];
			showErrorMessage(errorMessage);
			$('.add-image-panel-header .uploader').hide();
		}
	});
}

function loadSongSettingsForm() {
	/* when user travel from first song upload Congratulations */
	closeModelPopup();
	
	$.colorbox({ 
		inline: false, 
		href: siteURL + '/songs_setting.php', 
		/* inline: true, 
		href: '#Song_Settings', */
		width: '100%', 
		height: '100%', 
		transition: 'fade', 
		close: '', 
		opacity: 1, 
		overlayClose: false, 
		scrolling: false, 
		onComplete: function() {
			$('#cboxClose').attr('style', 'visibility: hidden');

			/* songs settings */
			$("ul.jqtransform").jqTransform();
			$("#sortable").sortable({axis: 'y', placeholder: "sortable-placeholder", containment: ".grid.demo", scrollSensitivity: 50, scrollSpeed: 50, tolerance: "pointer"});
			
			$('a[rel=tipsy]').tipsy({ gravity: 's', html: true, offset: -20, opacity: 1, delayIn: 500 });
			
			/* Songs guide */
			$('#dialogSongGuide .scroll-pane').jScrollPane({verticalDragMinHeight:120,verticalDragMaxHeight:120});
			$('#dialogSongGuide').css('display', 'none');
			$('#dialogSongGuide').addClass('modelPopupWindow');
			$('#dialogSongGuide').addClass('alertmessagebox');
			
			/* song credit */
			/*$('#dialogSongCredit .scroll-pane').jScrollPane({verticalDragMinHeight:150,verticalDragMaxHeight:150,maintainPosition:false});
			$('#dialogSongCredit').css('display', 'none');
			$('#dialogSongCredit').addClass('modelPopupWindow');
			$('#dialogSongCredit').addClass('alertmessagebox');*/
			
			/* song credit */
			$('#popupAttacheVideoHelp .scroll-pane').jScrollPane({verticalDragMinHeight:102,verticalDragMaxHeight:102,maintainPosition:false});
			$('#popupAttacheVideoHelp').css('display', 'none');
			$('#popupAttacheVideoHelp').addClass('modelPopupWindow');
			$('#popupAttacheVideoHelp').addClass('alertmessagebox');
			
			_initSongBillboardImageUpload();
			
			/*$('#sortable li .for_sell_price').click('click', function(e){ removeSongForSell(e); });*/
			$('#sortable li .for_sell_price').click('click', function(e){ setSongForSell(e); });
			
			$('#sortable li .for_sell_opt a').click('click', function(e){ setSongForSell(e); });
			
			$('#sortable li .is_download_span a').click('click', function(e){ openSongAvailableForDownload(e); });
			
			$('#sortable li .video_span a').click('click', function(e){ openSetUnsetSongVideo(e); });
			
			$('#sortable li .songcredits_span a').click('click', function(e){ openSongCredit(e); });
			
			$(".jqTransformCheckbox").mousedown(function() {
				$(this).addClass("jqTransformActive");
			}).mouseup(function() {
				$(this).removeClass("jqTransformActive");
			});
			
			var songIDArray = $('#Song_Settings #sortable').sortable('toArray');
			$('#jp_container_1 #music').attr('onclick', '');
			if( 0 == songIDArray.length) {
				$('#jp_container_1 #music a').attr('onclick', 'loadUploadSong(1)');
			} else {
				$('#jp_container_1 #music a').attr('onclick', 'loadSongSettingsForm()');
			}
			
			var listingHeight = $(window).height() - 206;
			$('.grid.demo').css('height', listingHeight);
			$('.grid.demo .scroll-pane').css('height', listingHeight);
			$(window).resize(function () {
				$.colorbox.resize({width:'100%', height:'100%'});
				var listingHeight = $(window).height() - 206;
				$('.grid.demo').css('height', listingHeight);
				$('.grid.demo .scroll-pane').css('height', listingHeight);
			});
		}, 
		onCleanup: function() {
			$('#sortable li .for_sell_price').unbind('click');
			$('#sortable li .for_sell_opt a').unbind('click');
			$('#sortable li .is_download_span a').unbind('click');
			
			/* hack to avoid preload close button */
			$('#cboxClose').attr('style', 'visibility: hidden');
		}
	});
}

function submitSongSettings() {
	var songSettings = new Array();
	var index = 0;
	var weight = 1;
	
	/* get <li> ids in array as we set song id as <li> */
	/* sortable('toArray') is method of sortable plugin*/
	var songIDArray = $('#Song_Settings #sortable').sortable('toArray');

	if(songIDArray.length) {
		for(var i = 0; i < songIDArray.length; i++) {
			var id = songIDArray[i];
			var billborad_image =  $('#' + id + ' .zoneImgHiddenPath').val();

			if('' != billborad_image) {
				billborad_image = billborad_image.replace(/\\/g,'/').replace( /.*\//, '' );
			}
			
			/* get selected song credits values */
			var songVocal = $('#' + id + ' .sngcrdVocal').val();
			var songProduction = $('#' + id + ' .sngcrdProduction').val();
			var songInstrumentaiton = $('#' + id + ' .sngcrdInstrumentaiton').val();
			var songCoverArt = $('#' + id + ' .sngcrdCoverArt').val();

			songSettings[index] = { 
				id : id, 
				weight : weight, 
				name : $('#' + id + ' .song_name').val(),  
				image : ($('#' + id + ' .image').is(':checked')) ? 1 : 0, 
				video_url : $('#' + id + ' .videourlhidden').val(), 
				is_download : ($('#' + id + ' .is_download').is(':checked')) ? 1 : 0, 
				for_sell : ($('#' + id + ' .for_sell').is(':checked')) ? 1 : 0,
				billborad_image : billborad_image,
				credits: {vocal : songVocal, production : songProduction, instrumentation : songInstrumentaiton, coverart : songCoverArt}
			};
			
			weight++;
			index++;
		}

		var data = {
			songs: [songSettings]
		};
		
		$.ajax({
			type: 'POST', url: siteURL + '/save_songs_setting.php', data: data, cache: false,
			success:
				function(data) {
					dataOBJ = jQuery.parseJSON(data);
					if(1 == dataOBJ.status) {
						$.colorbox.close();
						var url = window.location.pathname;
						var urlArray = url.split('/');
						var musicianName = urlArray[urlArray.length-1];
						window.location.href = window.location.pathname;
						/*if(musicianName == dataOBJ.username) {
							window.location.href = window.location.pathname
						} else {
							window.location.href = window.location.pathname + dataOBJ.username;
						}*/
					}
				}
		});
	} else {
		$.colorbox.close();
		window.location.href = window.location.pathname;
	}
	
}
/* upload song */

function closeSongSettings() {
	$.colorbox.close();
}

function songGuidePopUp() {
	loadModelPopupWithMask('dialogSongGuide', 'default');
}

function closeSongGuidePopUp() {
	closeModelPopup();
}

var tmpDeleteSongId;
function loadDeleteSong(songId) {
	var songName = $('#sortable #' + songId + ' .song_name').val();
	$('#delete-song-upperdiv span b').html(songName);
	loadModelPopupWithMask('dialogDeleteSong', 'default');
	tmpDeleteSongId = songId;
}

function deleteSong(){
	$.ajax({
		type: 'POST', url: siteURL + '/del_song.php', data: 'song_id=' + tmpDeleteSongId, cache: false,
		success:
			function(data) {
				var dataOBJ = jQuery.parseJSON(data);
				if(-999 == dataOBJ.status) {
					
				} else if(1 == dataOBJ.status) {
					
					/* set song count */
					$('#jp_container_1 #music span').html(dataOBJ.song_count);
					
					$('#jp_container_1 #music a').attr('onclick', '');
					if( 0 == dataOBJ.song_count) {
						$('#jp_container_1 #music a').attr('onclick', 'loadUploadSong(1)');
					} else {
						$('#jp_container_1 #music a').attr('onclick', 'loadSongSettingsForm()');
					}
					
					closeModelPopup();
					loadSongSettingsForm();
				} else {

				}
			}
	});
}

function loadSongImageUpload(id){
	$('.preview-image').unbind('mouseover');
	$('.preview-image').unbind('mouseleave');

	currentClickID = id;
	
	var songName = $('#' + currentClickID + ' .song_name').val();
	if(songName.length > 25) {
		songName = songName.substring(0, 25) + '...';
	}
	$('#dialogAddSongImage .add-image-panel-header p').html('Add a Unique Image for <strong>' + songName + '</strong>');

	var zoneImgPreviewHiddenPath = $('#' + id + ' .zoneImgPreviewHiddenPath').val();

	/* Show uploaded image preview */
	if('' != zoneImgPreviewHiddenPath) {
		$('#dialogAddSongImage .preview-image img').attr('src', zoneImgPreviewHiddenPath);
		$('#dialogAddSongImage .preview-image img').show();
		$('#dialogAddSongImage .preview-image p').hide();
		
		/* Remove song image hover link binding */
		$('.preview-image').mouseover(function() {
			$('.remove-image').show("remove-image");
		}).mouseleave(function() {
			$('.remove-image').hide("remove-image");
		});
		
	} else {
		$('#dialogAddSongImage .preview-image img').hide();
		$('#dialogAddSongImage .preview-image .remove-image').hide();
		$('#dialogAddSongImage .preview-image p').show();
	}
	loadModelPopupWithMask('dialogAddSongImage', 'default');
}

function closeSongImageUpload() {
	$('#' + currentClickID + ' .songimage a').removeClass('jqTransformChecked');
	$('#dialogAddSongImage .preview-image img').attr('src', siteURL + '/images/1px.png');

	$('.preview-image').unbind('mouseover');
	$('.preview-image').unbind('mouseleave');

	closeModelPopup();
}


var globalRemoveSongImage = 0;
function removeImage() {
	$('.preview-image').unbind('mouseover');
	$('.preview-image').unbind('mouseleave');

	$('#tmpZoneImgHiddenPath').val('');
	$('#tmpZoneImgPreviewHiddenPath').val('');

	$('#dialogAddSongImage .preview-image img').hide();
	$('#dialogAddSongImage .preview-image .remove-image').hide();
	$('#dialogAddSongImage .preview-image p').show();
	
	globalRemoveSongImage = 1;
}

function saveSongImage(){
	var errorMessage = new Array();
	
	var tmpImgPath = $('#tmpZoneImgHiddenPath').val();
	var tmpPreviewImgPath = $('#tmpZoneImgPreviewHiddenPath').val();
	
	var imgPath = $('#' + currentClickID + ' .songimage .zoneImgHiddenPath').val();
	var previewImgPath = $('#' + currentClickID + ' .songimage .zoneImgPreviewHiddenPath').val();
	
	if('' != tmpImgPath){
		var dataString = 'remove_image=0&id=' + currentClickID + '&billboard_image=' + tmpImgPath + '&preview_image=' + tmpPreviewImgPath;
		$.ajax({
			type: 'POST', url: siteURL + '/saveSongImage.php', data: dataString, cache: false,
			success:
				function(previewImgURL) {
					if(0 != previewImgURL) {
						closeModelPopup();
						
						var imgURL = previewImgURL;
						imgURL.replace("/songs_billboard/preview/", "/songs_billboard/");

						$('#' + currentClickID + ' .zoneImgHiddenPath').val(imgURL);
						$('#' + currentClickID + ' .zoneImgPreviewHiddenPath').val(previewImgURL);
						$('#' + currentClickID + ' .thumbnail img').attr('src', previewImgURL);
						
						$('#dialogAddSongImage .preview-image p').hide();
						$('#' + currentClickID + ' .songimage').hide();
						$('#' + currentClickID + ' .thumbnail').show();
						
						$('#tmpZoneImgHiddenPath').val('');
						$('#tmpZoneImgPreviewHiddenPath').val('');
					} 
					/* error */
					else {

					}
				}
		});
	} 
	/* remove existing image */
	else if(1 == globalRemoveSongImage){
		$('#' + currentClickID + ' .songimage .zoneImgHiddenPath').val('');
		$('#' + currentClickID + ' .songimage .zoneImgPreviewHiddenPath').val('');
		$('#dialogAddSongImage .preview-image img').attr('src', siteURL + '/images/1px.png');
		globalRemoveSongImage == 0;
		
		var dataString = 'remove_image=1&id=' + currentClickID + '&billboard_image=&preview_image=';
		$.ajax({
			type: 'POST', url: siteURL + '/saveSongImage.php', data: dataString, cache: false,
			success:
				function(data) {
					/* existing image removed*/
					if(1 == data) {
						closeModelPopup();
						$('#' + currentClickID + ' .songimage').show();
						$('#' + currentClickID + ' .thumbnail').hide();
						$('#dialogAddSongImage .preview-image p').show();
						$('#' + currentClickID + ' .songimage a').removeClass('jqTransformChecked');
					}
				}
		});
	} else if('' == tmpImgPath && '' != imgPath){
		/* nothing to do as image already exist */
		closeModelPopup();
	}
}


/* Function to save song start time and duration */
function saveSongDetails(songLength, songID, action){
	if(action == 'save'){
		/* Song start and end time calculation */
	    var songDivWidth = $('.forge-wrapper').width();
	    var secPerPixFactor = (songLength/songDivWidth).toFixed(2);
	    var p = $("#resizeDiv");
	    var sliderDivWidth = $('#resizeDiv').width();
	    var pos = p.position();
	    var leftPos = pos.left;
	    var divEndPos = parseInt(leftPos) + parseInt(sliderDivWidth);
	    var songStartTime = (leftPos * secPerPixFactor).toFixed(2);
	    var songEndTime = (divEndPos * secPerPixFactor).toFixed(2);
	    var songDuration = (songEndTime - songStartTime).toFixed(2);
	    $('#' + songID + ' .songStartTime').val(songStartTime);
	    $('#' + songID + ' .songDuration').val(songDuration);
		var dataString = "songStartTime="+songStartTime+"&songDuration="+songDuration+"&songID="+songID+"&for_sell=1";
	}else{
		$('#' + songID + ' .songStartTime').val(0);
	    $('#' + songID + ' .songDuration').val(0);
		var dataString = "songStartTime=0&songDuration=0&songID="+songID+"&for_sell=0";
	}
	
	$.ajax({
		type: "POST", url: siteURL + "/storeSongDetailsAjax.php", data: dataString, async: false, cache: false, 
		success: 
			function(data){
				closeSongGuidePopUp();
				if(action == 'save'){
					$('#' + songID + ' .for_sell_price').css('display', 'block');
					$('#' + songID + ' .for_sell_opt').css('display', 'none');
					$('#' + songID + ' .for_sell_opt .for_sell').attr('checked', 'checked');
					$('#' + songID + ' .for_sell_opt a').addClass('jqTransformChecked');
				} else {
					$('#' + songID + ' .for_sell_price').css('display', 'none');
					$('#' + songID + ' .for_sell_opt').css('display', 'block');
					$('#' + songID + ' .for_sell_opt .for_sell').removeAttr('checked');
					$('#' + songID + ' .for_sell_opt a').removeClass('jqTransformChecked');
				}
			},
		error: 
			function (XMLHttpRequest, textStatus, errorThrown){
			}
	});	
	/* Close window with other player pause and main player play */
	closesetSongForSell();
}
function calculateSongDuration(songLength){
	var songDivWidth = $('.forge-wrapper').width();
    var secPerPixFactor = (songLength/songDivWidth).toFixed(2);
    var p = $("#resizeDiv");
    var sliderDivWidth = $('#resizeDiv').width();
    var songDuration = (sliderDivWidth * secPerPixFactor).toFixed(0);
    $('#resizeDiv label').html(songDuration + ' sec');   
}

function setSongForSell_old(e) {
	var songID = $(e.target).closest('li').attr('id');
	$('#' + songID + ' .for_sell_price').css('display', 'block');
	$('#' + songID + ' .for_sell_opt').css('display', 'none');
	$('#' + songID + ' .for_sell_opt .for_sell').attr('checked', 'checked');
	$('#' + songID + ' .for_sell_opt a').addClass('jqTransformChecked');
}

function setSongForSell(e) {
	
	$('.for_sell_opt span a').removeClass('jqTransformChecked');
	
	loadModelPopupWithMask('dialogSongPreview', 'default');
	/* get click song id*/
	var songID = $(e.target).closest('li').attr('id');
	
	var songName = $('#' + songID + ' .song_name').val();
	$('.song-listing-header h2 strong').html(songName);
	
	/* Set generated song waveform image to song div */
	var songWaveImgPath = $('#' + songID + ' .songWaveImgPath').val();
	var songLength = $('#' + songID + ' .songLength').val();
	var songStartTime = $('#' + songID + ' .songStartTime').val();
	var songDuration = $('#' + songID + ' .songDuration').val();
	var songPath = $('#' + songID + ' .songPath').val();
	
	var songDivWidth = $('.forge-wrapper').width();
    var secPerPixFactor = (songLength/songDivWidth).toFixed(2);
	$('.forge-wrapper').css('background-image', 'url('+songWaveImgPath+')');

	$("#jplayer_"+songID).jPlayer({
		ready: function () {
		    $(this).jPlayer("setMedia", {
		    	mp3: songPath
		    });
	    },
    	swfPath: "js",
    	supplied: "mp3",
    	cssSelectorAncestor: "#jplayer_container_"+songID,
        cssSelector: {
          play:".jp-play-custom" 
        }
    });
	
	$("#songPlayButton").click(function(){
		if($('#dialogSongPreview .song-listing-footer .volume a').hasClass('active')) {
			$('#dialogSongPreview .song-listing-footer .volume a').removeClass('active');
			$('#jplayer_' + songID).jPlayer('stop');
		} else {
			playSelectedSongSlot(songLength, songID);
		}
	});
	
    /* calling on save & sell button */
	$('#saveSongPreview').attr('onClick', "saveSongDetails('"+ songLength +"', '"+ songID +"', 'save')");
	
	/* calling on unsell button */
	$('#unSaveSongPreview').attr('onClick', "saveSongDetails('"+ songLength +"', '"+ songID +"', 'unsave')");
	
	/* Initializing position of slider div  */
	if(0 != songDuration){
		var startPosInPix = (songStartTime/secPerPixFactor).toFixed(2);
		var widthInPix = (songDuration/secPerPixFactor).toFixed(2);
		$('#resizeDiv').css('left',""+startPosInPix+"px");
		$('#resizeDiv').css('width',""+widthInPix+"px");
	}else{
		$('#resizeDiv').css('left','0');
		$('#resizeDiv').css('width', (20 / secPerPixFactor) + 'px');
	}
	
	calculateSongDuration(songLength);

	$('#resizeDiv').draggable({
		drag: function() { },
		stop: function() {
			playSelectedSongSlot(songLength, songID);
			
			var pos = $("#resizeDiv").position();
			var leftPos = pos.left;
			if(0 > leftPos) {
				$("#resizeDiv").css('left', '0');
				/*return false;*/
			}
			
			var parentWidth = $(".forge-wrapper").width();
			var location = leftPos + $("#resizeDiv").width();
			if(location > parentWidth) {
				$("#resizeDiv").css('left', (parentWidth - $("#resizeDiv").width()) - 2 );
			}
		},
		axis: "x" /* Allow slider to move in x axis only */
	});
	
	$('#resizeDiv').resizable({
		resize: function(event, ui) { 
			calculateSongDuration(songLength); 
		},
		start: function(event, ui) { 
			$('#resizeDiv').resizable({maxWidth: (493 - ($("#resizeDiv").position().left))});
		},
		stop: function(event, ui) {
			playSelectedSongSlot(songLength, songID);
			var parentWidth = $(".forge-wrapper").width();
			var pos = $("#resizeDiv").position();
			var leftPos = pos.left;
			var width = $("#resizeDiv").width();
			if( (leftPos + width) > parentWidth) {
				var newWidth = (parentWidth - leftPos) - 2;
				$("#resizeDiv").css('width', newWidth);
				calculateSongDuration(songLength); 
			}
		},
		minWidth: (20 / secPerPixFactor)
	});

	
}

var songPortionTimer;
function playSelectedSongSlot(songLength, songID) {
	/* set active class for press state */
	$('#dialogSongPreview .song-listing-footer .volume a').addClass('active');

	var songDivWidth = $('.forge-wrapper').width();
	var secPerPixFactor = (songLength/songDivWidth).toFixed(2);

	var p = $("#resizeDiv");
	var pos = p.position();
	var leftPos = pos.left;
	var songStartTime = (leftPos * secPerPixFactor).toFixed(2);

	var sliderDivWidth = $('#resizeDiv').width();
	var songDuration = (sliderDivWidth * secPerPixFactor).toFixed(0);
	$('#resizeDiv label').html(songDuration + ' sec');   
	$("#jplayer_"+songID).jPlayer("pauseOthers");
	$("#jplayer_"+songID).jPlayer("play", parseInt(songStartTime)); 
	
	clearTimeout(songPortionTimer);
	songPortionTimer = setTimeout(
		function(){ $("#jplayer_"+songID).jPlayer("stop"); }, 
		(parseInt(songDuration)*parseInt(1000))
	);
}

function removeSongForSell(e) {
	var songID = $(e.target).closest('li').attr('id');
	$('#' + songID + ' .for_sell_price').css('display', 'none');
	$('#' + songID + ' .for_sell_opt').css('display', 'block');
	$('#' + songID + ' .for_sell_opt .for_sell').removeAttr('checked');
	$('#' + songID + ' .for_sell_opt a').removeClass('jqTransformChecked');
}

function closesetSongForSell() {
	$("#jquery_jplayer_1").jPlayer("pauseOthers");
	
	/* play main interface player only if it is not pause by user */
	if( '' == $.cookie('FORCEPAUSE') || null == $.cookie('FORCEPAUSE') ) {
		$.cookie('FORCEPAUSE', null, { path: '/' });
		$("#jquery_jplayer_1").jPlayer("play");
	}
	
	closeModelPopup();
}

var tmpSetToCanDownload;
function openSongAvailableForDownload(e) {
	
	var songID = $(e.target).closest('li').attr('id');
	tmpSetToCanDownload = songID;
	
	if($('#' + songID + ' .is_download').is(':checked')) {
		$('#' + songID + ' .is_download').removeAttr('checked');
		$('#' + songID + ' .is_download_span a').removeClass('jqTransformChecked');
	} else {
		$('#' + songID + ' .is_download').attr('checked', 'checked');
		$('#' + songID + ' .is_download_span a').addClass('jqTransformChecked');
	}
	
	var songName = $('#' + songID + ' .song_name').val();
	$('#download-song-upperdiv .songname').html('Are you sure you want to make <strong>' + songName + '</strong> available for download?');
	loadModelPopupWithMask('dialogSongDownloadConfirm', 'default');
}

function setSongAvailableForDownload() {
	$('#' + tmpSetToCanDownload + ' .is_download').attr('checked', 'checked');
	$('#' + tmpSetToCanDownload + ' .is_download_span a').addClass('jqTransformChecked');
	
	var array = { 
		'service_type' : 'set_song_download_flag',
		'song_id' : tmpSetToCanDownload,
		'download_flag' : 1
	};
	var dataString = $.param(array);
	
	$.ajax({
		type: 'POST', url: siteURL + '/services.php', data: dataString, cache: false,
		success:
			function(data) { }
	});
	
	closeModelPopup();
}

function closeSongAvailableForDownload() {
	$('#' + tmpSetToCanDownload + ' .is_download').removeAttr('checked');
	$('#' + tmpSetToCanDownload + ' .is_download_span a').removeClass('jqTransformChecked');
	
	var array = { 
		'service_type' : 'set_song_download_flag',
		'song_id' : tmpSetToCanDownload,
		'download_flag' : 0
	};
	var dataString = $.param(array);
	
	$.ajax({
		type: 'POST', url: siteURL + '/services.php', data: dataString, cache: false,
		success:
			function(data) { }
	});
	
	closeModelPopup();
}

var currentSongID;
function openSetUnsetSongVideo(e) {
	/* get click song id*/
	var songID = $(e.target).closest('li').attr('id');
	currentSongID = songID;
	var videoURL = $('#' + currentSongID + ' .videourlhidden').val();
	
	if('' == videoURL) {
		$('#dialogAttacheVideo .placeholder-text.txtSongVideo').show();
	} else {
		$('#dialogAttacheVideo .placeholder-text.txtSongVideo').hide();
	}
	
	var songName = $('#' + currentSongID + ' .song_name').val();
	$('#dialogAttacheVideo .attach-video-header strong').html(songName);
	
	/* default click operation first trigger then */
	if($('#' + songID + ' .video').is(':checked')) {
		$('#' + songID + ' .video').removeAttr('checked');
		$('#' + songID + ' .video_span a').removeClass('jqTransformChecked');
		
		$('#dialogAttacheVideo #txtSongVideo').val(videoURL);
		loadModelPopupWithMask('dialogAttacheVideo', 'default');
	} else {
		$('#' + songID + ' .video').attr('checked', 'checked');
		$('#' + songID + ' .video_span a').addClass('jqTransformChecked');
		
		$('#attachsongvideo #txtSongVideo').val(videoURL);
		loadModelPopupWithMask('dialogAttacheVideo', 'default');
	}
}

function setSongVideo() {
	var videoURL = $.trim($('#attachsongvideo #txtSongVideo').val());
	
	$('#' + currentSongID + ' .videourlhidden').val(videoURL);
	
	if('' == videoURL) {
		$('#' + currentSongID + ' .video').removeAttr('checked');
		$('#' + currentSongID + ' .video_span a').removeClass('jqTransformChecked');
	} else {
		$('#' + currentSongID + ' .video').attr('checked', 'checked');
		$('#' + currentSongID + ' .video_span a').addClass('jqTransformChecked');
	}
		
	var array = { 
		'service_type' : 'update_video_url'	,
		'song_id' : currentSongID,
		'video_url' : videoURL
	};
	var dataString = $.param(array);
	
	$.ajax({
		type: 'POST', url: siteURL + '/services.php', data: dataString, cache: false,
		success:
			function(data) { 
				if(0 == data) {
					show_validation_message('', 'video_embed_link_err', 'Invalid video embed link');
				} else {
					closeModelPopup();
				}
			}
	});

}

function openVideoHelpPopUp() {
	loadModelPopupWithMask('popupAttacheVideoHelp', 'default');
}

function closeVideoHelpPopUp() {
	/* only close attach video help pop up */
	$('.popupAttacheVideoHelp').hide();  $('.video-embed-help').hide();
	
	/* again show attach video pop-up, 
	 * bcoz when video attach help pop-up is show,
	 * attach video pop-up set to hide */
	loadModelPopupWithMask('dialogAttacheVideo', 'default');
}

/**
 * Function to highlight word selected from autocomplete
 */
function highlightTextarea(txtAreaID, string) {
	if(string.length) {
		var wordsArray = new Array();
		/* find words enclose in square braces */
		wordsArray = string.match(/[^[\]]+(?=])/g);
		if(!jQuery.isEmptyObject(wordsArray)) {
			$(txtAreaID).highlightTextarea({
				words: wordsArray
			});
		}	
	}
}

/**
 * remove "[" and "]" as it only required for hidden field only
 */
function removeSquareBrackets(string) {
	string = string.replace(/[[]/g, "");
	return string.replace(/[\]]/g, "");
}

/**
 * Function to open song credit pop up 
 */
function openSongCredit(e) {
	/* hack for texthighlighter to clear previous highlighted text */
	$('.highlighterContainer .highlighter').html('');
	
	/* get click song id*/
	currentClickID = $(e.target).closest('li').attr('id');
	var songName = $('#' + currentClickID + ' .song_name').val();

	$('.credits-header .songname strong').html(songName);
	
	/* first JQTransform click executes then onclick */
	/* so here if option is checked means previously it is unchecked */
	if(!$('#' + currentClickID + ' .songcredits').is(':checked')) {
		/* get selected song credits values */
		var songVocal = $('#' + currentClickID + ' .sngcrdVocal').val();
		var songProduction = $('#' + currentClickID + ' .sngcrdProduction').val();
		var songInstrumentaiton = $('#' + currentClickID + ' .sngcrdInstrumentaiton').val();
		var songCoverArt = $('#' + currentClickID + ' .sngcrdCoverArt').val();

		/* for vocal field */
		/* set selected song credits values into field of song credit dialog box */
		$('#dialogSongCredit #songVocals').val(removeSquareBrackets(songVocal));
		/* high light word in textarea ti indicate these words are selected from autocomplate */
		highlightTextarea('#songVocals', songVocal);
		/* set value in id_map attribute, it required for autocomplete edit case*/
		$('#dialogSongCredit #songVocals').attr('id_map', $('#' + currentClickID + ' .sngcrdVocal').attr('id_map'));

		/* for Production field */
		$('#dialogSongCredit #songProduction').val(removeSquareBrackets(songProduction));
		highlightTextarea('#songProduction', songProduction);
		$('#dialogSongCredit #songProduction').attr('id_map', $('#' + currentClickID + ' .sngcrdProduction').attr('id_map'));

		/* for Instrumentaiton field */
		$('#dialogSongCredit #songInstrumentaiton').val(removeSquareBrackets(songInstrumentaiton));
		highlightTextarea('#songInstrumentaiton', songInstrumentaiton);
		$('#dialogSongCredit #songInstrumentaiton').attr('id_map', $('#' + currentClickID + ' .sngcrdInstrumentaiton').attr('id_map'));

		/* for Cover Art field */
		$('#dialogSongCredit #songCoverArt').val(removeSquareBrackets(songCoverArt));
		highlightTextarea('#songCoverArt', songCoverArt);
		$('#dialogSongCredit #songCoverArt').attr('id_map', $('#' + currentClickID + ' .sngcrdCoverArt').attr('id_map'));
	}
	
	loadModelPopupWithMask('dialogSongCredit', 'default');
	
	$.ajax({
		type: "POST", url: siteURL + "/services.php", data: "service_type=get_user_list", cache: false, 
		success: 
			function(data){
				var nameArray = jQuery.parseJSON(data);
				
				/* init autocomplete for song credit vocal field */
				$('#songVocals').triggeredAutocomplete({
					hidden: '#songVocalsHidden',
					/* function to return case which is start with enter char */
					source: function( request, response ) {
						var matches = $.map( nameArray, function(tag) {
						  if ( tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0 ) {
							return tag;
						  }
						});
						
						/* control number of search result*/
						if (matches.length > 10) { matches = matches.splice(0, 10); }

						response(matches);
					  },
					trigger: " "
				});
				
				/* init autocomplete for song credit Production field */
				$('#songProduction').triggeredAutocomplete({
					hidden: '#songProductionHidden',
					/* function to return case which is start with enter char*/
					source: function( request, response ) {
						var matches = $.map( nameArray, function(tag) {
						  if ( tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0 ) {
							return tag;
						  }
						});
						
						/* control number of search result*/
						if (matches.length > 10) { matches = matches.splice(0, 10); }

						response(matches);
					  },
					trigger: " "
				});
				
				/* init autocomplete for song credit Instrumentaiton field */
				$('#songInstrumentaiton').triggeredAutocomplete({
					hidden: '#songInstrumentaitonHidden',
					/* function to return case which is start with enter char*/
					source: function( request, response ) {
						var matches = $.map( nameArray, function(tag) {
						  if ( tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0 ) {
							return tag;
						  }
						});
						
						/* control number of search result*/
						if (matches.length > 10) { matches = matches.splice(0, 10); }

						response(matches);
					  },
					trigger: " "
				});
				
				/* init autocomplete for song credit cover art field */
				$('#songCoverArt').triggeredAutocomplete({
					hidden: '#songCoverArtHidden',
					/* function to return case which is start with enter char*/
					source: function( request, response ) {
						var matches = $.map( nameArray, function(tag) {
						  if ( tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0 ) {
							return tag;
						  }
						});
						
						/* control number of search result*/
						if (matches.length > 10) { matches = matches.splice(0, 10); }

						response(matches);
					  },
					trigger: " "
				});
				
			}
	});
}

/**
 * Close song credit popup
 */
function closeSongCredit() {
	if($('#' + currentClickID + ' .songcredits').is(':checked')) {
		$('#' + currentClickID + ' .songcredits').removeAttr('checked');
		$('#' + currentClickID + ' .songcredits_span a').removeClass('jqTransformChecked');
	} else {
		$('#' + currentClickID + ' .songcredits').attr('checked', 'checked');
		$('#' + currentClickID + ' .songcredits_span a').addClass('jqTransformChecked');
	}
	
	/* clear all pop up and related hidden fields */
	$('#dialogSongCredit #songVocals').val('');
	$('#dialogSongCredit #songProduction').val('');
	$('#dialogSongCredit #songInstrumentaiton').val('');
	$('#dialogSongCredit #songCoverArt').val('');
	
	$('#dialogSongCredit #songVocalsHidden').val('');
	$('#dialogSongCredit #songProductionHidden').val('');
	$('#dialogSongCredit #songInstrumentaitonHidden').val('');
	$('#dialogSongCredit #songCoverArtHidden').val('');
	
	closeModelPopup();
}

/**
 * Function to set values into respective songs hidden field from pop-up fields
 */
function setSongCredit() {
	var songVocal = $.trim($('#dialogSongCredit #songVocalsHidden').val());
	var songProduction = $.trim($('#dialogSongCredit #songProductionHidden').val());
	var songInstrumentaiton = $.trim($('#dialogSongCredit #songInstrumentaitonHidden').val());
	var songCoverArt = $.trim($('#dialogSongCredit #songCoverArtHidden').val());
	
	$('#' + currentClickID + ' .sngcrdVocal').val(songVocal);
	$('#' + currentClickID + ' .sngcrdProduction').val(songProduction);
	$('#' + currentClickID + ' .sngcrdInstrumentaiton').val(songInstrumentaiton);
	$('#' + currentClickID + ' .sngcrdCoverArt').val(songCoverArt);
	
	/* no values for song credits then remove JQTransform attributes */
	if( '' == songVocal && '' == songProduction && '' == songInstrumentaiton && '' == songCoverArt ) {
		$('#' + currentClickID + ' .songcredits').removeAttr('checked');
		$('#' + currentClickID + ' .songcredits_span a').removeClass('jqTransformChecked');
	} else {	
		$('#' + currentClickID + ' .songcredits').attr('checked', 'checked');
		$('#' + currentClickID + ' .songcredits_span a').addClass('jqTransformChecked');
	}

	/* clear all pop up and related hidden fields */
	$('#dialogSongCredit #songVocals').val('');
	$('#dialogSongCredit #songProduction').val('');
	$('#dialogSongCredit #songInstrumentaiton').val('');
	$('#dialogSongCredit #songCoverArt').val('');
	
	$('#dialogSongCredit #songVocalsHidden').val('');
	$('#dialogSongCredit #songProductionHidden').val('');
	$('#dialogSongCredit #songInstrumentaitonHidden').val('');
	$('#dialogSongCredit #songCoverArtHidden').val('');
	
	var array = { 
		'service_type' : 'set_song_credits',
		'song_id' : currentClickID,
		'credits' : {vocal : songVocal, production : songProduction, instrumentation : songInstrumentaiton, coverart : songCoverArt}
	};
	var dataString = $.param(array);
	
	$.ajax({
		type: 'POST', url: siteURL + '/services.php', data: dataString, cache: false,
		success:
			function(data) { }
	});

	closeModelPopup();
}

function loadSongVideoPopUp(songID) {
	$("#jquery_jplayer_1").jPlayer("pause");

	var array = { 
		'service_type' : 'get_song_video_url',
		'song_id' : songID
	};
	var dataString = $.param(array);
	
	$.ajax({
		type: 'POST', url: siteURL + '/services.php', data: dataString, async: false, cache: false,
		success:
			function(data) {
				$.colorbox({ 
					inline: true, 
					href: '#popupSongVideo', 
					width:'100%', 
					height:'100%', 
					transition: 'fade', 
					scrolling: false, 
					close: '', 
					opacity: 1, 
					overlayClose: false, 
					onComplete: function() {
						$('#commentVideoSongId').val($('#hid_songid').val());
						$('#VideoPvtMsgSongId').val($('#hid_songid').val());
						
						$('#songVideoComment').val('');
						
						$('#header-left img').click(function(){
							$.colorbox.close();
						});
						$('#header-right img').click(function(){
							$.colorbox.close();
						});

						$('#center').css({'height': (($(window).height()) - 287)+'px'});
						$('#center .iframe').css({'height': (($(window).height()) - 287)+'px'});
						
						var dataOBJ = jQuery.parseJSON(data);

						var iframeSrc = 'http://www.youtube.com/embed/' + dataOBJ.video_url + '?rel=0;showinfo=0;controls=0;autoplay=1;iv_load_policy=3';
						var iframe = '<iframe width="100%" height="100%" src="' + iframeSrc + '" frameborder="0" allowfullscreen></iframe>'
						
						$('#emailtomusician').html('Email ' + dataOBJ.musician_name);
						var width = $('#popupSongVideo .jp-trackinfo .commentvideo').width();
						$('#popupSongVideo .jp-trackinfo .commentvideo').css('margin-left', (-1 * (width/2)));

						/* set iframe to pop up */
						$('#center .iframe').html(iframe);
						
						/* get and set user name and link on pop up */
						var html = $('#jp_container_1 .jp-accountmenu ul li').html();
						var index = html.indexOf("Login");

						if(-1 == index) {
							$('#popupSongVideo #footer .jp-accountmenu ul li').html(html);
							$('#popupSongVideo #footer .jp-accountmenu').show();
							$('#popupSongVideo #footer .logout').show();
							$('#userLogout').click(function() {
								window.location = hostURL + '/logout.php';
							});
						} else {
							$('#popupSongVideo #footer .jp-accountmenu').hide();
							$('#popupSongVideo #footer .logout').hide();
						}
						
						/* get and set song name on pop up */
						var songName = $('#jp_container_1 .horizontal_scroller .scrollingtext').html();
						$('.jp-trackinfo .video-text').html(songName);
						
						$(window).resize(function () {
							$.colorbox.resize({width:'100%', height:'100%'});
							var height = $(window).height() - 287;
							$('#center').css({'height': height + 'px'});
							$('#center .iframe').css({'height': height + 'px'});
						});
					},
					onClosed: function() {
						$('#commentvideo').hide();
						
						$('#center .iframe iframe').attr('src', '');
					
						/* play main interface player only if it is not pause by user */
						if( '' == $.cookie('FORCEPAUSE') || null == $.cookie('FORCEPAUSE') ) {
							$.cookie('FORCEPAUSE', null, { path: '/' });
							$("#jquery_jplayer_1").jPlayer("play");
						}
					}
				});
			}
	});
}

function songVideoUserLoginCheck() {
}

function toggleSongVideoCommentBox() {
	$('#sngvideopvtmsg').hide();
	$("#videoPvtMsgConfirmbox").hide();
	$("#videoPvtMsgAlertbox").hide();
	$("#videoPvtMsgAlertbox2").hide();
	clearTimeout(alertTimer);

	if($('#commentvideo').css('display') == "none" ) {
		$.ajax({
			type: 'POST', url: siteURL + '/services.php', data: 'service_type=is_user_logged_in', cache: false,
			success:
				function(data) {
					if(0 == data) {
						clearTimeout(alertTimer);
						$('#videoCommentAlertbox2').show();
						alertTimer = setTimeout("$('#videoCommentAlertbox2').hide();", 5000);
					} else {
						$('#commentvideo').show();
						$('#commentvideo #songVideoComment').val('');
					}
				}
		});
	}
	else {
		$('#commentvideo').hide();
	}
}

function submitSongVideoComment() {
	clearTimeout(alertTimer);
	var videoComment = $.trim($('#songVideoComment').val());
	if('' == videoComment) {
		emptyVideoCommentValidation();
	} else {
		var array = { 
			'service_type' : 'submit_song_video_comment',
			'song_id' : $('#commentVideoSongId').val(),
			'comment' : videoComment
		};
		var dataString = $.param(array);
		
		$.ajax({
			type: 'POST', url: siteURL + '/services.php', data: dataString, cache: false,
			success:
				function(data) {
					var dataOBJ = jQuery.parseJSON(data);
						$('#songVideoComment').val('');
						var songName = $('#jp_container_1 .horizontal_scroller .scrollingtext').html();
						$('#videoCommentConfirmbox p').html("Your comment was added to <strong>" + dataOBJ.song_name + "</strong> by " + dataOBJ.musician_name + ".");
						$('#videoCommentConfirmbox').show();
						$("#commentvideo").hide();
						alertTimer = setTimeout('$("#videoCommentConfirmbox").hide();', 5000);
						$('#remLen2').val('321');
				}
		});
	}
}

function closeSongVideoCommentBox() {
	$("#commentvideo").hide();
	$("#videoCommentConfirmbox").hide();
}

function emptyVideoCommentValidation() {
	$('.alertmessagebox').hide();
	clearTimeout(alertTimer);
	$('#videoCommentAlertbox p').html('Please enter some text');
	$('#videoCommentAlertbox').show();
	$('#videoCommentAlertbox .alertlinks').hide();
	alertTimer = setTimeout("$('#videoCommentAlertbox').hide(); $('#videoCommentAlertbox .alertlinks').show();", 5000);
}

function closeVideoCommentAlertbox() {
	$("#videoCommentAlertbox").hide();
	clearTimeout(alertTimer);
}

function closeVideoCommentAlertbox2() {
	$("#videoCommentAlertbox2").hide();
	clearTimeout(alertTimer);
}


function playMainJPlayer() {
	var isPlayerPaused = $('#jquery_jplayer_1').data("jPlayer").status.paused;
	if(isPlayerPaused) {
		$("#jquery_jplayer_1").jPlayer("play");
	}
}


function toggleSongVideoPvtMsg() {
	$('#commentvideo').hide();
	$("#videoCommentConfirmbox").hide();
	$("#videoCommentAlertbox").hide();
	$("#videoCommentAlertbox2").hide();
	clearTimeout(alertTimer);
	
	if($('#sngvideopvtmsg').css('display') == "none" ) {
		$.ajax({
			type: 'POST', url: siteURL + '/services.php', data: 'service_type=is_user_logged_in', cache: false,
			success:
				function(data) {
					if(0 == data) {
						clearTimeout(alertTimer);
						$('#videoPvtMsgAlertbox2').show();
						alertTimer = setTimeout("$('#videoPvtMsgAlertbox2').hide();", 5000);
					} else {
						$('#sngvideopvtmsg').show();
						$('#sngvideopvtmsg #songVideoPvtMsg').val('');
					}
				}
		});
	}
	else {
		$('#sngvideopvtmsg').hide();
	}
}

function submitSongVideoPvtMsg() {
	clearTimeout(alertTimer);
	var pvtMsg = $.trim($('#songVideoPvtMsg').val());
	if('' == pvtMsg) {
		emptyVideoCommentValidation();
	} else {
		var array = { 
			'service_type' : 'send_video_pvt_msg',
			'song_id' : $('#VideoPvtMsgSongId').val(),
			'message' : pvtMsg
		};
		var dataString = $.param(array);
		$.ajax({
			type: 'POST', url: siteURL + '/services.php', data: dataString, cache: false,
			success:
				function(data) {
					var dataOBJ = jQuery.parseJSON(data);
					$('#songVideoPvtMsg').val('');
					$("#sngvideopvtmsg").hide();
					$('#videoPvtMsgConfirmbox p').html("Your message was delivered to <strong>" + dataOBJ.musician_name + "</strong> successfully!<br />Be sure to check your junk mail for replies.");
					$('#videoPvtMsgConfirmbox').show();
					alertTimer = setTimeout('$("#videoPvtMsgConfirmbox").hide();', 5000);
					$('#PvtMsgRemLen').val('321');
				}
		});
	}
}


function validateVideoPvtMsg() {
	$('.alertmessagebox').hide();
	clearTimeout(alertTimer);
	$('#videoPvtMsgAlertbox p').html('Please enter some text');
	$('#videoPvtMsgAlertbox').show();
	$('#videoPvtMsgAlertbox .alertlinks').hide();
	alertTimer = setTimeout("$('#videoPvtMsgAlertbox').hide(); $('#videoPvtMsgAlertbox .alertlinks').show();", 5000);
}

function closeVideoPvtMsgAlertbox2() {
	$("#videoPvtMsgAlertbox2").hide();
	clearTimeout(alertTimer);
}

function closeSongVideoPvtMsgBox() {
	$("#sngvideopvtmsg").hide();
	$("#videoPvtMsgConfirmbox").hide();
}

function closeSongVideoPvtMsgAlertbox() {
	$("#videoPvtMsgAlertbox").hide();
}

function setZoneJumpOutPath() {
	var array = { 
		'service_type' : 'set_zone_jumpout_path',
		'zone_jump_out_path' : window.location.pathname
	};

	var dataString = $.param(array);
	$.ajax({
		type: 'POST', url: siteURL + '/services.php', data: dataString, cache: false,
		success:
			function(data) {
				window.location = $('#zoneJumpInPath').val();
			}
	});
}

function unsetZoneJumpOutPath() {
	var array = { 
		'service_type' : 'unset_zone_jumpout_path'
	};
	var dataString = $.param(array);
	$.ajax({
		type: 'POST', url: siteURL + '/services.php', data: dataString, cache: false,
		success:
			function(data) {
				if('' == data) {
					// window.location = siteURL;
					openLifestyleMenu();
				} else {
					window.location = data;
				}
			}
	});
}

function removeZoneImage() {
	$('.image-preview').unbind('mouseover');
	$('.image-preview').unbind('mouseleave');
	
	$('.remove-image').hide();
	
	$('.billboardwrapper .image-preview p').css('display', 'block');
	$('#musi_edit_profile_zone_img').css('display', 'none');
	
	$('#musi_edit_zoneimage_path').val('');
}

/**
 * Function to load lifestyle pop-up
 */
function openLifestyleMenu() {
	/* Load Life style menu pop-up */
	$.colorbox({ 
		inline: true, href: '#lifestyle', width:'100%', height:'100%', transition: 'fade', scrolling: false, close: '', opacity: 1, overlayClose: false, 
		onComplete: function() {
			$('form').jqTransform();
			$('#cboxClose').attr('style', 'visibility: hidden');
		}, 
		onCleanup: function() {
			/* hack to avoid preload close button */
			$('#cboxClose').attr('style', 'visibility: hidden');
		}
	});
}

/**
 * Function to save selected life style
 *	After save redirect to selcted life style
 */
function saveLifestyleSelection(URL, id) {
	if($('#savemyselection').is(':checked')) {
		$.ajax({
			type: 'POST', url: siteURL + '/services.php', data: 'service_type=Save_lifestyle_selection&lifestyle_id=' + id, cache: false,
			success:
				function(data) {
					window.location = URL;
				}
		});
	} else {
		window.location = URL;
	}
}