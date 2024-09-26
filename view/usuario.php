<!DOCTYPE html>
<html lang="pt-br" style="background-color: var(--contentBG);">
<?php
session_start();

require_once "../model/manager.class.php";
$manager = new Manager();
$postagens= $manager -> getPostagensUser($_SESSION["USER_ID"]);

if ($postagens["result"]==0){

}
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@username | BECO</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="../assets/style/usuario.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

  <script src="https://unpkg.com/i18next/dist/umd/i18next.js"></script>
  <script src="https://unpkg.com/i18next/dist/umd/i18next.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.13.1/dist/sweetalert2.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com"><script src="../assets/js/teste.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <script></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      if (window.top === window.self) {
        window.location.href = '../index.php';
      }
    })
    window.addEventListener('message', function (event) {
      if (event.data === 'darkMode') {
        document.body.classList.toggle('dark');
      }
    })




    document.addEventListener('DOMContentLoaded', function () {
      var DarkMode__isOn = localStorage.getItem('DarkMode');
      if (DarkMode__isOn === '1') {
        document.body.classList.add('dark');
      } else {
        document.body.classList.remove('dark');
      }
    })

    
  </script>
    <script src="../assets/js/font.js"></script>
<script>
       document.addEventListener('DOMContentLoaded', function() {
    var fontTam = localStorage.getItem('com.beco_fonteWeb_localData');
    
    let SecurityTamP__isOn = false;
    let SecurityTamR__isOn = false;
    let SecurityTamG__isOn = false;
    
    if (fontTam == 'P') {
        SecurityTamP__isOn = true
        SecurityTamR__isOn = false
        SecurityTamG__isOn = false
        P__fontNVerif()
    } else if (fontTam == 'R') {
        SecurityTamP__isOn = false
        SecurityTamR__isOn = true
        SecurityTamG__isOn = false
        Regular__fontNVerif()
    } else if (fontTam == 'G') {
        SecurityTamP__isOn = false
        SecurityTamR__isOn = false
        SecurityTamG__isOn = true
        G__fontNVerif()
    }
}) 

</script>
</head>
<style>
  body,
  .container_viewport {
    background-color: var(--contentBG) !important;

  }
  @media(max-width: 750px){
        .portifolios-viewport {
        margin-top: calc(9vh + 3%);
    }
    }
  .banner-curtain,
  .portifolio-curtain {
    background-blend-mode: darken;

  }
.portifImg-container.create-curtain > span{
  color: #000 !important;
}
  .banner-curtain {
    background-color: #000000c0;
  }

  .container-slogan {
    width: 90%;
  }

  h3.wht-txt.slogan-visibleMajor {
    color: #fff !important;

  }

  .slogan-visibleMajor {
    font-size: 3rem;
    font-family: var(--title), system-ui;
    opacity: .85;
  }

  @media (width < 1400px) {
    .truncate-text {
      display: inline-block;
      max-width: 23ch;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }
  }

  @media (max-width: 750px) {
    .container-portifolios {
      display: flex;
      width: 100%;
      grid-template-columns: none;
      grid-template-rows: none;
      gap: 2vw;
      height: auto;
      align-content: center;
      align-items: center;
      justify-content: flex-start;
      justify-items: center;
      margin-bottom: calc(3vh + 1%) !important;
      flex-direction: column;
    }


    .portifImg-container img {
      width: 100%;
    }

    .containerTranslate {
      transform: translateX(0%) !important;
    }

    .container-pictureInfoMinor {
      display: flex;
      gap: 1vw;
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
      width: 91%;
      padding-left: 1%;
    }

    .portifolios-viewport {
      margin-top: calc(9vh + 2%);
    }

    .titulo-publi {
      display: none !important;
    }

    .portifImg-container {
      position: relative;
      height: 100%;
      border-radius: 8px 8px 8px 8px;
      overflow: hidden;
    }

    .banner-central {
      display: none !important;
    }
    .container-title__buttonsHeader > h1{
      font-size: 33.5px !important;
      font-weight: 900;
    }
  }
  .containerInform__resp{
    width: 100%;

  }
  .imagemContainerRESP{
    background-color: var(--default_background);
    border: var(--default_border);
    border-radius: 50%;
    height: 160px;
    width: 160px;
    
  }
  .userImg_resp{
    width: 100%;
    display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: center;
    align-items: center;
  }
  .userImg_resp >span{
    font-size: 15px;
  }
  .containerInform__resp{
    display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: center;
    align-items: center;
    gap: 3vh;
    margin-top: calc(11vh + 2%);
    width: 90%;
  }
  .containerGrid_respButtons{
    display: grid;
    flex-direction: row;
    gap: 2vh;
    align-items: center;
    width: 100%;
    justify-content: center;
    align-content: center;
    grid-template-columns: 1fr 1fr;
    flex-wrap: nowrap;
    /* width: 50%; */
    justify-items: center;
  }
  .normanEqualBTN{
    width: 100%;
    min-width: 2rem;
    height: 3rem;
    background-color: var(--default_background);
    border-radius: 8px;
    border: var(--default_border);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .bioRespContainer > p{
    text-align: center;
  }
  @media(min-width:751px){
    
    .containerInform__resp{
      display: none;
    }
    .container__madeCards-wkProfile {
    gap: 2vw;
    width: 100%;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
}.container-title__buttonsHeader {
    display: flex;
    position: relative;
    flex-direction: row;
    width: 100%;
    justify-content: space-between;
    align-items: center;
}
.notificacoesRepContainerFront{
      display: none;
    }
  }
  .main-content{
    position: relative;
  }        .vltrPMenuConfig {
        padding: 1%;
        position: relative;
        font-size: 16px;
        border: var(--default_border);
        background-color: #F9F9F9;
        height: 2.5rem;
        width: 30%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 1vw;
        border-radius: 59px;
    }
    #vltrPMenuConfig, #vltrPMenuConfig>*{
        cursor: pointer;
    }
    #vltrPMenuConfig:hover {
    border: 2px solid rgba(0, 123, 255, 0.5);
}

</style>

<body>

  <div class="container_viewport">
    <!-- MAIN VIEWPORT -->
    <main class="viewport d-flex ">
      <!--MAIN CONTENT -->
      <div class="main-content">
       <main class="notificacoesRepContainerFront" style="display: none;">
       <a class="voltarBTN__voltar vltrPMenuConfig" id="vltrPMenuConfig">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 6l-6 6l6 6" /></svg>
            <span>Voltar</span>
        </a>
       <div class="header_notificacoes">
                       <span>Notificações</span>
                       <div class="containerBotoes__noti">
                        <button id="marcarComoLido__noti" class="containerBotoes__noti-BTN">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="21"  height="21"  viewBox="0 0 24 24"  fill="none"  stroke="#e8e8e8"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mail"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
                        </button>
                        <button id="apagarTudo__noti" class="containerBotoes__noti-BTN">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="21"  height="21"  viewBox="0 0 24 24"  fill="none"  stroke="#e8e8e8"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </button>
                       </div>
                    </div><br>
        <div id="notificacoesResp"></div>
       </main>
        <!-- < isso é uma "div"!-->
        <div id="containerIframe" frameborder="0">
           <!--AREA DE INFORMAÇÕES RESPONSIVA!!-->
        <div class="containerInform__resp">
          <div class="userImg_resp">
            <div class="imagemContainerRESP">
              <img src="https://via.placeholder.com/120x120" alt="Imagem de perfil"><!--o alt deve ser o nome do usuario-->
            </div>
            <span>Nome do usuario</span>
          </div>
          <div class="bioRespContainer">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga doloribus ullam ut blanditiis</p>
          </div>
          <div class="containerGrid_respButtons">
            <button id="salvosRespBTN" class="normanEqualBTN">Salvos</button>
            <button id="configRespBTN" class="normanEqualBTN">Configurações</button>
            <button id="notifRespBTN" class="normanEqualBTN">Notificações</button>
            <button id="logoutRespBTN" class="normanEqualBTN LOGOUTSYS__BTN"style="font-weight:600;border: 1px solid rgb(255 0 0 / 50%) !important;color: rgb(255 0 0 / 50%) !important;">Logout</button>
          </div>
          <hr class="prof__divider">
        </div>


        <!--FIM DA AREA DE INFORMAÇÕES RESPONSIVA-->
          <header class="container-title__buttonsHeader">
            <h1 style="font-size: 3rem; font-family: 'Raleway' !important;">Publicações</h1>
            <div class="container-othrAcessButtons">
              <a href="#" class="acss-btn Profeql_btn" id="Profbtn-goTo_">trabalhos</a>
              <a href="#" class="acss-btn Profeql_btn" id="Profbtn-goTo_" style="border: none !important;">serviços</a>

            </div>
          </header>
          <div class="container__madeCards-wkProfile">
            <a class="card-portifolio card-fixed-CREATE" id="CRIARPUBLICACAO____PHP" style="text-decoration: none !important;" href="criarPublicacao.php">
              <div class="portifImg-container create-curtain" id="second__createSnInsdaj">
                <div><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none"
                    stroke="#c9c9c9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-photo-plus">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 8h.01" />
                    <path d="M12.5 21h-6.5a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6.5" />
                    <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l4 4" />
                    <path d="M14 14l1 -1c.67 -.644 1.45 -.824 2.182 -.54" />
                    <path d="M16 19h6" />
                    <path d="M19 16v6" /></svg>
                </div>
                <span style="text-decoration: none !important;">Criar Publicação</span>

              </div>
            </a>

<!--CARD POSTAGENS-->

<?php
for ($i=0;$i<$postagens['result'];$i++){

  echo "

<div class='card-portifolio'>
  <a class='portifImg-container' style='position: relative;' onclick='Card__clickDetector(".$postagens[$i]['ID_POST'].")'>
    <div class='portifolio-curtain absolute w100 h100'></div>
    <img ondrag='return false' src='../assets/media/thumbnail/".$postagens[$i]['thumbnail']."' alt='Thumbnail do projeto' class='img_portFolio'
      onselect='return false' dragstart='return false'>
    <div class='portifolio-info pgfdKksa'>
      <div class='containerTranslate'>
        <div class='container-pictureInfoMinor relative'>
          <div class='author-portName'>
            <span class='portifolio-name truncate-text' id='portifolio-name'
              style='font-size: 12.5px;color: #fff;'>
              ".$postagens[$i]['titulo']."
            </span>
          </div>
        </div>
      </div>
    </div>
  </a>
</div>



";
}
?>

            <!-- <div class="card-portifolio">
              <a class="portifImg-container" style="position: relative;" onclick="Card__clickDetector()">
                <div class="portifolio-curtain absolute w100 h100"></div>
                <img ondrag="return false" src="https://via.placeholder.com/215x200" alt="" class="img_portFolio"
                  onselect="return false" dragstart="return false">
                <div class="portifolio-info pgfdKksa">
                  <div class="containerTranslate">
                    <div class="container-pictureInfoMinor relative">
                      <div class="author-portName">
                        <span class="portifolio-name truncate-text" id="portifolio-name"
                          style="font-size: 12.5px;color: #fff;">
                          Nome do portifólio
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div> -->


          </div>

        </div>

      </div>
      <br><br></main>
  </div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="../assets/js/resppuchnoti.js"></script>
</body>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const notifRespBTN = document.getElementById('notifRespBTN')
    const vltrPMenuConfig = document.getElementById('vltrPMenuConfig')
    const notificacoesContainer = document.querySelector('.notificacoesRepContainerFront')

    if (notifRespBTN && vltrPMenuConfig && notificacoesContainer) {
        notifRespBTN.addEventListener('click', function() {
            notificacoesContainer.style.display = 'block'
        });

        vltrPMenuConfig.addEventListener('click', function() {
            notificacoesContainer.style.display = 'none'
        })
    }
})
  document.addEventListener('DOMContentLoaded', () => {
    loadNotificacoesUsuario()
    verificarNovoEnvioNotificacao()
})
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('notifications-container');

    if (container) {
        document.getElementById('apagarTudo__noti').addEventListener('click', function() {
            localStorage.removeItem('notifications');
            container.innerHTML = '';
            verif_qtdNotiUsuario();
        });

        document.getElementById('marcarComoLido__noti').addEventListener('click', function() {
            let notifications = JSON.parse(localStorage.getItem('notifications')) || [];
            notifications.forEach(notification => {
                notification.clicked = true;
            });
            localStorage.setItem('notifications', JSON.stringify(notifications));
            const notificationElements = document.querySelectorAll('#notifications-container .notification');
            notificationElements.forEach(notificationDiv => {
                notificationDiv.style.border = 'var(--default_border)';
            });
            verif_qtdNotiUsuario();
        });
    } else {
        console.error('Elemento notifications-container não encontrado');
    }
});
     //ESSA FUNCAO AQUI MANDA O INDEX ABRIR O MODAL DE PORTIFOLIO
  function Card__clickDetector(id) {
            window.parent.postMessage('modalClicked', '*');
        }
















        
  document.querySelector('#CRIARPUBLICACAO____PHP').addEventListener('click', function () {
    const parentDocument = window.parent.document;
    window.parent.postMessage('checkScreenSize__cP', '*');
    const link = parentDocument.querySelector('#criarPubli-link_sidebar');
    if (link) {
      link.click()
    }
  })
  document.addEventListener("DOMContentLoaded", function () {
    const images = document.getElementsByTagName('img');
    const allowedReferrer = window.location.hostname;

    for (let i = 0; i < images.length; i++) {
      let img = images[i];
      // ve se a img ta sendo carregada fora da pag
      if (document.referrer && new URL(document.referrer).hostname !== allowedReferrer) {
        img.src = 'https://via.placeholder.com/150/000000/FFFFFF?text=Imagem+Bloqueada';
      }
    }
  });


</script>

</body>

</html>
