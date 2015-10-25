<script type="text/javascript" src="js/forms/formSignUp.js"></script>

<form method="post" action="signUp" id="form" >
    <table class="formFontOnly" >
    	<tr>
            <td class="headercell" colspan="2">Sign Up</td>
             
        </tr>
        <tr>
            <td class="labelcell">Username</td>
            <td class="fieldcell"> <input type="text" maxlength="45" name="usernameR" id="usernameR" value="<?php echo  htmlentities($usernameR);?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">Email</td>
            <td class="fieldcell"><input type='text' maxlength="100" name="email" id="email"  value="<?php echo htmlentities($email); ?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">User Type</td>
            <td class="fieldcell"><select   name="userType" id="userType"  selected="<?php echo htmlentities($userType); ?>">
            		<?php foreach ($USER_TYPE_ARRAY as $userTypeVal){ 
							if($userType == $userTypeVal){?>
						<option selected="selected"><?php echo $userTypeVal ?></option>
					<?php 	}else{?>
						<option ><?php echo $userTypeVal ?></option>
					<?php	}?>					
					<?php }?> 
                                 
            	</select>
            </td>
        </tr>
        <tr>
            <td class="labelcell">First Name</td>
            <td class="fieldcell"><input type='text' maxlength="45" name="firstName" id="firstName"  value="<?php echo htmlentities($firstName); ?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">Last Name</td>
            <td class="fieldcell"><input type='text' maxlength="45" name="lastName" id="lastName" value="<?php echo htmlentities($lastName); ?>" /></td>
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
            <td class="labelcell">Password</td>
            <td class="fieldcell"><input type='password' name="passwordR" id="passwordR"   /></td>
        </tr>
        <tr>
            <td class="labelcell">Confirmation Password</td>
            <td class="fieldcell"><input type='password' name="passwordConfirmation" id="passwordConfirmation"  /></td>
        </tr>
        <tr>
            <td class="labelcell">Image Verification</td>
            <td class="fieldcell">
            	<img src="includes/captchas.php" style="padding-left:4%"> 
				<input type="text" size="10" name="captcha" id="captcha" />
            </td>
        </tr>
        <tr > 
            <td colspan="2"  ><input type="submit" value="Sign Up" name="signUpSubmit" id="signUpSubmit" class="submit"/></td>
        </tr> 	
        <tr > 
            <td colspan="2" class="errorShowDiv" ><div id="errorMsg"><?php echo $signUpResponse ;?></div></td>
        </tr> 
    </table> 
    
    
</form>

