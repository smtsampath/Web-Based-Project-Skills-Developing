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
	$userTypeOfViewer = $profileRow['user_type'];
	if($userTypeOfViewer == $USER_TYPE_SITE_OPERATOR || $userTypeOfViewer == $USER_TYPE_ADMIN ){
		 
		if(isset($_GET['projectIdToEdit'])){
			
			$currentPage = $utilObj->getCurrentPageURL(); 
			$projectId = $utilObj->decodeString($_GET['projectIdToEdit']);  
			
			$projectRow = $projectObj->getProjectById($projectId);
			
			if(!isset($projectRow)){
				$utilObj->redirect_to("home");
			}
			 
		}else{
			$utilObj->redirect_to("home");
		} 
	}else{
		$utilObj->redirect_to("errorLoading");	
	} 
 
}else{ 
	$utilObj->redirect_to("home");
}

?>


	<script>
	$(function() {
		$( "#viewTab" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
		});


	});
	</script>

<html> 
	<title>My Project Skills | Edit Project Details</title> 
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
				<div id="viewTab"  class="tabPanel1">
                 	 
               		<div class="adminEditPanel"> 
                    	<?php require_once("formAdminEditProjectDetails.php"); ?>   
                    </div> 
                     
                    <div class="adminEditPanel">        
                          <?php require_once("formAdminEditProjectFiles.php"); ?>   
                    </div>    
                     
                
               </div>
                  

			</td>
		</tr> 
        
	</table>

	</body> 
</html>


<?php require("includes/mysql_database_connection_close.php"); ?> 