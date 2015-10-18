function shareSomething(name, link, picture, caption, description, message) {
   FB.ui(
   {
     method: 'feed',
     name: name,
     link: link,
     picture: picture,
     caption: caption,
     description: description,
     message: message
   },
   function(response) {
     if (response && response.post_id) {
      
     } else {
       
     }
   }
 );
}
FB.init({
            appId  : '115981465149969',
            status : true, // check login status
            cookie : true, // enable cookies to allow the server to access the session
            xfbml  : true  // parse XFBML
});
FB.Canvas.setAutoResize();