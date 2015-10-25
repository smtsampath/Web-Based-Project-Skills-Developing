<?php

$userFeedbackObj = new userFeedback();

class userFeedback{
	
	private $profile_id ;
	private $rating;
	private $review;
	private $writer_profile_id;
	private $last_modified_date ;
	private $created_date ;
	
	private $utilObj;
	private $profileObj;
	
	//view user ratings 
	public function saveFeedback($userProfileId , $writerProfileId, $feedback , $rating){
		
		$this->profile_id = $userProfileId;
		$this->rating = $rating;
		$this->review = $feedback;
		$this->writer_profile_id = $writerProfileId;
		$this->last_modified_date = date("Y-m-d",time());
		$this->created_date =  date("Y-m-d",time()); 
		
		$existingFeedback = $this->getFeedbackIfExists($writerProfileId ,$userProfileId );
		$this->utilObj = new util();
		$this->profileObj = new profile();
		
		$writerProfileRow= $this->profileObj->getProfilebyId($writerProfileId);
		$writerUsername = $writerProfileRow["username"];
				
		$feedbackOwnerProfileRow= $this->profileObj->getProfilebyId($userProfileId);
		$feedbackOwnerEmail = $feedbackOwnerProfileRow["email"];
				
		if( $this->utilObj->hasNotSensitiveCharacters($feedback)){
			if($existingFeedback == ""){
				$queryUserFeedbackSave  = "INSERT INTO user_feedback (profile_id, rating,review, writer_profile_id,last_modified_date,created_date ) VALUES ('$this->profile_id','$this->rating','$this->review','$this->writer_profile_id','$this->last_modified_date','$this->created_date' )"; 	
				
				// Notifying the user that new feedback has arrived.
				$subject = "New Feedback on You!";
				
				$message = "User ".$writerUsername." has been added a feedback on you. Log in to your user account and check feedbacks on you.<br><br>
				Rating : ".$rating." <br> 
				Review : <br>".$feedback." <br>"
				;
				  
			}else{
				
				$subject = "Feedback update notification";
				
				$message = "User ".$writerUsername." has been updated his/her feedback on you. Log in to your user account and check feedbacks on you.<br><br>
				Rating : ".$rating." <br> 
				Review : <br>".$feedback." <br>"
				;
				
				$queryUserFeedbackSave = "UPDATE user_feedback SET review = '{$this->review}' ,rating = '{$this->rating}' , last_modified_date = '{$this->last_modified_date}'  WHERE profile_id ='{$userProfileId}' AND  writer_profile_id ='{$writerProfileId}'";
														
			} 
			
			$this->utilObj->isNonFetchQuerySuccess($queryUserFeedbackSave) ;	
			
			$sendmailReponse = $this->utilObj->sendMail($subject,$message,$feedbackOwnerEmail);
			
			if($sendmailReponse){
				return "<font color=green>Feedback saved successfully</font>";
			}else{
				return "<font color=green>Feedback saved successfully and an error occured on notifying the user ".$feedbackOwnerProfileRow["username"]." regarding the added feedback.</font>";
			}
			
			
		}else{
			return "<font color=red>Feedback has invalid characters</font>";
		}
		
	
		
	}
	
	public function getOverallRatings($profileId){
		
		$feedbacksArray = $this->getUserFeedbackArray($profileId);
		$allRate = 0;
		
		if(count($feedbacksArray ) > 0){  
			foreach($feedbacksArray  as $feedback){
				$allRate = $allRate + $feedback["rating"]; 
			}
		}
		
		$allRate =  $allRate/count($feedbacksArray ) ;
		
		return $allRate;
	}

	public function getUserFeedbackArray($profileId){
		$userFeedbackArray = array();
		
		$query = "select * from user_feedback WHERE profile_id ='{$profileId}'  ORDER BY created_date  " ;	 
		$result_set = mysql_query($query);
		$counter =0;
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){ 
			if (mysql_num_rows($result_set)>0) {  
				while($dataRow = mysql_fetch_array($result_set)){
					$userFeedbackArray[$counter] = $dataRow ;
					$counter++;
				} 
			}  
		} 
		
		
		return $userFeedbackArray ;
	}

	public function getFeedbackIfExists($writerProfileId ,$userProfileId ){
		$this->utilObj = new util();
		$query = "select * from user_feedback WHERE profile_id ='{$userProfileId}' AND  writer_profile_id ='{$writerProfileId}' " ;	 
		$result_set = mysql_query($query);
		$counter =0;
		if($this->utilObj->isQuerySuccess($result_set)){ 
			if (mysql_num_rows($result_set)>0) {  
				 $dataRow = mysql_fetch_array($result_set);
				 return $dataRow;
			}  else{
				return "";	
			}
		} else{
			return "" ;	
		}		
	}
	
	
	public function getSubmittedFeedbacks($profileId){ 
		$userFeedbackArray = array(); 
		$query = "select * from user_feedback WHERE writer_profile_id ='{$profileId}'  ORDER BY created_date  " ;	 
		$result_set = mysql_query($query);
		$counter =0;
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){ 
			if (mysql_num_rows($result_set)>0) {  
				while($dataRow = mysql_fetch_array($result_set)){
					$userFeedbackArray[$counter] = $dataRow ;
					$counter++;
				} 
			}  
		}   
		return $userFeedbackArray ;
	}
	
	public function getFeedbackFromFeedbackID($feedbackId){
		
		$feedback = array();
		
		$query = "select * from user_feedback WHERE user_feedback_id ='{$feedbackId}' " ;	 
		$result_set = mysql_query($query);
		$counter =0;
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){ 
			if (mysql_num_rows($result_set)>0) {   
				$feedback= mysql_fetch_array($result_set) ;
			}  
		}   
		
		return $feedback;
	}
	
}

?>