<?php require_once("commonHeaderIncludes.html"); ?>  
<?php require_once("jQueryHeaderIncludes.html"); ?>    
<?php require_once("JQueryCookieHeaderIncludes.html"); ?>   
<?php require_once("jQueryPaginateTableHeaderIncludes.html"); ?>     

<?php require_once("includes/session.php"); ?>
<?php require_once("includes/mysql_database_connection.php"); ?>  
<?php require_once("includes/constant_Vairables.php"); ?>  

<?php require_once("includes/project_class.php"); ?>    
<?php require_once("includes/util_class.php"); ?> 
<?php require_once("includes/profile_class.php"); ?> 
<?php require_once("includes/project_request_class.php"); ?> 
<?php 
$utilObj->redirectToHTTPS();
if(!$utilObj->isUserLoggedIn()){ 
	require_once("formPopupSignInAction.php"); 	
} 
?> 

<?php 

if(isset($_GET['profileIdToViewUser'])){
	
	$profileId = $utilObj->decodeString($_GET['profileIdToViewUser']);  
	
	$profileRow =  $profileObj->getProfilebyId($profileId) ;
	 
	if(isset($profileRow)){
		$username = $profileRow["username"];   
		 
		$email = $profileRow["email"];  
		$userType = $profileRow["user_type"];  
		$firstName = $profileRow["first_name"];  
		$lastName = $profileRow["last_name"];  
		$dob = $profileRow["date_of_birth"];  
		$dobArray = explode(" ",$dob);;  
		$dob = $dobArray[0];
			
		$userStatus = $profileRow["status"];  
			
		$gender = $profileRow["gender"]; 
		$city  = $profileRow["city"]; 
		$country  = $profileRow["country"];  
		  
		$websiteUrl = $profileRow["website"];  
		
		if($websiteUrl  == ""){
			$websiteUrl = "N/A";  
		} 
		
		$profileImagePath = $profileRow["profile_image_path"];  
		if( $profileImagePath == ""){
			$profileImagePath = "images/defaultAvatar.gif";
		} 
		
		$conatctNumber  = $profileRow["contact_number"];  
		if( $conatctNumber == ""){
			$conatctNumber = "N/A";  
		}  
		
		if($userType == $USER_TYPE_PROJECT_DEVELOPER ){
			$developerDonationLink = $profileRow["donation_link"];   
			
			$preferencesCombination= trim($profileRow["user_preferences"]);  
			 
			$pos = strpos($preferencesCombination,",");
			
			if($pos === false) {
				if(strlen($preferencesCombination)>0){ 
					 $preferenceArray = array( $preferencesCombination );
				}else{ 
					 $preferenceArray = array();
				} 
				
			}else{
				 
				$preferenceArray = explode(",",$preferencesCombination ); 
				
			}
			
			 
		}
		
		
		
	}else{
		$utilObj->redirect_to("home");
	}
	
	
	
	
}else{  
	$utilObj->redirect_to("home");
}
	 

?>

<script>
	$(function() {
		$( "#viewPanel" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
		});


	});
</script>

<html> 
	<title>My Project Skills | View User</title> 
    <body class='body'>

	<table width="100%" >
		<tr>
			<td width="100%" > 
				<div class="headerImage"><?php require_once("headerImage.html"); ?> </div>
			</td>
		</tr>  
		<tr>
			<td width="100%" >
				<div  class="siteMenu"><?php require_once("siteMenu.php"); ?>  </div>
			</td>
		</tr> 
        <tr>
			<td width="100%"  >
            
				<div id="viewPanel"  class="tabPanel1">
                
                <img src="<?php echo $profileImagePath; ?>" width="150" height="150"/><br><br>
                <b>Username : </b><?php echo $username; ?><br><br>
                <?php  if($utilObj->isUserLoggedIn()){  ?>
                <b>Email : </b><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>&nbsp;&nbsp;<b>(Click on the email if you need to contact the user : <?php echo  $username?>)</b><br><br>
                <?php }else{?>
                <b>Email : </b><a href="home" target="_blank"><b>Sign In</b></a> or <a href="signUp" target="_blank"><b>Sign Up</b></a> to see the email.<br><br>
                <?php }?>
                
                <b>User Type : </b><?php echo $userType; ?><br><br>
                <b>User Status : </b><?php echo $userStatus; ?><br><br>
                <b>First Name : </b><?php echo $firstName; ?><br><br>
                <b>Last Name : </b><?php echo $lastName; ?><br><br>
                <b>Date of Birth : </b><?php echo $dob; ?><br><br>
                <b>Gender : </b><?php echo $gender; ?><br><br>
                <b>City : </b><?php echo $city; ?><br><br>
                <b>Country : </b><?php echo $country; ?><br><br>
                <b>Contact Number : </b><?php echo $conatctNumber ; ?><br><br>
                <b>Website : </b><?php echo $websiteUrl; ?><br><br> 
                
               
                
                <?php if(isset($preferenceArray) ){?>
                <b>Preferences : </b>
                <?php if(count($preferenceArray) > 0 ){ ?>
                <br>
                	<div style="padding-left:0%">
                    	<?php foreach($preferenceArray as $preference){ echo  $preference."<br>" ;?> 
                        
                    	<?php } ?>  
                    </div>
                 <?php } else{?>
                	No preferences have been set to this user.<br>
                 <?php } ?>    
                <?php } ?>
                
                <?php if($utilObj->isUserLoggedIn()){   
                		$loggedInProfileRow =  $profileObj->getProfilebyusername($_SESSION["username"]) ;
						$loggedInUserType = $loggedInProfileRow["user_type"];
						
						if($loggedInUserType == $USER_TYPE_PROJECT_CLIENT){
						// enable make doantoin
						?>
                    <?php if(isset($developerDonationLink) && $userStatus == $PROFILE_STATUS_ACTIVE){?>
                 	<?php if($developerDonationLink != ""){ ?>
               <br>  <br><a href="<?php echo $developerDonationLink; ?>" id="buttonLink1" target="_blank">Make a Donation</a><br><br> 				<?php } else {?>
               			<br> <div id="styledLabel">
                				 User has not added a donation link yet.
                		</div> 
               		<?php } ?>	
                 <?php } ?>
                        
                 <?php } ?>
                 <?php } ?>
                
                <br><br>  
                   <a href="feedbacks-<?php echo $utilObj->encodeString($profileId) ;?>" id="buttonLink1" target="_blank"><font color="#000000">User Feedbacks</a>   <br><br>  <br> 
               
                <?php
					if(isset($_SESSION["username"])){                
						$viewerProfileRow =  $profileObj->getProfilebyUsername($_SESSION["username"]) ;
						$viewerUserType = $viewerProfileRow["user_type"];
						
						if(($viewerUserType == $USER_TYPE_SITE_OPERATOR || $viewerUserType == $USER_TYPE_ADMIN ) && ($userType == $USER_TYPE_PROJECT_CLIENT || $userType == $USER_TYPE_PROJECT_DEVELOPER)){ 
							
				?>
                
                <br><a href="administrationEditUserDetails-<?php echo $utilObj->encodeString($profileId) ;?>" id="buttonLink1" target="_blank">Edit User</a><br>
                
                <?php }else if(  $viewerUserType == $USER_TYPE_ADMIN &&  $userType == $USER_TYPE_SITE_OPERATOR ){ ?>
                
                <br><a href="administrationEditUserDetails-<?php echo $utilObj->encodeString($profileId) ;?>" id="buttonLink1" target="_blank">Edit User</a><br>
                
				<?php } ?>
                <?php } ?>
                 </div>  
			</td>
		</tr>  
	</table> 
	</body> 
</html>


<?php require("includes/mysql_database_connection_close.php"); ?> 