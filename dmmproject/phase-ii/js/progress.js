var HttpRequestObject = false;
if(window.XMLHttpRequest) {
   HttpRequestObject = new XMLHttpRequest();
}
else if(window.ActiveXObject) {
   HttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
}
function startProgress(uid, divId) {
  // document.getElementById('upload').style.display = 'none';
  //alert('sp1'+uid+'sp2');
  //alert(divId)
  var outerId = "pb_outer"+divId;
  //alert(outerId+$(outerId).html())
   $("#pb_outer"+divId).css('display','block');
   $("#pb_inner"+divId).css('width',100 + '%');
   setTimeout('getProgress("' + uid + '", "'+divId+'")', 1000);
}

function sleep(milliSeconds){
    var startTime = new Date().getTime(); // get the current time
    while (new Date().getTime() < startTime + milliSeconds); // hog cpu
	
}
function getProgress(uid, divId) {
   if(HttpRequestObject) {
      HttpRequestObject.open('GET', 'getprogress.php?uid=' + uid, true);
      HttpRequestObject.onreadystatechange = function() {
         if(HttpRequestObject.readyState == 4 && HttpRequestObject.status == 200) {
			//alert('gp1'+uid+'gp2');
			
            var progress = HttpRequestObject.responseText;
            //$("#pb_inner"+divId).css('width',progress + '%');
			$("#pb_inner"+divId).css('width', '100%');
            //$("#pb_inner"+divId).html(progress + '%');
            if(progress < 100) {
               setTimeout('getProgress("' + uid + '", "'+divId+'")', 10000);
            }
            else {

				$("#pb_inner"+divId).css('width', '0%');
				if(divId == '_song')
				{
					$("#btnSongSubmit").attr("disabled", false);
					$("#btnSongSubmit").removeClass("btnLtBlueSubmit").addClass("btnLtBlue");
				}
				else if(divId == '_adv')
				{
					$("#btnAdvSubmit").attr("disabled", false);
					$("#btnAdvSubmit").removeClass("btnLtBlueSubmit").addClass("btnLtBlue");
				}
				else if(divId == '_reg')
				{
					$("#btnRegSubmit").attr("disabled", false);
					$("#btnRegSubmit").removeClass("btnLtBlueSubmit").addClass("btnLtBlue");
				}
				else
				{
					$("#btnProfileSubmit").attr("disabled", false);	
					$("#btnProfileSubmit").removeClass("btnLtBlueSubmit").addClass("btnLtBlue");
				}
            }
         }
      }
      HttpRequestObject.send(null);
   }
}