<?php require_once("commonHeaderIncludes.html"); ?>  
<?php require_once("jQueryHeaderIncludes.html"); ?>    
<?php require_once("JQueryCookieHeaderIncludes.html"); ?>   
<?php require_once("jQueryPaginateTableHeaderIncludes.html"); ?>   
 
<?php require_once("includes/session.php"); ?>   
<?php require_once("includes/mysql_database_connection.php"); ?>  
<?php require_once("includes/constant_Vairables.php"); ?>  

<?php require_once("includes/project_class.php"); ?>  
<?php require_once("includes/profile_class.php"); ?>  
<?php require_once("includes/util_class.php"); ?> 
  
<?php 
$utilObj->redirectToHTTPS();
if(!$utilObj->isUserLoggedIn()){ 
	require_once("formPopupSignInAction.php"); 	
} 

?> 

<?php

?>

<script>
	$(function() {
		$( "#searchPanel" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
		}); 
	});
</script>

<html> 
	<title>My Project Skills | Search</title> 
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
				<div id="searchPanel"  class="tabPanel1">
                 	<ul>
                        <li><a href="#searchProjectsTab">Search Projects</a></li>
                        <li><a href="#searchUsersTab">Search Users</a></li>
                       <!-- <li><a href="#searchIssuesTab">Search Issues</a></li>
                        <li><a href="#searchSolutionsTab">Search Solutions</a></li> -->
                    </ul>
                 	<div id="searchProjectsTab"> 
                    	<?php require_once("formSearchProjects.php"); ?>  
                    </div>
                    <div id="searchUsersTab"> 
                    	 <?php require_once("formSearchUsers.php"); ?>  
                    </div>
                    <div id="searchIssuesTab"> 
                    	 <?php //require_once("formSearchIssues.php"); ?>  
                    </div>
                    <div id="searchSolutionsTab">  
                 
                 </div>
                  

			</td>
		</tr> 
        
	</table>

	</body> 
</html>


<?php require("includes/mysql_database_connection_close.php"); ?> 