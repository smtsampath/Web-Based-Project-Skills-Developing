<?php require_once("commonHeaderIncludes.html"); ?>  
<?php require_once("jQueryHeaderIncludes.html"); ?>    
<?php require_once("JQueryCookieHeaderIncludes.html"); ?>   
<?php require_once("jQueryPaginateTableHeaderIncludes.html"); ?>     
 
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/mysql_database_connection.php"); ?>   
<?php require_once("includes/constant_Vairables.php"); ?>

<?php require_once("includes/project_class.php"); ?>    
<?php require_once("includes/util_class.php"); ?> 
<?php require_once("includes/profile_class.php"); ?> 
<?php require_once("includes/project_request_class.php"); ?> 
<?php require_once("includes/user_feedback_class.php"); ?> 

<?php 
$utilObj->redirectToHTTPS();
if(!$utilObj->isUserLoggedIn()){ 
	require_once("formPopupSignInAction.php"); 	
} 

?> 

<?php 


if(isset($_GET['profileIdToViewFeedback'])){
	 
	$currentPage = $utilObj->getCurrentPageURL() ;
	$profileId = $utilObj->decodeString($_GET['profileIdToViewFeedback']); 
	
	$profileTableRow =   $profileObj->getProfilebyId($profileId) ;
	
	if($profileTableRow !=""){
			
		$addFeedbackResponse = "Add a feedback to the user";		
		$userFeedbacksArray = $userFeedbackObj->getUserFeedbackArray($profileId);	 
		
		if(isset( $_SESSION['username'])){
			$writerUsername = $_SESSION['username'];
			$writerProfileRow  = $profileObj->getProfileByUsername($writerUsername);
			$writerProfileId = $writerProfileRow["profile_id"];
				 
			if(isset($_POST['saveFeedbackSubmit'])){
				$rating = $_POST['userRating'];
				$feedback = $_POST['userFeedback']; 
				
				$addFeedbackResponse = $userFeedbackObj->saveFeedback($profileId , $writerProfileId, $feedback , $rating);
				
				$userFeedbacksArray =  $userFeedbackObj->getUserFeedbackArray($profileId);	 
			}
			
			$existingFeedback = $userFeedbackObj->getFeedbackIfExists($writerProfileId ,$profileId );
			
			if($existingFeedback != ""){ 
				$userRating = $existingFeedback["rating"]; 
				$userFeedback = $existingFeedback["review"]; 
				
				$addFeedbackResponse = "You can edit your existing rating and feedback for this user" ;
			}
		}
		 
		
		$profileImagePath =$profileTableRow["profile_image_path"];
		  
		//$loginTableRow = getDynamicUserData("login","profile_id" , $profileId );
		$usernameOfBeingReviewd =  $profileTableRow["username"];  
		
		if(count($userFeedbacksArray)>0){ 
			$allRatingVal =  $userFeedbackObj->getOverallRatings($profileId);
			$allRatingesponse = "Current rating of user ".$usernameOfBeingReviewd." - ".$allRatingVal."/5" ;
		}else{
			$allRatingesponse = "Currently no reviews or ratings for user ".$usernameOfBeingReviewd.". Be the first!" ;
		}
		
		
	}else{
		$utilObj->redirect_to("home");
	}
 
}else{  
	$utilObj->redirect_to("home");
}
	 

?>

<script type="text/javascript" src="js/forms/formAddUserRating.js"></script> 

<html> 
	<title>My Project Skills | View Feedbacks</title> 
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
                <img src="<?php echo $profileImagePath; ?>" width="150" height="150"/><br><br>
                <div id="styledLabel">
                	<a href="users-<?php echo $utilObj->encodeString($profileId); ?>" target="_blank"><?php echo $allRatingesponse ;?></a>
                </div><br><br>
                 
                
                 
                 <table id="feedbackResultsTable" width="100%" class="feedbackTable">
                 	<tbody>
                    <?php if(count($userFeedbacksArray) > 0){ ?> 
                <?php foreach($userFeedbacksArray as $userFeedbackVal ){ 
					
						$feedbackId = $userFeedbackVal["user_feedback_id"]; 
						$writerProfileIdToView  = $userFeedbackVal["writer_profile_id"]; 
						 
						$writerProfileTableRow =   $profileObj->getProfilebyId($writerProfileIdToView) ;
						
						$writerUsernameToView = $writerProfileTableRow ["username"];  
						
						
						$addedDate =  $userFeedbackVal["created_date"];
						$addedDateArray = explode(" ",$addedDate);
						$addedDate =$addedDateArray [0];
						
						$ratingVal =  $userFeedbackVal["rating"];
						
						$reviewVal =  $userFeedbackVal["review"];
				
				?>
              
                	<tr>
                    	<td class="searchResultRow" >
                        	<br> By&nbsp;<a href="users-<?php echo $utilObj->encodeString($writerProfileIdToView); ?>" target="_blank"><b><?php echo $writerUsernameToView ?></b></a>&nbsp; &nbsp; &nbsp; &nbsp; On  <b><?php echo $addedDate ?></b> &nbsp; &nbsp; &nbsp; &nbsp;
                            Ratings :  <b><?php echo  $ratingVal ?>/5 </b><br><br>
                            <?php echo  $reviewVal ?><br>  <br> 
                            <?php 
							
							$loggedInUserType = $writerProfileRow["user_type"];
							if(isset($loggedInUserType) && ($loggedInUserType == $USER_TYPE_ADMIN || $loggedInUserType == $USER_TYPE_SITE_OPERATOR )){ ?>
                             <div id="styledLabel">
                				<a href="feedback-<?php echo $utilObj->encodeString($feedbackId); ?>" target="_blank">Edit Feedback</a>
                			</div> <br> 
                        	<?php }  ?>
                        
                        </td>
                    </tr>
               	   
                <?php }  ?>
                   <?php }  ?> 
                	</tbody>
             	</table>   
                <div class="pagerLink"> 
                <div class='pager'>
                   <a href='#' alt='Previous' class='prevPage'  ><font color="#000000" style="text-decoration:underline">Previous</font></a>
                   <span class='currentPage'></span> of <span class='totalPages'></span>
                   <a href='#' alt='Next' class='nextPage'><font color="#000000" style="text-decoration:underline">Next</font></a>
                </div> 
                </div>   <br>
             
                
                <?php  if($utilObj->isUserLoggedIn() && $profileId  != $writerProfileId ){ ?>
                    <div > 
                       <center> <form method="post" action="<?php echo $currentPage ;?>" id="form" >
                            <table width="60%">
                                <tr>
                                    <td class="labelcell" >
                                        User Rating : &nbsp;                                    
                                     
                                        <select class="searchCategories"  name="userRating" id="userRating"  selected="<?php if(isset($userRating)){echo htmlentities($userRating);} ?>" >  
                                        <?php foreach($USER_RATING_ARRAY as $ratingVal){ 
                                        
                                        if(isset($userRating ) && $userRating == $ratingVal ){?>
                                         <option selected="selected"><?php echo $ratingVal;?></option>
                                       	<?php } else{ ?>
                                        <option><?php echo $ratingVal;?></option> 
                                        <?php }  ?>
                                        <?php }  ?>
                                        </select>
                                    </td>
                                </tr>   
                                <tr>
                                	<td class="labelcell">
                                    	Feedback : <br>
                                     
                                    	<textarea class="defaultTextArea3" name="userFeedback" id="userFeedback" cols="50" rows="10">
                                        <?php if(isset($userFeedback)){echo htmlentities($userFeedback) ;} ?>
                                        </textarea><br> 
                                        
                                        <input type="submit" value="Save Feedback" name="saveFeedbackSubmit" id="saveFeedbackSubmit" class="submit"/>
                                    </td>
                                </tr>  
                                <tr>
                                	<td class="labelcell">
                                    <div id="addFeedbackResponse"><?php if(isset($addFeedbackResponse)){echo $addFeedbackResponse ;}?></div>	
                                    </td>
                                </tr>                   
                            </table>                    
                        </form>                
                 	</center></div>     
				<?php }  ?>             
                </div> 
                 

			</td>
		</tr> 
        
	</table>

	</body> 
</html>


<?php require("includes/mysql_database_connection_close.php"); ?> 