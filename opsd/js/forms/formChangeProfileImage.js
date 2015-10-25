function ConfirmDeleteProfilePic() {
  var confm = window.confirm("Are you sure want to delete this image !");
   
  if(confm == true) {
	 
	return true;
  } else {
      return false;
  }
}

function validateImagePathInput(){ 
	var imagePath = $("#profileImagePath").val() ; 
	if(imagePath){
		$("#profileImagePath").css("border","1px solid #00B050");
		$("#profileImagePath").css("background","#BCE292");
		$("#changeProfileImageErrorMsg").html("<font color=green>Image path is valid</font>"); 
		return true;			
	}else{
		$("#profileImagePath").css("border","1px solid #E20012");
		$("#profileImagePath").css("background","#FFA5AE");
		$("#changeProfileImageErrorMsg").html("<font color=red>Image path is invalid</font>"); 
		return false;		
	} 
}

$(document).ready(function(){  
	$('#profileImagePath').fileinput(); 
	$('#changeProfileImageSubmit').button();
	$("#changeProfileImageSubmit").css("border","1px solid #000000");
	
	$("#changeProfileImageSubmit").click(
		function(){
			if(validateImagePathInput()){
				return true;
			}else{
				return false;
			}							 
		}
	); 
});