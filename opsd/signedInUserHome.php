<?php require_once("commonHeaderIncludes.html"); ?>  
<?php require_once("jQueryHeaderIncludes.html"); ?>   

 
<?php require_once("includes/session.php"); ?>   
<?php require_once("includes/constant_Vairables.php"); ?>  

<?php require_once("includes/profile_class.php"); ?>   
<?php require_once("includes/util_class.php"); ?>    

<?php
$utilObj->redirectToHTTPS();
if($utilObj->isUserLoggedIn()){ 
	$username = $_SESSION['username'];
	$userProfile = $profileObj->getProfilebyUsername($username) ;
	$userFirstName = 	$userProfile['first_name']; 
	$userLastName = 	$userProfile['last_name']; 
	$userEmail = 	$userProfile['email']; 
	$userType = 	$userProfile['user_type']; 
	$memberSince = 	$userProfile['created_date'];  
	$memberSinceDevide = explode(" ",$memberSince);
	$memberSince = $memberSinceDevide[0];
	$userProfileImagePath = $userProfile['profile_image_path'];  
 
 
}else{
	$utilObj->redirect_to("home");
}

?>

<html> 
	<title>My Project Skills | Home</title> 
    <body class='home'>

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
				 <div class="homePageLogo"> <?php require_once("homePageLogo.html"); ?>  </div> 
			</td>
		</tr> 
        <tr>
			<td width="100%" >
            <div  id="homePageProjectTableDiv">
				<table id="projectTable"  width="40%" >
                	<tr>
                        <td > 
                            <?php require_once("formHomePageLatestProjectsTable.php"); ?>   
                    </tr> 
                </table> 
                
            	<table  id="homepageSigninFormTable"    width="40%" >
                	<tr>
                        <td  > 
                            <?php require_once("welcomePanel.php"); ?>  
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