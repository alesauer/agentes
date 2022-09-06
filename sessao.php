<?php 
session_start();
if((!isset ($_SESSION['usernames']) == true) and (!isset ($_SESSION['passwords']) == true))
{
	session_destroy();
    unset($_SESSION['usernames']);
    unset($_SESSION['passwords']);
    echo "<script type='text/javascript'>window.top.location='login.html';</script>";
    //header('location:login.html');
}
//echo $logado;
?>