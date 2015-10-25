<?php 
require("session.php"); 

$numero = rand(100, 99999);
$_SESSION['captcha'] = ($numero); 
//imagecreate -- Create a new palette based image
$img = imagecreate(60, 20);
//displaying the random text on the captcha image
$black = imagecolorallocate($img, 0, 0, 0); 
$number = $black . $numero;
$white = imagecolorallocate($img, 255, 255, 255); 
imagestring($img, 10, 8, 3, $numero, $white); 
header ("Content-type: image/png"); 
imagepng($img); 


?>