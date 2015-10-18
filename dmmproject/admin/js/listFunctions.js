//--------------------------------------------------------------------------------------------
	function selectChildBoxes()
	{				
		if($("#chkParent").attr("checked")==true)
		{						
			$("input[name^='chkChild']").attr("checked", true);
			$("#hIsAllSelected").val('1');
			$("#hSelectedCount").val($("#hTotalChkBoxes").val());
		}
		else if($("#chkParent").attr("checked")==false)
		{
			$("input[name^='chkChild']").attr("checked", false);
			$("#hIsAllSelected").val('0');
			$("#hSelectedCount").val('0');
		}	
		setAllValues();
	};
//--------------------------------------------------------------------------------------------	
	function deselectParent(chkBox, chkValue)
	{
		var hVarVal = parseInt($("#hSelectedCount").val());				
		if($(chkBox).attr("checked")==false)
		{						
			$("#chkParent").attr("checked", false);
			
			if(hVarVal>0)
			{
				$("#hSelectedCount").val(hVarVal - 1);
			}
			else
			{
				$("#hSelectedCount").val('0');
			}
			$("#hRecordId").val('0');					
		}
		else
		{
			$("#hSelectedCount").val(hVarVal + 1);
			$("#hRecordId").val(chkValue);
		}
		setAllValues();
	};
//--------------------------------------------------------------------------------------------	
	function editRecord(goToPage)
	{
		var hTotalChkBoxes = parseInt($("#hTotalChkBoxes").val());
		if(hTotalChkBoxes>0)
		{
			if(parseInt($("#hSelectedCount").val())>1)
			{
				alert("Only one record can be edited at a time. Select only one record.");
				return false;				
			}
			else if(parseInt($("#hSelectedCount").val())==0)
			{
				alert("Select a record to edit.");
				return false;	
			}
			else if(parseInt($("#hRecordId").val())<=0)
			{
				$("input[name^='chkChild']:checked").each(function(){$("#hRecordId").val($(this).val());});
			}
			document.frmListForm.action = goToPage;
			document.frmListForm.submit();
		}
		else
		{
			alert("No record(s).");
			return false;
		}
	};
//--------------------------------------------------------------------------------------------	
	function deleteRecords(goToPage)
	{	
		var hTotalChkBoxes = parseInt($("#hTotalChkBoxes").val());
		if(hTotalChkBoxes>0)
		{
			if(parseInt($("#hSelectedCount").val())==0)
			{
				alert("Select record(s) to delete.");
				return false;	
			}
			else
			{
				setAllValues();
				if(goToPage=="brandDelete.php")
				{
					if(confirm("Do you want to delete the selected record(s) ?"))
					{
						
						document.frmListForm.action = goToPage;
						document.frmListForm.submit();
					}
				}
				else
				{
					if(confirm("Do you want to delete the selected record(s) ?"))
					{
						
						document.frmListForm.action = goToPage;
						document.frmListForm.submit();
					}
				}
			}
		}
		else
		{
			alert("No record(s).");
			return false;
		}
	};
//--------------------------------------------------------------------------------------------	

	function shortlistRecords(goToPage)
	{	
		var hTotalChkBoxes = parseInt($("#hTotalChkBoxes").val());
		if(hTotalChkBoxes>0)
		{
			if(parseInt($("#hSelectedCount").val())==0)
			{
				alert("Select record(s) to shortlist.");
				return false;	
			}
			else
			{
				setAllValues();
				if(goToPage=="brandDelete.php")
				{
					if(confirm("Do you want to shortlist the selected record(s) ?"))
					{
						
						document.frmListForm.action = goToPage;
						document.frmListForm.submit();
					}
				}
				else
				{
					if(confirm("Do you want to shortlist the selected record(s) ?"))
					{
						
						document.frmListForm.action = goToPage;
						document.frmListForm.submit();
					}
				}
			}
		}
		else
		{
			alert("No record(s).");
			return false;
		}
	};
//--------------------------------------------------------------------------------------------	

	function activateRecords(goToPage)
	{	
		var hTotalChkBoxes = parseInt($("#hTotalChkBoxes").val());
		if(hTotalChkBoxes>0)
		{
			if(parseInt($("#hSelectedCount").val())==0)
			{
				alert("Select record(s) to activate.");
				return false;	
			}
			else
			{
				setAllValues();
				
				if(goToPage=="brandActInact.php")
				{
					if(confirm("Do you want to activate the selected Brand(s) and its related Product(s) ?"))
					{
						
						$("#hActType").val('1');
						document.frmListForm.action = goToPage;
						document.frmListForm.submit();
					}
				}
				else
				{
					if(confirm("Do you want to activate the selected record(s) ?"))
					{
						
						$("#hActType").val('1');
						document.frmListForm.action = goToPage;
						document.frmListForm.submit();
					}
				}
			}
		}
		else
		{
			alert("No record(s).");
			return false;
		}
	};
//--------------------------------------------------------------------------------------------	
	function deActivateRecords(goToPage)
	{
		var hTotalChkBoxes = parseInt($("#hTotalChkBoxes").val());
		if(hTotalChkBoxes>0)
		{
			if(parseInt($("#hSelectedCount").val())==0)
			{
				alert("Select record(s) to deactivate.");
				return false;	
			}
			else
			{
				setAllValues();
				if(goToPage=="brandActInact.php")
				{
					if(confirm("Do you want to deactivate the selected Brand(s) and its related Product(s) ?"))
					{			
						$("#hActType").val('0');
						document.frmListForm.action = goToPage;
						document.frmListForm.submit();		
					}
				}
				else
				{
					if(confirm("Do you want to deactivate the selected record(s) ?"))
					{			
						$("#hActType").val('0');
						document.frmListForm.action = goToPage;
						document.frmListForm.submit();		
					}
				}
			}
		}
		else
		{
			alert("No record(s).");
			return false;
		}
	};
//--------------------------------------------------------------------------------------------	
	function setAllValues()
	{
		$("#hAllIds").val('');
		$("input[name^='chkChild']:checked").each
		(
			function()
			{
				$("#hAllIds").val(  $(this).val() + ", " + $("#hAllIds").val());   
			}
		);
	};
//--------------------------------------------------------------------------------------------	
	function translateRecord(goToPage)
	{
		var hTotalChkBoxes = parseInt($("#hTotalChkBoxes").val());
		if(hTotalChkBoxes>0)
		{
			if(parseInt($("#hSelectedCount").val())==0)
			{
				alert("Select a record to translate.");
				return false;	
			}
			else if(parseInt($("#hSelectedCount").val())>1)
			{
				alert("Only one record can be translated at a time. Select only one record.");
				return false;				
			}
			else
			{
				$("input[name^='chkChild']:checked").each(function(){$("#hRecordId").val($(this).val());});
				var hiddenVarId = "#hRefLangId" + $("#hRecordId").val();
				var hidVarValue = $(hiddenVarId).val();
				if(parseInt(hidVarValue)>0)
				{
					alert("You have already translated this record. Select different record.");
					return false;
				}
				else
				{				
					var convertToName = "#hConvertTo" + $("#hRecordId").val();
					$("#hConverTo").val($(convertToName).val());
					
					$("#hRefLangId").val($("#hRecordId").val());
					document.frmListForm.action = goToPage;
					document.frmListForm.submit();			
				}
			}
		}
		else
		{
			alert("No record(s).");
			return false;
		}
	};

//--------------------------------------------------------------------------------------------	

function setComment(id,chkid){
	//alert(id.checked)
	//alert(id+$('#'+id).is(':checked'))
	var dataString = "setCommentId=" + chkid + "&checkedValue="+id.checked;
	//var actionPagePath = "sites/all/themes/etihad/hh.php";
	$.ajax
	(
		{
			type: "POST", url: "setComment.php", data: dataString,   
			success: 
				function(data) 
				{ 
				document.getElementById('message').innerHTML = data;																															
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) 
				{
					
				}
		}
	)

}

//--------------------------------------------------------------------------------------------	

function setUser(id,chkid){
	//alert(id.checked)
	//alert(id+$('#'+id).is(':checked'))
	var dataString = "setUserId=" + chkid + "&checkedValue="+id.checked;
	//var actionPagePath = "sites/all/themes/etihad/hh.php";
	$.ajax
	(
		{
			type: "POST", url: "setUser.php", data: dataString,   
			success: 
				function(data) 
				{ 
				document.getElementById('message').innerHTML = data;																															
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) 
				{
					
				}
		}
	)

}

//--------------------------------------------------------------------------------------------	

function setSong(id,chkid){
	//alert(id.checked)
	//alert(id+$('#'+id).is(':checked'))
	var dataString = "setSongId=" + chkid + "&checkedValue="+id.checked;
	//var actionPagePath = "sites/all/themes/etihad/hh.php";
	$.ajax
	(
		{
			type: "POST", url: "setSong.php", data: dataString,   
			success: 
				function(data) 
				{ 
				document.getElementById('message').innerHTML = data;																															
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) 
				{
					
				}
		}
	)

}

//--------------------------------------------------------------------------------------------	

function setAdminUser(id,chkid){
	//alert(id.checked)
	//alert(id+$('#'+id).is(':checked'))
	var dataString = "setAdminId=" + chkid + "&checkedValue="+id.checked;
	//var actionPagePath = "sites/all/themes/etihad/hh.php";
	$.ajax
	(
		{
			type: "POST", url: "setAdmin.php", data: dataString,   
			success: 
				function(data) 
				{ 
				document.getElementById('message').innerHTML = data;																															
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) 
				{
					
				}
		}
	)

}

//--------------------------------------------------------------------------------------------	

function setAdminAdvertise(id,chkid){
	//alert(id.checked)
	//alert(id+$('#'+id).is(':checked'))
	var dataString = "setAdminAdvertiseId=" + chkid + "&checkedValue="+id.checked;
	//var actionPagePath = "sites/all/themes/etihad/hh.php";
	$.ajax
	(
		{
			type: "POST", url: "setAdminAdvertise.php", data: dataString,   
			success: 
				function(data) 
				{ 

				var re = /\s*((\s*\S+)*)\s*/;
				data = data.replace(re, "$1");

				if(data.indexOf('You cannot make publish more than 5 Advertise.') >= 0)
					{
					
						var first_data = data.substr(data.indexOf('#*#')+3);
						data = data.substr(0,data.indexOf('#*#'));
						$("#chk_adv"+first_data).attr('checked',false);
					}

				document.getElementById('message').innerHTML = data;																															
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) 
				{
					
				}
		}
	)

}

//--------------------------------------------------------------------------------------------	

function setAdminAdvertisefeatured(id,chkid){
	//alert(id.checked)
	//alert(id+$('#'+id).is(':checked'))
	var dataString = "setAdminAdvertisefeaturedId=" + chkid + "&checkedValue="+id.checked;
	//var actionPagePath = "sites/all/themes/etihad/hh.php";
	$.ajax
	(
		{
			type: "POST", url: "setAdminAdvertisefeatured.php", data: dataString,   
			success: 
				function(data) 
				{ 

				var re = /\s*((\s*\S+)*)\s*/;
				data = data.replace(re, "$1");

				if(data.indexOf('You cannot make featured more than 5 Advertise.') >= 0)
					{
					
						var first_data = data.substr(data.indexOf('#*#')+3);
						data = data.substr(0,data.indexOf('#*#'));
						$("#chk_adv"+first_data).attr('checked',false);
					}

				document.getElementById('message').innerHTML = data;																															
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) 
				{
					
				}
		}
	)

}

//--------------------------------------------------------------------------------------------	
function setAdminAdvertiselanding(id,chkid){
	//alert(id.checked)
	//alert(id+$('#'+id).is(':checked'))
	var dataString = "setAdminAdvertiselandingId=" + chkid + "&checkedValue="+id.checked;
	//var actionPagePath = "sites/all/themes/etihad/hh.php";
	$.ajax
	(
		{
			type: "POST", url: "setAdminAdvertiselanding.php", data: dataString,   
			success: 
				function(data) 
				{ 

				var re = /\s*((\s*\S+)*)\s*/;
				data = data.replace(re, "$1");

				if(data.indexOf('You cannot make landing advertise more than 5 Advertise.') >= 0)
					{
					
						var first_data = data.substr(data.indexOf('#*#')+3);
						data = data.substr(0,data.indexOf('#*#'));
						$("#chk_adv"+first_data).attr('checked',false);
					}

				document.getElementById('message').innerHTML = data;																															
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) 
				{
					
				}
		}
	)

}

//--------------------------------------------------------------------------------------------	