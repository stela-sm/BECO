
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifolios</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet"><script src="../assets/js/teste.js"></script>

    <link rel="stylesheet" href="assets/style/portifolios.css">
    <script src="assets/js/texto_audio.js"></script>
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/jquery-3.7.1.min.map"></script>
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
        document.addEventListener('DOMContentLoaded', function () {
            if (window.top === window.self) {
                window.location.href = 'index.php';
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
        document.addEventListener('contextmenu', function (event) {
            event.preventDefault();
        })

        document.addEventListener('dragstart', function (event) {
            event.preventDefault();
        })
    </script>
        <script src="assets/js/font.js"></script>
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
        .banner-curtain,
        .portifolio-curtain {
            background-blend-mode: darken;

        }

        .banner-curtain {
            background-color: #000000c0;
        }
        @media(max-width: 750px){
        .portifolios-viewport {
        margin-top: calc(9vh + 3%);
    }
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
                gap: 3.5vw;
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
        }

          /* STYLE PRA PÁGINA APARECER CUTE CUTE */
.fade-in-css {
    opacity: 0; 
    transition: opacity 0.5s ease; 
}

.fade-in {
    opacity: 1; 
}
    </style>
</head>
<?PHP

require_once "model/manager.class.php";
$manager = new Manager();
$r = $manager-> banner();

?>
<body style="background-color:rgba(0,0,0,0);">
    <div class="portifolios-viewport">
        <div class="banner-central relative ovrflw-hidden" id="banner-central">
            <div class="banner-curtain absolute w100 h100"></div>
            <div class="container-slogan absolute zIndex-3">
                <h3 class="slogan-visibleMajor  wht-txt" style="font-size: 50px;">CRIATIVIDADE SEM LIMITES</h3>
            </div>
            <img ondrag="return false" src="assets/media/banner/<?php echo $r;?>" alt="" class="img-curtain"
                id="img-bannerCurtain">
        </div>
        <h1 class="titulo-publi" style="font-size: 42.5px;padding-top: 3%;">Publicações</h1>
        <div class="container-portifolios" id="container-portifolios">
              <!--OS CARDS DEVEM SER COLOCADOS AQUI DENTRO!-->
  <!--EXEMPLO DE CARD:-->

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
                                    <span class="user-name truncate-text" style="color: #fff;" id="username-card">
                                        Nome do artista
                                    </span>
                                </div>
                                <div class="LikeSalvar__thumbContainer">
                                    <button id="salvarPublicacao" class="botaoContainer_thumbInterativo">
                                        <svg id="salvarPubli_btn" xmlns="http://www.w3.org/2000/svg" width="18"
                                            height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-bookmark">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M18 7v14l-6 -4l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4z" />
                                        </svg>
                                    </button>
                                    <button id="darLikePublicacao" class="botaoContainer_thumbInterativo">
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
                </a>
            </div> -->
   <!--FIM DO EXEMPLO-->
        </div>
        <br><br></div>
    <script>
        //TIREI ISSO PQ TAVA DEIXANDO O CARD DO INDEX MAIOR DO QUE O DO CONCURSO, TAVA MUITO ESTRANHO
        // function adjustCardHeight() {
        //     const cards = document.querySelectorAll('.card-portifolio');
        //     cards.forEach(card => {
        //         const width = card.offsetWidth
        //         const height = width * 0.98
        //         card.style.height = `${height}px`
        //     });
        //     const firstCard = cards[0];
        //     if (firstCard) {
        //         const bannerHeight = firstCard.offsetWidth * 0.99
        //         window.parent.postMessage({
        //             type: 'com.beco?bannerOffset/new',
        //             bannerNOffsetH: bannerHeight
        //         }, '*');
        //         document.querySelector('#banner-central').style.height = `${bannerHeight}px`
        //     }
        // }

        document.addEventListener('DOMContentLoaded', adjustCardHeight);
        window.addEventListener('resize', adjustCardHeight);
        window.addEventListener('load', adjustCardHeight);

        document.addEventListener('contextmenu', function (event) {
            event.preventDefault();
        })
        document.addEventListener('dragstart', function (event) {
            event.preventDefault();
        })
        document.addEventListener('DOMContentLoaded', function () {
            console.log(window.innerWidth)
            if (window.innerWidth >= 1300 && window.innerWidth > 1300) {
                var card_port = document.querySelector('.card-portifolio').offsetWidth
                console.log(card_port)
                var card_port = document.querySelector('.card-portifolio').style.height = `${card_port - 15}px`

                isDecimal = new RegExp(".");
                if (isDecimal.test(document.querySelector('.card-portifolio').style.width)) {
                    document.querySelector('.card-portifolio').style.width =
                        `${toFixed(document.querySelector('.card-portifolio').style.width)}px`
                }
                if (isDecimal.test(document.querySelector('.card-portifolio').style.height)) {
                    document.querySelector('.card-portifolio').style.height =
                        `${toFixed(document.querySelector('.card-portifolio').style.height)}px`
                }

                var images = document.querySelectorAll('.img_portFolio');

                images.forEach(function (img) {
                    img.setAttribute('onselect', 'return false')
                    img.setAttribute('dragstart', 'return false')
                })
            }
        })
    </script>
    <script>
        //ESSA FUNCAO AQUI MANDA O INDEX ABRIR O MODAL DE PORTIFOLIO
        function Card__clickDetector(id) {
            window.parent.postMessage('modalClicked', '*');
            enviarVariavel();
        }
      
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
       
        <script>
//essa função chama o ajax logo que  apágina carrega
$(document).ready(function () {
    carregarPosts();
    });

        </script>
<script>
     //ESSA FUNÇÃO É O AJAX PRO SCROLL INFINITO NO SCROLL
let page = 0; 
let loading = false; 
let debounceTimer;

$(window).scroll(function() {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            carregarPosts(); // Chama a função para carregar mais posts
        }
    }, 200); // 200 ms de delay
});


function carregarPosts() {
    // Evita que a função seja chamada várias vezes ao mesmo tempo
   
console.log("page=" + page)
    console.log("caralho")
    loading = true;
    $.ajax({
        url: 'controller/controller.php?loadposts=1', 
        type: 'POST',
        data: { page: page },
        dataType: 'json',
        success: function(data) {
            console.log(data.offset)
            console.log("Resposta do servidor:", data);
            if (data.result > 0){

             $.each(data, function(key, postsArray) {
            if (Array.isArray(postsArray)) {
                $.each(postsArray, function(index, post) { // Itera sobre cada post no array
                    adicionarPost(post.ID_POST, post.titulo, post.username, post.thumbnail);
                    page++;
                });
            }
          
        });
        
        }else{
           
            loading = false; 
        }},
        error: function() {
            
            loading = false;
        }
    });
}

</script>

<script>
    //esse bloco é o append dos posts, decidi fazer separado pra não carregar a função ajax e agilizar o carregamento da página
    function adicionarPost(id,portfolioName, artistName, imageUrl) {
    const postHtml = `
        <div class="card-portifolio fade-in-css">
            <a class="portifImg-container" style="position: relative;" onclick="Card__clickDetector(${id})">
                <div class="portifolio-curtain absolute w100 h100"></div>
                <img ondrag="return false" src="assets/media/thumbnail/${imageUrl}" alt="" class="img_portFolio" onselect="return false" dragstart="return false">
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
                                <button id="salvarPublicacao" class="botaoContainer_thumbInterativo">
                                    <svg id="salvarPubli_btn" xmlns="http://www.w3.org/2000/svg" width="18"
                                        height="18" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-bookmark">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M18 7v14l-6 -4l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4z" />
                                    </svg>
                                </button>
                                <button id="darLikePublicacao" class="botaoContainer_thumbInterativo">
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
            </a>
        </div>
    `;

    // Adiciona o HTML ao feed
    $('.container-portifolios').append(postHtml);
    setTimeout(function() {
        $('.fade-in-css').addClass('fade-in'); // Adiciona a classe após 1 segundo
    }, 100); // 1000 milissegundos = 1 segundo
}
</script>
</body>

</html>
