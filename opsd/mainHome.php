<?php require_once("commonHeaderIncludes.html"); ?>
<?php require_once("includes/session.php"); ?>  
 
<?php require_once("includes/constant_Vairables.php"); ?> 

<?php require_once("includes/profile_class.php"); ?> 
<?php require_once("includes/util_class.php"); ?> 

<?php require_once("formPopupSignInAction.php"); ?>   

<?php
$utilObj->redirectToHTTPS();
$signInResponse="Fill all required fields";  
if(!$utilObj->isUserLoggedIn()){  
		if (isset($_POST['homepageSignInSubmit'])) {
			$username = $_POST['usernameHP'];
			$password = $utilObj->encodeString($_POST['passwordHP']);
			 
			if(isset($_POST['rememberPW']) && ($_POST['rememberPW'] == "ON")){
				$rememberMe = true;
			}else{
				$rememberMe = false;
			}
			
			$signInResponse = $profileObj->login($username ,$password ,$rememberMe);
			
		}else{
			$username = "";
			$password = "";
			$rememberMe = "";
		}
 
}else{
	$utilObj->redirect_to("userHome");
}

?>
 
<script type="text/javascript" src="js/forms/formHomePageSignIn.js"> </script>

<html> 
	<title>My Project Skills | Home</title> 
    <body class='home'>

	<table width="100%"  class="formFontOnly">
		<tr>
			<td width="100%" > 
				<div class="headerImage"><?php require_once("headerImage.html"); ?> </div>
			</td>
		</tr>  
		<tr>
			<td width="100%" >
				<div  class="siteMenu"> <?php  require_once("siteMenu.php"); ?>  </div>
			</td>
		</tr> 
        <tr>
			<td width="100%" >
				 <div class="homePageLogo"> <?php require_once("homePageLogo.html"); ?>  </div> 
			</td>
		</tr> 
		<tr>
			<td width="100%" >
            <div  id="homePageProjectTableDiv">
				<table id="projectTable"  width="55%">
                	<tr>
                        <td > 
                            <?php require_once("formHomePageLatestProjectsTable.php"); ?>   
                    </tr> 
                </table> 
                
            	<table  id="homepageSigninFormTable"   border="0" >
                	<tr>
                        <td  > 
                            <?php require_once("formHomePageSIgnIn.php"); ?>  
                        </td>
                    </tr> 
                </table> 
                 </div>
			</td> 
		</tr>  
        
	</table>

	</body> 
</html>

<?php require("includes/mysql_database_connection_close.php"); ?> 