function validateProjectType(){
	var projectType = $("#addProjectType").val();	
	var defaultProjectTypeTxt = "Select Project Type";  
	if(projectType != defaultProjectTypeTxt){
		$("#addProjectType").css("border","1px solid #00B050");
		$("#addProjectType").css("background","#BCE292");
		$("#addProjectResponseMsg").html("<font color=green>Project type is valid</font>"); 	
		return true;
	}else{
		$("#addProjectType").css("border","1px solid #E20012");
		$("#addProjectType").css("background","#FFA5AE"); 
		$("#addProjectResponseMsg").html("<font color=red>Project type is invalid</font>"); 
		return false;
	} 
}

function validateProjectTitle(){
	var projectTitle = $("#addProjectTitle").val();	 
	
	if(projectTitle.trim()){
		$("#addProjectTitle").css("border","1px solid #00B050");
		$("#addProjectTitle").css("background","#BCE292");
		$("#addProjectResponseMsg").html("<font color=green>Project title is valid</font>"); 
		return true;
	}else{
		$("#addProjectTitle").css("border","1px solid #E20012");
		$("#addProjectTitle").css("background","#FFA5AE"); 
		$("#addProjectResponseMsg").html("<font color=red>Project title is required</font>"); 
		return false;
	}
}

function validateProjectDescription(){
	var projectDescription = $("#addProjectDescription").val();	 
	
	if(projectDescription.trim()){
		if(projectDescription.trim().length > 20){
			$("#addProjectDescription").css("border","1px solid #00B050");
			$("#addProjectDescription").css("background","#BCE292");
			$("#addProjectResponseMsg").html("<font color=green>Project description is valid</font>"); 
			return true;
		}else{
			$("#addProjectDescription").css("border","1px solid #E20012");
			$("#addProjectDescription").css("background","#FFA5AE"); 
			$("#addProjectResponseMsg").html("<font color=red>Project description minimum character length is 20</font>"); 
			return false;
		}
	}else{
		$("#addProjectDescription").css("border","1px solid #E20012");
		$("#addProjectDescription").css("background","#FFA5AE"); 
		$("#addProjectResponseMsg").html("<font color=red>Project description is required</font>"); 
		return false;
	}
	
}

function validateProjectTags(){
	var projectTags = $("#addProjectTags").val();	 
	
	if(projectTags.trim().length > 0 && projectTags.trim().length < 30){
		$("#addProjectTags").css("border","1px solid #00B050");
		$("#addProjectTags").css("background","#BCE292");
		$("#addProjectResponseMsg").html("<font color=green>Project tags is valid</font>"); 
		return true;
	}else{
		$("#addProjectTags").css("border","1px solid #E20012");
		$("#addProjectTags").css("background","#FFA5AE"); 
		$("#addProjectResponseMsg").html("<font color=red>Project tags character length is between 0 - 30</font>"); 
		return false;
	}
}

$(document).ready(function(){  
						    
	$('#addProjectSubmit').button();
	$("#addProjectSubmit").css("border","1px solid #000000");
	
 	$("#addProjectType").change(
		function(){
			validateProjectType();
		}						
	); 
	$("#addProjectType").blur(
		function(){
			validateProjectType();
		}						
	);
	
	$("#addProjectTitle").keyup(
		function(){
			validateProjectTitle();
		}						
	); 
	$("#addProjectTitle").blur(
		function(){
			validateProjectTitle();
		}						
	);
	
	$("#addProjectDescription").keyup(
		function(){
			validateProjectDescription();
		}						
	); 
	$("#addProjectDescription").blur(
		function(){
			validateProjectDescription();
		}						
	);
	
	$("#addProjectTags").keyup(
		function(){
			validateProjectTags();
		}						
	); 
	$("#addProjectTags").blur(
		function(){
			validateProjectTags();
		}						
	);
	
	$("#addProjectSubmit").click(
		function(){  
			if(validateProjectType() && validateProjectTitle() && validateProjectDescription() && validateProjectTags() ){
				return true;
			}else{
				return false;	
			}  
			 
			
		}						 
	);
	 
 
});