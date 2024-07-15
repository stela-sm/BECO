<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/adm_view.css">  

  <!--BOOTSTRAP EM PORTUGUêS -  NÃO USAR O GRINGO-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title>Administradores</title>
    <style>
      @font-face {
    font-family: radikal-medium;
    src: url(../Radikal/Nootype\ -\ Radikal\ Medium.otf);
  }
  @font-face {
    font-family: radikal-bold;
    src: url(../Radikal/Nootype\ -\ Radikal\ Bold.otf);
  }
  @font-face {
    font-family: radikal-light;
    src: url(../Radikal/Nootype\ -\ Radikal\ Thin.otf);
  }
    </style>
</head>
<?php
session_start();
require_once( "../model/manager.class.php");
$manager = new Manager();
$r = $manager-> getUserData("$_REQUEST[id]");

if($r[0]['pfp']==""){
  $r[0]['pfp'] == "nopfp.png";
  }
?>

<body>
  
  <div class=" conteiner-flex row row-menu">
  
        <div class="col-2 coluna-lateral">
            <div class="pfp-circle">
            <form action="../controller/controller.php?user_update=<?php echo $r[0]["ID_USER"]?>" name="form_user_update" enctype="multipart/form-data" enctype="multipart/form-data" id="form_user_update" method="post">
            <img src="../assets/media/pfp/<?php echo $r[0]['pfp'];  ?>" id="botao_imagem" alt="Selecionar Imagem" style="cursor: pointer;">
            </div>
            
            <input type="hidden" name="old_pfp" value="<?php echo $r[0]['pfp'];  ?>">
            <input type="file" id="input_file" name="pfp" disabled required name="pfp" style="display:none;">
            <span class="name-span"><?php echo $r[0]["username"]?></span>
            <span class="data-span"><?php echo $r[0]["data"] ?></span>
                <table>
                    <tr class="tr-coluna-lateral"><td class="td-coluna-lateral"><button id="info-button" onclick="input_change('alterar')"  href="">Alterar informações</button></td></tr>
                    <?php if ($r[0]["status"] == 1){?>
                    <tr class="tr-coluna-lateral"><td class="td-coluna-lateral"><button href="#" onclick="input_change('desativar', '<?php echo $r[0]['ID_USER'] ?>')">Desativar Acesso</button></td></tr>
                    <?php }else{?>
                      <tr class="tr-coluna-lateral"><td class="td-coluna-lateral"><button href="#" onclick="input_change('reativar', '<?php echo $r[0]['ID_USER'] ?>')">Reativar Acesso</button></td></tr>
                    <?php }?>
                    
                    <tr class="tr-coluna-lateral"><td class="td-coluna-lateral"><button href="#" onclick="input_change('excluir', '<?php echo $r[0]['ID_USER'] ?>')" >Excluir Perfil</button></td></tr>
                    <tr class="tr-coluna-lateral"><td class="td-coluna-lateral"><button href="">Mensagem</button></td></tr>
                </table>
        </div>
 

        <div class="col-9 menu-col">
          <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link active-link" onclick="change()"> Informações Pessoais <span class="sr-only">(Página atual)</span></a>
              </li>
              <li class="nav-item active">
                <span class="nav-link">|</span>
              </li>
              <li class="nav-item">
                <a class="nav-link" onclick="changeTwo()">Projetos</a>
              </li>
              </ul>
          </nav>
          <br>
          <div class="container-fluid table-container">
           
            <table class="adm-info-table"id="adm-info-table" >
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Nome de usuário</label><br>
                  <input disabled name="nome" id="nome" type="text" class="input disabled padrao" value="<?php echo $r[0]["username"] ?>">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Estado </label><br>
                  <input disabled  type="text" name="estado_civil" class="input-padrao" value="<?php echo $r[0]["estado"] ?>">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Nome Completo</label><br>
                  <input disabled  type="text" name="email" class="input-padrao" value="<?php echo $r[0]["email"] ?>">
                </td>
                <td>
                <label for="nome" class="label-padrao">País</label><br>
                <input disabled  type="text" name="pais" class="input-padrao" value="<?php echo $r[0]["pais"] ?>">
                </td>
              </tr>
              <tr>
                <td>
                <label for="nome" class="label-padrao">Email</label><br>
                <input disabled  type="text" name="email" class="input-padrao" value="<?php echo $r[0]["email"] ?>">
               
                 
                </td>
                <td>
                  <label for="nome" class="label-padrao">Seguidores</label><br>
                  <input disabled  type="date" name="data_nascimento" class="input-padrao" value="<?php echo $r[0]["datan"] ?>">
                </td>
              </tr>
              <tr>
                <td>
                <label for="nome" class="label-padrao">Celular</label><br>
                <input disabled  type="text" name="celular" maxlength="11" class="input-padrao" value="<?php echo $r[0]["celular"] ?>">
                </td>
                <td>
                <label for="nome" class="label-padrao">Seguindo</label><br>
                <input disabled  type="date" name="data_nascimento" class="input-padrao" value="<?php echo $r[0]["datan"] ?>">


              
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Biografia</label><br>
                  <input disabled  type="text" name="cep" maxlength="8" class="input-padrao" value="<?php echo $r[0]["bio"] ?>">
                </td>
                <td class="obs-td">
                  <label for="nome" class="label-padrao">Observações</label><br>
                  <input disabled  type="text" name="obs" class="input-padrao" value="<?php echo $r[0]["obs"] ?>">
                </td>
              </tr>
              <tr>
                <td>
                <label for="nome" class="label-padrao">Aniversário</label><br>
                <input disabled  type="date" name="data_nascimento" class="input-padrao" value="<?php echo $r[0]["datan"] ?>">
                </td>
                    </tr>
            </table>


            </form>


            <table class="adm-info-table"id="adm-finan-table" style="display: none;" >
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Tipo de Contrato</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Período</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Salário (Bruto)</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Cargo</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Benefícios</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Estado Civil</label><br>
                  <input disabled  type="text" name="estado_civil" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
                 
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Carteira de trabalho</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
                <td class="obs-td">
                  <label for="nome" class="label-padrao">Observações</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
                
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Conta</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
                
              </tr>
            </table>
          </div>
        </div>
   
  </div>
  <script>

  var input = document.getElementById('input_file');
        var botaoImagem = document.getElementById('botao_imagem');

        botaoImagem.addEventListener('click', function() {
          if (!input.disabled) {
            input.click();
          }
        });

        input.addEventListener('change', function() {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // Exibe a imagem selecionada na tela
                    botaoImagem.src = e.target.result;
                    
                    document.getElementById("select_text").value = "Imagem Selecionada";
                }

                reader.readAsDataURL(input.files[0]);
            }
        });
  


  function change() {
  var info = document.getElementById("adm-info-table");
  info.style.display = ""; 
  var finan = document.getElementById("adm-finan-table");
  finan.style.display = "none"; 



}

function changeTwo() {
  var info = document.getElementById("adm-info-table");
  info.style.display = "none"; 
  var finan = document.getElementById("adm-finan-table");
  finan.style.display = ""; 
}

function input_change(elemento, id){
  event.preventDefault();
  if (elemento == 'alterar'){
    var elements = document.querySelectorAll("input, select");
        for (var i = 0; i < elements.length; i++) {
            elements[i].disabled = false;
        }
  var button = document.getElementById("info-button");
  button.innerHTML= "Salvar Informações"
  button.style.color = "green"
  button.style.border = "none"
  button.onclick = input2
}

if (elemento == 'desativar'){
  if (confirm("Deseja desativar o acesso deste administrador?") == true){
     window.location.href = "../controller/controller.php?desativar_adm="+id;

    
  }
}
if (elemento == 'reativar'){
  if (confirm("Deseja reativar o acesso deste administrador?") == true){
     window.location.href = "../controller/controller.php?reativar_adm="+id;
   
  }
}

if (elemento == 'excluir'){
  if (confirm("Deseja excluir permanentemente esse administrador? Aconselhamos apenas desativar seu acesso") == true){
    window.location.href = "../controller/controller.php?excluir_adm="+id;
   
  }
}

}



function input2(){
  if (confirm("Deseja Salvar as Alterações?") == true){
    $('#form_adm_update').submit();
  }
}
  </script>
</body>
</html>