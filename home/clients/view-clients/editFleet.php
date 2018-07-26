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
	$runQuery = mysql_query("SELECT * FROM clients WHERE id = '$value'")or die (mysql_error());


if ($runQuery)
{
	$showD = mysql_fetch_array($runQuery);
	?>
    <div class="close"> <img src="../../images/close.png" name="cls" width="42" height="42" id="cls" onclick="$.modal.close()" /></div>
    <div id="show_client_Details">
 <form id="update_Client">
   <table width="100%" border="0">
     <tr>
       <td><span class="lt">Name</span></td>
     </tr>
     <tr>
       <td><input type="text" name="name" id="name" class="inpElemts" value="<?=$showD['name']?>" />
        <input type="hidden" name="sid" id="hiddenField"  value="<?=$showD['id']?>"/></td>
     </tr>
     <tr>
       <td><span class="lt">Phone</span></td>
     </tr>
     <tr>
       <td><input type="text" name="phone" id="phone"  class="inpElemts" value="<?=$showD['phone']?>"  /></td>
     </tr>
     <tr>
       <td><span class="lt">Address</span></td>
     </tr>
     <tr>
       <td><textarea name="address" rows="10" class="text_area" id="address"> <?=$showD['address']?> </textarea></td>
     </tr>
     <tr>
       <td><span class="lt">Type</span></td>
     </tr>
     <tr>
       <td>
       <?php
	   if  ($showD['type'] == "Client")
	   {
	   ?>
         <label>
           <input type="radio" name="Type" value="Client" id="Type_0" checked="checked" />
           Client</label>
            <label>
           <input type="radio" name="Type" value="Contractor" id="Type_1" />
           Contractor</label>
           <?php } else { ?>
            <label>
           <input type="radio" name="Type" value="Client" id="Type_0"/>
           Client</label>
            <label>
           <input type="radio" name="Type" value="Contractor" id="Type_1" checked="checked"  />
           Contractor</label>
          <?php } ?>
</td>
     </tr>
     <tr>
       <td><span style="margin-left:110px; margin-top:10px;">
         <input name="update_this_client" type="button" class="buttons" id="update_this_client" value="Save" style="margin:0;" onclick="doClientUpdate()" />
       </span></td>
     </tr>
   </table>
 </form>
 
</div>
    
    <?php
//echo "Room has been Deleted"; 
}

//echo "Edit Was Successfull"; 
else { echo "Failed Entry"; }


}



