<?php

include "../../includes/functions.php";
con();


header("Cache-Control: no-cache");
// Ideally, you'd put these in a text file. Put an entry 
// on each line of 'a.txt' and use $prefixes = file("a.txt");
// You can do the same with a separate file for $suffixes.
// This selects a random element of each array on the fly

// Example output: Tagging is the new Web


foreach($_POST as $key => $value)
{
	
	

//echo " Name: ".$name." Rate:".$rate." ID: ".$value."<br>";
	$runQuery = mysql_query("SELECT * FROM admin WHERE id = '$value'")or die (mysql_error());


if ($runQuery)
{
	$showD = mysql_fetch_array($runQuery);
	?>
    <div class="close"> <img src="../../images/close.png" width="42" height="42" id="cls" onclick="$.modal.close()" /></div>
    <div id="show_Staff_Details">
 <form id="update_admin">
 <table width="100%" border="0">
   <tr>
     <td>Username</td>
   </tr>
   <tr>
     <td><input type="text" name="sname" id="sname" value="<?=$showD['username']?>" class="inpElemts" />
       <input type="hidden" name="sid" id="sid" value="<?=$showD['id']?>" /></td>
   </tr>
   <tr>
     <td>Password</td>
   </tr>
   <tr>
     <td><input type="text" name="oname" id="oname"  class="inpElemts"  value="<?=$showD['password']?>" /></td>
   </tr>
   
   
   <tr>
     <td>Accesss </td>
   </tr>
   <tr>
     <td><?php 
	$d = $showD['access'];
$sql = mysql_query("SELECT DISTINCT access FROM admin where access !='$d' ") or die(mysql_error());
	
	
		
	?>
       <select name="access" id="selfromlist"  class="inpElemts" >
        <option value="<?=$d?>" selected="selected"><?=$d?></option> 
               <?php
	while(	$res = mysql_fetch_array($sql))
	{
	?>
      <option value="<?=$res['access']?>"><?=ucwords($res['access'])?></option>
     <?php } ?>
     
    </select>

      
    
       </td>
   </tr>
   
   <tr>
     <td><input name="edit_this_admin" type="button" class="buttons" id="edit_this_admin" value="Save Changes" style="margin:0;" onclick="doAdminUpdate()"  /></td>
   </tr>
 </table>
</form>
<!--<div id="loading"></div>
 <div id="msg">
    
    
    
</div> -->
 </div>
    
    <?php
//echo "Room has been Deleted"; 
}

//echo "Edit Was Successfull"; 
else { echo "Failed Entry"; }


}



