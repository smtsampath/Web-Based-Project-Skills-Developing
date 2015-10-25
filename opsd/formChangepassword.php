<?php
$changePWEResponse = "<font coloe=black>Change your password</font>";
$currentPage =  $utilObj->getCurrentPageName(); 	
if( $utilObj->isUserLoggedIn()){ 

	if(isset($_POST['changePasswordSubmit'])){   
		$username = $_SESSION['username'];
		$currentPW = $_POST['currentPassword'];
		$newPW = $_POST['newPassword'];
		$newPWConf = $_POST['newPasswordConfirm'];
	
		$encodedNewPW =  $utilObj->encodeString($newPW);
		$encodedCurrentPW =  $utilObj->encodeString($currentPW);
		
		$changePWEResponse = $profileObj->changePW($username,$encodedCurrentPW,$encodedNewPW);
	}
}else{
	$utilObj->redirect_to("home");
}

?>


<script type="text/javascript" src="js/forms/formChangePassword.js"> </script>

<form method="post" action="<?php echo $currentPage; ?>" id="form" >

	<table class="formFontOnly" width="53%">
    	<tr>
            <td class="headercell" colspan="2">Change Password</td> 
        </tr>
 		 <tr>
            <td class="labelcell">Current Password</td>
            <td class="fieldcell"><input type='password' name="currentPassword" id="currentPassword"   /></td>
        </tr>
        <tr>
            <td class="labelcell">New Password</td>
            <td class="fieldcell"><input type='password' name="newPassword" id="newPassword"  /></td>
        </tr>
        <tr>
            <td class="labelcell">Confirm New Password</td>
            <td class="fieldcell"><input type='password' name="newPasswordConfirm" id="newPasswordConfirm"  /></td>
        </tr>
        <tr > 
            <td colspan="2"  ><input type="submit" value="Change Password" name="changePasswordSubmit" id="changePasswordSubmit" class="submit"/></td>
        </tr> 	
        <tr > 
            <td colspan="2" class="changePWErrorShowDiv" ><div id="changePWErrorMsg"><?php if(isset($changePWEResponse)){echo $changePWEResponse ;}?></div></td>
        </tr> 
 
 	</table>

</form>