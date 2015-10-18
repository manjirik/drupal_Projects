/** Js functions **/ 
/*
function open_me(page){
	 
	var redirect = 'index.php';
	if(page == "h"){
		redirect = redirect; 
		// top.location.href= fb_page_tab; 
		 
	}else if(page == "map_view") {
		redirect = redirect + '?r=gmap/map_view'; 
		
	} else if(page == "gmap") {
		redirect = redirect + '?r=gmap/map_view_emerites_city';		
	} else if(page == "n"){
		redirect = redirect + '?r=notification/index'; 
	} else if(page == "terms"){
		redirect = redirect + '?r=landing/terms_and_conditions'; 
	} else if(page == "privacy"){
		redirect = redirect + '?r=landing/privacy'; 
	}

	window.location.href= redirect; 

	
	
} */


/** Validate Number **/
function validate_number(obj)
{  
var val = trim(obj.value);
var val_len = val.length;

if(val_len == 0){
	return false;
}

 for(i=0;i<val_len;i++)
   {
     var code=val.charCodeAt(i); 
   
     if(!(code>=48 && code<=57)) // && !(code >=97 && code<=121)  &&!(code>=65 && code<=91)
         { 
    	 	obj.value=""; return false; 
         } 
     }

 if(obj.value == ""){
	 return false
 }
 return true;

 
}
/** Fucntion to trim the input **/
function trim(s) 
{ 
   if(s != null) 
     return s.replace(/^\s+/,'').replace(/\s+$/,'') ; 
}

/** Function to check valid email address **/
function is_valid_email(strObj)
{	
	var regExPattern= /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/i;
	if(! strObj.match(regExPattern) )
		 return false;	
	else 
		return true;
}

function clear_input(obj, val){
	var trim_val  = trim(obj.value);
	if ( trim_val == '')
	{	obj.value = val;
	}else if(trim_val == val){
		obj.value = '';
	}
}
function go_back(){
	window.history.back();
}
 
function open_me(url, authorization,external) {
 
	if(typeof(external)!='undefined' && external==1)  {
		window.location=url;
		return;
	}
	
	
	var controller='';
	switch(url) {
		case 'mymap':
			controller='gmap/map_view_emerites_city';
		break;
		case 'myentries':
			controller='myentries/show_entries';
		break;
			 
		case "map_view":
			controller='gmap/map_view'; 
		break;
		case "gmap":
			controller='gmap/map_view_emerites_city';		
		break;
		case "n":
			controller='notification/index'; 
		break;
		case "terms":
			controller='landing/terms_and_conditions'; 
		break;
		case "privacy":
			controller='landing/privacy'; 
		break;
		case 'prizes':
			controller='landing/Prizes';
		break;
		case 'faq':
			controller='landing/Faq';
		break;
		
	
		
	}
	
	if(controller=='') {
		window.locagtion=SITE_URL;
	}
	
	if(typeof(authorization)!='undefined' && authorization==1) { 
		check_autorized_user(FB_PAGE_URL_PERMISSION,PERMISSION_SCOPE,controller);
	}
	
	else {
		window.location.href='index.php?r='+controller;
	}
 }