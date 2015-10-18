function startclock()
{
	var thetime=new Date();

	var nhours=thetime.getHours();
	var nmins=thetime.getMinutes();
	var nsecn=thetime.getSeconds();
	var nday=thetime.getDay();
	var nmonth=thetime.getMonth();
	var ntoday=thetime.getDate();
	var nyear=thetime.getYear();
	var AorP=" ";

	if (nhours>=12)
		AorP="PM ";
	else
		AorP="AM";

	if (nhours>=13)
		nhours-=12;

	if (nhours==0)
	   nhours=12;

	if (nsecn<10)
	 nsecn="0"+nsecn;

	if (nmins<10)
	 nmins="0"+nmins;

	if (nday==0)
	  nday="Sunday";
	if (nday==1)
	  nday="Monday";
	if (nday==2)
	  nday="Tuesday";
	if (nday==3)
	  nday="Wednesday";
	if (nday==4)
	  nday="Thursday";
	if (nday==5)
	  nday="Friday";
	if (nday==6)
	  nday="Saturday";

	nmonth+=1;

	if (nyear<=99)
	  nyear= "19"+nyear;

	if ((nyear>99) && (nyear<2000))
	 nyear+=1900;

	//document.clockform.clockspot.value=nhours+": "+nmins+": "+nsecn+" "+AorP+" "+nday+", "+nmonth+"/"+ntoday+"/"+nyear;
	document.getElementById("DateTime").innerHTML = nday+", "+nmonth+"/"+ntoday+"/"+nyear+" "+ nhours+": "+nmins+": "+nsecn+"</span>  "+AorP;

	setTimeout('startclock()',1000);
};
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
function dotrim(strComp)
{
	return strComp.replace(/^\s+|\s+$/g, '') ;
}
function IsValidEmail(email)
{
	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	return filter.test(email);
}
/***********************************************
* Textarea Maxlength script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/        
function ismaxlength(obj)
{
	var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
	if (obj.getAttribute && obj.value.length>mlength)
		obj.value=obj.value.substring(0,mlength);
}
function logOut()
{
	if(confirm("Do you want to logout ?"))
	{
		window.location = "logOut.php";
	}
};
//-------------------------------------------------------------------------------------------------------------
	function fnSelectEditorAdd(editor,editorType)
	{
		var dataString = "editor=" + editor + "&editorType=" + editorType;
		$.ajax
		(
			{  
				type: "POST", url: "ajaxSelectEditor.php", data: dataString,  
				success:
					function(data)
					{
						if(editorType == 'small')
						{
							$("#smallEditorDiv").fadeIn('slow');
							$("#smallEditorDiv").html(data);
						}
						else
						{
							$("#largeEditorDiv").fadeIn('slow');
							$("#largeEditorDiv").html(data);
						}
					},
				error:
					function (XMLHttpRequest, textStatus, errorThrown)
					{
						if(editorType == 'small')
						{
							$("#smallEditorDiv").html('Timeout contacting server..');
							$("#smallEditorDiv").html(data); 
						}
						else
						{
							$("#largeEditorDiv").html('Timeout contacting server..');
							$("#largeEditorDiv").html(data); 
						}
					}
			}
		)
	};
//-------------------------------------------------------------------------------------------------------------
function fnSelectEditorEdit(editor,editorType,objId,tblType)
{
	var dataString = "editor=" + editor + "&editorType=" + editorType + "&objId=" + objId + "&tblType=" + tblType;     
	$.ajax
	(
		{  
			type: "POST", url: "ajaxSelectEditor.php", data: dataString,  
			success:
				function(data)
				{
					if(editorType == 'small')
					{
						$("#smallEditorDiv").fadeIn('slow');
						$("#smallEditorDiv").html(data);
					}
					else
					{
						$("#largeEditorDiv").fadeIn('slow');
						$("#largeEditorDiv").html(data);
					}
				},
			error:
				function (XMLHttpRequest, textStatus, errorThrown)
				{
					if(editorType == 'small')
					{
						$("#smallEditorDiv").html('Timeout contacting server..');
						$("#smallEditorDiv").html(data); 
					}
					else
					{
						$("#largeEditorDiv").html('Timeout contacting server..');
						$("#largeEditorDiv").html(data); 
					}
				}
		}
	)
};
function isValidFile(fileName)
{		
	var i=fileName.length;
	i=i-1;
	var revFilename = "";
	
	for (var x = i; x >=0; x--)
	{
		revFilename = revFilename + fileName.charAt(x);
	}
			
	var fileNameArr = revFilename.split(".");
	
	var revFileExt = fileNameArr[0];
	var fileExt = "";
	
	i=revFileExt.length;
	i=i-1;
	var ext = "";
	
	for (var x = i; x >=0; x--)
	{
		fileExt = fileExt + revFileExt.charAt(x);
	}
	
	return fileExtArray.in_array(fileExt);
};
Array.prototype.in_array = function(p_val) {
	for(var i = 0, l = this.length; i < l; i++) {
		if(this[i] == p_val) {
			return true;
		}
	}
	return false;
}
function deleteImage(imgName,recId,imgType)
{
	if(imgName!="" && recId>0 && imgType!="")
	{
		if(confirm("Proceeding will delete this image permanently from the database. Do you want to continue ?"))
		{				
			var dataString = "imgName=" + imgName + "&imgType=" + imgType + "&recId=" + recId;
			$.ajax
			(
				{  
					type: "POST", url: "ajaxDeleteImage.php", data: dataString,  
					success:
						function(data)
						{
							$("#tblImgDiv").fadeIn('slow');
							$("#tblImgDiv").html(data);
						},
					error:
						function (XMLHttpRequest, textStatus, errorThrown)
						{
							$("#tblImgDiv").fadeIn('slow');
							$("#tblImgDiv").html(data);
						}
				}
			)				
		}				
	}		
};
function deleteImageNew(imgName,recId,imgType,divId)
{
	if(imgName!="" && recId>0 && imgType!="" && divId!="")
	{
		if(confirm("Proceeding will delete this image permanently from the database. Do you want to continue ?"))
		{				
			divId = "#" + divId;
			var dataString = "imgName=" + imgName + "&imgType=" + imgType + "&recId=" + recId;
			$.ajax
			(
				{  
					type: "POST", url: "ajaxDeleteImage.php", data: dataString,  
					success:
						function(data)
						{
							$(divId).fadeIn('slow');
							$(divId).html(data);
							$("#txtProductLogoURL").val('');
						},
					error:
						function (XMLHttpRequest, textStatus, errorThrown)
						{
							$(divId).fadeIn('slow');
							$(divId).html(data);
						}
				}
			)				
		}				
	}		
};
function goBack()
{
	if(confirm("Do you want to go back ?"))
	{
		history.back();
	}
};