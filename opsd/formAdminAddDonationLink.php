
<?php
 
//$currentPage =  $utilObj->getCurrentPageName();  
//$currentPageUrl =  $utilObj->getCurrentPageURL();
if($utilObj->isUserLoggedIn()){  
	
	$donationLinkResponse  = "<font color=black>Change/Add/Remove donation link if needed</font>";
	//$currentPage = $utilObj->getCurrentPageName(); 	
	
	$userProfile =  $userRowToEdit ;
	
	$donationLink = $userProfile["donation_link"];
	$usernameToEditLink = $userProfile["username"];
	 
	
	if(isset($_POST['addDonationLinkSubmit'])){
		$donationLink = trim($_POST['donationLink']);
		$username = $_SESSION['username'];
		 
//echo $currentPageUrl ;

		$donationLinkResponse = $profileObj->addDonationLink(trim($donationLink),$usernameToEditLink); 
		//$utilObj->redirect_to($currentPageUrl);
	}
	
}else{
	$utilObj->redirect_to("home");
}

?>



<script type="text/javascript"  src="js/forms/formDeveloperDonationLink.js"> </script> 

<form method="post" action="<?php echo $currentPage; ?>"" id="form" >

	<table class="formFontOnly" width="53%">
    	<tr>
            <td class="headercell" colspan="2">Change/Add Donation Link</td> 
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