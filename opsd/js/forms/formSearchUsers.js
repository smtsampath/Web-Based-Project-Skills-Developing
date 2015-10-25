function validateSearchUserInput(){
	var searcTerm = $("#searchUsersTerm").val();	 
	var searchCategory = $("#searchUserCategory").val();	 
	 
	if(searcTerm.trim().length > 0 ){
		$("#searchUsersTerm").css("border","1px solid #000");
		$("#searchUsersTerm").css("background","#f7f7f7"); 
		$("#searchUserResponse").html("<font color=black></font>"); 
 	 	return true;	
		
	}else{
		$("#searchUsersTerm").css("border","1px solid #E20012");
		$("#searchUsersTerm").css("background","#FFA5AE"); 
		$("#searchUserResponse").html("<font color=red>Enter keywords to search</font>"); 
		return false;
	} 
}

$(document).ready(function(){  
						   	 
	$('#searchUsersSubmit').button();
	$("#searchUsersSubmit").css("border","1px solid #000000"); 
	 
	$("#searchUsersTerm").keyup(
									 
		function(){  
			validateSearchUserInput();
			
		}						 
	);
	 
	$("#searchUsersSubmit").click(
									 
		function(){  
			if(validateSearchUserInput()){
				return true;
			}else{
				return false;	
			}  
			 
			
		}						 
	);
	 
	$('#userSearchResultsTable').paginateTable({ rowsPerPage: 10 });	 
	
	
 
});