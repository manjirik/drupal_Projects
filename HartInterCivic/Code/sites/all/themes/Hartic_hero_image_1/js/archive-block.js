

(function ($) {

$(document).ready(function() {
  // init: collapse all groups except for the active path
  var a = false;
  $(".archive-block ul").each(function(i) {
    if ($(this).find("a.active").size() > 0) {
      $(this).siblings("h3").children(".collapse-icon").text("▼");
      a = true;
    }
    else {
      $(this).hide();
    }
  });
  if (!a) {
    $(".archive-block").find("h3").first().children(".collapse-icon").text("▼");
    $(".archive-block").find("ul").first().hide();
  }

 // click event: toggle visibility of group clicked (and update icon)
 $(".archive-block h3").click(function()
 {
  var icon = $(this).children(".collapse-icon");
  $(this).siblings("ul").slideToggle(function()
  {
   (icon.text()=="▼") ? icon.text("►") : icon.text("▼");
  });
 });
});
})(jQuery);




