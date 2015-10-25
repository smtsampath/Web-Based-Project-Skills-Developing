
 

<script type="text/javascript">
	$(function() {
		//$( "#manageProfileAccordion" ).accordion();
	});
</script> 

<table class="accordianPanel1" > 
    <tr>
        <td>
        	<div id="manageProfileAccordion" >
            	<!--<h3><a href="#">User Profile Details</a></h3>-->
				<div> 
                	    <?php require_once("formEditProfileDetails.php"); ?>   
				</div> 
                <!--<h3><a href="#">User Password</a></h3>-->
				<div>                      
                	  <?php require_once("formChangepassword.php"); ?>     
               	</div> 
               <!-- <h3><a href="#">User Profile Image</a></h3>-->
               
				<div>       
                      <?php require_once("formChangeProfileImage.php"); ?>   
            	</div>    
                <?php  
				
				$userType = $profileRow["user_type"];  
				if($userType == "Project Developer" || $userType == "Admin"){ ?>
                <div>       
                      <?php require_once("formAddDonationLink.php"); ?>   
            	</div> 
                <?php }
				if($userType == "Project Developer" ){?>
                 <div>       
                      <?php  require_once("formUserPreferences.php"); ?>   
            	</div> 
                <?php } ?>
            </div>
             
        </td>
    </tr>  
</table>