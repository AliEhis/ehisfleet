<?php 
ob_start();
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


 <form id="clientHis">
   <table width="100%" border="0">
     <tr>
       <td><span class="lt">From</span></td>
     </tr>
     <tr>
       <td><input name="dateOne" type="text" class="inpElemts" id="dateOne" value="DD, MM, YYYY" onFocus="if(this.value=='DD, MM, YYYY'){this.value=''}" onBlur="if(this.value==''){this.value='DD, MM, YYYY'}"   />
        <input type="hidden" name="sid" id="hiddenField"  value="<?=$showD['id']?>"/>
        <input type="hidden" name="type" id="hiddenField"  value="<?=$showD['type']?>"/></td>
     </tr>
     <tr>
       <td><span class="lt">To</span></td>
     </tr>
     <tr>
       <td><input name="dateTwo" type="text"  class="inpElemts" id="dateTwo"  value="DD, MM, YYYY" onFocus="if(this.value=='DD, MM, YYYY'){this.value=''}" onBlur="if(this.value==''){this.value='DD, MM, YYYY'}"  /></td>
     </tr>
     <tr>
       <td><span style="margin-left:110px; margin-top:10px;">
         <input name="myClientHistory" type="button" class="buttons" id="myClientHistory" value="View History" style="margin:0;" onclick="doClientUpdate()" />
        </span></td>
     </tr>
   </table>
 </form>
 
</div>
<?php } }
?>


