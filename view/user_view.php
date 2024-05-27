<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/user_view.css">  

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
<body>
  <div class=" conteiner-flex row row-menu">
    
        <div class="col-2 coluna-lateral">
            <div class="pfp-circle">
                <img src="../assets/media/pfpjpg.jpg" alt="Foto de Perfil">
            </div>
            <span class="name-span">Stela dos Santos Montenegro</span>
            <span class="data-span">Desde 01/01/2024</span>
                <table>
                    <tr class="tr-coluna-lateral"><td class="td-coluna-lateral"><button id="info-button" onclick="input()"  href="">Alterar informações</button></td></tr>
                    <tr class="tr-coluna-lateral"><td class="td-coluna-lateral"><button href="">Desativar Acesso</button></td></tr>
                    <tr class="tr-coluna-lateral"><td class="td-coluna-lateral"><button href="">Excluir Perfil</button></td></tr>
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
                <a class="nav-link" onclick="changeTwo()">Postagens</a>
              </li>
              </ul>
          </nav>
          <br>
          <div class="container-fluid table-container">
            <table class="adm-info-table"id="adm-info-table" >
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Nome de usuário</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Descrição</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Email</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Celular</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">CPF</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Aniversário</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Cidade</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Seguidores</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Estado</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
                <td class="obs-td">
                  <label for="nome" class="label-padrao">Observações</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Seguindo</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
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
                  <label for="nome" class="label-padrao">Poder</label><br>
                  <input disabled  type="text" class="input disabled -padrao" value="Stela dos Santos Montenegro">
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

function input(){
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

function input2(){
  if (confirm("Deseja Salvar as Alterações?") == true){
    alert("vai alterar")
  }
}
  </script>
</body>
</html>