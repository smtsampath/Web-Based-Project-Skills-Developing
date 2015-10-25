<table class="formFontOnly" width="75%">
		<tr>
            <td colspan="2" class="headercell">Welcome &nbsp;<b><?php  if(isset($userFirstName)){echo $userFirstName ;} ?>,</b></td>
            
        </tr>
        <tr>
            <td class="labelcell" colspan="2" ><br>
            <img src="<?php echo $userProfileImagePath; ?>" width="100" height="100"></img><br><br>
            <b>Name : <?php echo $userFirstName." ".$userLastName ; ?><br><br>
            Email : <?php echo $userEmail ; ?><br><br>
            Type : <?php echo $userType ; ?><br><br>
            Member Since : <?php echo $memberSince ; ?><br><br>
             <a href="myAccountRedirect" style="color:#000">Go to My Account</a></b>
            </td> 
        </tr>
        
</table>