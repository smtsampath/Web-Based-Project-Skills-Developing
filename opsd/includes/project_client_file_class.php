<?php


$projectClientFileObj = new projectClientFile();

class projectClientFile{
	
	private $file_title ;
	private $file_path  ;
	private $project_id  ;
	
	private $utilObj ;
	
	public function isFileExists($projectId , $fileTitle){
		$this->utilObj = new util();
		$query = "select * from proejct_client_file WHERE file_title ='{$fileTitle}' AND project_id ='{$projectId}' ";
		$result_set = mysql_query($query);
		if($this->utilObj->isQuerySuccess($result_set)){
			if (mysql_num_rows($result_set) == 1) { 
				return true;
			} else { 
				return false;
			}	
		} 
	}
	
	public function addProjectClientFile($fileTitle , $filePath , $project_id ){
		$this->utilObj = new util();
		if($this->utilObj->hasNotSensitiveCharacters($fileTitle)){
			
			$projectClientFileAddQuery = "INSERT INTO proejct_client_file (file_title, file_path,project_id ) VALUES ('$fileTitle', '$filePath', '$project_id' )"; 
			
			$this->utilObj->isNonFetchQuerySuccess($projectClientFileAddQuery);
			
			unset($_SESSION['selectProjectToAddFile']);	
			
			return "<font color='green'>File is added succesfully</font>";
			
		}else{
			return "<font color='red'>File title has Invalid characters</font>";
		}  
	}
	
	public function removeFile ($filePathToDelete){
		$this->utilObj = new util();
		$deleteFileRecordQuery = "Delete from proejct_client_file  WHERE file_path = '{$filePathToDelete}'";
		$this->utilObj->isNonFetchQuerySuccess($deleteFileRecordQuery);
		unset($_SESSION['selectProjectToAddFile']);
		return "<font color='green'>File is removed succesfully</font>";
		
	}
	
}

?>