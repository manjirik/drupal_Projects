<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> New Document </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <script>
  function getProgress(){
		GDownloadUrl("upload.php?progress_key=<?php echo($unique_id)?>", 
		   function(percent, responseCode) {
			   document.getElementById("progressinner").style.width = percent+"%";
			   if (percent < 100){
					setTimeout("getProgress()", 100);
			   }
		   });
 
}
 
function startProgress(){
    document.getElementById("progressouter").style.display="block";
    setTimeout("getProgress()", 1000);
}


  </script>
 </head>

 <body>
 <form action="upload.php"
enctype="multipart/form-data" method="post">

<p>
Please specify a file, or a set of files:<br>
<input type="file" name="datafile" size="40">
<?php
   $unique_id = uniqid("");
?>
<input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" value="<?php echo $unique_id?>"/>
</p>
<div>
<input type="submit" value="Send" onclick="startProgress()">
</div>
<div id="progressinner">
</div>
</form>
  
 </body>
</html>
