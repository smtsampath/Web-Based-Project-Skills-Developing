<?php

$editProjectResponse = "<font colot=black>Edit Project Details</font>";

if($utilObj->isUserLoggedIn()){ 
		
	$projectTypeToEdit = $projectRow['category']; 
		
	$projectTitleToEdit = $projectRow['title']; 
		
	$projectDesctiptionToEdit = $projectRow['description'];
		
	$projectTagsCombination = $projectRow['project_tags'];
		
	$projectStatusToEdit = $projectRow['status'];  
	  
	if(isset($_POST['editProjectSubmit'])){
			$projectTypeToEdit = $_POST['editProjectType'];
			$projectTitleToEdit = $_POST['eidtProjectTitle'];
			$projectDesctiptionToEdit = $_POST['editProjectDescription'];
			$projectTagsCombination = $_POST['editProjectTags'];
			$projectStatusToEdit = $_POST['editProjectStatus'];
			 
			$editProjectResponse = $projectObj->editProjectDetails($projectTypeToEdit,$projectTitleToEdit,"",$projectDesctiptionToEdit,$projectTagsCombination,$projectStatusToEdit ,"",$projectId); 
		
 			 
	} 
	
}else{

	$utilObj->redirect_to("home");
}

?>

<script type="text/javascript" src="js/forms/formEditProjectDetails.js"></script>

<table class="formFontOnly" width="56%" style=" border: 1px solid #D3D3D3;  
 border-collapse: collapse; ">
 
 <tr>
         <td class="headercell" colspan="2" >Edit Project Details</td> 
		</tr> 
         
             <form method="post" action="<?php echo $currentPage; ?>" id="form" >
		<tr>
            <td class="labelcell2">Project Type</td>
            <td class="fieldcell2">
                <select   name="editProjectType" id="editProjectType"  selected="<?php if(isset($projectTypeToEdit)){echo htmlentities($projectTypeToEdit);} ?>" >
                	<?php foreach ($PROJECT_TYPES_ARRAY as $projectTypeEditVal){  
							if( trim($projectTypeEditVal) == trim($projectTypeToEdit)){?>
						<option selected="selected"><?php echo $projectTypeEditVal; ?></option>
					<?php 	}else{?>
						<option ><?php echo $projectTypeEditVal; ?></option>
					<?php	}?>					
					<?php }?> 
                </select>
		</td>
        </tr>
        <tr>
            <td class="labelcell2">Project Title</td>
            <td class="fieldcell2"><input type='text'  maxlength="45" name="eidtProjectTitle" id="eidtProjectTitle" size="45" value="<?php if(isset($projectTitleToEdit)){echo  htmlentities($projectTitleToEdit);}?>" /></td>
        </tr>
        <tr>
            <td class="labelcell2">Project Description</td>
            <td class="fieldcell2"><textarea rows="10" cols="20" name="editProjectDescription" id="editProjectDescription" class="defaultTextArea"    > <?php if(isset($projectDesctiptionToEdit)){echo  htmlentities($projectDesctiptionToEdit);}?> </textarea> </td>
        </tr>
        
         <tr>
            <td class="labelcell2">Project Tags (Seperate by comma)</td>
            <td class="fieldcell2"><input type='text' maxlength="45" name="editProjectTags" id="editProjectTags" value="<?php if(isset($projectTagsCombination)){echo  htmlentities($projectTagsCombination);}?>" /></td>
        </tr> 
		<tr>
            <td class="labelcell2">Project Status</td>
            <td class="fieldcell2">
             	<select   name="editProjectStatus" id="editProjectStatus"  selected="<?php if(isset($projectStatusToEdit)){echo htmlentities($projectStatusToEdit);} ?>" >
                	<?php foreach ($PROJECT_STATUS_ARRAY as $projectStatusVal){ 
							if($projectStatusToEdit == $projectStatusVal){?>
						<option selected="selected"><?php echo $projectStatusVal; ?></option>
					<?php 	}else{?>
						<option ><?php echo $projectStatusVal ;?></option>
					<?php	}?>					
					<?php }?> 
                </select>
            
            </td>
        </tr>
        <tr > 
            <td colspan="2"  ><input type="submit" value="Save Updates" name="editProjectSubmit" id="editProjectSubmit" class="submit"/></td>
        </tr> 	
        <tr > 
            <td colspan="2" class="defaultResponseMsg1" ><div id="editProjectResponseMsg"><?php if(isset($editProjectResponse)){echo $editProjectResponse ;}?></div></td>
        </tr> 
     </form>
      
 
  </table> 