(function($){

    Drupal.behaviors.menu = {
    attach: function(context, settings) {

  	  
	  	
	 /*------------------for cycle page----------------*/
	
	if(window.location.hash){
		var listItem = document.getElementById(window.location.hash);
		var index =  $('.accordion-group').index(listItem);
		$(".accordion-group .heading").eq(index).trigger('click');
		$(".accordion-group .heading").eq(index).addClass('Active');
		$(".accordion-group .accordion-body").eq(index).addClass('in');
		$(".accordion-group .accordion-body").eq(index).attr('style="height:auto;"');

   	 }
	$('.heading').on('click', function()
	{
		$(this).parent().parent().find('.heading').removeClass('Active');
		$(this).addClass('Active');
	});
      }
     }	
})(jQuery);