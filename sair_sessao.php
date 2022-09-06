<?php
include ("sessao.php");


include_once("logs.php");
include_once("verip.php");
$IP=qualip();
$username=$_SESSION['usernames']; 
//logs ($username, 'LOGOFF' ,"User $username efeuou logoff",$IP);

session_destroy();
unset ($_SESSION['usernames']);
unset ($_SESSION['passwords']);
header("Location:login.html");
?>
