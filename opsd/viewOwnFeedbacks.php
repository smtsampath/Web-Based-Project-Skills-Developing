 
<?php 

if($utilObj->isUserLoggedIn()){
	   
	$username = $_SESSION['username'];
	$profileTableRow =   $profileObj->getProfilebyUsername($username) ;
	$profileId = $profileTableRow["profile_id"];
	
	if($profileTableRow !=""){  
	
		$profileImagePath =$profileTableRow["profile_image_path"];
		  
		$userFeedbacksArray = $userFeedbackObj->getUserFeedbackArray($profileId);	  
		
		if(count($userFeedbacksArray)>0){ 
			$allRatingVal =  $userFeedbackObj->getOverallRatings($profileId);
			$allRatingesponse = "Your rating is - ".$allRatingVal."/5" ;
		}else{
			$allRatingesponse = "No feedbacks from users at the moment" ;
		}
		
		
	}else{
		$utilObj->redirect_to("home");
	}
 
}else{  
	$utilObj->redirect_to("home");
}
	 

?> 

<script type="text/javascript">


$(document).ready(function(){  
	$('#viewOwnFeedbacks').paginateTable({ rowsPerPage: 10 });	 
});

</script>


 
	<table width="100%" >
 
        <tr>
			<td width="100%"  >
            	
				<div id="viewPanel"  class="tabPanel1"> 
                 
                <div id="styledLabel">
                	<a href="users-<?php echo $utilObj->encodeString($profileId); ?>" target="_blank"><?php echo $allRatingesponse ;?></a>
                </div><br><br>
                 
                
                 
                 <table id="viewOwnFeedbacks" width="100%" class="feedbackTable">
                 	<tbody>
                    <?php if(count($userFeedbacksArray) > 0){ ?> 
                <?php foreach($userFeedbacksArray as $userFeedbackVal ){ 
				
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
                            <?php echo  $reviewVal ?><br> 
                        	
                        
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
                         
                </div> 
                 

			</td>
		</tr> 
        
	</table> 
 