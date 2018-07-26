<script src="../../js/jquery.dataTables.js"></script>
<script src="../../js/shCore.js"></script>
<script src="../../js/ui.core.js"></script>
<script src="../../js/ui.datepicker.js"></script>

<style type="text/css" title="currentStyle">
			@import "../../css/demo_table.css";	
			@import "../../css/ui.datepicker.css";
			@import "../../css/ui.theme.css";
			@import "../../css/shCore.css";
			@import "../../css/smoothness/jquery-ui-1.8.4.custom.css";
			.fleet
			{
				width:600px;

			}
			.gradeU
			{
				color:#000000;
			}
		</style>

		
		<script type="text/javascript" charset="utf-8">
			
					
	
		

			/*
			 * I don't actually use this here, but it is provided as it might be useful and demonstrates
			 * getting the TR nodes from DataTables
			 */
		var oTable;
			
				$(document).ready(function() {
				/* Add/remove class to a row when clicked on */
				$('#example tr, #example input tr').click( function() {
					$(this).toggleClass('row_selected');
				} );
				
				/* Init the table */
				var oTable = $('#example').dataTable();
			} );
			
			
			$(document).ready(function() {
				$('#form').submit( function() {
					var sData = oTable.$('input').serialize();
					
					//$("#showF").modalClose();
					//$("#truck").val(data);
					//fnGetSelected();
					html(sData);
					//alert( "The following data would have been submitted to the server: \n\n"+sData );
					return false;
				} );
				
				oTable = $('#example').dataTable();
			} );
			
			/*
			 * I don't actually use this here, but it is provided as it might be useful and demonstrates
			 * getting the TR nodes from DataTables
			 */
		
			   function fnGetSelected( oTableLocal ){    return oTableLocal.$('tr.row_selected');}
			
		</script>


<?php 
ob_start();
include "../../includes/functions.php";
con();



header("Cache-Control: no-cache");
// Ideally, you'd put these in a text file. Put an entry 
// on each line of 'a.txt' and use $prefixes = file("a.txt");
// You can do the same with a separate file for $suffixes.
// This selects a random element of each array on the fly



            $selStaff = mysql_query("SELECT * FROM fleet") or die(mysql_error());
if(	$countStaff = mysql_num_rows($selStaff) > 0)
{
	

?>

<div class="close"> <img src="../../images/close.png" alt="" width="42" height="42" id="cls" onclick="$.modal.close()" /></div>
<div class="fleet">
<form id="form">
				
<table class="display"  cellpadding="0" cellspacing="0" border="0"  id="example">
  <thead>
    <tr class="ui-widget-header">
      <th>Select</th>
      <th>Plate Number</th>
      <th>Identity</th>
      <th>Make</th>
      <th>Type</th>
    </tr>
  </thead>
  <tbody>
    <?php
	

	while(	$showStaff = mysql_fetch_array($selStaff))
	{
		?>
    <tr id="<?=$showStaff['id']?>" class="gradeU">
    <td id="<?=$showStaff['id']?>"><input type="checkbox" name="<?=$showStaff['regno']?>" value="<?=$showStaff['regno']?>"></td>
      <td id="<?=$showStaff['id']?>"><?=$showStaff['regno']?></td>
      <td id="<?=$showStaff['id']?>"><?=$showStaff['identity']?></td>
      <td id="<?=$showStaff['id']?>"><?=$showStaff['make']?></td>
      <td id="<?=$showStaff['id']?>"><?=$showStaff['type']?></td>
    </tr>
    <?php
	}
	?>
    
    
  </tbody>
  
</table>

	<div style="text-align:right; padding-bottom:1em;">
						<button type="submit">Finish</button>
					</div></form>
</div>
<?php } ?>