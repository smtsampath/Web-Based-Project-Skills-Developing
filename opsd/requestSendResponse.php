<?php require_once("commonHeaderIncludes.html"); ?>  
<?php require_once("jQueryHeaderIncludes.html"); ?>   
  
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/mysql_database_connection.php"); ?>  

<?php require_once("includes/util_class.php"); ?>
<?php require_once("includes/project_request_class.php"); ?>    
<?php require_once("includes/profile_class.php"); ?>  
<?php require_once("includes/project_class.php"); ?> 

<?php
$utilObj->redirectToHTTPS();
if($utilObj->isUserLoggedIn()){ 
 
 	if(isset($_GET['projectIdToSendRequest'])){
		$projectId = $utilObj->decodeString($_GET['projectIdToSendRequest']);
		$username = $_SESSION['username'];
		
	 	$sendRequestResponse =   $projectRequestObj->sendResquest($username,$projectId);
		
	}else{
		$utilObj->redirect_to("home");
	}
}else{
	$utilObj->redirect_to("home");
}

?>

<script type="text/javascript">
 

	$(function() {
		$( "#viewPanel" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
		}); 
	});
</script>
<html> 
	<title>My Project Skills | Request Sent</title> 
    <body class='body'>

	<table width="100%" class="formFontOnly" >
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
			<td width="100%" >
				<div id="viewPanel"  class="tabPanel1">
                
                <div id="styledLabel">
                	<?php echo $sendRequestResponse;?>
                    <a href="projects-<?php echo $utilObj->encodeString($projectId); ?>" >Go back to view the project</a>
                </div><br>
                
                </div>
			</td>
		</tr>
	</table>

	</body> 
</html>