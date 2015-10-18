jQuery(document).ready(function() {
	/* Home page share option show hide function*/
	jQuery('#share-this').click(function(){
		jQuery('#share-option').toggle();
	});
	
	/* video page share this control  */
	jQuery('.share-me').click(function(){
		jQuery(this).children('.share-option-me').toggle();
	});
	
	/* Dynamic update video url,width and height on video page   */
	jQuery('#block-views-home-page-block-4 .target').each(function(){
		var new_URL = jQuery(this).find('.media-youtube-player').attr('src') + "?autoplay=0&controls=0&showinfo=0&rel=0";
		jQuery(this).find('.media-youtube-player').attr('src', new_URL);
		jQuery(this).find('.media-youtube-player').attr('width', '628px');
		jQuery(this).find('.media-youtube-player').attr('height', '352px');
		
	});
	
	
		
});
	
	
          