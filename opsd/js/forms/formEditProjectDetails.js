function validateSelectProjectComboboxProjectEdit(){
	var projectTitle = $("#selectProjectToEditProject").val();	
	var defaultProjectTitleTxt = "Select a Project";  
	if(projectTitle != defaultProjectTitleTxt){
		$("#selectProjectToEditProject").css("border","1px solid #00B050");
		$("#selectProjectToEditProject").css("background","#BCE292");
		$("#editProjectResponseMsg").html("<font color=green>Project title is valid</font>"); 	
		return true;
	}else{
		$("#selectProjectToEditProject").css("border","1px solid #E20012");
		$("#selectProjectToEditProject").css("background","#FFA5AE"); 
		$("#editProjectResponseMsg").html("<font color=red>Project title is invalid. Please select a Project first</font>"); 
		return false;
	} 	
	
}

function validateProjectTypeProjectEdit(){
	var projectType = $("#editProjectType").val();	
	var defaultProjectTypeTxt = "Select Project Type";  
	if(projectType != defaultProjectTypeTxt){
		$("#editProjectType").css("border","1px solid #00B050");
		$("#editProjectType").css("background","#BCE292");
		$("#editProjectResponseMsg").html("<font color=green>Project type is valid</font>"); 	
		return true;
	}else{
		$("#editProjectType").css("border","1px solid #E20012");
		$("#editProjectType").css("background","#FFA5AE"); 
		$("#editProjectResponseMsg").html("<font color=red>Project type is invalid</font>"); 
		return false;
	} 
}

function validateProjectTitleProjectEdit(){
	var projectTitle = $("#eidtProjectTitle").val();	 
	
	if(projectTitle.trim()){
		$("#eidtProjectTitle").css("border","1px solid #00B050");
		$("#eidtProjectTitle").css("background","#BCE292");
		$("#editProjectResponseMsg").html("<font color=green>Project title is valid</font>"); 
		return true;
	}else{
		$("#eidtProjectTitle").css("border","1px solid #E20012");
		$("#eidtProjectTitle").css("background","#FFA5AE"); 
		$("#editProjectResponseMsg").html("<font color=red>Project title is required</font>"); 
		return false;
	}
}

function validateProjectDescriptionProjectEdit(){
	var projectDescription = $("#editProjectDescription").val();	 
	
	if(projectDescription.trim()){
		if(projectDescription.trim().length > 20){
			$("#editProjectDescription").css("border","1px solid #00B050");
			$("#editProjectDescription").css("background","#BCE292");
			$("#editProjectResponseMsg").html("<font color=green>Project description is valid</font>"); 
			return true;
		}else{
			$("#editProjectDescription").css("border","1px solid #E20012");
			$("#editProjectDescription").css("background","#FFA5AE"); 
			$("#editProjectResponseMsg").html("<font color=red>Project description minimum character length is 20</font>"); 
			return false;
		}
	}else{
		$("#editProjectDescription").css("border","1px solid #E20012");
		$("#editProjectDescription").css("background","#FFA5AE"); 
		$("#editProjectResponseMsg").html("<font color=red>Project description is required</font>"); 
		return false;
	}
	
}

function validateProjectTagsProjectEdit(){
	var projectTags = $("#editProjectTags").val();	 
	
	if(projectTags.trim().length > 0 && projectTags.trim().length < 30){
		$("#editProjectTags").css("border","1px solid #00B050");
		$("#editProjectTags").css("background","#BCE292");
		$("#editProjectResponseMsg").html("<font color=green>Project tags is valid</font>"); 
		return true;
	}else{
		$("#editProjectTags").css("border","1px solid #E20012");
		$("#editProjectTags").css("background","#FFA5AE"); 
		$("#editProjectResponseMsg").html("<font color=red>Project tags character length is between 0 - 30</font>"); 
		return false;
	}
}

$(document).ready(function(){  
						    
	$('#selectProjectToEditSubmit').button();
	$("#selectProjectToEditSubmit").css("border","1px solid #000000");	
	$("#selectProjectToEditSubmit").css("width","40%");
	
	$('#editProjectSubmit').button();
	$("#editProjectSubmit").css("border","1px solid #000000");	
	
 	$("#selectProjectToEditProject").change(
		function(){
			validateSelectProjectComboboxProjectEdit();
		}						
	); 
	$("#selectProjectToEditProject").blur(
		function(){
			validateSelectProjectComboboxProjectEdit();
		}						
	);	
 	$("#editProjectType").change(
		function(){
			validateProjectTypeProjectEdit();
		}						
	); 
	$("#editProjectType").blur(
		function(){
			validateProjectTypeProjectEdit();
		}						
	);
	
	$("#eidtProjectTitle").keyup(
		function(){
			validateProjectTitleProjectEdit();
		}						
	); 
	$("#eidtProjectTitle").blur(
		function(){
			validateProjectTitleProjectEdit();
		}						
	);
	
	$("#editProjectDescription").keyup(
		function(){
			validateProjectDescriptionProjectEdit();
		}						
	); 
	$("#editProjectDescription").blur(
		function(){
			validateProjectDescriptionProjectEdit();
		}						
	);
	
	$("#editProjectTags").keyup(
		function(){
			validateProjectTagsProjectEdit();
		}						
	); 
	$("#editProjectTags").blur(
		function(){
			validateProjectTagsProjectEdit();
		}						
	);
	
	$("#selectProjectToEditSubmit").click(
		function(){  
			if(validateSelectProjectComboboxProjectEdit()){
				return  true;
			}else{
				return  false;
			}
		
		}						 
	);
		
	$("#editProjectSubmit").click(
		function(){  
			if(validateSelectProjectComboboxProjectEdit() && validateProjectTypeProjectEdit() && validateProjectTitleProjectEdit() && validateProjectDescriptionProjectEdit() && validateProjectTagsProjectEdit() ){
				return true;
			}else{
				return false;	
			}  
			 
			
		}						 
	);
	 
 
});