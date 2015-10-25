<?php  

$utilObj->redirectToHTTPS(); 
$assignSOResponse = "Fill all required fields"; 
$currentPage = $utilObj->getCurrentPageUrl(); 	 

if($utilObj->isUserLoggedIn()){ 

	$username = $_SESSION["username"];
	$profileTableRow =   $profileObj->getProfilebyusername($username) ;

	$loggedInUserType = $profileTableRow["user_type"]; 
	 
	if(trim($loggedInUserType) == trim($USER_TYPE_ADMIN)){
		if (isset($_POST['addSiteOperatorSubmit'])) {
		 
			$usernameR = ($_POST['usernameASO']);
			$email = $_POST['emailASO']; 
			$userType = $USER_TYPE_SITE_OPERATOR; 
			$firstName = $_POST['firstNameASO']; 
			$lastName = $_POST['lastNameASO']; 
			$dob = $_POST['dobASO'];   
			$dob = date('y-m-d' ,strtotime( $dob ));
			$gender = $_POST['genderASO']; 
			$address1 = $_POST['address1ASO']; 
			$address2 = $_POST['address2ASO']; 
			$city = $_POST['cityASO']; 
			$country = $_POST['countryASO'];  
			$contactNumber = $_POST['contactNumberASO']; 
			$website =$_POST['websiteASO'];  
			$passwordR =$_POST['passwordASO']; 
			$passwordConfirmation =$_POST['passwordConfirmationASO'];  
			  
			$captcha = $_POST['captchaASO'];
			$captchaSessionVar = $_SESSION['captcha'];
			 
			if($captcha == $captchaSessionVar) {
				$assignSOResponse =  $profileObj->addProfile(trim($usernameR),trim( $email),trim( $firstName),trim($lastName),trim( $address1), trim($address2), trim($city),trim($contactNumber), trim($website), trim($passwordR), trim($userType), trim($dob), trim($gender), trim($country) );
				 
			}else{
				$assignSOResponse = "<font color='red'>Invalid image verification code</font>";  
			}
			
 
		}else{
 
		} 
		
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
	}else{ 
		$utilObj->redirect_to("home"); 
	} 
}else{
	$utilObj->redirect_to("home");
}
 

?>  
 
 

	<table width="100%" >
 
        <tr>
			<td width="100%" >
             
                	<br><br><center><div ><?php require_once("formAssignSiteOperators.php"); ?>  </div></center>
                 
			</td>
		</tr> 
	</table>
 
 