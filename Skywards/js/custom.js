$(document).ready(function(){
	//$(".memc-btn-wrapper").next().hide();
	
	/*$(".memc-btn-wrapper").click(function(e){
		$(this).next().slideToggle();
		$(this).toggleClass("btn-wrapper");
		$(this).toggleClass("memc-btn-wrapper");
		e.preventDefault();
		});*/
	
	$("input[name=year]").blur(function(){
		if($(this).val()!=""&&$(this).val()!="YY"){
			if($.trim($(this).val()).length<=3){
				$(this).val(2000+parseInt($(this).val()))
				}
		       }
			})	
	
	$("input[name=date]").blur(function(){
		if($(this).val()!=""&&$(this).val()!="DD"){
			if($.trim($(this).val()).length<2){
				$(this).val(0+$(this).val())
				}
		       }
			})	
			
	$("input[name=month]").blur(function(){
	if($(this).val()!=""&&$(this).val()!="DD"){
		if($.trim($(this).val()).length<2){
			$(this).val(0+$(this).val())
			}
		   }
		})			
	
	$(".defaultText").focus(function(srcc)
    {
        if ($(this).val() == $(this)[0].title)
        {
            $(this).removeClass("defaultTextActive");
            $(this).val("");
        }
    });
    
    $(".defaultText").blur(function()
    {
        if ($(this).val() == "")
        {
            $(this).addClass("defaultTextActive");
            $(this).val($(this)[0].title);
        }
    });
    
    $(".defaultText").blur();   
	
	/////////////////////////////////////////////////////////

	$('.hide-btm-content-btn').on('click', function(){
		$(this).hide();
		$('#gmap').animate({
			'height': '715px'
		});
		$('#map_canvas').animate({
			'height': '715px'
		});
		$('.show-btm-content-btn').show();
	});
	
	$('.show-btm-content-btn').on('click', function(){
		$(this).hide();
		$('#gmap').animate({
			'height': '622px'
		});
		$('#map_canvas').animate({
			'height': '622px'
		});
		$('.hide-btm-content-btn').show();
	});
	
	$("#tab_1").fadeIn(1000);
	
	/*$("ul.tab-list li a").on('click', function(){
		$(".tab-content").hide();
		$("ul.tab-list li a").removeClass("selected");
		$(this).addClass("selected");
		$("#"+ $(this).attr('id').replace('link_', '')).fadeIn();	
	});*/
	
	$('.btm-content-send-email-wrapper').on('click', function(){
		$('input[name=fname]').val(''); 
		$('input[name=lname]').val(''); 
		$('input[name=email]').val(''); 
		$('.ltBox').show();
		$('.send-email-popup').fadeIn('slow');
	});
	
	$(".addEmail").on('click',function(){
		var idThis=$(this).attr('id');
		var idThis1=idThis.split('_');
		var index=idThis1[1];
		$("#EmailIndex").val(index);
		$('input[name=fname]').val('');
		$('input[name=lname]').val(''); 
		$('input[name=email]').val(''); 
		$('.ltBox').show();
		$('.send-email-popup').fadeIn('slow');		
	});
	
	if( $('.tc-content').length > 0 ) {
		$('.tc-content').jScrollPane();
	}
	
	if( $('.footer-nav-gallery ul').length > 0 ) {
		$('.footer-nav-gallery ul').bxSlider({
			mode: 'fade',
			captions: true
		});
	}
	
	$('.tc-top-scroll').on('click', function(){
		$('.jspPane').css('top', 0);
		$('.jspDrag').css('top', 0);
	});
	
	$('ul.memc-right-panel li a').on('click', function(){
		if( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
			$(this).next('div.memc-right-panel-list-content').slideUp(500);	
		} else {
			$(this).addClass('selected');
			$(this).next('div.memc-right-panel-list-content').slideDown(1000);	
		}
	});
	
	$('.ltBoxPopup .close').on('click', function(){
		hide_video_popup();
	});
	
	
	
	var el = $('input[type=text]');
	el.focus(function(e) {
		if (e.target.value == e.target.defaultValue)
			e.target.value = '';
	});
	el.blur(function(e) {
		if (e.target.value == '')
			e.target.value = e.target.defaultValue;
	});
	
	/*$('.destSrch h2').on('click', function(){
		if( $('#scrollbar2').css('display') == 'none' ){
			$('#scrollbar2').show();
			$('.destSrch').css('height', '255px');
		} else{
			$('#scrollbar2').hide();
			$('.destSrch').css('height', '14px');
		}
	});

	$('.unloctdFrnds h2').on('click', function(){
		if( $('#scrollbar1').css('display') == 'none' ){
			$('#scrollbar1').show();
			$('.unloctdFrnds').css('height', '255px');
		} else{
			$('#scrollbar1').hide();
			$('.unloctdFrnds').css('height', '14px');
		}
	});*/
	
	$('#watch_video_btn').on('click', function(){
		$('#video_popup').show();
		$('.ltBox').show();
	});
	
	$('#video_popup').find('.close').on('click', function(){
		$('#video_popup').hide();
		$('.ltBox').hide();
	});
	
	$('#select_your_destination_link').on('click', function(){
		//$('.landContWrap').hide();
	});
	$(".dob input").keyup(function(event) { 
        // Allow: backspace, delete, tab, escape, and enter
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
				
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
				 $(".dob input").parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter Valid Date.').show();	
				 $(this).val("");
               return false;
            }   
        }
    });
});



function show_video_popup() {		 
	$('.ltBox').show();
	$('.ltBoxPopup').show();
 }
 
 function hide_video_popup() {
	 $('.send-email-helper').html('');	
	 $('.ltBox').hide();
	$('.ltBoxPopup').hide();
 }
 
 function validateSkywardNumber() {
	var retVal = true;
	var el = $('input[name=vmn]');
	if( el.val() == '' || el.val() == 'Your Skywards number' ) {
		el.parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter a 13-digit Skywards number').show();	
		el.focus();
		retVal = false;
	} else if ( !$.isNumeric( el.val() ) ) {
		el.parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter only numbers').show();	
		el.focus();
		retVal = false;	
	} else{
		el.parents('.memc-input-wrapper').find('.memc-input-helper').hide();	
	}

	if(retVal){
	var checked = false;
	 
	 /*$("input[name=reg_answer]").each(function(){
		 if($(this).attr('checked')=='checked')checked=true;
		 }) ;*/
	 
	 var vals=document.getElementsByName('reg_answer_validate');
	 for(i=0;i<vals.length; i++)
	 {
	  if(vals[i].checked)
	  {
	   checked=true;
	   break;
	  }
	 }
	 
	 if(checked==false){
		 $('input[name=reg_answer_validate]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please choose contries does  Emirates fly').show();	
			$('input[name=reg_answer_validate]').focus();
			retVal = false;
	 }
	}
	if(retVal)
	{

	var tnc_val=document.getElementById("tnc_validate").checked;
	if(tnc_val==false){
		$('input[name=tnc_validate]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please accept terms and conditions').show();	
		$('input[name=tnc_validate]').focus();
		retVal = false;
	}
	}
	return retVal;
}


function validateNewSkywardRegistration() {
	var regex = /^[\w\.\-]+@([\w\-]+\.)+[a-zA-Z]+$/;
	if( $('select[name=title]').val() == '' || $('select[name=title]').val() == 'Title...' ) {
		$('select[name=title]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter your title').show();	
		$('select[name=title]').focus();
		return false;
	} 
	
	if( $.trim($('input[name=fn]').val()) == '' || $('input[name=fn]').val() == 'First name' ) {
		$('input[name=fn]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter your first name').show();	
		$('input[name=fn]').focus();
		return false;
	} 
	
	if( $.trim($('input[name=ln]').val()) == '' || $('input[name=ln]').val() == 'Last name' )  {
		$('input[name=ln]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter your last name').show();	
		$('input[name=ln]').focus();
		return false;
	}
	
	if( $('select[name=country]').val() == '' || $('select[name=country]').val() == 'Country...' ) {
		$('select[name=country]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter your country').show();	
		$('select[name=country]').focus();
		return false;
	} 
	
	if( $('input[name=month]').val() == '' || $('input[name=month]').val() == 'MM' ) {
		$('input[name=month]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter your Birth Month').show();	
		$('input[name=month]').focus();
		
		return false;
	}/*else if( !$.isNumeric( el.val() ) ) {
		$('input[name=month]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter your Birth Month').show();	
		$('input[name=month]').focus();
		return false;
	} */
	
	if( $('input[name=date]').val() == '' || $('input[name=date]').val() == 'DD' ) {
		$('input[name=date]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter your Birth Date').show();	
		$('input[name=date]').focus();
		return false;	
		} 
		
		if( $('input[name=year]').val() == '' || $('input[name=year]').val() == 'YYYY' ) {
		$('input[name=year]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter your Birth Year').show();	
		$('input[name=year]').focus();
		return false;
		} 
		
		var month = parseFloat($('input[name=month]').val());
		var date = parseFloat($('input[name=date]').val());
		var year = parseInt($('input[name=year]').val());
		var errordiv = $('.memc-input-helper').eq(1);
	    var today = new Date();
		
               		if(year > today.getFullYear()){
						  //  alert("Invalid date");
						    errordiv.html('Please enter your Valid Date').show();
                            $(this).val("");
                            return false;
						}else if(year == today.getFullYear()){
							if(month>(today.getMonth()+1)){
								//	alert("Invalid date");
									errordiv.html('Please enter your Valid Date').show();
									$(this).val("");
									return false;								
								}else if(date>today.getDate()){
									//	alert("Invalid date");
									 	errordiv.html('Please enter your Valid Date').show();
										$(this).val("");
										return false;								
									}
							}
                    if (month > 12 || month < 1 || date < 1) {
                //        alert("Invalid date");
                    	 errordiv.html('Please enter your Valid Date').show();
                        $(this).val("");
                        return false;
                    }
                    if (month == 4 || month == 6 || month == 9 || month == 11) {
                        if (parseInt(date) > 30) {
                     //       alert("Invalid date");
                        	errordiv.html('Please enter your Valid Date').show();
                            $(this).val("");
                            return false;
                        }
                    }
                    else if (month == 1 || month == 3 || month == 5 || month == 7 || month == 8 || month == 10 || month == 12) {
                        if (parseInt(date) > 31) {
                    //        alert("Invalid date");
                        	errordiv.html('Please enter your Valid Date').show();
                            $(this).val("");
                            return false;
                        }
                    }
                    else if (month == 2) {
                        if (parseInt(year) % 4 == 0) {
                            if (parseInt(date) > 29) {
                   //             alert("Invalid date");
                            	errordiv.html('Please enter your Valid Date').show();
                                $(this).val("");
                                return false;
                            }
                        }
                        else {
                            if (parseInt(date) > 28) {
                        //        alert("Invalid date");
                            	errordiv.html('Please enter your Valid Date').show();
                                $(this).val("");
                                return false;
                            }
                        }
                    }
                    
		if( $.trim($('input[name=email]').val()) == '' || $('input[name=email]').val() == 'Email' ) {
		$('input[name=email]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter your Valid Email Address').show();	
		$('input[name=email]').focus();
		return false;
	} else if(regex.test($('input[name=email]').val()) == false ){
		$('input[name=email]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter your Valid Email Address').show();	
		$('input[name=email]').focus();
		return false;
	}
	
	if( $('input[name=pwd]').val() == '')  {
		$('input[name=pwd]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter your password').show();	
		$('input[name=pwd]').focus();
		return false;
	}
	
	if( $('input[name=confirm_pwd]').val() == '')  {
		$('input[name=confirm_pwd]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please confirm your password').show();	
		$('input[name=confirm_pwd]').focus();
		return false;
	}
	
	if( $('input[name=pwd]').val()!=$('input[name=confirm_pwd]').val())  {
		$('input[name=pwd]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Password and confirm password are not matching').show();	
		$('input[name=pwd]').focus();
		return false;
	}
	
	if( $('input[name=pwd]').val().length < 7 || $('input[name=pwd]').val().search(/[0-9]/)== -1 || $('input[name=pwd]').val().search(/[a-z]/)== -1  || $('input[name=pwd]').val().length > 50)  {
		$('input[name=pwd]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Password should have at least one lower case alphabet (a-z)<br/>Password should have at least one digit (0-9)<br/>Password length should be at least min Min 7 and Max 50 character').show();	
		$('input[name=pwd]').focus();
		return false;
	}
	
	 var checked = false;
	 
	 /*$("input[name=reg_answer]").each(function(){
		 if($(this).attr('checked')=='checked')checked=true;
		 }) ;*/
	 
	 var vals=document.getElementsByName('reg_answer');
	 for(i=0;i<vals.length; i++)
	 {
	  if(vals[i].checked)
	  {
	   checked=true;
	   break;
	  }
	 }
	 
	 if(checked==false){
		 $('input[name=reg_answer]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please choose contries does  Emirates fly').show();	
			$('input[name=reg_answer]').focus();
			return false;
	 }
	 
	 tnc_val=document.getElementById("tnc").checked;
	 if(tnc_val==false){
			$('input[name=tnc]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please accept terms and conditions').show();	
			$('input[name=tnc]').focus();
			return false;
		}
	 
	/*if( !($('input[name=tnc]').attr('checked')))  {
		$('input[name=tnc]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please accept terms and conditions').show();	
		$('input[name=tnc]').focus();
		return false;
	}*/
	
	 if( $('input[name=country]').val() == '' || $('input[name=country]').val() == 'City name' ) {
		$('input[name=country]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please choose your city of residence').show();	
		$('input[name=country]').focus();
		return false;
	}
	
	return true;
}
/*function validateNewSkywardRegistration() {
	var retVal = true;
	if( $('input[name=fn]').val() == '' || $('input[name=fn]').val() == 'First name' ) {
		$('input[name=fn]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter your first name').show();	
		$('input[name=fn]').focus();
		retVal = false;
	} else if( $('input[name=ln]').val() == '' || $('input[name=ln]').val() == 'Last name' ) {
		$('input[name=ln]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please enter your last name').show();	
		$('input[name=ln]').focus();
		retVal = false;
	} else if( $('input[name=country]').val() == '' || $('input[name=country]').val() == 'City name' ) {
		$('input[name=country]').parents('.memc-input-wrapper').find('.memc-input-helper').html('Please choose your city of residence').show();	
		$('input[name=country]').focus();
		retVal = false;
	}else{
		$('input[name=country]').parents('.memc-input-wrapper').find('.memc-input-helper').hide();	
	}
	return retVal;
}*/
// validation for my entry stories form
function validateMyEntryStories() {
	var retVal = true;
	if( $.trim($('textarea#enrty_story').val()) == '' ) {
		$('.my-entries-error').show();
		$('textarea#enrty_story').focus();
		retVal = false;
	} else{
		$('.my-entries-error').hide();
	}
	return retVal;
}


// validate send email
function validateSendEmail(){ //send-email-btn
	if( $('input[name=fname]').val() == '' || $('input[name=fname]').val() == 'First Name' ) {
		$('.send-email-helper').html('Please enter your First Name').show();	
		$('input[name=fname]').focus();
		return false;
	} else {
		$('input[name=fname]').css('border', '1px solid #b1b1b1');
	}
	if( $('input[name=lname]').val() == '' || $('input[name=lname]').val() == 'Last Name' ) {
		$('.send-email-helper').html('Please enter your Last Name').show();	
		$('input[name=lname]').focus();
		return false;
	} else {
		$('input[name=lname]').css('border', '1px solid #b1b1b1');
	}
	if( $('input[name=email]').val() == '' || $('input[name=email]').val() == 'Email Address' ) {
		$('.send-email-helper').html('Please enter your Email Address').show();	
		$('input[name=email]').focus();
		return false;
	} else {
		$('input[name=email]').css('border', '1px solid #b1b1b1');
	}
	var regex = /^[\w\.\-]+@([\w\-]+\.)+[a-zA-Z]+$/;
	if(regex.test($('input[name=email]').val()) == false ){
		$('.send-email-helper').html('Please enter valid email address').show();	
		$('input[name=email]').focus();
		return false;
	} else {
		$('input[name=email]').css('border', '1px solid #b1b1b1');
		var fname_val = $('input[name=fname]').val(); 
		var lname_val = $('input[name=lname]').val(); 
		var email_val = $('input[name=email]').val(); 
	
		var email_val = $('input[name=email]').val(); 	
		var dataString = "fname=" + fname_val + "&lname=" + lname_val + "&email=" + email_val;    
		
		ChooseFriend('',fname_val,blank_prof_img,email_val,'','',fname_val+' '+lname_val);
		//$('.send-email-popup').hide();
		//$('.ltBoxPopup').hide();
		hide_video_popup();


		/*$.ajax
		(
			{  
				type: "POST", url: "index.php?r=wildcardFriend/store_email_user", data: dataString,  
				success:
					function(data)
					{
					  if(data=='fail')
						{
							 var data_msg_fail='Email address already exist. please use another email address.';
							$('.send-email-helper').html(data_msg_fail).show();	
						}
						else if(data=='success')
						{
						    var data_msg_succ='User data has been added successfully.';
						    $('.send-email-helper').html(data_msg_succ).show();	
						}
						else
						{
                         	 $('.send-email-helper').html("").show();	
						}
					  
					},
				error:
					function (XMLHttpRequest, textStatus, errorThrown)
					{
						 alert(XMLHttpRequest);
					}
			}
		);*/
	} 
	 
}

 function open_me(url, authorization,external) {
	alert(typeof(external)!='undefined' && external==1);
	return;
	if(typeof(external)!='undefined' && external==1)  {
		window.location=url;
		return;
	}
	
	
	var controller='';
	switch(url) {
		case 'mymap':
			controller='gmap/map_view_emerites_city';
		break;
		case 'myentries':
			controller='myentries/show_entries';
		break;
			 
		case "map_view":
			controller='gmap/map_view'; 
		break;
		case "gmap":
			controller='gmap/map_view_emerites_city';		
		break;
		case "n":
			controller='notification/index'; 
		break;
		case "terms":
			controller='landing/terms_and_conditions'; 
		break;
		case "privacy":
			controller='landing/privacy'; 
		break;
		case 'prizes':
			controller='landing/Prizes';
		break;
		case 'faq':
			controller='landing/Faq';
		break;
		
	
		
	}
	alert(url);
	alert(controller);
	if(controller=='') {
		window.location=SITE_URL;
	}
	
	if(typeof(authorization)!='undefined' && authorization==1) { 
		check_autorized_user(FB_PAGE_URL_PERMISSION,PERMISSION_SCOPE,controller);
	}
	
	else {
		window.location.href='index.php?r='+controller;
	}
 }

 /*Add function to change the css of the progress bar*/
 
  function changeProgressbar(widthClass,spantext){
			
			$('.progress-bar-status').css('width',widthClass);
			$("#progress-bar-wrapper #progressid").html(spantext);
		};

 /*code end for the progress bar */