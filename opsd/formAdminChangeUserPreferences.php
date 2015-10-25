<?php
 
$developerPreferenceResponse = "";
if($utilObj->isUserLoggedIn()){  
	//$currentPageUrl =  $utilObj->getCurrentPageURL();
	
	$userProfile =  $userRowToEdit ;
	$usernameToEditPreferences = $userProfile["username"];
	$previousPreferencesArray = $profileObj->getPreferencesArray($usernameToEditPreferences);
	
	if(count($previousPreferencesArray) > 0){
		
	}

	if(isset($_POST['savePreferencesSubmit'])){
		
		$newPreferencesArray = array();
		
		if( isset($_POST['devPreference'] )){
			$newPreferencesArray =$_POST['devPreference'] ;
		} 
			 
		if( count($newPreferencesArray) < 11){
			$developerPreferenceResponse = $profileObj->savePreferences($newPreferencesArray , $usernameToEditPreferences);  
		} else{
			$developerPreferenceResponse = "<font color=red>Maximum allow 10 preferences to select</font>" ;
		} 
 		
 		$previousPreferencesArray = $profileObj->getPreferencesArray($usernameToEditPreferences);
		//$utilObj->redirect_to($currentPageUrl);
	} 
}else{
	$utilObj->redirect_to("home");
}

?>

<script type="text/javascript">

$(document).ready(function(){   
						   
	$("#savePreferencesSubmit").button();
	$("#savePreferencesSubmit").css("border","1px solid #000000");

}); 

</script>

<form method="post" action="<?php echo $currentPage; ?>" id="form" >

	<table class="formFontOnly" width="53%">
    	<tr>
            <td class="headercell" colspan="2">Add Developer Preferences</td> 
        </tr>
         <tr>
            
        	<td class="labelcell" >
            	<input type="checkbox" name="devPreference[]"  value="PHP"  >PHP &nbsp; <br>
                <input type="checkbox" name="devPreference[]"  value="MySql">MySql &nbsp;<br>
                <input type="checkbox" name="devPreference[]"  value="Java">Java &nbsp;<br>
                <input type="checkbox" name="devPreference[]"  value="Ruby">Ruby &nbsp;<br>
            </td>
                     
			<td class="labelcell" >
           		<input type="checkbox" name="devPreference[]" value="J2EE">J2EE &nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="Python">Python &nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="Asp.net">Asp.net &nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="VB">VB &nbsp;<br>
            </td>
         <tr>        
			<td class="labelcell" >
           		<input type="checkbox" name="devPreference[]" value="C++">C++ &nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="C#">C# &nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="MQL">MQL &nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="DB Administration">DB Administration &nbsp;<br>
            </td>
                
			<td class="labelcell" >
           		<input type="checkbox" name="devPreference[]" value="Affiliate Marketing">Affiliate Marketing &nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="SEO">SEO &nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="Copy Writing">Copy Writing &nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="Article Writing">Article Writing &nbsp;<br>
            </td>
        </tr>
		<tr>        
			<td class="labelcell" >
           		<input type="checkbox" name="devPreference[]" value="Data Entry">Data Entry &nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="Graphic Designing">Graphic Designing &nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="HTML">HTML&nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="Joomla">Joomla&nbsp;<br>
            </td>
            <td class="labelcell" >
           		<input type="checkbox" name="devPreference[]" value="WordPress">WordPress &nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="Content Writing">Content Writing &nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="Link Building">Link Building&nbsp;<br>
                <input type="checkbox" name="devPreference[]" value="Logo Designing">Logo Designing&nbsp;<br>
            </td>
        </tr>
        <tr > 
            <td colspan="2"  ><input type="submit" value="Save Preferences"  name="savePreferencesSubmit" id="savePreferencesSubmit" class="submit"/> 
			</td>
        </tr> 
		<tr > 
            <td colspan="2" class="defaultResponseMsg1" ><div id="donationLinkResponseMsg"><?php if(isset($developerPreferenceResponse)){echo $developerPreferenceResponse ;}?></div></td>
        </tr> 
        <tr>
        	<td class="labelcell" colspan="2">
            <?php if(count($previousPreferencesArray ) > 0){ ?>
            <b><u>Current preferences List</u></b><br><br>
            
            <?php foreach($previousPreferencesArray as $preferenceVal){
				
					echo "$preferenceVal<br>"
				?>
            	
            		
            <?php } echo "<br>"?>
            <?php }else{ ?>
            
            <b>No preferences</b>
            
             <?php } ?>
            </td>
        </tr>
	</table>

</form>