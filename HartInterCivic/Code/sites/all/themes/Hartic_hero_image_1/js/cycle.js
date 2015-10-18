function hartic_cycle(term_name1,term_name2){
		
		window.location.href = window.location.pathname + '#' + decodeURIComponent(term_name1);
		
		
		jQuery.ajax({
			url: Drupal.settings.basePath+'cycle_information?t1='+term_name1+'&t2='+term_name2,
			success:function(response) {
				var obj = jQuery.parseJSON(response);
				jQuery('.benifit1').html(obj);
				jQuery("ul.dynamic li:first").addClass('activeli');
				
			}	
		});
		
			
}


jQuery(document).ready(function()
{

	jQuery(".get_content").live('click' ,function()
	{
		 var get = jQuery(this).attr('get_value');
		jQuery(".benifit1withTextMain ").html(get);
		jQuery(".dynamic li").parent().find('li').removeClass("activeli");
		jQuery(this).addClass('activeli');

	});


	jQuery(".verifyOverviewMiddleNav ul li").live('click', function()
	{
		var get_image = jQuery(this).attr('image_value');
		jQuery(".MidInteTopImageArea img").attr('src' , get_image );

		 
	});

});