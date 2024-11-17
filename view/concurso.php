<!DOCTYPE html>
<html lang="pt-br">
<?php
require_once "../model/manager.class.php";
$manager = new Manager();
$concurso= $manager -> getConcursoAtual();
session_start();
if ($concurso["result"]==0){
// set the values if there isnt anyone at the actual time

}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portifolios</title>
  <meta property="og:title" content="BECO">
  <meta property="og:description" content="Criatividade sem limites">
  <meta property="og:image" content="../assets/media/logo/4.png">
  <meta property="og:url" content="https://www.example.com">
  <meta property="og:type" content="website">
  <link rel="stylesheet" href="../assets/style/portifolios.css">
  <script src="../assets/js/texto_audio.js"></script>
  <script src="../assets/js/teste.js"></script>
  <script src="../assets/js/jquery-3.7.1.min.js"></script>
  <script src="../assets/js/jquery-3.7.1.min.map"></script>

  <script>
            document.addEventListener('DOMContentLoaded', function() {
    var SoundIsOn = localStorage.getItem('com.beco/audio_recurso01x.all?ison');
    if (SoundIsOn === 'ativo') {
        inicializar2();
    }else if(SoundIsOn === 'desativado'){
        naoinicializar()
    }
});

</script>
<script>
  const concurso = '<?php echo $concurso['tag'] ?>'
</script>
  <script>
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
    document.addEventListener('contextmenu', function (event) {
      event.preventDefault();
    })

    document.addEventListener('dragstart', function (event) {
      event.preventDefault();
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
        SecurityTamR__isOn = false
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap"
    rel="stylesheet">
  <style>
      .liked svg{
            
            fill: #fff;
                  }
                  .saved svg{
                      
                      fill: #fff;
                            }
                  .no-liked svg{
                      
                      fill: transparent;
                            }
                            .no-saved svg{
                      
                      fill: transparent;
                            }
    /*CSS do banner*/
    .banner-central {
      display: flex;
      min-height: 260.5px;
      height: 213.5px;
      justify-content: center;
      align-items: center;
      text-align: left;
      width: 100%;
      border-radius: 8px;
      max-height: 275px;
    }
.slogan-visibleMajor.wht-txt{
  color: #fff !important;
}
#shareButtonIncorp > .default_color{
  color: #000 !important;
}
    .top-50 {
      top: 50%;
    }

    .banner-curtain,
    .portifolio-curtain {
      background-blend-mode: darken;

    }

    .banner-curtain {
      background-color: #000000c0;
    }

    .container-slogan {
      width: 90%;
    }

    .slogan-visibleMajor {
      font-size: 3rem;
      color: var(--blackWhite);
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
        margin-top: calc(9vh + 3%);
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
        display: flex;
        min-height: 260.5px;
        height: 213.5px;
        justify-content: center;
        align-items: center;
        text-align: left;
        width: 90%;
        border-radius: 8px;
        max-height: 275px;
      }

      #shareButtonIncorp {
        position: relative !important;
        bottom: 3%;
        right: 1%;
      }

      .bannerMobile__hashtagTimer {
        display: flex !important;
        flex-direction: row;
        justify-content: center;
        padding: 2% 0;
        align-items: center;
        width: 90%;
        border-radius: 8px;
        border: 1px solid #e8e8e8;
      }

      .bannerMobile__hashtagTimer .temp_name {
        width: 90%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;

      }
      .bannerMobile__hashtagTimer .temp_name >*{
        font-size: 25px;
      }
      .bannerMobile__hashtagTimer > .temp_name > #temporada-number{
        font-family: var(--title), system-ui;
      }
    }

    .bannerMobile__hashtagTimer {
      display: none;
    }

    .concursoBanner {
      display: flex;
      position: relative;
      flex-direction: column;
      justify-content: center;
      align-content: center;
      align-items: center;
      gap: 2vh;
      width: 100vw;
    }

    .containerLinkBanner {
      display: flex;
      cursor: pointer;
      flex-direction: row;
      gap: 1vw;
      padding: .5% 1.5%;
      border-radius: 20px;
      border: 1px solid #e8e8e8;
      justify-content: center;
      font-weight: bold;
      align-content: center;
      align-items: center;
    }

    .containerLinkBanner:focus {
      box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5);
    }

    .container-slogan>p {
      color: white;
      font-weight: bold;
    }

    #shareButtonIncorp {
      position: absolute;
      bottom: 3%;
      right: 1%;
    }
       /* STYLE PRA PÁGINA APARECER CUTE CUTE */
.fade-in-css {
    opacity: 0; 
    transition: opacity 0.5s ease; 
}

.fade-in {
    opacity: 1; 
}
.nothingText{
  text-align: center;
  width: 100vw;
  margin-top:20px;
  font-weight: bold;
}
  </style>
</head>
<?PHP
                                if(isset($concurso["data_fim"])){
                                    $data_inicio = $concurso['data_inicio'];
                                    $data_fim = $concurso['data_fim'];
                                    $data_inicio = new DateTime($data_inicio); 
                                    $data_fim = new DateTime($data_fim);
                                 }else{
                                     $data_inicio = new DateTime(); 
                                     $data_fim = new DateTime();
                                 }
                                                                 
                                
                                $data_atual = new DateTime();
                                if ($data_atual < $data_fim) {
                                    $diferenca = $data_fim->getTimestamp() - $data_atual->getTimestamp();
                                } else {
                                    $diferenca = 0;
                                } ?>
<body style="background-color:rgba(0,0,0,0);">
  <div class="portifolios-viewport">

    <div class="concursoBanner">
      <div class="banner-central relative ovrflw-hidden" id="banner-central">
        <div class="banner-curtain absolute w100 h100"></div>
        <div class="container-slogan absolute zIndex-3">
          <h3 class="slogan-visibleMajor  wht-txt" style="font-size: 50px; text-transform:uppercase;"><?php echo $concurso["titulo"]?></h3>
          <p><?php echo $concurso["descricao"]?></p>
        </div>
        <img ondrag="return false" src="../adm/assets/media/concursos/<?php echo $concurso["img_banner"]?>" alt="" class="img-curtain"
          id="img-bannerCurtain">
      </div>
      <div class="bannerMobile__hashtagTimer">
        <div class="temp_name">

          <span class="temp__number" id="temporada-number" style="font-size: 21px;"><?php echo $concurso['tag']?></span>
          <span class="time-remaining__countdown temporizador" id="temporizador"  >00d00h00m</span>
        </div>
      </div>
      <button id="shareButtonIncorp" class="containerLinkBanner">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000"
          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icons-tabler-outline icon-tabler-link">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M9 15l6 -6" />
          <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
          <path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
        </svg>
        <span class="default_color">Compartilhar Evento</span>
      </button>
    </div>
    <h1 class="titulo-publi" style="font-size: 42.5px;padding-top: 3%;">Publicações</h1>
    <div class="container-portifolios" id="container-portifolios">
  <!--OS CARDS DEVEM SER COLOCADOS AQUI DENTRO!-->

  <!--EXEMPLO DE CARD:-->
      <!-- <div class="card-portifolio">
        <a class="portifImg-container" style="position: relative;" onclick="Card__clickDetector(id)">
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
                  <span class="user-name truncate-text" style="color: #fff;" id="username-card">
                    Nome do artista
                  </span>
                </div>
                <div class="LikeSalvar__thumbContainer">
                  <button id="salvarPublicacao" class="botaoContainer_thumbInterativo">
                    <svg id="salvarPubli_btn" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                      viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-bookmark">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M18 7v14l-6 -4l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4z" />
                    </svg>
                  </button>
                  <button id="darLikePublicacao" class="botaoContainer_thumbInterativo">
                    <svg id="likePubli_btn" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                      viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-thumb-up">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path
                        d="M7 11v8a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-7a1 1 0 0 1 1 -1h3a4 4 0 0 0 4 -4v-1a2 2 0 0 1 4 0v5h3a2 2 0 0 1 2 2l-1 5a2 3 0 0 1 -2 2h-7a3 3 0 0 1 -3 -3" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div> -->



      
  <!--FIM DO EXEMPLO-->
    </div>
    <br><br></div>
  <script>
    // Função que atualiza o temporizador
    
    var diferenca = <?php echo $diferenca; ?>;
    //console.log(diferenca)
        function atualizarTemporizador() {
            // //console.log(diferenca+"cu")
            if (diferenca > 0) {
                diferenca--;
                var dias = Math.floor(diferenca / (24 * 60 * 60));
                var horas = Math.floor((diferenca % (24 * 60 * 60)) / (60 * 60));
                var minutos = Math.floor((diferenca % (60 * 60)) / 60);
                var segundos = diferenca % 60;

                // Formata a saída para sempre ter dois dígitos
                horas = horas < 10 ? "0" + horas : horas;
                minutos = minutos < 10 ? "0" + minutos : minutos;
                segundos = segundos < 10 ? "0" + segundos : segundos; // ta calculando os segundos mas fds
                // //console.log("porra")
               
                let countdowns = document.getElementsByClassName('temporizador');
for (let i = 0; i < countdowns.length; i++) {
    countdowns[i].innerHTML = dias + "d: " + horas + "h: " + minutos +'m';
}

            } else {
                let countdowns = document.getElementsByClassName('temporizador');
for (let i = 0; i < countdowns.length; i++) {
    countdowns[i].innerHTML = "TIMEOUT";

}
  clearInterval(intervalo);
            }
            
        }
        
        var intervalo = setInterval(atualizarTemporizador, 1000);
    document.getElementById('shareButtonIncorp').addEventListener('click', event => {
      if (navigator.share) {
        navigator.share({
          title: "Participe do concurso",
          url: "https://www.google.com"
        })
      }
    })
    document.addEventListener('contextmenu', function (event) {
      event.preventDefault();
    })
    document.addEventListener('dragstart', function (event) {
      event.preventDefault();
    })
    document.addEventListener('DOMContentLoaded', function () {
      var images = document.querySelectorAll('.img_portFolio');

      images.forEach(function (img) {
        img.setAttribute('onselect', 'return false')
        img.setAttribute('dragstart', 'return false')
      });
    })
  </script>

  <script>
    function Card__clickDetector(id){
            const message = {
        action: 'modalClicked',
        id: id
    };     window.parent.postMessage(message, '*');}
  </script>
  <script>
document.addEventListener('DOMContentLoaded', function() {
  atualizarTemporizador()
    setTimeout(function() {
        // Seleciona todos os elementos com a classe 'fade-in-css'
        const elements = document.querySelectorAll('.fade-in-css');
        
        // Adiciona a classe 'fade-in' a cada elemento encontrado
        elements.forEach(function(element) {
            element.classList.add('fade-in');
        });
    }, 100); // 1000 milissegundos = 1 segundo
});

  </script>
  
<script>
     //ESSA FUNÇÃO É O AJAX PRO SCROLL INFINITO NO SCROLL
let page = 0; 
let loading = false; 
let debounceTimer;
let search = "none";
$(window).scroll(function() {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            carregarPosts(search); // Chama a função para carregar mais posts
        }
    }, 200); // 200 ms de delay
});


function carregarPosts(search) {
    
 ////console.log("page=" + page)
    // //console.log("caralho")
    loading = true;
    $.ajax({
        url: '../controller/controller.php?loadconcurso=1&search='+search, 
        type: 'POST',
        data: { page: page,
             concurso: concurso
                    },
        dataType: 'json',
        success: function(data) {
         
            //console.log(data.offset)
            //console.log("Resposta do servidor:", data)
            if (data.result > 0){

             $.each(data, function(key, postsArray) {
            if (Array.isArray(postsArray)) {
                $.each(postsArray, function(index, post) { // Itera sobre cada post no array
                
                    adicionarPost(post.ID_POST, post.titulo, post.username, post.thumbnail)
                    page++
                })
            }
          
        })
        
        }else if(data.result == 0 && page == 0){
          nothing = "<p class='nothingText'>Ainda nenhuma publicação, seja o primeiro a participar!</p>"
          $('.container-portifolios').append(nothing);
            loading = false; 
        }},
        error: function() {
            loading = false
        }
    })
}

</script>

<script>
    //esse bloco é o append dos posts, decidi fazer separado pra não carregar a função ajax e agilizar o carregamento da página
   
    function adicionarPost(id,portfolioName, artistName, imageUrl) {

 var isLiked;
        $.ajax({
    url: '../controller/controller.php?checkLike=1', 
    type: 'POST',
    data: { id_post: id },  
    dataType: 'json',  
    success: function(data) {
        if (data.like) {
            // //console.log("Offset:", data.offset);  
             isLiked = data.like;
             isSave = data.save;               
            //  //console.log("Resposta do servidor:", isLiked + data.save);  
                   
    const postHtml = `
        <div class="card-portifolio fade-in-css">
            <a class="portifImg-container" style="position: relative;" onclick="Card__clickDetector(${id})">
                <div class="portifolio-curtain absolute w100 h100"></div>
                <img ondrag="return false" src="../assets/media/thumbnail/${imageUrl}" alt="" class="img_portFolio" onselect="return false" dragstart="return false">
               
            </a>
             <div class="portifolio-info pgfdKksa">
                    <div class="containerTranslate">
                        <div class="container-pictureInfoMinor relative">
                            <div class="author-portName">
                                <span class="portifolio-name truncate-text" id="portifolio-name" style="font-size: 12.5px;color: #fff;">
                                    ${portfolioName}
                                </span>
                                <span class="user-name truncate-text" style="color: #fff;" id="username-card">
                                    ${artistName}
                                </span>
                            </div>
                            <div class="LikeSalvar__thumbContainer">
                                <button id="salvarPublicacao"  class="botaoContainer_thumbInterativo saveButton ${isSave}" data-id-post="${id}">
                                    <svg id="salvarPubli_btn" xmlns="http://www.w3.org/2000/svg" width="18"
                                        height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-bookmark">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M18 7v14l-6 -4l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4z" />
                                    </svg>
                                </button>
                                <button id="darLikePublicacao" class="botaoContainer_thumbInterativo  likeButton ${isLiked}"  data-id-post="${id}" >
                                    <svg id="likePubli_btn" xmlns="http://www.w3.org/2000/svg" width="18"
                                        height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-thumb-up">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M7 11v8a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-7a1 1 0 0 1 1 -1h3a4 4 0 0 0 4 -4v-1a2 2 0 0 1 4 0v5h3a2 2 0 0 1 2 2l-1 5a2 3 0 0 1 -2 2h-7a3 3 0 0 1 -3 -3" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    `;
    $('.container-portifolios').append(postHtml);
    setTimeout(function() {
        $('.fade-in-css').addClass('fade-in'); // Adiciona a classe após 1 segundo
    }, 50); // 1000 milissegundos = 1 segundo
} else {
            //console.log("Nenhum dado retornado ou erro na resposta.");
        }
    },
    error: function(xhr, status, error) {
        console.error('Erro na requisição AJAX:', error);
        //console.log('Status:', status);
        //console.log('Resposta completa:', xhr.responseText);
    }
   });

    // Adiciona o HTML ao feed
    
}
</script>
<?php $id = isset($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : ''; 
?>
<script>
    $(document).on('click', '.likeButton', function() {    
                var button = $(this);
                var idPost = button.data('id-post');        
                var idUser = <?php echo $id ?>;
                var action = button.hasClass('liked') ? 'remove_like' : 'like';
                $.ajax({
                    url: '../controller/controller.php?like=1', 
                    type: 'POST',
                    data: {
                        action: action,
                        id_user: idUser,
                        id_post: idPost
                    },
                    success: function(response) {
                        // Lida com a resposta do servidor
                       
                        //console.log('Requisição bem-sucedida:', response);
                        if(response!='"added"'){
                            button.addClass('no-like').removeClass('liked');
                        }else{
                            button.addClass('liked').removeClass('no-liked');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Lida com erros
                        console.error('Erro na requisição:', status, error);
                        
                    }
                });
                // checkLikeStatus(idUser, idPost, button); essa função não precisa, já que o like já está sendo manipulado pelo ajax
            });
            $(document).on('click', '.saveButton', function() {    
                var button = $(this);
                var idPost = button.data('id-post');        
                var idUser = <?php echo $id ?>;
                var action =  button.hasClass('saved') ? 'remove_save' : 'save';
                $.ajax({
                    url: '../controller/controller.php?save=1', 
                    type: 'POST',
                    data: {
                        action: action,
                        id_user: idUser,
                        id_post: idPost
                    },
                    success: function(response) {
                        // Lida com a resposta do servidor
                       
                        //console.log('Requisição bem-sucedida:', response);
                        if(response!='"added"'){
                            button.addClass('no-saved').removeClass('saved');
                        }else{
                            button.addClass('saved').removeClass('no-saved');
                        }
                        
                    },
                    error: function(xhr, status, error) {
                        // Lida com erros
                        console.error('Erro na requisição:', status, error);
                        
                    }
                });
                // checkLikeStatus(idUser, idPost, button); essa função não precisa, já que o like já está sendo manipulado pelo ajax
            });
           
      
</script>
<script>
    function limpar(){
        $('.container-portifolios').empty()
    }
      window.addEventListener('message', function(event) {
        if (event.data.startsWith('#')) {
                //console.log('Mensagem recebida: ' + event.data)
                
            } else{
        //console.log("AAAAAAAAAAAAAAAAAAAAA"+event.data)
        limpar();
        carregarPosts(event.data)
    }});

</script>
  <script>
//essa função chama o ajax logo que  apágina carrega
$(document).ready(function () {
    carregarPosts(search);
    });

        </script>

<script>
    function encodeHash(filtro) {
    return filtro.replace(/#/g, '%23');
}

    function limpar(){
        $('.container-portifolios').empty()
    }
      window.addEventListener('message', function(event) {
        if (event.data.startsWith('#')) {
            if(event.data !== "#Limpar"){
                //console.log('Mensagem recebida: ' + event.data)
                filtro = event.data              
                const encodedFiltro = encodeHash(filtro);
                //console.log(encodedFiltro);
                limpar()
                carregarPosts(encodedFiltro)
            }else{
                location.reload();

            }
            } else{
        //console.log("AAAAAAAAAAAAAAAAAAAAA"+event.data)
        limpar();
        carregarPosts(event.data)
    }});

</script>
</body>

</html>
