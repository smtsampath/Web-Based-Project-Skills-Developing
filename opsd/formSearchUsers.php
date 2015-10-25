<?php

$searchUsersResponse  = "";
if(isset($_POST['searchUsersSubmit'])){
	$searchUserTerm = trim($_POST['searchUsersTerm']);
	$searchUserCategory = $_POST['searchUserCategory'];
	
	if($utilObj->hasNotSensitiveCharacters($searchUserTerm)){ 
		$searchUsersResults = $profileObj->searchUsers($searchUserTerm ,$searchUserCategory); 
		$resultCount = count($searchUsersResults); 
		if(!$resultCount > 0){
			$searchUsersResponse = "<font color=red>No results found</font>";
		} else if($resultCount == 1){
			$searchUsersResponse = "<font color=black>1 result found</font>";  	
		}else{
			$searchUsersResponse = "<font color=black>".$resultCount." results found</font>";  	
		} 
	}else{
		$searchUsersResponse = "<font color=red>Invalid characters found.Try different searching keywords</font>";
	}
}

?>

<script type="text/javascript" src="js/forms/formSearchUsers.js"> </script>

<center > 
	<div style="padding-top:2%;" >
    	<form method="post" action="search" id="form" >
        
		Search&nbsp;&nbsp;<input type='text' size="40"  name="searchUsersTerm" id="searchUsersTerm"  class="searchTerm" value="<?php if(isset($searchUserTerm)){echo  htmlentities($searchUserTerm);}?>"  />&nbsp; By&nbsp;
	<select class="searchCategories"  name="searchUserCategory" id="searchUserCategory"  selected="<?php if(isset($searchUserCategory)){echo htmlentities($searchUserCategory); } ?>">
            		<?php foreach ($SEARCH_USERS_CATEGORIES as $searchUserCategoryVal){ 
							if(isset($searchUserCategory) && $searchUserCategory == $searchUserCategoryVal){?>
						<option selected="selected"><?php echo $searchUserCategoryVal; ?></option>
					<?php 	}else{?>
						<option ><?php echo $searchUserCategoryVal; ?></option>
					<?php	}?>					
					<?php }?> 
                                 
	</select>&nbsp;
	 
    <input type="submit" value="Search Users" name="searchUsersSubmit" id="searchUsersSubmit" class="searchSubmit"/><br>
    <div class="searchResponse2" id="searchUserResponse"><?php if(isset($searchUsersResponse)){echo $searchUsersResponse ;}?></div>
    </form> 
    
    </div> <br>
    <?php if(isset($searchUsersResults)){ 
				if(count($searchUsersResults) > 0){ ?>
       <div>
		<table id="userSearchResultsTable" width="100%" class="searchResultsTable">	
			<tbody>
    	<?php  foreach($searchUsersResults as $searchUsersResultVal){
						 
						$profileId = $searchUsersResultVal["profile_id"];
						$profileId = $utilObj->encodeString($profileId); 
						 
						$username = $searchUsersResultVal["username"];
						
						$userProfileImagePath = $searchUsersResultVal["profile_image_path"]; 
						if($userProfileImagePath ==""){
							$userProfileImagePath = "images/defaultAvatar.gif";
						}
						
						$firstName = $searchUsersResultVal["first_name"];
						$lastName = $searchUsersResultVal["last_name"];
						$name = $firstName ." ".$lastName ;
						
						$email = $searchUsersResultVal["email"];
						 
						
						$userType = $searchUsersResultVal["user_type"];
						
						$memberSince = $searchUsersResultVal["created_date"];
						$memberSinceArray = explode(" ",$memberSince); 
                		$memberSince = $memberSinceArray[0];
						 
		?>
        				<tr>
                      		<td class="searchResultRowImage"  >
                            	<div > 
                                	<img src="<?php echo $userProfileImagePath; ?>" width="60" height="60" />
                                </div> 
                        	</td>
                            <td class="searchResultRow"  >
                            	<div style="padding-bottom:0.5%"> 
                                	<a href="users-<?php echo $profileId; ?>" target="_blank"><b><font color="#000000"><?php echo $username; ?></font></b></a><br><br> 
                                	<b>Name : </b><?php echo $name; ?> &nbsp;&nbsp;&nbsp;  &nbsp; &nbsp; 
                                    <?php if( $utilObj->isUserLoggedIn()){ ?>
                                    <b>Email : </b><?php echo $email; ?>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; 
                                    <?php }else{?>
                                    <b>Email : </b><a href="home" target="_blank"><b>Sign In</b></a> or <a href="signUp" target="_blank"><b>Sign Up</b></a> to see the email.<br><br>
                                    <?php }?>
                                     
                                    <b>Type : </b><?php echo $userType; ?>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; 
                                    <b>Member Since : </b><?php echo $memberSince; ?><br>
                                </div>
                        	</td>
                      	</tr> 
                        
    	<?php 		}
			
		?>
        
        	</tbody>
		</table>  
         <div class="pagerLink"> 
                <div class='pager'>
                   <a href='#' alt='Previous' class='prevPage'  ><font color="#000000" style="text-decoration:underline">Previous</font></a>
                   <span class='currentPage'></span> of <span class='totalPages'></span>
                   <a href='#' alt='Next' class='nextPage'><font color="#000000" style="text-decoration:underline">Next</font></a>
                </div> 
                </div>  
    </div> 
    <?php 	}
		}
		?>
</center>