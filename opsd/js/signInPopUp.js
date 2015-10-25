$(document).ready(function()
{
 $(".signInLink").click(function()
 {
  $("#login_box").fadeIn();
  return false;
 });
 
 var options = {};

 
  $("#signInPopUpClose").click(function()
 {
  $("#login_box").hide( "fade",  1000 );
  return false;
 });
});  
