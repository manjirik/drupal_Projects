$(function() {
	/*
	number of fieldsets
	*/
	var fieldsetCount = $('#formElem').children().length;
	
	/*
	current position of fieldset / navigation link
	*/
	var current 	= 1;
    
	/*
	sum and save the widths of each one of the fieldsets
	set the final sum as the total width of the steps element
	*/
	var stepsWidth	= 0;
    var widths 		= new Array();
	$('#steps .step').each(function(i){ 
        var $step 		= $(this);
		widths[i]  		= stepsWidth;
        stepsWidth	 	+= $step.width();
    });
	$('#steps').width(stepsWidth);
	
	/*
	to avoid problems in IE, focus the first input of the form
	*/
	$('#formElem').children(':first').find(':input:first').focus();	
	
	/*
	show the navigation bar
	*/
	$('#navigation1').show();
	
	/*
	when clicking on a navigation link 
	the form slides to the corresponding fieldset
	*/
	
	
    $('#navigation1 a, #navigation2 a, #navigation3 a').bind('click',function(e){
 		//var $this	= $(this);	
		
/*		var prev	= current;
		$this.closest('ul').find('li').removeClass('selected');
        $this.parent().addClass('selected');
		 
*/		/*
		we store the position of the link
		in the current variable	
		*/
		//current = $this.parent().index() + 1;
		//current = current+ 1;
		/*
		animate / slide to the next or to the corresponding
		fieldset. The order of the links in the navigation
		is the order of the fieldsets.
		Also, after sliding, we trigger the focus on the first 
		input element of the new fieldset
		If we clicked on the last link (confirmation), then we validate
		all the fieldsets, otherwise we validate the previous one
		before the form slided
		
         $('#steps').stop().animate({								   
            marginLeft: '-' + widths[current-1] + 'px'
        },500,function(){ 
			 
			$('#formElem').children(':nth-child('+ parseInt(current) +')').find(':input:first').focus();	
		});
        e.preventDefault();*/
    });
	
	/*
	clicking on the tab (on the last input of each fieldset), makes the form
	slide to the next step
	*/
	/*$('#formElem > fieldset').each(function(){
		var $fieldset = $(this);
		$fieldset.children(':last').find(':input').keydown(function(e){
			if (e.which == 9){
				$('#navigation li:nth-child(' + (parseInt(current)+1) + ') a').click();
				
				$(this).blur();
				e.preventDefault();
			}
		});
	});*/
	
	/*
	validates errors on all the fieldsets
	records if the Form has errors in $('#formElem').data()
	*/
	/*function validateSteps(){
		var FormErrors = false;
		for(var i = 1; i < fieldsetCount; ++i){
			var error = validateStep(i);
			if(error == -1)
				FormErrors = true;
		}
		$('#formElem').data('errors',FormErrors);	
	}*/
	
	/*
	validates one fieldset
	and returns -1 if errors found, or 1 if not
	*/
	/*function validateStep(step){
		if(step == fieldsetCount) return;
		
		var error = 1;
		var hasError = false;
		$('#formElem').children(':nth-child('+ parseInt(step) +')').find(':input:not(button)').each(function(){
			var $this 		= $(this);
			var valueLength = jQuery.trim($this.val()).length;
			
			if(valueLength == ''){
				hasError = true;
				$this.css('background-color','#FFEDEF');
			}
			else
				$this.css('background-color','#FFFFFF');	
		});
		var $link = $('#navigation li:nth-child(' + parseInt(step) + ') a');
		$link.parent().find('.error,.checked').remove();
		
		var valclass = 'checked';
		if(hasError){
			error = -1;
			valclass = 'error';
		}
		$('<span class="'+valclass+'"></span>').insertAfter($link);
		
		return error;
	}*/
	
	/*
	if there are errors don't allow the user to submit
	*/
	/*$('#registerButton').bind('click',function(){
		if($('#formElem').data('errors')){
			alert('Please correct the errors in the Form');
			return false;
		}	
	});*/
});

function slide_reg_form(liVal)
{ 
	var fieldsetCount = $('#formElem').children().length;
	
	var current 	= 1;
    
	var stepsWidth	= 0;
    var widths 		= new Array();
	$('#steps .step').each(function(i){ 
        var $step 		= $(this);
		widths[i]  		= stepsWidth;
        stepsWidth	 	+= $step.width();
    });
	$('#steps').width(stepsWidth);
	
	$('#formElem').children(':first').find(':input:first').focus();	
	
	$('#navigation1').show();
	
	current = liVal;
	 $('#steps').stop().animate({								   
		marginLeft: '-' + widths[current-1] + 'px'
	},500,function(){ 
		 
		$('#formElem').children(':nth-child('+ parseInt(current) +')').find(':input:first').focus();	
	});

}

function slide_song_status(liVal)
{ 
	var fieldsetCount = $('#song_content').children().length;
	//alert(fieldsetCount)
	var current 	= 1;
    
	var stepsWidth	= 0;
    var widths 		= new Array();
	$('#song_content .step').each(function(i){ 
        var $step 		= $(this);
		widths[i]  		= stepsWidth;
        stepsWidth	 	+= $step.width();
    });
	$('#song_content').width(stepsWidth+48);
	
	$('#song_content').children(':first').focus();	
	
	$('#navigation1').show();
	
	if(parseInt(liVal) > 0)
	{
		current = liVal;
		 $('#song_content').stop().animate({								   
			marginLeft: '-' + widths[current-1] + 'px'
		},500,function(){ 
			$('#song_content').children(':nth-child('+ parseInt(current) +')').focus();
			//$('#slide_song_status_prev').attr("onClick", "slide_song_status("+$('#song_content').children(':nth-child('+ parseInt(current) +')').children('#slide_song_status_prev_hid').val()+")");	
			//$('#slide_song_status_next').attr("onClick", "slide_song_status("+$('#song_content').children(':nth-child('+ parseInt(current) +')').children('#slide_song_status_next_hid').val()+")");
			var prev = $('#song_content').children().children(':nth-child('+ parseInt(current) +')').children('#slide_song_status_prev_hid').val();
			var next = $('#song_content').children().children(':nth-child('+ parseInt(current) +')').children('#slide_song_status_next_hid').val();
			if(prev != '')
			{
				$('#slide_song_status_prev_li').html('<a id="slide_song_status_prev" class="btnDkGry" href="javascript:void(0);" onclick="slide_song_status('+prev+')">prev</a>');	
			}
			else
			{
				$('#slide_song_status_prev_li').html('');
			}
			if(next != '')
			{
				$('#slide_song_status_next_li').html('<a id="slide_song_status_next" class="btnDkGry" href="javascript:void(0);" onclick="slide_song_status('+next+')">next</a>');
			}
			else
			{
				$('#slide_song_status_next_li').html('');
			}
		});
	}
}

function slide_adv_status(liVal)
{ 
	var fieldsetCount = $('#adv_content').children().length;
	//alert(fieldsetCount)
	var current 	= 1;
    
	var stepsWidth	= 0;
    var widths 		= new Array();
	$('#adv_content .step').each(function(i){ 
        var $step 		= $(this);
		widths[i]  		= stepsWidth;
        stepsWidth	 	+= $step.width();
    });
	$('#adv_content').width(stepsWidth+48);
	
	$('#adv_content').children(':first').focus();	
	
	$('#navigation1').show();
	
	if(parseInt(liVal) > 0)
	{
		current = liVal;
		 $('#adv_content').stop().animate({								   
			marginLeft: '-' + widths[current-1] + 'px'
		},500,function(){ 
			$('#adv_content').children(':nth-child('+ parseInt(current) +')').focus();
			//$('#slide_adv_status_prev').attr("onClick", "slide_adv_status("+$('#adv_content').children(':nth-child('+ parseInt(current) +')').children('#slide_adv_status_prev_hid').val()+")");	
			//$('#slide_adv_status_next').attr("onClick", "slide_adv_status("+$('#adv_content').children(':nth-child('+ parseInt(current) +')').children('#slide_adv_status_next_hid').val()+")");
			var prev = $('#adv_content').children().children(':nth-child('+ parseInt(current) +')').children('#slide_adv_status_prev_hid').val();
			var next = $('#adv_content').children().children(':nth-child('+ parseInt(current) +')').children('#slide_adv_status_next_hid').val();
			if(prev != '')
			{
				$('#slide_adv_status_prev_li').html('<a id="slide_adv_status_prev" class="btnDkGry" href="javascript:void(0);" onclick="slide_adv_status('+prev+')">prev</a>');	
			}
			else
			{
				$('#slide_adv_status_prev_li').html('');
			}
			if(next != '')
			{
				$('#slide_adv_status_next_li').html('<a id="slide_adv_status_prev" class="btnDkGry" href="javascript:void(0);" onclick="slide_adv_status('+next+')">next</a>');
			}
			else
			{
				$('#slide_adv_status_next_li').html('');
			}
			
		});
	}
}


function slide_add_song(liVal,type)
{ 
	var fieldsetCount = $('#add_song_content').children().length;
	var current 	= 1;
    
	var stepsWidth	= 0;
    var widths 		= new Array();
	$('#add_song_content .step').each(function(i){ 
        var $step 		= $(this);
		widths[i]  		= stepsWidth;
        stepsWidth	 	+= $step.width();
    });
	$('#add_song_content').width(stepsWidth+48);
	
	$('#add_song_content').children(':first').focus();	
	
	//$('#navigation1').show();
	
	if(parseInt(liVal) > 0)
	{
		var flag = 0;
		if(type != 'prev')
		{
		var song_name_str = dotrim(document.upload_song.song_name[liVal-2].value);
		var song_file_path_str = dotrim(document.upload_song.song_add_path[liVal-2].value);
		if(song_name_str=="")
		{
			$('#add_song_content').children().children(':nth-child('+ parseInt(liVal-1) +')').children().children().children().children().children('.err_song_add_title').html("Please fill song title");
			$('#add_song_content').children().children(':nth-child('+ parseInt(liVal-1) +')').children().children().children().children().children('.err_song_add_title').fadeIn(400);
			$('#add_song_content').children().children(':nth-child('+ parseInt(liVal-1) +')').children().children().children().children().children('.err_song_add_title').delay(5000).fadeOut(400);
			flag = 1;
		}
		else if(song_file_path_str=="")
		{
			$('#add_song_content').children().children(':nth-child('+ parseInt(liVal-1) +')').children().children().children().children('.err_song_add_file').html("Please upload song file");
			$('#add_song_content').children().children(':nth-child('+ parseInt(liVal-1) +')').children().children().children().children('.err_song_add_file').fadeIn(400);
			$('#add_song_content').children().children(':nth-child('+ parseInt(liVal-1) +')').children().children().children().children('.err_song_add_file').delay(5000).fadeOut(5000);
			flag = 1;
		}
		}
		if(flag == 0)
		{
			current = liVal;
			 $('#add_song_content').stop().animate({								   
				marginLeft: '-' + widths[current-1] + 'px'
			},500,function(){ 
				$('#add_song_content').children(':nth-child('+ parseInt(current) +')').focus();
				
				var prev = $('#add_song_content').children().children(':nth-child('+ parseInt(current) +')').children('#slide_add_song_prev_hid').val();
				var next = $('#add_song_content').children().children(':nth-child('+ parseInt(current) +')').children('#slide_add_song_next_hid').val();
				if(prev != '')
				{
					$('#slide_add_song_prev').html('<a class="btnDkGry" href="javascript:void(0);" onclick="slide_add_song('+prev+',\'prev\')">prev</a>');	
				}
				else
				{
					$('#slide_add_song_prev').html('');
				}
				if(next != '')
				{
					$('#slide_add_song_next').parent().html('<a id="slide_add_song_next" class="addSong" href="javascript:void(0);" onclick="slide_add_song('+next+',\'next\')">Upload Another Track</a>');	
					//$('#slide_add_song_next').attr("onClick", "slide_add_song("+next+",'next')");
					//alert($('#slide_add_song_next').attr("onClick"))
				}
				else
				{
					//$('#slide_add_song_next').attr("onClick", "slide_add_song()");
					$('#slide_add_song_next').parent().html('<a id="slide_add_song_next" class="addSong" href="javascript:void(0);" onclick="slide_add_song()">Upload Another Track</a>');	
				}
			});
		}
	}
}


function slide_add_adv(liVal,type)
{ 
	var fieldsetCount = $('#add_adv_content').children().length;
	//alert(fieldsetCount)
	var current 	= 1;
    
	var stepsWidth	= 0;
    var widths 		= new Array();
	$('#add_adv_content .step').each(function(i){ 
        var $step 		= $(this);
		widths[i]  		= stepsWidth;
        stepsWidth	 	+= $step.width();
    });
	$('#add_adv_content').width(stepsWidth+48);
	
	$('#add_adv_content').children(':first').focus();	
	
	//$('#navigation1').show();
	
	if(parseInt(liVal) > 0)
	{
		var flag = 0;
		if(type != 'prev')
		{
		adv_name_str = dotrim(document.upload_adv.adv_name[liVal-2].value);
		adv_file_path_str = dotrim(document.upload_adv.adv_add_path[liVal-2].value);
		if(adv_name_str=="")
		{
			$('#add_adv_content').children().children(':nth-child('+ parseInt(liVal-1) +')').children().children().children().children().children('.err_adv_add_title').html("Please fill Ad title");
			$('#add_adv_content').children().children(':nth-child('+ parseInt(liVal-1) +')').children().children().children().children().children('.err_adv_add_title').fadeIn(400);
			$('#add_adv_content').children().children(':nth-child('+ parseInt(liVal-1) +')').children().children().children().children().children('.err_adv_add_title').delay(5000).fadeOut(400);
			flag = 1;
		}
		else if(adv_file_path_str=="")
		{
			$('#add_adv_content').children().children(':nth-child('+ parseInt(liVal-1) +')').children().children().children().children('.err_adv_add_file').html("Please upload advertise file");
			$('#add_adv_content').children().children(':nth-child('+ parseInt(liVal-1) +')').children().children().children().children('.err_adv_add_file').fadeIn(400);
			$('#add_adv_content').children().children(':nth-child('+ parseInt(liVal-1) +')').children().children().children().children('.err_adv_add_file').delay(5000).fadeOut(5000);
			flag = 1;
		}
		}
		if(flag == 0)
		{
			current = liVal;
			 $('#add_adv_content').stop().animate({								   
				marginLeft: '-' + widths[current-1] + 'px'
			},500,function(){ 
				$('#add_adv_content').children(':nth-child('+ parseInt(current) +')').focus();
				var prev = $('#add_adv_content').children().children(':nth-child('+ parseInt(current) +')').children('#slide_add_adv_prev_hid').val();
				var next = $('#add_adv_content').children().children(':nth-child('+ parseInt(current) +')').children('#slide_add_adv_next_hid').val();
				if(prev != '')
				{
					$('#slide_add_adv_prev').html('<a class="btnDkGry" href="javascript:void(0);" onclick="slide_add_adv('+prev+',\'prev\')">prev</a>');	
				}
				else
				{
					$('#slide_add_adv_prev').html('');
				}
				if(next != '')
				{
					//$('#slide_add_adv_next').attr("onClick", "slide_add_adv("+next+",'next')");
					$('#slide_add_adv_next').parent().html('<a id="slide_add_adv_next" class="addSong" href="javascript:void(0);" onclick="slide_add_adv('+next+',\'next\')">Upload Another Ad</a>');	
				}
				else
				{
					//$('#slide_add_adv_next').attr("onClick", "slide_add_adv()");
					$('#slide_add_adv_next').parent().html('<a id="slide_add_adv_next" class="addSong" href="javascript:void(0);" onclick="slide_add_adv()">Upload Another Ad</a>');	
				}
			});
		}
	}
}
