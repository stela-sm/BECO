<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/adm_new.css">  

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
            <img src="../assets/media/nopfp.png" id="botao_imagem" alt="Selecionar Imagem" style="cursor: pointer;">
            <form action="../controller/controller.php?adm_new=" enctype="multipart/form-data"name="form_adm_new" id="form_adm_new" method="post">
<!-- Input file oculto -->
<input type="file" id="input_file" style="display: none;"><br><br>
<i id="select_text">Selecione uma Foto de Perfil</i>
        </div>
        <table>
          <tr class="tr-coluna-lateral"><td class="td-coluna-lateral"><button id="info-button" onclick="criar()"  href="">Continuar</button></td></tr>
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
           
            <table class="adm-info-table"id="adm-info-table" >
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Nome Completo</label><br>
                  <input  name="nome" id="nome" required type="text" class="input  padrao" >
                </td>
                <td>
                  <label for="nome" class="label-padrao">Estado Cívil</label><br>
                  <input   type="text" name="estado" required class="input  padrao" >
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Email</label><br>
                  <input   type="text" name="email" required class="input  -padrao" >
                </td>
                <td>
                  <label for="nome" class="label-padrao">Celular</label><br>
                  <input   type="text" name="celular" required class="input  padrao" >
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">CPF</label><br>
                  <input   type="text" name="cpf" required class="input  padrao" >
                </td>
                <td>
                  <label for="nome" class="label-padrao">Aniversário</label><br>
                  <input   type="date" name="data_nascimento" required class="input  padrao" >
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">RG</label><br>
                  <input   type="text" name="rg" required class="input  padrao" >
                </td>
                <td>
                  <label for="nome" class="label-padrao">Poder</label><br>
                  <input   type="text" required class="input  padrao" >

              
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">CEP</label><br>
                  <input   type="text" required name="cep" class="input  padrao">
                </td>
                <td class="obs-td">
                  <label for="nome" class="label-padrao">Observações</label><br>
                  <input   type="text" required name="obs" class="input  padrao" >
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Número</label><br>
                  <input   type="text" required name="numero" class="input  padrao" >
                </td>
                    </tr>
            </table>




            <table class="adm-info-table"id="adm-finan-table" style="display: none;" >
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Tipo de Contrato</label><br>
                  <input   type="text" class="input  -padrao" value="Stela dos Santos Montenegro">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Período</label><br>
                  <input   type="text" class="input  -padrao" value="Stela dos Santos Montenegro">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Salário (Bruto)</label><br>
                  <input   type="text" class="input  -padrao" value="Stela dos Santos Montenegro">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Cargo</label><br>
                  <input   type="text" class="input  -padrao" value="Stela dos Santos Montenegro">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Benefícios</label><br>
                  <input   type="text" class="input  -padrao" value="Stela dos Santos Montenegro">
                </td>
                <td>
                  <label for="nome" class="label-padrao">Estado Civil</label><br>
                  <input   type="text" name="estado_civil" class="input  -padrao" value="Stela dos Santos Montenegro">
                </td>
                 
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Carteira de trabalho</label><br>
                  <input   type="text" class="input  -padrao" value="Stela dos Santos Montenegro">
                </td>
                <td class="obs-td">
                  <label for="nome" class="label-padrao">Observações</label><br>
                  <input   type="text" class="input  -padrao" value="Stela dos Santos Montenegro">
                </td>
                
              </tr>
              <tr>
                <td>
                  <label for="nome" class="label-padrao">Conta</label><br>
                  <input   type="text" class="input  -padrao" value="Stela dos Santos Montenegro">
                </td>
                
              </tr>
              </form>
            </table>
          </div>
        </div>
   
  </div>
  <script>
  
  var input = document.getElementById('input_file');
        var botaoImagem = document.getElementById('botao_imagem');

        botaoImagem.addEventListener('click', function() {
            input.click();
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

function criar(){
  if (confirm("Deseja criar o acesso deste administrador?") == true){
    $('#form_adm_new').submit();

    
  }
}

function changeTwo() {
  var info = document.getElementById("adm-info-table");
  info.style.display = "none"; 
  var finan = document.getElementById("adm-finan-table");
  finan.style.display = ""; 
}

  </script>
</body>
</html>