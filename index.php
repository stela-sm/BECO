<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/login.css">
    <title>Login ADM </title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-flex container-center">
        <div class="col-12 div-form">
    <form method="post" action="controller/controller.php">
        <h2>Olá, administrador!</h2><br/>
        <h6>Por Favor, insira seu email e senha</h6>
        <input type="hidden"  name="login_adm" value="1">
        <input type="text" placeholder="Email..." id="adm" name="adm"><br/>
        <input type="password" placeholder="Senha..." id="" name="senha"><br/><br/>
        <input type="submit" value="Entrar"/>
        <button type="button" class="button-password" data-toggle="modal" data-target="#modalExemplo">
  Esqueci minha senha
</button>   
    </form>
    </form>
    </div>
    </div>
    <?php
    session_start();
if(isset($_REQUEST["msg"])){
	$cod = $_REQUEST["msg"];
	require_once "model/msg.php";
	echo "<script>alert('" . $MSG[$cod] . "');</script>";
    unset($cod);
}

?>

<!-- Botão para acionar modal -->


<!-- Modal -->

<div class="modal fade" id="modalExemplo" data-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperar Senha</h5>
        <button type="button" onclick="limpar();" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

      <form method="post" class="form_1 <?php if(isset($_REQUEST["form2"]) || isset($_REQUEST["senha"]) || isset($_REQUEST["sucesso"]) || isset($_REQUEST["erro"])){echo 'display-none';}?>" action="controller/controller.php?recuperar=1">
        <input type="hidden" name="recuperar" value=1>
        <label class="label-rec" for="email">Insira seu email cadastrado para receber o código de verificação</label>
        <input type="text" class="input-rec" required placeholder="Email..." id="email" name="email">
        <button type="submit" class="btn btn-primary">Verificar</button>
        
    </form> 





    <form method="post" class="form_2 <?php if(!isset($_REQUEST["form2"])){echo 'display-none';}?>" action="controller/controller.php?verificar=1">
        <label class="label-rec" for="email">Insira o código recebido no
            email</label>
            <input type="text" class="input-rec" required placeholder="Código..." id="codigo" name="codigo">
     
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Verificar</button>
        </div> 
        </form>
   





        <form method="post" class="form_2 <?php if(!isset($_REQUEST["senha"])){echo 'display-none';}?>" action="controller/controller.php?newpass=1">
        <label class="label-rec" for="email">Defina uma nova senha</label>
            <input type="password" class="input-rec" minlength="6" required placeholder="Mínimo de 6 caracteres" id="senha" name="senha">
     
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Verificar</button>
        </div> 
        </form>






        <form method="post" class="form_1 <?php if(!isset($_REQUEST["erro"])){echo 'display-none';}?> ">
            <p>Dados inválidos, por favor tente novamente</p>    
    </form>


  


    <form method="post" class="form_1 <?php if(!isset($_REQUEST["sucesso"])){echo "display-none";}?> ">
            <p>Senha alterada com sucesso!</p>    
    </form>




    </div>
  </div>
</div>

     <script>
         $(document).ready(function() {
            // Função para obter o valor de um parâmetro GET
            function getQueryParam(param) {
                let urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(param);
            }

            // Verifica se o parâmetro "form2" está presente no GET
            if (getQueryParam('form2')) {
                $('#modalExemplo').modal('show');
            }
            if (getQueryParam('senha')) {
                $('#modalExemplo').modal('show');
            }if (getQueryParam('sucesso')) {
                $('#modalExemplo').modal('show');
            }if (getQueryParam('erro')) {
                $('#modalExemplo').modal('show');
            }
        });

        function limpar(){
          let url = new URL(window.location.href);
          url.search = "";
          window.history.replaceState(null, null, url);

window.location.reload();



        }
        $('#modalExemplol').modal({
    backdrop: 'static',
    keyboard: false
  });
     </script>
</body>
</html>