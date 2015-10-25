<?php
$changeProfileImageResponse = "<font color=black>Change your profile image</font>";
//$currentPage =  $utilObj->getCurrentPageURL(); 
$userProfile =  $userRowToEdit ;
$usernameOfProfile = $userProfile["username"];
$userProfileImagePath = $userProfile["profile_image_path"];
if( $utilObj->isUserLoggedIn()){ 
	if (isset($_POST['changeProfileImageSubmit'])) { 
		$username = $_SESSION['username'];		
        if ((($_FILES["profileImagePath"]["type"] == "image/gif") || ($_FILES["profileImagePath"]["type"] == "image/jpeg") || ($_FILES["profileImagePath"]["type"] == "image/png") || ($_FILES["profileImagePath"]["type"] == "image/pjpeg"))) {
            if (($_FILES["profileImagePath"]["size"] < 40000)) {
                if ($_FILES["profileImagePath"]["error"] > 0) {
                    $changeProfileImageResponse = "Return Code: " . $_FILES["profileImagePath"]["error"] . "<br />";
                } else {
                    $uploadedFileName = $_FILES["profileImagePath"]["name"];
                    $fileExt = end(explode(".", $uploadedFileName));
                    $fileName = $usernameOfProfile . "." . $fileExt;
                    $finalFilePath = "user_profile_images/" . $fileName;
                    if ($userProfileImagePath != $DEFAULT_AVATAR_PATH && file_exists($userProfileImagePath)) { 
						unlink($userProfileImagePath) ; 
                    }
                    move_uploaded_file($_FILES["profileImagePath"]["tmp_name"], $finalFilePath);
                    $profileObj->setProfileImagePath( $finalFilePath ,$usernameOfProfile);
                    $userProfile =  $profileObj->getProfilebyUsername($usernameOfProfile) ;	 
					$userProfileImagePath = $userProfile["profile_image_path"];
					$changeProfileImageResponse = "Profile image successfully changed";
                }
            } else {
                $changeProfileImageResponse = "<font color=red>file size shold be less than 40KB</font>";
            }
        } else {
            $changeProfileImageResponse = "<font color=red>Invalid file type.Valid file types are gif,jpeg,png,pjpeg</font>";
        }
    }
	 
	
}else{
	 $utilObj->redirect_to("home");
}

?>

<script type="text/javascript" src="js/forms/formChangeProfileImage.js"> </script> 
 

<form method="post" action="<?php echo $currentPage; ?>" id="form" enctype="multipart/form-data">

	<table class="formFontOnly" width="53%">
    	<tr>
            <td class="headercell" colspan="2">Change Profile Image</td> 
        </tr>
         <tr>
            <td class="labelcell" >Profile Image Path </td>
            <td class="fieldcell" style="padding:2%"><input type='file' name="profileImagePath" id="profileImagePath"   /> 
            </td>
        </tr>
        <tr > 
            <td colspan="2"  ><input type="submit" value="Upload Image" name="changeProfileImageSubmit" id="changeProfileImageSubmit" class="submit"/> 
			</td>
        </tr> 
         <tr>
            
            <td class="labelcell" colspan="2">
            	<img src="<?php echo $userProfileImagePath; ?>" width="100" height="100" style="padding-top:2%;padding-bottom:2%;"></img><br />
				<?php if($userProfileImagePath != "images/defaultAvatar.gif"){ ?>
             		<b><a href="imagePathToDeleteByAdmin-<?php echo $_GET['userIdToEdit']; ?>" onclick="return ConfirmDeleteProfilePic();">Delete Profile Image</a></b>
                    
            	<?php	 
					//$changeProfileImageResponse = "";
				} ?> 
            </td>
        </tr>
         <tr > 
            <td colspan="2" class="changeProfileImageErrorShowDiv" ><div id="changeProfileImageErrorMsg"><?php if(isset($changeProfileImageResponse)){echo $changeProfileImageResponse ;}?></div></td>
        </tr> 
    </table>

</form>