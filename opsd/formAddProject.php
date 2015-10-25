<?php

$addProjectResponse ="<font color=black>Add your projects</font>";
$currentPage = $utilObj->getCurrentPageUrl(); 
if($utilObj->isUserLoggedIn()){
	if(isset($_POST['addProjectSubmit'])){
		$username = $_SESSION['username'];
		$addProjectType = $_POST['addProjectType'];
		$addProjectTitle = $_POST['addProjectTitle'];
		$addProjectDescription = $_POST['addProjectDescription'];
		$addProjectTags = $_POST['addProjectTags'];
 
		$addProjectResponse = $projectObj->addProject($addProjectType , $addProjectTitle , $addProjectDescription , $addProjectTags , $username);
		
	}else{
		$addProjectType = "";
		$addProjectTitle ="";
		$addProjectDescription ="";
		$addProjectTags = "";	
	}
	
}else{
	$utilObj->redirect_to("home");
}

?>

<script type="text/javascript" src="js/forms/formAddProject.js"> </script> 

<form method="post" action="<?php echo $currentPage; ?>" id="form" >

	<table class="formFontOnly" width="56%">
    	<tr>
            <td class="headercell" colspan="2">Add Project</td> 
        </tr>
        <tr>
            <td class="labelcell">Project Type</td>
            <td class="fieldcell">
                <select   name="addProjectType" id="addProjectType"  selected="<?php echo htmlentities($addProjectType); ?>" >
                	<?php foreach ($PROJECT_TYPES_ARRAY as $projectTypeVal){ 
							if($addProjectType == $projectTypeVal){?>
						<option selected="selected"><?php echo $projectTypeVal ?></option>
					<?php 	}else{?>
						<option ><?php echo $projectTypeVal ?></option>
					<?php	}?>					
					<?php }?> 
                </select>
            </td>
        </tr>
 		 <tr>
            <td class="labelcell">Project Title</td>
            <td class="fieldcell"><input type='text' maxlength="45" name="addProjectTitle" id="addProjectTitle"  value="<?php echo  htmlentities($addProjectTitle);?>" /></td>
        </tr>
        <tr>
            <td class="labelcell">Project Description</td>
            <td class="fieldcell"><textarea  rows="10" cols="20" name="addProjectDescription" id="addProjectDescription" class="defaultTextArea"    > <?php echo  htmlentities($addProjectDescription);?> </textarea> </td>
        </tr>
        
         <tr>
            <td class="labelcell">Project Tags (Seperate by comma)</td>
            <td class="fieldcell"><input type='text' maxlength="45" name="addProjectTags" id="addProjectTags" value="<?php echo  htmlentities($addProjectTags);?>" /></td>
        </tr> 
        <tr > 
            <td colspan="2"  ><input type="submit" value="Add Project" name="addProjectSubmit" id="addProjectSubmit" class="submit"/></td>
        </tr> 	
        <tr > 
            <td colspan="2" class="defaultResponseMsg1" ><div id="addProjectResponseMsg"><?php if(isset($addProjectResponse)){echo $addProjectResponse ;}?></div></td>
        </tr> 
 
 	</table>


</form>