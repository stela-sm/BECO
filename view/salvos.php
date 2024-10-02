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

    <link rel="stylesheet" href="../assets/style/portifolios.css">
    <script src="assets/js/texto_audio.js"></script>
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
        /* document.addEventListener('DOMContentLoaded', function () {
            if (window.top === window.self) {
                window.location.href = 'index.php';
            }
        })
 */
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
        .voltarBTN__voltar.vltrPMenuConfig >*{
            stroke: #000 !important;
            color: #000 !important;
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
        @media(max-width: 750px){
        .portifolios-viewport {
        margin-top: calc(9vh + 3%);
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

        }
        .vltrPMenuConfig {
        padding: 1%;
        position: relative;
        font-size: 16px;
        border: var(--default_border);
        background-color: #F9F9F9;
        height: 30%;
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
</head>

<body style="background-color:rgba(0,0,0,0);">
    <div class="portifolios-viewport">
        <a class="voltarBTN__voltar vltrPMenuConfig" id="vltrPMenuConfig">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 6l-6 6l6 6" /></svg>
            <span>Voltar para minhas publicações</span>
        </a>
        <h1 class="titulo-publi" style="font-size: 42.5px;">Publicações salvas</h1>
        <div class="container-portifolios" id="container-portifolios">
<!--OS CARDS DEVEM APARECER AQUI DENTRO!!-->
            <!--essa div "card-portifolio é toda a estrutura do portifolio!"-->
            <div class="card-portifolio">
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
<!--FIM DA DIV CARD PORTIFOLIO-->
        </div>
    </div>
    <br><br>
    <script>
        function adjustCardHeight() {
            const cards = document.querySelectorAll('.card-portifolio');
            cards.forEach(card => {
                const width = card.offsetWidth
                const height = width * 0.99
                card.style.height = `${height}px`
            });
            const firstCard = cards[0];
            if (firstCard) {
                const bannerHeight = firstCard.offsetWidth * 0.99
                window.parent.postMessage({
                    type: 'com.beco?bannerOffset/new',
                    bannerNOffsetH: bannerHeight
                }, '*');
                document.querySelector('#banner-central').style.height = `${bannerHeight}px`
            }
        }

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
        document.querySelector('#vltrPMenuConfig').addEventListener('click',()=>{
            window.parent.postMessage('vltrPMenuConfig', '*');
        })
















             //ESSA FUNCAO AQUI MANDA O INDEX ABRIR O MODAL DE PORTIFOLIO
        function Card__clickDetector(id) {
            window.parent.postMessage('modalClicked', '*');
        }
    </script>
</body>

</html>
