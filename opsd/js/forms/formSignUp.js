var defaultMsg ="<font color='black'>Fill All Required Fields</font>";
function hasWhiteSpace(s) {
	return s.indexOf(' ') >= 0;
} 
	
function validateUsername(){
	var username = $("#usernameR").val();    
	if(username.trim()){
		if(!hasWhiteSpace(username)){
			if(username.length > 5){ 
				
				$.ajax({
					url: "username-"+username, 
					success: function(result){ 
						$("#errorMsg").html(result);  
						var myRegExp = /not available/;
						var matchPosition = result.search(myRegExp);
						
						if(matchPosition != -1){ 
							$("#usernameR").css("border","1px solid #E20012");
							$("#usernameR").css("background","#FFA5AE");  
						}else {
														 
							$("#usernameR").css("border","1px solid #00B050");
							$("#usernameR").css("background","#BCE292");  
						}
						
					}
				});				
				return true;
			}else{
				$("#usernameR").css("border","1px solid #E20012");
				$("#usernameR").css("background","#FFA5AE");
				$("#errorMsg").html("Username minimum character length is 5");
				$(".errorShowDiv").css("color","#E20012");
				return false;
			}	
		}else{
			$("#usernameR").css("border","1px solid #E20012");
			$("#usernameR").css("background","#FFA5AE");
			$("#errorMsg").html("Remove white spaces in username");
			$(".errorShowDiv").css("color","#E20012");
			return false;
		}
		
		
	}else {
		$("#usernameR").css("border","1px solid #E20012");
		$("#usernameR").css("background","#FFA5AE"); 
		$("#errorMsg").html("Username is required");
		$(".errorShowDiv").css("color","#E20012");
		return false;
	} 
}

function validateEmail(){
	var email = $("#email").val();    
	var emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if(email.trim()){
		if(emailRegex.test(email)) { 
			
			$.ajax({
				url: "email-"+email, 
				success: function(result){ 
					$("#errorMsg").html(result);
					var myRegExp = /exisits/;
					var matchPosition = result.search(myRegExp);
						
					if(matchPosition != -1){ 
						$("#email").css("border","1px solid #E20012");
						$("#email").css("background","#FFA5AE");  
					}else {
														 
						$("#email").css("border","1px solid #00B050");
						$("#email").css("background","#BCE292");  
					}
				}
			});	
			return true;
		}else{
			$("#email").css("border","1px solid #E20012");
			$("#email").css("background","#FFA5AE"); 
			$("#errorMsg").html("Invalid email");
			$(".errorShowDiv").css("color","#E20012");	
			return false;
		}
	}else{
		$("#email").css("border","1px solid #E20012");
		$("#email").css("background","#FFA5AE"); 
		$("#errorMsg").html("Email is required");
		$(".errorShowDiv").css("color","#E20012");	
		return false;
	}
}

function validateUsertype(){
	var userType = $("#userType").val();	
	var defaultUserTypeText = "Select User Type"; 
	if(userType != defaultUserTypeText){
		$("#userType").css("border","1px solid #00B050");
		$("#userType").css("background","#BCE292");
		$("#errorMsg").html("<font color=green>Usertype is valid</font>"); 
		return true;
	}else{
		$("#userType").css("border","1px solid #E20012");
		$("#userType").css("background","#FFA5AE"); 
		$("#errorMsg").html("User type is required");
		$(".errorShowDiv").css("color","#E20012");	
		return false;
	}
	
}

function validateFirstName(){
	var firstName = $("#firstName").val();		
	if(firstName.trim()){
		$("#firstName").css("border","1px solid #00B050");
		$("#firstName").css("background","#BCE292");
		$("#errorMsg").html("<font color=green>First name is valid</font>"); 
		return true;
	}else{
		$("#firstName").css("border","1px solid #E20012");
		$("#firstName").css("background","#FFA5AE"); 
		$("#errorMsg").html("First name is required");
		$(".errorShowDiv").css("color","#E20012");	
		return false;
	}
}
 
function validateLastName(){
	var lastName = $("#lastName").val();		
	if(lastName.trim()){
		$("#lastName").css("border","1px solid #00B050");
		$("#lastName").css("background","#BCE292");
		$("#errorMsg").html("<font color=green>Last name is valid</font>"); 	
		return true;
	}else{
		$("#lastName").css("border","1px solid #E20012");
		$("#lastName").css("background","#FFA5AE"); 
		$("#errorMsg").html("Last name is required");
		$(".errorShowDiv").css("color","#E20012");	
		return false;
	}
}

function validateDOB(){
	var dob = $("#dob").val();	
	if(dob){
		$("#dob").css("border","1px solid #00B050");
		$("#dob").css("background","#BCE292");
		$("#errorMsg").html("<font color=green>Date of birth is valid</font>"); 	
		return true;
	}else{
		$("#dob").css("border","1px solid #E20012");
		$("#dob").css("background","#FFA5AE"); 
		$("#errorMsg").html("Date of Birth is required");
		$(".errorShowDiv").css("color","#E20012");	
		return false;
	}  
}

function validateGender(){
	var gender = $("#gender").val();	
	var defaultGenderText = "Select Gender"; 
	if(gender != defaultGenderText){
		$("#gender").css("border","1px solid #00B050");
		$("#gender").css("background","#BCE292");
		$("#errorMsg").html("<font color=green>Gender is valid</font>"); 	
		return true;
	}else{
		$("#gender").css("border","1px solid #E20012");
		$("#gender").css("background","#FFA5AE"); 
		$("#errorMsg").html("Gender is required");
		$(".errorShowDiv").css("color","#E20012");	
		return false;
	}  
}

function validateAddressLine1(){
	var address1 = $("#address1").val();	
	if(address1.trim()){
		$("#address1").css("border","1px solid #00B050");
		$("#address1").css("background","#BCE292");
		$("#errorMsg").html("<font color=green>Address line 1 is valid</font>"); 	
		return true;
	}else{
		$("#address1").css("border","1px solid #E20012");
		$("#address1").css("background","#FFA5AE"); 
		$("#errorMsg").html("Address Line is required");
		$(".errorShowDiv").css("color","#E20012");	
		return false;
	}  
}

function validateCity(){
	var city = $("#city").val();	
	if(city.trim()){
		$("#city").css("border","1px solid #00B050");
		$("#city").css("background","#BCE292");
		$("#errorMsg").html("<font color=green>City is valid</font>"); 	
		return true;
	}else{
		$("#city").css("border","1px solid #E20012");
		$("#city").css("background","#FFA5AE"); 
		$("#errorMsg").html("City is required");
		$(".errorShowDiv").css("color","#E20012");	
		return false;
	}  
}

function validateCountry(){
	var country = $("#country").val();	
	var defaultCountryText = "Select a country"; 
	if(country != defaultCountryText){
		$("#country").css("border","1px solid #00B050");
		$("#country").css("background","#BCE292");
		$("#errorMsg").html("<font color=green>Country is valid</font>"); 	
		return true;
	}else{
		$("#country").css("border","1px solid #E20012");
		$("#country").css("background","#FFA5AE"); 
		$("#errorMsg").html("Country is required");
		$(".errorShowDiv").css("color","#E20012");	
		return false;
	}  
} 

function validateContactNumber(){
	var contactNumber = $("#contactNumber").val();    
	var contactNumberRegex = /^\d{10}$/ ;
	if(contactNumber){
		if(contactNumberRegex.test(contactNumber)) {
			$("#contactNumber").css("border","1px solid #00B050");
			$("#contactNumber").css("background","#BCE292");
			$("#errorMsg").html("<font color=green>Contact number is valid</font>"); 
			return true;
		}else{
			$("#contactNumber").css("border","1px solid #E20012");
			$("#contactNumber").css("background","#FFA5AE"); 
			$("#errorMsg").html("Invalid Contact Number");
			$(".errorShowDiv").css("color","#E20012");	
			return false;
		}
	}else{
		return true;
	}
}

function validateWebsiteURL(){
	var website = $("#website").val(); 
	var websiteURLRegex = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	if(website){
		if(websiteURLRegex.test(website)){
			$("#website").css("border","1px solid #00B050");
			$("#website").css("background","#BCE292");
			$("#errorMsg").html("<font color=green>Website url is valid</font>"); 	
			return true; 
		}else{
			$("#website").css("border","1px solid #E20012");
			$("#website").css("background","#FFA5AE"); 
			$("#errorMsg").html("Invalid website url ex: http://www.example.com");
			$(".errorShowDiv").css("color","#E20012");	
			return false;
		}	
	}else{
		$("#website").css("border","1px solid #00B050");
		$("#website").css("background","#BCE292"); 	
		return true;	
	}
	


}

function validatePassword(){
	var passwordR = $("#passwordR").val();   
	var passwordConfirmation = $("#passwordConfirmation").val(); 
	if(passwordR.trim()){
		if(!hasWhiteSpace(passwordR)){
			if(passwordR.length > 5){
				$("#passwordR").css("border","1px solid #00B050");
				$("#passwordR").css("background","#BCE292");
				$("#errorMsg").html("<font color=green>Password is valid</font>"); 
				return true;
				if(passwordR.trim() == passwordConfirmation.trim()){
					$("#passwordConfirmation").css("border","1px solid #00B050");
					$("#passwordConfirmation").css("background","#BCE292");
					$("#errorMsg").html(defaultMsg);
					$(".errorShowDiv").css("color","#102132");
					return true;
				}
			}else{
				$("#passwordR").css("border","1px solid #E20012");
				$("#passwordR").css("background","#FFA5AE");
				$("#errorMsg").html("Password minimum character length is 5");
				$(".errorShowDiv").css("color","#E20012");
				return false;
			}	
		}else{
			$("#passwordR").css("border","1px solid #E20012");
			$("#passwordR").css("background","#FFA5AE");
			$("#errorMsg").html("Remove white spaces in password");
			$(".errorShowDiv").css("color","#E20012");
			return false;
		} 
		
	}else {
		$("#passwordR").css("border","1px solid #E20012");
		$("#passwordR").css("background","#FFA5AE"); 
		$("#errorMsg").html("Password is required");
		$(".errorShowDiv").css("color","#E20012");
		return false;
	} 
}

function validatePasswordConfirmation(){ 
	var passwordConfirmation = $("#passwordConfirmation").val(); 
	var passwordR = $("#passwordR").val();  
	if(passwordConfirmation.trim()){
		if(!hasWhiteSpace(passwordConfirmation)){
			if(passwordConfirmation.length > 5){
				if(passwordConfirmation == passwordR){
					$("#passwordConfirmation").css("border","1px solid #00B050");
					$("#passwordConfirmation").css("background","#BCE292");
					$("#errorMsg").html("<font color=green>Password confirmation is valid</font>"); 
					return true;	
				}else{
					$("#passwordConfirmation").css("border","1px solid #E20012");
					$("#passwordConfirmation").css("background","#FFA5AE");
					$("#errorMsg").html("Password confirmation does not match");
					$(".errorShowDiv").css("color","#E20012");
					return false;
				}				
			}else{
				$("#passwordConfirmation").css("border","1px solid #E20012");
				$("#passwordConfirmation").css("background","#FFA5AE");
				$("#errorMsg").html("Password confirmation minimum character length is 5");
				$(".errorShowDiv").css("color","#E20012");
				return false;
			}	
		}else{
			$("#passwordConfirmation").css("border","1px solid #E20012");
			$("#passwordConfirmation").css("background","#FFA5AE");
			$("#errorMsg").html("Remove white spaces in password confirmation");
			$(".errorShowDiv").css("color","#E20012");
			return false;
		} 
		
	}else {
		$("#passwordConfirmation").css("border","1px solid #E20012");
		$("#passwordConfirmation").css("background","#FFA5AE"); 
		$("#errorMsg").html("Password confirmation is required");
		$(".errorShowDiv").css("color","#E20012");
		return false;
	} 
}

function validateImageVerification(){
	var imageVarification = $("#captcha").val();  
	 
	if(imageVarification.trim()){ 
		if(!hasWhiteSpace(imageVarification)){  
			return true; 
		}else{ 
			$("#captcha").css("border","1px solid #E20012");
			$("#captcha").css("background","#FFA5AE"); 
			$("#errorMsg").html("Remove white spaces from image verification code");
			$(".errorShowDiv").css("color","#E20012");
			return false;
		}	
	}else {
		$("#captcha").css("border","1px solid #E20012");
		$("#captcha").css("background","#FFA5AE"); 
		$("#errorMsg").html("Image verification code is required");
		$(".errorShowDiv").css("color","#E20012");
		return false;
	}  
} 

$(document).ready(function(){
 
 	$("#signUpSubmit").button();
	$("#signUpSubmit").css("border","1px solid #000000");
	
	//Limiting the datepicker
	var currentDate = new Date();
	var currentYear = currentDate.getFullYear();
	var maxYear = currentYear - 14 ;
	var minYear = currentYear - 80 ; 
	$("#dob").datepicker({
		changeMonth: true,
		changeYear: true, 
		maxDate: -5110,  
		dateFormat: 'yy-mm-dd',   

	});  
	 
	$("#usernameR").blur(
		function(){
			validateUsername();
		}						
	);

	$("#email").blur(
		function(){
			validateEmail();
		}						
	);
	$("#userType").change(
		function(){
			validateUsertype();
		}						
	);
	$("#userType").blur(
		function(){
			validateUsertype();
		}						
	);
	
	$("#firstName").blur(
		function(){
			validateFirstName();
		}						
	);
	
	$("#lastName").blur(
		function(){
			validateLastName();
		}						
	);
	$("#dob").change(
		function(){
			validateDOB();
		}						
	);
	$("#dob").blur(
		function(){
			validateDOB();
		}						
	);
	$("#gender").change(
		function(){
			validateGender();
		}						
	);
	$("#gender").blur(
		function(){
			validateGender();
		}						
	);
	
	$("#address1").blur(
		function(){
			validateAddressLine1();
		}						
	);
	$
	$("#city").blur(
		function(){
			validateCity();
		}						
	);
	$("#country").change(
		function(){
			validateCountry();
		}						
	);
	$("#country").blur(
		function(){
			validateCountry();
		}						
	);

	$("#contactNumber").blur(
		function(){
			validateContactNumber();
		}						
	);

	$("#website").blur(
		function(){
			validateWebsiteURL();
		}						
	);
	
	$("#passwordR").blur(
		function(){
			validatePassword();
		}						
	);
	
	$("#passwordConfirmation").blur(
		function(){
			validatePasswordConfirmation();
		}						
	);
	
	$("#captcha").blur(
		function(){
			validateImageVerification();
		}						
	);
	
	
	$("#usernameR").keyup(
		function(){
			validateUsername();
		}						
	); 
	$("#email").keyup(
		function(){
			validateEmail();
		}						
	);
	$("#firstName").keyup(
		function(){
			validateFirstName();
		}						
	);	
	$("#lastName").keyup(
		function(){
			validateLastName();
		}						
	);
	$("#address1").keyup(
		function(){
			validateAddressLine1();
		}						
	);
	$("#city").keyup(
		function(){
			validateCity();
		}						
	);
	$("#contactNumber").keyup(
		function(){
			validateContactNumber();
		}						
	);
	$("#website").keyup(
		function(){
			validateWebsiteURL();
		}						
	); 
	$("#passwordR").keyup(
		function(){
			validatePassword();
		}						
	);
	$("#passwordConfirmation").keyup(
		function(){
			validatePasswordConfirmation();
		}						
	);
	/*$("#captcha").keyup(
		function(){
			validateImageVerification();
		}						
	);*/
	 
	
	$("#signUpSubmit").click(
		function(){  
			if(validateUsername() && validateEmail() && validateUsertype() && validateFirstName() && validateLastName()&& validateDOB() && validateGender() && validateAddressLine1()&& validateCity()&& validateCountry() && validateContactNumber()&& validatePassword()&& validatePasswordConfirmation() && validateWebsiteURL() ){
				return true;
			}else{
				return false;	
			}  
			 
			
		}						 
	);
						   
	 
	 
	 
	 
});