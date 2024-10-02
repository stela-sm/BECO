<!DOCTYPE html>
<html lang=pt-br" style="background-color: var(--contentBG);">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pesquisar Portifólios | BECO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"><script src="../assets/js/teste.js"></script>

    <script src="../assets/js/texto_audio.js"></script>
    <script>
            document.addEventListener('DOMContentLoaded', function() {
    var SoundIsOn = localStorage.getItem('com.beco/audio_recurso01x.all?ison');
    if (SoundIsOn === 'ativo') {
        inicializar2();
    }else{
        naoinicializar()
    }
});

</script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.top === window.self) {
                window.location.href = '../index.php';
            }
        })
        //receber se um card foi clicado ou nao
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
</head>
<style>
    #mdoalAvisoTOTAL {
        z-index: 99999999;
    }

    * {
        font-size: 1rem;
    }

    /*só essa pagina tem isso*/
    body {
        overflow: auto;
        background-color: var(--contentBG) !important;

    }
    @media(max-width: 750px){
        .portifolios-viewport {
        margin-top: calc(9vh + 3%);
    }
    }
    @media (min-width: 1400px) {
        .thumbBox {
            cursor: pointer;
            position: relative;
            height: 29vh !important;
            width: 100%;
            background-color: var(--default_background);
            border: var(--default_border);
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
    }

    /*fim*/
    /*FONTES PROVISÓRIAS*/
    @font-face {
        font-family: "Radikal Regular";
        src: url(../assets/fonts/Radikal/RadikalTrial-Regular-BF642254c157251.otf);
    }

    @font-face {
        font-family: "Title";
        src: url(../assets/fonts/Stapel/Stapel_Bold.otf);
    }

    @font-face {
        font-family: 'Logo';
        src: url(../assets/fonts/Radikal/RadikalTrial-Black-BF642254c139184.otf);
    }

    @font-face {
        font-family: "Italic Title";
        src: url(../assets/fonts/Stapel/Stapel_Bold\ Italic.otf);
    }

    @font-face {
        font-family: "Regular Title";
        src: url(../assets/fonts/Stapel/Stapel_Regular.otf);
    }

    /*FIM DA ÁREA DE FONTES PROVISÓRIAS*/
    /*ROOT: cores, fontes e tamanhos padronizados*/
    :root {
        --regular-title: "Regular Title";
        --italic-title: "Italic Title";
        --title: "Title";
        --logo: "Logo";
        --regular-body: "Radikal Regular";

        --FullWidth: 100%;
        --FullHeight: 100%;
        --Fullvw: 100vw;
        --Fullvh: 100vh;
        --contentBG: #fff;
        --sidebar_shadow: 4px 4px 16px -7px rgba(0, 0, 0, 0.096);
        --default_border: 1px solid #e8e8e8;
        --default_background: #f9f9f9;
        --offwhite: #F0F0F0;
        --white: #f2f2f2;

        --default-color: #000;
        --webkit-scrollbar: var(--transparent-bg);
        --user-color: #191919;
        --transparent-bg: transparent;
        --divider-border: #e7e7e7;
        --congrats_background: #f9f9f9;
        --blackWhite: #fff;

        --min-font-size: 10px;
        --interMin-font-size: 15px;
        --interMed-font-size: 16px;
        --med-font-size: 17px;
        --regular-font-size: 23px;
        --extra-font-size: 2rem;
        --major-font-size: 3rem;

    }

    /*fim do root*/
    /*cores para modo dark*/
    .dark {
        --contentBG: #06070d;
        --webkit-scrollbar: #06070d;
        --default_border: 1px solid #21272b;
        --divider-border: #21272b;
        --default_background: #f9f9f903;
        --offwhite: #f0f0f0;

        --user-color: #c7c7c7;
        --congrats_background: #f9f9f9;
        --default-color: #f2f2f2;
        --blackWhite: #000;
    }

    /*fim das cores para modo dark*/
    /*CSS RESET*/
    html,
    * {
        color: var(--default-color);
    }

    h1 {
        font-family: var(--title);
    }

    * {
        list-style: none;
        padding: 0;
        margin: 0;
        transition: all .3s cubic-bezier(0.47, 0, 0.745, 0.715);
    }


    body,
    html {
        overflow: hidden;
        min-width: 100vw !important;
        background-color: var(--contentBG);
        height: 100%;

        font-family: "Raleway", system-ui;
    }

    body::-webkit-scrollbar {
        background-color: var(--webkit-scrollbar);
    }

    /*FIM DO CSS RESET*/











    /*COMUM ENTRE TODOS OS MENUS*/
    .divider {
        width: 50%;
        border: 1px solid var(--divider-border);
    }

    .subTitle {
        font-family: var(--regular-title);
    }

    svg.icon.icon-tabler.icons-tabler-outline.icon-tabler-search {
        width: 19px;
    }

    .ico_btn {
        border: var(--default_border) !important;
        background-color: var(--default_background);
        border-radius: 49%;
        height: 40px;
        width: 41px;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        align-content: center;
        flex-wrap: nowrap;
    }

    .ico_btn svg {
        transform: scale(1.4);
    }


    #darkmode {
        position: absolute;
        height: 100%;
        width: 50%;
        opacity: 0;
    }

    .right-sidebar,
    .main-content {
        padding-top: 2%;
    }

    .right-sidebar,
    .user_Icons-NAV {
        padding-right: 2%;
    }

    .dividerV2 {
        margin-top: -35px;
        width: 90%;
        opacity: 0.3;
    }

    /*FIM DOS COMUNS*/
    /*MENU LATERAL/TOPO/DIREITO*/
    .viewport {
        background-color: var(--contentBG);
        width: var(--Fullvw);
        height: var(--Fullvh);
    }

    .main-content {
        gap: 8.3%;
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
    }

    iframe {
        height: 100%;
    }

    .relative {
        position: relative;
    }

    /*AREA TESTE DO NAVBAR*/

    .inputSearch_navM,
    .searchInput_label {
        position: absolute;
        z-index: 2;
    }

    .paddingFilterIn {
        padding-left: 5.8%;
        padding-right: 5.8%;
    }

    .uppercase {
        text-transform: uppercase;
    }

    .filterVtitle {
        font-weight: bold;
        font-size: 10px !important;
        color: #959595;
        font-weight: 500;
    }

    .card_filtro {
        height: 42px;
        min-height: 42px;
        max-height: calc(42px + 10%);
        border: var(--default_border) !important;
        border-radius: 10px;
    }

    .Content_filtro {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .paddingTitle_top {
        padding-top: 1%;
    }

    .card_filtro {
        text-decoration: none !important;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 3%;
        cursor: pointer !important;
    }

    .component_divider {
        border: 1px solid var(--divider-border);
    }

    .capitalize {
        text-transform: capitalize;
    }

    .filter__name {
        font-size: 13px !important;
        color: #959595;
    }

    .containerAddTool {
        position: relative;
    }

    .hiddenMajorInp {
        opacity: 0;
        position: absolute;
        height: 100%;
        width: 100%;
        cursor: pointer;
    }

    .containerPublicacao__cr {
        gap: 2vh;
    }

    .containerPublicacao__cr>img {
        width: 100%;
        height: 100%;
    }
</style>

<body>

    <div class="container_viewport">
        <!-- MAIN VIEWPORT -->
        <main class="viewport d-flex ">
            <!--MAIN CONTENT -->
            <style>
                .main-content {
                    position: relative;
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                    align-items: center;
                }

                #containerIframe {

                    position: absolute;
                    top: 0;
                    height: 97%;
                    width: 97%;
                    display: flex;
                    gap: 3vh;
                    overflow-y: auto;
                    scrollbar-width: thin;
                    flex-direction: column;
                }

                .container__madeCards-wkProfile {
                    gap: 2vw;
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                }

                .right-side {
                    padding-top: 2.5vh;
                    position: fixed;
                    top: calc(10vh + 3%);
                    right: 2.2%;
                    background-color: transparent;
                    border: var(--default_border);
                    border-radius: 20px;
                    width: calc((276px / 1) + 2vw);
                    height: calc(97% - (10vh + 3%));
                    ;
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-start;
                    align-items: center;
                    overflow: hidden;
                }

                .container_portName {
                    height: calc(10vh + 3%);
                    width: 100%;
                }

                .containerPublicacao__cr {
                    height: auto;
                    width: 100%;
                    border: 1px solid #192648;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }

                .containerPublicacao__cr>input[type="text"] {
                    width: 90%;
                    text-align: center;
                    border: 1px solid transparent;
                    height: auto;
                    margin: 0 !important;
                }

                .containerPublicacao__cr>input[type="text"]:focus {
                    outline: 1px solid blue;
                }

                .container_portName {
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-start;
                    align-items: flex-start;
                }

                .container__tituloPublicacao {
                    width: 100%;
                }

                .container__tituloPublicacao>input {
                    width: 100%;
                    min-height: 42px;
                    max-height: 50px;
                    padding-left: 1%;
                    height: 50%;
                    border-radius: 20px;
                    border: var(--default_border);
                }

                .hiddentext____containertextProv {
                    height: 70vh;
                    display: flex;
                    align-content: center;
                    justify-content: center;
                    flex-direction: column;
                    align-items: center;
                }

                .container__tituloPublicacao {
                    position: relative;
                }

                .searchInput_label-span {
                    position: absolute;
                    left: 2%;
                    top: 18%;
                    opacity: .5;
                    pointer-events: none;
                }

                #PortTitle__noIncluded {
                    padding-left: 2%;
                    background-color: var(--contentBG);
                }
            </style>
            <div class="main-content">
                <div id="containerIframe" frameborder="0">
                    <div class="container_portName">
                        <span>Título</span>
                        <div class="container__tituloPublicacao">
                            <input type="text" name="#" id="PortTitle__noIncluded">
                            <span class="searchInput_label-span">Título da publicação</span>
                        </div>
                    </div>
                    <div class="containerPublicacao__cr">
                        <span class="hiddentext____containertextProv" style="opacity: .5;">Preview da sua
                            publicação</span>
                    </div>
                </div>

            </div>
        </main>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>
</body>
<script>
    var searchInput = document.getElementById('PortTitle__noIncluded')
    var span = document.querySelector('.searchInput_label-span')
    searchInput.addEventListener('input', function () {
        if (searchInput.value === '') {
            span.style.display = 'block'
        } else {
            span.style.display = 'none'
        }
    })

    window.addEventListener('message', function (event) {
        const {
            type,
            src,
            alt
        } = event.data;

        const container = document.querySelector('.containerPublicacao__cr');
        container.style.height = 'auto';
        container.style.minHeight = 'auto';

        if (type === 'image') {
            if (document.querySelector('.containerPublicacao__cr').style.Height == '90vh') {
                document.querySelector('.containerPublicacao__cr').style.Height = 'auto'
            }
            if (document.querySelector('.containerPublicacao__cr').style.minHeight == '70vh') {
                document.querySelector('.containerPublicacao__cr').style.minHeight = 'auto'
            }
            const elemento = container.querySelector('.hiddentext____containertextProv');

            if (elemento) {
                elemento.remove()
            }
            const img = document.createElement('img');
            img.src = src;
            img.alt = alt || 'Imagem carregada';
            img.style.maxWidth = '100%';
            container.appendChild(img);
        } else if (type === 'video') {
            if (document.querySelector('.containerPublicacao__cr').style.Height == '90vh') {
                document.querySelector('.containerPublicacao__cr').style.Height = 'auto'
            }
            if (document.querySelector('.containerPublicacao__cr').style.minHeight == '70vh') {
                document.querySelector('.containerPublicacao__cr').style.minHeight = 'auto'
            }
            const elemento = container.querySelector('.hiddentext____containertextProv');

            if (elemento) {
                elemento.remove()
            }
            const video = document.createElement('video');
            video.src = src;
            video.controls = true;
            video.style.maxWidth = '100%';
            container.appendChild(video);
        }
    })
    document.addEventListener('DOMContentLoaded', function () {

        const badWordsUrl =
            'https://raw.githubusercontent.com/shutterstock/List-of-Dirty-Naughty-Obscene-and-Otherwise-Bad-Words/master/en';

       
        async function loadBadWords() {
            try {
                const response = await fetch(badWordsUrl);
                if (!response.ok) throw new Error('Network response was not ok');
                const text = await response.text();
                
                return text.split('\n').map(word => word.trim()).filter(word => word.length > 0);
            } catch (error) {
                console.error('Failed to load bad words:', error);
                return [];
            }
        }

       
        function replaceBadWords(text, badWords) {
            let modifiedText = text;
            badWords.forEach(word => {
                const regex = new RegExp(`\\b${word}\\b`,
                    'gi')
                const replacement = '#'.repeat(word.length)
                modifiedText = modifiedText.replace(regex, replacement)
            });
            return modifiedText;
        }

 
        async function checkInput(event) {
            const badWords = await loadBadWords();
            const inputElement = document.getElementById('PortTitle__noIncluded');

            if (inputElement) {
                let inputText = inputElement.value;

        
                inputText = replaceBadWords(inputText, badWords);

                inputElement.value = inputText;
            } else {
                console.error('Input element not found');
            }
        }

        const inputElement = document.getElementById('PortTitle__noIncluded');
        if (inputElement) {
            inputElement.addEventListener('input', checkInput);
        }

        if (inputElement) {
            inputElement.addEventListener('input', ()=>{
                console.log('to mandando titulo')
                window.parent.postMessage({
                    type: 'alterarTituloPubli?criar',
                    oqtaescrito: inputElement.value
                }, '*');
            })
        }


    });
</script>
</body>

</html>
