<?php require_once("commonHeaderIncludes.html"); ?>  
<?php require_once("jQueryHeaderIncludes.html"); ?>   
<?php require_once("JQueryCookieHeaderIncludes.html"); ?>   
<?php require_once("jQueryPaginateTableHeaderIncludes.html"); ?>     
    
<?php require_once("includes/mysql_database_connection.php"); ?>      
<?php require_once("includes/session.php"); ?>   
<?php require_once("includes/country_list.php"); ?>   
<?php require_once("includes/constant_Vairables.php"); ?>   

<?php require_once("includes/profile_class.php"); ?>   
<?php require_once("includes/util_class.php"); ?>    

<?php require_once("formPopupSignInAction.php"); ?>   

<?php  

$utilObj->redirectToHTTPS(); 
$signUpResponse = "Fill all required fields"; 

if(!$utilObj->isUserLoggedIn()){  
	if (isset($_POST['signUpSubmit'])) {
		 
		$usernameR = ($_POST['usernameR']);
		$email = $_POST['email']; 
		$userType =$_POST['userType']; 
		$firstName = $_POST['firstName']; 
		$lastName = $_POST['lastName']; 
		$dob = $_POST['dob'];   
		$dob = date('y-m-d' ,strtotime( $dob ));
		$gender = $_POST['gender']; 
		$address1 = $_POST['address1']; 
		$address2 = $_POST['address2']; 
		$city = $_POST['city']; 
		$country = $_POST['country'];  
		$contactNumber = $_POST['contactNumber']; 
		$website =$_POST['website'];  
		$passwordR =$_POST['passwordR']; 
		$passwordConfirmation =$_POST['passwordConfirmation'];  
		 
		   
		$captcha = $_POST['captcha'];
		$captchaSessionVar = $_SESSION['captcha'];
		
		  
		if($captcha == $captchaSessionVar) {
			$signUpResponse =  $profileObj->addProfile(trim($usernameR),trim( $email),trim( $firstName),trim($lastName),trim( $address1), trim($address2), trim($city),trim($contactNumber), trim($website), trim($passwordR), trim($userType), trim($dob), trim($gender), trim($country) );
			 
		}else{
			$signUpResponse = "<font color='red'>Invalid image verification code</font>";  
		}
		
	}else{
		$usernameR ="";
		$email = "";
		$userType ="";
		$firstName = "";
		$lastName = "";
		$dob = "";
		$gender = "";
		$address1 = "";
		$address2 = "";
		$city = "";
		$country = ""; 
		$contactNumber = "";
		$website =""; 
		$passwordR ="";
		$passwordConfirmation ="";
		$captcha = "";
		$captchaSessionVar ="";
	} 
}else{
	$utilObj->redirect_to("userHome");
}
 

?> 
 
<script>
	$(function() {
		$( "#viewPanel" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
		});


	});
</script>
 
<html> 
	<title>My Project Skills | Sign Up</title> 
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
            	<div id="viewPanel"  class="tabPanel1">
               		<center><?php require_once("formSignUp.php"); ?></center><br><br><br>
                </div> 
			</td>
		</tr> 
	</table>

	</body> 
</html>


<?php require("includes/mysql_database_connection_close.php"); ?> 