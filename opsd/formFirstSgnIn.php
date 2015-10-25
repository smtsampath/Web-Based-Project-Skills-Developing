<script type="text/javascript" src="js/forms/formFirstSignIn.js"></script>
  
<form method="post" action="firstSignIn" id="form">

<table class="formFontOnly" >
		<tr>
            <td colspan="2"><center><font color="green">You have successfully signed up.<br> You can sign in to your account now.</font></center></td>
            
        </tr>
        <tr>
            <td class="labelcell">Username</td>
            <td class="fieldcell"> <input type="text" maxlength="45" name="usernameFS" id="usernameFS" value="<?php echo htmlentities($username);?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">Password</td>
            <td class="fieldcell"><input type='password' name="passwordFS" id="passwordFS" /></td>
        </tr> 
         <tr> 
            <td colspan="2">
            
            <div id="firstSignInSubDiv"> 
            <div id="rememberPWDiv" ><input type='checkbox'   name="rememberPW" id="rememberPW"  value="ON"/><label for="rememberPW">Remember Me</label> </div>	 
            <input type='submit' value="Sign In" name="firstSignInSubmit" id="firstSignInSubmit" class="submit"/><br><br>
             <a target="_blank" href="forgotPassword" id="forgotPW">Forgot your password ?</a>
            </div>
             
            </td>
             
        </tr>  
        <tr > 
            <td colspan="2" class="errorShowDiv" ><div id="errorMsg"><?php echo $signInResponse ;?></div></td>
        </tr> 
</table>


</form>