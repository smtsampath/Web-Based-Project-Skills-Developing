<?php


if($utilObj->isUserLoggedIn()){  
		 
	$username = $_SESSION['username'];
	$profileRow = $profileObj->getProfilebyUsername($username) ;
	$userType = $profileRow['user_type'];
	$profileId  = $profileRow['profile_id'];
	if( $userType == $USER_TYPE_PROJECT_DEVELOPER){
		 
		$ownRequestsArray = $projectRequestObj->getRequestByDeveloperid($profileId);
		
		if(count($ownRequestsArray) == 0){
			$viewOwnRequestsResponse = "<font color=red>You do not have request any projects yet. Search project according to your preferences and send requests if they are available </font>";
		}
		 
	}else{ 
		$utilObj->redirect_to("errorLoading");
	}
}else{
	$utilObj->redirect_to("home");
}


?>


<script type="text/javascript">


$(document).ready(function(){  
 
	 
	$('#ownRequestResultsTable').paginateTable({ rowsPerPage: 10 });	 
	
	
 
});


</script>

<div>
		<div id="styledLabel1">
        	<?php if(isset($viewOwnRequestsResponse)){echo $viewOwnRequestsResponse;} ?>
        </div>
        
		<table id="ownRequestResultsTable" width="100%" class="searchResultsTable">	
			<tbody>
            
    	<?php  foreach($ownRequestsArray as $ownRequestVal){
						 
						$requestId = $ownRequestVal["project_request_id"];
						 
						$projectId = $ownRequestVal["project_id"];
						
						$projectRow =  $projectObj->getProjectById($projectId);
						 
						$projectTItle = $projectRow["title"];  
						
						$lastModifiedDate = $ownRequestVal["last_modified_date"];
						$lastModifiedDateArray = explode(" ",$lastModifiedDate); 
                		$lastModifiedDate = $lastModifiedDateArray[0];  
						 
						$requestStatus =  $ownRequestVal["status"]; 
						
						if($requestStatus == "Accepted"){
							$requestStatus = "<font color=green>$requestStatus</font>";
						}else if($requestStatus == "Rejected"){
							$requestStatus = "<font color=red>$requestStatus</font>";
						}else if($requestStatus == "Pending"){
							$requestStatus = "<font color=orange>$requestStatus</font>";
						}
						
						$clientProfileId = $projectRow["profile_id"];
						$clientProfileRow = $profileObj->getProfilebyId($clientProfileId);
						$clientUsername = $clientProfileRow["username"];
						
						
						 
		?>
        				<tr> 
                            <td class="searchResultRow"  >
                            	<div style="padding-bottom:0.5%"> 
                                	<a href="projects-<?php echo $utilObj->encodeString($projectId); ?>" target="_blank"><b><font color="#000000"><?php echo $projectTItle; ?></font></b></a><br><br> 
                                	<b>Project Client : <a href="users-<?php echo $utilObj->encodeString($clientProfileId); ?>" target="_blank"> <font color="#000000"><?php echo $clientUsername; ?></font></a> &nbsp;&nbsp;&nbsp;  &nbsp; &nbsp; 
                                    <b>Last Modified On : </b><?php echo $lastModifiedDate; ?>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; 
                                    <b>Status : </b><?php echo $requestStatus; ?>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  
                                </div>
                        	</td>
                      	</tr> 
                        
    	<?php 		}
			
		?>
        
        	</tbody>
		</table>  
         <div class="pagerLink"> 
                <div class='pager'>
                   <a href='#' alt='Previous' class='prevPage'  ><font color="#000000" style="text-decoration:underline">Previous</font></a>
                   <span class='currentPage'></span> of <span class='totalPages'></span>
                   <a href='#' alt='Next' class='nextPage'><font color="#000000" style="text-decoration:underline">Next</font></a>
                </div> 
                </div>  
    </div> 