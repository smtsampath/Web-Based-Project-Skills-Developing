<?php require_once("commonHeaderIncludes.html"); ?>  
<?php require_once("jQueryHeaderIncludes.html"); ?>  
     
<script type="text/javascript" src="js/signInPopUp.js" ></script>
<script  type="text/javascript" src="js/forms/formPopupSignIn.js">  </script>
<script  type="text/javascript" src="js/forms/formHomePageSignIn.js">  </script>

<link rel="stylesheet" href="css/popuplogin.css" type="text/css">   
<table border="0" width="100%"> 
	<tr>
        <td>  
			<div  class="fontOnly">
            	<?php 
				
				$adminProfileRow  =  $profileObj->getAdminRow();
				
				$adminEmail="";
				$donationLink="";
				if(isset($adminProfileRow["email"])){
					$adminEmail = "mailto:".$adminProfileRow["email"];					
				}else{
					$adminEmail = "errorLoading";
				}
				
				if(isset($adminProfileRow["donation_link"])){
					$donationLink = $adminProfileRow["donation_link"];		
				}else{
					$donationLink = "errorLoading";
				}
				
						 
				
				if ($utilObj->isUserLoggedIn()) { ?>
                		<a href="userHome" class="siteMenuLink">Home</a>
                		<a href="myAccountRedirect" class="siteMenuLink">My Account</a>
                		<a href="search" class="siteMenuLink">Search</a> 
               			<a href="<?php echo $donationLink?> " class="siteMenuLink" target="_blank">Donate Us</a>
                 		<a href="<?php echo $adminEmail?> " class="siteMenuLink">Contact Us</a>
                        <a href="FAQ" class="siteMenuLink">FAQ</a>
                        <a href="signOut" class="signOutLink">Sign Out</a>
                <?php } else { ?>
                        <a href="home" class="siteMenuLink">Home</a>
                		<a href="signUp" class="siteMenuLink">Sign Up</a>
                		<a href="search" class="siteMenuLink">Search</a> 
               			<a href="<?php echo $donationLink?> " class="siteMenuLink" target="_blank">Donate Us</a>
                 		<a href="<?php echo $adminEmail?> " class="siteMenuLink">Contact Us</a>
                        <a href="FAQ" class="siteMenuLink">FAQ</a>
                        <a href="#" class="signInLink">Sign In</a> 

               
                
                <div id="login_box"> 
                    <form method="post" action="<?php echo $currentPage; ?>" >
                        <table class="formFontOnly">
                            <tr>
                                <td class="labelcell">Username</td>
                                <td class="fieldcell"><input type="text" maxlength="45" name="usernamePop" id="usernamePop"  /></td>
                            </tr>
                            <tr>
                                <td class="labelcell">Password</td>
                                <td class="fieldcell"><input type='password' name="passwordPop" id="passwordPop"  /></td>
                            </tr>
                            <tr>
                                <td>
                                
                                </td>
                                <td class="button">
                                <div id="rememberPWDiv" ><input type='checkbox'   name="rememberPWPop" id="rememberPWPop"  value="ON"/><label for="rememberPWPop">Remember Me</label> </div>	
                                <input type="submit" value="Sign In" id="signInSubmitPop" name="signInSubmitPop" class="submit" />
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a href="forgotPassword" target="_blank" style="color:#000">Forgot your Password ?</a></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td> <button id="signInPopUpClose" style="width:1em;height:1em;"></button></td>
                            </tr>
                            <tr>
                                <td colspan="2"  id="signInPopResponseTD" ><div id="errorMsgPop"><?php if(isset($signInPopResponse)){echo $signInPopResponse ;}  ?></div></td>
                                 
                            </tr>
                        </table>
                    </form> 
                </div>
                 <?php } ?>  
        	</div>    
       	</td>
	</tr> 
</table> 