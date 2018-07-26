<?php

include "../includes/functions.php";
con();


header("Cache-Control: no-cache");
// Ideally, you'd put these in a text file. Put an entry 
// on each line of 'a.txt' and use $prefixes = file("a.txt");
// You can do the same with a separate file for $suffixes.
// This selects a random element of each array on the fly

// Example output: Tagging is the new Web

/*$name = $_POST['sname'];
$pword = $_POST['pword'];
$uname = $_POST['uname'];
$alevel = $_POST['alevel'];*/

/*foreach($_POST as $key => $value)
{
	$key = mysql_real_escape_string($value);


	
//$sql = "INSERT INTO rooms (ref, type) VALUES ('$rN1', '$rT1'), ('$rN2', '$rT2'), ('$rN3', '$rT3');";
	
$incard = mysql_query("UPDATE room_type SET name = '$typeName', rate = '$typeRate' WHERE id = '$typeId'   ") or die(mysql_error());
///$incard2 = mysql_query("INSERT INTO rooms SET ref = '$rN1', type= '$rT1'") or die(mysql_error());
	
if ($incard) { echo"Edit Was Successfull"; }
else { echo "Failed Entry"; }

$incard = mysql_query("UPDATE room_type SET name = '$typeName', rate = '$typeRate' WHERE id = '$typeId'") or die(mysql_error());

if ($incard) { echo"Edit Was Successfull"; }
else { echo "Failed Entry"; }

}*/

	

//$results = '';
/*
foreach ($_POST as $key =>  $value) {
	
//echo parse_str($_GET, $value)."<br>";

//   echo $results .= "$data <br> = <br>$value;<br>";
//print_r($value);

//$$keys = mysql_real_escape_string($value);



echo "Am Here Guy";
//print_r($_POST);
exit;

}*/


foreach($_POST as $key => $value)
{
	
	

//echo " Name: ".$name." Rate:".$rate." ID: ".$value."<br>";
	$runQuery = mysql_query("SELECT * FROM staff WHERE id = '$value'")or die (mysql_error());


if ($runQuery)
{
	$showD = mysql_fetch_array($runQuery);
	?>
    <div class="close"> <img src="../images/close.png" width="42" height="42" id="cls" onclick="$.modal.close()" /></div>
    <div id="show_Staff_Details">
 <form id="update_Staff">
 <table width="100%" border="0">
   <tr>
     <td>Surname Name</td>
   </tr>
   <tr>
     <td><input type="text" name="sname" id="sname" value="<?=$showD['surname']?>" class="inpElemts" />
       <input type="hidden" name="sid" id="sid" value="<?=$showD['id']?>" /></td>
   </tr>
   <tr>
     <td>Other Name</td>
   </tr>
   <tr>
     <td><input type="text" name="oname" id="oname"  class="inpElemts"  value="<?=$showD['oname']?>" /></td>
   </tr>
   <tr>
     <td>Gender</td>
   </tr>
   <tr>
     <td><div class="styled-select">
       <label for="gender"/>     
       <select name="gender" id="gender" class="inpElemts" >
         <option value="male">Male</option>
         <option value="female">Female</option>
       </select>
     </div></td>
   </tr>
   <tr>
     <td>Phone</td>
   </tr>
   <tr>
     <td><input type="text" name="phone" id="phone"  class="inpElemts"  value="<?=$showD['phone']?>" /></td>
   </tr>
   <tr>
     <td>Designation <a href="#" id="addNewDesignation2" onclick="$('#selfromlist, #addNewDesignation2').css('display', 'none');
	
	$('#designation2').fadeIn();">Add</a></td>
   </tr>
   <tr>
     <td><?php 
	$d = $showD['designation'];
$sql = mysql_query("SELECT DISTINCT designation FROM staff where designation !='$d' ") or die(mysql_error());
	
	
		
	?>
       <select name="designation" id="selfromlist"  class="inpElemts" >
        <option value="<?=$d?>" selected="selected"><?=$d?></option> 
               <?php
	while(	$res = mysql_fetch_array($sql))
	{
	?>
      <option value="<?=$res['designation']?>"><?=ucwords($res['designation'])?></option>
     <?php } ?>
    </select>

    
  <input name="designation2" type="text"  class="inpElemts" id="designation2" style="display:none" />
      
    
       </td>
   </tr>
   <tr>
     <td>Address </td>
   </tr>
   <tr>
     <td><textarea name="address" rows="5" class="text_area" id="address"><?=$showD['address']?>
     </textarea></td>
   </tr>
   <tr>
     <td><input name="edit_this_Staff" type="button" class="buttons" id="edit_this_Staff" value="Save Changes" style="margin:0;" onclick="makeUpdate()"  /></td>
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



