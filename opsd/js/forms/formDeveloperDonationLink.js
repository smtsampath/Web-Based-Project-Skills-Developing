function validateDonationLink(){
	 
 	var website = $("#donationLink").val();  
	var websiteURLRegex = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	
	 // var websiteURLRegex = /http(s?):\/\/[A-Za-z0-9\.-]{3,}\.[A-Za-z]{3}/;
	if(website){
		if(websiteURLRegex.test(website)){
			var websiteUppercase = website.toUpperCase();
			
			var myRegExp = /WWW.PAYPAL.COM/;
			var matchPosition = websiteUppercase.search(myRegExp);
						
		 
			if(matchPosition != -1 ){ 
				$("#donationLink").css("border","1px solid #00B050");
				$("#donationLink").css("background","#BCE292");
				$("#donationLinkResponseMsg").html("<font color=green>Valid url</font>"); 	
				return true; 
			}else{
				$("#donationLink").css("border","1px solid #E20012");
				$("#donationLink").css("background","#FFA5AE"); 
				$("#donationLinkResponseMsg").html("<font color=red>Only paypal donation links allowed</font>"); 
				return false;
			}
			
			
			
		}else{
			$("#donationLink").css("border","1px solid #E20012");
			$("#donationLink").css("background","#FFA5AE"); 
			$("#donationLinkResponseMsg").html("<font color=red>Invalid Donation link url ex: http://www.example.com</font>"); 
			return false;
		}	
	}else{
		$("#donationLink").css("border","1px solid #00B050");
		$("#donationLink").css("background","#BCE292");
		return true; 
	}  
} 
 

$(document).ready(function(){   
						   
	$("#addDonationLinkSubmit").button();
	$("#addDonationLinkSubmit").css("border","1px solid #000000");
	
 	$("#donationLink").keyup( 
		function(){
			 validateDonationLink();
		}			
		
	); 
	
 	$("#donationLink").blur( 
		function(){
			 validateDonationLink();
		}			
		
	);
	
 	$("#addDonationLinkSubmit").click( 
		function(){
			if(validateDonationLink()){
				return true;
			}else{
				return false;	
			}
			
		}			
		
	);
	
	
	
}); 