jQuery(document).ready(function()
{

	jQuery('.form-item-field-product-type-tid .jqTransformSelectWrapper').css('z-index', 3000);

	jQuery('.view-product-detail form .form-item.form-type-textfield.form-item-title').parent().addClass('searchWrapper');
		
	jQuery(".form-item-field-product-type-tid ul li a").click(function () {
       var setsecond = jQuery(".form-item-field-vote-cycle-tid ul li:first").text();
	 jQuery("input[type=text]#edit-title").val("");
   	jQuery(".form-item-field-vote-cycle-tid span").text(setsecond);
	jQuery("#edit-field-vote-cycle-tid option").removeAttr("selected");
	});


	jQuery(".form-item-field-vote-cycle-tid ul li a").click(function () {
       var setfirst = jQuery(".form-item-field-product-type-tid ul li:first").text();
	 jQuery("input[type=text]#edit-title").val("");
   	jQuery(".form-item-field-product-type-tid span").text(setfirst);
	jQuery("#edit-field-product-type-tid option").removeAttr("selected");


	});


 	jQuery("input[type='text']#edit-title").click( function() {

	var setfirst = jQuery(".form-item-field-product-type-tid ul li:first").text();
	var setsecond = jQuery(".form-item-field-vote-cycle-tid ul li:first").text();
	jQuery(".form-item-field-product-type-tid span").text(setfirst);
	jQuery(".form-item-field-vote-cycle-tid span").text(setsecond);
	
	});



});     

