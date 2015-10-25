 
<?php

$projectObj = new project();


class project{
	private $title ;
	private $category ;
	private $description ;
	private $status ;
	private $project_tags;
	private $profile_id;
	private $last_modified_date ;
	private $created_date;
	
	private $utilObj ;
	private $profileObj ;
	
	public function addProject($projectType , $projectTitle , $projectDescription , $projectTags , $username){
		$this->utilObj = new util();
		$this->profileObj = new profile();
		if($this->utilObj->hasNotSensitiveCharacters($projectTitle)){
			if($this->utilObj->hasNotSensitiveCharacters($projectDescription)){
				if($this->utilObj->hasNotSensitiveCharacters($projectTags)){ 
				  
					$loggedInProfileRow = $this->profileObj->getProfilebyUsername($username) ;
					$loggedInUserProfileId = $loggedInProfileRow["profile_id"]; 
					
					if(! $this->isProjectExistsByTitle($loggedInUserProfileId , $projectTitle)){ 
						
						$this->title = $projectTitle;
						$this->category = $projectType;
						$this->description = $projectDescription;
						$this->status = "Available";  
						$this->project_tags = $projectTags;  
						$this->profile_id = $loggedInUserProfileId; 
						$this->last_modified_date = date("Y-m-d",time());
						$this->created_date =date("Y-m-d",time());
						 
						
						$clientProjectAddQuery = "INSERT INTO project (title, category,description,status,project_tags,profile_id,last_modified_date,created_date) VALUES ('$this->title', '$this->category ', '$this->description ', '$this->status ', '$this->project_tags ', '$this->profile_id ', '$this->last_modified_date ', '$this->created_date ')"; 
						
						if($this->utilObj->isNonFetchQuerySuccess($clientProjectAddQuery)){ 
							 return "<font color='green'>Project details added successfully</font>"; 
						} 
						
					}else{
						return "<font color='red'>You have added a project with same project title before</font>";
					}  
				}else{
					return "<font color='red'>Project tags has Invalid characters</font>";
				}
			}else{
				return "<font color='red'>Project description has Invalid characters</font>";
			}
		}else{
			return "<font color='red'>Project title has Invalid characters</font>";
		}
	}
	
	public function editProjectDetails($projectTypeToEdit,$projectTitleToEdit,$oldProjectTitle,$projectDesctiptionToEdit,$projectTagsCombination,$projectStatusToEdit ,$username,$projectId){
		
		$this->utilObj = new util();
		$this->profileObj = new profile();
		if($this->utilObj->hasNotSensitiveCharacters($projectTitleToEdit)){
			if($this->utilObj->hasNotSensitiveCharacters($projectDesctiptionToEdit)){
				if($this->utilObj->hasNotSensitiveCharacters($projectTagsCombination)){ 
				
					$loggedInProfileRow = $this->profileObj->getProfilebyUsername($username) ;
					$loggedInUserProfileId = $loggedInProfileRow["profile_id"]; 
					
					if(($projectTitleToEdit == $oldProjectTitle) || ( ! $this->isProjectExistsByTitle($loggedInUserProfileId , $projectTitleToEdit) && $projectTitleToEdit != $oldProjectTitle)){ 
					
						$this->title = $projectTitleToEdit;
						$this->category = $projectTypeToEdit;
						$this->description = $projectDesctiptionToEdit;
						$this->status = $projectStatusToEdit;  
						$this->project_tags = $projectTagsCombination;   
						$this->last_modified_date = date("Y-m-d",time()); 
						
						if(isset($_GET['projectIdToEdit'])){
							$clientProjectUpdateQuery = "UPDATE project SET title = '{$this->title}' ,description = '{$this->description}' ,category = '{$this->category}' ,status = '{$this->status}' ,project_tags = '{$this->project_tags}', last_modified_date = '{$this->last_modified_date}'  WHERE   project_id = '{$projectId}'  ";	
						}else{
							$clientProjectUpdateQuery = "UPDATE project SET title = '{$this->title}' ,description = '{$this->description}' ,category = '{$this->category}' ,status = '{$this->status}' ,project_tags = '{$this->project_tags}', last_modified_date = '{$this->last_modified_date}'  WHERE profile_id = '{$loggedInUserProfileId}' AND title = '{$oldProjectTitle}'  ";	
						} 
						
						if(isset($_SESSION['selectProjectToEditProject'])){
							unset($_SESSION['selectProjectToEditProject']);
						} 
						
						$this->utilObj->isNonFetchQuerySuccess($clientProjectUpdateQuery);
						
						return ("<font color=green>Project details successfully updated</font>");
						
					}else{
						return "<font color='red'>You have added a project with same project title before</font>";
					} 
				}else{
					return "<font color='red'>Project tags has Invalid characters</font>";
				}
			}else{
				return "<font color='red'>Project description has Invalid characters</font>";
			}
		}else{
			return "<font color='red'>Project title has Invalid characters</font>";
		} 
	}
	
	public function getProjectsArrayByUsername($username ){
		
		$this->profileObj = new profile();
		$loggedInProfileRow = $this->profileObj->getProfilebyUsername($username) ;
		$loggedInUserProfileId = $loggedInProfileRow["profile_id"]; 
		
		$projectsArray = array();
		$query = "select * from project WHERE profile_id ='{$loggedInUserProfileId}'";
		$result_set = mysql_query($query);
		$recordCount = 0;
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){
			if (mysql_num_rows($result_set) >0) {  
				 while($row = mysql_fetch_array($result_set)){ 
					$projectsArray[$recordCount] = $row ;
					$recordCount = $recordCount +1 ;
				}
			}  
		}
		
		return $projectsArray;
	}
	
	public function getSelectedProject($selectedProjectTitle,$username){
		
		$this->profileObj = new profile();
		$loggedInProfileRow = $this->profileObj->getProfilebyUsername($username) ;
		$loggedInUserProfileId = $loggedInProfileRow["profile_id"]; 
		
		$query = "select * from project WHERE title ='{$selectedProjectTitle}' AND  profile_id ='{$loggedInUserProfileId}'";
		$result_set = mysql_query($query);
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){
			if (mysql_num_rows($result_set) == 1) {  
				$row = mysql_fetch_array($result_set);
				return $row;
			} else { 
				return null;
			}	
		}
		
	}
	
	private function isProjectExistsByTitle($profileId , $projectTitle){
		
		$query = "select * from project WHERE title ='{$projectTitle}' AND  profile_id ='{$profileId}'";
		$result_set = mysql_query($query);
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){
			if (mysql_num_rows($result_set) == 1) {  
				return true;
			} else { 
				return false;
			}	
		}
		
	}
	
	public function getLatestProjectList(){ 
		$latestProjectListArray = array(); 
		$query = "select * from project  ORDER BY created_date  DESC LIMIT 50 ";
		$result_set = mysql_query($query);
		$recordCount = 0;
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){ 
			if (mysql_num_rows($result_set) > 0) { 
				while($row = mysql_fetch_array($result_set)){ 
					$latestProjectListArray[$recordCount] = $row ;
					$recordCount = $recordCount +1 ;
				}
			}  
		}   
		return $latestProjectListArray; 
	}
	
	public function getProjectClientFileList($projectId){
		$this->utilObj = new util();
		
		$projectFileDetailsArray = array(); 
		$query = "select * from proejct_client_file WHERE project_id ='{$projectId}'";
		$result_set = mysql_query($query);
		$recordCount = 0;
		if($this->utilObj->isQuerySuccess($result_set)){ 
			if (mysql_num_rows($result_set) > 0) { 
				while($row = mysql_fetch_array($result_set)){ 
					$projectFileDetailsArray[$recordCount] = $row ;
					$recordCount = $recordCount +1 ;
				}
			}  
		}
		return $projectFileDetailsArray ; 
		
	}
	
	public function searchProjects($searchProjectsKeyword,$searchProjectsCategory ){
		$this->utilObj = new util();
		$this->profileObj = new profile();
		$allProjectIdArray = array(); 
	
	
		if($searchProjectsCategory == "Project Tags"){
			$searchKeywordSplitArray = explode(" " , $searchProjectsKeyword); 
			$recordCount = 0;
			foreach( $searchKeywordSplitArray as $keyword){
				
				$query = "select project_id,LOCATE('{$keyword}',project_tags) from project WHERE LOCATE('{$keyword}',project_tags) !=0   ORDER BY created_date  DESC LIMIT 200 ";
				$result_set = mysql_query($query);
				
				if($this->utilObj->isQuerySuccess($result_set)){ 
					if (mysql_num_rows($result_set) > 0) { 
						while($row = mysql_fetch_array($result_set)){ 
							$allProjectIdArray[$recordCount] = $row["project_id"] ;
							$recordCount = $recordCount +1 ;
						}
					}  
				} 
				 
			}
		}else { 
			if($searchProjectsCategory == "Client Username"){
				$profileRow = $this->profileObj->getProfilebyUsername($searchProjectsKeyword);  
			}else if($searchProjectsCategory == "Client Email"){
				$profileRow = $this->profileObj->getProfilebyEmail($searchProjectsKeyword); 
			}
			
			if(isset($profileRow)){
				$profileId = $profileRow["profile_id"];
			}
			
			if(isset($profileId)){
				$query = "select  * from project WHERE profile_id ='{$profileId}' ORDER BY created_date  DESC LIMIT 200 "; 
				$result_set = mysql_query($query);
				$recordCount = 0;
				if($this->utilObj->isQuerySuccess($result_set)){ 
					if (mysql_num_rows($result_set) > 0) { 
						while($row = mysql_fetch_array($result_set)){ 
							$allProjectIdArray[$recordCount] = $row["project_id"] ;
							$recordCount = $recordCount +1 ;
						}
					}  
				} 
			}
		} 
		
		$allUniqueProjectIdArray = array_unique($allProjectIdArray);
		
		$allProjectRecordsArray = $this->getProjectRecordsArrayByProjectIdArray($allUniqueProjectIdArray);
		
		return $allProjectRecordsArray;
		
	}
	
	private function getProjectRecordsArrayByProjectIdArray($allUniqueProjectIdArray){
		$allProjectsRecordArray = array();
	
		$counter =0 ;
		foreach($allUniqueProjectIdArray as $projectId){
			$query = "select * from project WHERE project_id ='{$projectId}'";
			$result_set = mysql_query($query);
			if (mysql_num_rows($result_set) > 0) { 
				$row = mysql_fetch_array($result_set); 
				$allProjectsRecordArray[$counter] = $row ;
			}
			$counter++;
		}
		
		return $allProjectsRecordArray;
		 
	}
	
	public function getProjectById($projectId){ 
	
		$query = "select * from project WHERE project_id ='{$projectId}'";
		$result_set = mysql_query($query);
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){
			if (mysql_num_rows($result_set) == 1) {  
				$row = mysql_fetch_array($result_set);
				return $row;
			} else { 
				return null;
			}	
		}
	}
	
	public function updateProjectStatus($projectId , $status){
		$this->utilObj = new util();
		$lastModifiedDate = date("Y-m-d",time());
		$updateRequestStatus =  "UPDATE project SET status = '{$status}',last_modified_date = '{$lastModifiedDate}' WHERE project_id = '{$projectId}'";
		$this->utilObj->isNonFetchQuerySuccess($updateRequestStatus);	 
		
	}

}

?>