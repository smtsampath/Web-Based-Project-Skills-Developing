function hasWhiteSpace(s) {
	return s.indexOf(' ') >= 0;
} 

function validateSearchInput(){
	var searcTerm = $("#searchProjectsKeyword").val();	   
	var searcCategory= $("#searchProjectCategory").val();	
 
	if(searcTerm.trim().length > 0 ){
		if(searcCategory == "Client Username"){
			if(!hasWhiteSpace(searcTerm)){
				if(searcTerm.length > 5){  
					$("#searchProjectsKeyword").css("border","1px solid #000");
					$("#searchProjectsKeyword").css("background","#f7f7f7"); 
					$("#searchResponse").html("<font color=black></font>");  		
					return true;
				}else{
					$("#searchProjectsKeyword").css("border","1px solid #E20012");
					$("#searchProjectsKeyword").css("background","#FFA5AE");
					$("#searchResponse").html("<font color=red>Username minimum character length is 5</font>"); 
					return false;
				}	
			}else{
				$("#searchProjectsKeyword").css("border","1px solid #E20012");
				$("#searchProjectsKeyword").css("background","#FFA5AE");
				$("#searchResponse").html("<font color=red>Remove white spaces in username</font>"); 
				return false;
			}
		}else if(searcCategory == "Client Email"){
			
			var emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			if(emailRegex.test(searcTerm)) {  
			 	$("#searchProjectsKeyword").css("border","1px solid #000");
				$("#searchProjectsKeyword").css("background","#f7f7f7"); 
				$("#searchResponse").html("<font color=black></font>");  	
				return true;
			}else{
				$("#searchProjectsKeyword").css("border","1px solid #E20012");
				$("#searchProjectsKeyword").css("background","#FFA5AE"); 
				$("#searchResponse").html("<font color=red>Invalid email</font>"); 
				return false;
			}
			
		}else{
			$("#searchProjectsKeyword").css("border","1px solid #000");
			$("#searchProjectsKeyword").css("background","#f7f7f7"); 
			$("#searchResponse").html("<font color=black></font>"); 
			return true;
		}
		
		
			
		
	}else{
		$("#searchProjectsKeyword").css("border","1px solid #E20012");
		$("#searchProjectsKeyword").css("background","#FFA5AE"); 
		$("#searchResponse").html("<font color=red>Enter keywords to search</font>"); 
		return false;
	} 
}

$(document).ready(function(){  
						   	 
	$('#searchProjectsSubmit').button();
	$("#searchProjectsSubmit").css("border","1px solid #000000"); 
	 
	$("#searchProjectsKeyword").keyup(
									 
		function(){  
			validateSearchInput();
			
		}						 
	);
	
	$("#searchProjectsKeyword").blur(
									 
		function(){  
			validateSearchInput();
			
		}						 
	); 
		
	$("#searchProjectsSubmit").click(
									 
		function(){  
			if(validateSearchInput()){
				return true;
			}else{
				return false;	
			}  
			 
			
		}						 
	);
	 
	$('#projectSearchResultsTable').paginateTable({ rowsPerPage: 10 });	 
	
	
 
});