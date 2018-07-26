<?php
function con()
{   
    error_reporting(0);
    //connect to mysql server
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "ehisFleet";
    mysql_connect($host, $username, $password) or die(mysql_error());
    //select database
    mysql_select_db($database) or die(mysql_error());
}


function con_close()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "ehisFleet";
    $connect = mysql_connect($host, $username, $password) or die(mysql_error());

    mysql_close($connect);
}

?>