<?php
include_once("Database.php");
$arq = file("AtualizacaoCadastralAgentes.csv");
$conta = count($arq);


$obj= new Database;
$resultado=$obj->connect("delete from agentes");

echo "<h3>Iniciando o processo de Carga</h3><br>";

for ($i=0;$i<$conta;$i++)
{
$divide = explode(',', $arq[$i]);
$data_hora = rtrim(ltrim($divide[0]));
$nome_agente = rtrim(ltrim($divide[1]));
$matricula_agente = rtrim(ltrim($divide[2]));
$setor_agente = rtrim(ltrim($divide[3]));
$ramal = rtrim(ltrim($divide[4]));
$gerente = rtrim(ltrim($divide[5]));
$email_gerente = rtrim(ltrim($divide[6]));
$ramal_gerente = rtrim(ltrim($divide[7]));
$data_atual = rtrim(ltrim($divide[8]));
$obs = rtrim(ltrim($divide[9]));

$EMAIL_AGENTE="nome@almg.gov.br";
echo "Data: $data_hora - Agente: $nome_agente - Mat: $matricula_agente - Setor: $setor_agente - Ramal:$ramal - Gerente: $gerente - $email_gerente - $ramal_gerente - $data_atual - <br>";


$sql = "INSERT INTO agentes (NOME_AGENTE, LOGIN_AGENTE, INICIO_ATIVIDADE, FIM_ATIVIDADE, setor_NOME_SETOR, EMAIL_AGENTE, OBS, TELEFONE) VALUES ('$nome_agente', '$matricula_agente', '01/01/2015', '01/01/2015', '$setor_agente', '$EMAIL_AGENTE', '$obs', '$ramal')";
$resultado=$obj->connect($sql);






}//end for



?>