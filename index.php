

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">


<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="icon" type="image/png" href="images/favicon.ico" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Free World Suit 1.0</title>
<script src="home/js/jquery.1.7.1.js"></script>
<script src="home/js/jCorners.js"></script>
<script>

$(function(){
$("body .wrap").corner("left");

});
</script>

<style type="text/css">
@import url("index.css");
</style>
</head>

<body>


<div class="wrap">
  <div class="top">
    <h1 align="center">Fleet </h1></div>
  
  
  <div class="content">
  <div class="login"></div>
  <div class="inn">
  
  <form action="loginScript.php" method="post" enctype="multipart/form-data" name="login">
    <table width="100%" border="0" cellpadding="2" cellspacing="5" class="lg">
      <tr>
        <td width="33%">&nbsp;</td>
        <td width="67%">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Username</td>
        <td><label for="username"></label>
          <input type="text" name="username" id="username" /></td>
      </tr>
      <tr>
        <td align="right">Password</td>
        <td><label for="password"></label>
          <input type="password" name="password" id="password" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="login_page" id="buttons" value="Login" />
        
     
        
        </td>
      </tr>
    </table>
  </form>
  </div>
  
  
  </div>
  
  
</div>
</body>
</html>