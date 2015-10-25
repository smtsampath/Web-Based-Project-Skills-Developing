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
	$currentPage = $utilObj->getCurrentPageURL() ;
	 
	if(isset($_GET['feedbackIdToView'])){
		
		$feedbackId =  $utilObj->decodeString($_GET['feedbackIdToView']); 
		  
		$feedbackRow = $userFeedbackObj->getFeedbackFromFeedbackID($feedbackId); 
		
		if(count($feedbackRow) > 0 ){
			$profileId = $feedbackRow["profile_id"];
			$profileTableRow =   $profileObj->getProfilebyId($profileId) ;
			$profileUsernameToView = $profileTableRow["username"];  
			
			$writerProfileId = $feedbackRow["writer_profile_id"];
			$writerProfileTableRow =   $profileObj->getProfilebyId($writerProfileId) ;
			$writerUsernameToView = $writerProfileTableRow["username"];  
			
			$ratingVal = $feedbackRow['rating'];
			$reviewVal = $feedbackRow['review']; 
			
			$addedDate =  $feedbackRow["created_date"];
			$addedDateArray = explode(" ",$addedDate);
			$addedDate = $addedDateArray [0];
			
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
		$( "#viewSingleFeedbackTab" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
		});


	});
	</script>

<html> 
	<title>My Project Skills | View Feedback</title> 
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
			 
             <td  >
				<div id="viewSingleFeedbackTab"  class="tabPanel1">
                 	 
                    	<div class="searchResultRow"  >
                        	<br> From &nbsp;<a href="users-<?php echo $utilObj->encodeString($writerProfileId); ?>" target="_blank"><b><?php echo $writerUsernameToView ?></b></a>&nbsp; &nbsp; &nbsp; &nbsp;To &nbsp;<a href="users-<?php echo $utilObj->encodeString($profileId); ?>" target="_blank"><b><?php echo $profileUsernameToView ?></b></a>&nbsp; &nbsp; &nbsp; &nbsp; On  <b><?php echo $addedDate ?></b> &nbsp; &nbsp; &nbsp; &nbsp;
                            Ratings :  <b><?php echo  $ratingVal ?>/5 </b><br><br>
                            <?php echo  $reviewVal ?><br>  
                        </div>
                      
                          
                 </div>  
                 
          	</td>
                   
		</tr> 
        
	</table>

	</body> 
</html>