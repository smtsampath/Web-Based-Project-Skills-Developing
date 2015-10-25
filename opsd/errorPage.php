<?php require_once("commonHeaderIncludes.html"); ?>  
<?php require_once("jQueryHeaderIncludes.html"); ?>    
<?php require_once("JQueryCookieHeaderIncludes.html"); ?>   
<?php require_once("jQueryPaginateTableHeaderIncludes.html"); ?>     

<?php require_once("includes/session.php"); ?>
<?php require_once("includes/mysql_database_connection.php"); ?>  
<?php require_once("includes/constant_Vairables.php"); ?>  
 
<?php require_once("includes/util_class.php"); ?> 
<?php require_once("includes/profile_class.php"); ?>  
<?php 
$utilObj->redirectToHTTPS();
if(!$utilObj->isUserLoggedIn()){ 
	require_once("formPopupSignInAction.php"); 	
} 
?> 
 
<script>
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
	<title>My Project Skills | Error Loading</title> 
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
                
                <center><font class="errorLoading">Oooops! An error has been occured on webpage loading....</font><br>
                 <img src="images/error.jpg"/><br />
				<a href="home" id="buttonLink1" >Go Back to Home</a>
                 
                 </center>
            	</div>  
			</td>
		</tr>  
	</table> 
	</body> 
</html>


<?php require("includes/mysql_database_connection_close.php"); ?> 