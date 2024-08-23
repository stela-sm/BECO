<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--BOOTSTRAP EM PORTUGUêS -  NÃO USAR O GRINGO-->
    <link rel="stylesheet" href="../assets/style/developers.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title>Usuários</title>
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

    <div class="container-flex">
    <div class="row">
        <div class="col-8 col-esquerda" >
        <div class="col-12 col-concursos" >
        
        <span class="title-section">Concursos</span>
     
    <table class="table-header">
      <tr class="table-header-row">
        <th class="table-header-th">
          ID 
        </th>
        <th class="table-header-th">
          Título
        </th>
        <th class="table-header-th">
          Tag
        </th>
        <th class="table-header-th">
            Publicações
        </th>
        <th class="table-header-th">
          Data Início
        </th>        
        <th class="table-header-th">
          Data Fim
        </th>
        <th></th>
        
        
        
      </tr>


      <?php
  
  require "../model/manager.class.php";
  
  $manager = new Manager();
  $r = $manager-> getConcursoData();
  
  for($i=0;$i<$r["result"];$i++){
    echo "
    <tr class='table-content-row'>
    
    <td>
    ".$r[$i]["ID_CONCURSO"]."
  </td>
  <td>
    
  ".$r[$i]["titulo"]."
  </td>
  <td>
   
  ".$r[$i]["tag"]."
  </td>
  <td>
    
  ".$r[$i]["descricao"]."
  </td>
  <td>
    
  ".$r[$i]["data_inicio"]."
  </td>
  <td>
    
  ".$r[$i]["data_fim"]."
  </td>
  
  <td class='eye-td'>
    <a class='btn btn-eye' href='adm_view.php?id=".$r[$i]['ID_CONCURSO']."'>
      <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-eye' width='26' height='26' viewBox='0 0 24 24' stroke-width='1.5' stroke='#2c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'>
        <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
        <path d='M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0' />
        <path d='M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6' />
      </svg>
    </a>
  </td>
  </tr>";
  }
  ?>
    </table>

        </div>
    <div class="col-12 col-banner"  >
  
    <span class="title-section">Banner Principal</span>
     
     <table class="table-header">
       <tr class="table-header-row">
         <th class="table-header-th">
           ID 
         </th>
         <th class="table-header-th">
           Imagem
         </th>
         <th class="table-header-th">
           Data
         </th>
         <th class="table-header-th">
            Status
         </th>
         <th class="table-header-th">

        </th>        
         <th class="table-header-th">
         </th>
         <th></th>
         <th class="table-header-th">
         <a href="user_new.html"> <svg xmlns="http://www.w3.org/2000/svg" class=" add icon icon-tabler icon-tabler-circle-plus" width="26" height="26" viewBox="0 0 24 24" stroke-width="1.5" stroke="green"fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
  <path d="M9 12h6" />
  <path d="M12 9v6" />
</svg>
        </a>
        </th>
       </tr>



       <?php
  
  $r = $manager-> getBannerData();
  
  for($i=0;$i<$r["result"];$i++){
    echo "
    <tr class='table-content-row'>
    
    <td>
    ".$r[$i]["ID_BANNER"]."
  </td>
  <td>
    
  ".$r[$i]["img"]."
  </td>
  <td>
   
  ".$r[$i]["datahora"]."
  </td>
  <td>
    
  ".$r[$i]["status"]."
  </td>
  <td class='eye-td'>
    <a class='btn btn-eye' href='adm_view.php?id=".$r[$i]['ID_BANNER']."'>
      <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-eye' width='26' height='26' viewBox='0 0 24 24' stroke-width='1.5' stroke='#2c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'>
        <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
        <path d='M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0' />
        <path d='M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6' />
      </svg>
    </a>
  </td>
  </tr>";
  }
  ?>
     </table>
    </div>
    </div>
    <div class="col-4 col-direita"  >
       
    <span class="title-section">Novo Concurso</span>
    <br>

    <form action="../controller/controller.php?concurso=1;" class="novo-concurso">

<label for="" class="label-padrao">Título</label>
<label for="" class="label-padrao">Tag</label><br>
<input type="text" name="title" id="" class="input-padrao">
<input type="text" name="tag" id="tagInput" class="input-padrao">
<br>

<label for="" class="label-padrao">Data Início</label>
<label for="" class="label-padrao">Data Fim</label><br>
<?php
$date = $manager ->  getUltimaDataFim();
$minDate = new DateTime($date['data_fim']);
$minDate->modify('+10 days');
$formattedDate = $minDate->format('Y-m-d');
?>
<input type="date" disabled name="title" id="" value="<?php echo htmlspecialchars($date['data_fim']); ?>" class="input-padrao">
<input type="date" name="tag" id="" class="input-padrao" min="<?php echo htmlspecialchars($formattedDate); ?>"> 
<br>

<label for="" class="label-padrao">Descrição</label><br>
<textarea name="tag" id="" class="input-descricao" maxlength="100"></textarea>
<br>

<label for="" class="label-padrao">Imagem Anúncio</label>
<label for="" class="label-padrao">Imagem Banner</label><br>


<div class="upload-container">
<!-- IMAGEM ANUNCIO-->
<div class="upload-square" id="uploadSquare">
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-upload" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#888" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M14 3v4a1 1 0 0 0 1 1h4" />
  <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
  <path d="M12 11v6" />
  <path d="M9.5 13.5l2.5 -2.5l2.5 2.5" />
</svg>
    <input type="file" id="fileInputOne" accept="image/*" style="display: none;">
</div>

<!-- IMAGEM BANNER-->
<div class="upload-rectangle" id="uploadRectangle">
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-upload" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#888" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M14 3v4a1 1 0 0 0 1 1h4" />
  <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
  <path d="M12 11v6" />
  <path d="M9.5 13.5l2.5 -2.5l2.5 2.5" />
</svg>
    <input type="file" id="fileInputTwo" accept="image/*" style="display: none;">
</div>
</div>

<button type="submit" class="sendButton">Salvar</button>
    </form>
    </div>
</div>
</div>
<script>
  const uploadSquare = document.getElementById('uploadSquare');
  const uploadRectangle = document.getElementById('uploadRectangle');
const fileInputOne = document.getElementById('fileInputOne');
const fileInputTwo = document.getElementById('fileInputTwo');

uploadSquare.addEventListener('click', () => {
    fileInputOne.click();
});

uploadRectangle.addEventListener('click', () => {
    fileInputTwo.click();
});


fileInputOne.addEventListener('change', (event) => {
    var file = event.target.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            uploadSquare.style.backgroundImage = `url(${e.target.result})`;
        };
        reader.readAsDataURL(file);
    }
});


fileInputTwo.addEventListener('change', (event) => {
    var file = event.target.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            uploadRectangle.style.backgroundImage = `url(${e.target.result})`;
        };
        reader.readAsDataURL(file);
    }
});


const maskedInput = document.getElementById('tagInput');
maskedInput.addEventListener('input', function () {
    let sanitizedValue = this.value.replace(/[^a-zA-Z0-9]/g, '');
    
    if (!sanitizedValue.startsWith('#')) {
        sanitizedValue = '#' + sanitizedValue;
    }

    if (sanitizedValue.length > 1) {
        sanitizedValue = '#' + sanitizedValue.charAt(1).toUpperCase() + sanitizedValue.slice(2);
    }

    this.value = sanitizedValue;
});

</script>
</body>
</html>