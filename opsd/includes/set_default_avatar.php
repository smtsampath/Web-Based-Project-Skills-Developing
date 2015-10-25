<?php require_once("session.php"); ?>
<?php require_once("constant_Vairables.php"); ?>

<?php require_once("profile_class.php"); ?> 
<?php require_once("util_class.php"); ?>

<?php 
if(isset($_GET['userIdToChangeImage'])){ 
	$profileId = $utilObj->decodeString($_GET['userIdToChangeImage']);  
	$userProfile =  $profileObj->getProfilebyId($profileId) ;
	$userProfileImagePath = $userProfile["profile_image_path"];
	$username =  $userProfile["username"];
	unlink("../".$userProfileImagePath) ; 
	
	$profileObj->setProfileImagePath( $DEFAULT_AVATAR_PATH ,$username);
	
	$utilObj->redirect_to("administrationEditUserDetails-".$_GET['userIdToChangeImage']);
}else{
	$username = $_SESSION['username'];
	$userProfile =  $profileObj->getProfilebyUsername($username) ;	 
	$userProfileImagePath = $userProfile["profile_image_path"];
	unlink("../".$userProfileImagePath) ; 
	
	$profileObj->setProfileImagePath( $DEFAULT_AVATAR_PATH ,$username);
	
	//$utilObj->redirect_to("../myAccountRedirect");
}



?>