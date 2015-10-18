(function($){
    Drupal.behaviors.slider = {

		attach: function(context, settings) {
			$('.flexslider').flexslider({
				animation: "slide"
			});
		
		}
	}
})(jQuery);
