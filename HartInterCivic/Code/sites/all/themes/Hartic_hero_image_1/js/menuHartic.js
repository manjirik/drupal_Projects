(function($){

    Drupal.behaviors.menu = {
    attach: function(context, settings) {
		/*----for voting environment-----*/
  	  if(window.location.href.indexOf("/voteenvview") != -1) {
  			$('li.menu-728 a').addClass('main-menu-active');
	  }	
  	  if(window.location.href.indexOf("/paper-based-voting") != -1) {
  			$('li.menu-728 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }	
  	  if(window.location.href.indexOf("/electronic-voting") != -1) {
  			$('li.menu-728 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
  	  if(window.location.href.indexOf("mail-voting") != -1) {
  			$('li.menu-728 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
  	  if(window.location.href.indexOf("convenience-voting") != -1) {
  			$('li.menu-728 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
		/*------------------for Voting Solution----------------*/
  	  if(window.location.href.indexOf("/voting-solution") != -1) {
  			$('li.menu-1151 a').addClass('main-menu-active');
	  }	
  	  if(window.location.href.indexOf("/vote-cycle") != -1) {
  			$('li.menu-1151 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
  	  if(window.location.href.indexOf("node") != -1) {
  			$('li.menu-1151 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
  	  if(window.location.href.indexOf("/election-cycle") != -1) {
  			$('li.menu-1151 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
  	  if(window.location.href.indexOf("/all_product") != -1) {
  			$('li.menu-1151 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
	  
	   if(window.location.href.indexOf("/hardware") != -1) {
  			$('li.menu-1151 a').addClass('active_select');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
	  
	  if(window.location.href.indexOf("/software") != -1) {
  			$('li.menu-1151 a').addClass('active_select');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
	  
	  if(window.location.href.indexOf("/services") != -1) {
  			$('li.menu-1151 a').addClass('active_select');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
	  if(window.location.href.indexOf("/epollbook") != -1) {
  			$('li.menu-1151 a').addClass('active_select');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }	 
	  if(window.location.href.indexOf("/verity") != -1) {
  			$('li.menu-1151 a').addClass('active_select');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }	 

	  if(window.location.href.indexOf("/hart-voting-system-overview") != -1) {
  			$('li.menu-1151 a').addClass('active_select');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }	 	  
	  if(window.location.href.indexOf("/hvs-hardware") != -1) {
  			$('li.menu-1151 a').addClass('active_select');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }		  
	  if(window.location.href.indexOf("/hvs-services") != -1) {
  			$('li.menu-1151 a').addClass('active_select');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
	  if(window.location.href.indexOf("/hvs-software") != -1) {
  			$('li.menu-1151 a').addClass('active_select');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
	  if(window.location.href.indexOf("/2002-hardware") != -1) {
  			$('li.menu-1151 a').addClass('active_select');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
	  
	   if(window.location.href.indexOf("/2002-services") != -1) {
  			$('li.menu-1151 a').addClass('active_select');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
	  
	  if(window.location.href.indexOf("/2002-software") != -1) {
  			$('li.menu-1151 a').addClass('active_select');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
	  
	  /*------------------for Election Services----------------*/
  	  if(window.location.href.indexOf("/election_services") != -1) {
  			$('li.menu-731 a').addClass('main-menu-active');
	  }	
  	  if(window.location.href.indexOf("consultation-training") != -1) {
  			$('li.menu-731 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
  	  if(window.location.href.indexOf("professional-services") != -1) {
  			$('li.menu-731 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
	  if(window.location.href.indexOf("preventative-maintenance") != -1) {
  			$('li.menu-731 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
	  if(window.location.href.indexOf("consultation-and-training") != -1) {
  			$('li.menu-731 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
  	  if(window.location.href.indexOf("maintenance-services") != -1) {
  			$('li.menu-731 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
  	  if(window.location.href.indexOf("ballot-production-services") != -1) {
  			$('li.menu-731 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
	  
	  
	   /*------------------for Our Company----------------*/
  	  if(window.location.href.indexOf("/additional-introductory") != -1) {
  			$('li.menu-1041 a').addClass('active');
	  }	
  	  if(window.location.href.indexOf("/content/why-hart") != -1) {
  			$('li.menu-1041 a').addClass('active');
	  }
  	  if(window.location.href.indexOf("/content/about-hart") != -1) {
  			$('li.menu-1041 a').addClass('active');
	  }
  	  if(window.location.href.indexOf("/content/management-team") != -1) {
  			$('li.menu-1041 a').addClass('active');
	  }
  	  if(window.location.href.indexOf("/content/board-directors") != -1) {
  			$('li.menu-1041 a').addClass('active');
	  }
  	  if(window.location.href.indexOf("/content/careers") != -1) {
  			$('li.menu-1041 a').addClass('active');
	  }
  	  if(window.location.href.indexOf("consultation-training") != -1) {
  			$('li.menu-731 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
  	  if(window.location.href.indexOf("professional-services") != -1) {
  			$('li.menu-731 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
  	  if(window.location.href.indexOf("maintenance-services") != -1) {
  			$('li.menu-731 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
  	  if(window.location.href.indexOf("ballot-production-services") != -1) {
  			$('li.menu-731 a').addClass('active');
  			$('.secondaryMenuWrap ul li a.active').addClass('main-menu-active');
	  }
	
	 /*------------------for cycle page----------------*/
	
	if(window.location.hash){
	var listItem = document.getElementById(window.location.hash);
	var index =  $('.verifyOverviewMiddleNav ul li').index(listItem);
	//alert(index);
	$(".verifyOverviewMiddleNav ul li ").eq(index).trigger('click');
	$(".verifyOverviewMiddleNav ul li ").eq(index).addClass('active');
    }
}
}	
})(jQuery);