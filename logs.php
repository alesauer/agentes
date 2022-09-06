<?php
include_once("Database.php");



function logs ( $matricula , $TIPO_LOGS , $ACAO ,$IP )
{


date_default_timezone_set('America/Sao_Paulo');
$datal=date("Y-m-d");
$horal=date("H-i-s");

//echo "$horal - $datal";

$sql = "insert into logs(matricula,data,hora,tipo,acao,ip) VALUES ('$matricula','$datal','$horal','$TIPO_LOGS','$ACAO','$IP')";
$obj = new Database();
$resultado=$obj->connect($sql);

}



?>
