<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/chamados.css">  

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
        <span class="title-section">Chamados</span>
           <table class="adm-filters-table  col-3 ">
            <tr>
                
                <th>
                  
                </th>
                
                <th>

                </th>
            </tr>

            <tr>
               


                  <td class="td-input ">
                    <div class="input-icon select-wrapper">
                    </div> </td>
            </tr>
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
          Email
        </th>
        <th class="table-header-th">
         Mensagem
        </th>
        <th class="table-header-th">
          Data
        </th>
        <th class="table-header-th">
          Status
        </th>        
       
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
  </div>

</section>

<section>
<?php
require "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> chamadosTable();
for($i=0;$i<$r["result"];$i++){
      echo "<tr class='table-content-row'>
          <td>
            ".$r[$i]["ID_CHAMADO"]."
          </td>
          <td>
           ".$r[$i]["email"]."
          </td>
          <td>
            ".$r[$i]["mensagem"]."
          </td>
          
          <td>
            ".$r[$i]["datahora"]."
          </td>
          <td>
          <select disabled onclick='enableSelect(this, ".$r[$i]["ID_CHAMADO"]." )'>
            <option>".$r[$i]["status"]."</option>
            <option>Em análise</option>
            <option>Aguardando Retorno</option>
            <option>Rejeitada</option>
            <option>Finalizada</option>
          </select>
          
            </td>
          
         

<td class='eye-td'>
  <a class='btn btn-eye'  >
<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='icon icon-tabler icons-tabler-outline icon-tabler-pencil'>
    <path stroke='none' d='M0 0h24v24H0z' fill='none' />
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
  function enableSelect(select, id){
    select.disabled = false;
    select.addEventListener('change', function(){
      var status = select.value;
      var id = id;
      $.ajax({
        type: "POST",
        url: "update_status.php",
        data: {status: status, id: id},
        success: function(){
          alert("Status atualizado com sucesso!");
          }
          });
        })}
</script>

</body>
</html>