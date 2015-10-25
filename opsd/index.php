<?php require_once("includes/session.php"); ?>
   
<?php require_once("includes/util_class.php"); ?> 

<?php
 
$utilObj->redirectToHTTPS();

//check if user has logged in and riderect to the proper home page
if( $utilObj->isUserLoggedIn()){ 
   $utilObj-> redirect_to("userHome");
} else {
    $utilObj->redirect_to("home");
}
?>