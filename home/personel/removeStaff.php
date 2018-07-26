<?php 
include_once "../loginCheck.php";
include_once "../includes/functions.php";
include_once "roomSetupFunctions.php";
con();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">


<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon" />
<link rel="icon" type="image/png" href="../../images/favicon.ico" />
<link rel="stylesheet" href="jqtransformplugin/jqtransform.css" type="text/css" media="all" />
	<link rel="stylesheet" href="demo.css" type="text/css" media="all" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
@import url("../style.css"); 

</style>
<script src="../js/jquery.1.7.1.js"></script>
<script src="../js/jCorners.js"></script>
<script src="../js/jfunctions.js"></script>
<script src="../js/tableCloth.js"></script>
<script src="../js/jmodal.js"></script>

</head>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#rstaf").click(function(){

				 $("#hform").hide("slow").fadeOut();
				 //$("#box1");
				 $("#loading").show("slow").fadeIn(800).delay(800).hide("slow");

				$("#msg").show("slow").load("script.php", {
					
					sname: $("#sname").val(),
							uname: $("#uname").val(),
							pword: $("#pword").val(),
							alevel: $("#alevel").val(),
							action: "postmsg"
					
					});
			});
		});
		
		
	/*	$(document).ready(function(){
			//timestamp = 0;
			//updateMsg();
			$("form#makeStaff").click(function(){
				$.post("script.php",{
							sname: $("#sname").val(),
							uname: $("#uname").val(),
							pword: $("#pword").val(),
							alevel: $("#alevel").val(),
							action: "postmsg",
							//time: timestamp
						});
				return false;
			});
		});*/
		</script>
<body>

<div class="wrap">

<div class="sideNav">

<ul>
<li><a href="../rooms">Room Manager</a></li>
<li><a href="../sales">Sales Manager</a></li>
<li><a href="../inventory">Inventory</a></li>
<li><a href="../account">Transactions</a></li>
<li><a href="../setting">Settings</a></li>
<li><a href="../admin" class="active">Admin</a></li>


</ul>


</div> 


<div class="leftCon">

<div class="upDiv">
<h1>Room Manager</h1>
</div>


<div id="ts_tabmenu">
<ul class="tabs">
<li><a href="index.php" ><strong>Home</strong></a></li>
<li><a href="manageStaff.php"><strong>Add Staff</strong></a></li>
<li><a href="removeStaff.php"  class="active" ><strong>Remove Staff</strong></a></li>
<li><a href="editStaff.php"><strong>Edit Staff</strong></a></li>

</ul>
</div>

<div class="tab_content" style="height:auto;">
 <div>
<div class='two_column_numbers'>
	<h1>Remove Rooms</h1>
    <div id="content1" style="height:350px; overflow:auto; overflow-x:hidden; overflow-style:marquee-line; width:98%; margin:auto;">
	<table border="0" class="table table-dark table-bordered table-striped" id="delStaffTable" >
    <tbody>
    <tr>
    <td><strong>Staff Name</strong></td>
    <td><strong>Delete Option</strong></td>
    </tr>

<?php 
$selStaff = mysql_query("SELECT * FROM profile") or die(mysql_error());



if(	$countStaff = mysql_num_rows($selStaff) < 1)
{
	?>
      <tr><td colspan="2"> <div class="bad"> There are no Staff Present in this Establishment</div></td>
        </tr>
      

	<?php
}
	else
	{





	while(	$showStaff = mysql_fetch_array($selStaff))
	{
		?>
        

        <tr id="<?=$showStaff['id']?>"><td><?=$showStaff['name']?></td>
        <td><a href="#" class="delete"> <img src="../../images/delete.png" border="0" /></a></td>
        
        </tr>
        
        <?php
	}}
	?>
    </tbody>
</table></div> 
    <div id="msg"></div>
<div id="loading"></div>
</div>

   





</ul>
 </div>
<div id="msg"></div>




<div id="loading">
  <!--<img src="../../images/loading.gif" width="168" height="40" style="margin:auto" />-->
  
</div>

</div>





</div>

</div>



</body>
</html>
<?php close_con(); ?>