(function($){

    Drupal.behaviors.dropmenu = {
    attach: function(context, settings) {


	$(".form-item-field-product-type-tid ul li a").click(function () {
       var setsecond = $(".form-item-field-vote-cycle-tid ul li:first").text();
	 $("input[type=text]#edit-title").val("");
   	$(".form-item-field-vote-cycle-tid span").text(setsecond);
	$("#edit-field-vote-cycle-tid option").removeAttr("selected");
	});


	$(".form-item-field-vote-cycle-tid ul li a").click(function () {
       var setfirst = $(".form-item-field-product-type-tid ul li:first").text();
	 $("input[type=text]#edit-title").val("");
   	$(".form-item-field-product-type-tid span").text(setfirst);
	$("#edit-field-product-type-tid option").removeAttr("selected");


	});


 	$("input[type='text']#edit-title").click( function() {

	var setfirst = $(".form-item-field-product-type-tid ul li:first").text();
	var setsecond = $(".form-item-field-vote-cycle-tid ul li:first").text();
	$(".form-item-field-product-type-tid span").text(setfirst);
	$(".form-item-field-vote-cycle-tid span").text(setsecond);
	
	});



	}
}

var a=$(".external-processed").attr('href');
alert(a)
})(jQuery);

