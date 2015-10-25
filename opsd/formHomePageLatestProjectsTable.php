 
<?php require_once("jQueryPaginateTableHeaderIncludes.html"); ?>  

<?php require_once("includes/project_class.php"); ?>   
 
<?php
 
$latestProjectsArray = $projectObj->getLatestProjectList();
//$latestProjectsArray = array();
 
?>

 

<script> 
    $(document).ready(function () {
        $('#latestProjectTable').paginateTable({ rowsPerPage: 4 });
    });
</script>

<div >
<table  id="projectsTablexx" width="100%">
	 
		<tr>
            <td colspan="2" class="headercell">Latest Projects</td> 
        </tr>
        
        <tr>
        	<td>
            	<table id="latestProjectTable" width="100%">	
                    <tbody>
                        <?php foreach ($latestProjectsArray as $projectRow) {
								$projectId = $projectRow["project_id"];
                                $projectTitle  = $projectRow["title"]; 
                                
                                $addedDate  = $projectRow["created_date"]; 
                                $addedDateArray = explode(" ",$addedDate); 
                                $addedDate = $addedDateArray[0];
                                  
                                $projectStatus  = $projectRow["status"];
                                
                                if($projectStatus ==  "Available"){
                                    $projectStatus = "<font color=green>".$projectStatus."</font>";
                                }else if($projectStatus ==  "Assigned"){
                                    $projectStatus = "<font color=orange>".$projectStatus."</font>";
                                }else if($projectStatus ==  "Cancelled"){
                                    $projectStatus = "<font color='red'>".$projectStatus."</font>";
                                }else if($projectStatus ==  "Completed"){
                                    $projectStatus = "<font color='blue'>".$projectStatus."</font>";
                                }
                            ?>
                            <tr>
                                <td class="labelcell2"  >
                                    <div><b><a href="projects-<?php echo $utilObj->encodeString($projectId); ?>" style="color:#000" target="_blank"><?php echo $projectTitle; ?></a></b><br></div>
                                    <div><b>Type : </b><?php echo $projectRow["category"] ; ?><br></div>
                                   <div> <b>Added Date : </b><?php echo $addedDate ;?><br></div>
                                    <div><b>Status :<?php echo $projectStatus;  ?></b><br></div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>  
                <div class="pagerLink"> 
                <div class='pager'>
                   <a href='#' alt='Previous' class='prevPage'  ><font color="#000000" style="text-decoration:underline">Previous</font></a>
                   <span class='currentPage'></span> of <span class='totalPages'></span>
                   <a href='#' alt='Next' class='nextPage'><font color="#000000" style="text-decoration:underline">Next</font></a>
                </div> 
                </div>    
            </td>  
        </tr>
        
</table>
</div>