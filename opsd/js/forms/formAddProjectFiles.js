function ConfirmDelete() {
  var confm = window.confirm("Are you sure want to delete this file !");
   
  if(confm == true) {
	 
	return true;
  } else {
      return false;
  }
}


function validateSelectProjectCombobox(){
	var projectTitle = $("#selectProjectToAddFile").val();	
	var defaultProjectTitleTxt = "Select a Project";  
	if(projectTitle != defaultProjectTitleTxt){
		$("#selectProjectToAddFile").css("border","1px solid #00B050");
		$("#selectProjectToAddFile").css("background","#BCE292");
		$("#addProjectFileResponseMsg").html("<font color=green>Project title is valid</font>"); 	
		return true;
	}else{
		$("#selectProjectToAddFile").css("border","1px solid #E20012");
		$("#selectProjectToAddFile").css("background","#FFA5AE"); 
		$("#addProjectFileResponseMsg").html("<font color=red>Project title is invalid. Please select a Project first</font>"); 
		return false;
	} 	
	
}

function validateProjectFileTitle(){
	var projectFileTitle = $("#addProjectFileTitle").val();	 
	
	if(projectFileTitle.trim()){
		$("#addProjectFileTitle").css("border","1px solid #00B050");
		$("#addProjectFileTitle").css("background","#BCE292");
		$("#addProjectFileResponseMsg").html("<font color=green>Project file title is valid</font>"); 
		return true;
	}else{
		$("#addProjectFileTitle").css("border","1px solid #E20012");
		$("#addProjectFileTitle").css("background","#FFA5AE"); 
		$("#addProjectFileResponseMsg").html("<font color=red>Project file title is required</font>"); 
		return false;
	}
}

function validateFilePathInput(){ 
	var imagePath = $("#addProjectFileUploadPath").val() ; 
	alert();
	if(imagePath.trim()){
		$("#addProjectFileUploadPath").css("border","1px solid #00B050");
		$("#addProjectFileUploadPath").css("background","#BCE292");
		$("#addProjectFileResponseMsg").html("<font color=green>Image path is valid</font>"); 
		return true;			
	}else{
		$("#addProjectFileUploadPath").css("border","1px solid #E20012");
		$("#addProjectFileUploadPath").css("background","#FFA5AE");
		$("#addProjectFileResponseMsg").html("<font color=red>Image path is invalid</font>"); 
		return false;		
	} 
}


$(document).ready(function(){  
		
	//$('#projectFileUploadPath').fileinput(); 	
	$('#addProjectFileSubmit').button();
	$("#addProjectFileSubmit").css("border","1px solid #000000");	
	
	$('#selectProjectSubmit').button();
	$("#selectProjectSubmit").css("border","1px solid #000000");	
	$("#selectProjectSubmit").css("width","40%");
	 
	
	$("#selectProjectToAddFile").change(
		function(){
			validateSelectProjectCombobox();
		}						
	); 
	$("#selectProjectToAddFile").blur(
		function(){
			validateSelectProjectCombobox();
		}						
	);	
	
	$("#addProjectFileTitle").keyup(
		function(){
			validateProjectFileTitle();
		}						
	); 
	$("#addProjectFileTitle").blur(
		function(){
			validateProjectFileTitle();
		}						
	);
	
	$("#selectProjectSubmit").click(
		function(){  
			if(validateSelectProjectCombobox()){
				return  true;
			}else{
				return  false;
			}
		
		}						 
	);
	
	$("#addProjectFileSubmit").click(
		function(){  
			if(validateProjectFileTitle() && validateSelectProjectCombobox()&& validateFilePathInput()){
				return  true;
			}else{
				return  false;
			}
		
		}						 
	);
	
});						   