<?php
include_once("config.php");
include_once("head.php");
include_once("Database.php");
//include_once("sessao.php");


$username_s = $_REQUEST['session'];

/*  
m23621:sauer
adluiz: Luiz A. Couto
m24596: Rafael

*/      
if($username_s!="m23621" or $username_s!="hildemar" or $username_s!="adluiz" or $username_s!="m24596" or $username_s!="m28076")        
{
 header("Location:index.php?session=$username_s",TRUE,301);
}


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
       
      </ul>
     
    </div>
  </div>
</nav>
<!--  End Menu -->
<br>




<?php


if (isset($_REQUEST["clicou_excluir"]) == "1")
{
  
  $NOME_AGENTE = $_REQUEST['NOME_AGENTE'];
  $LOGIN_AGENTE=$_REQUEST['LOGIN_AGENTE'];
  $EMAIL_AGENTE=$_REQUEST['EMAIL_AGENTE'];
  $TELEFONE=$_REQUEST['TELEFONE'];
  $OBS=$_REQUEST['OBS'];
  $setor_NOME_SETOR=$_REQUEST['setor_NOME_SETOR'];

  

$INICIO_ATIVIDADE=date("Y-m-d");
$FIM_ATIVIDADE="2040-01-01";


  $obj= new Database;
  $resultado = $obj->connect("INSERT INTO agentes (NOME_AGENTE, LOGIN_AGENTE, INICIO_ATIVIDADE, FIM_ATIVIDADE, setor_NOME_SETOR, EMAIL_AGENTE, OBS, TELEFONE)
  VALUES ('$NOME_AGENTE', '$LOGIN_AGENTE', '$INICIO_ATIVIDADE', '$FIM_ATIVIDADE', '$setor_NOME_SETOR', '$EMAIL_AGENTE', '$OBS', '$TELEFONE')");

/*
include_once("logs.php");
include_once("verip.php");
$IP=qualip();
$username=$_SESSION['username']; 
logs ($username, 'CADASTRO' ,"User $username cadastrou agente: $NOME_AGENTE",$IP);
*/

  $mensagem="Dados inseridos com sucesso!";
  echo "<div class='alert alert-success' role='alert'>$mensagem</div>";


}


    echo "
     <form role='form' method='post' action='inserir.php?session=$username_s'>
     
      <div>
              <div class='form-row'>
                <div class='form-group col-md-6'>
                  <label for='inputNome'>Nome</label>
                  <input type='text' class='form-control' id='inputEmail4' name='NOME_AGENTE'>
                </div>
                <div class='form-group col-md-6'>
                  <label for='inputLogin'>Matrícula</label>
                  <input type='text' class='form-control' id='inputPassword4' name='LOGIN_AGENTE'>
                </div>
              </div>



            <div class='form-row'>
                <div class='form-group col-md-6'>
                  <label for='inputNome'>E-mail</label>
                  <input type='text' class='form-control' id='inputEmail4' name='EMAIL_AGENTE'>
                </div>
                <div class='form-group col-md-6'>
                  <label for='inputLogin'>Telefone</label>
                  <input type='text' class='form-control' id='inputPassword4' name='TELEFONE'>
                </div>
              </div>


              <div class='form-group'>
                <label for='inputAddress'>Observação</label>
                 <textarea class='form-control' id='exampleFormControlTextarea1' rows='3' name='OBS'></textarea>
              </div>

              <div class='form-group'>
                <label for='inputAddress2'>Setor</label>
                <select name='setor_NOME_SETOR' class='form-control form-control'>
        ";        
                  echo "<option>$setor_NOME_SETOR</option>";
                $obj= new Database;
                $resultado = $obj->connect("SELECT NOME_SETOR FROM setor ORDER BY NOME_SETOR ASC;");
                  while($linha=mysqli_fetch_array($resultado))
                   {
                    $NOME_SETOR = $linha['NOME_SETOR'];
                     echo "<option>$NOME_SETOR</option>";
                   }

        
        echo"        </select>
                
              </div>

           
      

      </div>
";




   
?>
        </tbody>
            </table>

            <div class="clearfix">
                <button type="submit" name="clicou_excluir" class="btn btn-danger">Inserir</button>
                <a href="index.php?session=<?php echo "$username_s";?>" class="btn btn-primary">Voltar</a>
            </div>
        
          </form>       

            </div>
        </div>
    </div>  
</div>   
</body>
</html>
