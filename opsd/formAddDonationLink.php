
<?php
 
$currentPage =  $utilObj->getCurrentPageName();  
$currentPageUrl =  $utilObj->getCurrentPageURL();
if($utilObj->isUserLoggedIn()){  
	
	$donationLinkResponse  = "<font color=black>Enter your donation link if you have from paypal</font>";
	$currentPage = $utilObj->getCurrentPageName(); 	
	
	$username = $_SESSION['username'];
	$profileRow = $profileObj->getProfilebyUsername($username) ;
	$donationLink = $profileRow["donation_link"]; 
	
	
	if(isset($_POST['addDonationLinkSubmit'])){
		$donationLink = trim($_POST['donationLink']);
		$username = $_SESSION['username']; 
		$donationLinkResponse = $profileObj->addDonationLink(trim($donationLink),$username);
		
		
		//$utilObj->redirect_to($currentPage);
	}
	
}else{
	$utilObj->redirect_to("home");
}

?>



<script type="text/javascript"  src="js/forms/formDeveloperDonationLink.js"> </script> 

<form method="post" action="<?php echo $currentPageUrl; ?>" id="form" >

	<table class="formFontOnly" width="53%" >
    	<tr>
            <td class="headercell" colspan="2">Add Donation Link</td> 
        </tr>
         <tr>
            <td class="labelcell" >Donation Link</td>
            <td class="fieldcell" style="padding:2%"><input type='text'   name="donationLink" id="donationLink"  value="<?php echo htmlentities($donationLink); ?>" /> 
            </td>
        </tr>
        <tr > 
            <td colspan="2"  ><input type="submit" value="Save Donation Link"  name="addDonationLinkSubmit" id="addDonationLinkSubmit" class="submit"/> 
			</td>
        </tr> 
		<tr > 
            <td colspan="2" class="defaultResponseMsg1" ><div id="donationLinkResponseMsg"><?php if(isset($donationLinkResponse)){echo $donationLinkResponse ;}?></div></td>
        </tr> 
	</table>

</form>