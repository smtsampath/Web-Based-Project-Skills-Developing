
<?php 

if(!$utilObj->isUserLoggedIn()){  
		$signInPopResponse = " "; 
		$currentPage = $utilObj->getCurrentPageURL() ;  
		if (isset($_POST['signInSubmitPop'])) {
			$usernamePop = $_POST['usernamePop'];
			$passwordPop = $utilObj->encodeString($_POST['passwordPop']);
			 
			if(isset($_POST['rememberPWPop']) && ($_POST['rememberPWPop'] == "ON")){
				$rememberMePop = true;
			}else{
				$rememberMePop = false;
			}
			
			$signInPopResponse =  $profileObj->login($usernamePop ,$passwordPop ,$rememberMePop);
			
		}else{
			$usernamePop = "";
			$passwordPop = "";
			$rememberMePop = "";
		}
}else{
	 $utilObj->redirect_to("userHome");
}


?>