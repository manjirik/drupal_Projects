	function lookup(inputString) {
		var musician_search = document.getElementById('musician_search').value;
				
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions').hide();
		} else {
			// post data to our php processing page and if there is a return greater than zero
			// show the suggestions box
			$.post($("link[rel='canonical']").attr("href") + "/string_search.php", {mysearchString: inputString, musician_search: musician_search}, function(data){
				if(data.length >0) {
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} //end
	
	// if user clicks a suggestion, fill the text box.
	function fill(thisValue) {
		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}

	function postsongid(id, songdbid, musician_get, http_user_agent)
				{
					
					var dataString = "songid=" + id + "&songdbid=" + songdbid + "&musician_get=" + musician_get;
					if(dataString!="")
					{						
						$.ajax
						(
							{   									
								type: "POST", url: $("link[rel='canonical']").attr("href") + "/player_script_search.php", data: dataString,   
								success: 
									function(data) 
									{ 		
										
										 var i =0;
										   result = jQuery.parseJSON( data ); 

										   var cnt = audioPlaylist.playlist.length;
											
											for(i=0;i< cnt ;i++) {
											  audioPlaylist.playlist.pop();
											}
											
											for(i=0;i<result.length;i++)
											{  

														audioPlaylist.playlist.push({

														'tmp_song_id':result[i]['SONGID'], 
														'name':   result[i]['TITLE'],
														'mp3':   result[i]['PATH'],
														'poster':   result[i]['POSTER']
													});

													if(i == 0){

														play_song_id = result[i]['SONGID'];
														
													}

											}	

											$("#jquery_jplayer_2").jPlayer("setMedia", audioPlaylist.playlist[0]);
											$("#hid_songid").val(play_song_id);
											comments_load();
											song_hit();
											changeReview();
											billboard_load();
											getsongname();
											nextprev();
											
											if("android" != http_user_agent) {
												$("#jquery_jplayer_2").jPlayer("play");
											}

											$("#south14").attr("title", "Jump to this zone");
											$("#south14").css("cursor", "pointer");
											var imageURL = $("link[rel='canonical']").attr("href") + "/images/zoneicon.png";
											$("#south14").css("background", 'url("' + imageURL + '")');
											
											$('#south14').bind('click', function() {
												redirect();
											});
											
											$('.songCount').show();
											$('.commentBox').show();
							
											return false;
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
	
	function postsongid1(id, songdbid, http_user_agent)
				{
					var musician_get = 'no';
					var dataString = "songid=" + id + "&songdbid=" + songdbid + "&musician_get=" + musician_get;
					if(dataString!="")
					{						
						$.ajax
						(
							{   									
								type: "POST", url: $("link[rel='canonical']").attr("href") + "/player_script_search.php", data: dataString,   
								success: 
									function(data) 
									{ 		
										// alert(data);
										var i =0;
										   result = jQuery.parseJSON( data ); 

										   var cnt = audioPlaylist.playlist.length;
											
											for(i=0;i< cnt ;i++) {
											  audioPlaylist.playlist.pop();
											}
											
											for(i=0;i<result.length;i++)
											{
														audioPlaylist.playlist.push({

														'tmp_song_id':result[i]['SONGID'], 
														'name':   result[i]['TITLE'],
														'mp3':   result[i]['PATH'],
														'poster':   result[i]['POSTER']
													});

													if(i == 0){
														play_song_id = result[i]['SONGID'];
														
													}

											}	

											$("#jquery_jplayer_2").jPlayer("setMedia", audioPlaylist.playlist[0]);
											$("#hid_songid").val(play_song_id);
											comments_load();
											song_hit();
											changeReview();
											billboard_load();
											getsongname();
											nextprev();
											
											if("android" != http_user_agent) {
												$("#jquery_jplayer_2").jPlayer("play");
											}
											
											$("#south14").attr("title", "Jump to this zone");
											$("#south14").css("cursor", "pointer");
											var imageURL = $("link[rel='canonical']").attr("href") + "/images/zoneicon.png";
											$("#south14").css("background", 'url("' + imageURL + '")');
											
											$('#south14').bind('click', function() {
												redirect();
											});
											
											$('.songCount').show();
											$('.commentBox').show();

											return false;
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