
 <?php
 
$editProfileResponse = "<font color=black>Edit your profile details</font>";
$currentPage = $utilObj->getCurrentPageName(); 	
if( $utilObj->isUserLoggedIn()){  
	$username = $_SESSION['username'];
	$userProfile =  $profileObj->getProfilebyUsername($username) ;	 
 	$email = $userProfile['email']; 
	$userType = $userProfile['user_type']; 
	$firstName =  $userProfile['first_name'];
	$lastName =  $userProfile['last_name'];
	$dob =  $userProfile['date_of_birth'];
	$dobSplitArray = explode(" ", $dob);
	$dob = $dobSplitArray[0]; 
	$gender  =  $userProfile['gender'];
	$address1 =  $userProfile['address_line_1'];
	$address2 =   $userProfile['address_line_2'];
	$city =  $userProfile['city'];
	$country =  $userProfile['country'];
	$contactNumber =  $userProfile['contact_number'];
	$website =  $userProfile['website'];
	$userStatus =  $userProfile['status'];
	
	if(isset($_POST['editProfileDetailsSubmit'])){  
	 
		$firstName = $_POST['firstName']; 
		$lastName = $_POST['lastName']; 
		$dob = $_POST['dob'];   
		$dob = date('y-m-d' ,strtotime( $dob ));
		$gender = $_POST['gender']; 
		$address1 = $_POST['address1']; 
		$address2 = $_POST['address2']; 
		$city = $_POST['city']; 
		$country = $_POST['country'];  
		$contactNumber = $_POST['contactNumber']; 
		$website =$_POST['website'];   
		   
		$captcha = $_POST['captcha'];
		$captchaSessionVar = $_SESSION['captcha'];
		
		  
		if($captcha == $captchaSessionVar) {
			
			$editProfileResponse =  $profileObj->editProfile(  trim($firstName), trim($lastName),  trim($dob), trim($gender), trim($address1), trim($address2), trim($city),  trim($country) , trim($contactNumber), trim($website) ,$userType ,$userStatus);
			 
		}else{
			$editProfileResponse = "<font color='red'>Invalid image verification code</font>";  
		}
		
	} 
	
	
}else{
	$utilObj->redirect_to("home");
}


?>
<script type="text/javascript" src="js/forms/formEditProfileDetails.js"></script>

<form method="post" action="<?php echo $currentPage; ?>" id="form" >
    <table class="formFontOnly" width="53%">
    	 <tr>
            <td class="headercell" colspan="2">Edit Profile Details</td>
             
        </tr>
        <tr>
            <td class="labelcell">Username</td>
            <td class="labelcell" ><?php echo $username ; ?> </td>
        </tr>
        <tr>
            <td class="labelcell">Email</td>
            <td class="labelcell"> <?php echo $email ; ?></td>
        </tr>
        <tr>
            <td class="labelcell">User Type</td>
            <td class="labelcell">  <?php echo $userType ; ?></td>
        </tr>
        <tr>
            <td class="labelcell">First Name</td>
            <td class="fieldcell"><input type='text' name="firstName" maxlength="45" id="firstName"  value="<?php echo htmlentities($firstName); ?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">Last Name</td>
            <td class="fieldcell"><input type='text' name="lastName"  maxlength="45" id="lastName" value="<?php echo htmlentities($lastName); ?>" /></td>
        </tr>
        <tr>
            <td class="labelcell">Date Of Birth</td>
            <td class="fieldcell"><input type='text' name="dob" id="dob" readonly="readonly" value="<?php echo htmlentities($dob); ?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">Gender</td>
            <td class="fieldcell">
            	<select   name="gender" id="gender"  value="<?php echo htmlentities($gender); ?>">
                	<?php foreach ($GENDER_ARRAY as $genderVal){ 
							if($gender == $genderVal){?>
						<option selected="selected"><?php echo $genderVal ?></option>
					<?php 	}else{?>
						<option ><?php echo $genderVal ?></option>
					<?php	}?>					
					<?php }?>
					 
            	</select>
            </td>
        </tr>
        <tr>
            <td class="labelcell">Address Line 1</td>
            <td class="fieldcell"><input type='text' maxlength="80" name="address1" id="address1"  value="<?php echo htmlentities($address1); ?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">Address Line 2 (Optional)</td>
            <td class="fieldcell"><input type='text' maxlength="80" name="address2" id="address2"  value="<?php echo htmlentities($address2); ?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">City</td>
            <td class="fieldcell"><input type='text' maxlength="45" name="city" id="city" value="<?php echo htmlentities($city); ?>" /></td>
        </tr>
        <tr>
            <td class="labelcell">Country</td>
            <td class="fieldcell">
            	<select   name="country"  id="country" val value="<?php echo htmlentities($country); ?>" >
					<option >Select a country</option>
					<?php foreach ($country_list as $countryVal){ 
							if($countryVal == $country){?>
						<option selected="selected"><?php echo $countryVal ?></option>
					<?php 	}else{?>
						<option ><?php echo $countryVal ?></option>
					<?php	}?>					
					<?php }?>
				</select>
            </td>
        </tr> 
        <tr>
            <td class="labelcell">Contact Number (Optional)</td>
            <td class="fieldcell"><input type='text' maxlength="10" name="contactNumber" id="contactNumber"  value="<?php echo htmlentities($contactNumber); ?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">Website (Optional)</td>
            <td class="fieldcell"><input type='text' maxlength="100" name="website" id="website" value="<?php echo htmlentities($website); ?>" /></td>
        </tr> 
        <tr>
            <td class="labelcell">Image Verification</td>
            <td class="fieldcell">
            	<img src="includes/captchas.php" style="padding-left:4%"> 
				<input type="text" size="10" name="captcha" id="captcha" />
            </td>
        </tr>
        <tr > 
            <td colspan="2"  ><input type="submit" value="Edit Profile" name="editProfileDetailsSubmit" id="editProfileDetailsSubmit" class="submit"/></td>
        </tr> 	
        <tr > 
            <td colspan="2" class="errorShowDiv" ><div id="errorMsg"><?php if(isset($editProfileResponse)){echo $editProfileResponse ;}?></div></td>
        </tr> 
    </table> 
    
    
</form>

