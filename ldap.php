<?php
include_once("logs.php");
include_once("verip.php");
$IP=qualip();

$username=$_POST['username'];
$password=$_POST['password'];

 if(isset($_POST['username']) && isset($_POST['password'])){
        $conn = ldap_connect("ldap://ldap-rep1.almg.uucp");
        if(!$conn){
                $msg='Erro no ldap: '.ldap_error($conn);
        }else{
                $link = @ldap_bind($conn, "uid=".$_POST['username'].",ou=Usuarios,dc=almg,dc=gov,dc=br", $_POST['password']);
                if(!$link){
                         //logs ($username, 'AUTENTICACAO' ,"ERRO de Autenticacao do user $username",$IP);
                         header("Location:login.html?error=1");
                         exit;
                }else{
/*
                         session_start();
                         //session_name("AgentesInformatica");   
                         $_SESSION["usernames"] =  $_POST['username'];
                         $_SESSION["passwords"] =  $_POST['password'];
*/

                          

                         header("Location:index.php?session=$username",TRUE,301);
                         //echo "<script type='text/javascript'>window.top.location='index.php';</script>";
                         exit;
                     }
                
        }
}
?>