<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/adm.css">  

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
$status = isset($_GET['status']) ? $_GET['status'] : '';
$poder = isset($_GET['poder']) ? $_GET['poder'] : '';

function isSelected($status, $valorComparacao) {
    return ($status === $valorComparacao) ? 'selected' : '';
}
?>
<body>
    <section>
    <div class="col-12 header-col">
        <span class="title-section">Administradores</span>  
        <table class="adm-filters-table  col-4 ">
          <form action="adm.php" method="get">
            <tr>
             
                <th>
                    Status
                </th>
                <th>
                    Poder
                </th>
                <th>

                </th>
            </tr>

            <tr>
               

                  <td class="td-input ">
                    <div class="input-icon select-wrapper">
                    <select name="status" class="input-search" id="">
                      <option value="" <?php echo isSelected($status, '2'); ?> selected>Todos</option>
                      <option value="1" <?php echo isSelected($status, '1'); ?> >Ativo</option>
                      <option value="0" <?php echo isSelected($status, '0'); ?> >Inativo</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-arrow-down" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                      <path d="M8 12l4 4" />
                      <path d="M12 8v8" />
                      <path d="M16 12l-4 4" />
                    </svg></div> </td>



                    <td class="td-input ">
                      <div class="input-icon select-wrapper">
                      <select name="poder" class="input-search" id="">
                        <option value="" <?php echo isSelected($poder, '0'); ?>selected>Todos</option>
                        <option value="1"  <?php echo isSelected($poder, '1'); ?>>1 - Assistente</option>
                        <option value="2"  <?php echo isSelected($poder, '2'); ?>>2 - Deapartamento</option>
                        <option value="3"  <?php echo isSelected($poder, '3'); ?>>3 - Sistema</option>
                        <option value="4"  <?php echo isSelected($poder, '4'); ?>>4 - Administrador</option>
                        <option value="5"  <?php echo isSelected($poder, '5'); ?>>5 - Sysop</option>
                      </select>
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-arrow-down" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                        <path d="M8 12l4 4" />
                        <path d="M12 8v8" />
                        <path d="M16 12l-4 4" />
                      </svg></div> </td>

                      <td>
                        <button type="submit" class="send-button-filter">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M11.18 20.274l-2.18 .726v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v3" />
  <path d="M15 19l2 2l4 -4" />
</svg></button>
                      </td>
                      </form>
            </tr>
           </table> 
    </div>
</section>


<section>
  <div class="col-12 table-header-col">
    <table class="table-header">
      <tr class="table-header-row">
        <th class="table-header-th">
          ID do ADM
        </th>
        <th class="table-header-th">
          Nome
        </th>
        <th class="table-header-th">
          Email
        </th>
        <th class="table-header-th">
          Celular
        </th>
        <th class="table-header-th">
          Poder
        </th>
        <th class="table-header-th">
          Status
        </th>        
        <th class="table-header-th">
          Data
        </th>
        <th class="table-header-th">
          <a href="adm_new.php" class="add-link-icon"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="26" height="26" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4dbb69" fill="none" stroke-linecap="round" stroke-linejoin="round">
             <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
             <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
             <path d="M16 19h6" />
             <path d="M19 16v6" />
             <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
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
$pesquisa = [];

if (isset($_GET["pesquisa"])){
  $pesquisa["pesquisa"] = $_GET["pesquisa"];
}else{
  $pesquisa["pesquisa"] = "";
}

if(isset($_GET["status"])){
  $pesquisa["status"] = $_GET["status"];
}else{
  $pesquisa["status"] = "";
}
if(isset($_GET["poder"])){
  $pesquisa["poder"] = $_GET["poder"];
  }else{
    $pesquisa["poder"] = "";
    }
$r = $manager-> admTable($pesquisa);

for($i=0;$i<$r["result"];$i++){
  echo "
  <tr class='table-content-row'>
  
  <td>
  ".$r[$i]["ID_ADM"]."
</td>
<td>
  
".$r[$i]["nome"]."
</td>
<td>
 
".$r[$i]["email"]."
</td>
<td>
  
".$r[$i]["celular"]."
</td>
<td>
  
".$r[$i]["poder"]."
</td>
<td>
  
".$r[$i]["status"]."
</td>
<td>
  
".$r[$i]["data"]."
</td>

<td class='eye-td'>
  <a class='btn btn-eye' href='adm_view.php?id=".$r[$i]['ID_ADM']."'>
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
</section><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if(isset($_REQUEST["return"])){
  echo
  "
  <script>
  Swal.fire({
  icon: 'warning',
  title: 'Área Restrita',
  backdrop: false,
  text: 'Seu perfil não tem acesso à esse recurso.',
  });
  </script>
  ";
}

if(isset($_REQUEST["success"])){
  echo
  "
  <script>
  Swal.fire({
  icon: 'success',
  title: 'Sucesso',
  backdrop: false,
  text: 'Operação realizada com sucesso.',
  });
  </script>
  ";
}
?>
</body>
</html>