<?php
session_start();
setcookie("ADM_ID", $_SESSION["ADM_ID"], time() + (86400 * 30), "/", "", false, true); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/sidebar.css">
    <title>BECO | Administração</title>
</head>
<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
        <span class="image">
            <img src="../assets/media/logo.png" alt="logo BECO">
        </span>
        <div class="text header-text">
    <span class="name">BECO</span>
    <span class="profession">Administração</span>
        </div>
            </div>
        </header>

        <div class="menu-bar">
            <div class="menu">
      
<?php
  require_once '../model/manager.class.php';
  $manager = new Manager();
  $ip = $manager -> getClientIP();
  $manager -> novoAcesso($ip);
  ?>

            <li class="nav-link">
                    <a href="dashboard.php" target="iframe">
                       <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-pie" width="26" height="26" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M10 3.2a9 9 0 1 0 10.8 10.8a1 1 0 0 0 -1 -1h-6.8a2 2 0 0 1 -2 -2v-7a.9 .9 0 0 0 -1 -.8" />
                            <path d="M15 3.5a9 9 0 0 1 5.5 5.5h-4.5a1 1 0 0 1 -1 -1v-4.5" /> 
                          </svg></span>
                          <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="adm.php" target="iframe">
                       <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-shield" width="26" height="26" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h2" />
                        <path d="M22 16c0 4 -2.5 6 -3.5 6s-3.5 -2 -3.5 -6c1 0 2.5 -.5 3.5 -1.5c1 1 2.5 1.5 3.5 1.5z" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                      </svg></span>
                          <span class="text nav-text">Admnistradores</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="users.php" target="iframe">
                       <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="26" height="26" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                      </svg></span>
                          <span class="text nav-text">Usuários</span>
                    </a>
                </li>

                <?php
if($_SESSION["ADM_PODER"] >= 3){
?>
   

                <li class="nav-link">
                    <a href="transacoes.php" target="iframe">
                       <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin" width="26" height="26" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                        <path d="M12 7v10" />
                      </svg></span>
                          <span class="text nav-text">Transações</span>
                    </a>
                </li>
<?php
              }
              
if($_SESSION["ADM_PODER"] >= 4){
              ?>
                <li class="nav-link">
                    <a href="developers.php" target="iframe">
                       <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-code-circle" width="26" height="26" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M10 14l-2 -2l2 -2" />
  <path d="M14 10l2 2l-2 2" />
  <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
</svg></span>
                          <span class="text nav-text">Developer</span>
                    </a>
                </li>
<?php
}
?>
                <li class="nav-link">
                    <a href="chamados.php" target="iframe">
                       <span><svg  xmlns="http://www.w3.org/2000/svg"  width="26"  height="26"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-message-circle-exclamation"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15.02 19.52c-2.34 .736 -5 .606 -7.32 -.52l-4.7 1l1.3 -3.9c-2.324 -3.437 -1.426 -7.872 2.1 -10.374c3.526 -2.501 8.59 -2.296 11.845 .48c1.96 1.671 2.898 3.963 2.755 6.227" /><path d="M19 16v3" /><path d="M19 22v.01" /></svg></span>
                          <span class="text nav-text">Chamados</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="registros.php" target="iframe">
                       <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-databricks" width="26" height="26" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M3 17l9 5l9 -5v-3l-9 5l-9 -5v-3l9 5l9 -5v-3l-9 5l-9 -5l9 -5l5.418 3.01" />
                      </svg></span>
                          <span class="text nav-text">Registros</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="conversas.php" target="iframe">
                       <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-messages" width="26" height="26" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />
                        <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" />
                      </svg></span>
                          <span class="text nav-text">Chat</span>
                    </a>
                </li>
<br><br>
                <li class="nav-link">
                    <a href="../controller/logout.php" >
                        <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="26" height="26" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M9 12h12l-3 -3" />
                            <path d="M18 15l3 -3" />
                          </svg></span>
                           <span class="text nav-text">LogOut</span>
                     </a>
                </li>
          



            </div>
        </div>
    </nav>
<section class="home"> 
  
    <div class="top-content">
<form action="index.php" method="get" id="pesquisar">
        <li class="nav-link"> 
          <button type="submit" class=" lupa-buscar">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="#707070" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
              </svg>
              </button>
            <input type="text" name="pesquisa" id="input-pesquisa" class="searchbar" placeholder="Pesquise...">
        </li>
        </form>

        <li class="nav-link-notifications">        <a href="" class="notifications"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
            <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
          </svg></a>
        </li>


          <li data-toggle="modal" data-target="#ExemploModalCentralizado" class="nav-link-profile-dropdown"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
          </svg>
          <a  href="#" class="profile-name">Bem Vindo, <?php echo  strtok($_SESSION['ADM_NOME'], " ,.!"); ?></a>
          
        </li>
    </div>
</section>
<section>
    <iframe id="iframe" class="iframe" name="iframe" src="dashboard.php" frameborder="0" ></iframe>
</section>





<!-- Modal -->
<div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-profile">
     
     <div class="col-12">
      <table>
        <tr>
        <td class="spacing-right">
     <div class="pfp-circle">
            <form action="../controller/controller.php?adm_update=<?php echo $_SESSION["ADM_ID"]?>" name="form_adm_update" enctype="multipart/form-data" enctype="multipart/form-data" id="form_adm_update" method="post">
            <img src="../assets/media/pfp/<?php echo $_SESSION["ADM_PFP"]?>" id="botao_imagem" alt="Selecionar Imagem" style="cursor: pointer;">
            </div>
            </td>
            <td>
  <p class="motal-title">
    <span class="name"><?php ECHO $_SESSION["ADM_NOME"]?>
    <br>
    ID: <?php echo  $_SESSION["ADM_ID"]?></span>
  </p>
  </td>
  </tr>
  <tr>
    <td class="spacing-right">
    </td>

    <td>
      <p class="info-title">
        Informações Pessoais
      </p>


      <table>
        <tr>
          <td>
            <label for="cpf" class="label-upper"> CPF</label>
            <br> <input type="text" name="cpf" class="input-bottom" value="40527647810">
          </td>
          <td>
            <label for="cpf" class="label-upper"> Poder</label>
            <br> <input type="text" name="cpf" class="input-bottom" value="<?php echo  $_SESSION["ADM_PODER"]?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="cpf" class="label-upper"> RG</label>
            <br> <input type="text" name="cpf" class="input-bottom" value="<?php echo  $_SESSION["ADM_RG"]?>">
          </td>
          <td>
            <label for="cpf" class="label-upper"> Email</label>
            <br> <input type="text" name="cpf" class="input-bottom" value="<?php echo  $_SESSION["ADM_EMAIL"]?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="cpf" class="label-upper"> Data de nascimento</label>
            <br> <input type="text" name="cpf" class="input-bottom" value="<?php echo  $_SESSION["ADM_DATAN"]?>">
          </td>
          <td>
            <label for="cpf" class="label-upper"> Estado Civil</label>
            <br> <input type="text" name="cpf" class="input-bottom" value="<?php echo  $_SESSION["ADM_ESTADO_CIVIL"]?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="cpf" class="label-upper"> CEP</label>
            <br> <input type="text" name="cpf" class="input-bottom" value="<?php echo  $_SESSION["ADM_CEP"]?>">
          </td>
          <td>
            <label for="cpf" class="label-upper"> Celular</label>
            <br> <input type="text" name="celular" class="input-bottom" value="<?php echo  $_SESSION["ADM_CELULAR"]?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="cpf" class="label-upper"> Número</label>
            <br> <input type="text" name="cpf" class="input-bottom" value="<?php echo  $_SESSION["ADM_NUMERO"]?>">
          </td>
          <td>
          <label for="cpf" class="label-upper"> Senha</label>
            <br> <input type="text" name="cpf" class="input-bottom" value="40527647810">
          </td>
        </tr>
      </table>
    </td>
  </tr>
  </table>
</div>
</div>
    </div>
  </div>
</div>

</div>
<script>
     document.getElementById('pesquisar').addEventListener('submit', function(event) {
            event.preventDefault(); 
            var iframe = document.getElementById('iframe');
            var inputValue = document.getElementById('input-pesquisa').value;
            var iframeSrc = iframe.contentWindow.location.href
        

            var iframeSrc = new URL(iframeSrc);

            iframeSrc.searchParams.set('pesquisa', inputValue);
            iframe.src = iframeSrc.toString();

            // Exiba a URL atualizada no console
            console.log('Link do iFrame:', iframe.src);
        });
</script>
</body>
</html>