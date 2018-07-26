<?php

include "../includes/functions.php";
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
	$runQuery = mysql_query("SELECT * FROM fleet WHERE id = '$value'")or die (mysql_error());


if ($runQuery)
{
	$showD = mysql_fetch_array($runQuery);
	?>
    <div class="close"> <img src="../images/close.png" width="42" height="42" id="cls" onclick="$.modal.close()" /></div>
    <form id="doUpdate">
 <table width="100%" border="0">
   <tr>
     <td>Make</td>
   </tr>
   <tr>
     <td><input name="sid" type="hidden" value="<?=$showD['id']?>" />
     <input type="text" name="make" id="make" class="inpElemts" value="<?=$showD['make']?>" /></td>
   </tr>
   <tr>
     <td><span class="lt">Reg No.</span></td>
   </tr>
   <tr>
     <td><input type="text" name="regno" id="regno"  class="inpElemts"  value="<?=$showD['regno']?>" /></td>
   </tr>
   <tr>
     <td><span class="lt">Fleet No</span></td>
   </tr>
   <tr>
     <td><input name="identity" type="text" class="inpElemts" id="fno" value="<?=$showD['indentity']?>"/></td>
   </tr>
   <tr>
     <td><span class="lt">Type</span></td>
   </tr>
   <tr>
     <td><span class="styled-select">
       <select name="type" id="type" class="inpElemts" >
        <option  value="<?=$showD['type']?>" selected="selected"> <?=$showD['type']?></option>
         <option value="Tricycle">Tricycle</option>
         <option value="Car">Car</option>
         <option value="Bus">Bus</option>
         <option value="Truk">Truk</option>
         <option value="Lorry">Lorry</option>
         <option value="Low Bed">Low Bed</option>
         <option value="Swamp Boogie">Swamp Boogie</option>
         <option value="Flat Bed">Flat Bed</option>
         <option value="Crane">Crane</option>
         <option value="Excavators">Excavators</option>
         <option value="Others">Others</option>
       </select>
     </span></td>
   </tr>
   <tr>
     <td><span class="lt">Driver</span></td>
   </tr>
   
   <tr>
     <td><div class="styled-select">
       <label for="type2"/>     
       <?php 
	
$sql = mysql_query("SELECT * FROM staff WHERE designation =  'driver' ") or die(mysql_error());
	if(mysql_num_rows($sql)<1) {
	
	?>
       <?php
    	}
		else
		{
			   ?>
       <select name="driver" id="driver" class="inpElemts" >
         <option  value="<?=$showD['driver']?>" selected="selected"><?=$showD['driver']?></option>
         <option value="N / A">N / A</option>
         <?php
	while(	$res = mysql_fetch_array($sql))
	{
	?>
         <option value="<?=showName($res['id'])?>">
           <?=showName($res['id'])?>
           </option>
         <?php } ?>
       </select>
       <?php } ?>
     </div></td>
   </tr>
   <tr>
     <td>Location</td>
   </tr>
   <tr>
     <td><input name="location" type="text" class="inpElemts" id="fno2"   value="<?=$showD['location']?>" /></td>
   </tr>
   <tr>
     <td><span style="margin-left:110px; margin-top:10px;">
       <input name="add_fleet" type="button" class="buttons" id="add_fleet" value="Save" style="margin:0;" onclick="doFleetUpdate()" />
     </span></td>
   </tr>
 </table>
 <label for="make"></label>
</ul>

 
</form>
    
    <?php
//echo "Room has been Deleted"; 
}

//echo "Edit Was Successfull"; 
else { echo "Failed Entry"; }


}



