<?php
$addProjectFileResponse ="<font color=black>Upload files related to projects</font>"; 
if($utilObj->isUserLoggedIn()){ 
	 
	$projectFileDetailsArray = $projectObj->getProjectClientFileList($projectId);
		
	$projectFileCount = count($projectFileDetailsArray) ;
	
	if(isset($_POST['addProjectFileSubmit'])){  
			
			//$projectFileDetailsArray = $projectObj->getProjectClientFileList($projectId);
			
			//$projectFileCount = count($projectFileDetailsArray) ;
			  
			if($projectFileCount < 3){
				
				$projectFileTitleNewVal = $_POST['addProjectFileTitle']; 
				if(! $projectClientFileObj->isFileExists($projectId , $projectFileTitleNewVal)){
					if (! ($_FILES["addProjectFileUploadPath"]["error"] > 0)) {
						
						 if (($_FILES["addProjectFileUploadPath"]["size"] < 5242880)) {
							$uploadedFileName = $_FILES["addProjectFileUploadPath"]["name"];
							$fileExt = end(explode(".", $uploadedFileName)); 	
							if($fileExt == "rar" || $fileExt == "zip" || $fileExt == "pdf" ){
								$fileName = $projectFileTitleNewVal.".".$fileExt;
								$selectedProjectProfileIdEncoded = $utilObj->encodeString($projectRow["profile_id"]);
								$selectedProjectIdEncoded = $utilObj->encodeString($projectId);
								 
								$directoryPath =  "client_project_files/".$selectedProjectProfileIdEncoded."/".$selectedProjectIdEncoded ;
								 
								if(! file_exists($directoryPath)){
									 mkdir($directoryPath, 0777 , true);  
								}
								
								$finalFilePath = $directoryPath."/".$fileName; 
								 
								move_uploaded_file($_FILES["addProjectFileUploadPath"]["tmp_name"], $finalFilePath); 
								$addProjectFileResponse = $projectClientFileObj->addProjectClientFile($projectFileTitleNewVal,$finalFilePath , $projectId );
								
								$projectFileDetailsArray = $projectObj->getProjectClientFileList($projectId);
								 
								$projectFileCount = count($projectFileDetailsArray) ;
								 
								 
							}else{
								$addProjectFileResponse = "<font color=red>Accepted file types are rar , zip and pdf</font>";
							}				
						}else {
							$addProjectFileResponse = "<font color=red>File size shold be less than 5MB</font>";
						} 
						
					}else{
						$addProjectFileResponse = "<font color=red>Return Code: " . $_FILES["addProjectFileUploadPath"]["error"] . "</font><br />";
					}
				}else{
					$addProjectFileResponse = "<font color=red>Same file title has been used for the same project before</font>";
				}
					
			}else{
				$addProjectFileResponse = "<font color=red>Maximum 3 files allowed to upload per project</font>";
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


      