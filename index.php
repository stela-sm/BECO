<?PHP
session_start();

require_once "model/manager.class.php";
$manager = new Manager();
$concurso= $manager -> getConcursoAtual();
if ($concurso["result"]==0){
// set the values if there isnt anyone at the actual time

}

?>
<!DOCTYPE html>
<html lang="pt-br" style="background-color: var(--contentBG);">
<!--precisa de responsivo a partir de 750px (width) até 1313px (width), o site fica todo bugado-->
<!--por favor, não apagar classes, divs, sections, mains, hr, br entre outros, pode afetar todo o site ;) Se necessário, adicione classes ou divs e etc... mas não altere o css de classes/ids, pode interferir em mais de um local! -->

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BECO - Portifólios</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css"> -->
    <link rel="stylesheet" href="assets/style/chat.css">
    <link rel="stylesheet" href="assets/style/conversas.css">
    <link rel="icon" href="assets/media/logo/4.png" sizes="any">
    <link rel="icon" href="assets/media/logo/4.png" sizes="16x16" type="image/png">
    <link rel="icon" href="assets/media/logo/4.png" sizes="32x32" type="image/png">
    <link rel="icon" href="assets/media/logo/4.png" sizes="48x48" type="image/png">
    <link rel="icon" href="assets/media/logo/4.png" sizes="64x64" type="image/png">
    <link rel="icon" href="assets/media/logo/4.png" sizes="128x128" type="image/png">
    <link rel="icon" href="assets/media/logo/4.png" sizes="256x256" type="image/png">
    <link rel="icon" href="assets/media/logo/4.png" sizes="any" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert2.min.css"><script src="../assets/js/teste.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/jquery-3.7.1.min.map"></script>
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="assets/style/conversas.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="assets/js/texto_audio.js"></script>
<script>
            document.addEventListener('DOMContentLoaded', function() {
                var SoundIsOn = localStorage.getItem('com.beco/audio_recurso01x.all?ison');
                if (SoundIsOn === 'ativo') {
                    inicializar2();
                }else{
                    naoinicializar()
                }
            })

</script>
    <script async>

        //NÃO MEXER EM ABSOLUTAMENTE NADA DESSE SCRIPT INTEIRO
        //AQUI SERVE PARA MOSTRAR A ULTIMA PAGINA CARREGADA E FAZER UMA SÉRIE DE VERIFICAÇÕES DO SITE ANTES DELE CARREGAR POR COMPLETO
        function showPage(pageId) {
            const rightSides = [
                '#right-menu_JScontainer',
                '#right-menu_JScontainer-usuario',
                '#right-menu_JScontainer-cPubli',
                '#right-menu_JScontainer-configProf',
                '#right-menu_JScontainer-concurso',
                '#right-menu_JScontainer-conversas'
            ]
            rightSides.forEach(container => {
                if (container == container[3]) {
                    if (window.innerWidth <= 748) {
                        console.log('a tela é pequena: mpostrar o right-side')
                        document.querySelector(`${rightSides[3]}`).style.display = 'flex';
                        document.querySelector('#containerHeader__ConPH3').textContent = 'Configurações'
                    } else {
                        document.querySelector('#containerHeader__ConPH3').textContent = 'Definições'
                        document.querySelector(`${rightSides[3]}`).style.display = 'none';
                    }
                } else {
                    document.querySelector(`${container}`).style.display = 'none';
                }
            })

            /* document.querySelectorAll('#right-menu_JScontainer, #right-menu_JScontainer-usuario, #right-menu_JScontainer-cPubli, #right-menu_JScontainer-configProf, #right-menu_JScontainer-concurso, #right-menu_JScontainer-conversas').forEach(container => {
                if (container == 'right-menu_JScontainer-configProf') {
                    console.log('abrir conversas')
                }
                container.style.display = 'none';
            }) */
            if (pageId) {
                const iframe = document.querySelector('#containerIframe');
                switch (pageId) {
                    case 'right-menu_JScontainer':
                        document.querySelector('#home-link_sidebar').click();
                        iframe.src = 'portifolios.php';
                        document.title = 'BECO - Portifólios';
                        break;
                    case 'right-menu_JScontainer-conversas':
                        console.log('abrir conversas')
                        iframe.src = 'view/chat.php';
                        document.title = 'Conversas';
                        break;
                    case 'right-menu_JScontainer-usuario':
                        iframe.src = 'view/usuario.php';
                        document.title = '[Nome do usuario] - Perfil';
                        break;
                    case 'right-menu_JScontainer-cPubli':
                        document.querySelector('#criarPubli-link_sidebar').click();
                        iframe.src = 'view/criarPublicacao.php';
                        document.title = 'BECO - Criar Publicação';
                        break;
                    case 'right-menu_JScontainer-configProf':
                        document.querySelector('#settings-link_sidebar').click();
                        iframe.src = 'view/configuracoes.php';
                        document.title = '[nome usuario] - Configurações';
                        break;
                    case 'right-menu_JScontainer-concurso':
                        document.querySelector('#concurso-link_sidebar').click();
                        iframe.src = 'view/concurso.php';
                        document.title = 'BECO - Concurso';
                        break;
                    default:
                        document.querySelector('#home-link_sidebar').click();
                        iframe.src = 'portifolios.php';
                        document.title = 'BECO - Portifólios';
                }

                // Mostrar o container correto
                document.querySelector(`#${pageId}`).style.display = 'flex';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const beco_ultPag_localData = localStorage.getItem('com.beco_ultPag_localData') ||
                'right-menu_JScontainer';
            showPage(beco_ultPag_localData);

            var links = document.querySelectorAll('.linkCamin__menu');
            links.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    var pgDirect = link.getAttribute('pgDirect');
                    var pageId;

                    switch (pgDirect) {
                        case "view/conversas.php":
                            pageId = 'right-menu_JScontainer';
                            break;
                        case "view/usuario.php":
                            pageId = 'right-menu_JScontainer-usuario';
                            break;
                        case "view/criarPublicacao.php":
                            pageId = 'right-menu_JScontainer-cPubli';
                            break;
                        case "view/concurso.php":
                            pageId = 'right-menu_JScontainer-concurso';
                            break;
                        case "portifolios.php":
                            pageId = 'right-menu_JScontainer';
                            break;
                        case "view/configuracoes.php":
                            pageId = 'right-menu_JScontainer-configProf';
                            break;
                        case "view/chat.php":
                            console.log('abrir conversas')
                            pageId = 'right-menu_JScontainer-conversas';
                            break;
                    }

                    if(pageId){
                        localStorage.setItem('com.beco_ultPag_localData', pageId);
                        showPage(pageId);

                    }
                  
                });
            });

            var VLibrasRecurso = localStorage.getItem('com.beco/VLibras_recurso02x.all?ison');
            document.querySelector('#recVLIBRAS__webBeco').style.display = (VLibrasRecurso === 'ativo') ?
                'block' : 'none';
        });
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
</head>
<script src="assets/js/font.js"></script>

<script>
    //OUTRAS VERIFICAÇÕES QUE SÃO FEITAS JUNTO COM A INTERAÇÃO ENTRE INDEX-IFRAME
    var fontTam = localStorage.getItem('com.beco_fonteWeb_localData')
    let SecurityTamP__isOn = false
    let SecurityTamR__isOn = false
    let SecurityTamG__isOn = false
    window.addEventListener('message', function(event) {
     if (event.data === 'confirmReset') {
            console.log('JSAJDAS')
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Você deseja apagar todas as alterações?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Apagar alterações',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    const iframe = document.getElementById('containerIframe');
                    iframe.contentWindow.location.reload();
                }
            });
        } else if (event.data === 'VLibras__on') {
            document.querySelector('#recVLIBRAS__webBeco').style.display = 'block'
        }else if (event.data === 'iframe:unload') {
        window.location.reload()
        } else if (event.data === 'VLibras__off') {
            document.querySelector('#recVLIBRAS__webBeco').style.display = 'none'
        } else if (event.data === 'configProf?Open') {
            document.querySelector('#right-menu_JScontainer-configProf').style.display = 'flex'
        }else if(event.data === 'vltrPMenuConfig'){
            location.reload();

        } else if (event.data === 'Theme?DarkIs__on') {
            if (localStorage.getItem('DarkMode') == 0 || localStorage.getItem('DarkMode') == 'ativo') {
                if (window.innerWidth < 748) {
                    document.querySelector('#darkmodeMobile').click()
                } else {
                    document.querySelector('#darkmode').click()
                }

            } else {
                return false
            }
        } else if (event.data === 'Theme?DarkIs__off') {
            if (localStorage.getItem('DarkMode') == 1 || localStorage.getItem('DarkMode') == 'desativado') {
                if (window.innerWidth < 748) {
                    document.querySelector('#darkmodeMobile').click()
                } else {
                    document.querySelector('#darkmode').click()
                }

            } else {
                return false
            }
        } else if (event.data === 'fntP?Size') {

            if (fontTam == 'P') {
                if (SecurityTamP__isOn == false) {
                    P__fontNVerif()
                    SecurityTamP__isOn = true
                    SecurityTamR__isOn = false
                    SecurityTamG__isOn = false
                } else {
                    return false
                }
            } else {
                P__fontNVerif()
                SecurityTamP__isOn = true
                SecurityTamR__isOn = false
                SecurityTamG__isOn = false
            }
        } else if (event.data === 'fntR?Size') {
            if (fontTam == 'R') {
                if (SecurityTamR__isOn == false) {
                    RegulaRegular__fontNVerif();
                    SecurityTamP__isOn = false
                    SecurityTamR__isOn = true
                    SecurityTamG__isOn = false
                } else {
                    return false
                }
            } else {
                RegulaRegular__fontNVerif();
                SecurityTamP__isOn = false
                SecurityTamR__isOn = true
                SecurityTamG__isOn = false
            }
        } else if (event.data === 'fntG?Size') {
            if (fontTam == 'G') {
                if (SecurityTamG__isOn == false) {
                    G__fontNVerif();
                    SecurityTamP__isOn = false
                    SecurityTamR__isOn = false
                    SecurityTamG__isOn = true
                } else {
                    return false
                }
            } else {
                G__fontNVerif();
                SecurityTamP__isOn = false
                SecurityTamR__isOn = false
                SecurityTamG__isOn = true
            }
        } else if (event.data.type === 'com.beco?bannerOffset/new') {
            console.log()
            const bannerHeight = event.data.bannerNOffsetHeight;
            document.querySelector('#main-RMbanners_area').style.height = `${bannerHeight}px`;
        }
    })

</script>
<style>
    #containerIframe {
        background: transparent;
        color-scheme: dark;
        background-color: transparent;
        filter: alpha(opacity=0);
        border: none;
    }

    /*modais de criar publicacao*/
    #modalPortifolioContainer>* {
        font-family: 'Raleway', system-ui;
    }

    #modalPortifolioContainer>.modal-dialog>.modal-content {
        border-radius: 20px !important;
        overflow: hidden;
        width: calc(100% + 50px);
        height: auto;
    }

    .modal-open #modalPortifolioContainer {
        overflow-x: hidden;
        overflow-y: hidden;
    }

    #modalPortifolioContainer>.modal-dialog {
        width: 100%;
        height: 100%;
    }

    #modalPortifolioContainer * {
        font-weight: 700;
    }

    #changeTitle-modalPort {
        font-size: 32px;
    }

    .btn.btn-primary.postarSubmitBtn {
        border-radius: 0 !important;
        outline: none !important;
        border: none !important;
        position: absolute;
        right: 0;
        background-color: #192648 !important;
        width: 100%;
        min-height: 53px;
    }

    .btn.btn-primary.postarSubmitBtn:focus {
        outline: none !important;
        border: none !important;
        box-shadow: none !important;
    }

    .modal-footer.modalPortFooter {
        padding: 0 !important;
        margin: 0 !important;
    }

    .modal-header.modalPortHeader {
        border: 0 !important;
    }

    .inpGroupModal {
        margin-bottom: 5%;
    }

    .modalPortBody {
        padding: 0 1.4rem 1.4rem 1.4rem !important;
        display: flex;
        height: 100%;
        flex-direction: column;
        justify-content: space-between;
        align-content: stretch;
        align-items: stretch;
        flex-wrap: nowrap;
    }

    .modalPortHeader {
        padding: 1rem 1.4rem !important;
    }

    label.equalMarginB {
        color: #3D3D3D;
        margin-bottom: .2rem !important;
    }

    .inpGroupModal>* {
        font-size: 18.4px;
    }

    .inGroupDiferente {

        border-radius: 7px;
        min-height: 36px;
        border: 1px solid #E7E7E7;
        display: flex;
        align-content: center;
        align-items: center;
        padding: 0 1.5%;
    }

    .inGroupDiferente input {
        margin-left: 1.5%;
    }

    .inGroupDiferente>* {
        font-size: 16px;
        font-weight: 500;
        border: none !important;
        outline: none !important;
        color: #BDBBBB !important;
    }

    .inpGroupModal input[type="text"],
    .inpGroupModal textarea,
    .inpGroupModal select {
        font-size: 16px;
        font-weight: 500;
        border-radius: 7px;
        min-height: 36px;
        border: 1px solid #E7E7E7;
    }

    .inpGroupModal textarea {
        min-height: 84px;
        resize: none;
    }

    .inpGroupModal select {
        color: #BDBBBB;
        padding: 0 1.5%;
    }

    input::-webkit-inner-spin-button,
    input::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* input[type="number"] {
        -moz-appearance: textfield;
    } */

    .realSimbolo {
        color: #3D3D3D;
        margin-bottom: 0 !important;
    }

    .precoIniPORT {
        color: #3D3D3D;
        font-size: 18.4px;
        margin-bottom: .2rem !important;
    }

    .char-count {
        position: absolute;
        right: 10px;
        bottom: -15%;
        font-size: 12px;
        color: #BDBBBB;
    }

    textarea#descricaoPortifolio {
        outline: none !important;
        color: #BDBBBB;
        padding: 2%;
    }

    textarea#descricaoPortifolio::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    textarea#descricaoPortifolio::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 5px;
    }

    textarea#descricaoPortifolio::-webkit-scrollbar-track {
        background: transparent;
    }

    textarea#descricaoPortifolio::-webkit-scrollbar-button {
        display: none;
    }




    /*do modal de produto*/
    .containerGrid_pix-produto {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
    }

    .containerGrid_licenPreco,
    .checkboxLicenca-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }

    .checkboxLicenca-container {
        align-items: end;
        height: 100%;
    }

    .checkboxLicenca-container>div {
        margin-bottom: 4px;
    }

    .checkbox>input {
        cursor: pointer;
    }

    .thumbBox#containerGerenciarAtivos {
        cursor: pointer;
        position: relative;
        height: 100%;
        padding: 5%;
        text-align: center;
        width: 100%;
        gap: 19px;
        background-color: #747474B5;
        border: var(--default_border);
        border-radius: 10px;
        max-height: 120px;

    }

    .containerAbsoluteInfo.containerAbsoluteAtivos {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 7px;
    }

    .containerAbsoluteInfo.containerAbsoluteAtivos>span {
        font-size: 15px;
        color: #000;
        font-weight: 700;
    }

    .info__adt {
        font-size: 12px;
        color: #000;
        font-weight: 400;
    }


    /*notificações*/
    .containerViewNotifications {
        &.cssContainerVNot {
            top: calc(9vh + 5%);
            min-width: 320px;
            max-width: 323px;
            position: absolute;
            z-index: 50;
            width: calc(323px - 2%);
            padding: 1rem;
            height: 375px;
            background-color: var(--contentBG);
            border: var(--default_border);
            border-radius: 20px;
            right: 1rem;
            box-shadow: rgba(0, 0, 0, 0.1) -3px 4px 14px 0px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }

        &>.header_notificacoes {
            text-transform: capitalize;
            font-size: 20px;
        }
    }
    
    .navbar {
        padding: .5rem 2rem;
        padding-left: 0 !important;
    }
    .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 10rem;
    padding: 10px;
    margin: .125rem 0 0;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: .25rem;
}
.delete-btn:hover > svg{
    stroke: rgb(255 0 0 / 50%);
}
.containerBotoes__noti-BTN {
    height: 30px;
    background-color: transparent;
    width: 35%;
    display: flex;
    justify-content: center;
    align-items: center;
    border: var(--default_border);
    border-radius: 20px;
}
/* STYLE PRA PÁGINA APARECER CUTE CUTE */
.fade-in-container {
    opacity: 0; 
    transition: opacity 2s ease; 
}

.fade-in {
    opacity: 1; 
}
</style>

<body class="fade-in-container">

    <div class="container_viewport">


        <!--=-=-=-=-=-==-=-=-=-=- top menu =-=-=-=-=-=-=-=-=-=-=-->
        <nav class="navbar navbar-expand-lg">
            <div class="container_search">
                <form class="form_search" method="POST" action="#" id="SearchForm">
                    <div class="container__logo">
                        <a class="logo" id="logoContainerLink" href="#">
                            <img id="logotipoPrincipal" width="90%" src="assets/media/logo/4.png">
                        </a>
                    </div>
                    <div class="container__inputSearch relative" style="position: relative !important;">
                        <input placeholder="Pesquise com criatividade" type="search" name="searchInput" id="searchInput"
                            autocapitalize="false" class="inputSearch_navM" aria-expanded="false" role="combobox"
                            maxlength="100" autocomplete="off" tabindex="0">
                        <label for="searchInput" class="searchInput_label">
                            <svg class="icone-thum" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M21 21l-6 -6" />
                            </svg>
                        </label>
                        <div class="container-filtro position-absolute" id="filtro__menuNAV">
                            <hr class="component_divider">
                            <div class="container_filtro paddingFilterIn">
                                <span class="uppercase filterVtitle">classificar e filtrar:</span>
                                <div class="Content_filtro paddingTitle_top">
                                    <a class="card_filtro">
                                        <div class="filter_name">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="1.75"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-dice-2">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                                <circle cx="9.5" cy="9.5" r=".5" fill="#858585" />
                                                <circle cx="14.5" cy="14.5" r=".5" fill="#858585" />
                                            </svg> <span class="filter__name capitalize">Pixel Art</span>
                                        </div>
                                        <span class="arrowChevron">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 6l6 6l-6 6" />
                                            </svg>
                                        </span>
                                    </a>

                                    <a class="card_filtro">
                                        <div class="filter_name">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="1.75"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-brush">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M3 21v-4a4 4 0 1 1 4 4h-4" />
                                                <path d="M21 3a16 16 0 0 0 -12.8 10.2" />
                                                <path d="M21 3a16 16 0 0 1 -10.2 12.8" />
                                                <path d="M10.6 9a9 9 0 0 1 4.4 4.4" />
                                            </svg> <span class="filter__name capitalize">Ilustração Digital
                                            </span>
                                        </div>
                                        <span class="arrowChevron">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 6l6 6l-6 6" />
                                            </svg>
                                        </span>
                                    </a>

                                    <a class="card_filtro">
                                        <div class="filter_name">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="1.75"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-cube">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M21 16.008v-8.018a1.98 1.98 0 0 0 -1 -1.717l-7 -4.008a2.016 2.016 0 0 0 -2 0l-7 4.008c-.619 .355 -1 1.01 -1 1.718v8.018c0 .709 .381 1.363 1 1.717l7 4.008a2.016 2.016 0 0 0 2 0l7 -4.008c.619 -.355 1 -1.01 1 -1.718z" />
                                                <path d="M12 22v-10" />
                                                <path d="M12 12l8.73 -5.04" />
                                                <path d="M3.27 6.96l8.73 5.04" />
                                            </svg> <span class="filter__name capitalize">Arte em 3D</span>
                                        </div>
                                        <span class="arrowChevron">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 6l6 6l-6 6" />
                                            </svg>
                                        </span>
                                    </a>

                                    <a class="card_filtro">
                                        <div class="filter_name">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="1.75"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-play-handball">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M13 21l3.5 -2l-4.5 -4l2 -4.5" />
                                                <path d="M7 6l2 4l5 .5l4 2.5l2.5 3" />
                                                <path d="M4 20l5 -1l1.5 -2" />
                                                <path d="M15 7a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                                <path d="M9.5 5a.5 .5 0 1 0 0 -1a.5 .5 0 0 0 0 1z" fill="#858585" />
                                            </svg> <span class="filter__name capitalize">Animação</span>
                                        </div>
                                        <span class="arrowChevron">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 6l6 6l-6 6" />
                                            </svg>
                                        </span>
                                    </a>

                                    <a class="card_filtro">
                                        <div class="filter_name">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="1.75"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-camera">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                                <path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                            </svg> <span class="filter__name capitalize">Fotografia</span>
                                        </div>
                                        <span class="arrowChevron">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 6l6 6l-6 6" />
                                            </svg>
                                        </span>
                                    </a>

                                    <a class="card_filtro">
                                        <div class="filter_name">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="1.75"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-device-mobile">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z" />
                                                <path d="M11 4h2" />
                                                <path d="M12 17v.01" />
                                            </svg> <span class="filter__name capitalize">Arte
                                                Digital</span>
                                        </div>
                                        <span class="arrowChevron">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 6l6 6l-6 6" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="card_filtro">
                                        <div class="filter_name">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="1.75"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-vector">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M3 3m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                                <path
                                                    d="M17 3m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                                <path
                                                    d="M17 17m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                                <path
                                                    d="M3 17m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                                <path d="M5 7l0 10" />
                                                <path d="M19 7l0 10" />
                                                <path d="M7 5l10 0" />
                                                <path d="M7 19l10 0" />
                                            </svg> <span class="filter__name capitalize">Arte
                                                Vetorial</span>
                                        </div>
                                        <span class="arrowChevron">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="#858585" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 6l6 6l-6 6" />
                                            </svg>
                                        </span>
                                    </a><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn ico_btn linkCamin__menu" <?php echo isset($_SESSION['USER_ID']) ? 'onclick="pgDirect(\'view/chat.php\')"' : 'onclick="login()"'; ?>  id="superChat_goout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-messages">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />
                            <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" />
                        </svg></a>
                </form>
            </div>
            <div class="collapse navbar-collapse user_Icons-NAV" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item" id="toggleNotifications">
                        <span class="classNumberData" id="classNumberData__noti"></span>
                        <a class="btn ico_btn"><svg class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-bell">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                            </svg></a>
                    </li>

                    <li class="nav-item">
                        <a class="btn ico_btn linkCamin__menu" <?php echo isset($_SESSION['USER_ID']) ? 'pgDirect="view/chat.php"' : 'onclick="login()"'; ?>>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-messages">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />
                                <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" />
                            </svg></a>
                    </li>

                    <li class="nav-item ">
                        <a class="btn d-flex linkCamin__menu flex-row justify-content-between align-items-center user_face"
                        <?php echo isset($_SESSION['USER_ID']) ? 'pgDirect="view/usuario.php"' : 'onclick="login()"'; ?>>
                            <span class="img round-img noProfThumb">
                                <svg class="" xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-ghost">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                                    <path d="M10 10l.01 0" />
                                    <path d="M14 10l.01 0" />
                                    <path d="M10 14a3.5 3.5 0 0 0 4 0" />
                                </svg>
                            </span>
                            <span class="username"><span class="opacity" style="opacity: .8;">Olá,</span>
                                <?php echo isset($_SESSION["USER_USERNAME"]) ? $_SESSION["USER_USERNAME"] : "desconhecido";
 ?></span>
                        </a>
                    </li>
                </ul>
                <div class="containerViewNotifications cssContainerVNot" style="display: none;">
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
                    </div>
                    <div class="container-containerNotificacoes">
                        <div id="notifications-container"></div>
                    </div>
                </div>
            </div>
        </nav>
        <!--=-=-=-=-=-==-=-=-=-=- menu responsivo =-=-=-=-=-=-=-=-=-=-=-->
        <div class="bottom-nav">
            <div class="container-bottom">
                <!-- home -->
                <a class="link-menu configura-link linkCamin__menu" title="Configurações"
                    pgDirect="view/configuracoes.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                    </svg>
                </a>
                <!-- concursos -->
                <a class="link-menu concurso-link linkCamin__menu" title="Concurso"
                    pgDirect="view/concurso.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-dice-5">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                        <circle cx="8.5" cy="8.5" r=".5" fill="#000000" />
                        <circle cx="15.5" cy="8.5" r=".5" fill="#000000" />
                        <circle cx="15.5" cy="15.5" r=".5" fill="#000000" />
                        <circle cx="8.5" cy="15.5" r=".5" fill="#000000" />
                        <circle cx="12" cy="12" r=".5" fill="#000000" />
                    </svg>
                </a>
                <!-- configurações -->
                <a class="link-menu home-link linkCamin__menu" title="Home"
                    pgDirect="portifolios.php">
                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                    </svg>
                </a>

                <!-- modo escuro -> VOU TENTAR ARRUMAR O FUNCIONAMENTO DESTE BOTÃO PORQUE O ID ESTA DUPLICADO, VOU REFAZER O JS-->
                <a class="not-link-menu darkmode-link" id="" title="Mudar tema">
                    <!--id: darkModeButton-->
                    <input type="checkbox" name="darkmode" id="darkmodeMobile">
                    <!--id: darkmode-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-sun-high">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14.828 14.828a4 4 0 1 0 -5.656 -5.656a4 4 0 0 0 5.656 5.656z" />
                        <path d="M6.343 17.657l-1.414 1.414" />
                        <path d="M6.343 6.343l-1.414 -1.414" />
                        <path d="M17.657 6.343l1.414 -1.414" />
                        <path d="M17.657 17.657l1.414 1.414" />
                        <path d="M4 12h-2" />
                        <path d="M12 4v-2" />
                        <path d="M20 12h2" />
                        <path d="M12 20v2" />
                    </svg>
                </a>
                <!-- perfil -->
                <a class="link-menu peril-link linkCamin__menu" title="Perfil" pgDirect="view/usuario.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                    </svg>
                    </span>
                </a>
            </div>
        </div>
        <!--=-=-=-=-=-==-=-=-=-=- main viewport =-=-=-=-=-=-=-=-=-=-=-->
        <main class="viewport d-flex ">
            <!--=-=-=-=-=-==-=-=-=-=- side menu =-=-=-=-=-=-=-=-=-=-=-->
            <div class="sidebar sidebar-resp">
                <div class="container__logo">
                    <a class="logo" id="logoContainerLink" href="#">
                        <img id="logotipoPrincipal" width="90%" src="assets/media/logo/white_becoComplete.png">
                    </a>
                </div>

                <!-- home -->
                <div class="container_sidebar">
                    <a pgDirect="portifolios.php" class="link-menu linkCamin__menu home-link" id="home-link_sidebar"
                        onclick="moveCurtain(this)" title="Home">
                        <div class="menu-curtain active"></div>
                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                    </a>
                    <!-- concurso -->
                    <a pgDirect="view/concurso.php" class="link-menu linkCamin__menu concurso-link"
                        id="concurso-link_sidebar" onclick="moveCurtain(this)" title="Concurso">
                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dice-5">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                            <circle cx="8.5" cy="8.5" r=".5" fill="#000000" />
                            <circle cx="15.5" cy="8.5" r=".5" fill="#000000" />
                            <circle cx="15.5" cy="15.5" r=".5" fill="#000000" />
                            <circle cx="8.5" cy="15.5" r=".5" fill="#000000" />
                            <circle cx="12" cy="12" r=".5" fill="#000000" />
                        </svg>
                    </a>










                    <!-- AQUI É O BOTÃO DO MENU DE CRIAR PUBLICAÇÕES!!! -->
                    <!--esse atributo pgDirect faz com q o JS mande o iframe pra pagina certa!-->
                    <a  <?php echo isset($_SESSION['USER_ID']) ? 'pgDirect="view/criarPublicacao.php"' : 'onclick="login()"'; ?>  class="link-menu linkCamin__menu criar-link"
                        id="criarPubli-link_sidebar" onclick="moveCurtain(this)" title="Criar publicação">
                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" alt="Criar Publicação"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-square-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 12h6" />
                            <path d="M12 9v6" />
                            <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                        </svg>
                    </a>
                    <!-- AQUI É O FIM DO BOTÃO DO MENU: CRIAR PUBLICAÇÕES!!! -->










                    <hr class="divider">
                    <!-- configurações -->
                    <a pgDirect="view/configuracoes.php" class="link-menu linkCamin__menu settings-link"
                        id="settings-link_sidebar" title="Configurações" onclick="moveCurtain(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                        </svg>
                    </a>
                    <!-- modo escuro -->
                    <a class="not-link-menu darkmode-link" id="darkModeButton" title="Mudar tema">
                        <input type="checkbox" name="darkmode" id="darkmode">
                        <svg id="lightTheme__on" class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-sun">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                            <path
                                d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                        </svg>
                        <svg id="darkTheme__on" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-moon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                        </svg>
                    </a>
                    <!-- logout -->
                    <a href="view/logout.php" class="not-link-menu logout-link" title="Entrar na conta">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-login">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M21 12h-13l3 -3" />
                            <path d="M11 15l-3 -3" />
                        </svg>
                    </a>
                </div>
            </div>
            <!--=-=-=-=-=-==-=-=-=-=- main content =-=-=-=-=-=-=-=-=-=-=-->
            <div class="main-content">
                <iframe id="containerIframe" name="iframe_chat" style="background-color: transparent;border: none;"
                    allowtransparency="true" loading="eager" src="portifolios.php" frameborder="0"></iframe>
                <!--NENHUMA CLASSE DAQUI PODE SER ALTERADA E NENHUM ID PODE SER DUPLICADO, DEVE-SE MANIPULAR (SE NECESSÁRIO) ESTES MENUS ABAIXO, ALTERANDO SOMENTE O CSS-->
                <!--right-side padrão do index-->
                <div class="right-side index_right-side" id="right-menu_JScontainer" style="display: none;">
                    <div class="main-banners_area" id="main-RMbanners_area">
                        <a href="#" pgdirect="view/concurso.php"
                            class="banner-concurso br-20 ovrflw-hidden relative linkCamin__menu " title="Concurso">
                            <!--vai pro perfil do ganhador-->
                            <div class="container-winnerAuthor">
                                <span class="authorName" id="Concurso">Participe do Concurso</span>
                            </div>
                            <div class="background-darken-curtain bdcV2"></div>
                            <img id="concurso-vencedor_img" src="assets/media/concursos/<?php echo$concurso['img_anuncio']?>">
                            <!--arte do ganhador-->
                        </a>
                        <div class="data-concurso br-20 ovrflw-hidden relative">
                            <div class="containerJS-timeremaining__Concurso absolute w100 h100">

                                <div class="temp_name">
                                    <span class="temp__number" id="temporada-number"
                                        style="font-size: 21px;"><?php echo $concurso['tag']?></span>
                                </div>
                                <span   class="temporizador time-remaining__countdown">00:00:00</span>
                            </div>
                            <div class="background-darken-curtain"></div>
                            <div class="image-curtain">
                                <img src="assets/media/concursos/<?php echo$concurso['img_anuncio']?>" alt="">
                            </div>
                        </div>
                    </div>
                    <hr class="noHr">
                    <div class="autores-famosos">
                        <h3>Artistas em alta</h3>
                        <div class="container-trendingCards_t">
                            <div class="card trending-card relative">
                                <span class="number-order">
                                    <span class="number-order__visual">1</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" stroke="#192648" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" width="100%" height="100%"
                                        viewBox="0 0 24 24" fill="#f9f9f9"
                                        class="icon icon-tabler icons-tabler-filled icon-tabler-rosette">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12.01 2.011a3.2 3.2 0 0 1 2.113 .797l.154 .145l.698 .698a1.2 1.2 0 0 0 .71 .341l.135 .008h1a3.2 3.2 0 0 1 3.195 3.018l.005 .182v1c0 .27 .092 .533 .258 .743l.09 .1l.697 .698a3.2 3.2 0 0 1 .147 4.382l-.145 .154l-.698 .698a1.2 1.2 0 0 0 -.341 .71l-.008 .135v1a3.2 3.2 0 0 1 -3.018 3.195l-.182 .005h-1a1.2 1.2 0 0 0 -.743 .258l-.1 .09l-.698 .697a3.2 3.2 0 0 1 -4.382 .147l-.154 -.145l-.698 -.698a1.2 1.2 0 0 0 -.71 -.341l-.135 -.008h-1a3.2 3.2 0 0 1 -3.195 -3.018l-.005 -.182v-1a1.2 1.2 0 0 0 -.258 -.743l-.09 -.1l-.697 -.698a3.2 3.2 0 0 1 -.147 -4.382l.145 -.154l.698 -.698a1.2 1.2 0 0 0 .341 -.71l.008 -.135v-1l.005 -.182a3.2 3.2 0 0 1 3.013 -3.013l.182 -.005h1a1.2 1.2 0 0 0 .743 -.258l.1 -.09l.698 -.697a3.2 3.2 0 0 1 2.269 -.944z" />
                                    </svg>
                                </span>
                                <a class="card-body" href="#">
                                    <!--aqui leva pro usuario da pessoa-->
                                    <div class="container-authorUserImg">
                                        <svg class="icone-thumb" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="#000000"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        </svg>

                                    </div>
                                    <div class="authorName">
                                        <span class="authorNick">Nome do Autor</span>
                                        <span class="authorUser">Alguma descrição</span>
                                    </div>

                                </a>
                            </div>
                            <div class="card trending-card relative">
                                <span class="number-order">
                                    <span class="number-order__visual">2</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" stroke="#192648" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" width="100%" height="100%"
                                        viewBox="0 0 24 24" fill="#f9f9f9"
                                        class="icon icon-tabler icons-tabler-filled icon-tabler-rosette">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12.01 2.011a3.2 3.2 0 0 1 2.113 .797l.154 .145l.698 .698a1.2 1.2 0 0 0 .71 .341l.135 .008h1a3.2 3.2 0 0 1 3.195 3.018l.005 .182v1c0 .27 .092 .533 .258 .743l.09 .1l.697 .698a3.2 3.2 0 0 1 .147 4.382l-.145 .154l-.698 .698a1.2 1.2 0 0 0 -.341 .71l-.008 .135v1a3.2 3.2 0 0 1 -3.018 3.195l-.182 .005h-1a1.2 1.2 0 0 0 -.743 .258l-.1 .09l-.698 .697a3.2 3.2 0 0 1 -4.382 .147l-.154 -.145l-.698 -.698a1.2 1.2 0 0 0 -.71 -.341l-.135 -.008h-1a3.2 3.2 0 0 1 -3.195 -3.018l-.005 -.182v-1a1.2 1.2 0 0 0 -.258 -.743l-.09 -.1l-.697 -.698a3.2 3.2 0 0 1 -.147 -4.382l.145 -.154l.698 -.698a1.2 1.2 0 0 0 .341 -.71l.008 -.135v-1l.005 -.182a3.2 3.2 0 0 1 3.013 -3.013l.182 -.005h1a1.2 1.2 0 0 0 .743 -.258l.1 -.09l.698 -.697a3.2 3.2 0 0 1 2.269 -.944z" />
                                    </svg>
                                </span>
                                <a class="card-body" href="#">
                                    <!--aqui leva pro usuario da pessoa-->

                                    <div class="container-authorUserImg">
                                        <svg class="icone-thumb" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="#000000"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        </svg>

                                    </div>
                                    <div class="authorName">
                                        <span class="authorNick">Nome do Autor</span>
                                        <span class="authorUser">Alguma descrição</span>
                                    </div>

                                </a>
                            </div>
                            <div class="card trending-card relative">
                                <span class="number-order">
                                    <span class="number-order__visual">3</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" stroke="#192648" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" width="100%" height="100%"
                                        viewBox="0 0 24 24" fill="#f9f9f9"
                                        class="icon icon-tabler icons-tabler-filled icon-tabler-rosette">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12.01 2.011a3.2 3.2 0 0 1 2.113 .797l.154 .145l.698 .698a1.2 1.2 0 0 0 .71 .341l.135 .008h1a3.2 3.2 0 0 1 3.195 3.018l.005 .182v1c0 .27 .092 .533 .258 .743l.09 .1l.697 .698a3.2 3.2 0 0 1 .147 4.382l-.145 .154l-.698 .698a1.2 1.2 0 0 0 -.341 .71l-.008 .135v1a3.2 3.2 0 0 1 -3.018 3.195l-.182 .005h-1a1.2 1.2 0 0 0 -.743 .258l-.1 .09l-.698 .697a3.2 3.2 0 0 1 -4.382 .147l-.154 -.145l-.698 -.698a1.2 1.2 0 0 0 -.71 -.341l-.135 -.008h-1a3.2 3.2 0 0 1 -3.195 -3.018l-.005 -.182v-1a1.2 1.2 0 0 0 -.258 -.743l-.09 -.1l-.697 -.698a3.2 3.2 0 0 1 -.147 -4.382l.145 -.154l.698 -.698a1.2 1.2 0 0 0 .341 -.71l.008 -.135v-1l.005 -.182a3.2 3.2 0 0 1 3.013 -3.013l.182 -.005h1a1.2 1.2 0 0 0 .743 -.258l.1 -.09l.698 -.697a3.2 3.2 0 0 1 2.269 -.944z" />
                                    </svg>
                                </span>
                                <a class="card-body" href="#">
                                    <!--aqui leva pro usuario da pessoa-->

                                    <div class="container-authorUserImg">
                                        <svg class="icone-thumb" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="#000000"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        </svg>

                                    </div>
                                    <div class="authorName">
                                        <span class="authorNick">Nome do Autor</span>
                                        <span class="authorUser">Alguma descrição</span>
                                    </div>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--right-side do criarPublicação-->
                <form action="#" method="POST" id="mainForm-CriarPubli">
                    <div class="right-side criarPubli_right-menu" style="display:none;" style="background-color:var(--default_backgroundDSAD);padding: 1.5;"
                        id="right-menu_JScontainer-cPubli">

                        <div class="ferramentas_cPubli">
                            <div class="containerHeader__FcP">
                                <h3>Ferramentas</h3>
                            </div>
                            <div class="containerLinks__FcP">
                                <button class="containerAddTool">
                                    <input type="file" class="hiddenMajorInp" id="add-image" accept="image/*">
                                    <svg class="tool__ico" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="#192648" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-photo-plus">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M15 8h.01" />
                                        <path
                                            d="M12.5 21h-6.5a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6.5" />
                                        <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l4 4" />
                                        <path d="M14 14l1 -1c.67 -.644 1.45 -.824 2.182 -.54" />
                                        <path d="M16 19h6" />
                                        <path d="M19 16v6" />
                                    </svg>
                                    <span class="tool__IcoSubtitle">Imagem</span>
                                </button>
                                <button class="containerAddTool">
                                    <input type="file" class="hiddenMajorInp" id="add-video" accept="video/*">
                                    <svg class="tool__ico" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="#192648" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-movie">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                                        <path d="M8 4l0 16" />
                                        <path d="M16 4l0 16" />
                                        <path d="M4 8l4 0" />
                                        <path d="M4 16l4 0" />
                                        <path d="M4 12l16 0" />
                                        <path d="M16 8l4 0" />
                                        <path d="M16 16l4 0" />
                                    </svg>
                                    <span class="tool__IcoSubtitle add-video">Vídeo</span>
                                </button>

                            </div>
                        </div>
                        <div class="configuracoes_cPubli">
                            <div class="containerHeader__FcP">
                                <h3>Configurações</h3>
                            </div>
                            <div class="containerSelects__FcP">
                                <div class="software__select d-column jumboContainer">
                                    <span class="Subsection__Title">Software</span>
                                    <select name="#" id="#">
                                        <option value="0" disabled selected>Selecione</option>
                                    </select>
                                </div>
                                <div class="tags__checkboxes d-column jumboContainer">
                                    <span class="Subsection__Title">Tags</span>
                                    <div class="inputs_container1">
                                        <div class="container-input_checkbox relative">
                                            <label class="checkbox">
                                                <input class="checkbox__personal-css" type="checkbox" name="#" id="#">
                                                <span class="checkmark"></span>
                                            </label>
                                            <span for="#" class="checkbox__informationN">Pixel Art</span>
                                        </div>
                                        <div class="container-input_checkbox relative">
                                            <label class="checkbox">
                                                <input class="checkbox__personal-css" type="checkbox"
                                                    name="pixelArt_check" id="#">
                                                <span class="checkmark"></span>
                                            </label>
                                            <span for="#" class="checkbox__informationN">Animação</span>
                                        </div>
                                        <div class="container-input_checkbox relative">
                                            <label class="checkbox">
                                                <input class="checkbox__personal-css" type="checkbox"
                                                    name="animacao_check" id="#">
                                                <span class="checkmark"></span>
                                            </label>
                                            <span for="#" class="checkbox__informationN">Arte Vetorial</span>
                                        </div>
                                        <div class="container-input_checkbox relative">
                                            <label class="checkbox">
                                                <input class="checkbox__personal-css" type="checkbox"
                                                    name="arteVetorial_check" id="#">
                                                <span class="checkmark"></span>
                                            </label>
                                            <span for="#" class="checkbox__informationN">Ilustração</span>
                                        </div>
                                        <div class="container-input_checkbox relative">
                                            <label class="checkbox">
                                                <input class="checkbox__personal-css" type="checkbox"
                                                    name="ilustracao_check" id="#">
                                                <span class="checkmark"></span>
                                            </label>
                                            <span for="#" class="checkbox__informationN">Fotografia</span>
                                        </div>
                                        <div class="container-input_checkbox relative">
                                            <label class="checkbox">
                                                <input class="checkbox__personal-css" type="checkbox"
                                                    name="fotografia_check" id="#">
                                                <span class="checkmark"></span>
                                            </label>
                                            <span for="#" class="checkbox__informationN">Arte Digital</span>
                                        </div>
                                        <div class="container-input_checkbox relative">
                                            <label class="checkbox">
                                                <input class="checkbox__personal-css" type="checkbox"
                                                    name="arteDigital_check" id="#">
                                                <span class="checkmark"></span>
                                            </label>
                                            <span for="#" class="checkbox__informationN">Concurso</span>
                                        </div>

                                    </div>

                                </div>
                                <div class="direcionamento__checkboxes d-column jumboContainer">
                                    <span class="Subsection__Title">Direcionamento</span>
                                    <div class="inputs_container2">
                                        <div class="container-input_checkbox relative">
                                            <label class="checkbox">
                                                <input class="checkbox__personal-css limited-checkbox" type="checkbox"
                                                    name="store" id="produto__checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                            <span for="produto__checkbox" class="checkbox__informationN">Produto</span>
                                        </div>
                                        <div class="container-input_checkbox relative">
                                            <label class="checkbox">
                                                <input class="checkbox__personal-css limited-checkbox" type="checkbox"
                                                    name="service" id="servico__checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                            <span for="servico__checkbox" class="checkbox__informationN">Serviço</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="containerThumbnail">
                                <label class="thumbBox">
                                    <div class="containerAbsoluteInfo ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                            viewBox="0 0 24 24" fill="none" stroke="#192648" stroke-width="2.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-upload">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                            <path d="M7 9l5 -5l5 5" />
                                            <path d="M12 4l0 12" />
                                        </svg>
                                        <span>Thumbnail</span>
                                    </div>
                                    <input class="thumbnailUploader" type="file" accept="image/*">
                                </label>
                            </div>
                        </div>
                        <button type="button" class="submitBtn_cPubli" data-toggle="modal" id="submitBtn_cPubli"
                            data-target="#modalPortifolioContainer">Continuar</button>

                        <!-- MODAIS -->

                    </div>
                    <div class="modal fade" id="modalPortifolioContainer" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header modalPortHeader">
                                    <h5 class="modal-title" id="changeTitle-modalPort">Detalhes - Serviço</h5>
                                </div>
                                <div class="modal-body modalPortBody">
                                    <div class="containerTitlePort inpGroupModal d-flex flex-column">
                                        <label class="label equalMarginB" for="tituloModal_Port ">Título</label>
                                        <input placeholder="Nova Postagem" type="text" name="ttlPortifolio"
                                            id="tituloModal_Port">
                                    </div>
                                    <div class="containerDescPort inpGroupModal d-flex flex-column relative">
                                        <label class="label equalMarginB" for="descricaoPortifolio ">Descrição</label>
                                        <textarea name="descricaoPortifolio" id="descricaoPortifolio" required
                                            maxlength="145"></textarea>
                                        <div id="charCount" class="char-count">0/145</div>
                                    </div>
                                    <div class="modal-portifolio_container"></div>
                                    <div class="modal-servico_container">
                                        <div class="containerTitlePort inpGroupModal d-flex flex-column">
                                            <label class="label equalMarginB" for="tituloModal_Port ">Tempo de
                                                Entrega</label>
                                            <select name="tempoEntrega" id="tempoEntrega">
                                                <option value="0" disabled selected>Selecionar</option>
                                            </select>
                                        </div>
                                        <div class="input-container d-flex flex-column">
                                            <label for="precoInicial_modalPort " class="precoIniPORT">Preço
                                                Inicial</label>
                                            <div class="inpGroupModal d-flex flex-row inGroupDiferente">
                                                <label for="precoInicial_modalPort" class="realSimbolo">R$</label>
                                                <input type="number" id="precoInicial_modalPort" name="precoInicial"
                                                    step="0.01" min="0">
                                            </div>
                                        </div><br>
                                    </div>

                                    <div class="modal-produto_container">
                                        <div class="containerGrid_licenPreco">

                                            <div class="licenca-container inpGroupModal d-flex flex-column">
                                                <label class="label equalMarginB"
                                                    for="tituloModal_Port ">Licença</label>
                                                <div class="checkboxLicenca-container">
                                                    <div class="container-input_checkbox d-flex flex-row relative">
                                                        <label class="checkbox">
                                                            <input class="checkbox__personal-css" type="checkbox"
                                                                name="#" id="pago_produtoCheckbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span for="#" class="checkbox__informationN">Para Venda</span>
                                                    </div>
                                                    <div class="container-input_checkbox relative">
                                                        <label class="checkbox">
                                                            <input class="checkbox__personal-css" type="checkbox"
                                                                name="#" id="gratuito_produtoCheckbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <span for="#" class="checkbox__informationN">Gratuito</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="preco-container inpGroupModal d-flex flex-column">
                                                <div class="input-container d-flex flex-column">
                                                    <label for="precoInicial_modalPort " class="precoIniPORT">Preço
                                                        Inicial</label>
                                                    <div class="inpGroupModal d-flex flex-row inGroupDiferente">
                                                        <label for="precoInicial_modalPort"
                                                            class="realSimbolo">R$</label>
                                                        <input type="number" id="precoInicial_modalPort"
                                                            name="precoInicial" step="0.01" min="0">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-produto_container">
                                            <div class="containerGrid_licenPreco">



                                                <div class="preco-container inpGroupModal d-flex flex-column">
                                                    <div class="input-container d-flex flex-column">
                                                        <label
                                                            for="precoInicial_modalPort pagamento_modalPort-tooltipPart"
                                                            class="precoIniPORT">
                                                            <span id="pagHeader">Pagamento</span>
                                                            <button type="button"
                                                                class="btn btn-secondary tooltip__pagamentoModal"
                                                                data-toggle="tooltip" data-placement="right"
                                                                title="Tooltip na direita">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="#192648"
                                                                    class="icon icon-tabler icons-tabler-filled icon-tabler-info-circle">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path
                                                                        d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm0 9h-1l-.117 .007a1 1 0 0 0 0 1.986l.117 .007v3l.007 .117a1 1 0 0 0 .876 .876l.117 .007h1l.117 -.007a1 1 0 0 0 .876 -.876l.007 -.117l-.007 -.117a1 1 0 0 0 -.764 -.857l-.112 -.02l-.117 -.006v-3l-.007 -.117a1 1 0 0 0 -.876 -.876l-.117 -.007zm.01 -3l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" />
                                                                </svg>
                                                            </button>
                                                        </label>
                                                        <div class="containerGrid_pix-produto">
                                                            <div class="inpGroupModal d-flex flex-row inGroupDiferente">
                                                                <select name="banco_produto" id="banco_produto">
                                                                    <option selected disabled value="null">Banco</option>
                                                                    <!--colocar outros bancos aq-->
                                                                </select>

                                                            </div>
                                                            <div class="inpGroupModal d-flex flex-row inGroupDiferente">
                                                                <input placeholder="Agência" type="text"
                                                                    id="agencia_produto" name="agencia_produto">
                                                            </div>
                                                            <div class="inpGroupModal d-flex flex-row inGroupDiferente">
                                                                <input placeholder="Conta" type="text"
                                                                    id="conta_produto" name="conta_produto">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="container-ativos">
                                                <div class="container_ativosNome" id="container_ativosNome">
                                                    <span id="atHeader">Ativos</span>
                                                    <div class="containerAtivos__nomenc" id="ativosPort_list">

                                                    </div>
                                                </div>
                                                <div class="containerThumbnail containerThumbnailV231"
                                                    id="containerThumbnail__anexarAM">
                                                    <label class="thumbBox" id="containerGerenciarAtivos"
                                                        onselectstart="return false">
                                                        <div class="containerAbsoluteInfo containerAbsoluteAtivos">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                                height="21" viewBox="0 0 24 24" fill="none"
                                                                stroke="#000000" stroke-width="2.5"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon icon-tabler icons-tabler-outline icon-tabler-upload">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2">
                                                                </path>
                                                                <path d="M7 9l5 -5l5 5"></path>
                                                                <path d="M12 4l0 12"></path>
                                                            </svg>
                                                            <span>Anexar Ativos</span>
                                                        </div>
                                                        <span class="info__adt">
                                                            Adicione arquivos como fontes, ilustrações, fotos, zips ou
                                                            modelos como downloads gratuitos ou pagos.
                                                        </span>
                                                        <input class="thumbnailUploader" required type="file"
                                                            name="ativosPort" id="ativosPort_uploader" multiple
                                                            onchange="javascript:anexActive()">
                                                    </label>
                                                </div>
                                            </div><br>
                                        </div>
                                    </div>

                                    <div class="modal-footer modalPortFooter">
                                        <input type="submit" class="btn btn-primary postarSubmitBtn" value="Postar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="PortTitle__official" name="TituloPortifolio">
                    </div>
                </form>
                <!--right-side do configuracoes-->
                <div class="right-side configuracoes_right-menu" style="display:block;padding-left: 0.5%;"
                    id="right-menu_JScontainer-configProf">
                    <div class="ferramentas_cPubli">
                        <div class="containerHeader__ConP">
                            <h3 id="containerHeader__ConPH3">Definições
                            </h3>
                        </div>
                    </div>
                    <div class="container_definicoesLinks">
                        
                        <a ChangeIframe="acess_frame" class="reDirectConfigFrame__link rDCF_ativo">
                            Acessibilidade
                        </a>
                        <a <?php echo isset($_SESSION['USER_ID']) ? 'ChangeIframe="inCon_frame"' : 'onclick="login()"'; ?> class="reDirectConfigFrame__link ">
                            Informações da conta
                        </a>
                        <a ChangeIframe="permi_frame" class="reDirectConfigFrame__link">
                            Permissões
                        </a>
                        <a ChangeIframe="hisCo_frame" class="reDirectConfigFrame__link">
                            Histórico de compras
                        </a>
                        <a href="assets/media/terms/termos_de_uso.pdf" target="_blank"
                            class="reDirectConfigFrame__linkV2">
                            Termos de uso
                        </a>
                        <a href="assets/media/terms/politica_de_privacidade.pdf" target="_blank"
                            class="reDirectConfigFrame__linkV2">
                            Política de privacidade
                        </a>
                    </div>
                    <div class="linksSoltos-bottom0">
                        <a href="view/logout.php" id="SysLogout__confMenu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                <path d="M9 12h12l-3 -3" />
                                <path d="M18 15l3 -3" />
                            </svg>
                            <span>Logout</span>
                        </a>
                        <a href="#" class="link ajudaCenterLink-bmenu" ajudaCenter="ligado">Precisa de ajuda?</a>
                    </div>
                </div>
                <!--right-side do usuario-->
                <div class="right-side usuario_right-menu" style="display:none;" id="right-menu_JScontainer-usuario">
                    <div class="firstContainer-info">
                        <div class="container-UserImg__name">
                            <div class="userProfileImg overflow-hidden" id="user_profPic">
                                <img style="width:100%"src="assets/media/pfp/<?php echo $_SESSION["USER_PFP"]?>" alt="Nome do usuario">
                            </div>
                            <span class="user_profNam" id="username"><?PHP echo $_SESSION["USER_USERNAME"]?></span>
                        </div>
                    </div>
                    <hr class="prof__divider">
                    <div class="secondContainer-info">
                        <div class="container-userBio__btns">
                            <div class="container__profBio" id="user-bio">
                                <p id="userP-bio" class="truncateBio"><?PHP echo $_SESSION["USER_BIOGRAFIA"]?></p>
                            </div>
                            <hr class="prof__divider">
                            <div class="container__profBtns" id="user-rmenuBtns">
                                <div class="container-divideBtn">
                                    <a href="view/salvos.php" target="iframe_chat" class="equalBtn-profUser">Salvos</a>
                                    <a id="GoToConfig__fromUserpage" href="view/configuracoes.php?configperfil=1" target="iframe_chat" class="equalBtn-profUser">Configurações</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="linksSoltos-bottom0">
                        <a href="view/logout.php" id="SysLogout__confMenu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                <path d="M9 12h12l-3 -3" />
                                <path d="M18 15l3 -3" />
                            </svg>
                            <span>Logout</span>
                        </a>
                        <a href="#" class="link ajudaCenterLink-bmenu" ajudaCenter="ligado">Precisa de ajuda?</a>
                    </div>
                </div>
                <!--right-side do concurso-->
                <div class="right-side concurso_right-side" style="display:none;" id="right-menu_JScontainer-concurso">
                    <div class="main-banners_area" id="main-RMbanners_area">
                        <a href="#" class="banner-concurso br-20 ovrflw-hidden relative" title="Concurso">
                            <!--vai pro perfil do ganhador ALTERAR CONCURSO-->
                            <div class="container-winnerAuthor">
                                <span class="authorName" id="ConcursoAuthor-name">Participe do Concurso</span>
                               </div>
                            <div class="background-darken-curtain bdcV2"></div>
                            <img id="concurso-vencedor_img" src="assets/media/concursos/<?php echo$concurso['img_anuncio']?>">
                            <!--arte do ganhador-->
                        </a>
                        <div class="data-concurso br-20 ovrflw-hidden relative">
                            <div class="containerJS-timeremaining__Concurso absolute w100 h100">

                                <div class="temp_name">
                                    <span class="temp__number" id="temporada-number"
                                        style="font-size: 20px;"><?php echo $concurso["tag"] ?></span>
                                </div>
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
                                 
$data_inicio = new DateTime('2024-08-01');
$data_fim = new DateTime('2024-09-30');

$data_atual = new DateTime();
if ($data_atual < $data_fim) {
    $diferenca = $data_fim->getTimestamp() - $data_atual->getTimestamp();
} else {
    $diferenca = 0;
}
                                ?>
                                <span  class="temporizador time-remaining__countdown">00:00:00</span>
                            </div>
                            <div class="background-darken-curtain"></div>
                            <div class="image-curtain">
                                <img src="assets/media/concursos/<?php echo$concurso['img_anuncio']?>"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <hr class="noHr">
                    <div class="autores-famosos">
                        <h3>Artistas em alta</h3>
                        <div class="container-trendingCards_t">
                            <div class="card trending-card relative">
                                <span class="number-order">
                                    <span class="number-order__visual">1</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" stroke="#9c9c9c" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" width="100%" height="100%"
                                        viewBox="0 0 24 24" fill="#f9f9f9"
                                        class="icon icon-tabler icons-tabler-filled icon-tabler-rosette">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12.01 2.011a3.2 3.2 0 0 1 2.113 .797l.154 .145l.698 .698a1.2 1.2 0 0 0 .71 .341l.135 .008h1a3.2 3.2 0 0 1 3.195 3.018l.005 .182v1c0 .27 .092 .533 .258 .743l.09 .1l.697 .698a3.2 3.2 0 0 1 .147 4.382l-.145 .154l-.698 .698a1.2 1.2 0 0 0 -.341 .71l-.008 .135v1a3.2 3.2 0 0 1 -3.018 3.195l-.182 .005h-1a1.2 1.2 0 0 0 -.743 .258l-.1 .09l-.698 .697a3.2 3.2 0 0 1 -4.382 .147l-.154 -.145l-.698 -.698a1.2 1.2 0 0 0 -.71 -.341l-.135 -.008h-1a3.2 3.2 0 0 1 -3.195 -3.018l-.005 -.182v-1a1.2 1.2 0 0 0 -.258 -.743l-.09 -.1l-.697 -.698a3.2 3.2 0 0 1 -.147 -4.382l.145 -.154l.698 -.698a1.2 1.2 0 0 0 .341 -.71l.008 -.135v-1l.005 -.182a3.2 3.2 0 0 1 3.013 -3.013l.182 -.005h1a1.2 1.2 0 0 0 .743 -.258l.1 -.09l.698 -.697a3.2 3.2 0 0 1 2.269 -.944z" />
                                    </svg>
                                </span>
                                <a class="card-body" href="#">
                                    <!--aqui leva pro usuario da pessoa-->
                                    <div class="container-authorUserImg">
                                        <svg class="icone-thumb" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="#000000"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        </svg>

                                    </div>
                                    <div class="authorName">
                                        <span class="authorNick">Nome do Autor</span>
                                        <span class="authorUser">Alguma descrição</span>
                                    </div>

                                </a>
                            </div>
                            <div class="card trending-card relative">
                                <span class="number-order">
                                    <span class="number-order__visual">2</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" stroke="#9c9c9c" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" width="100%" height="100%"
                                        viewBox="0 0 24 24" fill="#f9f9f9"
                                        class="icon icon-tabler icons-tabler-filled icon-tabler-rosette">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12.01 2.011a3.2 3.2 0 0 1 2.113 .797l.154 .145l.698 .698a1.2 1.2 0 0 0 .71 .341l.135 .008h1a3.2 3.2 0 0 1 3.195 3.018l.005 .182v1c0 .27 .092 .533 .258 .743l.09 .1l.697 .698a3.2 3.2 0 0 1 .147 4.382l-.145 .154l-.698 .698a1.2 1.2 0 0 0 -.341 .71l-.008 .135v1a3.2 3.2 0 0 1 -3.018 3.195l-.182 .005h-1a1.2 1.2 0 0 0 -.743 .258l-.1 .09l-.698 .697a3.2 3.2 0 0 1 -4.382 .147l-.154 -.145l-.698 -.698a1.2 1.2 0 0 0 -.71 -.341l-.135 -.008h-1a3.2 3.2 0 0 1 -3.195 -3.018l-.005 -.182v-1a1.2 1.2 0 0 0 -.258 -.743l-.09 -.1l-.697 -.698a3.2 3.2 0 0 1 -.147 -4.382l.145 -.154l.698 -.698a1.2 1.2 0 0 0 .341 -.71l.008 -.135v-1l.005 -.182a3.2 3.2 0 0 1 3.013 -3.013l.182 -.005h1a1.2 1.2 0 0 0 .743 -.258l.1 -.09l.698 -.697a3.2 3.2 0 0 1 2.269 -.944z" />
                                    </svg>
                                </span>
                                <a class="card-body" href="#">
                                    <!--aqui leva pro usuario da pessoa-->

                                    <div class="container-authorUserImg">
                                        <svg class="icone-thumb" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="#000000"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        </svg>

                                    </div>
                                    <div class="authorName">
                                        <span class="authorNick">Nome do Autor</span>
                                        <span class="authorUser">Alguma descrição</span>
                                    </div>

                                </a>
                            </div>
                            <div class="card trending-card relative">
                                <span class="number-order">
                                    <span class="number-order__visual">3</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" stroke="#9c9c9c" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" width="100%" height="100%"
                                        viewBox="0 0 24 24" fill="#f9f9f9"
                                        class="icon icon-tabler icons-tabler-filled icon-tabler-rosette">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12.01 2.011a3.2 3.2 0 0 1 2.113 .797l.154 .145l.698 .698a1.2 1.2 0 0 0 .71 .341l.135 .008h1a3.2 3.2 0 0 1 3.195 3.018l.005 .182v1c0 .27 .092 .533 .258 .743l.09 .1l.697 .698a3.2 3.2 0 0 1 .147 4.382l-.145 .154l-.698 .698a1.2 1.2 0 0 0 -.341 .71l-.008 .135v1a3.2 3.2 0 0 1 -3.018 3.195l-.182 .005h-1a1.2 1.2 0 0 0 -.743 .258l-.1 .09l-.698 .697a3.2 3.2 0 0 1 -4.382 .147l-.154 -.145l-.698 -.698a1.2 1.2 0 0 0 -.71 -.341l-.135 -.008h-1a3.2 3.2 0 0 1 -3.195 -3.018l-.005 -.182v-1a1.2 1.2 0 0 0 -.258 -.743l-.09 -.1l-.697 -.698a3.2 3.2 0 0 1 -.147 -4.382l.145 -.154l.698 -.698a1.2 1.2 0 0 0 .341 -.71l.008 -.135v-1l.005 -.182a3.2 3.2 0 0 1 3.013 -3.013l.182 -.005h1a1.2 1.2 0 0 0 .743 -.258l.1 -.09l.698 -.697a3.2 3.2 0 0 1 2.269 -.944z" />
                                    </svg>
                                </span>
                                <a class="card-body" href="#">
                                    <!--aqui leva pro usuario da pessoa-->

                                    <div class="container-authorUserImg">
                                        <svg class="icone-thumb" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="#000000"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        </svg>

                                    </div>
                                    <div class="authorName">
                                        <span class="authorNick">Nome do Autor</span>
                                        <span class="authorUser">Alguma descrição</span>
                                    </div>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--right-side conversas AQUI É PHP NÃO MEXER EM NADA!-->
                <div class="right-side conversas_right-side" style="display:none;" id="right-menu_JScontainer-conversas">
                    <div class="col-3 col-lateral">
                        <h5>Conversas</h5>
                        <div class="searchbar-div">
                            <form action="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="#707070" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                    <path d="M21 21l-6 -6" />
                                </svg>
                                <input type="text" name="" id="" class="searchbar" placeholder="Pesquise...">
                        </div>
                        </form>
                        <div class="lista-conversas">
                            <ul class="ul-conversa">





                            </ul>
                        </div>




                    </div>



                </div>
            </div>
    </div>
    </main>
<!--PORTIFOLIO MODAL-->
    <div class="modal fade portifolio-modal" id="portifolio-modal" tabindex="-1" role="dialog"
        aria-labelledby="portifolio-modal_label" aria-hidden="true">
        <div class="container-totalincrement">
            <button type="button" tabCloseModal="RespVisible" class="close " onclick="closeModal()" data-dismiss="modal" aria-label="Fechar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </button>
            <div class="noMargin modal-dialog modal-container_portifolio" id="portifolio-completo" role="document">

                <div class="modal-content portifolio-content w100">
                    Aqui fica o portifólio
                </div>
            </div>
            <div class="noMargin modal-dialog rightShow-menu-infoPortifolio" id="info-modalportifolio"
                style="background-color: #fff;border-radius:.6rem" role="document">
                <div class="pdng-6pcent modal-content infoport-content h100 w100">
                    <section id="ModalDesc_AuthorHeader">
                        <button type="button" onclick="closeModal()" tabCloseModal="RegulVisible" class="close" data-dismiss="modal"
                            aria-label="Fechar">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M18 6l-12 12" />
                                <path d="M6 6l12 12" />
                            </svg>
                        </button>
                        <div class="ContainerAuthorProfileNamePic d-flex flex-row">
                            <img width="25%" src="assets/media/logo/4.png" id="pfp_modal_portifolio"  alt="">
                            <div class="containerProfileNam d-flex flex-column">
                                <div id="nickname_modal_portifolio" class="nomeRealAutorTotal">Nome do Autor</div>
                                <div id="username_modal_portifolio"  class="usernameAutorTotal">@username</div>
                            </div>
                    </section>
                    <section id="ModalDesc_PortifHeader" class="pTop0">
                        <div  id="titulo_modal_portifolio" class="Container__portfolioName ">
                            <h3>Nome do Portifolio</h3>
                        </div>
                        <div id="descricao_modal_porifolio"class="descricaoPORTfolio">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis similique illum
                            harum nam sequi est, eaque nisi a, praesentium optio quidem. </div><br>


                        <div id="valor_modal_portifolio" class="containerContratarPerfilButton">
                            <h3  class="valorPortifolio_cCPB"><span>R$</span>00.00</h3>
                            <a href="#" id="link_modal_portifolio"class="btn btn-primary">Comprar</a>
                        </div>
                        <!-- <div class="containerButtonsLikeShareSave">
                                <a href="">Like</a>
                                <a href="">dsadsa</a>
                                <a href="">dsadsa</a>
                            </div> -->
                    </section>
                    <section id="ModalDesc_Tags" class="pTop0">
                        <div class="Container__softwareUsado">
                            <h5>Software utilizado</h5>
                        </div>
                        <div id="softwares_modal_portifolio" class="containerSoftwaresUtilizadosThumb">
                            <span>Adobe</span>
                            <span>Adobe</span>
                        </div><br>
                        <div class="Container__softwareUsado">
                            <h5>Tags</h5>
                        </div>
                        <div id="tags_modal_portifolio" class="containerTagsUtilizadas">
                            <!-- <span>#PixelArt</span>
                            <span>#Animacao</span>
                            <span>#ArteVetorial</span>
                            <span>#IlustracaoDigital</span>
                            <span>#Fotografia</span>
                            <span>#ArteDigital</span>
                            <span>#ArteEm3d</span> -->
                        </div>
                    </section>
                    <section id="ModalDesc_Comentarios" class="pTop0">
                        
                    <h3 style="font-size: 16px; font-weight:bold;">Comentários</h3>
                    <div class="adicionarComentario">
                            <form id="formcomment" class="grid-comentario">
                                <textarea placeholder="Escreva um comentário" name="" id="textarea_comment"></textarea>
                                <div class="containerSubmitComment">
                                    <svg xmlns="http://www.w3.org/2000/svg" alt="enviar" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-send-2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M4.698 4.034l16.302 7.966l-16.302 7.966a.503 .503 0 0 1 -.546 -.124a.555 .555 0 0 1 -.12 -.568l2.468 -7.274l-2.468 -7.274a.555 .555 0 0 1 .12 -.568a.503 .503 0 0 1 .546 -.124z" />
                                        <path d="M6.5 12h14.5" />
                                    </svg>
                                    <input class="btn btn-primary" type="button" onclick="new_comment()" id="comment" value="">
                                </div>
                            </form>
                        </div><br>
                        
                        <div id="div_comentarios" class="Container__portfolioName ">
                           
                        </div>
                        <style>
                            .comment {
                                position: relative;
                                padding-left: 0 !important;
                                padding: 10px;
                                margin-bottom: 10px;
                                transition: all 0.3s;
                            }

                            .comment-body .name {
                                font-weight: bold;
                            }

                            .comment-options {
                                display: none;
                                position: absolute;
                                right: 10px;
                                top: 10px;
                            }

                            .comment:hover .comment-options {
                                display: block;
                            }

                            .comment-options i {
                                cursor: pointer;
                                font-size: 20px;
                            }

                            .dropdown {
                                width: 100%;
    position: relative;
    display: inline-block;
                            }

                            .dropdown-content {
                                display: none;
                                position: absolute;
                                right: 0;
                                min-width: 100px;
                                z-index: 1;
                                border-radius: 4px;
                                overflow: hidden;
                            }

                            .comment-body {
                                font-size: 15px;
                            }

                            .dropdown-content a {
                                color: black;
                                padding: 8px 12px;
                                text-decoration: none;
                                display: block;
                                font-size: 14px;
                            }

                            .dropdown:hover .dropdown-content {
                                display: block;
                            }

                            .containerSubmitComment {
                                width: 100%;
                                height: 100%;
                                position: relative;
                                display: flex;
                                flex-direction: row;
                                flex-wrap: nowrap;
                                align-content: center;
                                justify-content: center;
                                align-items: center;
                                line-height: 1.5;
                                border-radius: .25rem;
                            }

                            .grid-comentario>input {
                                width: 100%;
                                position: relative;

                                padding: .375rem .75rem;
                                height: 100%;
                            }

                            .containerSubmitComment>svg {
                                pointer-events: none;
                                position: absolute;

                            }

                            .grid-comentario {
                                display: grid;
                                gap: 1vw;
                                grid-template-columns: 2fr .5fr;
                            }

                            .containerSubmitComment input {
                                height: 100%;
                                width: 100%;
                            }


                            textarea {
                                width: 100%;
                                min-height: 41px;
                                height: 41px;
                                max-height: 200px;
                                padding: 10px;

                                border-radius: 0.5rem;
                                text-rendering: geometricPrecision;

                                resize: vertical;
                                overflow: auto;
                            }

                            textarea::-webkit-scrollbar {
                                cursor: default;
                                width: 5px;
                            }

                            textarea::-webkit-scrollbar-thumb {
                                background-color: #888;
                                border-radius: 20px;
                            }

                            textarea::-webkit-scrollbar-track {
                                background-color: transparent;
                            }

                            #reportUser {
                                text-decoration: none !important;
                                padding: 3%;
                                border-radius: .5rem;
                                display: flex;
                                flex-direction: row;
                                justify-content: center;
                                max-width: 40%;
                                gap: 3px;
                                border: 1px solid transparent;
                                align-items: center;
                            }

                            #reportUser>span {
                                font-size: 14px;
                            }

                            #reportUser:hover {
                                border: var(--default_border);
                                box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5);

                            }
                        </style>


                        <div class="comment">
                            <div class="comment-body">
                                <span class="name">@username</span>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga doloribus ullam ut
                                blanditiis
                            </div>
                        </div>


                        
                      
                    </section>
                    <section id="reportUserSec " class="pTop0">
                        <a href="#" ajudaCenter="ligado" id="reportUser">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-flag">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 5a5 5 0 0 1 7 0a5 5 0 0 0 7 0v9a5 5 0 0 1 -7 0a5 5 0 0 0 -7 0v-9z" />
                                <path d="M5 21v-7" />
                            </svg>
                            <span ajudaCenter="ligado">Denunciar</span>
                        </a>
                    </section>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade portifolio-modal" id="portifolio-modal" tabindex="-1" role="dialog"
        aria-labelledby="portifolio-modal_label" aria-hidden="true">
        <div class="container-totalincrement">
            <button type="button" tabCloseModal="RespVisible" class="close " onclick="closeModal()" data-dismiss="modal" aria-label="Fechar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </button>
            <div class="noMargin modal-dialog modal-container_portifolio" id="portifolio-completo" role="document">

                <div class="modal-content portifolio-content w100">
                    CMJAISFJHWSWKSFKDJSJ
                </div>
            </div>
            <div class="noMargin modal-dialog rightShow-menu-infoPortifolio" id="info-modalportifolio"
                style="background-color: #fff;border-radius:.6rem" role="document">
                <div class="pdng-6pcent modal-content infoport-content h100 w100">
                    <section id="ModalDesc_AuthorHeader">
                        <button type="button" tabCloseModal="RegulVisible" onclick="closeModal()" class="close" data-dismiss="modal"
                            aria-label="Fechar">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M18 6l-12 12" />
                                <path d="M6 6l12 12" />
                            </svg>
                        </button>
                        <div class="ContainerAuthorProfileNamePic d-flex flex-row">
                            <img width="25%" src="assets/media/logo/4.png" alt="">
                            <div class="containerProfileNam d-flex flex-column">
                                <div class="nomeRealAutorTotal">Nome do Autor</div>
                                <div class="usernameAutorTotal">@username</div>
                            </div>
                    </section>
                    <section id="ModalDesc_PortifHeader" class="pTop0">
                        <div class="Container__portfolioName ">
                            <h3>Nome do Portifolio</h3>
                        </div>
                        <div class="descricaoPORTfolio">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis similique illum
                            harum nam sequi est, eaque nisi a, praesentium optio quidem. </div><br>


                        <div class="containerContratarPerfilButton">
                            <h3 class="valorPortifolio_cCPB"><span>R$</span>00.00</h3>
                            <a href="#" class="btn btn-primary">Comprar</a>
                        </div>
                         <div class="containerButtonsLikeShareSave">
                                <a href="">Like</a>
                                <a href="">dsadsa</a>
                                <a href="">dsadsa</a>
                            </div> 
                    </section>
                    <section id="ModalDesc_Tags" class="pTop0">
                        <div class="Container__softwareUsado">
                            <h5>Software utilizado</h5>
                        </div>
                        <div class="containerSoftwaresUtilizadosThumb">
                            <span>Adobe</span>
                            <span>Adobe</span>
                        </div><br>
                        <div class="Container__softwareUsado">
                            <h5>Tags</h5>
                        </div>
                        <div class="containerTagsUtilizadas">
                            <span>#PixelArt</span>
                            <span>#Animacao</span>
                            <span>#ArteVetorial</span>
                            <span>#IlustracaoDigital</span>
                            <span>#Fotografia</span>
                            <span>#ArteDigital</span>
                            <span>#ArteEm3d</span>
                        </div>
                    </section>
                    <section id="ModalDesc_Comentarios" class="pTop0">
                        <div class="Container__portfolioName ">
                            <h3>Comentários</h3>
                        </div>
                        <style>
                            .comment {
                                position: relative;
                                padding-left: 0 !important;
                                padding: 10px;
                                margin-bottom: 10px;
                                transition: all 0.3s;
                            }

                            .comment-body .name {
                                font-weight: bold;
                            }

                            .comment-options {
                                display: none;
                                position: absolute;
                                right: 10px;
                                top: 10px;
                            }

                            .comment:hover .comment-options {
                                display: block;
                            }

                            .comment-options i {
                                cursor: pointer;
                                font-size: 20px;
                            }

                            .dropdown {
                                position: relative;
                                display: inline-block;
                            }

                            .dropdown-content {
                                display: none;
                                position: absolute;
                                right: 0;
                                min-width: 100px;
                                z-index: 1;
                                border-radius: 4px;
                                overflow: hidden;
                            }

                            .comment-body {
                                font-size: 15px;
                            }

                            .dropdown-content a {
                                color: black;
                                padding: 8px 12px;
                                text-decoration: none;
                                display: block;
                                font-size: 14px;
                            }

                            .dropdown:hover .dropdown-content {
                                display: block;
                            }

                            .containerSubmitComment {
                                width: 100%;
                                height: 100%;
                                position: relative;
                                display: flex;
                                flex-direction: row;
                                flex-wrap: nowrap;
                                align-content: center;
                                justify-content: center;
                                align-items: center;
                                line-height: 1.5;
                                border-radius: .25rem;
                            }

                            .grid-comentario>input {
                                width: 100%;
                                position: relative;

                                padding: .375rem .75rem;
                                height: 100%;
                            }

                            .containerSubmitComment>svg {
                                pointer-events: none;
                                position: absolute;

                            }

                            .grid-comentario {
                                display: grid;
                                gap: 1vw;
                                grid-template-columns: 2fr .5fr;
                            }

                            .containerSubmitComment input {
                                height: 100%;
                                width: 100%;
                            }


                            textarea {
                                width: 100%;
                                min-height: 41px;
                                height: 41px;
                                max-height: 200px;
                                padding: 10px;

                                border-radius: 0.5rem;
                                text-rendering: geometricPrecision;

                                resize: vertical;
                                overflow: auto;
                            }

                            textarea::-webkit-scrollbar {
                                cursor: default;
                                width: 5px;
                            }

                            textarea::-webkit-scrollbar-thumb {
                                background-color: #888;
                                border-radius: 20px;
                            }

                            textarea::-webkit-scrollbar-track {
                                background-color: transparent;
                            }

                            #reportUser {
                                text-decoration: none !important;
                                padding: 3%;
                                border-radius: .5rem;
                                display: flex;
                                flex-direction: row;
                                justify-content: center;
                                max-width: 40%;
                                gap: 3px;
                                border: 1px solid transparent;
                                align-items: center;
                            }

                            #reportUser>span {
                                font-size: 14px;
                            }

                            #reportUser:hover {
                                border: var(--default_border);
                                box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5);

                            }
                        </style>
                        <div class="comment">
                            <div class="comment-body">
                                <span class="name">@username</span>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga doloribus ullam ut
                                blanditiis
                            </div>
                        </div>
                        <div class="adicionarComentario">
                            <form class="grid-comentario">
                                <textarea placeholder="Escreva um comentário" name="" id=""></textarea>
                                <div class="containerSubmitComment">
                                    <svg xmlns="http://www.w3.org/2000/svg" alt="enviar" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-send-2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M4.698 4.034l16.302 7.966l-16.302 7.966a.503 .503 0 0 1 -.546 -.124a.555 .555 0 0 1 -.12 -.568l2.468 -7.274l-2.468 -7.274a.555 .555 0 0 1 .12 -.568a.503 .503 0 0 1 .546 -.124z" />
                                        <path d="M6.5 12h14.5" />
                                    </svg>
                                    <input class="btn btn-primary" type="submit" value="">
                                </div>
                            </form>
                        </div>
                    </section>
                    <section id="reportUserSec " class="pTop0">
                        <a href="#" ajudaCenter="ligado" id="reportUser">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-flag">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 5a5 5 0 0 1 7 0a5 5 0 0 0 7 0v9a5 5 0 0 1 -7 0a5 5 0 0 0 -7 0v-9z" />
                                <path d="M5 21v-7" />
                            </svg>
                            <span>Denunciar</span>
                        </a>
                    </section>
                </div>
            </div>
        </div>

    </div>
    </div>
    <script src="assets/js/conversas.js"></script>
    <script src="assets/js/ferramentas.js"></script>
    <script src="assets/js/pushnoti.js"></script>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <style>
        /*CSS do modal sweet alert*/
        .impoMinorTelCont {
            font-size: 1.2em;
            font-weight: bold;
        }

        .swal2-icon-content {
            font-weight: bold;
            color: #facea8;
        }

        .swal2-footer {
            display: flex !important;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .impoMinorTelCont__btn {
            cursor: pointer;
            border-radius: 20px;
            background-color: #f9f9f9;
            border: 1px solid #e8e8e8;
            padding: 1.67%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
    </style>
    <script src="assets/js/conversas.js"></script>
    <script>
    // Função que atualiza o temporizador
    
    var diferenca = <?php echo $diferenca; ?>;
        function atualizarTemporizador() {
            console.log(diferenca+"cu")
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
                console.log("porra")
                let countdowns = document.getElementsByClassName('temporizador');
for (let i = 0; i < countdowns.length; i++) {
    countdowns[i].innerHTML = dias + ": " + horas + ": " + minutos;
}

            } else {
                let countdowns = document.getElementsByClassName('temporizador');
for (let i = 0; i < countdowns.length; i++) {
    countdowns[i].innerHTML = "TIMEOUT";

}
  clearInterval(intervalo);
            }
            
        }

        // Atualiza o temporizador a cada segundo
        var intervalo = setInterval(atualizarTemporizador, 1000);
        </script> <script>
        function goToPaginacerta(element) {
            const paggina = element.getAttribute('paggina')
            document.querySelector(`#${paggina}`).click()
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('apagarTudo__noti').addEventListener('click', function() {
                localStorage.removeItem('notifications')
                const container = document.getElementById('notifications-container')
                container.innerHTML = ''
                verif_qtdNoti()
            })
            document.getElementById('marcarComoLido__noti').addEventListener('click', function() {
                let notifications = JSON.parse(localStorage.getItem('notifications')) || []
                notifications.forEach(notification => {
                    notification.clicked = true
                })
                localStorage.setItem('notifications', JSON.stringify(notifications))
                const notificationElements = document.querySelectorAll('#notifications-container .notification');
                notificationElements.forEach(notificationDiv => {
                    notificationDiv.style.border = 'var(--default_border)'
                })
                verif_qtdNoti()
            })
        })

        function searchConversations(query) {
            $.ajax({
                url: 'controller/controller_chat.php',
                method: 'GET',
                dataType: 'json',
                data: {
                    search: query
                },
                success: function(response) {
                    var chatList = $('.ul-conversa');
                    chatList.empty();
                    if (response.result > 0) {
                        Object.keys(response).forEach(function(key) {
                            if (key !== 'result') {
                                var conversa = response[key];
                                var listItem = '<li class="li-conversa"><a href="view/chat.php?room=new&pfp=' + conversa.pfp + '&new=' + conversa.ID_ADM + '" target="iframe_chat" class="a-conversa">' +
                                    '<div class="img-pfp">' +
                                    '<img src="assets/media/pfp/' + conversa.pfp + '" alt="">' +
                                    '</div>' +
                                    '<p class="name">' +
                                    conversa.nome +
                                    '<span class="demotext">demo texto</span>' +
                                    '</p>' +
                                    '</a></li>';
                                chatList.append(listItem);
                            }
                        });
                    } else {
                        chatList.append('<li class="li-conversa">Não há conversas disponíveis</li>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erro na requisição:', error);
                    console.error(xhr.responseText); // Para ver a resposta completa do servidor
                }
            });
        }

        function list() {
            var elementos = document.querySelectorAll('.li-conversa');
            elementos.forEach(function(elemento) {
                elemento.addEventListener('click', function() {
                    elementos.forEach(function(el) {
                        el.classList.remove('active');
                    });
                    // Adiciona a classe 'active' apenas ao elemento clicado
                    this.classList.add('active');
                    if (window.innerWidth < 750) {//stela, aq eu adicionei só pro responsivo blz, n vai alterar nada no resto :)

                    document.querySelector('.right-side.conversas_right-side').style.display = 'none';
                    }
                });
            });
        };

        function atualizarConversas() {

            $.ajax({
                url: 'controller/controller_chat.php?conversas=1',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log('chegou aqui')
                    var chatList = $('.ul-conversa');
                    chatList.empty();
                    // Itera sobre as propriedades numéricas da resposta
                    Object.keys(response).forEach(function(key) {
                        // Verifica se a chave é um número e não é "result"
                        if (!isNaN(key)) {
                            var conversa = response[key];
                            var listItem = '<li class="li-conversa" onclick="list()" ><a href="view/chat.php?room=' + conversa.id_conversa + '&pfp=' + conversa.pfp2 + '" target="iframe_chat" class="a-conversa">' +
                                '<div class="img-pfp">' +
                                '<img src="assets/media/pfp/' + conversa.pfp2 + '" alt="" srcset="">' +
                                '</div>' +
                                '<p class="name">' +
                                conversa.nome2 +
                                '<span class="demotext">demo texto</span>' +
                                '</p>' +
                                '</a></li>';
                            chatList.append(listItem);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Erro na requisição:', error);
                }
            });
        }
        $(document).ready(function() {
            atualizarConversas();
            setInterval(atualizarConversas, 30000);
        });
        $(document).ready(function() {
            $('.searchbar').on('input', function() {
                var query = $(this).val();
                if (query === '') {
                    atualizarConversas();
                } else {
                    searchConversations(query);
                }
            });

            atualizarConversas();
        });
    </script>
    <script>
       document.addEventListener('DOMContentLoaded',()=>{
            const links = document.querySelectorAll('.a-conversa');
        links.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const href = this.getAttribute('href');
                const iframe = document.getElementById('containerIframe');
                iframe.src = href;
            });
        });
        const submitBtn = document.getElementById('submitBtn_cPubli');
        const produtoCheckbox = document.getElementById('produto__checkbox');
        const servicoCheckbox = document.getElementById('servico__checkbox');

        function checkCheckboxes() {
            if (produtoCheckbox.checked || servicoCheckbox.checked) {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        }

        produtoCheckbox.addEventListener('change', checkCheckboxes);
        servicoCheckbox.addEventListener('change', checkCheckboxes);

        checkCheckboxes();
        })


        document.addEventListener('DOMContentLoaded', function() {
            const gratuitoCheckbox = document.getElementById('gratuito_produtoCheckbox');
            const pagoCheckbox = document.getElementById('pago_produtoCheckbox');
            const precoInicialInput = document.getElementById('precoInicial_modalPort');

            function handleCheckboxChange(event) {
                if (event.target === gratuitoCheckbox) {
                    pagoCheckbox.checked = false;
                    precoInicialInput.disabled = true;
                    precoInicialInput.value = '0000';
                } else if (event.target === pagoCheckbox) {
                    gratuitoCheckbox.checked = false;
                    precoInicialInput.disabled = false;
                }
            }

            gratuitoCheckbox.addEventListener('change', handleCheckboxChange);
            pagoCheckbox.addEventListener('change', handleCheckboxChange);

            precoInicialInput.disabled = true
        });

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.reDirectConfigFrame__link').forEach(link => {
                link.addEventListener('click', function(e) {
                    console.log('teste link menu config')
                    const menuConfig = document.querySelector('#right-menu_JScontainer-configProf');
                    if (window.innerWidth > 750) {
                        menuConfig.style.display = 'flex'
                    } else {
                        menuConfig.style.display = 'none'
                    }
                    e.preventDefault()
                    const targetIframe = this.getAttribute('ChangeIframe')
                    const iframe = document.querySelector('#containerIframe')
                    iframe.contentWindow.postMessage(targetIframe, '*')

                    document.querySelectorAll('.reDirectConfigFrame__link').forEach(link => {
                        link.classList.remove('rDCF_ativo')
                    });

                    this.classList.add('rDCF_ativo')
                })
            })
        })
    </script>
    <script>
        //notificacoes
        document.getElementById('toggleNotifications').addEventListener('click', function() {
            const container = document.querySelector('.containerViewNotifications');
            if (container.style.display === 'none' || container.style.display === '') {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        })

        function checkScreenSize() {
            if (window.innerWidth <= 750) {
                if (document.querySelector('#containerIframe').src.includes('view/criarPublicacao.php')) {
                    Swal.fire({
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        showLoaderOnConfirm: false,
                        title: "<strong class='impoMinorTelCont'>Importante</strong>",
                        icon: "warning",
                        html: `Criar publicações nesta página é recomendado apenas para tablets ou computadores. A usabilidade em dispositivos móveis pode ser limitada e dificultar a experiência.`,
                        showCloseButton: false,
                        showCancelButton: false,
                        showConfirmButton: false,
                        focusConfirm: false,
                        footer: `<a href="#" onclick="reLocation()" class="home-link linkCamin__menu impoMinorTelCont__btn link-menu" id='homelinksidebarV2'>Voltar à página inicial</a>`
                    });
                }
            }
        }

        function reLocation() {
            document.querySelector('#containerIframe').src = "portifolios.php";
            Swal.close();
        }

        document.querySelector('#criarPubli-link_sidebar').addEventListener('click', () => {
            checkScreenSize();
        });

        window.onload = checkScreenSize;
        window.onresize = checkScreenSize;
        window.addEventListener('message', function(event) {
            if (event.data === 'checkScreenSize__cP') {
                checkScreenSize();
            }
        })
        //menu de filtros
        document.querySelector('.container__inputSearch').style.position = 'relative !important'
        document.getElementById('searchInput').addEventListener('click', function() {
            const container = document.querySelector('#filtro__menuNAV');

            if (window.innerWidth > 750) {
                console.log(window.innerWidth, 'aqui é responsivo')
                if (container.style.display === 'none' || container.style.display === '') {
                    document.querySelector('.container__inputSearch ').style.position = 'relative !important'
                    container.style.display = 'block';
                } else {
                    document.querySelector('.container__inputSearch ').style.position = 'relative !important'
                    container.style.display = 'none';
                }
            } else {
                console.log(window.innerWidth, 'aqui não é responsivo')
                if (container.style.display === 'none' || container.style.display === '') {
                    document.querySelector('.container__inputSearch ').style.position = 'unset !important'
                    container.style.display = 'block';
                } else {
                    document.querySelector('.container__inputSearch ').style.position = 'relative !important'
                    container.style.display = 'none';
                }
            }
        })

        window.addEventListener('message', function(event) {
            if (event.data.type === 'updateTitle') {
                const titleValue = event.data.value;

                document.getElementById('PortTitle__official').value = titleValue;
                document.getElementById('tituloModal_Port').value = titleValue;
            }else if(event.data.type === 'alterarTituloPubli?criar'){
            console.log('o titulo chegou aq')
            document.querySelector('#tituloPubli__jsDirect').value = event.data.oqtaescrito
        }

        });
        document.addEventListener('DOMContentLoaded', function() {
            const textarea = document.getElementById('descricaoPortifolio');
            const charCount = document.getElementById('charCount');
            const maxLength = 145;
            charCount.textContent = textarea.value.length + '/' + maxLength;
            textarea.addEventListener('input', function() {
                const remaining = textarea.value.length;
                charCount.textContent = remaining + '/' + maxLength;
            })
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            loadNotificacao();
            scheduleNotifications();
            removerNotificacoesAntigas();
            verif_qtdNoti();
        });
        //truncar o texto
        document.addEventListener("DOMContentLoaded", function() {
            const comentarios = document.querySelectorAll(".comentarioSpan");
            const toggleBtns = document.querySelectorAll(".Vermais__btn");

            comentarios.forEach((comentario, index) => {
                const fullText = comentario.textContent
                const truncatedText = fullText.length > 50 ? fullText.substring(0, 50) + "..." :
                    fullText;
                let isTruncated = true;

                comentario.textContent = truncatedText;

                toggleBtns[index].addEventListener("click", function() {
                    if (isTruncated) {
                        comentario.textContent = fullText;
                        this.textContent = "Ver menos";
                    } else {
                        comentario.textContent = truncatedText;
                        this.textContent = "Ver mais";
                    }
                    isTruncated = !isTruncated;
                });
            });
        });

        function getOffsetTop(element) {
            const rect = element.getBoundingClientRect();
            const scrollTop = window.scrollY || window.pageYOffset;
            return rect.top + scrollTop;
        }

        const modalportifolio = document.querySelector('#portifolio-completo');
        var offsetHeight = getOffsetTop(modalportifolio);
        const heightv2 = modalportifolio.offsetHeight / 2;
        const infoModalPortifolio = document.querySelector('#info-modalportifolio');
        infoModalPortifolio.style.top = heightv2 + "px";
    </script>
    <script>
        document.getElementById('precoInicial_modalPort').addEventListener('blur', function() {
            let value = parseFloat(this.value);
            if (!isNaN(value)) {
                this.value = value.toFixed(2);
            }
        });
    </script>
    <script>
    function closeModal() {
        // Fecha o modal programaticamente usando o Bootstrap
        $('#portifolio-modal').modal('hide');
    }
</script>
    <script>
        //recepção de mensagem -> verificar se não é o mesmo de lá de cima ERA O MESMO CARALHO KASJDHKAJSHD
         id_post = ""
        function receiveMessage(event) {
            if (event.data.action === 'modalClicked') {
                console.log(event.data.id)
                makeModalAjax(event.data.id)
                // makeComentarios(event.data.id)
                var modal = document.getElementById('portifolio-modal');
                var isVisible = $(modal).hasClass('show');
                if (isVisible) {
                    $(modal).modal('hide');
                } else {
                    $(modal).modal('show');
                }
                id_post = event.data.id
            }
        }

        window.addEventListener("message", receiveMessage, false);
    </script>
    <script>
        const nickname = document.getElementById("nickname_modal_portifolio");
        const username = document.getElementById("username_modal_portifolio");
        const titulo = document.getElementById("titulo_modal_portifolio");
        const descricao = document.getElementById("descricao_modal_porifolio");
        const valor = document.getElementById("valor_modal_portifolio");
        const softwares = document.getElementById("softwares_modal_portifolio");
        const tags = document.getElementById("tags_modal_portifolio");
        const div_comentarios = document.getElementById("div_comentarios");
        const div_midia = document.getElementById("portifolio-completo");
        //função pra alterar os dados do modal
        function makeModalAjax(id) {
    $.ajax({
        url: 'controller/controller.php?getpost=1', 
        type: 'POST', 
        data: { id: id }, 
        success: function(response) {
            loadComments(id)
            console.log(response);
            nickname.innerHTML = response.user.nickname;
            username.innerHTML = response.user.username;

            titulo.innerHTML = "<h3>"+response.postagem.titulo+"</h3>";
            descricao.innerHTML = response.postagem.descricao;
            
            for (i = 0; i < response.tags.result; i++) {
                 console.log("Tag: " + response.tags[i]);
                 tags.innerHTML += "<span>" + response.tags[i] + "</span>";
}
            if(response.produtos.valor == null){
                console.log("de graça")
                valor.innerHTML = " <h3  class='valorPortifolio_cCPB'> GRATUITO </h3> <a href='#' id='link_modal_portifolio'class='btn btn-primary'>Download</a>" ;
               
            }else{
                valor.innerHTML = " <h3  class='valorPortifolio_cCPB'><span>R$</span>"+response.produtos.valor+"</h3> <a href='view/pagamento.php' id='link_modal_portifolio'class='btn btn-primary'>Download</a>" ;
              
            }

        },
        error: function(xhr, status, error) {
            
            console.error('Erro na requisição AJAX:', error);
            alert('Ocorreu um erro ao carregar os dados.'); 
        }
    });
}

    </script>
    
<script>
//carregar comentários
function loadComments(id) {
            $.ajax({
                type: 'POST',
                url: 'controller/controller.php?selectComent=1&id_post='+id, 
                dataType: 'json', // Espera uma resposta JSON
                success: function(response) {
                        if (response && response.comentarios) {
                            var comentariosHTML = ''; // Variável para acumular os comentários
                            for (var i = 0; i <= response.number; i++) {
                                console.log("ok");
                                var comment = response.comentarios[i];
                                console.log(comment);
                                
                                // Acumular o HTML de cada comentário
                                comentariosHTML += 
                                '<div class="comment">' +
                                '<div class="comment-body">' +
                                '<span class="name">' + comment.username + ' </span>' +
                                comment.texto +
                                '</div></div>';
                                div_comentarios.innerHTML = comentariosHTML;
                            }

                            
                        } else {
                            console.log('Nenhum comentário encontrado.');
                        }
                },
                error: function(xhr, status, error) {
                    console.error('Erro na requisição:', error);
                }
            });
        }
        loadComments();
        
function new_comment(){
        
        console.log(id_post)
        var comment = $('#textarea_comment').val();
        console.log(comment);
        $.ajax({
            type: 'POST',
            url: 'controller/controller.php?coment=1',
            data: {
                coment: comment,
                id_user: <?php echo $_SESSION["USER_ID"]; ?>,
                id_post: id_post,
            }, 
            success: function(response) {
                console.log("aaaaa");
                 loadComments(id_post);
                $('#textarea_comment').val(''); // Limpa o campo de comentário
                // selectComent();
            },
            error: function() {
                alert('Houve um erro ao enviar o comentário.');
            }
        });
    };
</script>
    <script>
        //calculo de menu provisorio -> ver se isso ainda precisa

        const element = document.querySelector('#SearchForm')
        const offsetTop = getOffsetTop(element)
        const height = element.offsetHeight / 2
        var som = (offsetTop - (height + 5))
        document.querySelector('#filtro__menuNAV').style.top = som + "px" //verificar se isso n dá pra ser trocado por css
    </script>
    <script>
        //ir pro login caso usuario não esteja logado
        function login(){
            window.location.href = "view/login.php";
        }
    </script>
    <script>
        /*ANIMAÇÃO DO MENU -> NAO MEXER!*/
        function moveCurtain(link) {
            const menuCurtain = document.querySelector('.menu-curtain')
            const linkRect = link.getBoundingClientRect()
            const translateY = linkRect.top - menuCurtain.offsetHeight
            menuCurtain.style.transform = 'translateY(' + translateY + 'px)'
            /* var childElement = link.querySelector('svg > *')
            childElement.setAttribute('stroke-width', '2') */
        }

        document.addEventListener('DOMContentLoaded', function() {
            //AQUI É PRA VERIFICAR SE O DARK MODE ESTÁ ATIVO VIA LOCALSTORAGE

            //-==--=-----------------------------------------------------------
            var DarkMode__isOn = localStorage.getItem('DarkMode');
            const icons = document.querySelectorAll('.icone-thumb')

            function updateIconColors(color) {
                icons.forEach(function(icon) {
                    icon.setAttribute('stroke', color);
                });
            }
            var DarkMode__isOn = localStorage.getItem('DarkMode');
            document.querySelector('#darkTheme__on').style.display = 'none'
            if (DarkMode__isOn === null) {
                localStorage.setItem('DarkMode', '0');
                updateIconColors('#000000');
                document.querySelector('#lightTheme__on').style.display = 'block'
                document.querySelector('#darkTheme__on').style.display = 'none'
            } else if (DarkMode__isOn === '1') {
                document.querySelector('#lightTheme__on').style.display = 'none'
                document.querySelector('#darkTheme__on').style.display = 'block'
                document.body.classList.add('dark');
                updateIconColors('#FFFFFF');
            } else if (DarkMode__isOn === '0') {
                if (document.body.classList.contains('dark')) {
                    document.querySelector('#lightTheme__on').style.display = 'block'
                    document.querySelector('#darkTheme__on').style.display = 'none'
                    document.body.classList.remove('dark');
                }
                updateIconColors('#000000');
            }
            //VERIFICAR INPUT CHECKBOX DO DARKMODE
            document.querySelector('#darkmodeMobile').addEventListener('change', function(event) {
                const icons = document.querySelectorAll('.icone-thumb')
                var iframe = document.getElementById('containerIframe')
                iframe.contentWindow.postMessage('darkMode', '*');
                iframe.contentWindow.postMessage(
                    'com.br/?darkMode__changeBtn?ToContainerConfig__portraid.br', '*');
                document.body.classList.toggle('dark')
                if (document.body.classList.contains('dark')) {
                    document.querySelector('#lightTheme__on').style.display = 'none'
                    document.querySelector('#darkTheme__on').style.display = 'block'
                    localStorage.setItem('DarkMode', 1);
                    icons.forEach(function(icon) {
                        icon.setAttribute('stroke', '#FFFFFF')
                    })
                } else {
                    document.querySelector('#lightTheme__on').style.display = 'block'
                    document.querySelector('#darkTheme__on').style.display = 'none'
                    localStorage.setItem('DarkMode', 0);
                    icons.forEach(function(icon) {
                        icon.setAttribute('stroke', '#000000')
                    })
                }
                icons.forEach(function(icon) {
                    if (event.target.checked) {
                        icon.setAttribute('stroke', '#FFFFFF')
                    } else {
                        icon.setAttribute('stroke', '#000000')
                    }
                })
            })
            document.querySelector('#darkmode').addEventListener('change', function(event) {
                const icons = document.querySelectorAll('.icone-thumb')
                var iframe = document.getElementById('containerIframe')
                iframe.contentWindow.postMessage('darkMode', '*');
                iframe.contentWindow.postMessage(
                    'com.br/?darkMode__changeBtn?ToContainerConfig__portraid.br', '*');
                document.body.classList.toggle('dark')
                if (document.body.classList.contains('dark')) {
                    document.querySelector('#lightTheme__on').style.display = 'none'
                    document.querySelector('#darkTheme__on').style.display = 'block'
                    localStorage.setItem('DarkMode', 1);
                    icons.forEach(function(icon) {
                        icon.setAttribute('stroke', '#FFFFFF')
                    })
                } else {
                    document.querySelector('#lightTheme__on').style.display = 'block'
                    document.querySelector('#darkTheme__on').style.display = 'none'
                    localStorage.setItem('DarkMode', 0);
                    icons.forEach(function(icon) {
                        icon.setAttribute('stroke', '#000000')
                    })
                }
                icons.forEach(function(icon) {
                    if (event.target.checked) {
                        icon.setAttribute('stroke', '#FFFFFF')
                    } else {
                        icon.setAttribute('stroke', '#000000')
                    }
                })
            })
            //CLICAR NO BOTAO DE ACORDO COM O LOCAL QUE VICE CLICA PRA FUNCIONAR A ANIMAÇÃO DO MENU
            document.querySelector('#logoContainerLink').addEventListener('click', function() {
                document.getElementById('home-link_sidebar').click()
            })
        })

        function reLocation() {
            document.getElementById('home-link_sidebar').click();
            if (document.querySelector('iframe').src.includes = 'portifolios.php') {
                Swal.close()
            }
        }
    </script>
    <script>
        //aqui serv pra desabilitar o input de preço do modal de serviços
        document.addEventListener('DOMContentLoaded', function() {
            const checkbox = document.getElementById('gratuito_produtoCheckbox');
            const precoInput = document.getElementById('precoInicial_modalPort')
            
            checkbox.addEventListener('change', function() {
                console.log(checkbox)
                if (checkbox.checked) {
                    precoInput.value = '00'
                } else {
                    precoInput.removeAttribute('disabled')
                    precoInput.value = '';
                }
            })
        })


        //=====--==--==--==--==--==--==--==--==--SCRIPT DO MENU DE CRIAR PUBLICAÇÃO
        document.addEventListener('DOMContentLoaded', ()=>{
        document.getElementById('add-image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const iframe = document.getElementById('containerIframe').contentWindow;
                    iframe.postMessage({
                        type: 'image',
                        src: e.target.result,
                        alt: file.name
                    }, '*');

                    // Add input:hidden pra img
                    const inputImage = document.createElement('input');
                    inputImage.type = 'hidden';
                    inputImage.name = 'imagemPort' + (document.querySelectorAll('.inputFormImg_inp')
                        .length +
                        1);
                    inputImage.className = 'inputFormImg_inp';
                    inputImage.value = e.target.result;
                    document.getElementById('mainForm-CriarPubli').appendChild(inputImage);
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('add-video').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const iframe = document.getElementById('containerIframe').contentWindow;
                    iframe.postMessage({
                        type: 'video',
                        src: e.target.result
                    }, '*');

                    // Add input:hidden pro vid
                    const inputVideo = document.createElement('input');
                    inputVideo.type = 'hidden';
                    inputVideo.name = 'videoPort' + (document.querySelectorAll('.inputFormMid_inp').length +
                        1);
                    inputVideo.className = 'inputFormMid_inp';
                    inputVideo.value = e.target.result;
                    document.getElementById('mainForm-CriarPubli').appendChild(inputVideo);
                };
                reader.readAsDataURL(file);
            }
        });

        document.querySelectorAll('.limited-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    document.querySelectorAll('.limited-checkbox').forEach(otherCheckbox => {
                        if (otherCheckbox !== this) {
                            otherCheckbox.checked = false
                        }
                    })
                }
            })
        })
        });
        //aqui é pra colocar como background a img escolhida
        document.querySelector('.thumbnailUploader').addEventListener('change', function(event) {
            const file = event.target.files[0]
            if (file) {
                const reader = new FileReader()
                reader.onload = function(e) {
                    document.querySelector('.thumbBox').style.backgroundImage = `url(${e.target.result})`
                    document.querySelector('.thumbBox').style.backgroundSize = 'cover'
                    document.querySelector('.thumbBox').style.backgroundPosition = 'center'
                };
                reader.readAsDataURL(file)
            }
        })
        // AQUI É O MODAL DE CRIAR PUBLICAÇÃO -> FALTA VERIFICAR INPUTS DE TIPO -> NÃO MEXER
        document.querySelector('#submitBtn_cPubli').addEventListener('click', function() {
            const servicoCheckbox = document.getElementById('servico__checkbox');
            const produtoCheckbox = document.getElementById('produto__checkbox');
            const portifolioCheckbox = document.getElementById('portifolio__checkbox');
            var modalPortifolio = document.querySelector('.modal-portifolio_container');
            var modalServico = document.querySelector('.modal-servico_container');
            var modalProduto = document.querySelector('.modal-produto_container');
            modalServico.style.display = 'none';
            modalProduto.style.display = 'none';
            modalPortifolio.style.display = 'none';
            if (servicoCheckbox.checked) {
                document.querySelector('#changeTitle-modalPort').textContent = 'Detalhes - Serviço'
                modalServico.style.display = 'block';
                modalProduto.style.display = 'none';
                modalPortifolio.style.display = 'none';
            } else if (produtoCheckbox.checked) {
                document.querySelector('#changeTitle-modalPort').textContent = 'Detalhes - Produto'

                modalProduto.style.display = 'block';
                modalPortifolio.style.display = 'none';
                modalServico.style.display = 'none';
            } else if (portifolioCheckbox.checked) {
                document.querySelector('#changeTitle-modalPort').textContent = 'Detalhes - Portifólio'

                modalPortifolio.style.display = 'block';
                modalServico.style.display = 'none';
                modalProduto.style.display = 'none';
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.13.1/dist/sweetalert2.all.min.js
    "></script>
    <!--VLibras -> não mexer-->
    <div vw class="enabled" id="recVLIBRAS__webBeco" style="display: none;">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    <script>
        //PARTE DE ATIVOS DO MODAL DE CRIAR PUBLICAÇÃO
        const truncateString = (string = '', maxLength = 50) =>
            string.length > maxLength ? `${string.substring(0, maxLength)}[…]` : string

        function sprdNom_Ext(file) {
            const name = file.name
            const ultPonto = name.lastIndexOf('.')
            const fileName = name.substring(0, ultPonto)
            const fileName2 = truncateString(fileName, 9)
            const ext = name.substring(ultPonto + 1)
            return `${fileName2}.${ext}`
        }

        const anexActive = function(event) {
            const input = document.getElementById('ativosPort_uploader')
            const output = document.getElementById('ativosPort_list')

            const ul = document.createElement('ul')
            for (let i = 0; i < input.files.length; ++i) {
                const file = input.files.item(i)
                const truncatedFileName = sprdNom_Ext(file)

                const li = document.createElement('li')
                li.textContent = truncatedFileName
                ul.appendChild(li)
            }
            output.innerHTML = ''
            output.appendChild(ul)
        }
        /* document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('#container_ativosNome').style.maxHeight = `${document.querySelector('#containerGerenciarAtivos').offsetHeight}px`
        }) */
        document.getElementById('ativosPort_uploader').addEventListener('change', anexActive)

        //aqui é para o botão configurações do menu direito do usuario ir para a agina de configuraloes
        document.querySelector('#GoToConfig__fromUserpage').addEventListener('click', () => {
            document.querySelector('#settings-link_sidebar').click()
        })
    </script>
     <script>
        //FUNÇÃO FADE-IN PRA DEIXAR A PÁGINA CUTE CUTE
        window.onload = function() {
    const container = document.querySelector('.fade-in-container');
    container.classList.add('fade-in'); // Adiciona a classe para o efeito de fade in
};
    </script>
    
</body>

</html>
