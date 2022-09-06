<?php
include_once("config.php");
include_once("head.php");
include_once("Database.php");

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


if (isset($_REQUEST["situacao_edit"]) == "1")
{
  $mensagem=$_REQUEST["mensagem"];  
  echo "$mensagem";
}



$ID_AGENTES = trim($_REQUEST["ID_AGENTES"]);

  $obj= new Database;
  $resultado = $obj->connect("select * from agentes where ID_AGENTES='$ID_AGENTES' order by NOME_AGENTE asc");

  while($linha=mysqli_fetch_array($resultado))
   {
    
    $NOME_AGENTE = $linha['NOME_AGENTE'];
    $LOGIN_AGENTE=$linha['LOGIN_AGENTE'];

    $EMAIL_AGENTE=$linha['EMAIL_AGENTE'];
    $TELEFONE=$linha['TELEFONE'];

    $INICIO_ATIVIDADE=$linha['INICIO_ATIVIDADE'];
    $FIM_ATIVIDADE=$linha['FIM_ATIVIDADE'];
    $OBS=$linha['OBS'];
    $TELEFONE=$linha['TELEFONE'];
    $setor_NOME_SETOR=$linha['setor_NOME_SETOR'];

    echo "
     <form role='form' method='post' action='back_editar.php?session=$username_s'>
     
      <div>
              <div class='form-row'>
                <div class='form-group col-md-6'>
                  <label for='inputNome'>Nome</label>
                  <input type='text' class='form-control' id='inputEmail4' name='ID_AGENTES' value='$ID_AGENTES' hidden>
                  <input type='text' class='form-control' id='inputEmail4' name='NOME_AGENTE' value='$NOME_AGENTE'>
                </div>
                <div class='form-group col-md-6'>
                  <label for='inputLogin'>Matrícula</label>
                  <input type='text' class='form-control' id='inputPassword4' name='LOGIN_AGENTE' value='$LOGIN_AGENTE'>
                </div>
              </div>



            <div class='form-row'>
                <div class='form-group col-md-6'>
                  <label for='inputNome'>E-mail</label>
                  <input type='text' class='form-control' id='inputEmail4' name='EMAIL_AGENTE' value='$EMAIL_AGENTE'>
                </div>
                <div class='form-group col-md-6'>
                  <label for='inputLogin'>Telefone</label>
                  <input type='text' class='form-control' id='inputPassword4' name='TELEFONE' value='$TELEFONE'>
                </div>
              </div>


              <div class='form-group'>
                <label for='inputAddress'>Observação</label>
                 <textarea class='form-control' id='exampleFormControlTextarea1' rows='3' name='OBS'>$OBS</textarea>
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




   }
?>
        </tbody>
            </table>

            <div class="clearfix">
                <button type="submit" class="btn btn-danger">Alterar</button>
                <a href="index.php?session=<?php echo "$username_s";?>" class="btn btn-primary">Voltar</a>
            </div>
        
          </form>       

            </div>
        </div>
    </div>  
</div>   
</body>
</html>