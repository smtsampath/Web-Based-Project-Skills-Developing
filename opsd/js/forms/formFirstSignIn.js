function hasWhiteSpace(s) {
	return s.indexOf(' ') >= 0;
} 
	
function validateUsername(){
	var username = $("#usernameFS").val();    
	if(username.trim()){
		if(!hasWhiteSpace(username)){
			if(username.length > 5){
				$("#usernameFS").css("border","1px solid #00B050");
				$("#usernameFS").css("background","#BCE292");  
				$("#errorMsg").html("Username is valid");
				$(".errorShowDiv").css("color","green");
				return true;
			}else{
				$("#usernameFS").css("border","1px solid #E20012");
				$("#usernameFS").css("background","#FFA5AE");
				$("#errorMsg").html("Username minimum character length is 5");
				$(".errorShowDiv").css("color","#E20012");
				return false;
			}	
		}else{
			$("#usernameFS").css("border","1px solid #E20012");
			$("#usernameFS").css("background","#FFA5AE");
			$("#errorMsg").html("Remove white spaces in username");
			$(".errorShowDiv").css("color","#E20012");
			return false;
		}
		
		
	}else {
		$("#usernameFS").css("border","1px solid #E20012");
		$("#usernameFS").css("background","#FFA5AE"); 
		$("#errorMsg").html("Username is required");
		$(".errorShowDiv").css("color","#E20012");
		return false;
	} 
}

function validatePassword(){
	var passwordR = $("#passwordFS").val();    
	if(passwordR.trim()){
		if(!hasWhiteSpace(passwordR)){
			if(passwordR.length > 5){
				$("#passwordFS").css("border","1px solid #00B050");
				$("#passwordFS").css("background","#BCE292");
				$("#errorMsg").html("<font color=green>Password is valid</font>"); 
				return true; 
			}else{
				$("#passwordFS").css("border","1px solid #E20012");
				$("#passwordFS").css("background","#FFA5AE");
				$("#errorMsg").html("Password minimum character length is 5");
				$(".errorShowDiv").css("color","#E20012");
				return false;
			}	
		}else{
			$("#passwordFS").css("border","1px solid #E20012");
			$("#passwordFS").css("background","#FFA5AE");
			$("#errorMsg").html("Remove white spaces in password");
			$(".errorShowDiv").css("color","#E20012");
			return false;
		} 
	}else {
		$("#passwordFS").css("border","1px solid #E20012");
		$("#passwordFS").css("background","#FFA5AE"); 
		$("#errorMsg").html("Password is required");
		$(".errorShowDiv").css("color","#E20012");
		return false;
	} 
}



$(document).ready(
	function(){
		$("#firstSignInSubmit").button(); 
		
		$("#usernameFS").keyup(
			function(){
				validateUsername();
			}						
		); 
		$("#usernameFS").blur(
			function(){
				validateUsername();
			}						
		);
		$("#passwordFS").keyup(
			function(){
				validatePassword();
			}						
		);
		$("#passwordFS").blur(
			function(){
				validatePassword();
			}						
		);
		$("#firstSignInSubmit").click(
			function(){  
				if(validateUsername() && validatePassword()){
					return true;
				}else{
					return false;	
				}  
				 
				
			}						 
		);
	}
);