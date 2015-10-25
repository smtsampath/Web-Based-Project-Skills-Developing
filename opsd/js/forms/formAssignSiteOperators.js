var defaultMsg ="<font color='black'>Fill All Required Fields</font>";
function hasWhiteSpace(s) {
	return s.indexOf(' ') >= 0;
} 
	
function validateUsername(){
	var username = $("#usernameASO").val();    
	if(username.trim()){
		if(!hasWhiteSpace(username)){
			if(username.length > 5){ 
				
				$.ajax({
					url: "username-"+username, 
					success: function(result){ 
						$("#errorMsgASO").html(result);  
						var myRegExp = /not available/;
						var matchPosition = result.search(myRegExp);
						
						if(matchPosition != -1){ 
							$("#usernameASO").css("border","1px solid #E20012");
							$("#usernameASO").css("background","#FFA5AE");  
						}else {
														 
							$("#usernameASO").css("border","1px solid #00B050");
							$("#usernameASO").css("background","#BCE292");  
						}
						
					}
				});				
				return true;
			}else{
				$("#usernameASO").css("border","1px solid #E20012");
				$("#usernameASO").css("background","#FFA5AE");
				$("#errorMsgASO").html("Username minimum character length is 5");
				$(".errorShowDivASO").css("color","#E20012");
				return false;
			}	
		}else{
			$("#usernameASO").css("border","1px solid #E20012");
			$("#usernameASO").css("background","#FFA5AE");
			$("#errorMsgASO").html("Remove white spaces in username");
			$(".errorShowDivASO").css("color","#E20012");
			return false;
		}
		
		
	}else {
		$("#usernameASO").css("border","1px solid #E20012");
		$("#usernameASO").css("background","#FFA5AE"); 
		$("#errorMsgASO").html("Username is required");
		$(".errorShowDivASO").css("color","#E20012");
		return false;
	} 
}

function validateEmail(){
	var email = $("#emailASO").val();    
	var emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if(email.trim()){
		if(emailRegex.test(email)) { 
			
			$.ajax({
				url: "email-"+email, 
				success: function(result){ 
					$("#errorMsgASO").html(result);
					var myRegExp = /exisits/;
					var matchPosition = result.search(myRegExp);
						
					if(matchPosition != -1){ 
						$("#emailASO").css("border","1px solid #E20012");
						$("#emailASO").css("background","#FFA5AE");  
					}else {
														 
						$("#emailASO").css("border","1px solid #00B050");
						$("#emailASO").css("background","#BCE292");  
					}
				}
			});	
			return true;
		}else{
			$("#emailASO").css("border","1px solid #E20012");
			$("#emailASO").css("background","#FFA5AE"); 
			$("#errorMsgASO").html("Invalid email");
			$(".errorShowDivASO").css("color","#E20012");	
			return false;
		}
	}else{
		$("#emailASO").css("border","1px solid #E20012");
		$("#emailASO").css("background","#FFA5AE"); 
		$("#errorMsgASO").html("Email is required");
		$(".errorShowDivASO").css("color","#E20012");	
		return false;
	}
} 

function validateFirstName(){
	var firstName = $("#firstNameASO").val();		
	if(firstName.trim()){
		$("#firstNameASO").css("border","1px solid #00B050");
		$("#firstNameASO").css("background","#BCE292");
		$("#errorMsgASO").html("<font color=green>First name is valid</font>"); 
		return true;
	}else{
		$("#firstNameASO").css("border","1px solid #E20012");
		$("#firstNameASO").css("background","#FFA5AE"); 
		$("#errorMsgASO").html("First name is required");
		$(".errorShowDivASO").css("color","#E20012");	
		return false;
	}
}
 
function validateLastName(){
	var lastName = $("#lastNameASO").val();		
	if(lastName.trim()){
		$("#lastNameASO").css("border","1px solid #00B050");
		$("#lastNameASO").css("background","#BCE292");
		$("#errorMsgASO").html("<font color=green>Last name is valid</font>"); 	
		return true;
	}else{
		$("#lastNameASO").css("border","1px solid #E20012");
		$("#lastNameASO").css("background","#FFA5AE"); 
		$("#errorMsgASO").html("Last name is required");
		$(".errorShowDivASO").css("color","#E20012");	
		return false;
	}
}

function validateDOB(){
	var dob = $("#dobASO").val();	
	if(dob){
		$("#dobASO").css("border","1px solid #00B050");
		$("#dobASO").css("background","#BCE292");
		$("#errorMsgASO").html("<font color=green>Date of birth is valid</font>"); 	
		return true;
	}else{
		$("#dobASO").css("border","1px solid #E20012");
		$("#dobASO").css("background","#FFA5AE"); 
		$("#errorMsgASO").html("Date of Birth is required");
		$(".errorShowDivASO").css("color","#E20012");	
		return false;
	}  
}

function validateGender(){
	var gender = $("#genderASO").val();	
	var defaultGenderText = "Select Gender"; 
	if(gender != defaultGenderText){
		$("#genderASO").css("border","1px solid #00B050");
		$("#genderASO").css("background","#BCE292");
		$("#errorMsgASO").html("<font color=green>Gender is valid</font>"); 	
		return true;
	}else{
		$("#genderASO").css("border","1px solid #E20012");
		$("#genderASO").css("background","#FFA5AE"); 
		$("#errorMsgASO").html("Gender is required");
		$(".errorShowDivASO").css("color","#E20012");	
		return false;
	}  
}

function validateAddressLine1(){
	var address1 = $("#address1ASO").val();	
	if(address1.trim()){
		$("#address1ASO").css("border","1px solid #00B050");
		$("#address1ASO").css("background","#BCE292");
		$("#errorMsgASO").html("<font color=green>Address line 1 is valid</font>"); 	
		return true;
	}else{
		$("#address1ASO").css("border","1px solid #E20012");
		$("#address1ASO").css("background","#FFA5AE"); 
		$("#errorMsgASO").html("Address Line is required");
		$(".errorShowDivASO").css("color","#E20012");	
		return false;
	}  
}

function validateCity(){
	var city = $("#cityASO").val();	
	if(city.trim()){
		$("#cityASO").css("border","1px solid #00B050");
		$("#cityASO").css("background","#BCE292");
		$("#errorMsgASO").html("<font color=green>City is valid</font>"); 	
		return true;
	}else{
		$("#cityASO").css("border","1px solid #E20012");
		$("#cityASO").css("background","#FFA5AE"); 
		$("#errorMsgASO").html("City is required");
		$(".errorShowDivASO").css("color","#E20012");	
		return false;
	}  
}

function validateCountry(){
	var country = $("#countryASO").val();	
	var defaultCountryText = "Select a country"; 
	if(country != defaultCountryText){
		$("#countryASO").css("border","1px solid #00B050");
		$("#countryASO").css("background","#BCE292");
		$("#errorMsgASO").html("<font color=green>Country is valid</font>"); 	
		return true;
	}else{
		$("#countryASO").css("border","1px solid #E20012");
		$("#countryASO").css("background","#FFA5AE"); 
		$("#errorMsgASO").html("Country is required");
		$(".errorShowDivASO").css("color","#E20012");	
		return false;
	}  
} 

function validateContactNumber(){
	var contactNumber = $("#contactNumberASO").val();    
	var contactNumberRegex = /^\d{10}$/ ;
	if(contactNumber){
		if(contactNumberRegex.test(contactNumber)) {
			$("#contactNumberASO").css("border","1px solid #00B050");
			$("#contactNumberASO").css("background","#BCE292");
			$("#errorMsgASO").html("<font color=green>Contact number is valid</font>"); 
			return true;
		}else{
			$("#contactNumberASO").css("border","1px solid #E20012");
			$("#contactNumberASO").css("background","#FFA5AE"); 
			$("#errorMsgASO").html("Invalid Contact Number");
			$(".errorShowDivASO").css("color","#E20012");	
			return false;
		}
	}else{
		return true;
	}
}

function validateWebsiteURL(){
	var website = $("#websiteASO").val(); 
	var websiteURLRegex = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	if(website){
		if(websiteURLRegex.test(website)){
			$("#websiteASO").css("border","1px solid #00B050");
			$("#websiteASO").css("background","#BCE292");
			$("#errorMsgASO").html("<font color=green>Website url is valid</font>"); 	
			return true; 
		}else{
			$("#websiteASO").css("border","1px solid #E20012");
			$("#websiteASO").css("background","#FFA5AE"); 
			$("#errorMsgASO").html("Invalid website url ex: http://www.example.com");
			$(".errorShowDivASO").css("color","#E20012");	
			return false;
		}	
	}else{
		$("#websiteASO").css("border","1px solid #00B050");
		$("#websiteASO").css("background","#BCE292"); 	
		return true;	
	}
	


}

function validatePassword(){
	var passwordR = $("#passwordASO").val();   
	var passwordConfirmation = $("#passwordConfirmationASO").val(); 
	if(passwordR.trim()){
		if(!hasWhiteSpace(passwordR)){
			if(passwordR.length > 5){
				$("#passwordASO").css("border","1px solid #00B050");
				$("#passwordASO").css("background","#BCE292");
				$("#errorMsgASO").html("<font color=green>Password is valid</font>"); 
				return true;
				if(passwordR.trim() == passwordConfirmation.trim()){
					$("#passwordConfirmationASO").css("border","1px solid #00B050");
					$("#passwordConfirmationASO").css("background","#BCE292");
					$("#errorMsgASO").html(defaultMsg);
					$(".errorShowDivASO").css("color","#102132");
					return true;
				}
			}else{
				$("#passwordASO").css("border","1px solid #E20012");
				$("#passwordASO").css("background","#FFA5AE");
				$("#errorMsgASO").html("Password minimum character length is 5");
				$(".errorShowDivASO").css("color","#E20012");
				return false;
			}	
		}else{
			$("#passwordASO").css("border","1px solid #E20012");
			$("#passwordASO").css("background","#FFA5AE");
			$("#errorMsgASO").html("Remove white spaces in password");
			$(".errorShowDivASO").css("color","#E20012");
			return false;
		} 
		
	}else {
		$("#passwordASO").css("border","1px solid #E20012");
		$("#passwordASO").css("background","#FFA5AE"); 
		$("#errorMsgASO").html("Password is required");
		$(".errorShowDivASO").css("color","#E20012");
		return false;
	} 
}

function validatePasswordConfirmation(){ 
	var passwordConfirmation = $("#passwordConfirmationASO").val(); 
	var passwordR = $("#passwordASO").val();  
	if(passwordConfirmation.trim()){
		if(!hasWhiteSpace(passwordConfirmation)){
			if(passwordConfirmation.length > 5){
				if(passwordConfirmation == passwordR){
					$("#passwordConfirmationASO").css("border","1px solid #00B050");
					$("#passwordConfirmationASO").css("background","#BCE292");
					$("#errorMsgASO").html("<font color=green>Password confirmation is valid</font>"); 
					return true;	
				}else{
					$("#passwordConfirmationASO").css("border","1px solid #E20012");
					$("#passwordConfirmationASO").css("background","#FFA5AE");
					$("#errorMsgASO").html("Password confirmation does not match");
					$(".errorShowDivASO").css("color","#E20012");
					return false;
				}				
			}else{
				$("#passwordConfirmationASO").css("border","1px solid #E20012");
				$("#passwordConfirmationASO").css("background","#FFA5AE");
				$("#errorMsgASO").html("Password confirmation minimum character length is 5");
				$(".errorShowDivASO").css("color","#E20012");
				return false;
			}	
		}else{
			$("#passwordConfirmationASO").css("border","1px solid #E20012");
			$("#passwordConfirmationASO").css("background","#FFA5AE");
			$("#errorMsgASO").html("Remove white spaces in password confirmation");
			$(".errorShowDivASO").css("color","#E20012");
			return false;
		} 
		
	}else {
		$("#passwordConfirmationASO").css("border","1px solid #E20012");
		$("#passwordConfirmationASO").css("background","#FFA5AE"); 
		$("#errorMsgASO").html("Password confirmation is required");
		$(".errorShowDivASO").css("color","#E20012");
		return false;
	} 
}

function validateImageVerification(){
	var imageVarification = $("#captchaASO").val();  
	 
	if(imageVarification.trim()){ 
		if(!hasWhiteSpace(imageVarification)){  
			return true; 
		}else{ 
			$("#captchaASO").css("border","1px solid #E20012");
			$("#captchaASO").css("background","#FFA5AE"); 
			$("#errorMsgASO").html("Remove white spaces from image verification code");
			$(".errorShowDivASO").css("color","#E20012");
			return false;
		}	
	}else {
		$("#captchaASO").css("border","1px solid #E20012");
		$("#captchaASO").css("background","#FFA5AE"); 
		$("#errorMsgASO").html("Image verification code is required");
		$(".errorShowDivASO").css("color","#E20012");
		return false;
	}  
} 

$(document).ready(function(){
 
 	$("#addSiteOperatorSubmit").button();
	$("#addSiteOperatorSubmit").css("border","1px solid #000000");;
	
	//Limiting the datepicker
	var currentDate = new Date();
	var currentYear = currentDate.getFullYear();
	var maxYear = currentYear - 14 ;
	var minYear = currentYear - 80 ; 
	$("#dobASO").datepicker({
		changeMonth: true,
		changeYear: true, 
		maxDate: -5110,  
		dateFormat: 'yy-mm-dd',   

	}); 
	
	 
	$("#usernameASO").blur(
		function(){
			validateUsername();
		}						
	);

	$("#emailASO").blur(
		function(){
			validateEmail();
		}						
	); 
	
	$("#firstNameASO").blur(
		function(){
			validateFirstName();
		}						
	);
	
	$("#lastNameASO").blur(
		function(){
			validateLastName();
		}						
	);
	$("#dobASO").change(
		function(){
			validateDOB();
		}						
	);
	$("#dobASO").blur(
		function(){
			validateDOB();
		}						
	);
	$("#genderASO").change(
		function(){
			validateGender();
		}						
	);
	$("#genderASO").blur(
		function(){
			validateGender();
		}						
	);
	
	$("#address1ASO").blur(
		function(){
			validateAddressLine1();
		}						
	);
	$
	$("#cityASO").blur(
		function(){
			validateCity();
		}						
	);
	$("#countryASO").change(
		function(){
			validateCountry();
		}						
	);
	$("#countryASO").blur(
		function(){
			validateCountry();
		}						
	);

	$("#contactNumberASO").blur(
		function(){
			validateContactNumber();
		}						
	);

	$("#websiteASO").blur(
		function(){
			validateWebsiteURL();
		}						
	);
	
	$("#passwordASO").blur(
		function(){
			validatePassword();
		}						
	);
	
	$("#passwordConfirmationASO").blur(
		function(){
			validatePasswordConfirmation();
		}						
	);
	
	$("#captchaASO").blur(
		function(){
			validateImageVerification();
		}						
	);
	
	
	$("#usernameASO").keyup(
		function(){
			validateUsername();
		}						
	); 
	$("#emailASO").keyup(
		function(){
			validateEmail();
		}						
	);
	$("#firstNameASO").keyup(
		function(){
			validateFirstName();
		}						
	);	
	$("#lastNameASO").keyup(
		function(){
			validateLastName();
		}						
	);
	$("#address1ASO").keyup(
		function(){
			validateAddressLine1();
		}						
	);
	$("#cityASO").keyup(
		function(){
			validateCity();
		}						
	);
	$("#contactNumberASO").keyup(
		function(){
			validateContactNumber();
		}						
	);
	$("#websiteASO").keyup(
		function(){
			validateWebsiteURL();
		}						
	); 
	$("#passwordASO").keyup(
		function(){
			validatePassword();
		}						
	);
	$("#passwordConfirmationASO").keyup(
		function(){
			validatePasswordConfirmation();
		}						
	); 
	 
	
	$("#addSiteOperatorSubmit").click(
		function(){  
			if(validateUsername() && validateEmail()   && validateFirstName() && validateLastName()&& validateDOB() && validateGender() && validateAddressLine1()&& validateCity()&& validateCountry() && validateContactNumber()&& validatePassword()&& validatePasswordConfirmation() && validateWebsiteURL() ){
				return true;
			}else{
				return false;	
			}  
			 
			
		}						 
	);
						   
	 
	 
	 
	 
});