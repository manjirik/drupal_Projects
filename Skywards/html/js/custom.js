$(function(){
	$('#counter').countdown({
	  format: 'dd:hh:mm:ss',
	  image: 'images/digits.png',
	  startTime: '30:00:00:00'
	});
});

$(document).ready(function(){
	$('.hide-btm-content-btn').on('click', function(){
		$(this).hide();
		$('.social-toolbar-wrapper').animate({
			'margin-top': '0px'
		}, 1000 );
		$('.btm-content-box').slideUp(1000);	
		$('.show-btm-content-btn').show();
	});
	
	$('.show-btm-content-btn').on('click', function(){
		$(this).hide();
		$('.social-toolbar-wrapper').animate({
			'margin-top': '-170px'
		}, 1000 );
		$('.btm-content-box').slideDown(1000);	
		$('.hide-btm-content-btn').show();
	});
	
	$("#tab_1").fadeIn(1000);
	
	/*$("ul.tab-list li a").on('click', function(){
		$(".tab-content").hide();
		$("ul.tab-list li a").removeClass("selected");
		$(this).addClass("selected");
		$("#"+ $(this).attr('id').replace('link_', '')).fadeIn();	
	});*/
	
	$('.send-email-btn').on('click', function(){
		$('.send-email-popup').fadeIn('slow');	
	});
	
	$("body").click( function(e){
		if(e.target.className !== "send-email-popup" && e.target.className !== "send-email-field" && e.target.className !== "send-email-submit-btn") {
			$(".send-email-popup").hide();
		}
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
	
	var el = $('input[type=text], textarea');
	el.focus(function(e) {
		if (e.target.value == e.target.defaultValue)
			e.target.value = '';
	});
	el.blur(function(e) {
		if (e.target.value == '')
			e.target.value = e.target.defaultValue;
	});
	
	$('#submit_skyward_btn').on('click', function(){
		if( validateSkywardNumber() ){
			// call your function	
		}
	});
	
	$('#submit_new_skyward_btn').on('click', function(){
		if( validateNewSkywardRegistration() ){
			// call your function	
		}
	});
	
	
	function validateSkywardNumber() {
		var retVal = true;
		var el = $('input[name=skyward_number]');
		if( el.val() == '' || el.val() == 'Your Skywards number' ) {
			el.parents('.memc-input-wrapper').find('.memc-input-helper').html('• Please enter a 13-digit Skywards number').show();	
			el.focus();
			retVal = false;
		} else if ( !$.isNumeric( el.val() ) ) {
			el.parents('.memc-input-wrapper').find('.memc-input-helper').html('• Please enter only numbers').show();	
			el.focus();
			retVal = false;	
		} else{
			el.parents('.memc-input-wrapper').find('.memc-input-helper').hide();	
		}
		return retVal;
	}
	
	function validateNewSkywardRegistration() {
		var retVal = true;
		if( $('input[name=first_name]').val() == '' || $('input[name=first_name]').val() == 'First name' ) {
			$('input[name=first_name]').parents('.memc-input-wrapper').find('.memc-input-helper').html('• Please enter your first name').show();	
			$('input[name=first_name]').focus();
			retVal = false;
		} else if( $('input[name=last_name]').val() == '' || $('input[name=last_name]').val() == 'Last name' ) {
			$('input[name=last_name]').parents('.memc-input-wrapper').find('.memc-input-helper').html('• Please enter your last name').show();	
			$('input[name=last_name]').focus();
			retVal = false;
		} else if( $('input[name=city]').val() == '' || $('input[name=city]').val() == 'City name' ) {
			$('input[name=city]').parents('.memc-input-wrapper').find('.memc-input-helper').html('• Please choose your city of residence').show();	
			$('input[name=city]').focus();
			retVal = false;
		}else{
			$('input[name=city]').parents('.memc-input-wrapper').find('.memc-input-helper').hide();	
		}
		return retVal;
	}
	
	$(function() {
		var availableTags = [
			"Dubai",
			"Emirates",
			"Georgia",
			"Denmark"
		];
		$( "#destination_search" ).autocomplete({
			source: availableTags,
			minLength: 3,
			close: function( event, ui ) {
				alert($("#destination_search").val());	
			} 
		});
	});

});

function validateSendEmail(){
	if( $('input[name=fname]').val() == '' || $('input[name=fname]').val() == 'First Name' ) {
		$('input[name=fname]').css('border', '1px solid #ff0000');	
		$('input[name=fname]').focus();
		return false;
	} else {
		$('input[name=fname]').css('border', '1px solid #b1b1b1');
	}
	if( $('input[name=lname]').val() == '' || $('input[name=lname]').val() == 'Last Name' ) {
		$('input[name=lname]').css('border', '1px solid #ff0000');	
		$('input[name=lname]').focus();
		return false;
	} else {
		$('input[name=lname]').css('border', '1px solid #b1b1b1');
	}
	if( $('input[name=email]').val() == '' || $('input[name=email]').val() == 'Email Address' ) {
		$('input[name=email]').css('border', '1px solid #ff0000');	
		$('input[name=email]').focus();
		return false;
	} else {
		$('input[name=email]').css('border', '1px solid #b1b1b1');
	}
	var regex = /^[\w\.\-]+@([\w\-]+\.)+[a-zA-Z]+$/;
	if(regex.test($('input[name=email]').val()) == false ){
		$('input[name=email]').css('border', '1px solid #ff0000');	
		$('input[name=email]').focus();
		return false;
	} else {
		$('input[name=email]').css('border', '1px solid #b1b1b1');
	} 
	return true;
}
