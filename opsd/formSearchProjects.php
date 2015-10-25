 
<?php 

//search projects 
$searchProjectsResponse  = "";
if(isset($_POST['searchProjectsSubmit']) ){
	$searchProjectsKeyword = $_POST['searchProjectsKeyword']; 
	$searchProjectsCategory = $_POST['searchProjectCategory']; 
	
	if( $utilObj->hasNotSensitiveCharacters($searchProjectsKeyword)){
		if(trim($searchProjectsKeyword) !=""){
			$searchProjectsResults = $projectObj->searchProjects($searchProjectsKeyword,$searchProjectsCategory ); 
			$resultCount = count($searchProjectsResults); 
			if(!$resultCount > 0){
				$searchProjectsResponse = "<font color=red>No results found</font>";
			} else if($resultCount == 1){
				$searchProjectsResponse = "<font color=black>1 result found</font>";  	
			}else{
				$searchProjectsResponse = "<font color=black>".$resultCount." results found</font>";  	
			}
		}else{
			$searchProjectsResponse = "<font color=red>Enter keywords to search</font>";
		}
		
	}else{
		$searchProjectsResponse = "<font color=red>Invalid characters found.Try different searching keywords</font>";
	}
	
}else{
	$searchProjectsKeyword = "" ;
	$searchProjectsCategory = "";		
}

 
?>

<script type="text/javascript" src="js/forms/formSearchProjects.js"> </script>

<center > 
	<div style="padding-top:2%;" >
    <form method="post" action="search" id="form" >
	Search&nbsp;&nbsp;<input type='text' size="40"  name="searchProjectsKeyword" id="searchProjectsKeyword"  class="searchTerm" value="<?php if(isset($searchProjectsKeyword)){echo  htmlentities($searchProjectsKeyword);} ?>"  />&nbsp; By&nbsp;
	 
     <select class="searchCategories"  name="searchProjectCategory" id="searchProjectCategory"  selected="<?php   if(isset($searchProjectCategory)){echo  htmlentities($searchProjectCategory);}?>">
            		<?php foreach ($SEARCH_PROJECTS_CATEGORIES as $searchProjectCategoryVal){ 
							if(isset($searchProjectCategory) && trim($searchProjectCategory) == trim($searchProjectCategoryVal)){?>
						<option selected="selected"><?php echo $searchProjectCategoryVal; ?></option>
					<?php 	}else{?>
						<option ><?php echo $searchProjectCategoryVal; ?></option>
					<?php	}?>					
					<?php }?> 
                                 
	</select>&nbsp;
    
    <input type="submit" value="Search Projects" name="searchProjectsSubmit" id="searchProjectsSubmit" class="searchSubmit"/><br>
    <div class="searchResponse" id="searchResponse"><?php if(isset($searchProjectsResponse)){echo $searchProjectsResponse ;}?></div>
    </form>
    </div> <br>

    <div>
    <?php if(isset($searchProjectsResults)){ 
				if(count($searchProjectsResults) > 0){?>
		<table id="projectSearchResultsTable" width="100%" class="searchResultsTable">	
			<tbody>
    	<?php  
					foreach($searchProjectsResults as $searchProjectResultVal){
						$projectId = $searchProjectResultVal["project_id"]; 
						$projectId = $utilObj->encodeString($projectId);
						 
						$projectTitle = $searchProjectResultVal["title"]; 
						
						$projectType = $searchProjectResultVal["category"];
						
						$addedDate = $searchProjectResultVal["created_date"];
						$addedDateArray = explode(" ",$addedDate); 
                		$addedDate = $addedDateArray[0];
						
						$projectStatus = $searchProjectResultVal["status"];
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
                      		<td class="searchResultRow"  >
                            	<div style="padding-bottom:0.5%"><a href="projects-<?php echo $projectId; ?>" target="_blank"><b><font color="#000000"><?php echo $projectTitle; ?></font></b></a> </div> 
                            	<div><b>Type : </b><?php echo $projectType ; ?> &nbsp;&nbsp;&nbsp; <b>Added Date : </b><?php echo $addedDate ;?> &nbsp;&nbsp;&nbsp; <b>Status : <?php echo $projectStatus;  ?></b><br></div>
                        	</td>
                      	</tr> 
                        
    	<?php 		}
			
		?>
        
        	</tbody>
		</table>  
         <div class="pagerLink"> 
                <div class='pager'>
                   <a href='#' alt='Previous' class='prevPage'  ><font color="#000000" style="text-decoration:underline">Previous</font></a>
                   <span class='currentPage'></span> of <span class='totalPages'></span>
                   <a href='#' alt='Next' class='nextPage'><font color="#000000" style="text-decoration:underline">Next</font></a>
                </div> 
		</div>  
         <?php
     		}
		}
     
     ?>
    </div> 
    
	

</center>