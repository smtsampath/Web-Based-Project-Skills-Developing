function validateUserRatingCombo(){
	var userRatingComboBoxVal =   $("#userRating").val();	 
	var defaultUserRatingComboBoxVal = "Rate the user";  
	
	if(userRatingComboBoxVal != defaultUserRatingComboBoxVal){
		$("#userRating").css("border","1px solid #00B050");
		$("#userRating").css("background","#BCE292");
		$("#addFeedbackResponse").html("<font color=black></font>"); 	
		return true;
	}else{
		$("#userRating").css("border","1px solid #E20012");
		$("#userRating").css("background","#FFA5AE"); 
		$("#addFeedbackResponse").html("<font color=red>Rate the user</font>"); 
		return false;
	} 
	
}

function validateFeedbackTextArea(){
	var userFeedbackText = $("#userFeedback").val(); ;  
	
	if(userFeedbackText.trim()){
		if(userFeedbackText.trim().length > 50 && userFeedbackText.trim().length < 1000 ){
			$("#userFeedback").css("border","1px solid #00B050");
			$("#userFeedback").css("background","#BCE292"); 
			$("#addFeedbackResponse").html("<font color=black></font>"); 
			return true;
		}else{
			$("#userFeedback").css("border","1px solid #E20012");
			$("#userFeedback").css("background","#FFA5AE"); 
			$("#addFeedbackResponse").html("<font color=red>User feedback character length should be between 50 - 1000</font>"); 
			return false;
		}
	}else{
		$("#userFeedback").css("border","1px solid #E20012");
		$("#userFeedback").css("background","#FFA5AE"); 
		$("#addFeedbackResponse").html("<font color=red>User feedback is required</font>"); 
		return false;
	}
	
}

$(document).ready(function(){ 

	
	$('#saveFeedbackSubmit').button();
	$("#saveFeedbackSubmit").css("border","1px solid #000000");	
	$("#saveFeedbackSubmit").css("width","20%");
				
	$("#userRating").change(
		function(){
			validateUserRatingCombo();
		}						
	); 
	$("#userRating").blur(
		function(){
			validateUserRatingCombo();
		}						
	);	
	
	$("#userFeedback").keyup(
		function(){
			validateFeedbackTextArea();
		}						
	); 
	$("#userFeedback").blur(
		function(){
			validateFeedbackTextArea();
		}						
	);
		
	$("#saveFeedbackSubmit").click(
		function(){  
			if(validateUserRatingCombo() && validateFeedbackTextArea()){
				return true;
			}else{
				return false;	
			}   
		}						 
	);
		
	$( "#viewPanel" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
	});		
	
	$('#feedbackResultsTable').paginateTable({ rowsPerPage: 10 });	 
});


 

