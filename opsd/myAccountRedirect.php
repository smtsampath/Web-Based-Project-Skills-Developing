<?php require_once("includes/constant_Vairables.php"); ?>
<?php require_once("includes/session.php"); ?>

<?php require_once("includes/util_class.php"); ?>
<?php require_once("includes/profile_class.php"); ?>

<?php  
$utilObj->redirectToHTTPS();
	if(isset($_SESSION['username'])){
		
		$username = $_SESSION['username'];
		$profileRow = $profileObj->getProfilebyUsername($username) ;
		$userType = $profileRow['user_type']; 
		if($userType == $USER_TYPE_PROJECT_CLIENT){
			$utilObj->redirect_to("projectClientMyAccount");
		}else if($userType == $USER_TYPE_PROJECT_DEVELOPER){
			$utilObj->redirect_to("projectDeveloperMyAccount");
		}else if($userType == $USER_TYPE_SITE_OPERATOR){
			$utilObj->redirect_to("siteOperatorMyAccount");
		}else if($userType == $USER_TYPE_ADMIN){
			$utilObj->redirect_to("adminMyAccount");
		}  
		
	}else{
		$utilObj->redirect_to("home");
	}

?>