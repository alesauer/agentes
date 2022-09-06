<?php
include_once("config.php");
include_once("head.php");
include_once("Database.php");
include_once("verip.php");
include_once("sessao.php");

 
$username_s = $_REQUEST['session'];

$IP=qualip();



$ID_AGENTES = $_REQUEST['ID_AGENTES'];
$NOME_AGENTE = $_REQUEST['NOME_AGENTE'];
$LOGIN_AGENTE=$_REQUEST['LOGIN_AGENTE'];

$EMAIL_AGENTE=$_REQUEST['EMAIL_AGENTE'];
$TELEFONE=$_REQUEST['TELEFONE'];

$OBS=$_REQUEST['OBS'];
$setor_NOME_SETOR=$_REQUEST['setor_NOME_SETOR'];

//echo "$ID_AGENTES - $NOME_AGENTE - $LOGIN_AGENTE - $EMAIL_AGENTE - $TELEFONE - $OBS - $setor_NOME_SETOR";





 $obj= new Database;
 $resultado = $obj->connect("UPDATE agentes SET NOME_AGENTE='$NOME_AGENTE', LOGIN_AGENTE='$LOGIN_AGENTE', EMAIL_AGENTE='$EMAIL_AGENTE', TELEFONE='$TELEFONE',
setor_NOME_SETOR='$setor_NOME_SETOR', OBS='$OBS' WHERE ID_AGENTES='$ID_AGENTES'");

//include_once("logs.php");
//include_once("verip.php");
//$IP=qualip();
//$username=$_SESSION['username']; 
//logs ($username, 'EDITAR' ,"User $username editou o usuário $NOME_AGENTE",$IP);


	
header("Location:editar.php?session=$username_s&ID_AGENTES=$ID_AGENTES&situacao_edit=1&mensagem=<div class='alert alert-success' role='alert'>Os dados foram alterados!</div>");
exit;

?>