var defaultMsg ="<font color='black'>Fill All Required Fields</font>";
function hasWhiteSpace(s) {
	return s.indexOf(' ') >= 0;
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
		return true;	
	}
	


} 

function validateImageVerification(){
	var imageVarification = $("#captcha").val();  
	 
	if(imageVarification.trim()){ 
		if(!hasWhiteSpace(imageVarification)){  
			$("#errorMsg").html(" ");
			$(".errorShowDiv").css("color","#E20012");
			return true; 
		}else{  
			$("#errorMsg").html("Remove white spaces from image verification code");
			$(".errorShowDiv").css("color","#E20012");
			return false;
		}	
	}else { 
		$("#errorMsg").html("Image verification code is required");
		$(".errorShowDiv").css("color","#E20012");
		return false;
	}  
} 

$(document).ready(function(){
 
 	$("#editProfileDetailsSubmit").button();
	$("#editProfileDetailsSubmit").css("border","1px solid #000000");
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
	$("#firstName").keyup(
		function(){
			validateFirstName();
		}						
	);
	$("#firstName").blur(
		function(){
			validateFirstName();
		}						
	);
	$("#lastName").keyup(
		function(){
			validateLastName();
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
	$("#address1").keyup(
		function(){
			validateAddressLine1();
		}						
	);
	$("#address1").blur(
		function(){
			validateAddressLine1();
		}						
	);
	$("#city").keyup(
		function(){
			validateCity();
		}						
	);
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
	$("#contactNumber").keyup(
		function(){
			validateContactNumber();
		}						
	);
	$("#contactNumber").blur(
		function(){
			validateContactNumber();
		}						
	);
	$("#website").keyup(
		function(){
			validateWebsiteURL();
		}						
	); 
	$("#website").blur(
		function(){
			validateWebsiteURL();
		}						
	); 
	$("#captcha").keyup(
		function(){
			validateImageVerification();
		}						
	);
	$("#captcha").blur(
		function(){
			validateImageVerification();
		}						
	);
	$("#editProfileDetailsSubmit").click(
		function(){  
			if( validateUsertype() && validateFirstName() && validateLastName()&& validateDOB() && validateGender() && validateAddressLine1()&& validateCity()&& validateCountry() && validateContactNumber()&& validateWebsiteURL() && validateImageVerification()){
				return true;
			}else{
				return false;	
			}  
			 
			
		}						 
	);
						   
	 
	 
	 
	 
});