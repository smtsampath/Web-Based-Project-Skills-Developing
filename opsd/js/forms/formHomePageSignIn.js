function hasWhiteSpace(s) {
	return s.indexOf(' ') >= 0;
} 
	
function validateUsername(){
	var username = $("#usernameHP").val();    
	if(username.trim()){
		if(!hasWhiteSpace(username)){
			if(username.length > 5){
				$("#usernameHP").css("border","1px solid #00B050");
				$("#usernameHP").css("background","#BCE292");  
				$("#errorMsg").html("Username is valid");
				$(".errorShowDiv").css("color","green");
				return true;
			}else{
				$("#usernameHP").css("border","1px solid #E20012");
				$("#usernameHP").css("background","#FFA5AE");
				$("#errorMsg").html("Username minimum character length is 5");
				$(".errorShowDiv").css("color","#E20012");
				return false;
			}	
		}else{
			$("#usernameHP").css("border","1px solid #E20012");
			$("#usernameHP").css("background","#FFA5AE");
			$("#errorMsg").html("Remove white spaces in username");
			$(".errorShowDiv").css("color","#E20012");
			return false;
		}
		
		
	}else {
		$("#usernameHP").css("border","1px solid #E20012");
		$("#usernameHP").css("background","#FFA5AE"); 
		$("#errorMsg").html("Username is required");
		$(".errorShowDiv").css("color","#E20012");
		return false;
	} 
}

function validatePassword(){
	var passwordR = $("#passwordHP").val();    
	if(passwordR.trim()){
		if(!hasWhiteSpace(passwordR)){
			if(passwordR.length > 5){
				$("#passwordHP").css("border","1px solid #00B050");
				$("#passwordHP").css("background","#BCE292");
				$("#errorMsg").html("<font color=green>Password is valid</font>"); 
				return true; 
			}else{
				$("#passwordHP").css("border","1px solid #E20012");
				$("#passwordHP").css("background","#FFA5AE");
				$("#errorMsg").html("Password minimum character length is 5");
				$(".errorShowDiv").css("color","#E20012");
				return false;
			}	
		}else{
			$("#passwordHP").css("border","1px solid #E20012");
			$("#passwordHP").css("background","#FFA5AE");
			$("#errorMsg").html("Remove white spaces in password");
			$(".errorShowDiv").css("color","#E20012");
			return false;
		} 
	}else {
		$("#passwordHP").css("border","1px solid #E20012");
		$("#passwordHP").css("background","#FFA5AE"); 
		$("#errorMsg").html("Password is required");
		$(".errorShowDiv").css("color","#E20012");
		return false;
	} 
}



$(document).ready(
	function(){
		$("#homepageSignInSubmit").button(); 
		
		$("#usernameHP").keyup(
			function(){
				validateUsername();
			}						
		); 
		$("#usernameHP").blur(
			function(){
				validateUsername();
			}						
		);
		$("#passwordHP").keyup(
			function(){
				validatePassword();
			}						
		);
		$("#passwordHP").blur(
			function(){
				validatePassword();
			}						
		);
		$("#homepageSignInSubmit").click(
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