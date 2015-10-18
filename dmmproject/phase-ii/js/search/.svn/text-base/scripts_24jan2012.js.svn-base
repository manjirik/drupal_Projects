	function lookup(inputString) {
		var musician_search = document.getElementById('musician_search').value;
				
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions').hide();
		} else {
			// post data to our php processing page and if there is a return greater than zero
			// show the suggestions box
			$.post("/string_search.php", {mysearchString: inputString, musician_search: musician_search}, function(data){
				if(data.length >0) {
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} //end
	
	// if user clicks a suggestion, fill the text box.
	function fill(thisValue) {
		//alert(thisValue.val);
		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}

	/*function postsongid(id,songdbid) {
		document.getElementById('songdbid').value = songdbid;
		document.getElementById('songid').value = id;
		document.forms["search"].submit();
	}*/
	/*function postsongid(id,songdbid) {
				document.getElementById('nextLoading').style.display = 'block';
				setTimeout('postsongdbid('+ id + ','+ songdbid +')', 2000);
				}*/

	function postsongid(id,songdbid,musician_get)
				{
					
					
					var dataString = "songid=" + id + "&songdbid=" + songdbid + "&musician_get=" + musician_get;
					if(dataString!="")
					{						
						$.ajax
						(
							{   									
								type: "POST", url: "http://www.dmmcompany.com/player.php", data: dataString,   
								success: 
									function(data) 
									{ 		
										
										$("#playerPlay").html(data);	
										startaudioplayer();
										document.getElementById('nextLoading').style.display = 'block';
									},
								error: 
									function (XMLHttpRequest, textStatus, errorThrown) 
									{
										$("#songCommentsDiv").html('Timeout contacting server..');
										$("#songCommentsDiv").html(data);																		
									}
							}
						)						
					}
				}
	
	function postsongid1(id,songdbid)
				{
					
					
					var musician_get = 'no';
					var dataString = "songid=" + id + "&songdbid=" + songdbid + "&musician_get=" + musician_get;
					if(dataString!="")
					{						
						$.ajax
						(
							{   									
								type: "POST", url: "http://www.dmmcompany.com/player.php", data: dataString,   
								success: 
									function(data) 
									{ 		
										
										$("#playerPlay").html(data);	
										startaudioplayer();
										document.getElementById('nextLoading').style.display = 'block';
									},
								error: 
									function (XMLHttpRequest, textStatus, errorThrown) 
									{
										$("#songCommentsDiv").html('Timeout contacting server..');
										$("#songCommentsDiv").html(data);																		
									}
							}
						)						
					}
				}