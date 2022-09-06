<?php
class Database
{
    function connect($query)
    {
        $_host = 'gac';
        $_user = 'root';
        $_password = 'maria_treme';
        $_database = 'agentes';
    
        $conn = mysqli_connect($_host,$_user,$_password) or die("Erro: Conexão não pode ser realizada: $_host - $_user - $_password - $_database");
        $banco = mysqli_select_db($conn,$_database) or die("Erro: Banco de Dados não encontrado: $_database");
        mysqli_set_charset($conn,'utf8');
        $result = mysqli_query($conn,$query) or die("Erro: Query: $query");
        return($result);
        exit;
    }
}//end class
?>