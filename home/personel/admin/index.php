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
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css" title="currentStyle">
			@import "../../css/demo_table.css";
	
			@import "../../css/shCore.css";
			@import "../../css/smoothness/jquery-ui-1.8.4.custom.css";
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
		
			
			



$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});
	
});


$(document).ready(function() {
 
	$('.tabs').click(function(){
		switch_tabs($(this));
	});
 
	switch_tabs($('.defaulttab'));
 
});
 
function switch_tabs(obj)
{
	$('.tab_contents').hide();
	$('.tabs li a').removeClass("active");
	var id = obj.attr("rel");
 
	$('#'+id).show();
	obj.addClass("active");
}

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
<li><a href="../../clients">Clients</a></li>
<li><a href="../../transactions">Transaction</a></li>
<li><a href="../../personel" class="active">Personel</a></li>
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
<span>Add Staff</span>
<ul>
<li><a href="../admin" class="active">Administrative Staff</a></li>
<li><a href="../add">Add Staff</a></li>

<li><a href="../">View Staff</a></li>
</ul>
</div>

<div class="page_content_links">
<div class="clear"></div>
<?php
if (checkLogAcc($_COOKIE['id']) > 2)
{
	?>
<div class="in_menu">

<ul class="tabs">
<li><a href="#at">Add</a></li>
<li><a href="#vs">View</a></li>
</ul>
</div>
<div class="make_staff">
 <div class="tab_container">
<div id="at" class="tab_content">
<div class="add_admin_staff">
 <form id="add_admin_staff">
 <ul id="hform"><br />

 <li class="lt">Staff Name</li>

  <?php 
	
$sql = mysql_query("SELECT * FROM staff order by oname asc") or die(mysql_error());
	
	
	?><li>
       <select name="staff_name" id="selfromlist"  class="inpElemts left-8" >
                <?php
	while(	$res = mysql_fetch_array($sql))
	{
	?>
      <option value="<?=$res['id']?>"><?=ucwords($res['oname'])?> <?=ucwords($res['surname'])?> </option>
     <?php } ?>
    </select></li>

    
  
  

 
 
 <br clear="all" />

<li class="lt">Username</li>
 <li>
   <label for="uname"></label>
   <input type="text" name="uname" id="uname"  class="inpElemts" />
 </li>
 <br clear="all" />
 


 <li class="lt">Password</li>
 <li>
   <label for="pword"></label>
   <input type="password" name="pword" id="pword"  class="inpElemts" />
 </li>
 <br clear="all" /><br />


 <li class="lt">Access level</li>
 <li>
   
  <div class="styled-select">
  <label for="alevel"/></label>
    <select name="alevel" id="alevel" class="inpElemts" >
      <option value="manager">Manager<span> - Has Complete Access</span></option>
      <option value="supervisor">Supervisor<span> - Can post and see All Transaction</span></option>
      <option value="clerk">Clerk <span> - Can only post transactions</span></option>
    </select>
    </div>
 </li>
 <br clear="all" />

 
 
 <li style="margin-left:100px;">
   <input name="make_admin" type="button" class="buttons" id="make_admin" value="Add Staff" style="margin:0;" />
 </li>
 </ul>

 
 </form>
 
 <div id="msg"></div>




<div id="loading">
  <!--<img src="../../images/loading.gif" width="168" height="40" style="margin:auto" />-->
  
</div></div>
 </div>

</div>
<div class="clear"></div>
<div  id="vs" class="tab_content">


<div class="demo_jui">
      
<?php
            $selStaff = mysql_query("SELECT * FROM admin") or die(mysql_error());
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
              <th>Staff Name</th>
              <th>Username</th>
              <th>Password</th>
              <th>Access Level</th>
              <th>Curent Status</th>
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
        <td id="<?=$showStaff['id']?>"><?=showName($showStaff['staff_id'])?></td>
        <td id="<?=$showStaff['id']?>"><?=$showStaff['username']?></td>
        <td id="<?=$showStaff['id']?>"><?=$showStaff['password']?></td>
        <td id="<?=$showStaff['id']?>"><?=$showStaff['access']?></td>
		<td id="<?=$showStaff['id']?>"><?=showSt($showStaff['status'])?></td>
        <td id="<?=$showStaff['id']?>">
          <a href="#" id="editAdmin">
            <img src="../../images/edit.png" width="16" height="16" border="0" />
            </a>
        </td>
        
        <td id="<?=$showStaff['id']?>">
        <a href="#" id="deleteAdmin">
        <img src="../../images/cancel.png"  width="16" height="16" border="0" />
        </a>
        </td>
        
        </tr>
        
        <?php
	}}
	?>
           
          </tbody>
        </table>
      
      
<div id="box1" class="dialog" style="color:#FFFFFF; display:none;">

   
    


</div>
</div>


</div>
</div>
<?php } else { echo returnAccessCaution(); } ?>
</div>




</div>
</div>
</body>
</html>

<?php con_close(); ob_end_flush(); ?>