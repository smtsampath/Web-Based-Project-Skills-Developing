<?php require_once("commonHeaderIncludes.html"); ?>  
<?php require_once("jQueryHeaderIncludes.html"); ?>    
<?php require_once("JQueryCookieHeaderIncludes.html"); ?>   
<?php require_once("jQueryPaginateTableHeaderIncludes.html"); ?>     

<?php require_once("includes/session.php"); ?>
<?php require_once("includes/mysql_database_connection.php"); ?>  
<?php require_once("includes/constant_Vairables.php"); ?>  
 
<?php require_once("includes/util_class.php"); ?> 
<?php require_once("includes/profile_class.php"); ?>  
<?php 
$utilObj->redirectToHTTPS();
if(!$utilObj->isUserLoggedIn()){ 
	require_once("formPopupSignInAction.php"); 	
} 
?> 
 
<script>
	$(function() {
		$( "#viewPanel" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
		});


	});
</script> 

<html> 
	<title>My Project Skills | FAQ</title> 
    <body class='body'>

	<table width="100%" >
		<tr>
			<td width="100%" > 
				<div class="headerImage"><?php require_once("headerImage.html"); ?> </div>
			</td>
		</tr>  
		<tr>
			<td width="100%" >
				<div  class="siteMenu"><?php require_once("siteMenu.php"); ?>  </div>
			</td>
		</tr> 
        <tr>
			<td width="100%"  > 
				<div id="viewPanel"  class="tabPanel1">
                 
                <!--common FAQ-->
                <div class="faqTitle1">Common FAQ</div> <br />
                
                <div class="faqRow">
                	<div class="faqTitle2">How to sign up for a user account ?</div> 
                	<div class="faqTBody">Go to site menu and click the <font class="faqLinks" >Sign Up</font> link. Then you will be able to sign up for an account according to the user type you wish.</div>  
                </div> 
                 
                 <div class="faqRow">
                	<div class="faqTitle2">How to sign in for the user account ?</div> 
                	<div class="faqTBody">Go to site menu and click the <font class="faqLinks" >Home</font> or <font class="faqLinks" >Sign In</font> link. Then sign in form will be appear. Then you will be able to enter your username and password to login to your account. </div>  
                </div> 
                
                <div class="faqRow">
                	<div class="faqTitle2">How to search projects ?</div> 
                	<div class="faqTBody">Go to site menu and click the  <font class="faqLinks" >Search</font> link. Then search panel will appear.Select the  <font class="faqLinks" >Search Projects</font> tab.Enter keywords to search the project you want and select the search terms by the combo box next to the text field. Then click "Search Projects" button.If search results were found then results will be displayed as a list below to the searchform.</div>  
                </div> 
                 
                <div class="faqRow">
                	<div class="faqTitle2">How to view projects details?</div> 
                	<div class="faqTBody">Click the link that shows a particular project title on the website (on search project results or any other site content etc).Then a new tab will be open with the full details of the particular project.</div>  
                </div>
                 
               	<div class="faqRow">
                	<div class="faqTitle2">How to search users?</div> 
                	<div class="faqTBody">Go to site menu and click the  <font class="faqLinks" >Search</font> link. Then search panel will appear.Select the  <font class="faqLinks" >Search Users</font> tab.Enter keywords to search the user you want and select the search terms by the combo box next to the text field. Then click "Search Users" button.If search results were found then results will be displayed as a list below to the searchform.</div>  
                </div>
                 
                 <div class="faqRow">
                	<div class="faqTitle2">How to view users' details?</div> 
                	<div class="faqTBody">Click the link that shows the username of a particular user on the website (on search users results or any other site content etc).Then a new tab will be open with the full details of the particular user.</div>  
                </div>
                
                <div class="faqRow">
                	<div class="faqTitle2">How to view user feedbacks on a particular user?</div> 
                	<div class="faqTBody">Click the <font class="faqLinks" >User Feedbacks</font> link on view user page of the particular user(check FAQ - How to view users details?).Then new tab will be open with the user feedbacks on that particular user.At there you will be able to add a new user feedback or edit the feedback if you have already submitted</div>  
                </div>
                
                <div class="faqRow">
                	<div class="faqTitle2">How to donate the website?</div> 
                	<div class="faqTBody">Go to site menu and click the <font class="faqLinks" >Donate us</font> link. Then PayPal donation page will be appear on a new tab. Continue the donation process at PayPal website with the amount you wish to donate.</div>  
                </div>
                
                <div class="faqRow">
                	<div class="faqTitle2">How to contact the website administration?</div> 
                	<div class="faqTBody">Go to site menu and click the <font class="faqLinks" >Contact us</font> link. Then the default email client at your end will be opened with the website administration email.</div>  
                </div><br>
                
                <!--Registered User FAQ-->
                
                <div class="faqRow">
                	<div class="faqTitle2">How to edit profile details?</div> 
                	<div class="faqTBody">First <font class="faqLinks" >Sign In</font> to your account. Then click the <font class="faqLinks" >My Account</font> link on site menu. Then go to <font class="faqLinks" >Manage Profile</font> tab in <font class="faqLinks" >My Account</font> section. Then you will be able to, 
                    <br><b>1. </b>Edit your personal profile details at <font class="faqLinks" >Edit Profile Details</font> Form.
                    <br><b>2. </b>Change password at <font class="faqLinks" >Change Password</font> Form.
                    <br><b>3. </b>Change/Remove the profile image at <font class="faqLinks" >Change Profile Image</font> Form.
                    </div>  
                </div> 
                 
                <div class="faqRow">
                	<div class="faqTitle2">How to view the list of own feedbacks?</div> 
                	<div class="faqTBody">First <font class="faqLinks" >Sign In</font> to your account. Then click the <font class="faqLinks" >My Account</font> link on site menu. Then go to <font class="faqLinks" >Reviews and Ratings</font> tab in <font class="faqLinks" >My Account</font> section.That tab will be divided  in to 2 subsections.
                    <br><b>1. </b>On <font class="faqLinks" >View Own Feedbacks</font> tab you will be able to see the list of all feedbacks which are submitted by other users on you.
                    <br><b>2. </b>On <font class="faqLinks" >View Own Submitted Feedbacks</font> tab you will be able to see the list of all feedbacks which are submitted by you on other users. And you will be able to change any feedback of that list directly.
                    </div>  
                </div> 
                 
                 
                <?php   if( $utilObj->isUserLoggedIn()  ){ 
						$username = $_SESSION["username"];
						$profileRow = $profileObj->getProfilebyUsername($username)	;
						$userType = $profileRow["user_type"];
						
						if($userType == $USER_TYPE_PROJECT_CLIENT   ){
					?>
                 
                <!--Project Client FAQ--> 
                 
               	<div class="faqTitle1">FAQ for Project Clients</div> <br /> 
                <div class="faqRow">
                	<div class="faqTitle2">How to add a project?</div> 
                	<div class="faqTBody">First <font class="faqLinks" >Sign In</font> to your account. Then click the <font class="faqLinks" >My Account</font> link on site menu. Then go to <font class="faqLinks" >Manage Projects</font> tab in <font class="faqLinks" >My Account</font> section.Enter required details in <font class="faqLinks" >Add Project</font> form and click "Add Project" button to add a project to the website.</div>  
                </div>  
                
                <div class="faqRow">
                	<div class="faqTitle2">How to upload files for a particular project?</div> 
                	<div class="faqTBody">First <font class="faqLinks" >Sign In</font> to your account. Then click the <font class="faqLinks" >My Account</font> link on site menu. Then go to <font class="faqLinks" >Manage Projects</font> tab in <font class="faqLinks" >My Account</font> section.Then go to in <font class="faqLinks" >Upload Related Files</font> form and select a project from the combobox called "Select a Project" and click "select project" button. Then the details of the uploaded files of the selected project will be displayed at the bottom of the form. And also new file can be uploaded to the selected project there.(maximum 3 files are allowed to upload per project)</div>  
                </div> 
                
                <div class="faqRow">
                	<div class="faqTitle2">How to edit details of a particular project?</div> 
                	<div class="faqTBody">First <font class="faqLinks" >Sign In</font> to your account. Then click the <font class="faqLinks" >My Account</font> link on site menu. Then go to <font class="faqLinks" >Manage Projects</font> tab in <font class="faqLinks" >My Account</font> section.Then go to in <font class="faqLinks" >Upload Related Files</font> form and select a project from the combobox called "Select a Project" and click "select project" button. Then the details of the selected project will be displayed at the bottom of the form. Then you will be able to do changes on the details of a particular project and click "save update" button to edit the selected project.</div>  
                </div> 
                
                <div class="faqRow">
                	<div class="faqTitle2">How to view requests comes from developers for a particular project?</div> 
                	<div class="faqTBody">First <font class="faqLinks" >Sign In</font> to your account. Then click the <font class="faqLinks" >My Account</font> link on site menu. Then go to <font class="faqLinks" >Manage Project Requests</font> tab in <font class="faqLinks" >My Account</font> section.Then select the title of the particular project from the combobox and click "View Requests" button. Then the list of all requests will be displayed below to the form.</div>  
                </div>
                
                <div class="faqRow">
                	<div class="faqTitle2">How to assign a project to a developer?</div> 
                	<div class="faqTBody">First check FAQ - "How to view requests comes from developers for a particular project?". Then on the each request on the list you can click the username of the developer and view the details of the developer.And also check the reviews and ratings from the <font class="faqLinks" >User Feedbacks</font> link at the bottom of the view user page and identify the suitable developer for the project. After identifying the developer then go back to the requests list and click accept button on the request which was sent by the selected developer.Then popup message will appear to confirm the accepting the particular request.Then other requests will be automatically rejected and selected developer will be notified via email.For further more communication with the developer you can use the email of the developer.</div>  
                </div>
                
                <div class="faqRow">
                	<div class="faqTitle2">How to donate a developer?</div> 
                	<div class="faqTBody">First check FAQ - "How to view users details?". Then go to the view user page of a particular developer. Click the <font class="faqLinks">Make a Donation</font>link at the bottom of the page.Then PayPal donation page will be opened on a new tab(Make sure the donation link is started with www.PayPal.com and valid PayPal URL to donate).Continue the donation process at PayPal website with the amount you wish to donate.</div>  
                </div>
                 
                <?php  } else if($userType == $USER_TYPE_PROJECT_DEVELOPER  ){ ?>
                <!--Project Developer FAQ--> 
                
                <div class="faqTitle1">FAQ for Project Developers</div> <br /> 
                <div class="faqRow">
                	<div class="faqTitle2">How to add donation link?</div> 
                	<div class="faqTBody">First you have to have a donation link which is created at PayPal. Follow <a href="http://zerodollarchallenge.blogspot.com/2008/05/PayPal-donate-link-instead-button.html" id="buttonLink1" target="_blank">this tutorial</a> to create a donation link at PayPal if you don't have. Then <font class="faqLinks" >Sign In</font> to your account. Then click the <font class="faqLinks" >My Account</font> link on site menu. Then go to <font class="faqLinks" >Manage Profile</font> tab in <font class="faqLinks" >My Account</font> section. Then go to the <font class="faqLinks" >Add Donation Link</font> panel and enter the donation link you have created at PayPal and click "Save Donation Link" button.</div>  
                </div> 
                
                <div class="faqRow">
                	<div class="faqTitle2">How to manage preferences?</div> 
                	<div class="faqTBody">First <font class="faqLinks" >Sign In</font> to your account. Then click the <font class="faqLinks" >My Account</font> link on site menu. Then go to <font class="faqLinks" >Manage Profile</font> tab in <font class="faqLinks" >My Account</font> section. Then go to <font class="faqLinks" >Add Developer Preferences</font> form and check the preferences (Maximum 10 preferences are allowed to select) according to your preferences to develop the projects. After selecting the checkboxes click "save preferences" button.</div>  
                </div>
               
               	<div class="faqRow">
                	<div class="faqTitle2">How to send project requests?</div> 
                	<div class="faqTBody">
                    First <font class="faqLinks" >Sign In</font> to the user account as a project developer and then check FAQ - "How to view projects details?". On view project page of a particular project if the project is available to request then there will be a link called <font class="faqLinks" >Send a Request to Client</font> at the bottom of the page. Click that link and then a popup message will be appeared to confirm the sending a request for that particular project. Click OK on popup message and then a request will be sent to the client of the particular project. And also the project client will be notified via an email regarding the new request.
                    </div>  
                </div>
                 
                <div class="faqRow">
                	<div class="faqTitle2">How to view sent requests?</div> 
                	<div class="faqTBody">
                    First <font class="faqLinks" >Sign In</font> to your account. Then click the <font class="faqLinks" >My Account</font> link on site menu. Then go to <font class="faqLinks" >View Own Project Requests</font> tab in <font class="faqLinks" >My Account</font> section. Then the list of all requests which were sent by you will be appeared. You can check status on requests on this page. 
                    </div>  
                </div>
                
                 <?php } else  if($userType == $USER_TYPE_SITE_OPERATOR  ){ ?>
                <!--Site Operator FAQ--> 
                <div class="faqTitle1">FAQ for Site Operators</div> <br /> 
                
                <div class="faqRow">
                	<div class="faqTitle2">How to edit details on other users?</div> 
                	<div class="faqTBody">
                    First <font class="faqLinks" >Sign In</font> to your account as a site operator and then check FAQ - "How to view users details?". On the view user page of the particular user (allowed user types to edit are project developers and project clients) to be edited, click the link called <font class="faqLinks" >Edit User</font> at the bottom. Then a new tab will be appeared with the details of the particular user where the site operator will be able to edit details. 
                    </div>  
                </div>
                
                <div class="faqRow">
                	<div class="faqTitle2">How to edit details on other projects?</div> 
                	<div class="faqTBody">
                    First <font class="faqLinks" >Sign In</font> to your account as a site operator and then check FAQ - "How to view projects details?". On the view project page of the particular project to be edited, click the link called <font class="faqLinks" >Edit Project</font> at the bottom. Then a new tab will be appeared with the details of the particular project where the site operator will be able to edit details. 
                    </div>  
                </div>
                
                <div class="faqRow">
                	<div class="faqTitle2">How to edit feedbacks on a particular user?</div> 
                	<div class="faqTBody">
                    First <font class="faqLinks" >Sign In</font> to your account as a site operator and then check FAQ - "How to view user feedbacks on a particular user?". On the view user feedbacks page of the particular user , there will be a link called  <font class="faqLinks" >Edit Feedback</font> on each feedback. Click the  <font class="faqLinks" >Edit Feedback</font> link on the particular feedback to be edited. Then a new tab will be opened with the details of selected feedback where site operator will be able to edit details. 
                    </div>  
                </div>
                 <?php }else   if($userType == $USER_TYPE_ADMIN   ){ ?>
                <!--Admin FAQ-->
                
                <div class="faqTitle1">FAQ for Admin</div> <br /> 
                
                <div class="faqRow">
                	<div class="faqTitle2">How to edit details on other users?</div> 
                	<div class="faqTBody">
                    First <font class="faqLinks" >Sign In</font> to your account as the admin and then check FAQ - "How to view users details?". On the view user page of the particular user (allowed user types to edit are project developers and project clients) to be edited, click the link called <font class="faqLinks" >Edit User</font> at the bottom. Then a new tab will be appeared with the details of the particular user where the admin will be able to edit details. 
                    </div>  
                </div>
                
                <div class="faqRow">
                	<div class="faqTitle2">How to edit details on other projects?</div> 
                	<div class="faqTBody">
                    First <font class="faqLinks" >Sign In</font> to your account as the admin and then check FAQ - "How to view projects details?". On the view project page of the particular project to be edited, click the link called <font class="faqLinks" >Edit Project</font> at the bottom. Then a new tab will be appeared with the details of the particular project where the admin will be able to edit details. 
                    </div>  
                </div>
                
                <div class="faqRow">
                	<div class="faqTitle2">How to edit feedbacks on a particular user?</div> 
                	<div class="faqTBody">
                    First <font class="faqLinks" >Sign In</font> to your account as a the admin and then check FAQ - "How to view user feedbacks on a particular user?". On the view user feedbacks page of the particular user , there will be a link called  <font class="faqLinks" >Edit Feedback</font> on each feedback. Click the  <font class="faqLinks" >Edit Feedback</font> link on the particular feedback to be edited. Then a new tab will be opened with the details of selected feedback where the admin will be able to edit details. 
                    </div>  
                </div>
            
                <div class="faqRow">
                	<div class="faqTitle2">How to assign site operators?</div> 
                	<div class="faqTBody">
                    First <font class="faqLinks" >Sign In</font> to your account as a the admin. Then click the <font class="faqLinks" >My Account</font> link on site menu. Then go to <font class="faqLinks" >Assign Site Operators</font> tab in <font class="faqLinks" >My Account</font> section. Enter site operators details in  <font class="faqLinks" >Assign Site Operators</font> form and click  "Add site operator" button to assign. Then provide the account details to the particular site operator to enable him/her to access his/her account.
                    </div>  
                </div>
                
                <div class="faqRow">
                	<div class="faqTitle2">How to set website donation link?</div> 
                	<div class="faqTBody">First you have to have a donation link which is created at PayPal. Follow <a href="http://zerodollarchallenge.blogspot.com/2008/05/PayPal-donate-link-instead-button.html" id="buttonLink1" target="_blank">this tutorial</a> to create a donation link at PayPal if you don't have. Then <font class="faqLinks" >Sign In</font> to your account. Then click the <font class="faqLinks" >My Account</font> link on site menu. Then go to <font class="faqLinks" >Manage Profile</font> tab in <font class="faqLinks" >My Account</font> section. Then go to the <font class="faqLinks" >Add Donation Link</font> form and enter the donation link you have created at PayPal and click "Save Donation Link" button.</div>  
                </div> 
                
                <?php } ?>	
                <?php } else {?>
                <div class="faqTitle2"><a href="home" target="_blank">Sign In</a> to your account or <a href="signUp" target="_blank">Sign Up</a> for a new account for further FAQ according to the user types.</div> <br /> 
                <?php } ?>
                 <div class="faqTitle2">For further information <a href="mailto:<?php echo $adminEmail?> " >contact</a> website admin.</div> <br /> 
            	</div>  
			</td>
		</tr>  
	</table> 
	</body> 
</html>


<?php require("includes/mysql_database_connection_close.php"); ?> 