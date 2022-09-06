<?php
include_once("config.php");
include_once("head.php");
include_once("Database.php");
//include_once("sessao.php");

if(isset($_REQUEST['session'])){
$username_s = $_REQUEST['session'];
}
else{
   echo "<script type='text/javascript'>window.top.location='login.html';</script>";
   exit;
}


/*
echo "$username_s";
exit;
*/

?>

<body>
<div class="container-xl">

    <div class="table-responsive">
        <div class="table-wrapper">

<!-- Menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Agentes de Informática</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inserir.php?session=<?php echo $username_s;?>">Novo</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="sair_sessao.php">Sair</a>
        </li>
      </ul>
      <form method="post" action="index.php?clicoupesquisa=1&session=<?php echo "$username_s";?>" class="d-flex">
        <input class="form-control me-2" type="search" id="pesquisa" name="pesquisa" placeholder="Pesquisar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
      </form>
    </div>
  </div>
</nav>
<!--  End Menu -->
<br>

            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome <i class="fa"></i></th>
                        <th>E-mail</th>
                        <th>Login<i class="fa"></i></th>
                        <th>Setor</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>

<?php

if (isset($_REQUEST["clicouExcluir"]) == "1")
{
  $ID_AGENTES=$_REQUEST["ID_AGENTES"];
  $obj= new Database;
  $resultado = $obj->connect("delete from agentes WHERE ID_AGENTES='$ID_AGENTES'");



include_once("logs.php");
include_once("verip.php");
$IP=qualip();
$username=$_SESSION['username']; 
logs ($username, 'EXCLUIR' ,"User $username excluiu o usuário com ID: $ID_AGENTES",$IP);



  $mensagem="<div class='alert alert-success' role='alert'>Registro excluído!</div>";
  echo "$mensagem";

}


$CONT_AGENTES=0;

if (isset($_REQUEST["clicoupesquisa"]) == "1")
{
  $pesquisa=$_REQUEST["pesquisa"];
  $obj= new Database;
  $resultado = $obj->connect("select * from agentes where NOME_AGENTE like '%$pesquisa%' or EMAIL_AGENTE like '%$pesquisa%' or LOGIN_AGENTE like '%$pesquisa%' or setor_NOME_SETOR like '%$pesquisa%' order by NOME_AGENTE asc");
    
}else{
 $obj= new Database;
 $resultado = $obj->connect("select * from agentes order by NOME_AGENTE asc");
 

}


  while($linha=mysqli_fetch_array($resultado))
   {
    $CONT_AGENTES++;
    $ID_AGENTES = $linha['ID_AGENTES'];
    $NOME_AGENTE = $linha['NOME_AGENTE'];
    $EMAIL_AGENTE=$linha['EMAIL_AGENTE'];
    $LOGIN_AGENTE=$linha['LOGIN_AGENTE'];
    $setor_NOME_SETOR=$linha['setor_NOME_SETOR'];

    echo "<tr>";
    echo "<td>$CONT_AGENTES</td>";
    echo "<td>$NOME_AGENTE</td>";
    echo "<td>$EMAIL_AGENTE</td>";
    echo "<td>$LOGIN_AGENTE</td>";
    echo "<td>$setor_NOME_SETOR</td>";

echo "
    <td>
        <a href='visualizar.php?ID_AGENTES=$ID_AGENTES&session=$username_s' class='view'><i class='material-icons'>&#xE417;</i></a>";

/*  
m23621:sauer
adluiz: Luiz A. Couto
m24596: Rafael

*/      
if($username_s=="m23621" or $username_s=="hildemar" or $username_s=="adluiz" or $username_s=="m24596" or $username_s=="m28076" or $username_s=="m20469")        
{
echo "
        <a href='editar.php?ID_AGENTES=$ID_AGENTES&session=$username_s' class='edit'><i class='material-icons'>&#xE254;</i></a>
        <a href='index.php?clicouExcluir=1&ID_AGENTES=$ID_AGENTES' class='delete' title='Apagar'><i class='material-icons'>&#xE872;</i></a>";
}


echo "         
    </td>
";  

echo "</tr>";

   }
?>
        </tbody>
            </table>






            <div class="clearfix">
             
        </div>
    </div>  
</div>   
</body>
</html>