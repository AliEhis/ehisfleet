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
<li><a href="../../clients">Clients / Contractors</a></li>
<li><a href="../../transactions">Transactions</a></li>
<li><a href="../../personel">Personel</a></li>
<li><a href="../../fleet" class="active">Fleet</a></li>
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
<span>Available Fleet</span>
<ul>
<li><a href="../remove">Delete</a></li>
<li><a href="../edit" class="active">Edit</a></li>
<li><a href="../new">Add New</a></li>
<li><a href="../">Home</a></li>
</ul>
</div>

<div class="page_content_links" id="showFleet">
<?= showFleet() ?>

</div>





</div>
</div>
</body>
</html>
<?php 
con_close();
ob_end_flush();
?>