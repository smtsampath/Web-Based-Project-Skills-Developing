
<form method="post" action="home" id="form">

<table class="formFontOnly" width="75%">
		<tr>
            <td colspan="2" class="headercell">Sign In</td>
            
        </tr>
        <tr>
            <td class="labelcell">Username</td>
            <td class="fieldcell"> <input type="text" maxlength="45" name="usernameHP" id="usernameHP" value="<?php if(isset($username)){echo htmlentities($username);}?>"/></td>
        </tr>
        <tr>
            <td class="labelcell">Password</td>
            <td class="fieldcell"><input type='password' name="passwordHP" id="passwordHP" /></td>
        </tr> 
         <tr> 
            <td colspan="2">
            
            <div id="homepageSignInSubDiv"> 
            <div id="rememberPWDiv" ><input type='checkbox'   name="rememberPW" id="rememberPW"  value="ON"/><label for="rememberPW">Remember Me</label> </div>	 
            <input type='submit' value="Sign In" name="homepageSignInSubmit" id="homepageSignInSubmit" class="submit"/><br><br>
             <a target="_blank" href="forgotPassword" id="forgotPW">Forgot your password ?</a>
            </div>
             
            </td>
             
        </tr>  
        <tr > 
            <td colspan="2" class="errorShowDiv" ><div id="errorMsg"><?php echo $signInResponse ;?></div></td>
        </tr> 
        <tr>
			<td width="100%" colspan="2" >
				 <div style="padding:2% 2% 2% 4%"> Do not have an account ?  <a href="signUp" id="toSignUpLink" >Sign Up Here</a> </div> 
			</td>
		</tr> 
</table>


</form>