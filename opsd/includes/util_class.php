<?php  require_once 'class.phpmailer.php'; ?>

<?php

$utilObj = new util();

class util{
 
	
	// common method that use for redirect user to another link according to the situation
	function redirect_to($location = NULL) {
		if ($location != NULL) {
			header("Location:{$location}");
			exit;
		}
	}
	

	//check if query is executed successfully
	function isQuerySuccess($result_set){  
		if(!$result_set){
			die("DB Query failed - ". mysql_error());
		}else{
			return true;	
		}
	}
	
	function isNonFetchQuerySuccess($query){
		if(!mysql_query($query)){
			die("DB Query failed - ". mysql_error());
		}else{
			return true;	
		}
	}

	
	//check if user is already logged in 
	function isUserLoggedIn() { 
		if(isset($_SESSION['username'])){ 
			return true;
		}else if(isset($_COOKIE['username']) || isset($_COOKIE['password'])){   
			$cookieUsername = $_COOKIE['username'];
			$cookiePassword = $_COOKIE['password']; 
			$profile = new profile();
			if($profile->isLoginDetailsAreValid($_COOKIE['username'],$_COOKIE['password'])){
				$_SESSION['username'] = $_COOKIE['username'];
				return true;
			}else{
				return false;
			} 
		}else{ 
			return false;
		} 
	} 
		
	//retrieve current page url
	function getCurrentPageURL() {
		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
			$pageURL .= "s";
		}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
	
	//get current page name
	function getCurrentPageName(){
		//return (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)	);
		
		
		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
			$pageURL .= "s";
		}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	} 
	
	//redirect to https if SSL has installed in the server
	function redirectToHTTPS(){
		if($_SERVER["SERVER_PORT"] == 443){ 
			$redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			header("Location:$redirect");
		}  
	}
	
	//check if given input has sensitive characters. This method is used for prevent SQL injection
	function hasNotSensitiveCharacters( $string ) {
		$result = false;
		if ( function_exists( "mysql_real_escape_string" ) ) { 
			$string2 = mysql_real_escape_string( $string ); 
			if(strcmp($string,$string2)==0){
				$result = true;			
			}else{
				$result = false;
			}
		} else {
			$string3 = addslashes( $string ); 
			if(strcmp($string,$string3)==0){
				$result = true;	
			}else{
				$result = false;
			}
		} 
		return $result; 
	} 
	
	//encrypt the string in 3 times - use for storing password
	function encodeString($str){
	  for($i=0; $i<3;$i++)  {
		$str=strrev(base64_encode($str));  
	  }
	  return $str;
	}
	
	//decrypt the string - use for retrieve password
	function decodeString($str){
	  for($i=0; $i<3;$i++)   {
		$str=base64_decode(strrev($str));  
	  }
	  return $str;
	}
	
	//send mail
	function sendMail($subject,$message,$toEmail ){
	 
	 	$profile = new profile();
		
		$adminRow = $profile->getAdminRow();
		
		$from = $adminRow["email"]; 
		$headers = "From: $from"; 
		
		$mail = new PHPMailer ();
		
		$mail -> From = $from;
		$mail -> FromName = "Admin at Project My Skills";
		$mail -> AddAddress ($toEmail);
		$mail -> Subject = $subject;
		$mail -> Body = $message;
		$mail -> IsHTML (true);
		
		$mail->IsSMTP();
		$mail->Host = 'ssl://smtp.gmail.com';
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->Username = $from;
		$mail->Password = 'opsd123456789123456789';
		
		if(!$mail->Send()) {
			return false;
		}
		else {
			return true ;
		}
		 
	}
	
	
}

 

?>