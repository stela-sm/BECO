<!DOCTYPE html>
<html lang="pt-br">
<!--site já responsivo!-->
<?php
session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifolios</title>
    <meta property="og:title" content="BECO">
    <meta property="og:description" content="Criatividade sem limites">
    <meta property="og:image" content="../assets/media/logo/4.png">
    <meta property="og:url" content="https://www.example.com">
    <link rel="stylesheet" href="../assets/style/style.css">
    <meta property="og:type" content="website">
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script src="../assets/js/texto_audio.js"></script><script src="../assets/js/teste.js"></script>
    <script>

</script>
    <script>
        
        document.addEventListener('DOMContentLoaded', function() {



    var SoundIsOn = localStorage.getItem('com.beco/audio_recurso01x.all?ison');
    if (SoundIsOn === 'ativo') {
        inicializar2();
        console.log('a')
    }else if(SoundIsOn === 'desativado'){
        naoinicializar()
        console.log('b')
    }
});

</script>
    <script>
        window.addEventListener('message', function (event) {
            if (event.data === 'darkMode') {
                document.body.classList.toggle('dark');
            } else if (event.data === 'com.br/?darkMode__changeBtn?ToContainerConfig__portraid.br') {
                if (localStorage.getItem('DarkMode') == 1 || localStorage.getItem('DarkMode') == 'ativo') {
                    document.querySelector('#ThemeModeRecurso_site').checked = true
                    document.querySelector('#acess_frame').style.display = 'block'
                } else {
                    document.querySelector('#ThemeModeRecurso_site').checked = false
                    document.querySelector('#acess_frame').style.display = 'block'

                }

            }
        })

        window.addEventListener('message', function (event) {
            const targetIframe = event.data;

            // Ocultar todas as divs com inFrame
            document.querySelectorAll('[inFrame]').forEach(section => {
                section.style.display = 'none';
            });

            // Exibir a div correspondente
            const targetSection = document.querySelector(`[inFrame="${targetIframe}"]`);
            if (targetSection) {
                targetSection.style.display = 'block';
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            let previousMemoryUsage = performance.memory.usedJSHeapSize;
let checkInterval = 1000; // Verifica a cada segundo

function checkMemoryUsage() {
    const currentMemoryUsage = performance.memory.usedJSHeapSize;
    const memoryDifference = currentMemoryUsage - previousMemoryUsage;

    if (memoryDifference > 100 * 1024 * 1024) { // Se a diferença for maior que 100MB
        console.warn("Alerta: uso de memória muito alto!", {
            previousMemoryUsage,
            currentMemoryUsage,
            memoryDifference
        });
    }

    previousMemoryUsage = currentMemoryUsage;
}

// Inicia a verificação
setInterval(checkMemoryUsage, checkInterval);








            var DarkMode__isOn = localStorage.getItem('DarkMode');
            if (DarkMode__isOn === '1') {
                document.body.classList.add('dark');
                document.querySelector('#ThemeModeRecurso_site').checked = true
            } else {
                document.body.classList.remove('dark');
                document.querySelector('#ThemeModeRecurso_site').checked = false
            }
        })
        document.addEventListener('contextmenu', function (event) {
            event.preventDefault();
        })

        document.addEventListener('dragstart', function (event) {
            event.preventDefault();
        })
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
</head>
<style>
    .highlight {
        box-shadow: rgba(202, 228, 237, 0.5) 2px 0px 0px 0px, rgba(202, 228, 237, 0.5) -2px 0px 0px 0px;
        background-color: rgba(202, 228, 237, 0.5);
        border-radius: 3px;
    }
    @media(max-width: 750px){
        .portifolios-viewport {
        margin-top: calc(9vh + 3%);
    }
    }
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
        --logoInvert: invert(0);
    }

    /* css reset */
    html,
    *,
    .default_color {
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


    * {
        font-size: 1rem;
    }




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
        --logoInvert: invert(1);
    }

    html,
    body {
        overflow-y: auto !important;
    }

    .titulo-publi {
        padding-top: 2.5vh;
    }

    .checkbox-wrapper-22 .switch {
        display: inline-block;
        height: 30px;
        position: relative;
        width: 60px;
    }

    .checkbox-wrapper-22 {
        display: flex;
        flex-direction: row;
        align-content: flex-end;
        justify-content: flex-start;
        align-items: center;
    }

    .checkbox-wrapper-22 .switch input {
        display: none;
    }

    .checkbox-wrapper-22 .slider {
        background-color: #ccc;
        bottom: 0;
        cursor: pointer;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        transition: .4s;
    }

    .adFonteBtn__recurso {
        color: #000;
    }

    .checkbox-wrapper-22 .slider:before {
        background-color: var(--blackWhite);
        bottom: 4px;
        content: "";
        height: 22px;
        left: 4px;
        position: absolute;
        transition: .4s;
        width: 22px;
    }

    .checkbox-wrapper-22 input:checked+.slider {
        background-color: #4398D6;
    }

    .checkbox-wrapper-22 input:checked+.slider:before {
        transform: translateX(29px);
    }

    .checkbox-wrapper-22 .slider.round {
        border-radius: 34px;
    }

    .checkbox-wrapper-22 .slider.round:before {
        border-radius: 50%;
    }

    .container-inpCheckbox {
        padding-top: 2.7%;
        display: flex;
        flex-direction: row;
        justify-content: left;
        align-items: flex-start;
        gap: 1vw;
    }

    .titulo-publi {
        font-size: 33.5px;
    }

    .containerIoOn>* {
        font-size: 12px;
    }

    .descRecurso {
        font-size: 16px;
    }

    .section {
        padding-bottom: 4%;
        border-bottom: 1px solid #e8e8e8;
    }

    .adFonteBtn__recurso {
        padding: 1%;
        position: relative;
        font-size: 16px;
        border: var(--default_border);
        background-color: #F9F9F9;
        height: 30%;
        width: 12%;
        border-radius: 59px;
    }

    .adFonteBtn__recurso:hover {
        box-shadow: 0 0 0 .2rem rgba(0, 123, 255, 0.404);

    }

    .adFonteBtn__recurso>input {
        position: absolute;
        cursor: pointer;
        width: 100%;
        opacity: 0;
        left: 0;
        height: 100%;
    }

    .adFonteBtn__recurso>input:checked~.adFonteBtn__recurso {
        border: 2px solid #4398D6;
    }

    .adnt__warn,
    .vend_Nickname {
        color: #21272bea;
    }

    .inside__aLink {
        cursor: pointer;
        color: #4398D6;
        text-decoration: underline;
    }

    .inside__aLink:hover {
        text-decoration: none;
    }

    .grid_tableMajorContent {
        display: grid;
        grid-template-columns: 0.5fr 2fr 1fr 1fr 1fr;
        border-radius: 5px;
        padding: 10px;
    }

    .row {
        display: contents;
    }


    .cell {
        max-height: 8vh;
    display: flex;
    padding: 10px;
    border-bottom: 1px solid #ddd;
    align-items: center;
    justify-content: center;
    align-content: center;
    flex-direction: row;
    }

    .vend_cell {
    line-height: 14px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}
    .photo img {
        width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .vend_Name {
        font-weight: 600;
    }

    .vend_Nickname {
        opacity: .8;
        font-size: 14px;
    }

    .cell button {
        padding: 1%;
        position: relative;
        display: flex;
        flex-direction: row;
        gap: 3px;
        justify-content: center;
        align-items: center;
        font-size: 16px;
        border: var(--default_border);
        background-color: #F9F9F9;
        height: 100%;
        width: calc(100% + 1rem);
        border-radius: 8px;

    }

    #acess_frame::-webkit-scrollbar {
        width: 0;
        height: 0;
    }

    @media (max-width: 1300px) {
        .portifolios-viewport {
            padding: 0 1.5rem;
        }

        #acess_frame {
            max-height: 100vh;
            overflow-y: auto;
            scrollbar-color: transparent;
            padding: 10px;
            box-sizing: border-box;
        }

        .containerAcess_frame {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .adFonteBtn__recurso {
            padding: 1%;
            position: relative;
            font-size: 16px;
            border: var(--default_border);
            background-color: #F9F9F9;
            height: 30%;
            width: 25%;
            border-radius: 59px;
        }
    }

    .d-flex {
        display: flex;
    }

    .flex-column {
        flex-direction: column;
    }

    .round-img,
    .picture {
        border-radius: 50%;
        height: 195px !important;
        display: flex;
        width: 195px !important;
        overflow: hidden;
        cursor: pointer;
        position: relative;
    }

    .formControl-Container_place,
    textarea.bioContent {
        border: none;
        background-color: transparent;
    }

    .containerAlterarInfoPrincipal {
        display: flex;
        flex-direction: row;
    }

    .heiwid-auto {
        height: auto;
        width: auto;
    }

    textarea.bioContent {
        height: 100%, auto;
    }

    .containerAlterarInfoPrincipal {
        height: 100%;
        width: 100%;
        background-color: var(--default_background);
        border-radius: 10px;
        padding: 2%;
        border: var(--default_border);
    }

    .containerAlterarInfoPrincipal p {
        width: 100%;
        font-size: 16px;
    }

    .containerPadding {
        height: 195px;
        width: 100%;

    }

    .picture:hover>.trocarFoto__btn {
        opacity: 1;
    }

    .trocarFoto__btn {
        opacity: 0;
        background-color: #c7c7c7;
        position: absolute;
        width: 100%;
        bottom: -1px;
        height: 30%;
    }

    .contaienrInp {
        width: 100%;
        height: 100%;
        position: relative;
    }

    .trocarFoto__btn,
    .changeProfilePhoto,
    .contaienrInp,
    .contaienrInp>input {
        cursor: pointer;
    }

    .trocarFoto__btn input {
        width: 100%;
        height: 100%;
        opacity: 0;
    }

    label[for="changeProfilePhoto"] {
        position: absolute;
        height: 100%;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        display: flex;
        width: 100%;
        text-align: center;
    }

    .containerPadding {
        gap: 1vh;
        display: flex;
        flex-direction: column;

    }

    #biografiadjka {
        display: flex;
        flex-direction: column !important;
    }

    .fSize-20 {
        color: #3D3D3D;
        font-weight: 500;
        font-size: 20px;
    }

    .container-sajska {
        display: grid;
        gap: 1vw;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: repeat(3, 1fr);
    }

    .controlForm {
        display: flex;
        flex-direction: column;

    }

    .controlForm input {
        border-radius: 5px;
        border: var(--default_border);
        padding: 0 12px;
        opacity: .8;
        color: #3c454a;
        height: 2.5rem;
    }

    .controlForm textarea[container="contInformBacis_____nFprofl"] {
        resize: none;
        font-family: "Raleway", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        border-radius: 5px;
        border: var(--default_border);
        height: auto;
        padding: 0 12px;
        opacity: .8;
        color: #3c454a;
        min-height: calc(2.5rem * 2.5);
        width: 100%;
        box-sizing: border-box;
        word-break: break-word;
    }

    .controlForm input:focus {
        box-shadow: none;
        outline: none;
        border: 1px solid #1473E6;
    }

    .controlForm label {
        font-weight: bold;
        font-size: 15px;
        color: #3c454a;
    }

    .consoleItem1 {
        grid-column: 1;
        grid-row: 1;
    }

    .consoleItem2 {
        grid-column: 1;
        grid-row: 2;
    }

    .consoleItem3 {
        grid-column: 1 / span 2;
        grid-row: 3 / span 5;
    }

    .consoleItem4 {
        grid-column: 2;
        grid-row: 1;
    }

    .consoleItem5 {
        grid-column: 2;
        grid-row: 2;
    }

    .consoleItem6 {
        grid-column: 2;
        grid-row: 3;
    }

    .consoleItem7 {
        grid-column: 2;
        grid-row: 4;
    }

    .submitcontrolForm {
        display: grid;
        grid-template-columns: repeat(2, 0.3fr);
        gap: 1vw;
        padding-top: 5%;
        padding-bottom: 10%;
    }

    .btn:not(:disabled):not(.disabled) {
        cursor: pointer;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    @media screen and (prefers-reduced-motion: reduce) {
        .btn {
            transition: none;
        }
    }

    @media(width < 748px) {
        @media (width < 748px) {
    .container-inpCheckbox {
        display: flex;
        flex-direction: column;
    }
}

        .consoleItem5,
        .consoleItem4,
        .consoleItem3,
        .consoleItem2,
        .consoleItem1 {
            grid-column: 1;
        }

        .container-sajska {
            display: grid;
            gap: 1vw;
            grid-template-columns: 1fr;
            grid-template-rows: repeat(6, 1fr);
        }

        .consoleItem4 {
            grid-column: 1;
            grid-row: 5;
        }

        .consoleItem5 {
            grid-column: 1;
            grid-row: 6;
        }
    }

    .btn {
        display: inline-block;
        font-weight: bold;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .btn:hover {
        box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5);
    }

    button[type="reset"].btn:hover {
        box-shadow: 0 0 0 .2rem rgb(255 0 0 / 50%);
    }

    button[type="submit"] {
        &>svg {
            stroke: #fff;
        }

        &>span {
            color: #fff
        }
    }

    button[type="reset"].btn {
        background-color: transparent;
        border: 1px solid rgb(255 0 0 / 50%);

        &>svg {
            stroke: rgb(255 0 0 / 50%);
        }

        &>span {
            color: rgb(255 0 0 / 50%);
            cursor: pointer;
        }
    }

    button#editForm_reset[disabled] {
        border: 1px solid gray;
        color: gray;

        &>svg {
            stroke: gray;
        }

        &>span {
            cursor: pointer;
            color: gray;
        }
    }

    button[disabled] {
        cursor: not-allowed;
        background-color: #ccc;
    }

    button[disabled]:hover {
        box-shadow: none !important;
    }

    .flex-finalBtn {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 1vw;
    }

    #inputControl_formIns,
    #senha_edit {
        user-select: none;
    }

    .vltrPMenuConfig {
        padding: 1%;
        position: relative;
        font-size: 16px;
        border: var(--default_border);
        background-color: #F9F9F9;
        height: 30%;
        width: 25%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 1vw;
        border-radius: 59px;
    }
    @media(width > 750px){
        .vltrPMenuConfig{
            display: none !important;
        }
    }
</style>


<body>
    <div class="portifolios-viewport">
        <form id="inCon_frame" inFrame="inCon_frame" action="#" method="post" style="display:none;">
            <!--formulario de edição de informações-->
            <button class="voltarBTN__voltar vltrPMenuConfig" id="vltrPMenuConfig">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" /></svg>
                <span>Voltar</span>
            </button>
            <div id="infoConta_container">
                
                <h1 class="titulo-publi">Minha Conta</h1>
                <div class="container-myprfi  container-inpCheckbox">
                    <div class="containerAlterarInfoPrincipal section">
                        <div class="container__userPfpImg">
                            <picture class="picture">
                                <img class="round-img" id="pfpImageContainer" src="../assets/media/pfp/<?php echo $_SESSION["USER_PFP"]?>"
                                    alt="imagem de perfil">
                                <span class="trocarFoto__btn">
                                    <label for="changeProfilePhoto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-camera">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                            <path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                        </svg>
                                    </label>
                                    <div class="contaienrInp">
                                        <!--aqui é um input escondido para trocar a foto-->
                                        <input type="file" name="changeProfilePhoto" id="changeProfilePhoto">
                                    </div>
                                </span>
                            </picture>
                        </div>

                    </div>
                    <div id="biografiadjka" class="containerAlterarInfoPrincipal section d-flex flex-column">
                        <div class="containerPadding">
                            <h4 class="fSize-20">Biografia</h4>
                            <p name="bioAmostradoUser" id="bioAmostradoUser">
                                <!--aqui mostra a biografia atual do usuario-->
                                <?php echo $_SESSION["USER_BIOGRAFIA"]?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div id="infoConta_container">
                <h1 class="titulo-publi">Editar Informações</h1><br>
                <div class="container-sajska">
                    <div class="controlForm consoleItem1">
                        <!--aqui é para o nome @ do usuario - o value do input é o username atual do usuario, o mesmo se aplica aos inputs abaixo-->
                        <label for="username_edit">Nome de usuario</label>
                        <input type="text" name="username_edit" id="username_edit" value="<?php echo $_SESSION["USER_USERNAME"]?>">
                    </div>
                    
                    <div class="controlForm consoleItem2">
                        <label for="nickname_edit">Nickname</label>
                        <input type="text" name="nickname_edit" id="nickname_edit" value="<?php echo $_SESSION["USER_NOME"]?>">
                    </div>
                    <div class="controlForm consoleItem3">
                        <label for="bio_edit">Bio</label>
                        <textarea name="bio_edit" container="contInformBacis_____nFprofl"
                            id="bio_edit"></textarea>
                    </div>
                    <div class="controlForm consoleItem4">
                        <!--a senha possui uma máscara JS + desabilita o input-->
                        <label for="senha_edit">Senha</label>
                        <input disabled type="password" name="senha_edit" id="senha_edit" value="123456">
                    </div>
                    <div class="controlForm consoleItem5">
                        <!--o CPF é inalteravel este possui uma máscara JS + desabilita o input-->
                        <label for="inputControl_formIns">CPF</label>
                        <input disabled type="text" name="inputControl_formIns" id="inputControl_formIns"
                        value="<?php echo $_SESSION["USER_CPF"]?>">
                    </div>
                    <div class="submitcontrolForm ">
                        <button class="btn btn-primary flex-finalBtn" disabled id="editForm_submit" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M14 4l0 4l-6 0l0 -4" />
                            </svg>
                            <span>Salvar</span>
                        </button>
                        <button class="btn btn-primary flex-finalBtn" disabled id="editForm_reset" type="reset">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7l16 0" />
                                <path d="M10 11l0 6" />
                                <path d="M14 11l0 6" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                            <span>Descartar</span>
                        </button>

                    </div>
                    <br><br><br><br><br><br><br>
                </div>
            </div>
        </form>
        <div id="acess_frame" inFrame="acess_frame" style="display: block;">
            <button class="voltarBTN__voltar vltrPMenuConfig" id="vltrPMenuConfig">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" /></svg>
                <span>Voltar</span>
            </button>
            <div class="containerAcess_frame">
                <!--recursos, não mexer-->
                <div id="recursoAudio" class="section">
                    <h1 class="titulo-publi">Recurso de áudio</h1>
                    <p class="descRecurso">Para tornar sua experiência no nosso site ainda mais envolvente, recomendamos
                        ativar
                        o recurso de modo de
                        áudio. Este recurso permite que você ouça descrições detalhadas, instruções e outras informações
                        importantes enquanto navega.</p>
                    <div class="container-inpCheckbox">
                        <div class="checkbox-wrapper-22">
                            <label class="switch" for="audioRecurso_site">
                                <input type="checkbox" id="audioRecurso_site">
                                <div class="slider round"></div>
                            </label>
                        </div>
                        <span class="containerInOn">Recurso <isOn id="isOn_recurso">Ativo</isOn></span>
                    </div>
                </div>
                <div id="recursoLibras" class="section">
                    <h1 class="titulo-publi">VLibras</h1>
                    <p class="descRecurso">Para tornar nosso site mais acessível e inclusivo, oferecemos o recurso
                        VLibras,
                        que
                        permite a tradução do conteúdo em Libras (Língua Brasileira de Sinais). Este recurso é
                        especialmente
                        útil para pessoas surdas ou com deficiência auditiva que preferem ou necessitam de comunicação
                        em
                        libras.</p>
                    <div class="container-inpCheckbox">
                        <div class="checkbox-wrapper-22">
                            <label class="switch" for="VLibras_site">
                                <input type="checkbox" id="VLibras_site">
                                <div class="slider round"></div>
                            </label>
                        </div>
                        <span class="containerInOn">Recurso <isOn id="isOn_recursoVL">Ativo</isOn></span>
                    </div>
                </div>
                <div id="recursoTheme" class="section">
                    <h1 class="titulo-publi">Modo escuro</h1>
                    <p class="descRecurso">Ative o modo escuro ou claro para personalizar sua experiência. O modo escuro
                        reduz a luminosidade, ideal para ambientes com pouca luz. O modo claro, ótimo para locais
                        iluminados, oferece maior contraste e visibilidade.</p>
                    <div class="container-inpCheckbox">
                        <div class="checkbox-wrapper-22">
                            <label class="switch" for="ThemeModeRecurso_site">
                                <input type="checkbox" id="ThemeModeRecurso_site">
                                <div class="slider round"></div>
                            </label>
                        </div>
                        <span class="containerInOn">Recurso <isOn id="isOn_recursoME">Ativo</isOn></span>
                    </div>
                </div>
                <div id="recursoFonte" class="section">
                    <h1 class="titulo-publi">Alterar tamanho da fonte</h1>
                    <div class="container-inpCheckbox">

                        <button class="adFonteBtn__recurso">
                            Pequeno
                            <input type="checkbox" name="fonteP" id="fonteP__rec"
                                onclick="gerenciarCheckbox(this, P__font)">
                        </button>
                        <button class="adFonteBtn__recurso">
                            Regular
                            <input type="checkbox" name="fonteR" id="fonteR__rec"
                                onclick="gerenciarCheckbox(this, Regular__font)">
                        </button>
                        <button class="adFonteBtn__recurso">
                            Grande
                            <input type="checkbox" name="fonteG" id="fonteG__rec"
                                onclick="gerenciarCheckbox(this, G__font)">
                        </button>
                    </div>
                </div>
                <span id="superMargin"></span>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const superMargin = document.querySelector('#superMargin');
                        const recursoFonte = document.querySelector('#recursoFonte');

                        if (superMargin && recursoFonte) {
                            if (window.innerWidth < 1300) {
                                const halt = recursoFonte.offsetHeight;
                                superMargin.style.height = `${halt}px`;
                            } else {
                                superMargin.style.height = '0px';
                            }
                        }
                    });
                </script>
            </div>
        </div>
        <div id="permi_frame" inFrame="permi_frame" style="display: none;">
            <button class="voltarBTN__voltar vltrPMenuConfig" id="vltrPMenuConfig">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 6l-6 6l6 6" /></svg>
            <span>Voltar</span>
            </button>
            <div id="permissoes_container" class="section">
                <h1 class="titulo-publi">Geolocalização</h1>
                <p class="descRecurso">Para oferecer uma experiência mais personalizada e relevante, solicitamos acesso
                    à sua localização geográfica. Isso nos permite fornecer informações e serviços baseados em sua
                    localização atual, como ofertas locais e atualizações pertinentes. Seu consentimento para a
                    geolocalização é opcional, e você pode optar por desativá-la a qualquer momento através das
                    configurações do seu navegador.</p>
                <div class="container-inpCheckbox">
                    <div class="checkbox-wrapper-22">
                        <label class="switch" for="geoPermissao_site">
                            <input type="checkbox" id="geoPermissao_site">
                            <div class="slider round"></div>
                        </label>
                    </div>
                    <span class="containerInOn">Permissão <isOn id="isOn_geo">Ativa</isOn></span>
                </div>
            </div>
            <div id="permissoes_container" class="section">
                <h1 class="titulo-publi">Notificações Push</h1>
                <p class="descRecurso">Gostaríamos de enviar notificações push para mantê-lo atualizado sobre novidades,
                    promoções e outras informações importantes. As notificações push nos permitem comunicar-se
                    diretamente com você, mesmo quando você não está no site. Você pode gerenciar suas preferências de
                    notificações a qualquer momento nas configurações do seu navegador e escolher quais notificações
                    deseja receber ou desativar completamente.</p>
                <div class="container-inpCheckbox">
                    <div class="checkbox-wrapper-22">
                        <label class="switch" for="notificacaoPermissao_site">
                            <input type="checkbox" id="notificacaoPermissao_site">
                            <div class="slider round"></div>
                        </label>
                    </div>
                    <span class="containerInOn">Permissão <isOn id="isOn_notificacao">Ativa</isOn></span>
                </div>
            </div>
            <br>
            <p class="adnt__warn">Permitir as permissões de localização e notificações nos ajuda a personalizar sua experiência no site e mantê-lo atualizado sobre nossas novidades. Se
                tiver dúvidas ou precisar de mais informações sobre como usamos esses dados, por favor, consulte nossa
                <a class="inside__aLink" href="../assets/media/terms/politica_de_privacidade.pdf"
                    target="_blank">Política de Privacidade</a> para mais detalhes.
            </p>
        </div>
        <div id="hisCo_frame" inFrame="hisCo_frame" style="display: none;">
            <button class="voltarBTN__voltar vltrPMenuConfig" id="vltrPMenuConfig">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 6l-6 6l6 6" /></svg>
            <span>Voltar</span>
            </button>
            <div id="infoConta_container" style="border: none;">
                <h1 class="titulo-publi">Compras efetuadas</h1>
                <div class="container-inpCheckbox d-flex flex-column">
                    <div class="grid_tableMajorContent">
                        <div class="row">
                            <div class="cell photo">
                                <img src="https://via.placeholder.com/20" alt="Foto">
                            </div>
                            <div class="cell vend_cell">
                                <span class="vend_Name">Nome do vendedor</span>
                                <span class="vend_Nickname">@nickname</span>
                            </div>
                            <div class="cell">00/00/00</div>
                            <div class="cell">R$ 00,00</div>
                            <div class="cell">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                        <path d="M7 11l5 5l5 -5" />
                                        <path d="M12 4l0 12" />
                                    </svg>
                                    <span>Download</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="grid_tableMajorContent">
                        <div class="row">
                            <div class="cell photo">
                                <img src="https://via.placeholder.com/20" alt="Foto">
                            </div>
                            <div class="cell vend_cell">
                                <span class="vend_Name">Nome do vendedor</span>
                                <span class="vend_Nickname">@nickname</span>
                            </div>
                            <div class="cell">00/00/00</div>
                            <div class="cell">R$ 00,00</div>
                            <div class="cell">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                        <path d="M7 11l5 5l5 -5" />
                                        <path d="M12 4l0 12" />
                                    </svg>
                                    <span>Download</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/font.js"></script>
    <script src="../assets/js/ferramentas.js"></script>
    <script>
        var checkboxV22 = document.querySelector('#audioRecurso_site')
        checkboxV22.addEventListener('change', inicializar);


        const initialValues = {};

        function storeInitialValues() {
            const username = document.querySelector('#username_edit').value;
            const nickname = document.querySelector('#nickname_edit').value;
            const bio = document.querySelector('#bio_edit').value;
            const img = document.querySelector('#changeProfilePhoto').value;

            initialValues['#username_edit'] = username;
            initialValues['#nickname_edit'] = nickname;
            initialValues['#bio_edit'] = bio;
            initialValues['#changeProfilePhoto'] = img;
        }

        function checkFormChanges() {
            const username = document.querySelector('#username_edit').value;
            const nickname = document.querySelector('#nickname_edit').value;
            const bio = document.querySelector('#bio_edit').value;
            const img = document.querySelector('#changeProfilePhoto').value;

            const hasChanges = username !== initialValues['#username_edit'] ||
                nickname !== initialValues['#nickname_edit'] ||
                bio !== initialValues['#bio_edit'] ||
                img !== initialValues['#changeProfilePhoto'];

            document.querySelector('#editForm_submit').disabled = !hasChanges;
            document.querySelector('#editForm_reset').disabled = !hasChanges;
        }

        function handleBlur(event) {
            checkFormChanges();
        }

        document.querySelectorAll('#username_edit, #nickname_edit, #bio_edit, #changeProfilePhoto').forEach(input => {
            input.addEventListener('blur', handleBlur);
        });

        document.getElementById('changeProfilePhoto').addEventListener('change', function () {
            const file = this.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader()
                reader.onload = function (e) {
                    document.getElementById('pfpImageContainer').style.backgroundImage =
                        `url(${e.target.result})`
                };
                document.querySelector('.trocarFoto__btn').style.opacity = '1'

                reader.readAsDataURL(file)
            } else {
                alert('Por favor, selecione uma imagem.')
                this.value = ''
            }
            checkFormChanges();
        });

        document.querySelector('#editForm_submit').addEventListener('click', function (event) {
            event.preventDefault();

            const username = document.querySelector('#username_edit').value;
            const bio = document.querySelector('#bio_edit').value;
            const usernameInput = document.querySelector('#username_edit');
            const bioInput = document.querySelector('#bio_edit');
            let valid = true;

            if (!vldUsr(username)) {
                usernameInput.style.border = '2px solid red';
                valid = false;
            } else {
                usernameInput.style.border = '';
            }
            if (bio.length > 145) {
                bioInput.style.border = '2px solid red';
                valid = false;
            } else {
                bioInput.style.border = '';
            }
            if (valid) {
                document.querySelector('#inCon_frame').submit();
            }
        });

        document.querySelector('#editForm_reset').addEventListener('click', function (event) {
            console.log('clicou em resetar')
            event.preventDefault()

            const username = document.querySelector('#username_edit').value;
            const nickname = document.querySelector('#nickname_edit').value;
            const bio = document.querySelector('#bio_edit').value;

            // Verifica se algo foi alterado
            if (username !== initialValues['#username_edit'] ||
                nickname !== initialValues['#nickname_edit'] ||
                bio !== initialValues['#bio_edit'] ||
                document.querySelector('#changeProfilePhoto').files.length > 0) {
                window.parent.postMessage('confirmReset', '*');
                console.log('enviado')
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            storeInitialValues()
            checkFormChanges()
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var inputControl_formIns = document.querySelector('#inputControl_formIns');
            var resultICFI = aplicarAsteriscosCPF(inputControl_formIns.value);
            inputControl_formIns.value = resultICFI;
            const senhaEdit = document.querySelector('#senha_edit');
            if (senhaEdit) {
                tPassAst(senhaEdit.value);
            }
            const geoCheckbox = document.getElementById('geoPermissao_site');
            const notificacaoCheckbox = document.getElementById('notificacaoPermissao_site');

            const geoStatus = document.getElementById('isOn_geo');
            const notificacaoStatus = document.getElementById('isOn_notificacao');

            function updatePermissions() {
                const geoPermissao = geoCheckbox.checked;
                const notificacaoPermissao = notificacaoCheckbox.checked;

                localStorage.setItem('geoPermissao', geoPermissao);
                localStorage.setItem('notificacaoPermissao', notificacaoPermissao);

                geoStatus.textContent = geoPermissao ? 'Ativa' : 'Desativada';
                notificacaoStatus.textContent = notificacaoPermissao ? 'Ativa' : 'Desativada';

                if (geoPermissao) {
                    navigator.geolocation.getCurrentPosition(
                        position => console.log('Geolocalização permitida:', position),
                        error => console.error('Erro ao obter geolocalização:', error)
                    );
                } else {
                    console.log('Geolocalização desativada.');
                }

                if (notificacaoPermissao) {
                    Notification.requestPermission().then(permission => {
                        if (permission !== 'granted') {
                            notificacaoCheckbox.checked = false;
                            notificacaoStatus.textContent = 'Desativada';
                            localStorage.setItem('notificacaoPermissao', false);
                        }
                    });
                } else {
                    console.log('Notificações desativadas.');
                }
            }

            function loadPermissions() {
                const savedGeoPermissao = localStorage.getItem('geoPermissao') === 'true';
                const savedNotificacaoPermissao = localStorage.getItem('notificacaoPermissao') === 'true';

                geoCheckbox.checked = savedGeoPermissao;
                notificacaoCheckbox.checked = savedNotificacaoPermissao;

                geoStatus.textContent = savedGeoPermissao ? 'Ativa' : 'Desativada';
                notificacaoStatus.textContent = savedNotificacaoPermissao ? 'Ativa' : 'Desativada';
            }

            geoCheckbox.addEventListener('change', updatePermissions);
            notificacaoCheckbox.addEventListener('change', updatePermissions);
            loadPermissions();
        });
        /*FONTE DE TODO O MAL CUIDADO! */
/*         window.addEventListener('beforeunload', function () {
                window.parent.postMessage('iframe:unload', '*');
            });
            window.onload = function () {
                var e = localStorage.getItem('com.beco_fonteWeb_localData')
                if (e == 'P') {

                }
            } */
        document.addEventListener('DOMContentLoaded', function () {
            var VLibrasIsOn = localStorage.getItem('com.beco/VLibras_recurso02x.all?ison');
            var AudioRecIsOn = localStorage.getItem('com.beco/audio_recurso01x.all?ison');
            if (VLibrasIsOn && AudioRecIsOn) {
                if (VLibrasIsOn === 'ativo') {
                    document.getElementById('VLibras_site').checked = true;
                } else if (VLibrasIsOn === 'desativado') {
                    document.getElementById('VLibras_site').checked = false;
                }

                if (AudioRecIsOn === 'ativo') {
                    document.getElementById('audioRecurso_site').checked = true;
                } else if (AudioRecIsOn === 'desativado') {
                    document.getElementById('audioRecurso_site').checked = false;
                }
            } else {
                localStorage.setItem('com.beco/VLibras_recurso02x.all?ison', 'desativado')
                localStorage.setItem('com.beco/audio_recurso01x.all?ison', 'desativado');
            }
            const recursos = [{
                    checkboxId: 'audioRecurso_site',
                    textId: 'isOn_recurso',
                    localStorageKey: 'com.beco/audio_recurso01x.all?ison'
                },
                {
                    checkboxId: 'VLibras_site',
                    textId: 'isOn_recursoVL',
                    localStorageKey: 'com.beco/VLibras_recurso02x.all?ison'
                },
                {
                    checkboxId: 'ThemeModeRecurso_site',
                    textId: 'isOn_recursoME',
                    localStorageKey: 'DarkMode'
                },
            ];

            recursos.forEach(recurso => {
                const savedState = localStorage.getItem(recurso.localStorageKey);
                const checkbox = document.getElementById(recurso.checkboxId);
                const statusText = document.getElementById(recurso.textId);

                if (savedState === 'ativo') {
                    checkbox.checked = true;
                    statusText.textContent = 'Ativo';
                } else {
                    checkbox.checked = false;
                    statusText.textContent = 'Desativado';
                }

                checkbox.addEventListener('change', function () {
                    updateRecurso(recurso.checkboxId, recurso.textId, recurso.localStorageKey);
                });
            });
        });
        /*             document.querySelector('#acess_frame').style.display = 'block' */

        //AQUI É DO DARK MODE:
        /* document.querySelector('#ThemeModeRecurso_site').addEventListener('change', () => {
            var inputi = document.querySelector('#ThemeModeRecurso_site');
            var DarquiMode = localStorage.getItem('DarkMode');

            if (inputi.checked == true) {
                if (DarquiMode !== "1") {
                    window.parent.postMessage('DMode?Turn__on', '*');
                    localStorage.setItem('DarkMode', "1");
                }
            } else {
                if (DarquiMode !== "0") {
                    window.parent.postMessage('DMode?Turn__off', '*');
                    localStorage.setItem('DarkMode', "0");
                }
            }
        }); */

        function updateRecurso(checkboxId, textId, localStorageKey) {
            const checkbox = document.getElementById(checkboxId);
            const statusText = document.getElementById(textId);

            if (checkbox.checked) {
                if(checkboxId == 'audioRecurso_site'){
                    var geo = document.querySelector('#geoPermissao_site').checked
                    if(geo == true){
                        geo.disabled = true
                        return 
                    }else{
                        geo.checked = true
                        geo.disabled = true
                    }
                }
                if(checkboxId == 'audioRecurso_site'){
                    window.parent.postMessage('com.beco/audio_recurso01x.all?ison:TurnON', '*');
                }
                if (checkboxId == 'ThemeModeRecurso_site') {
                    document.querySelector('#acess_frame').style.display = 'block'
                    console.log('ThemeModeRecurso_site ativo')
                    localStorage.setItem(localStorageKey, '1');
                    window.parent.postMessage('Theme?DarkIs__on', '*');
                                        document.querySelector('#acess_frame').style.display = 'block'

                }
                statusText.textContent = 'Ativo';
                localStorage.setItem(localStorageKey, 'ativo');
                if (checkboxId == 'VLibras_site') {
                    window.parent.postMessage('VLibras__on', '*');
                }
            } else {
                if(checkboxId == 'audioRecurso_site'){
                    window.parent.postMessage('com.beco/audio_recurso01x.all?ison:TurnOFF', '*');
                }
                if (checkboxId == 'ThemeModeRecurso_site') {
                    document.querySelector('#acess_frame').style.display = 'block'
                    console.log('ThemeModeRecurso_site inativo')
                    localStorage.setItem(localStorageKey, '0');
                    window.parent.postMessage('Theme?DarkIs__off', '*');
                    document.querySelector('#acess_frame').style.display = 'block'

                }
                statusText.textContent = 'Desativado';
                localStorage.setItem(localStorageKey, 'desativado');
                if (checkboxId == 'VLibras_site') {
                    window.parent.postMessage('VLibras__off', '*');
                }
            }

        }
        // Variáveis globais

        // Função para gerenciar o estado dos checkboxes
        function gerenciarCheckbox(checkbox, funcao) {
            if (ultimoCheckboxAtivo && ultimoCheckboxAtivo !== checkbox) {
                ultimoCheckboxAtivo.checked = false;
                ultimoCheckboxAtivo.parentNode.style.border = 'none';
            }

            if (checkbox.checked) {
                funcao();
                checkbox.parentNode.style.border = '2px solid #4398D6';
                ultimoCheckboxAtivo = checkbox;
            } else {
                checkbox.parentNode.style.border = 'none';
                ultimoCheckboxAtivo = null;
            }
        }

        document.querySelectorAll('#vltrPMenuConfig').forEach(botao => {
            botao.addEventListener('click', () => {
                window.parent.postMessage('configProf?Open', '*');
            });
        });


        window.onload = function () {
            const savedState = localStorage.getItem('com.beco_fonteWeb_localData');

            const checkboxP = document.querySelector('#fonteP__rec');
            const checkboxR = document.querySelector('#fonteR__rec');
            const checkboxG = document.querySelector('#fonteG__rec');
            checkboxP.checked = false;
            checkboxR.checked = false;
            checkboxG.checked = false;

            if (savedState == 'P') {
                localStorage.setItem('com.beco_fonteWeb_localData', 'R')
                checkboxP.checked = true;
                P__font();
            } else if (savedState == 'R') {
                localStorage.setItem('com.beco_fonteWeb_localData', 'R')
                checkboxR.checked = true;
                Regular__font();
            } else if (savedState == 'G') {
                localStorage.setItem('com.beco_fonteWeb_localData', 'R')
                checkboxG.checked = true;
                G__font();
            } else {
                checkboxR.checked = true;
                Regular__font();
            }

            // Adiciona eventos de clique para os checkboxs
            document.querySelectorAll('.adFonteBtn__recurso > input').forEach(input => {
                input.addEventListener('change', function () {
                    gerenciarCheckbox(this, this.id === 'fonteP__rec' ? P__font : this.id ===
                        'fonteR__rec' ? Regular__font : G__font);
                });
            });
        };
    </script>
    <script src="../assets/js/texto_audio.js"></script>
    <?php
    if(isset($_REQUEST["configperfil"])){
        echo "
        <script>
document.getElementById('inCon_frame').style.display = 'block';
document.getElementById('acess_frame').style.display = 'none';

       
        </script>";}
    ?>
</body>

</html>
