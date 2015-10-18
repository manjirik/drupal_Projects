<style>
*{margin:0; padding:0;}
#gmap{position:relative}
#destinationinfo {
display: none;
/*width: 200px;
height: 100px;*/
padding: 20px;
background: white;
border: 1px solid #CCC;
position: absolute;
z-index: 100;
top: 100px;
left: 100px;
}
#destinationInfo a.close{text-align:center; font-size:12px; font-weight:bold;padding:4px 8px; position:absolute; right:-5px; top:-5px; text-decoration:none; border:1px solid #cccccc; background:#efefef; color:#444444;}
.open{display:inline-block; cursor:pointer;}

#friendList {
	width:150px;
	height:250px;
	overflow:auto;
	position:absolute;
	top:20px;
	right:20px;
	background:#ffffff;
	padding:20px;
	font-family:verdana;
	font-size:12px;
}

ul.ui-autocomplete
{
   background:#efefef;
   padding:10px;
   list-style:none;
}
.ui-helper-hidden-accessible {
	color:#ff0000;
}
</style>



<script type="text/javascript">
  
$(function(){

  var availableTags = [
  <?php
  $i=0;
  $totFriends=sizeof($friends);
  foreach($friends as $frnd) { ?>
  
      <?php echo '"'.$frnd['first_name'].' '.$frnd['last_name'].'"';
	  if($i!=($totFriends-1)) echo ","; ?>
	  <?php
	  $i++;
	  
	}
	  ?>
     
    ];
    jQuery( "#tags" ).autocomplete({
      source: availableTags
    });
  
	$("#popup").hide();
	$(".close").click(function(){
		
		hideInfo();
	});
});
function showInfo(destination)
{
	
	$("#popup").html('');
	$.ajax({
                type: "GET",
                url: "<?php echo SITE_URL;?>index.php?r=gmap/get_city_data&city="+destination,

                success: function(data) {
                    //alert(data);
                    
                        $('#popup').html(data);
						
						$('.close').bind('click',function(){
							hideInfo();
						});
                    //alert(data);
                    
                }
				
				

            });
	
	//$('#info').html(destination);
	$('#popup').show();
}
function hideInfo()
{

	$('#popup').hide();
	
}


function ChooseFriend(fbid, fbname, fbimage) {
	$("#sucial_support_bar").append(' <img src="'+fbimage+'" />'+' '+fbname);
}
</script>
<?php echo $map['js']; ?>
<br />
<a href="index.php?r=gmap/map_view_friends">Click here for map</a>
<br /><br />
<div id="gmap">
<?php echo $map['html'];?>
<div id="friendList" class="friendList">
 <label for="tags">Tags: </label>
  <input id="tags" />
  <br />
	<?php
	foreach($unlocated as $ufrnd) {
		echo $ufrnd['first_name']." ".$ufrnd['last_name']."<br />";
	}
	?>
</div>
<div class="popup" id="popup">
     <a href="#" class="close">X</a>
     
</div>
</div>

<?php include('social_support_bar.php'); ?>