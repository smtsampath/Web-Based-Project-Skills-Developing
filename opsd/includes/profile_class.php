<?php require_once("util_class.php"); ?>   
<?php require_once("mysql_database_connection.php"); ?>  
<?php

$profileObj = new profile();

//check if username already exists for ajax validation
if (isset($_GET['username'])) {
    $username = $_GET['username']; 
	 
	$query = "select * from profile WHERE username='{$username}' ";
	$result_set = mysql_query($query);  
	if($utilObj->isQuerySuccess($result_set)){
		if (mysql_num_rows($result_set) > 0) { 
			echo "<font color=red>Username is not available</font>"; 
		} else { 
			echo "<font color=green>Username is available</font>";  
		}	
	}     
}



//check if email already exists for ajax validation
if (isset($_GET['email'])) {
    $email = $_GET['email'];  
	$query = "select * from profile WHERE email='{$email}' ";
	$result_set = mysql_query($query); 
	if( $utilObj->isQuerySuccess($result_set)){
		if (mysql_num_rows($result_set) > 0) { 
			echo "<font color=red>Email already exisits</font>";
		} else { 
			echo "<font color=green>Email is availble</font>";
		}	
	}	 
}  
 
	
class profile{
	
	private $username;
	private $email;
	private $firstName;
	private $lastName;
	private $gender;
	private $dateOfBirth;
	private $addressLine1;
	private $addressLine2;
	private $city;
	private $country;
	private $website;
	private $password;
	private $profileImagePath;
	private $donationLink;
	private $contactNumber;
	private $userType;
	private $userPreferences;
	private $status;
	private $lastModifiedDate;
	private $createdDate; 
	 
	
	private $utilObj;
	
	
	public function login($username ,$password ,$rememberMe){
		$this->utilObj = new util();
		if($this->utilObj->hasNotSensitiveCharacters($username)){
			if($this->utilObj->hasNotSensitiveCharacters($password)){
				
				$loginResponse = $this->isLoginDetailsAreValid($username , $password); 
				
				if($loginResponse == 1){
					if($rememberMe){
						$expire= time()+60*60*24*30;
						setcookie("username" , $username , $expire);
						setcookie("password" , $password , $expire);
					}
					$_SESSION['username'] = $username ;
					if(isset($_SESSION['isFirstTimeSignIn'])){
						unset($_SESSION['isFirstTimeSignIn']);	
					}
					$this->utilObj->redirect_to("userHome");
				}else if($loginResponse == "disabled"){					 
					return "<font color='red'>User has been disabled. Contact admin</font>";					
				}else{					 
					return "<font color='red'>Invalid sign in details</font>";					
				}
			}else{
				return "<font color='red'>Password has Invalid characters</font>";
			}
		}else{
			return "<font color='red'>Username has Invalid characters</font>";
		}
		
	}
	
	public function isLoginDetailsAreValid($username , $password){
		$this->username = $username ;
		$this->password = $password ; 
		$checkLoginDetailsQuery = "select * from profile WHERE username='{$this->username}' AND password='{$this->password}' ";	
		$result_set = mysql_query($checkLoginDetailsQuery);
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){
			if (mysql_num_rows($result_set) > 0) { 
				$dataRow = mysql_fetch_array($result_set);
				if($dataRow["status"] ==  "Active"){
					return true;
				}else{
					return "disabled";
				}				
			} else {  
				return false;
			}	
		}	 
	}
	
	private function isProfileExistsByUsername($username) {
		$query = "select * from profile WHERE username='{$username}' ";
		$result_set = mysql_query($query);
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){
			if (mysql_num_rows($result_set) > 0) { 
				return true;
			} else { 
				return false;
			}	
		}    
	}
	
	private function isProfileExistsByEmail($email) {
		$query = "select * from profile WHERE email='{$email}' ";
		$result_set = mysql_query($query);
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){
			if (mysql_num_rows($result_set) > 0) { 
				return true;
			} else { 
				return false;
			}	
		}	
	}
	
	function addProfile($username, $email, $firstName, $lastName, $addressLine1, $addressLine2, $city, $contactNumber, $website, $password, $userType, $dob, $gender, $country ){ 
		$this->utilObj = new util();
		if($this->utilObj->hasNotSensitiveCharacters($username)){
			if( $this->utilObj->hasNotSensitiveCharacters($email)){
				if( $this->utilObj->hasNotSensitiveCharacters($firstName)){
					if( $this->utilObj->hasNotSensitiveCharacters($lastName)){
						if( $this->utilObj->hasNotSensitiveCharacters($addressLine1)){
							if( $this->utilObj->hasNotSensitiveCharacters($addressLine2)){
								if( $this->utilObj->hasNotSensitiveCharacters($city)){
									if( $this->utilObj->hasNotSensitiveCharacters($contactNumber)){
										if( $this->utilObj->hasNotSensitiveCharacters($website)){
											if( $this->utilObj->hasNotSensitiveCharacters($password)){
												if(! $this->isProfileExistsByUsername($username)){
													if(! $this->isProfileExistsByEmail($email)){
														
														$this->username = $username;
														$this->email = $email;
														$this->firstName = $firstName;
														$this->lastName = $lastName;
														$this->gender = $gender;
														$this->dateOfBirth = $dob;
														$this->addressLine1 = $addressLine1;
														$this->addressLine2 = $addressLine2;
														$this->city = $city;
														$this->country = $country;
														$this->website = $website;  
														$this->contactNumber = $contactNumber;
														$this->userType = $userType;  
														
														$this->lastModifiedDate = date("Y-m-d",time());
														$this->createdDate = date("Y-m-d",time());
														$this->status = "Active";
														
														if(!$this->isAdminExists()){
															 $this->userType = "Admin" ;
														} 
														
														$this->password = $this->utilObj->encodeString($password); 
															
														$this->profileImagePath = "images/defaultAvatar.gif"; 	
															
														$queryProfileTableInsert = "INSERT INTO profile (username, email,first_name,last_name,gender,date_of_birth,address_line_1,address_line_2,city,country,website,contact_number,user_type,status,last_modified_date,created_date,password,profile_image_path) VALUES ('$this->username', '$this->email', '$this->firstName', '$this->lastName', '$this->gender', '$this->dateOfBirth', '$this->addressLine1', '$this->addressLine2', '$this->city', '$this->country', '$this->website', '$this->contactNumber', '$this->userType', '$this->status', '$this->lastModifiedDate', '$this->createdDate','$this->password','$this->profileImagePath')"; 	
 														
														if($this->utilObj->isNonFetchQuerySuccess($queryProfileTableInsert)){ 
															if($this->userType == "Site Operator"){
																return "<font color='green'>Site operator has been successfully added</font>";
															}else{
																$_SESSION['isFirstTimeSignIn']  = true; 
																$this->utilObj->redirect_to("firstSignIn"); 
															}
															 
														}  

													}else{
														return "<font color='red'>Email is already exists</font>";
														
													}
												}else{
													return "<font color='red'>Username is already exists</font>";
												}
												 
											}else{
												return "<font color='red'>Password has Invalid characters</font>";
											}
										}else{
											return "<font color='red'>Website url has Invalid characters</font>";
										}
									}else{
										return "<font color='red'>Contact number has Invalid characters</font>";
									}
								}else{
									return "<font color='red'>City has Invalid characters</font>";
								}
							}else{
								return "<font color='red'>Addresss line 2 has Invalid characters</font>";
							}
						}else{
							return "<font color='red'>Addresss line 1 has Invalid characters</font>";
						}
					}else{
						return "<font color='red'>Last name has Invalid characters</font>";
					}
				}else{
					return "<font color='red'>First name has Invalid characters</font>";
				}
			}else{
				return "<font color='red'>Email has Invalid characters</font>";
			}
		}else{
			return "<font color='red'>Username has Invalid characters</font>";
		}
		 
	}
	
	public function editProfile( $firstName,$lastName,  $dob, $gender,$address1, $address2, $city,  $country , $contactNumber, $website,$userType,$userStatus){
		$this->utilObj = new util();	
		
				if( $this->utilObj->hasNotSensitiveCharacters($firstName)){
					if( $this->utilObj->hasNotSensitiveCharacters($lastName)){
						if( $this->utilObj->hasNotSensitiveCharacters($address1)){
							if( $this->utilObj->hasNotSensitiveCharacters($address2)){
								if( $this->utilObj->hasNotSensitiveCharacters($city)){
									if( $this->utilObj->hasNotSensitiveCharacters($contactNumber)){
										if( $this->utilObj->hasNotSensitiveCharacters($website)){
											
											$this->firstName = $firstName;
											$this->lastName = $lastName;
											$this->gender = $gender;
											$this->dateOfBirth = $dob;
											$this->addressLine1 = $address1;
											$this->addressLine2 = $address2;
											$this->city = $city;
											$this->country = $country;
											$this->website = $website;  
											$this->contactNumber = $contactNumber; 
														
											$this->lastModifiedDate = date("Y-m-d",time());  
										 
											$lastModifiedDate = date("Y-m-d",time());
											
											if(isset($_GET['userIdToEdit'])){
												$profileId = $this->utilObj->decodeString($_GET['userIdToEdit']);
												$this->userType = $userType; 
												$this->status = $userStatus;  
												$updateProfileQuery = "UPDATE profile SET first_name = '{$this->firstName}' ,last_name = '{$this->lastName}' ,date_of_birth = '{$this->dateOfBirth}' ,gender = '{$this->gender}',address_line_1 = '{$this->addressLine1}',city = '{$this->city}' ,country = '{$this->country}', last_modified_date = '{$this->lastModifiedDate}' , address_line_2 = '{$this->addressLine2}', contact_number = '{$this->contactNumber}', website = '{$this->website}', user_type = '{$this->userType}' , status = '{$this->status}' WHERE profile_id = '{$profileId}'";	
											}else{
												$username = $_SESSION['username'];
												$updateProfileQuery = "UPDATE profile SET first_name = '{$this->firstName}' ,last_name = '{$this->lastName}' ,date_of_birth = '{$this->dateOfBirth}' ,gender = '{$this->gender}',address_line_1 = '{$this->addressLine1}',city = '{$this->city}' ,country = '{$this->country}', last_modified_date = '{$this->lastModifiedDate}' , address_line_2 = '{$this->addressLine2}', contact_number = '{$this->contactNumber}', website = '{$this->website}' WHERE username = '{$username}'";	
											}
											
											 
											if($this->utilObj->isNonFetchQuerySuccess($updateProfileQuery)){
												 
												return "<font color='green'>Successfully updated</font>";
											} 
										}else{
											return "<font color='red'>Website url has Invalid characters</font>";

										}
									}else{
										return "<font color='red'>Contact number has Invalid characters</font>";
									}
								}else{
									return "<font color='red'>City has Invalid characters</font>";
								}
							}else{
								return "<font color='red'>Addresss line 2 has Invalid characters</font>";
							}
						}else{
							return "<font color='red'>Addresss line 1 has Invalid characters</font>";
						}
					}else{
						return "<font color='red'>Last name has Invalid characters</font>";
					}
				}else{
					return "<font color='red'>First name has Invalid characters</font>";
				} 
		
	}
	
	public 	function changePW($username,$currentPW,$newPW){
		$this->utilObj = new util();	
		$proifileRow = $this->getProfilebyUsername($username);
		$currentPWInDB = $proifileRow["password"]; 
		if($currentPW == $currentPWInDB){
			$changePWQuery = "UPDATE profile SET password = '{$newPW}' WHERE username = '{$username}'";
			$this->utilObj->isNonFetchQuerySuccess($changePWQuery);
			return "<font color='green'>Password successfully updated</font>";
		}else{
			return "<font color='red'>Current password is invalid</font>";
		}
		
	}
	
	public function setProfileImagePath($imagepath,$username) {
		$this->utilObj = new util();	
		$profileImagePathUpdateQuery =  "UPDATE profile SET profile_image_path = '{$imagepath}' WHERE username = '{$username}'";
		if($this->utilObj->isNonFetchQuerySuccess($profileImagePathUpdateQuery)){
			return "<font color=green>Profile image successfully saved</font>";	
		}else{
			return "";	
		}  
	}
	
	private function isAdminExists(){ 
		$adminUserType = "Admin";
		$query = "select * from profile WHERE user_type ='{$adminUserType}'";
		$result_set = mysql_query($query);
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){
			if (mysql_num_rows($result_set) == 1) {  
				return true;
			} else { 
				return false;
			}	
		}		 
	}
	
	public function getProfilebyUsername($username) {
		$query = "select * from profile  WHERE username='{$username}'";
		$result_set = mysql_query($query);
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){
			if (mysql_num_rows($result_set) == 1) { 
				$profileRow = mysql_fetch_array($result_set);
				return $profileRow;
			} else { 
				return null;
			}	
		}	
	}
	
	public function getProfilebyEmail($email) {
		$query = "select * from profile  WHERE email='{$email}'";
		$result_set = mysql_query($query);
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){
			if (mysql_num_rows($result_set) == 1) { 
				$profileRow = mysql_fetch_array($result_set);
				return $profileRow;
			} else { 
				return null;
			}	
		}	
	}
	
	public function getProfilebyId($profileId) {
		$query = "select * from profile  WHERE profile_id ='{$profileId}'";
		$result_set = mysql_query($query);
		$this->utilObj = new util();
		if($this->utilObj->isQuerySuccess($result_set)){
			if (mysql_num_rows($result_set) == 1) { 
				$profileRow = mysql_fetch_array($result_set);
				return $profileRow;
			} else { 
				return null;
			}	
		}	
	}
	
	public function addDonationLink($donationLink,$username){ 
		
		
		$this->donationLink = $donationLink;	
		 
		
		$query =  "UPDATE profile SET donation_link = '{$this->donationLink}'  WHERE username = '{$username}'";
		$this->utilObj = new util();
		$this->utilObj->isNonFetchQuerySuccess($query); 
		
		return "<font color=green>Donation link successfully saved</font>";
		
	}
	
	public function  savePreferences($newPreferencesArray , $username ){
		$userPreferencesCombination ="" ;
		foreach($newPreferencesArray  as $preference){
			$userPreferencesCombination = $userPreferencesCombination.",".$preference ;
		} 
		
		$userPreferencesCombination  = substr($userPreferencesCombination ,1) ; 
		
		$this->userPreferences = $userPreferencesCombination;
		
		$query =  "UPDATE profile SET user_preferences = '{$this->userPreferences}'  WHERE username = '{$username}'";
		$this->utilObj = new util();
		$this->utilObj->isNonFetchQuerySuccess($query); 
		
		return "<font color=green>Preferences successfully updated</font>"; 
	
	} 
	
	public function getPreferencesArray($username){
		
		$devPreferencesArray = array();
		 
		$query = "select * from profile WHERE username='{$username}' ";
		$result_set = mysql_query($query);
		$this->utilObj = new util();
			
		if($this->utilObj->isQuerySuccess($result_set)){ 
			if (mysql_num_rows($result_set)>0) { 
				$dataRow = mysql_fetch_array($result_set);
				$devPreferencesCombination =  $dataRow['user_preferences']; 
				$devPreferencesArray = explode(",",$devPreferencesCombination);	  
			}	 
		} 
		return $devPreferencesArray; 
	} 
	
	// search user
	public function searchUsers($searchKeyWord , $searchCategory){
		$searchUsersResults = array();
		
		if($searchCategory == "Search All" ){
			$searchUsersResults  = $this->allSearchUsers($searchKeyWord);
		}else{
			$searchUsersResults = $this->singleSearchUsers($searchKeyWord  , $searchCategory);
		}
		
		return $searchUsersResults ;
	
	
	}

	private function allSearchUsers($searchKeyWord){
		$allUserIdArray = array();
		
		$tableArray = array("profile","profile","profile","profile","profile","profile","profile","profile" ); 
		$columnArray = array("username","email","user_type","first_name","last_name","city","country","user_preferences"); 
			
		$counter = 0;
		foreach($tableArray as $tableVal){ 
			$internalArray = $this->getUserRecordsIfExsists($tableVal ,$columnArray[$counter] ,$searchKeyWord) ; 
			$allUserIdArray = array_merge($allUserIdArray,$internalArray);
			
			$counter++;
		}
		 
		
		$allUniqueUserIdArray = array_unique($allUserIdArray);
		
		$allUserRecordsArray = $this->getSearchUserResultsArrayByUserIdArray($allUniqueUserIdArray);  
		
		return $allUserRecordsArray;
		
	}

	private function singleSearchUsers($searchKeyWord  , $searchCategory){
		$allUserIdArray = array();
		
		$tableArray = array("profile","profile","profile","profile","profile","profile","profile","profile" ); 
		$columnArray = array("username","email","user_type","first_name","last_name","city","country","user_preferences"); 
		
		$categoryArray = array("Username","Email","Uset Type","First Name","Last Name","City","Country" ,"User preferences"); 
		
		$counter = 0;
		foreach($tableArray as $tableVal){  
			if($categoryArray[$counter] == $searchCategory ){
				$allUserIdArray  = $this->getUserRecordsIfExsists($tableVal ,$columnArray[$counter] ,$searchKeyWord) ;  
			} 
			$counter++;
		}
		
		$allUniqueUserIdArray = array_unique($allUserIdArray);
		
		$allUserRecordsArray = $this->getSearchUserResultsArrayByUserIdArray($allUniqueUserIdArray);
		
		return $allUserRecordsArray;
	}
	
	private function getSearchUserResultsArrayByUserIdArray($userIdArray){
		$usrResultsArray = array(); 
		$counter = 0;
		$this->utilObj = new util(); 
		foreach($userIdArray as $profileId){
			 
			$query = "select * from profile WHERE profile_id ='{$profileId}'";
			$result_set = mysql_query($query);
			if($this->utilObj ->isQuerySuccess($result_set)){
				if (mysql_num_rows($result_set) == 1) { 
					$profileSubRow = mysql_fetch_array($result_set);
					$usrResultsArray[$counter] = $profileSubRow;
				}  	
			}
			 
			 $counter = $counter +1;
		}
		 
		return $usrResultsArray ;
	}


	private function getUserRecordsIfExsists($tableName ,$checkColumnName ,$searchKeyWordVal){
			$recordsArray = array();
			$query = "select profile_id,LOCATE('{$searchKeyWordVal}',".$checkColumnName.") from ".$tableName." WHERE LOCATE('{$searchKeyWordVal}',".$checkColumnName.") !=0   ORDER BY created_date  DESC LIMIT 200 ";
			//$query = "select * from ".$tableName." WHERE  upper(".$checkColumnName.") = upper('{$searchKeyWordVal}')";
			
			 
			$result_set = mysql_query($query);
			$counter = 0;
			$this->utilObj = new util(); 
			if($this->utilObj->isQuerySuccess($result_set)){
				if (mysql_num_rows($result_set) > 0) { 
					while($row = mysql_fetch_array($result_set)){ 
						$recordsArray[$counter] =  $row['profile_id']; 
						$counter++;
					} 
				}  
			} 
			return $recordsArray;
	} 
	
	
	public function getAdminRow(){ 
		
		$adminRow = array();
		 
		$query = "select * from profile WHERE user_type='Admin' ";
		$result_set = mysql_query($query);
		$this->utilObj = new util();
			
		if($this->utilObj->isQuerySuccess($result_set)){ 
			if (mysql_num_rows($result_set)>0) { 
				$adminRow = mysql_fetch_array($result_set);
				
			}	 
		} 
		return $adminRow;
		
		
	}
}


?>