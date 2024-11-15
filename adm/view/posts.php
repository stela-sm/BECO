<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/transacoes.css">  

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
        <span class="title-section">Postagens</span>
        
        <form action="transacoes.php" method="get">
           <table class="adm-filters-table  col-3 ">
            <tr>
                <th>
                </th>
                
                
                <th style="padding-left:10px !important;">
                
                </th>
            </tr>

            <tr>
                <td class="td-input select-wrapper">
                  </td>



             

                    <td class="td-input ">
                     </td>

                    <td>
                       </td>
                  </tr>
</form>
           </table> 
    </div>
</section>


<section>
  <div class="col-12 table-header-col">
    <table class="table-header">
      <tr class="table-header-row">
        <th class="table-header-th">
          ID 
        </th>
        <th class="table-header-th">
          Título
        </th>
        <th class="table-header-th">
          Descrição     
      </th>
        <th class="table-header-th">
          Usuário
        </th>
       
        <th class="table-header-th">
          Data
        </th>        
        <th class="table-header-th">
          Status
        </th>
        
        <th class="table-header-th">
        </th>
      </tr>
  </div>

</section>

<section >
<?php
require "../model/manager.class.php";
$manager = new Manager();

$pesquisa = [];

if (isset($_GET["pesquisa"])){
  $pesquisa = $_GET["pesquisa"];
}else{
  $pesquisa = "";
}

$r = $manager-> postsTable(20,$pesquisa);
for($i=0; $i<$r["result"]; $i++){
  if($r[$i][0]["post_status"]='1'){
    $action = 'Inativar';
  }else{
    $action = 'Reativar';
  }
  echo "<tr class='table-content-row'>
      <td>
        ".$r[$i][0]["ID_POST"]."
      </td>
      <td>
        ".$r[$i][0]["titulo"]."
      </td>
         <td>
        ".$r[$i][0]["descricao"]."
      </td>
      <td>
        ".$r[$i][0]["username"]."
      </td>
     
      <td>
        ".$r[$i][0]["post_datahora"]."
      </td>
      <td>
        ".$r[$i][0]["post_status"]."
      </td>
     
  
<td class='eye-td'>
  <a class='btn btn-eye' href='#' ata-container='body' data-toggle='popover' data-placement='top'  data-html='true'  data-content=\"

   <button type='button' id='botao_acao' onclick='BDaction( ".$r[$i][0]["ID_POST"].", 1)' class='btn btn-primary btn-sm'>".$action."</button>
                    <button type='button' onclick='BDaction( ".$r[$i][0]["ID_POST"].", 2)'  class='btn btn-danger btn-sm'>Excluir</button>
  \">
    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='icon icon-tabler icons-tabler-outline icon-tabler-pencil'>
    <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
    <path d='M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4' />
    <path d='M13.5 6.5l4 4' />
</svg>


  </a>
</td>

      </tr>";}?>
    </table>
  </div>
</section>
<script>
 $(function () {
  $('[data-toggle="popover"]').popover()
})
$(function () {
  $('.popover-exemplo').popover({
    container: 'body'
  })
})
function BDaction(id,action){
  if(action == 2){
    if(confirm('Deseja excluir essa postagem?')){

    window.location.href = "../controller/controller.php?excluir=1&id="+id;
    }
  }else{
    const botao = document.getElementById('botao_acao');
const textoDoBotao = botao.textContent;
if(textoDoBotao == 'Reativar'){
      
    window.location.href = "../controller/controller.php?reativar=1&id="+id;
  }else{
    window.location.href = "../controller/controller.php?inativar=1&id="+id;
  }
}
}
</script>

</body>
</html>