<?php

if(!$utilObj->isUserLoggedIn()){  
	 $utilObj->redirect_to("home"); 
} 

?>


	<script>
	$(function() {
		$( "#feedbacksTabs" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
		});


	});
	</script>

<html>    
	<table width="100%" > 
        <tr>
			<td width="100%"  >
				<div id="feedbacksTabs"   class="tabPanel1">
                 	<ul>
                        <li><a href="#viewOwnFeedbacks" class="tabPanelTitle"> View Own Feedbacks </a></li>
                        <li><a href="#viewOwnSubmiitedFeedbacks" class="tabPanelTitle"> View Own Submitted Feedbacks </a></li> 
                    </ul>
                 	<div id="viewOwnFeedbacks"> 
                    	<?php  require_once("viewOwnFeedbacks.php"); ?>  
                    </div>
                    <div id="viewOwnSubmiitedFeedbacks"> 
                    	<?php require_once("viewOwnSubmittedFeedbacks.php"); ?>  
                    </div>  
                 </div>  
			</td>
		</tr>  
	</table>

	</body> 
</html>
 