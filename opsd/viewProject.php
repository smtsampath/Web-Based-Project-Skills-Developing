<?php require_once("commonHeaderIncludes.html"); ?>  
<?php require_once("jQueryHeaderIncludes.html"); ?>    
<?php require_once("JQueryCookieHeaderIncludes.html"); ?>   
<?php require_once("jQueryPaginateTableHeaderIncludes.html"); ?>          
 
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/mysql_database_connection.php"); ?>  
<?php require_once("includes/constant_Vairables.php"); ?>  

<?php require_once("includes/project_class.php"); ?>    
<?php require_once("includes/util_class.php"); ?> 
<?php require_once("includes/profile_class.php"); ?> 
<?php require_once("includes/project_request_class.php"); ?> 
 
<?php 
$utilObj->redirectToHTTPS();
if(!$utilObj->isUserLoggedIn()){ 
	require_once("formPopupSignInAction.php"); 	
} 
?>    

<?php 

if(isset($_GET['projectIdToView'])){
	
	$projectId = $utilObj->decodeString($_GET['projectIdToView']);
	 
	$projectRecord = $projectObj->getProjectById($projectId);
	
	if(isset($projectRecord)){
		$projectTitle = $projectRecord["title"];  
		
		$profileId = $projectRecord["profile_id"];  
		
		$clientProfileRow = $profileObj->getProfilebyId($profileId);  
		
		$projectClientUsername = $clientProfileRow["username"];
		 
		$projectType = $projectRecord["category"];
		$projectDescription = $projectRecord["description"];
		
		$projectAddedDate = $projectRecord["created_date"];
		$projectAddedDateArray = explode( " " , $projectAddedDate);
		$projectAddedDate = $projectAddedDateArray[0];
		
		$projectStatus = $projectRecord["status"];
		
		$projectFilesArray = $projectObj->getProjectClientFileList($projectId); 
		
		$projectTagCombination = $projectRecord["project_tags"]; 
	}else{
		$utilObj->redirect_to("errorLoading");
	} 
	
}else{ 

	$utilObj->redirect_to("home");
}
	
 

?>

<script type="text/javascript">

function confirmSending(){
		
	var confm = window.confirm("Are you sure want to send a request for this project ?");
   
  	if(confm == true) { 
		return true;
  	} else {
    	return false;
  	} 
}

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
	<title>My Project Skills | View Project</title> 
    <body class='body'>

	<table width="100%"  >
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
			<?php if(isset($projectRecord)){ ?>	 
            
           
            	<b>Project Title : </b><?php echo $projectTitle ;?><br><br>
                <b>Added By : <a href="users-<?php echo $utilObj->encodeString($profileId) ;?>" target="_blank"><font color=black><?php echo $projectClientUsername ;?></font></a></b><br><br>
                <b>Project Type : </b><?php echo $projectType ;?><br><br>
                <b>Project Description : </b> <br>
				<div class="headercell2" style="width:42%;margin-top:2%"><?php echo $projectDescription ;?> </div><br><br>
                <b>Project Added On : </b><?php echo $projectAddedDate ;?><br><br>
                <b>Project Status : </b>
				<?php  
								if($projectStatus ==  "Available"){
                                    $projectStatus = "<font color=green>".$projectStatus."</font>";
                                }else if($projectStatus ==  "Assigned"){
                                    $projectStatus = "<font color=orange>".$projectStatus."</font>";
                                }else if($projectStatus ==  "Cancelled"){
                                    $projectStatus = "<font color='red'>".$projectStatus."</font>";
                                }else if($projectStatus ==  "Completed"){
                                    $projectStatus = "<font color='blue'>".$projectStatus."</font>";
                                }
								echo "<b>".$projectStatus."</b>" ;
				
				?><br><br>
                <b>Project Tags : </b> <?php echo $projectTagCombination ;?><br><br>
                <b>Uploaded Files : </b> <?php if(count($projectFilesArray) == 0){ echo "No files have uploaded by the client to this project <br><br>" ;}else{ ?>	 <br><br>
                
                 
                
              
                <?php foreach($projectFilesArray as $projectFilePath){ 
                			$projectFileTitle  = $projectFilePath['file_title'];
							$projectFilePath = $projectFilePath['file_path'];  ?>
                              <table class="formFontOnly">
                            <tr>
                            <td class="headercell2" width="50%"><a href="<?php echo $projectFilePath ;?>"><font color="#000000"><?php echo $projectFileTitle ;?></font></a></td>
                            </tr>
                               </table> 
             	<?php } ?> 
                <?php } ?>  
              <br> 
               <?php  
			  if(isset($_SESSION['username'])){
			  	$loggedInUsername = $_SESSION['username']; 
			  	if($projectRequestObj->isValidUserToSendRequest($loggedInUsername , $projectId)){ 
					  
			  ?> 
             
            <br><b> <a href="requestSend-<?php echo $utilObj->encodeString($projectId) ;?>" id="sendRequestLink" onClick="return confirmSending();"><font color="#000000">Send a Request to Client</font></a>  </b>  <br><br><br>
             
             
             <?php  }else{ 
			 $requestResponseMsg = "<font color=red><b>You are not authorized to send the request for this project.</b></font><br>
		Possible reasons: <br>
		1.You may have sent a request for this same project before<br>
		2.You may not have logged in as a developer<br>
		3.Project may not be availble to request at the moment";
			 
			 ?>
             	<div id="styledLabel">
                	<?php echo $requestResponseMsg;?>
                     
                </div><br>
                
           	<?php } ?>
             	<?php } ?>
             
			<?php } ?>
            
             <?php
					if(isset($_SESSION["username"])){                
						$viewerProfileRow =  $profileObj->getProfilebyUsername($_SESSION["username"]) ;
						$viewerUserType = $viewerProfileRow["user_type"];
						
						if( $viewerUserType == $USER_TYPE_SITE_OPERATOR || $viewerUserType == $USER_TYPE_ADMIN  ){ 
							
				?>
                
                <br><a href="administrationEditProjectDetails-<?php echo $utilObj->encodeString($projectId) ;?>" id="buttonLink1" target="_blank">Edit Project</a><br>
                
                 
                <?php } ?>
              <?php } ?>
            
            </div>     
			</td>
		</tr> 
        
	</table>

	</body> 
</html>


<?php require("includes/mysql_database_connection_close.php"); ?> 