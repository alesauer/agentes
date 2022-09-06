<?php
include_once("config.php");
include_once("head.php");
include_once("Database.php");
include_once("logs.php");
//include_once("sessao.php");


$username_s = $_REQUEST['session'];

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
      
    </div>
  </div>
</nav>
<!--  End Menu -->
<br>





<?php

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
     <form action='back_editar.php.php' method='post'>
      <form>
      <div>
              <div class='form-row'>
                <div class='form-group col-md-6'>
                  <label for='inputNome'>Nome</label>
                  <input type='text' class='form-control' id='inputEmail4' value='$NOME_AGENTE' readonly>
                </div>
                <div class='form-group col-md-6'>
                  <label for='inputLogin'>Matrícula</label>
                  <input type='text' class='form-control' id='inputPassword4' value='$LOGIN_AGENTE' readonly>
                </div>
              </div>



            <div class='form-row'>
                <div class='form-group col-md-6'>
                  <label for='inputNome'>E-mail</label>
                  <input type='text' class='form-control' id='inputEmail4' value='$EMAIL_AGENTE' readonly>
                </div>
                <div class='form-group col-md-6'>
                  <label for='inputLogin'>Telefone</label>
                  <input type='text' class='form-control' id='inputPassword4' value='$TELEFONE' readonly>
                </div>
              </div>


              <div class='form-group'>
                <label for='inputAddress'>Observação</label>
                 <textarea class='form-control' id='exampleFormControlTextarea1' rows='3' readonly>$OBS</textarea>
              </div>

              <div class='form-group'>
                <label for='inputAddress2'>Setor</label>
                <select class='form-control form-control' readonly>
                          <option>$setor_NOME_SETOR</option>
                </select>
                
              </div>

           
      

      </div>
";

   }
?>
        </tbody>
            </table>

            <div class="clearfix">
             
                <a href="index.php?session=<?php echo "$username_s";?>" class="btn btn-primary">Voltar</a>
            </div>
        
          </form>       

            </div>
        </div>
    </div>  
</div>   
</body>
</html>