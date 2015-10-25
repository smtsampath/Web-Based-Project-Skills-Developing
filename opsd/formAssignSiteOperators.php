<script type="text/javascript" src="js/forms/formAssignSiteOperators.js"></script>

<form method="post" action="<?php echo $currentPage; ?>" id="form" >
    <table class="formFontOnly" >
    	<tr>
            <td class="headercell" colspan="2">Assign Site Operators</td>
             
        </tr>
        <tr>
            <td class="labelcell">Username</td>
            <td class="fieldcell"> <input type="text" maxlength="45" name="usernameASO" id="usernameASO" value="<?php echo  htmlentities($usernameR);?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">Email</td>
            <td class="fieldcell"><input type='text' maxlength="100" name="emailASO" id="emailASO"  value="<?php echo htmlentities($email); ?>"/></td>
        </tr> 
        <tr>
            <td class="labelcell">First Name</td>
            <td class="fieldcell"><input type='text' maxlength="45" name="firstNameASO" id="firstNameASO"  value="<?php echo htmlentities($firstName); ?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">Last Name</td>
            <td class="fieldcell"><input type='text' maxlength="45" name="lastNameASO" id="lastNameASO" value="<?php echo htmlentities($lastName); ?>" /></td>
        </tr>
        <tr>
            <td class="labelcell">Date Of Birth</td>
            <td class="fieldcell"><input type='text' name="dobASO" id="dobASO" readonly="readonly" value="<?php echo htmlentities($dob); ?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">Gender</td>
            <td class="fieldcell">
            	<select   name="genderASO" id="genderASO"  value="<?php echo htmlentities($gender); ?>">
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
            <td class="fieldcell"><input type='text' maxlength="80" name="address1ASO" id="address1ASO"  value="<?php echo htmlentities($address1); ?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">Address Line 2 (Optional)</td>
            <td class="fieldcell"><input type='text' maxlength="80" name="address2ASO" id="address2ASO"  value="<?php echo htmlentities($address2); ?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">City</td>
            <td class="fieldcell"><input type='text' maxlength="45" name="cityASO" id="cityASO" value="<?php echo htmlentities($city); ?>" /></td>
        </tr>
        <tr>
            <td class="labelcell">Country</td>
            <td class="fieldcell">
            	<select   name="countryASO"  id="countryASO" val value="<?php echo htmlentities($country); ?>" >
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
            <td class="fieldcell"><input type='text' maxlength="10" name="contactNumberASO" id="contactNumberASO"  value="<?php echo htmlentities($contactNumber); ?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">Website (Optional)</td>
            <td class="fieldcell"><input type='text' maxlength="100" name="websiteASO" id="websiteASO" value="<?php echo htmlentities($website); ?>" /></td>
        </tr>
        <tr>
            <td class="labelcell">Password</td>
            <td class="fieldcell"><input type='password' name="passwordASO" id="passwordASO"   /></td>
        </tr>
        <tr>
            <td class="labelcell">Confirmation Password</td>
            <td class="fieldcell"><input type='password' name="passwordConfirmationASO" id="passwordConfirmationASO"  /></td>
        </tr>
        <tr>
            <td class="labelcell">Image Verification</td>
            <td class="fieldcell">
            	<img src="includes/captchas.php" style="padding-left:4%"> 
				<input type="text" size="10" name="captchaASO" id="captchaASO" />
            </td>
        </tr>
        <tr > 
            <td colspan="2"  ><input type="submit" value="Add Site Operator" name="addSiteOperatorSubmit" id="addSiteOperatorSubmit" class="submit"/></td>
        </tr> 	
        <tr > 
            <td colspan="2" class="errorShowDivASO" ><div id="errorMsgASO"><?php echo $assignSOResponse ;?></div></td>
        </tr> 
    </table> 
    
    
</form>

