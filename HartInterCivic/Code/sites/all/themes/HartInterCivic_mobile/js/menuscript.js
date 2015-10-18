$(document).ready(function(){
	//alert(screen.width + "*" + screen.height);
	//alert(screen.height);
		if($('.SecondaryNavigation #SecondaryNav ul').length==1){
				$('a[data-target=#SecondaryNav]').css('display','none');
			}
			else{};		
		

	var gettext = $("ul.nav .region-highlighted h2").text();
	$("a.brand.secondaryMenu").append(document.createTextNode(gettext));


	if($('.SecondaryNavigation').find('#SecondaryNav')){
		$(".SecondaryNavigation a.btn-navbar").click(function(){
			$(this).hide();
			$('.SecondaryNavigation span a.btn-navbar').show();
		});//end of + click

		$(".SecondaryNavigation span a.btn-navbar").click(function(){
			$(this).hide();
			$('.SecondaryNavigation > a.btn-navbar').show();
		});//end of - click
	
	}//end of if statement
	else{
		$(".SecondaryNavigation > a.btn-navbar").replaceWith('<span>&nbsp;</span>');
	}
		
});

