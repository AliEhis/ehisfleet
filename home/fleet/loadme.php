
<div class="listView">
       
<?php
       
	   include_once "../includes/functions.php";

con();

header("Cache-Control: no-cache");
     $selStaff = mysql_query("SELECT * FROM fleet") or die(mysql_error());
if(	$countStaff = mysql_num_rows($selStaff) < 1)
{
	?>
       <div class="bad"> Empty Record</div>

	<?php
}
	else
	{
?>
 <table class="display"  cellpadding="0" cellspacing="0" border="0"  id="example">
          <thead>
            <tr class="ui-widget-header">
              <th>Make</th>
              <th>Identity</th>
              <th>Plate Number</th>
              <th>Type</th>
              <th>Driver</th>
              <th>Location</th>
         
              <th>Edit</th>
              <th>Delete</th>
              
            </tr>
            

    
          </thead>
          <tbody>

<?php

	while(	$showStaff = mysql_fetch_array($selStaff))
	{
		?>
        

        <tr id="<?=$showStaff['id']?>" class="gradeC">
        <td id="<?=$showStaff['id']?>"><?=$showStaff['make']?></td>
        <td id="<?=$showStaff['id']?>"><?=$showStaff['identity']?></td>
        <td id="<?=$showStaff['id']?>"><?=$showStaff['regno']?></td>
        <td id="<?=$showStaff['id']?>"><?=$showStaff['type']?></td>
        <td id="<?=$showStaff['id']?>"><?=$showStaff['driver']?></td>
        <td id="<?=$showStaff['id']?>"><?=$showStaff['location']?></td>
     
        
        <td id="<?=$showStaff['id']?>">
        <a href="#" id="editFleet">
        <img src="../images/edit.png" width="16" height="16" border="0"  />
        </a>
        </td>
        
        <td id="<?=$showStaff['id']?>">
        <a href="#" id="deleteFleet">
        <img src="../images/cancel.png"  width="16" height="16" border="0" />
        </a>
        </td>
        
        </tr>
        
        <?php
	}
	?>
           
          </tbody>
        </table>
     <?php } ?> 
      
<div id="box1" class="dialog" style="color:#FFFFFF; display:none;">

   
    


</div>
</div>