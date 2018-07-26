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
<script src="../../js/tableCloth.js"></script>

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
<li><a href="../remove">Remove Staff</a></li>
<li><a href="../edit">Edit Staff</a></li>
<li><a href="../view">View Staff</a></li>
<li><a href="../admin" class="active">Administrative Staff</a></li>
<li><a href="../">Add Staff</a></li>
</ul>
</div>

<div class="page_content_links">

<div>
 <form enctype="multipart/form-data" id="form1">
 <ul id="hform"><br />

 <li class="lt">Staff Name</li>
 <div class="styled-select">
  <label for="alevel"/></label>
    <select name="alevel" id="alevel" class="inpElemts" >
      <option value="manager">Manager<span> - Has Complete Access</span></option>
      <option value="supervisor">Superviso<span> - Can post and see All Transaction</span></option>
      <option value="clerk">Clerk <span> - Can only post transactions</span></option>
    </select>
    </div><br clear="all" />

 <li class="lt">Password</li>
 <li>
   <label for="pword"></label>
   <input type="text" name="pword" id="pword"  class="inpElemts" />
 </li>
 <br clear="all" /><br />


 <li class="lt">Access level</li>
 <li>
   
  <div class="styled-select">
  <label for="alevel"/></label>
    <select name="alevel" id="alevel" class="inpElemts" >
      <option value="manager">Manager<span> - Has Complete Access</span></option>
      <option value="supervisor">Superviso<span> - Can post and see All Transaction</span></option>
      <option value="clerk">Clerk <span> - Can only post transactions</span></option>
    </select>
    </div>
 </li>
 <br clear="all" />

 
 
 <li style="margin-left:100px;">
   <input name="addStaff" type="button" class="buttons" id="makeStaff" value="Add Staff" style="margin:0;" />
 </li>
 </ul>

 
 </form>
 
 </div>

</div>





</div>
</div>
</body>
</html>

<?php close_con(); ob_end_flush(); ?>