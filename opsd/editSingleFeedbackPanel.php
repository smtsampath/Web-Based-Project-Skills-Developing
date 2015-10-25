<?php require_once("commonHeaderIncludes.html"); ?>  
<?php require_once("jQueryHeaderIncludes.html"); ?>   
<?php require_once("jQueryFileInputsHeaderIncludes.html"); ?>  
<?php require_once("JQueryCookieHeaderIncludes.html"); ?>  
<?php require_once("jQueryMultipleFileUploadHeaderIncludes.html"); ?>  
<?php require_once("jQueryPaginateTableHeaderIncludes.html"); ?>  
 
<?php require_once("includes/session.php"); ?>    
<?php require_once("includes/constant_Vairables.php"); ?> 
<?php require_once("includes/country_list.php"); ?>  

<?php require_once("includes/user_feedback_class.php"); ?>  
<?php require_once("includes/util_class.php"); ?> 
<?php require_once("includes/profile_class.php"); ?>  

<?php
$utilObj->redirectToHTTPS();
if($utilObj->isUserLoggedIn()){  
		 
	$currentPage = $utilObj->getCurrentPageURL() ;
	 
	if(isset($_GET['feedbackIdToEdit'])){
		
		$feedbackId =  $utilObj->decodeString($_GET['feedbackIdToEdit']); 
		  
		$feedbackRow = $userFeedbackObj->getFeedbackFromFeedbackID($feedbackId); 
		
		$ownerProfileid = $feedbackRow["profile_id"];
		
		$ownerProfileRow =   $profileObj->getProfilebyId($ownerProfileid) ;
		$ownerUsername = $ownerProfileRow["username"];
		
		if($ownerUsername != $_SESSION["username"]){
			if(count($feedbackRow) > 0){
				$profileId = $feedbackRow["profile_id"];
				$writerProfileId = $feedbackRow["writer_profile_id"];
				$userRating = $feedbackRow['rating'];
				$userFeedback = $feedbackRow['review']; 
				
				if(isset($_POST['saveFeedbackSubmit'])){
					$rating = $_POST['userRating'];
					$feedback = $_POST['userFeedback']; 
						
					$addFeedbackResponse = $userFeedbackObj->saveFeedback($profileId , $writerProfileId, $feedback , $rating);  
					$utilObj->redirect_to("feedback-".$_GET['feedbackIdToEdit']);
				}
			}else{
				$utilObj->redirect_to("home"); 
			} 
		}else{
			$utilObj->redirect_to("home"); 
		}  
	}else{
		$utilObj->redirect_to("home"); 
	} 
}else{
	$utilObj->redirect_to("home"); 
}

?>

<script type="text/javascript" src="js/forms/formAddUserRating.js"></script> 
	<script>
	$(function() {
		$( "#editSingleFeedbackTab" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
		});


	});
	</script>

<html> 
	<title>My Project Skills | Edit Feedback</title> 
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
				<div id="editSingleFeedbackTab"  class="tabPanel1">
                 	 
                 	   
                    <div > 
                       <center> <br><br><form method="post" action="<?php echo $currentPage ;?>" id="form" >
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
				         
                 
                 </div>
                  

			</td>
		</tr> 
        
	</table>

	</body> 
</html>