<?php require_once("commonHeaderIncludes.html"); ?>  
<?php require_once("jQueryHeaderIncludes.html"); ?>   
<?php require_once("jQueryFileInputsHeaderIncludes.html"); ?>   
<?php require_once("jQueryMultipleFileUploadHeaderIncludes.html"); ?>   
<?php require_once("JQueryCookieHeaderIncludes.html"); ?>   
<?php require_once("jQueryPaginateTableHeaderIncludes.html"); ?>  
 
<?php require_once("includes/session.php"); ?>    
<?php require_once("includes/constant_Vairables.php"); ?> 
<?php require_once("includes/country_list.php"); ?> 

<?php require_once("includes/profile_class.php"); ?>   
<?php require_once("includes/util_class.php"); ?> 
<?php require_once("includes/project_class.php"); ?> 
<?php require_once("includes/project_client_file_class.php"); ?>  
<?php require_once("includes/project_request_class.php"); ?>  
<?php require_once("includes/user_feedback_class.php"); ?>  

<?php
$utilObj->redirectToHTTPS();
if($utilObj->isUserLoggedIn()){  
	$username = $_SESSION['username'];
	$profileRow = $profileObj->getProfilebyUsername($username) ;
	$userType = $profileRow['user_type'];
	if(!$userType == $USER_TYPE_PROJECT_CLIENT){
		 $utilObj->redirect_to("errorLoading");
	} 
 
}else{
	$utilObj->redirect_to("home");
}

?>


	<script>
	$(function() {
		$( "#clientTabs" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
		});


	});
	</script>

<html> 
	<title>My Project Skills | Project Client User Account</title> 
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
				<div id="clientTabs"  class="tabPanel1">
                 	<ul>
                        <li><a href="#manageProfileTab">Manage Profile</a></li>
                        <li><a href="#manageProjectsTab">Manage Projects</a></li>
                        <li><a href="#manageProjectRequestsTab">Manage Project Requests</a></li>
                        <li><a href="#reviewsRatingsTab">Reviews and Ratings</a></li> 
                    </ul>
                 	<div id="manageProfileTab"> 
                    	<?php  require_once("editProfilePanel.php"); ?>  
                    </div>
                    <div id="manageProjectsTab"> 
                    	<?php require_once("manageProjectsPanel.php"); ?>  
                    </div>
                    <div id="manageProjectRequestsTab"> 
                    	<?php require_once("manageRequestsPanel.php"); ?>  
                    </div>
                    <div id="reviewsRatingsTab"> 
                    	<?php require_once("feedbacksTabSet.php"); ?>  
                    </div> 
                 
                 </div>
                  

			</td>
		</tr> 
        
	</table>

	</body> 
</html>


<?php require("includes/mysql_database_connection_close.php"); ?> 