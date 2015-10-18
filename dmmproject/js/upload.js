// JavaScript Document

$(document).ready(function()
{
	reg_avatar_upload();
	reg_billboard_upload();
	reg_billboard_zip_upload();
	if($("#song_upload_form").html() != null)
	{
		var i=0;
		for(i=0; i<4; i++)
		{
			var btn_id = "#upload_song_"+i;
			song_upload(btn_id);
		}
	}
	if($("#adv_upload_form").html() != null)
	{
		var i=0;
		for(var i=0; i<4; i++)
		{
			var btn_id = "#upload_adv_"+i;
			adv_zip_upload(btn_id);
		}
	}
	if($(".editProfile_main").html() != null)
	{	
		profile_avatar_upload();
		profile_billboard_upload();
	}
	var param = "";
	slide_add_song(param);
	slide_add_adv(param);
	slide_song_status(param);
	slide_adv_status(param);
});	

var xmlHttp;
function reg_avatar_upload()
{
	var btnUpload=$('#upload_avatar');
	var status=$('#status_message');
	var primary_key = $("#progress_key_avatar").val();
	new AjaxUpload(btnUpload, {
		action: $("link[rel='canonical']").attr("href") + '/upload.php?type=reg_avatar',
		name: 'uphoto',
		apcUploadProgress: primary_key,
		onSubmit: function(file, ext){
			 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
				// extension is not allowed 
				status.text('Only JPG, PNG or GIF files are allowed');
				$("#err_reg_add_avtar").html("Only JPG, PNG or GIF files are allowed");
				$("#err_reg_add_avtar").fadeIn(400);
				$("#err_reg_add_avtar").delay(5000).fadeOut(400);
				return false;
			}
			else
			{
				$("#btnRegSubmit").attr("disabled", "disabled");
				$("#btnRegSubmit").removeClass("btnLtBlue").addClass("btnLtBlueSubmit");
				startProgress(primary_key, '_reg');
			}
			status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			var resMsg = response.substr(0,response.indexOf("success :")+10);
			var resMsg1 = resMsg.substr(0,resMsg.indexOf(" :"));
			var resMsg2 = response.substr(response.indexOf("success :")+10);
			var imagePath = resMsg2.substr(0,resMsg2.indexOf("pathEnd"));
			//alert("-"+resMsg1)
			if(resMsg1 == "success")
			{
				document.getElementById("reg_avatar_path").value= imagePath;
				$(".uploadAvatar img").attr('src', imagePath);
				$("#err_reg_add_avtar").hide();
				$("#pb_inner_reg").css('width', '0%');
				$("#btnRegSubmit").attr("disabled", false);
				$("#btnRegSubmit").removeClass("btnLtBlueSubmit").addClass("btnLtBlue");
			} else{
				if(response == "Uploaded image should be (64x 64 px)")
				{
				$("#pb_inner_reg").css('width', '0%');
				$("#btnRegSubmit").attr("disabled", false);
				$("#btnRegSubmit").removeClass("btnLtBlueSubmit").addClass("btnLtBlue");
				}
				var resErrMsg = response;
				$("#err_reg_add_avtar").html(resErrMsg);
				$("#err_reg_add_avtar").fadeIn(400);
				$("#err_reg_add_avtar").delay(5000).fadeOut(400);
			}
		}
	});
}


function reg_billboard_upload()
{
	var btnUpload=$('#upload_bill_board');
	var status=$('#status_message');
	var primary_key = $("#progress_key_billboard").val();
	new AjaxUpload(btnUpload, {
		action: $("link[rel='canonical']").attr("href") + '/upload.php?type=reg_billboard',
		name: 'uphoto',
		apcUploadProgress: primary_key,
		onSubmit: function(file, ext){
			 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
				// extension is not allowed 
				status.text('Only JPG, PNG or GIF files are allowed');
				$("#err_reg_billboard").html("Only JPG, PNG or GIF files are allowed");
				$("#err_reg_billboard").fadeIn(400);
				$("#err_reg_billboard").delay(5000).fadeOut(400);
				return false;
			}
			else
			{
				$("#btnRegSubmit").attr("disabled", "disabled");
				$("#btnRegSubmit").removeClass("btnLtBlue").addClass("btnLtBlueSubmit");
				startProgress(primary_key, '_reg');
			}
			status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			var resMsg = response.substr(0,response.indexOf("success :")+10);
			var resMsg1 = resMsg.substr(0,resMsg.indexOf(" :"));
			var resMsg2 = response.substr(response.indexOf("success :")+10);
			var imagePath = resMsg2.substr(0,resMsg2.indexOf("pathEnd"));
			if(resMsg1 == "success")
			{
				document.getElementById("reg_billboard_path").value= imagePath;
				$(".uploadBillboard img").attr('src', imagePath);
				$("#err_reg_billboard").hide();
			} else{
				var resErrMsg = response;
				$('#err_reg_billboard').html(resErrMsg);
				$('#err_reg_billboard').fadeIn(400);
				$('#err_reg_billboard').delay(5000).fadeOut(400);
			}
		}
	});
}

function reg_billboard_zip_upload()
{
	var btnUpload=$('#upload_bill_board_zip');
	var status=$('#status_message');
	var primary_key = $("#progress_key_billboard_zip").val();
	new AjaxUpload(btnUpload, {
		action: $("link[rel='canonical']").attr("href") + '/upload.php?type=reg_billboard_zip',
		name: 'uphoto',
		apcUploadProgress: primary_key,
		onSubmit: function(file, ext){
			 if (! (ext && /^(zip)$/.test(ext))){ 
				// extension is not allowed 
				status.text('Only ZIP files are allowed');
				$("#err_reg_billboard").html("Only ZIP files are allowed");
				$("#err_reg_billboard").fadeIn(400);
				$("#err_reg_billboard").delay(5000).fadeOut(400);
				return false;
			}
			else
			{
				$("#btnRegSubmit").attr("disabled", "disabled");
				$("#btnRegSubmit").removeClass("btnLtBlue").addClass("btnLtBlueSubmit");
				startProgress(primary_key, '_reg');
			}
			status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			var resMsg = response.substr(0,response.indexOf("success :")+10);
			var resMsg1 = resMsg.substr(0,resMsg.indexOf(" :"));
			var resMsg2 = response.substr(response.indexOf("success :")+10);
			var imagePath = resMsg2.substr(0,resMsg2.indexOf("pathEnd"));
			if(resMsg1 == "success")
			{
				document.getElementById("reg_billboard_zip_path").value= imagePath;
				$("#formErr1").hide();
			} else{
				var resErrMsg = response;
				$('#err_reg_billboard').html(resErrMsg);
				$('#err_reg_billboard').fadeIn(400);
				$('#err_reg_billboard').delay(5000).fadeOut(400);
			}
		}
	});
}

function profile_avatar_upload()
{
	var btnUpload=$('#profile_avatar');
	var status=$('#status_message');
	var primary_key = $("#progress_key_profile_avatar").val();
	new AjaxUpload(btnUpload, {
		action: $("link[rel='canonical']").attr("href") + '/upload.php?type=profile_avatar',
		name: 'uphoto',
		apcUploadProgress: primary_key,
		onSubmit: function(file, ext){
			 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
				// extension is not allowed 
				status.text('Only JPG, PNG or GIF files are allowed');
				$("#err_profile_avtar").html("Only JPG, PNG or GIF files are allowed");
				$("#err_profile_avtar").fadeIn(400);
				$("#err_profile_avtar").delay(5000).fadeOut(400);
				return false;
			}
			else
			{
				$("#btnProfileSubmit").attr("disabled", "disabled");
				$("#btnProfileSubmit").removeClass("btnLtBlue").addClass("btnLtBlueSubmit");
				startProgress(primary_key, '_edit_profile');
			}
			status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			var resMsg = response.substr(0,response.indexOf("success :")+10);
			var resMsg1 = resMsg.substr(0,resMsg.indexOf(" :"));
			var resMsg2 = response.substr(response.indexOf("success :")+10);
			var imagePath = resMsg2.substr(0,resMsg2.indexOf("pathEnd"));
			//alert("-"+resMsg1)
			if(resMsg1 == "success")
			{	
				document.getElementById("edit_dmm_avtarImage_path").value= imagePath;
				$(".profile_upload_avatar img").attr('src', imagePath);
				$("#err_profile_avtar").hide();
				$("#pb_inner_edit_profile").css('width', '0%');
				$("#btnProfileSubmit").attr("disabled", false);	
				$("#btnProfileSubmit").removeClass("btnLtBlueSubmit").addClass("btnLtBlue");
			} else{
				if(response == "Uploaded image should be (64x 64 px)")
				{
				$("#pb_inner_edit_profile").css('width', '0%');
				$("#btnProfileSubmit").attr("disabled", false);	
				$("#btnProfileSubmit").removeClass("btnLtBlueSubmit").addClass("btnLtBlue");
				}
				//alert(response);
				var resErrMsg = response;
				$("#err_profile_avtar").html(resErrMsg);
				$("#err_profile_avtar").fadeIn(400);
				$("#err_profile_avtar").delay(5000).fadeOut(400);
			}
		}
	});
}


function profile_billboard_upload()
{
	var btnUpload=$('#profile_billboard');
	var status=$('#status_message');
	var primary_key = $("#progress_key_profile_billboard").val();
	new AjaxUpload(btnUpload, {
		action: $("link[rel='canonical']").attr("href") + '/upload.php?type=profile_billboard',
		name: 'uphoto',
		apcUploadProgress: primary_key,
		onSubmit: function(file, ext){
			 if (! (ext && /^(jpg|png|jpeg|gif|zip)$/.test(ext))){ 
				// extension is not allowed 
				status.text('Only JPG, PNG or GIF files are allowed');
				$("#err_profile_billboard").html("Only JPG, PNG, GIF or ZIP files are allowed");
				$("#err_profile_billboard").fadeIn(400);
				$("#err_profile_billboard").delay(5000).fadeOut(400);
				return false;
			}
			else
			{
				$("#btnProfileSubmit").attr("disabled", "disabled");
				$("#btnProfileSubmit").removeClass("btnLtBlue").addClass("btnLtBlueSubmit");
				startProgress(primary_key, '_edit_profile');
			}
			status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			var resMsg = response.substr(0,response.indexOf("success :")+10);
			var resMsg1 = resMsg.substr(0,resMsg.indexOf(" :"));
			var resMsg2 = response.substr(response.indexOf("success :")+10);
			var imagePath = resMsg2.substr(0,resMsg2.indexOf("pathEnd"));
			var extention = resMsg2.substr(resMsg2.indexOf("pathEnd")+7);
			if(resMsg1 == "success")
			{
				document.getElementById("edit_dmm_billBordImage_path").value= imagePath;
				if(extention != '.zip')
				{
					$(".profile_upload_billboard img").attr('src', imagePath);
				}
				$("#err_profile_billboard").hide();
			} else{
				var resErrMsg = response;
				$('#forLoginBox').children(".data").html(resErrMsg);
				$('#forLoginBox').fadeIn(400);
				$('#forLoginBox').delay(5000).fadeOut(400);
			}
		}
	});
}

function song_upload(btn_id)
{
	var btnUpload=$(btn_id);
	var status=$('#status_message');
	//var bid = btnUpload.attr("id");
	var id = btn_id.substr(btn_id.lastIndexOf("_")+1);
    var primary_key = $("#progress_key_add_song_"+id).val();
	new AjaxUpload(btnUpload, {
		action: $("link[rel='canonical']").attr("href") + '/upload.php?type=song_add_upload',
		name: 'uphoto',
		apcUploadProgress: primary_key,
		onSubmit: function(file, ext){
			 if (! (ext && /^(mp3)$/.test(ext))){ 
				// extension is not allowed 
				//status.text('Only MP3 files are allowed');
				var bid = btnUpload.attr("id");
				var id = btn_id.substr(btn_id.lastIndexOf("_")+1);
				$('#add_song_content').children(':nth-child('+ parseInt(id+1) +')').children().children().children().children().children('.err_song_add_file').html("Only MP3 files are allowed");
				$('#add_song_content').children(':nth-child('+ parseInt(id+1) +')').children().children().children().children().children('.err_song_add_file').fadeIn(400);
				$('#add_song_content').children(':nth-child('+ parseInt(id+1) +')').children().children().children().children().children('.err_song_add_file').delay(5000).fadeOut(5000);
				return false;
			}
			else
			{
				$("#btnSongSubmit").attr('disabled', 'disabled');
				$("#btnSongSubmit").removeClass("btnLtBlue").addClass("btnLtBlueSubmit");
				startProgress(primary_key, "_song");
			}
			status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			var resMsg = response.substr(0,response.indexOf("success :")+10);
			var resMsg1 = resMsg.substr(0,resMsg.indexOf(" :"));
			var resMsg2 = response.substr(response.indexOf("success :")+10);
			var songPath = resMsg2.substr(0,resMsg2.indexOf("pathEnd"));
			if(resMsg1 == "success")
			{
				var bid = btnUpload.attr("id");
				var id = bid.substr(bid.lastIndexOf("_")+1);
				$("#song_add_path_"+id).val(songPath);
				$("#formErr").hide();
			} else{
				var resErrMsg = response;
				$('#forLoginBox').children(".data").html(resErrMsg);
				$('#forLoginBox').fadeIn(400);
				$('#forLoginBox').delay(5000).fadeOut(400);
			}
		}
	});
	
}

function adv_zip_upload(btn_id)
{
	var btnUpload=$(btn_id);
	var status=$('#status_message');
	var bid = btnUpload.attr("id");
	var id = btn_id.substr(btn_id.lastIndexOf("_")+1);
    var primary_key = $("#progress_key_add_adv_"+id).val();
	new AjaxUpload(btnUpload, {
		action: $("link[rel='canonical']").attr("href") + '/upload.php?type=advertise_add_upload',
		name: 'uphoto',
		apcUploadProgress: primary_key,
		onSubmit: function(file, ext){
			 if (! (ext && /^(jpg|png|jpeg|gif|zip)$/.test(ext))){ 
				// extension is not allowed 
				//status.text('Only MP3 files are allowed');
				var bid = btnUpload.attr("id");
				var id = btn_id.substr(btn_id.lastIndexOf("_")+1);
				$('#add_adv_content').children(':nth-child('+ parseInt(id+1) +')').children().children().children().children().children('.err_adv_add_file').html("Only JPG,PNG,GIF,ZIP files are allowed");
				$('#add_adv_content').children(':nth-child('+ parseInt(id+1) +')').children().children().children().children().children('.err_adv_add_file').fadeIn(400);
				$('#add_adv_content').children(':nth-child('+ parseInt(id+1) +')').children().children().children().children().children('.err_adv_add_file').delay(5000).fadeOut(5000);
				return false;
			}
			else
			{
				$("#btnAdvSubmit").attr("disabled", "disabled");
				$("#btnAdvSubmit").removeClass("btnLtBlue").addClass("btnLtBlueSubmit");
				startProgress(primary_key, "_adv");
			}
			status.text('Uploading...');
		},
		onComplete: function(file, response){
			//On completion clear the status
			status.text('');
			var resMsg = response.substr(0,response.indexOf("success :")+10);
			var resMsg1 = resMsg.substr(0,resMsg.indexOf(" :"));
			var resMsg2 = response.substr(response.indexOf("success :")+10);
			var songPath = resMsg2.substr(0,resMsg2.indexOf("pathEnd"));
			if(resMsg1 == "success")
			{
				var bid = btnUpload.attr("id");
				var id = bid.substr(bid.lastIndexOf("_")+1);
				document.getElementById("adv_add_path_"+id).value= songPath;
				$("#formErr").hide();
			} else{
				var resErrMsg = response;
				$('#forLoginBox').children(".data").html(resErrMsg);
				$('#forLoginBox').fadeIn(400);
				$('#forLoginBox').delay(5000).fadeOut(400);
			}
		}
	});
}

function GetXmlHttpObject()
{
	var xmlHttp=null;
	try
	{
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e)
	{
		// Internet Explorer
		try
		{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}