<?php require_once("commonHeaderIncludes.html"); ?>  
<?php require_once("jQueryHeaderIncludes.html"); ?>   
 
<?php require_once("includes/session.php"); ?>    

<?php require_once("includes/profile_class.php"); ?> 
<?php require_once("includes/util_class.php"); ?> 

<?php require_once("formPopupSignInAction.php"); ?>   

<?php
$utilObj->redirectToHTTPS();
$signInResponse="Fill all required fields"; 

if(!$utilObj->isUserLoggedIn()){  
	if(isset($_SESSION['isFirstTimeSignIn'])){
		if (isset($_POST['firstSignInSubmit'])) {
			$username = $_POST['usernameFS'];
			$password = $utilObj->encodeString($_POST['passwordFS']);
			 
			if(isset($_POST['rememberPW']) && ($_POST['rememberPW'] == "ON")){
				$rememberMe = true;
			}else{
				$rememberMe = false;
			}  
			 
			$signInResponse =  $profileObj->login($username ,$password ,$rememberMe);
			
		}else{
			$username = "";
			$password = "";
			$rememberMe = "";
		}
	}else{
		$utilObj->redirect_to("home");
	}
	
}else{
	$utilObj->redirect_to("userHome");
}
?>



<html> 
	<title>My Project Skills | Sign In</title> 
    <body class='body'>

	<table width="100%" >
		<tr>
			<td width="100%" > 
				<div class="headerImage"><?php require_once("headerImage.html"); ?> </div>
			</td>
		</tr>  
		<tr>
			<td width="100%" >
				<div  class="siteMenu"><?php require_once("siteMenu.php"); ?>  </div>
			</td>
		</tr> 
        <tr>
			<td width="100%" >
				<div  class="firstSignInForm"><?php require_once("formFirstSgnIn.php"); ?>  </div>
			</td>
		</tr> 
	</table>

	</body> 
</html>


<?php require("includes/mysql_database_connection_close.php"); ?> 