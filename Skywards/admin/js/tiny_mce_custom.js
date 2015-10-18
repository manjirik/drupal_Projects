tinyMCE.init({
    // General options
	mode : "exact",
    elements : "content_left_en,content_left_ar,content_right_en,content_right_ar,corporate_description_en,corporate_description_ar",
    relative_urls : false,
	remove_script_host : true,
	//mode: "textareas",
	//elements : "ajaxfilemanager",
    theme: "advanced",
	width : "95%",
    height : "420",
    plugins: "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

    // Theme options
    //theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect",
	theme_advanced_buttons2: "cut,copy,paste,|,bullist,numlist,|,outdent,indent,blockquote,|,link,unlink,anchor,image,code,preview,|,forecolor,backcolor,|,hr,ltr,rtl,",
    theme_advanced_buttons3: "tablecontrols,",
    theme_advanced_toolbar_location: "top",
    theme_advanced_toolbar_align: "left",
    theme_advanced_statusbar_location: "bottom",
    theme_advanced_resizing: true,
	file_browser_callback : "ajaxfilemanager",
    content_css: "css/EditorStyle.css",
    relative_urls: false,
    external_link_list_url: "./js/menu.js"
});

function ajaxfilemanager(field_name, url, type, win) {
	var ajaxfilemanagerurl = "./js/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
	var view = 'detail';
	switch (type) {
		case "image":
		view = 'thumbnail';
			break;
		case "media":
			break;
		case "flash": 
			break;
		case "file":
			break;
		default:
			return false;
	}
	tinyMCE.activeEditor.windowManager.open({
		url: "./js/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php?view=" + view,
		width: 782,
		height: 440,
		inline : "yes",
		close_previous : "no"
	},{
		window : win,
		input : field_name
	});
	
/*            return false;			
	var fileBrowserWindow = new Array();
	fileBrowserWindow["file"] = ajaxfilemanagerurl;
	fileBrowserWindow["title"] = "Ajax File Manager";
	fileBrowserWindow["width"] = "782";
	fileBrowserWindow["height"] = "440";
	fileBrowserWindow["close_previous"] = "no";
	tinyMCE.openWindow(fileBrowserWindow, {
	  window : win,
	  input : field_name,
	  resizable : "yes",
	  inline : "yes",
	  editor_id : tinyMCE.getWindowArg("editor_id")
	});
	
	return false;*/
}
