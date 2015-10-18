(function($){

    Drupal.behaviors.solutions = {

		attach: function(context, settings) {
			jQuery('#block-menu-menu-voting-solution-from-hart').each(function() {  
			  jQuery(this).wrapInner('<div class="Voting_solution"/>');
			});
			jQuery('.view-latestnews .views-row').each(function() {  
				var alink = jQuery(this).find('.views-field-field-external-url .field-content a').attr("href");
				var vlink = jQuery(this).find('.views-field-field-text-link .field-content a').attr("href");
				jQuery(this).find('.views-field-field-text-link .field-content a').attr('href',alink);
			});

	}}
})(jQuery);
