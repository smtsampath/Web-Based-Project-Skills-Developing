function hasWhiteSpace(s) {
	return s.indexOf(' ') >= 0;
} 
	
function validateUsernamePop(){
	var username = $("#usernamePop").val();    
	if(username.trim()){
		if(!hasWhiteSpace(username)){
			if(username.length > 5){
				$("#usernamePop").css("border","1px solid #00B050");
				$("#usernamePop").css("background","#BCE292");  
				$("#errorMsgPop").html("<font color='green'>Username is valid</font>"); 
				return true;
			}else{
				$("#usernamePop").css("border","1px solid #E20012");
				$("#usernamePop").css("background","#FFA5AE");
				$("#errorMsgPop").html("<font color='red''>Username is invalid</font>"); 
				return false;
			}	
		}else{
			$("#usernamePop").css("border","1px solid #E20012");
			$("#usernamePop").css("background","#FFA5AE");
			$("#errorMsgPop").html("<font color='red''>Username is invalid</font>"); 
			return false;
		}
		
		
	}else {
		$("#usernamePop").css("border","1px solid #E20012");
		$("#usernamePop").css("background","#FFA5AE"); 
		$("#errorMsgPop").html("<font color='red''>Username is invalid</font>"); 
		return false;
	} 
}

function validatePasswordPop(){
	var passwordR = $("#passwordPop").val();    
	if(passwordR.trim()){
		if(!hasWhiteSpace(passwordR)){
			if(passwordR.length > 5){
				$("#passwordPop").css("border","1px solid #00B050");
				$("#passwordPop").css("background","#BCE292");
				$("#errorMsgPop").html("<font color='green'>Password is valid</font>");  
				return true; 
			}else{
				$("#passwordPop").css("border","1px solid #E20012");
				$("#passwordPop").css("background","#FFA5AE");
				$("#errorMsgPop").html("<font color='red''>Password is invalid</font>"); 
				return false;
			}	
		}else{
			$("#passwordPop").css("border","1px solid #E20012");
			$("#passwordPop").css("background","#FFA5AE");
			$("#errorMsgPop").html("<font color='red''>Password is invalid</font>"); 
			return false;
		} 
	}else {
		$("#passwordPop").css("border","1px solid #E20012");
		$("#passwordPop").css("background","#FFA5AE"); 
		$("#errorMsgPop").html("<font color='red'>Password is invalid</font>"); 
		return false;
	} 
}



$(document).ready(
	function(){
		$("#signInSubmitPop").button();  
		$("#signInPopUpClose").button( {icons: {primary: "ui-icon-close"}, text: false } );
		
		$("#usernamePop").keyup(
			function(){
				validateUsernamePop();
			}						
		); 
		$("#usernamePop").blur(
			function(){
				validateUsernamePop();
			}						
		);
		$("#passwordPop").keyup(
			function(){
				validatePasswordPop();
			}						
		);
		$("#passwordPop").blur(
			function(){
				validatePasswordPop();
			}						
		);
		$("#signInSubmitPop").click(
			function(){  
				if(validateUsernamePop() && validatePasswordPop()){
					return true;
				}else{
					return false;	
				}  
				 
				
			}						 
		);
	}
);