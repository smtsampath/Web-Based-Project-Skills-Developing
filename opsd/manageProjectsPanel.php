<script type="text/javascript">
	$(function() {
	//	$( "#manageProjectsAccordion" ).accordion();
	});
</script> 

<table class="accordianPanel1" > 
    <tr>
        <td  >
        	<div id="manageProjectsAccordion" >
            	<!--<h3><a href="#">Add Project Details</a></h3>-->
				<div> 
                	    <?php require_once("formAddProject.php"); ?>   
				</div> 
               <!-- <h3><a href="#">Upload Files</a></h3>-->
                <div>                      
                	  <?php  require_once("formAddProjectFiles.php"); ?>     
               	</div><br>
               <!-- <h3><a href="#">Edit Project Details</a></h3>-->
                <div>                      
                	  <?php require_once("formEditProjectDetails.php"); ?>     
               	</div>  
            </div>
             
        </td>
    </tr>  
</table>