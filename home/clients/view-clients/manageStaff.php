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
<script src="../js/jmodal.js"></script>

</head>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#makeStaff").click(function(){

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
		
	

function goto(id, t){	
	//animate to the div id.
	$(".contentbox-wrapper").animate({"left": -($(id).position().left)}, 600);
	
	// remove "active" class from all links inside #nav
    $('#nav a').removeClass('active');
	
	// add active class to the current link
    $(t).addClass('active');	
}


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
<li><a href="manageStaff.php"  class="active" ><strong>Add Staff</strong></a></li>
<li><a href="removeStaff.php"><strong>Remove Staff</strong></a></li>
<li><a href="view-clients/editFleet.php"><strong>Edit Staff</strong></a></li>

</ul>
</div>

<div class="tab_content" style="height:auto;">
 <div>
 <form id="form1">
 <ul id="hform">
 <li>Staff Name</li>
 <li>
   <label for="sname"></label>
   <input type="text" name="sname" id="sname" class="inpElemts" />
 </li>
 <li>Username</li>
 <li>
   <label for="uname"></label>
   <input type="text" name="uname" id="uname"  class="inpElemts" />
 </li>
 <li>Password</li>
 <li>
   <label for="pword"></label>
   <input type="password" name="pword" id="pword"  class="inpElemts" />
 </li>
 <li>Access level</li>
 <li>
   
  <div class="styled-select">
  <label for="alevel"/></label>
    <select name="alevel" id="alevel" class="inpElemts" >
      <option value="manager">Manager - Has Complete Access</option>
      <option value="supervisor">Superviso - Can see All order within Location</option>
      <option value="clerk">Clerk - Can only see Orders</option>
    </select>
    </div>
 </li>
 
 <li>
   <input name="addStaff" type="button" class="buttons" id="makeStaff" value="Add Staff" style="margin:0;" />
 </li>
 </ul>

 
 </form>
 
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