function confirmAccpeting(){
		
	var confm = window.confirm("Are you sure to accept this request ? After you accepting this request, other requests for this same project will be rejected automatically and developers will be notified regarding the changes on the requests");
   
  	if(confm == true) { 
		return true;
  	} else {
    	return false;
  	} 
}

function validateSelectProjectComboboxViewRequests(){
	var projectTitle = $("#projectTitleToViewRequests").val();	
	var defaultProjectTitleTxt = "Select a Project";  
	if(projectTitle != defaultProjectTitleTxt){
		$("#projectTitleToViewRequests").css("border","1px solid #00B050");
		$("#projectTitleToViewRequests").css("background","#BCE292");
		$("#manageRequestResponseDiv").html("<font color=black></font>"); 	
		return true;
	}else{
		$("#projectTitleToViewRequests").css("border","1px solid #E20012");
		$("#projectTitleToViewRequests").css("background","#FFA5AE"); 
		$("#manageRequestResponseDiv").html("<font color=red>Project title is invalid. Please select a Project first</font>"); 
		return false;
	} 	
	
}

$(document).ready(function(){  
						   
	$('#projectTitleToViewRequestsSubmit').button();
	$("#projectTitleToViewRequestsSubmit").css("border","1px solid #000000");	

 	$("#projectTitleToViewRequests").change(
		function(){
			validateSelectProjectComboboxViewRequests();
		}						
	); 
	$("#projectTitleToViewRequests").blur(
		function(){
			validateSelectProjectComboboxViewRequests();
		}						
	);	
	
			
	$("#projectTitleToViewRequestsSubmit").click(
		function(){  
			if(validateSelectProjectComboboxViewRequests()   ){
				return true;
			}else{
				return false;	
			}  
			 
			
		}						 
	);
	 
 
 	$('#viewRequestsTable').paginateTable({ rowsPerPage: 10 });	 
});