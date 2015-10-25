function hasWhiteSpace(s) {
	return s.indexOf(' ') >= 0;
} 

function validateCurrentPassword(){
	var password  = $("#currentPassword").val();    
	if(password.trim()){
		if(!hasWhiteSpace(password)){
			if(password.length > 5){
				$("#currentPassword").css("border","1px solid #00B050");
				$("#currentPassword").css("background","#BCE292");
				$("#changePWErrorMsg").html("<font color=green>Current password is valid</font>"); 
				return true; 
			}else{
				$("#currentPassword").css("border","1px solid #E20012");
				$("#currentPassword").css("background","#FFA5AE");
				$("#changePWErrorMsg").html("<font color=red>Current password minimum character length is 5</font>"); 
				return false;
			}	
		}else{
			$("#currentPassword").css("border","1px solid #E20012");
			$("#currentPassword").css("background","#FFA5AE");
			$("#changePWErrorMsg").html("<font color=red>Remove white spaces in current password</font>"); 
			return false;
		} 
		
	}else {
		$("#currentPassword").css("border","1px solid #E20012");
		$("#currentPassword").css("background","#FFA5AE"); 
		$("#changePWErrorMsg").html("<font color=red>Current password is required</font>"); 
		return false;
	} 
}

function validateNewPassword(){
	var password  = $("#newPassword").val();    
	if(password.trim()){
		if(!hasWhiteSpace(password)){
			if(password.length > 5){
				$("#newPassword").css("border","1px solid #00B050");
				$("#newPassword").css("background","#BCE292");
				$("#changePWErrorMsg").html("<font color=green>New password is valid</font>"); 
				return true; 
			}else{
				$("#newPassword").css("border","1px solid #E20012");
				$("#newPassword").css("background","#FFA5AE");
				$("#changePWErrorMsg").html("<font color=red>New password minimum character length is 5</font>"); 
				return false;
			}	
		}else{
			$("#newPassword").css("border","1px solid #E20012");
			$("#newPassword").css("background","#FFA5AE");
			$("#changePWErrorMsg").html("<font color=red>Remove white spaces in new password</font>"); 
			return false;
		} 
		
	}else {
		$("#newPassword").css("border","1px solid #E20012");
		$("#newPassword").css("background","#FFA5AE"); 
		$("#changePWErrorMsg").html("<font color=red>New password is required</font>"); 
		return false;
	} 
}

function validatePasswordConfirmation(){ 
	var passwordConfirmation = $("#newPasswordConfirm").val(); 
	var passwordNew = $("#newPassword").val();  
	if(passwordConfirmation.trim()){
		if(!hasWhiteSpace(passwordConfirmation)){
			if(passwordConfirmation.length > 5){
				if(passwordConfirmation == passwordNew){
					$("#newPasswordConfirm").css("border","1px solid #00B050");
					$("#newPasswordConfirm").css("background","#BCE292");
					$("#changePWErrorMsg").html("<font color=green>New password confirmation is valid</font>"); 
					return true;	
				}else{
					$("#newPasswordConfirm").css("border","1px solid #E20012");
					$("#newPasswordConfirm").css("background","#FFA5AE");
					$("#changePWErrorMsg").html("<font color=red>New password confirmation does not match</font>"); 
					return false;
				}				
			}else{
				$("#newPasswordConfirm").css("border","1px solid #E20012");
				$("#newPasswordConfirm").css("background","#FFA5AE");
				$("#changePWErrorMsg").html("<font color=red>New password confirmation minimum character length is 5</font>"); 
				return false;
			}	
		}else{
			$("#newPasswordConfirm").css("border","1px solid #E20012");
			$("#newPasswordConfirm").css("background","#FFA5AE");
			$("#changePWErrorMsg").html("<font color=red>Remove white spaces in new password confirmation</font>"); 
			return false;
		} 
		
	}else {
		$("#newPasswordConfirm").css("border","1px solid #E20012");
		$("#newPasswordConfirm").css("background","#FFA5AE"); 
		$("#changePWErrorMsg").html("<font color=red>New password confirmation is required</font>"); 
		return false;
	} 
}

  

$(document).ready(function(){
 
 	$("#changePasswordSubmit").button();
	$("#changePasswordSubmit").css("border","1px solid #000000");
	  
	
	$("#currentPassword").keyup( 
		function(){
			validateCurrentPassword();
		}						
	);
	$("#currentPassword").blur( 
		function(){
			validateCurrentPassword();
		}						
	);
	$("#newPassword").keyup( 
		function(){
			validateNewPassword();
		}						
	);
	$("#newPassword").blur( 
		function(){
			validateNewPassword();
		}						
	);
	$("#newPasswordConfirm").keyup( 
		function(){
			validatePasswordConfirmation();
		}						
	);
	$("#newPasswordConfirm").blur( 
		function(){
			validatePasswordConfirmation();
		}						
	); 
	
	$("#changePasswordSubmit").click(
		function(){   
			if( validateCurrentPassword() && validateNewPassword() && validatePasswordConfirmation() ){
				return true;
			}else{
				return false;	
			}   
		}						 
	);
});	