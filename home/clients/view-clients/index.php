<?php 
ob_start();
include "../../includes/functions.php";
con();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../../images/favicon.png" type="image/png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include "../../includes/title.php"; ?></title>
<script src="../../js/jquery.1.7.1.js"></script>
<script src="../../js/jCorners.js"></script>
<script src="../../js/jfunctions.js"></script>
<script src="../../js/jmodal.js"></script>
<script src="../../js/jquery.dataTables.js"></script>
<script src="../../js/shCore.js"></script>
<script src="../../js/ui.core.js"></script>
<script src="../../js/ui.datepicker.js"></script>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css" title="currentStyle">
			@import "../../css/demo_table.css";
	
			@import "../../css/shCore.css";
			@import "../../css/smoothness/jquery-ui-1.8.4.custom.css";
			

			@import "../../css/ui.datepicker.css";
			@import "../../css/ui.theme.css";
		</style>

		
		<script type="text/javascript" charset="utf-8">
			
						

	
			/*
			 * I don't actually use this here, but it is provided as it might be useful and demonstrates
			 * getting the TR nodes from DataTables
			 */
			function fnGetSelected( oTableLocal )
			{
				return oTableLocal.$('tr.row_selected');
			}
			
				$(document).ready(function() {
				/* Add/remove class to a row when clicked on */
				$('#example tr').click( function() {
					$(this).toggleClass('row_selected');
				} );
				
				
				
				/* Init the table */
				var oTable = $('#example').dataTable( );
			} );
			
			/*
			 * I don't actually use this here, but it is provided as it might be useful and demonstrates
			 * getting the TR nodes from DataTables
			 */
		
			
			
		</script>

<link href="../../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="leftPanel">
<div class="logo">


</div>

<div class="left_Panel_Links">

<ul>
<li><a href="../../">Dash Board</a></li>
<li><a href="../../clients" class="active">Clients / Contractor</a></li>
<li><a href="../../transactions">Transaction</a></li>
<li><a href="../../personel">Personel</a></li>
<li><a href="../../fleet">Fleet</a></li>
<li><a href="../../settings">Settings</a></li>


</ul>

</div>


</div>

<div class="rightPanel">
<div class="content">

<div class="topDiv"><?php include "../../includes/status.php"; ?></div>


<div class="titleDiv">
<?php include "../title.php"; ?>
</div>


<div class="links">
<span>View Details</span>
<ul>

<li><a href="../view-clients" class="active">View</a></li>
<li><a href="../">Add New</a></li>
</ul>
</div>

<div class="page_content_links">

<div class='two_column_numbers'>
	
    <div id="content1" style="height:350px; overflow:auto; overflow-x:hidden; overflow-style:marquee-line; width:98%; margin:auto;">
	
    <?php 
$selStaff = mysql_query("SELECT * FROM clients") or die(mysql_error());



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
              <th>Name</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Ref</th>
              <th>Edit</th>
              <th>Delete</th>
              <th>Transactions</th>
            </tr>
            
            </thead>
  
    <tbody>
    <?php
	while(	$showStaff = mysql_fetch_array($selStaff))
	{
   ?>



        <tr id="<?=$showStaff['id']?>" class="gradeC">
        
        <td id="<?=$showStaff['id']?>"><?=$showStaff['name']?></td>
        <td id="<?=$showStaff['id']?>"><?=$showStaff['phone']?></td>
        <td id="<?=$showStaff['id']?>"><?=$showStaff['address']?></td>
        <td id="<?=$showStaff['id']?>"><?=$showStaff['type']?></td>
        
        <td id="<?=$showStaff['id']?>">
        <a href="#" id="editClient">
        <img src="../../images/edit.png" width="16" height="16" border="0" />
        </a>
        </td>
        
        <td id="<?=$showStaff['id']?>">
       <?php
if (checkLogAcc($_COOKIE['id']) > 1)
{
	?>
        <a href="#" id="deleteClient">
        <img src="../../images/cancel.png"  width="16" height="16" border="0" />
        </a>
        <?php } else { ?> <img src="../../images/cancel.png"  width="16" height="16" border="0" /> <?php } ?>
        </td>
        
        
        <td id="<?=$showStaff['id']?>">
        <a href="#" id="clientHistory">
        <img src="../../images/transaction.png"  width="16" height="16" border="0" />
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

   






 </div>

</div>





</div>
</div>

</body>
</html>
<?php con_close();
ob_end_flush(); 

?>