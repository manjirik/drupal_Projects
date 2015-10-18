function hartic_cycle(term_name1,term_name2){
jQuery(".accordion-inner").html("");
window.location.href = window.location.pathname + '#' + decodeURIComponent(term_name1);


		jQuery.ajax({
			url: Drupal.settings.basePath+'cycle_information_mobile?t1='+term_name1+'&t2='+term_name2,
			success:function(response) {
				var obj = jQuery.parseJSON(response);


				jQuery('.accordion-inner').html(obj.data_list);
				jQuery('.productContent').html(obj.data_value);

	
				jQuery('.list').on('click', callback);
				function callback()
				{
				      var get = jQuery(this).attr('get_value');
			             jQuery('.productContent').html(get);


					
				}

				jQuery(".in .list a").eq(0).addClass('activeli');

				jQuery('.list a').on('click', callback_color);
				function callback_color()
				{
					jQuery('.list').find('a').removeClass( 'activeli' );
					jQuery(this).addClass('activeli');
				}
	

			}
		
		});
		
}

jQuery(document).ready(function()
{

	jQuery(".accordion-toggle").on('click' ,function()
	{
		var get_image = jQuery(this).attr('image_value');
		jQuery(".MidInteTopImageArea img").attr('src' , get_image );
		//jQuery(".accordion-toggle").parent().find('.list').first().find('a').addClass('activeli');
	});


});          

