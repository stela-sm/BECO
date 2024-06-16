<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/registros.css">  

  <!--BOOTSTRAP EM PORTUGUêS -  NÃO USAR O GRINGO-->
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
    <section>
    <div class="col-12 header-col">
        <span class="title-section">Registros</span>
           <table class="adm-filters-table  col-3 ">
            <tr>
                <th>
                    Data
                </th>
                <th>
                    
                </th>
                
                <th>

                </th>
            </tr>

            <tr>
                <td class="td-input select-wrapper">
                  <div class="input-icon"><input type="month" value="2024-01-01" id="dateInput" class="  input-search date">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-search" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M11.5 21h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4.5" />
                    <path d="M16 3v4" />
                    <path d="M8 3v4" />
                    <path d="M4 11h16" />
                    <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    <path d="M20.2 20.2l1.8 1.8" />
                  </svg></div> </td>






            </tr>
           </table> 
    </div>
</section>


<section>
  <div class="col-12 table-header-col">
    <table class="table-header">
      <tr class="table-header-row">
      
        <th class="table-header-th">
          Nome do Arquivo
        </th>
  
        <th class="table-header-th">
          Data de Criação
        </th>
        
      </tr>
  </div>

</section>

<section>
  
<?php
$caminho = "log/";

$arquivos = scandir($caminho);

$arquivos = array_diff($arquivos, array('..', '.'));


foreach ($arquivos as $arquivo) {
  
  echo "
     <tr class='table-content-row'>
         
          <td>
             $arquivo
          </td>
          
          <td>
            ".date("Y-m-d H:i:s", filectime("$caminho/$arquivo"))."
          </td>
          
          <td class='eye-td'>
         <a href='".$caminho.$arquivo ."' class='btn btn-eye' download><svg xmlns='http://www.w3.org/2000/svg' class='con icon-tabler icon-tabler-download' width='44' height='24' viewBox='0 0 24 24' stroke-width='1.5' stroke='#2c3e50' fill='none' stroke-linecap='round' stroke-linejoin='round'>
  <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
  <path d='M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2' />
  <path d='M7 11l5 5l5 -5' />
  <path d='M12 4l0 12' />
</svg></a>
          </td>
      </tr>
    
 ";   
    
}
?>
     
    </table>
  </div>
</section>
<script>
 
</script>
 <!-- Botão de download -->

</body>
</html>