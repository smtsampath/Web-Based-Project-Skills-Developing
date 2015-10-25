
<?php

$projectRequestObj = new projectRequest();


class projectRequest{
	private $status ;
	private $project_id ;
	private $sender_profile_id ;
	private $last_modified_date ;
	private $created_date ;
	
	private $profileObj ;
	private $projectObj ;
	private $utilObj ;
	
	public function isValidUserToSendRequest($loggedInUsername ,$projectId ){
		
		$this->profileObj = new profile();
		$this->projectObj = new project();
		$this->utilObj = new util();
		
		$loggedInProfileRow = $this->profileObj->getProfilebyUsername($loggedInUsername); 
		$selectedProject = $this->projectObj->getProjectById($projectId); 
		
		if(isset($loggedInProfileRow)  && $loggedInProfileRow["user_type"] == "Project Developer" && $selectedProject["status"] == "Available"){
			 
			$loggedInProfileId = $loggedInProfileRow["profile_id"];
			$query = "select * from project_request WHERE project_id='{$projectId}' AND sender_profile_id ='{$loggedInProfileId}' ";
			$result_set = mysql_query($query);
			if($this->utilObj->isQuerySuccess($result_set)){ 
				if (mysql_num_rows($result_set)>0) {  
					$dataRow = mysql_fetch_array($result_set); 
					$requestStatus = $dataRow ["status"];
					if($requestStatus == "Rejected"){
						return true;
					}else{
						return false ; 	
					}
						
				} else { 
					return true;
				}	
			} 	 
			
		}else{
			return false;	
		}
	}
	
	
	public function sendResquest($username,$projectId){
		
		$responseMsg = "";
		
		$this->profileObj = new profile();
		$this->projectObj = new project();
		$this->utilObj = new util();
		
		$loggedInProfileRow = $this->profileObj->getProfilebyUsername($username); 
		$LoggedInProfileId =  $loggedInProfileRow["profile_id"];
		
		$selectedProject = $this->projectObj->getProjectById($projectId);  
		$projectTitle = $selectedProject["title"];
		$selectedProjectProfileId =  $selectedProject["profile_id"];
		
		$selectedProjectClientProfileRow  = $this->profileObj->getProfilebyId($selectedProjectProfileId) ; 
		$selectedProjectClientEmail =  $selectedProjectClientProfileRow["email"];
		
		$initialStatus = "Pending";
		
		$lastModifiedDate = date("Y-m-d",time());
		$createdDate = date("Y-m-d",time());
		
		
		if($this->isValidUserToSendRequest($username , $projectId)){
			$requestAddQuery = "INSERT INTO project_request (project_id, sender_profile_id,status,created_date,last_modified_date ) VALUES ('$projectId', '$LoggedInProfileId', '$initialStatus', '$createdDate', '$lastModifiedDate'   )"; 
		
			if($this->utilObj->isNonFetchQuerySuccess($requestAddQuery)){
				
				$subject = "New Project Request Arrival!";
				$message = "Developer ".$username." has been sent a project request regarding ".$projectTitle." project";
				
				
				$sendmailResponse = $this->utilObj->sendMail($subject,$message,$selectedProjectClientEmail);
				if($sendmailResponse){
					$responseMsg = "<font color=green><b>Project Request has been successfully sent. Project client will be notified regarding the request</b></font>";	
				}else{
					$responseMsg = "<font color=green><b>An error occured when notifying the project client via an email regarding the sent request. Contact admin regarding the issue.</b></font>";  
				}
				
			} 
			
		}else{
			$responseMsg = "<font color=red><b>You are not authorized to send the request for this project.</b></font><br>
			Possible reasons: <br>
			1.You may have sent a request for this same project before<br>
			2.You may not have logged in as a developer<br>
			3.Project may not be availble to request at the moment";
		}
		
		return $responseMsg;
		
	}


	public function getProjectRequestByProjectId($projectId){
		$this->utilObj = new util();
		
		$projectRequestsArray= array();
		
		$query = "select * from project_request WHERE project_id='{$projectId}'";
		$result_set = mysql_query($query);
		$counter =0;
		if($this->utilObj->isQuerySuccess($result_set)){ 
			if (mysql_num_rows($result_set)>0) { 
				while($dataRow = mysql_fetch_array($result_set)){
					$projectRequestsArray[$counter] = $dataRow;
					$counter++;
				}		 
			}  
		}  
		return $projectRequestsArray;
	
	}

	public function changeRequestsStatus($projectId , $acceptedRequestId){
		$this->utilObj = new util();
		$this->projectObj = new project();
		$this->profileObj = new profile();
		
		$query = "select * from project_request WHERE project_id='{$projectId}'";
		$result_set = mysql_query($query); 
		if($this->utilObj->isQuerySuccess($result_set)){ 
			if (mysql_num_rows($result_set)>0) { 
				$lastModifiedDate = date("Y-m-d",time());
				while($dataRow = mysql_fetch_array($result_set)){
					$requestId = $dataRow["project_request_id"];
					
					if($requestId == $acceptedRequestId){
						$updateRequestStatus =  "UPDATE project_request SET status = 'Accepted',last_modified_date = '{$lastModifiedDate}' WHERE project_request_id = '{$requestId}'";
						$this->projectObj->updateProjectStatus($projectId ,"Assigned");  
						
						//notify developer about the acceptance by an email
						$developerProfileId = $dataRow["sender_profile_id"];
						$developerProfileRow = $this->profileObj->getProfilebyId($developerProfileId); 
						
						$accpetedDeveloperEmail = $developerProfileRow["email"];
						
						$projectRow = $this->projectObj->getProjectById($projectId);
						$projectTitle = $projectRow["title"];
						
						$clientUsername = $_SESSION['username'];
						
						$subject = "Congratulation! You have been accepted";
						$message = "Hi,You have been selected by the porject client ".$clientUsername." for the project - ".$projectTitle ;
							
						$sendmailResponse = $this->utilObj->sendMail($subject,$message,$accpetedDeveloperEmail);
						 
					}else{
						$updateRequestStatus =  "UPDATE project_request SET status = 'Rejected',last_modified_date = '{$lastModifiedDate}' WHERE project_request_id = '{$requestId}'";
					}
					
					$this->utilObj->isNonFetchQuerySuccess($updateRequestStatus);	  
				
				}
				
				unset($_SESSION['projectIdToManageRequests']);
				
				return "<font color=green>Requests updated successfully</font>";
			}  
		}   
	}
	
	
	public function getRequestByDeveloperid($profileId){
		$this->utilObj = new util();
		
		$requestArrayByDevId = array();
		
		$query = "select * from project_request WHERE sender_profile_id ='{$profileId}' ORDER BY last_modified_date DESC";
		$result_set = mysql_query($query);
		$counter =0;
		if($this->utilObj->isQuerySuccess($result_set)){ 
			if (mysql_num_rows($result_set)>0) { 
				while($dataRow = mysql_fetch_array($result_set)){
					$requestArrayByDevId[$counter] = $dataRow;
					$counter++;
				}		 
			}  
		}  
		
		return $requestArrayByDevId;
	}

}



?>