<?php

if($utilObj->isUserLoggedIn()){  
 

	$username = $_SESSION['username'];
	$profileRow =  $profileObj->getProfilebyUsername($username) ;
	$userType = $profileRow['user_type'];
	if(!$userType == $USER_TYPE_PROJECT_CLIENT){
		 $utilObj->redirect_to("errorLoading");
	}else{
		  
		 
		if(isset($_GET['requestIdToAccept'])){
			$requestIdToAccept = $utilObj->decodeString($_GET['requestIdToAccept']); 
			$projectId = $_SESSION['projectIdToManageRequests'] ;
			
			$manageRequestResponse = $projectRequestObj->changeRequestsStatus($projectId , $requestIdToAccept);
			
		} 
		 
		$projectsArray = $projectObj->getProjectsArrayByUsername($username ); 
		
		if(isset($_POST['projectTitleToViewRequestsSubmit'])){
			$projectTitle = $_POST['projectTitleToViewRequests']; 
			
			$projectRow = $projectObj->getSelectedProject($projectTitle,$username);
			$projectId = $projectRow["project_id"];
			
			$_SESSION['projectIdToManageRequests'] = $projectId;
			
			$projctRequestsArray = $projectRequestObj->getProjectRequestByProjectId($projectId);
			
			if(count($projctRequestsArray) == 0){
				$manageRequestResponse = "<font color=red>Currently no requests for this project</font>";
			}
			
		}
		
		 
		
	}
 
}else{
	$utilObj->redirect_to("home");
}


?>

<script type="text/javascript" src="js/forms/formClientManageRequests.js"> </script>
     
 
	<br> <div  class="formFontOnly"  >
    
    <form method="post" action="projectClientMyAccount" id="form"  >

     <select class="tabPanelCombo1"  name="projectTitleToViewRequests" id="projectTitleToViewRequests"  selected="<?php if(isset($projectTitle)){echo htmlentities($projectTitle);} ?>">
     				<option>Select a Project</option>
            		<?php foreach ($projectsArray   as $projectVal){ 
							if(isset($projectTitle) && $projectTitle  == $projectVal){?>
						<option selected="selected"><?php echo $projectVal["title"]; ?></option>
					<?php 	}else{?>
						<option ><?php echo $projectVal["title"]; ?></option>
					<?php	}?>					
					<?php }?> 
                                 
	</select>&nbsp;
	 
    <input type="submit" value="View Requests" name="projectTitleToViewRequestsSubmit" id="projectTitleToViewRequestsSubmit" class="tabPanelSubmit1"/><br><br>
    <div class="tabPanelResponse1" id="manageRequestResponseDiv"><?php if(isset($manageRequestResponse)){echo $manageRequestResponse ;}?></div><br>

    </form>  
 
    </div>    
    <center>
    <?php if(isset($projctRequestsArray) && count($projctRequestsArray) >0){ ?> 
    <table id="viewRequestsTable" width="100%" class="searchResultsTable">	
			<tbody>
            <?php  foreach($projctRequestsArray as $projctRequestVal){
				
						$requestId = $projctRequestVal["project_request_id"];
						 
						$requestDeveloperProfileId =  $projctRequestVal["sender_profile_id"];
						 
						$devProfileRaw = $profileObj->getProfilebyId($requestDeveloperProfileId);
						$devUsername = $devProfileRaw["username"]; 	
						$devEmail = $devProfileRaw["email"];
						 
						$requestDate = $projctRequestVal["created_date"];
						$requestDateArray = explode(" ",$requestDate); 
                		$requestDate = $requestDateArray[0]; 
						 
						$devProfileImagePath = $devProfileRaw["profile_image_path"]; 	
						
						$requestStatus =  $projctRequestVal["status"];
						
						if($requestStatus == "Accepted"){
							$requestStatus = "<font color=green>$requestStatus</font>";
						}else if($requestStatus == "Rejected"){
							$requestStatus = "<font color=red>$requestStatus</font>";
						}
						 
			?>
            			<tr>
                      		<td   >
                            	<div > 
                                	<img src="<?php echo $devProfileImagePath; ?>" width="60" height="60" />
                                </div> 
                        	</td>
                            <td class="searchResultRow"  >
                            	<div style="padding-bottom:0.5%"> 
                                	<b>From : </b><a href="users-<?php echo $utilObj->encodeString($requestDeveloperProfileId); ?>" target="_blank"><b><font color="#000000"><?php echo $devUsername; ?></font></b></a> &nbsp;&nbsp;&nbsp;  &nbsp; &nbsp;
                                	<b>On : </b><?php echo $requestDate; ?> &nbsp;&nbsp;&nbsp;  &nbsp; &nbsp; 
                                    <br><br><b>Email : </b><a href="mailto:<?php echo $devEmail; ?>"><?php echo $devEmail; ?></a>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  
                                    
                                    <?Php if($requestStatus == "Pending" ){ ?>
                                    <a href="requestManage-<?php echo $utilObj->encodeString($requestId) ;?>" id="buttonLink1"   onClick="return confirmAccpeting();"><font color="#009900"	> Accept </font></a> 
                                     <?php }else{?> 
                                     
                              		<span id="styledLabel">
                                            <?php echo $requestStatus ;?>  
                                 	</span> &nbsp; &nbsp;&nbsp; &nbsp;
                                     
                                      <?php }?> 
                                </div>
                        	</td>
                             
                      	</tr> 
            
            
             <?php }?> 
            </tbody>
		</table> 
         <div class="pagerLink"> 
                <div class='pager'>
                   <a href='#' alt='Previous' class='prevPage'  ><font color="#000000" style="text-decoration:underline">Previous</font></a>
                   <span class='currentPage'></span> of <span class='totalPages'></span>
                   <a href='#' alt='Next' class='nextPage'><font color="#000000" style="text-decoration:underline">Next</font></a>
                </div> 
                </div>  
    <?php }?> 
    </center>