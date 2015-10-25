<?php require_once("commonHeaderIncludes.html"); ?>  
<?php require_once("jQueryHeaderIncludes.html"); ?>    
<?php require_once("JQueryCookieHeaderIncludes.html"); ?>   
<?php require_once("jQueryPaginateTableHeaderIncludes.html"); ?>     

<?php require_once("includes/session.php"); ?>
<?php require_once("includes/mysql_database_connection.php"); ?>  
<?php require_once("includes/constant_Vairables.php"); ?>  
 
<?php require_once("includes/util_class.php"); ?> 
<?php require_once("includes/profile_class.php"); ?>  
 

<?php 
$utilObj->redirectToHTTPS();
if(!$utilObj->isUserLoggedIn()){ 
	require_once("formPopupSignInAction.php"); 	
} 
?> 
 
<?php
 
$forgotPWResponse="Enter email to get login details";  
if(!$utilObj->isUserLoggedIn()){  
		if (isset($_POST['forgotPWSubmit'])) {
			$userEmail = $_POST['emailToForgotPW'];
			
			$userProfileRow = $profileObj->getProfilebyEmail($userEmail);
			
			if(isset($userProfileRow)){
				$usernameToSend = $userProfileRow["username"];
			
				$encodedPW = $userProfileRow["password"];
				 
				$passwordToSend = $utilObj->decodeString($encodedPW);  
				
				$subject = "Your Account Login Details!";
				
				$message = "Here are the username and password of your account<br>Username : ".$usernameToSend."<br>Password : ".$passwordToSend ;			  
				$sendmailResponse = $utilObj->sendMail($subject,$message,$userEmail);
				
				if($sendmailResponse){
					$forgotPWResponse = "<font color=green>An email with login details has been sent. Check you email inbox</font>";
				}else{
					$forgotPWResponse = "<font color=red>An error occured in email sending. Contact admin regarding the issue.</font>";	
				}							
				
			}else{
				$forgotPWResponse = "<font color=red>Email does not exists</font>";
			} 
		}  
 
}else{
	$utilObj->redirect_to("userHome");
}

?>
 
<script type="text/javascript">


	function validateEmail(){
		var email = $("#emailToForgotPW").val();    
		var emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if(email.trim()){
			if(emailRegex.test(email)) { 
				$("#emailToForgotPW").css("border","1px solid #00B050");
				$("#emailToForgotPW").css("background","#BCE292"); 
				$("#responseMsg").html("<font color=green>Valid email</font>");  
				return true;
			}else{
				$("#emailToForgotPW").css("border","1px solid #E20012");
				$("#emailToForgotPW").css("background","#FFA5AE"); 
				$("#responseMsg").html("<font color=red>Invalid email</font>"); 
				return false;
			}
		}else{
			$("#emailToForgotPW").css("border","1px solid #E20012");
			$("#emailToForgotPW").css("background","#FFA5AE"); 
			$("#responseMsg").html("<font color=red>Email is required</font>"); 
			return false;
		}
	}

	$(document).ready(function(){
			   
		$( "#forgotPWSubmit" ).button();	
		$( "#forgotPWSubmit" ).css("border" , "1px solid #000000");	
		$( "#viewPanel" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
		});

		$("#emailToForgotPW").blur(
			function(){
				validateEmail();
			}						
		);
		$("#emailToForgotPW").keyup(
			function(){
				validateEmail();
			}						
		);
		
		$("#forgotPWSubmit").click(
			function(){
				if(validateEmail()){
					return true;	
				}else{
					return false;	
				}
			}					 								 
		);
		
	});
	
	
	
	
</script>

<html> 
	<title>My Project Skills | Forgot Password</title> 
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
			<td width="100%"  >
            
				<div id="viewPanel"  class="tabPanel1">
                
                <center>
                
                <form method="post"  action="forgotPassword" id="forgotPw" name="forgotPw">
                <table class="formFontOnly">
                <tr>
                	<td>
                    	<input type="text" name="emailToForgotPW" id="emailToForgotPW" size="50" value="<?php if(isset($userEmail)){echo htmlentities($userEmail);} ?>"/>
                    </td>
                    <td>
                    	 <input type="submit" name="forgotPWSubmit" id="forgotPWSubmit" value="Send Login Details" />
                    </td>
                </tr> 
                <tr >
                	<td colspan="2">
                    
                    	<div id="responseMsg"><?php  echo $forgotPWResponse; ?></div>
                    </td>
                </tr>
                 </table>
                </form>
                 
                </center>
            	</div>  
			</td>
		</tr>  
	</table> 
	</body> 
</html>


<?php require("includes/mysql_database_connection_close.php"); ?> 