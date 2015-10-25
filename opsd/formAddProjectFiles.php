<?php
$addProjectFileResponse ="<font color=black>Upload files related to projects</font>";
$currentPage = $utilObj->getCurrentPageName(); 
if($utilObj->isUserLoggedIn()){
	$username = $_SESSION['username']; 
	 
	if(isset($_POST['selectProjectSubmit'])){ 
	
		$selectedProjectTitle = $_POST['selectProjectToAddFile'];  
		$_SESSION['selectProjectToAddFile'] = $selectedProjectTitle; 
		
		$selectedProjectRow = $projectObj->getSelectedProject($selectedProjectTitle,$username);
		
		$selectedProjectId = $selectedProjectRow["project_id"];
		
		$projectFileDetailsArray = $projectObj->getProjectClientFileList($selectedProjectId);
		
		$projectFileCount = count($projectFileDetailsArray) ;
		
	} 
	
	if(isset($_POST['addProjectFileSubmit'])){
 		if(isset($_SESSION['selectProjectToAddFile'] )){
			
			$selectedProjectTitle = $_SESSION['selectProjectToAddFile']; 
			
			$selectedProjectRow = $projectObj->getSelectedProject($selectedProjectTitle,$username);
		
			$selectedProjectId = $selectedProjectRow["project_id"];
			
			$selectedProjectProfileId = $selectedProjectRow["profile_id"];
			
			$projectFileDetailsArray = $projectObj->getProjectClientFileList($selectedProjectId);
			
			$projectFileCount = count($projectFileDetailsArray) ;
			  
			if($projectFileCount < 3){
				
				$projectFileTitleNewVal = $_POST['addProjectFileTitle']; 
				 
				
				if(! $projectClientFileObj->isFileExists($selectedProjectId , $projectFileTitleNewVal)){
					
					if (! ($_FILES["addProjectFileUploadPath"]["error"] > 0)) {
						
						 if (($_FILES["addProjectFileUploadPath"]["size"] < 5242880)) {
							$uploadedFileName = $_FILES["addProjectFileUploadPath"]["name"];
							$fileExt = end(explode(".", $uploadedFileName)); 	
							if($fileExt == "rar" || $fileExt == "zip" || $fileExt == "pdf" ){
								$fileName = $projectFileTitleNewVal.".".$fileExt;
								$selectedProjectProfileIdEncoded = $utilObj->encodeString($selectedProjectProfileId );
								$selectedProjectIdEncoded = $utilObj->encodeString($selectedProjectId );
								 
								$directoryPath =  "client_project_files/".$selectedProjectProfileIdEncoded."/".$selectedProjectIdEncoded ;
								 
								if(! file_exists($directoryPath)){
									 mkdir($directoryPath, 0777 , true);  
								}
								
								$finalFilePath = $directoryPath."/".$fileName; 
								 
								move_uploaded_file($_FILES["addProjectFileUploadPath"]["tmp_name"], $finalFilePath); 
								$addProjectFileResponse = $projectClientFileObj->addProjectClientFile($projectFileTitleNewVal,$finalFilePath , $selectedProjectId );
								
								$projectFileDetailsArray = $projectObj->getProjectClientFileList($selectedProjectId);
								 
								$projectFileCount = count($projectFileDetailsArray) ;
								 
								 
							}else{
								$addProjectFileResponse = "<font color=red>Accepted file types are rar , zip and pdf</font>";
							}				
						}else {
							$addProjectFileResponse = "<font color=red>File size shold be less than 5MB</font>";
						} 
						
					}else{
						if($_FILES["addProjectFileUploadPath"]["error"] == 4){
							$addProjectFileResponse = "<font color=red>Browse a file to upload</font>";
						}else{
							$addProjectFileResponse = "<font color=red>Return Code: " . $_FILES["addProjectFileUploadPath"]["error"] . "</font><br />";	
						}
						
					}
				}else{
					$addProjectFileResponse = "<font color=red>Same file title has been used for the same project before</font>";
				}
					
			}else{
				$addProjectFileResponse = "<font color=red>Maximum 3 files allowed to upload per project</font>";
			} 	
		}else{
			$addProjectFileResponse =  "<font color=red>Select a project first</font>"	;
			
		}
	} 
	
	if(isset($_GET['filePathToDelete'])){
		$filePathToDelete = $_GET['filePathToDelete'];
		unlink($filePathToDelete);
		$projectClientFileObj->removeFile($filePathToDelete);
	}
	
	$projectsArrayToAddFile  = $projectObj->getProjectsArrayByUsername($username);  
	
}else{
	$utilObj->redirect_to("home");
}		

?>

<script type="text/javascript" src="js/forms/formAddProjectFiles.js"></script> 
 

	<table class="formFontOnly" width="56%" style=" border: 1px solid #D3D3D3;  
 border-collapse: collapse; "> 
		<tr>
                <td class="headercell" colspan="2" >Upload Related Files (if any)</td> 
		</tr> 
         <tr>
            
            <td class="labelcell2" >Select a Project</td>
            <td class="fieldcell2" >
             <div>
             <form method="post" action="<?php echo $currentPage; ?>" id="form2" >
             	<select   name="selectProjectToAddFile" id="selectProjectToAddFile"    selected="<?php if(isset($selectedProjectTitle)){echo htmlentities($selectedProjectTitle);} ?>" >
                	<option >Select a Project</option>
                	<?php foreach ($projectsArrayToAddFile as $projectRow){ ?> 
							 <?php if(isset($selectedProjectTitle) && $selectedProjectTitle == $projectRow["title"]){ ?>
								<option selected="selected"> <?php echo $projectRow["title"]; ?></option>
					 		<?php }else{?> 
                           		<option > <?php echo $projectRow["title"]; ?></option>
                        	<?php }?> 
					<?php }?> 
                </select>  
                <input type="submit" value="Select Project" name="selectProjectSubmit" id="selectProjectSubmit" class="submit"/>
			    </form>   
                </div>            
            </td> 
 		</tr>     
        <form method="post" action="<?php echo $currentPage; ?>"  id="form" enctype="multipart/form-data">   
		 <tr>
            <td class="labelcell2" >File Title</td>
            <td class="fieldcell2" ><input type='text' maxlength="45" name="addProjectFileTitle" id="addProjectFileTitle"  /> 
            </td>
        </tr>     
         <tr>
            <td class="labelcell2" >Project Related Files<br> (maximum 3 files allowed and<br> accepted filetypes are rar,zip and pdf)</td>
            <td class="fieldcell2" style="padding:2%"><input type='file' name="addProjectFileUploadPath" id="addProjectFileUploadPath"  /> 
            </td>
        </tr>
        <tr > 
            <td colspan="2"  ><input type="submit" value="Upload File" name="addProjectFileSubmit" id="addProjectFileSubmit" class="submit"/></td>
        </tr> 	
		<tr > 
            <td colspan="2" class="labelcell2" >
            <table class="formFontOnly">
            	<?php	if (isset($projectFileCount)){ 
							if ( $projectFileCount > 0 ){ 
								foreach($projectFileDetailsArray as $projectFileRow){
									$projectFileTitle  = $projectFileRow['file_title'];
									$projectFilePath = $projectFileRow['file_path'];
				?>
                <tr>
            <td class="fieldcell2" width="50%"><b>
			<?php  echo $projectFileTitle ;  ?>
            </b> <br></td>
             <td class="fieldcell2" width="50%">
            <a href="<?php echo $projectFilePath; ?>"> Download </a></td>
            <td class="fieldcell2" width="50%">
             <a href='<?php echo $currentPage."?filePathToDelete=".$projectFilePath  ; ?>' onclick="return ConfirmDelete();"> Remove </a><br></td> 
           
            </td>
       			 </tr>		
            		
            	<?php 			}
							}
						}
				?>
            </td>
            </table>
        </tr> 
        <tr >  
            <td colspan="2" class="defaultResponseMsg1" ><div id="addProjectFileResponseMsg"><?php if(isset($addProjectFileResponse)){echo $addProjectFileResponse ;}?></div></td>
        </tr> 
</form>   
 	</table>


      