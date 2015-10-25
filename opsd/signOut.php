<?php require_once("includes/session.php"); ?> 
<?php require_once("includes/util_class.php"); ?> 
<?php
$utilObj->redirectToHTTPS();
$_SESSION = array();
if(isset($_COOKIE['username'])){
	setcookie("username", "", time()-1);   
}
if(isset($_COOKIE['password'])){
	setcookie("password", "", time()-1);   
} 

$utilObj->redirect_to("home"); 

?>

<?php require("includes/mysql_database_connection_close.php"); ?> 