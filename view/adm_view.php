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
$r = $manager-> getAdmData("$_REQUEST[id]");

?>

<body>
  
  <div class=" conteiner-flex row row-menu">
    
        <div class="col-2 coluna-lateral">
            <div class="pfp-circle">
                <img src="../assets/media/pfpjpg.jpg" alt="Foto de Perfil">
            </div>
            <span class="name-span"><?php echo $r[0]["nome"]?></span>
            <span class="data-span"><?php echo $r[0]["data"] ?></span>
                <table>
                    <tr class="tr-coluna-lateral"><td class="td-coluna-lateral"><button id="info-button" onclick="input('alterar')"  href="">Alterar informações</button></td></tr>
                    <?php if ($r[0]["status"] == 1){?>
                    <tr class="tr-coluna-lateral"><td class="td-coluna-lateral"><button href="" onclick="input('desativar', '<?php echo $r[0]['ID_ADM'] ?>')">Desativar Acesso</button></td></tr>
                    <?php }else{?>
                      <tr class="tr-coluna-lateral"><td class="td-coluna-lateral"><button href="" onclick="input('reativar', '<?php echo $r[0]['ID_ADM'] ?>')">Reativar Acesso</button></td></tr>
                    <?php }?>
                    
                    <tr class="tr-coluna-lateral"><td class="td-coluna-lateral"><button href="" onclick="input('excluir', '<?php echo $r[0]['ID_ADM'] ?>')" >Excluir Perfil</button></td></tr>
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
                <a class="nav-link" onclick="changeTwo()">Financeiro e Contrato</a>
              </li>
              </ul>
          </nav>
          <br>
          <div class="container-fluid table-container">
            <form action="../controller/controller.php?adm_update=<?php echo $r[0]["ID_ADM"]?>" name="form_adm_update" id="form_adm_update" method="post">
            <table class="adm-info-table"id="adm-info-table" >
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Nome Completo</label><br>
                  <input disabled name="nome" id="nome" type="text" class="input disabled padrao" value="<?php echo $r[0]["nome"] ?>">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Estado Cívil</label><br>
                  <input disabled  type="text" name="estado" class="input disabled padrao" value="<?php echo $r[0]["estado"] ?>">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Email</label><br>
                  <input disabled  type="text" name="email" class="input disabled -padrao" value="<?php echo $r[0]["email"] ?>">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Celular</label><br>
                  <input disabled  type="text" name="celular" class="input disabled padrao" value="<?php echo $r[0]["celular"] ?>">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">CPF</label><br>
                  <input disabled  type="text" name="cpf" class="input disabled padrao" value="<?php echo $r[0]["cpf"] ?>">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Aniversário</label><br>
                  <input disabled  type="date" name="data_nascimento" class="input disabled padrao" value="<?php echo $r[0]["datan"] ?>">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">RG</label><br>
                  <input disabled  type="text" name="rg" class="input disabled padrao" value="<?php echo $r[0]["rg"] ?>">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Poder</label><br>
                  <input disabled  type="text" class="input disabled padrao" value="<?php echo $r[0]["poder"] ?>" name="poder">

              
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">CEP</label><br>
                  <input disabled  type="text" name="cep" class="input disabled padrao" value="<?php echo $r[0]["cep"] ?>">
                </td>
                <td class="obs-td">
                  <label for="nome" class="label-padrao">Observações</label><br>
                  <input disabled  type="text" name="obs" class="input disabled padrao" value="<?php echo $r[0]["obs"] ?>">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Número</label><br>
                  <input disabled  type="text" name="numero" class="input disabled padrao" value="<?php echo $r[0]["numero"] ?>">
                </td>
                    </tr>
            </table>




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
              </form>
            </table>
          </div>
        </div>
   
  </div>
  <script>
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

function input(elemento, id){
  if (elemento == 'alterar'){
  var inputs = document.getElementsByTagName("input");  
  for (var i = 0; i < inputs.length; i++) {  
    inputs[i].disabled = false;  
  }
  var button = document.getElementById("info-button");
  button.innerHTML= "Salvar Informações"
  button.style.color = "green"
  button.style.border = "none"
  button.onclick = input2
}

if (elemento == 'desativar'){
  if (confirm("Deseja desativar o acesso deste administrador?") == true){
    window.open("../controller/controller.php?desativar_adm="+id);

    
  }
}
if (elemento == 'reativar'){
  if (confirm("Deseja reativar o acesso deste administrador?") == true){
    window.open("../controller/controller.php?reativar_adm="+id);
   
  }
}

if (elemento == 'excluir'){
  if (confirm("Deseja excluir permanentemente esse administrador? Aconselhamos apenas desativar seu acesso") == true){
    window.open("../controller/controller.php?excluir_adm="+id);
   
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