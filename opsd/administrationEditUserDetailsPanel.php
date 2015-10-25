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
	$currentPage = $utilObj->getCurrentPageURL(); 
	$username = $_SESSION['username'];
	$profileRow = $profileObj->getProfilebyUsername($username) ;
	$userTypeOfViewer = $profileRow['user_type'];
	if($userTypeOfViewer == $USER_TYPE_SITE_OPERATOR || $userTypeOfViewer == $USER_TYPE_ADMIN ){
		if(isset($_GET['userIdToEdit'])){
			$profileId = $utilObj->decodeString($_GET['userIdToEdit']);  
			
			$userRowToEdit =  $profileObj->getProfilebyId($profileId) ;
			 
			if(isset($userRowToEdit)){
				$userTypeToEdit = $userRowToEdit["user_type"]; 
			
				if(($userTypeOfViewer == $USER_TYPE_SITE_OPERATOR || $userTypeOfViewer == $USER_TYPE_ADMIN ) && ($userTypeToEdit == $USER_TYPE_PROJECT_CLIENT || $userTypeToEdit == $USER_TYPE_PROJECT_DEVELOPER)){ 
				
				
				}else if(  $userTypeOfViewer == $USER_TYPE_ADMIN  &&  $userTypeToEdit == $USER_TYPE_SITE_OPERATOR ){ 
					
				}else{
					$utilObj->redirect_to("errorLoading");	 
				} 
			}else{ 
			echo "a";
			//	$utilObj->redirect_to("home");
			}  
		}else{
			echo "b";
			//$utilObj->redirect_to("home");
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
	<title>My Project Skills | Edit User Details</title> 
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
                    	<?php require_once("formAdminEditUserProfileDetails.php"); ?>   
                    </div> 
                    <!--<h3><a href="#">User Password</a></h3>-->
                     
                   <!-- <h3><a href="#">User Profile Image</a></h3>-->
                   
                    <div class="adminEditPanel">        
                          <?php require_once("formAdminChangeProfileImage.php"); ?>   
                    </div>    
                    <?php  
                      
                    if(isset($userTypeToEdit) && $userTypeToEdit == "Project Developer"  ){ ?>
                    <div class="adminEditPanel">        
                          <?php require_once("formAdminAddDonationLink.php"); ?>   
                    </div> 
                     
                     <div class="adminEditPanel">        
                          <?php  require_once("formAdminChangeUserPreferences.php"); ?>   
                    </div> 
                    <?php } ?>
                
               </div>
                  

			</td>
		</tr> 
        
	</table>

	</body> 
</html>


<?php require("includes/mysql_database_connection_close.php"); ?> 