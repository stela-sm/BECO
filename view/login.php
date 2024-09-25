<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BECO - Login</title>
    <link rel="icon" href="assets/media/logo/4.png" sizes="any">
    <link rel="icon" href="../assets/media/logo/4.png" sizes="16x16" type="image/png">
    <link rel="icon" href="../assets/media/logo/4.png" sizes="32x32" type="image/png">
    <link rel="icon" href="../assets/media/logo/4.png" sizes="48x48" type="image/png">
    <link rel="icon" href="../assets/media/logo/4.png" sizes="64x64" type="image/png">
    <link rel="icon" href="../assets/media/logo/4.png" sizes="128x128" type="image/png">
    <link rel="icon" href="../assets/media/logo/4.png" sizes="256x256" type="image/png">
    <link rel="icon" href="../assets/media/logo/4.png" sizes="any" type="image/svg+xml">
    <script src="../assets/js/teste.js"></script>

    <!-- Apple Touch Icon (iOS) -->
    <link rel="apple-touch-icon" href="assets/media/logo/4.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/logo/4.png">

    <!-- Microsoft Tile (Windows) -->
    <meta name="msapplication-TileImage" content="assets/media/logo/4.png">
    <link rel="stylesheet" href="../assets/style/login.css">
    <meta name="msapplication-TileColor" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
    <script src="https://accounts.google.com/gsi/client" async></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id"
        content="155963378942-3pas3aooivev6m0sl1a7qkgdlgfotuub.apps.googleusercontent.com">
    <script>
        function attachSignin(element) {
            console.log(element.id);
            auth2.attachClickHandler(element, {},
                function (googleUser) {
                    document.getElementById('name').innerText = "Signed in: " +
                        googleUser.getBasicProfile().getName();
                },
                function (error) {
                    alert(JSON.stringify(error, undefined, 2));
                });
        }
    </script>
    <link rel="stylesheet" href="login.css">
</head>
<style>
    /*CSS DO BOTÃO DE CONTINUAR COM O GOOGLE*/
    .gsi-material-button {
        /* -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        -webkit-appearance: none; */
        background-color: #f9f9f9;
        background-image: none;
        border: 1px solid #747474;
        -webkit-border-radius: 20px;
        border-radius: 20px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        color: #1f1f1f;
        cursor: pointer;
        font-family: 'Roboto', arial, sans-serif;
        font-size: 14px;
        letter-spacing: 0.25px;
        outline: none;
        overflow: hidden;
        padding: 1.67% 3%;

        position: relative;
        text-align: center;
        -webkit-transition: background-color .218s, border-color .218s, box-shadow .218s;
        transition: background-color .218s, border-color .218s, box-shadow .218s;
        vertical-align: middle;
        white-space: nowrap;
        width: 60%;
        max-width: 60%;
        min-width: min-content;

    }

    .gsi-material-button .gsi-material-button-icon {
        height: 20px;
        margin-right: 12px;
        min-width: 20px;
        width: 20px;
    }

    .gsi-material-button .gsi-material-button-content-wrapper {
        -webkit-align-items: center;
        align-items: center;
        display: flex;
        -webkit-flex-direction: row;
        flex-direction: row;
        -webkit-flex-wrap: nowrap;
        flex-wrap: nowrap;
        height: 100%;
        justify-content: space-between;
        position: relative;
        width: 100%;
    }

    .gsi-material-button .gsi-material-button-contents {
        -webkit-flex-grow: 1;
        flex-grow: 1;
        font-family: 'Roboto', arial, sans-serif;
        font-weight: 500;
        overflow: hidden;
        text-overflow: ellipsis;
        vertical-align: top;
    }

    .gsi-material-button .gsi-material-button-state {
        -webkit-transition: opacity .218s;
        transition: opacity .218s;
        bottom: 0;
        left: 0;
        opacity: 0;
        position: absolute;
        right: 0;
        top: 0;
    }

    .gsi-material-button:disabled {
        cursor: default;
        background-color: #ffffff61;
        border-color: #1f1f1f1f;
    }

    .gsi-material-button:disabled .gsi-material-button-contents {
        opacity: 38%;
    }

    .gsi-material-button:disabled .gsi-material-button-icon {
        opacity: 38%;
    }

    /*BOTÕES DOS FORMULÁRIOS*/
    .proxEtapa {
        border-radius: 20px;
        background-color: #f9f9f9;
        border: 1px solid #e8e8e8;
        padding: 2%;
        max-width: 100%;
        margin-top: 7%;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cntFkForm,
    form.cntFkForm {
        display: flex;
        flex-direction: column;
        gap: 3vh;
    }

    /*input verificacao*/
    input.code-input {
        font-size: 1.5em;
        width: 100%;
        height: calc(100% + 10px);
        text-align: center;
        flex: 1 0 1em;
        padding: 2%;
        border-radius: 6px;
        color: #747474;
        background-color: #f9f9f9;
        border: 1.7px solid #e8e8e8;
    }

    input.code-input:focus {
        outline: none;
        border: 2px solid #1473E6;
        ;
        background: var(--background3);
    }

    /*RESETS DA PAGINA*/
    body,
    html {
        height: 100%;
        /* background-color: #f9f9f9; */
        background-color: rgba(0, 0, 0, 0.78);
        background-blend-mode: darken;

        color: #505050;
        background-repeat: no-repeat;
        background-size: cover;
    }

    body {
        overflow: hidden;

    }

    /*responsividade*/
    @media(max-width: 750px) {

        @media (max-width: 750px) {
            body {
                overflow: hidden !important;
            }

            .login-viewport,
            .cad-viewport,
            .esqueciSenha-viewport {
                bottom: 0;
                transition: none;
                display: flex;
                position: absolute;
                z-index: 9;
                justify-content: center;
                align-items: flex-end;
                height: 100vh;
                width: 100vw;
                align-content: flex-end;
            }
        }

        .contentGrid {
            margin-right: 0%;
            padding: 40px 56px;
            max-width: 100%;
            width: 100%;
            background-color: #fff !important;
            height: 70% !important;
            border: 1px solid #e8e8e8;
            border-radius: 28px 28px 0 0;
            box-shadow: none;
        }

        .form-viewport {
            margin-top: 0%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            height: 100%;
            width: 100%;
            gap: 5vh;
            position: relative;
        }
    }
</style>
<!--se precisar alterar algo, não altere nada listado abaixo:
1. Qualquer ID (a maioria está integrado ao JS);
2. CSS do botão continuar com o google;
3. Atributos adicionados;
4. Conteúdo (texto) dos formulários;
5. Alinhamento do texto (sempre à direita/esquerda);
6. Não alterar o atributo "data-sitekey" de forma alguma;
7. Não alterar o JS existente, somente na integração de páginas php (há algumas variaveis que estão linkadas com páginas .html que posteriormente irão se tornar .php);
-->

<body onselectstart="return false">
    <a class="container__logo" id="logoContainerLink" href="../index.php" alt="Voltar para página inicial">
        <img id="logotipoPrincipal" width="90%" src="../assets/media/logo/white_becoComplete.png">
    </a>
    <!--FORMULARIO DE LOGIN-->
    <div class="login-viewport">

        <div class="contentGrid login-form ">
            <div class="form-viewport">
                <header class="container_header">
                    <h3 class="header">Fazer Login</h3>
                    <span class="newUser">Novo usuário? <a class="link" id="paraCadastro">Crie uma conta</a></span>
                </header>
                <hr class="main-divider">
                <form class="cntFkForm" id="login__form-container" method="post" action="../controller/controller.php?login=1">
                    <!--Aqui tem q por o action-->
                    <div class="form-agroup">
                        <span for="email" class="form-label">Endereço de email:</span>
                        <input type="email" class="form-control" id="email-log" name="emailLogin" required>
                    </div>
                    <div class="form-agroup">
                        <span for="password" class="form-label">Sua senha:</span>
                        <div class="content_viewSenha">
                            <input type="password" class="form-control" id="senha_inp-log" name="senhaLogin" required>
                            <!--esses svg's são manipulados com JS lá no fim da página (o mesmo para o cadastro)-->
                            <svg id="mostrarSenha__login" class="verSenha" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="#747474" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-eye-off">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                                <path
                                    d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                                <path d="M3 3l18 18" />
                            </svg>

                            <svg id="NmostrarSenha__login" class="verSenha" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#747474"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                style="display: block;">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                <path
                                    d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                </path>
                            </svg>
                        </div>

                    </div>
                    <!--RECAPTCHA-->
                    <div class="form-agroup">
                        <div class="g-recaptcha" data-sitekey="6LcpSCoqAAAAAGYzlSKlWhLQuJ4deJlSEpfdcH6Y"
                            data-action="LOGIN"></div>
                    </div>

                    <div class="containerSubmitBtn">
                        <!--BOTÃO DE CONTINUAR COM O GOOGLE: DESABILITADO-->
                        <button class="gsi-material-button btn " disabled>
                            <div class="gsi-material-button-state"></div>
                            <div class="gsi-material-button-content-wrapper">
                                <div class="gsi-material-button-icon">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
                                        <path fill="#EA4335"
                                            d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z">
                                        </path>
                                        <path fill="#4285F4"
                                            d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z">
                                        </path>
                                        <path fill="#FBBC05"
                                            d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z">
                                        </path>
                                        <path fill="#34A853"
                                            d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z">
                                        </path>
                                        <path fill="none" d="M0 0h48v48H0z"></path>
                                    </svg>
                                </div>
                                <span class="gsi-material-button-contents">Continuar</span>
                                <span style="display: none;">Continuar</span>
                            </div>
                        </button>
                        <!--BOTÃO DE ENVIAR-->
                        <input type="submit" value="Entrar" class="btn w-100">
                        <a class="link" id="esqueciSenha">Esqueceu a senha?</a>
                    </div>

                </form>
                <footer>
                    <span class="copyright">© 2024 Beco Inc.</span>
                    <a href="#" class="link" ajudaCenter="ligado">Precisa de ajuda?</a>
                </footer>
            </div>

        </div>
    </div>
    <!--FORMULARIO DE CADASTRO-->
    <div class="cad-viewport">
        <div class="contentGrid login-form ">
            <form id="cdstr__form-container" method="post" action="../controller/controller.php?cadastro=1">
                <!--PRIMEIRA ETAPA DO CADASTRO-->
                <div class="form-viewport etapa1" id="etapa1_cadViewPrtCntIndex1">
                    <header class="container_header">
                        <p class="etapaContainerCount">Etapa 1 de 2</p>
                        <h3 class="header">Criar conta</h3>
                        <span class="newUser">Já é usuário? <a class="link" id="paraLogin">Faça login</a></span>
                    </header>
                    <hr class="main-divider">
                    <div class="cntFkForm">


                        <div class="form-agroup">
                            <span for="user-cad" class="form-label">Nome de usuário:</span>
                            <input name="nomeCadastro" type="text" class="form-control" id="user-cad" required>
                            <span id="username-match" class="alerta_inptRED" style="display: none;">
                                *Os caracteres especiais permitidos são "_" e "."</span>
                            <!--esse span serve para quando houver erros-->
                        </div>
                        <div class="form-agroup">
                            <span for="email" class="form-label">Endereço de email:</span>
                            <input name="emailCadastro" type="email" class="form-control" id="email-cad" required>
                            <span id="email-match" class="alerta_inptRED" style="display: none;">* Endereço de email
                                inválido</span>
                            <!--esse span serve para quando houver erros-->

                        </div>
                        <div class="form-agroup cpfBorderAgroup">
                            <!--esse popover não está funcionando, tenho q arrumar ainda-->
                            <span for="text" class="form-label cpfLabelMajor">Seu CPF: <button type="button"
                                    class="pqCPFclass_btn" data-toggle="popover" title="Porque utilizamos CPF?"
                                    data-content="Solicitamos o CPF para garantir a segurança e a conformidade com as normas fiscais, além de ajudar na prevenção de fraudes e assegurar uma experiência de compra e venda mais segura."
                                    class="pqCPF" id="popoverTrigger"><svg title="Porque utilizamos CPF?"
                                        xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="#1473E6" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-help">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M12 17l0 .01" />
                                        <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
                                    </svg></button>
                            </span>

                            <input type="text" maxlength="14" minlength="14" name="cpfCadastro" class="form-control"
                                id="cpf-cad" required>
                            <span id="cpf-match" class="alerta_inptRED" style="display: none;">* CPF inválido</span>
                            <!--esse span serve para quando houver erros-->

                        </div>

                        <a id="proxEtapa" class="btn w-100 proxEtapa">Continuar</a>
                        <!---ir para a proxima etapa do cadastro-->
                    </div>
                    <footer>
                        <span class="copyright">© 2024 Beco Inc.</span>
                        <a href="login.php" target="_blank" class="link" ajudaCenter="ligado">Precisa de ajuda?</a>
                    </footer>
                </div>
                <!--SEGUNDA ETAPA DO CADASTRO-->
                <div class="form-viewport etapa2" id="etapa2_cadViewPrtCntIndex2" style="display: none;">
                    <header class="container_header">
                        <p class="etapaContainerCount">Etapa 2 de 2</p>
                        <h3 class="header">Criar conta</h3>
                        <span class="newUser">Já é usuário? <a class="link" id="paraLoginV2">Faça login</a></span>
                    </header>
                    <hr class="main-divider">
                    <div class="cntFkForm">
                        <div class="form-agroup">
                            <span for="password" class="form-label">Sua senha:</span>
                            <div class="content_viewSenha">
                                <input type="password" class="form-control" id="senha_inp-cad" required
                                    name="senhaCadastro">
                                <svg id="mostrarSenha" class="verSenha" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="#747474" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye-off">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                                    <path
                                        d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                                    <path d="M3 3l18 18" />
                                </svg>
                                <svg id="NmostrarSenha" class="verSenha" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="#747474" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path
                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                            </div>
                        </div>
                        <div class="form-agroup">
                            <!--a confirmação é sempre verificada quando algo é escrito/apagado-->

                            <span for="password" class="form-label">Confirme sua senha:</span>
                            <div class="content_viewSenha">
                                <input type="password" class="form-control formConfirma" id="senha_inp_conf-cad"
                                    name="ConfsenhaCadastro" required>
                                <span id="password-match" style="display: none;" class="alerta_inptRED">A senha não deve
                                    ser diferente!</span>

                                <svg id="mostrarSenhaV2" class="verSenha" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="#747474" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye-off">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                                    <path
                                        d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                                    <path d="M3 3l18 18" />
                                </svg>

                                <svg id="NmostrarSenhaV2" class="verSenha" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="#747474" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path
                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                            </div>

                        </div>
                        <!--Recaptcha-->
                        <div class="form-agroup">
                            <div class="g-recaptcha" data-sitekey="6LcpSCoqAAAAAGYzlSKlWhLQuJ4deJlSEpfdcH6Y"
                                data-action="CADASTRO"></div>
                        </div>
                        <!--AQUI É O VERDADEIRO SUBMIT DO FORM DE CADASTRO-->
                        <div class="containerSubmitBtn">
                            <a id="voltarEtapa" class="mesmoBotaoVoltar btn w-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="#ccc" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l14 0" />
                                    <path d="M5 12l6 6" />
                                    <path d="M5 12l6 -6" />
                                </svg>
                                <span style="    margin-right: 10%;">Voltar</span></a>
                            <input type="submit" value="Cadastrar" id="cadastrarBTN" class="btn w-100">
                        </div>
                        <!--termos já linkados-->
                        <div class="form-agroup">
                            <label for="termosDeUso" id="termosUsoLabel">
                                Ao clicar em Cadastrar, você aceita os <a href="../assets/media/terms/termos_de_uso.pdf"
                                    target="_blank" rel="noopener noreferrer">Termos de uso</a> e a <a
                                    href="../assets/media/terms/politica_de_privacidade.pdf" target="_blank"
                                    rel="noopener noreferrer">Política de privacidade</a>.
                            </label>
                        </div>
                    </div>
                    <footer>
                        <!--footer-->
                        <span class="copyright">© 2024 Beco Inc.</span>
                        <a href="login.php" target="_blank" class="link" ajudaCenter="ligado">Precisa de ajuda?</a>
                    </footer>
                </div>
            </form>
        </div>
    </div>

    <!--FORMULARIO ESQUECEU SENHA-->
    <div class="esqueciSenha-viewport" style="display: none;">
        <div class="contentGrid esqSenha-form ">
            <div class="form-viewport">
                <header class="container_header">
                    <h3 class="header" id="headerConfRecSenha">Esqueceu sua senha?</h3>
                </header>
                <hr class="main-divider">
                <form class="cntFkForm" id="recupSenha__form-container" method="POST" action="../controller/controller.php?recuperar=1">
                    <!--colocar o action aqui!!!-->
                    <div class="form-agroup">
                        <label for="termosDeUso" id="termosUsoLabel">
                            Para redefinir sua senha, insira o endereço de e-mail que você usou no cadastro. Enviaremos
                            um e-mail com um código para recuperação de senha. </label>
                    </div>
                    <!--email para recuperar-->
                    <div class="form-agroup">
                        <span for="email" class="form-label">Endereço de email:</span>
                        <input type="email" class="form-control" id="email-esqueciSenha" name="emailEsqueciSenha"
                            required>
                    </div>
                    <!--submit: -->
                    <div class="containerSubmitBtn">
                        <a id="voltarLogin" class="btn w-100 mesmoBotaoVoltar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#ccc" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l14 0" />
                                <path d="M5 12l6 6" />
                                <path d="M5 12l6 -6" />
                            </svg>
                            <span style="margin-right: 10%;">Voltar</span></a>
                        <!--este volta para a ultima pagina (login)-->
                        <input type="submit" id="enviarEmailRecSenha_btn" value="Enviar" class="btn w-100">
                        <!--submit-->
                    </div>

                </form>

                <!--FORMULARIO DO CÓDIGO DE RECUPERAÇÃO-->
                <!--para mostrar esse form, precisa de uma variavel que venha via get para q o JS pegue e saiba que tem q mostrar esse form, se precisar de algum código, me avisa-->
                <form class="cntFkForm" id="codigoSenha__form-container" style="display: none;" method="post"
                    action="../controller/controller.php?verificar=1">
                    <input type="hidden" name="verificar" value='1'>
                    <div class="form-agroup">
                        <label for="termosDeUso" id="termosUsoLabel">
                            Um código de recuperação de senha foi enviado para o seu e-mail. Caso não o encontre na
                            caixa de entrada, verifique também as pastas de spam, lixo eletrônico ou promoções. Se ainda
                            assim não localizar o e-mail, aguarde alguns minutos e tente refazer o processo.</label>
                    </div>
                    <!--Todos esses inputs(com name="code") enviam os valores que estão dentro deles para o <input type="hidden" id="codigoVerificacao" name="codigoVerificacao">-->
                    <div class="containerCodigo_semNom">
                        <input name="code1" class="code-input" required maxlength="1">
                        <input name="code2" class="code-input" required maxlength="1">
                        <input name="code3" class="code-input" required maxlength="1">
                        <input name="code4" class="code-input" required maxlength="1">
                        <input name="code5" class="code-input" required maxlength="1">
                        <input name="code6" class="code-input" required maxlength="1">
                        <input type="hidden" id="codigoVerificacao" name="codigoVerificacao">
                        <!--input com valor final-->
                    </div>
                    <!--botão de submit-->
                    <div class="containerSubmitBtn">
                        <a id="voltarRecSenha" class="btn w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="    width: auto;" fill="none" stroke="#ccc" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l14 0" />
                                <path d="M5 12l6 6" />
                                <path d="M5 12l6 -6" />
                            </svg>
                            <span style="    margin-right: 10%;">Voltar</span></a>
                            <input type="submit" id="enviarCodRecSenha_btn" value="Enviar" class="btn w-100">
                    </div>
                </form>

<!--FORM PRA COLOCAR A SENHA NOVA totalmente gambiarra KAKKAKAKAKAKAKAKA-->
<form class="cntFkForm" style="display:none;" id="novaSenha__form-container" method="POST" action="../controller/controller.php?newpass=1">
                    <!--colocar o action aqui!!!-->
                    <div class="form-agroup">
                        <label for="termosDeUso" id="termosUsoLabel">
       Agora é só escolher uma nova senha para seu login.</label>
                    </div>
                    <!--SENHA NOVA-->
                    <div class="form-agroup">
                        <span for="email" class="form-label">Nova Senha:</span>
                        <input type="password" class="form-control" minlength="6" id="senha-esqueciSenha" name="senhaEsqueciSenha"
                            required>
                    </div>
                    <!--submit: -->
                    <div class="containerSubmitBtn">
                        <a id="voltarLogin" class="btn w-100 mesmoBotaoVoltar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#ccc" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 12l14 0" />
                                <path d="M5 12l6 6" />
                                <path d="M5 12l6 -6" />
                            </svg>
                            <span style="margin-right: 10%;">Voltar</span></a>
                        <!--este volta para a ultima pagina (login)-->
                        <input type="submit" id="enviarSenhaRecSenha_btn" value="Confirmar" class="btn w-100">
                        <!--submit-->
                    </div>

                </form>


                <footer>
                    <span class="copyright">© 2024 Beco Inc.</span>
                    <a href="#" class="link" ajudaCenter="ligado">Precisa de ajuda?</a>
                </footer>
            </div>

        </div>
    </div>
    </div>
    <!--aqui seria o modal de criar nova senha-->
    <form action="#" style="display: none;">
        muda para o sweet alert
    </form>
    <script src="../assets/js/ferramentas.js"></script>
    <!--fim do modal de criar nova senha-->
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
  
    <script>
        /***************** ESSE SCRIPT RECEBE OQ O PHP MANDOU PARA MOSTRAR O FORMULARIO CERTO ******************/
        // Função para ocultar todos os formulários
        function esconderForms() {
            document.querySelector('.cad-viewport').style.display = 'none';
            document.querySelector('.login-viewport').style.display = 'none';
            document.querySelector('#recupSenha__form-container').style.display = 'none';
            document.querySelector('#codigoSenha__form-container').style.display = 'none';
            document.querySelector('#novaSenha__form-container').style.display = 'none';
        }
        function mostrarForms(formName) {
            esconderForms()
            switch (formName) {
                case 'cadastro':
                    document.querySelector('.cad-viewport').style.display = 'flex';
                    break;
                case 'login':
                    document.querySelector('.login-viewport').style.display = 'flex';
                    break;
                case 'recuperar_senha':
                    document.querySelector('.esqueciSenha-viewport').style.display = 'flex';
                    document.querySelector('#recupSenha__form-container').style.display = 'flex';
                    
                    document.querySelector('#novaSenha__form-container').style.display = 'none';
                    break;
                case 'confirmacao_codigo':
                    
                    document.querySelector('.esqueciSenha-viewport').style.display = 'flex';
                    document.querySelector('#codigoSenha__form-container').style.display = 'flex';
                    break;
                    case 'nova_senha':
                    
                    document.querySelector('.esqueciSenha-viewport').style.display = 'flex';
                    document.querySelector('#novaSenha__form-container').style.display = 'flex';
                    break;
                default:
                    document.querySelector('.login-viewport').style.display = 'flex';
                    break;
            }
        }
        
        /* var PHPresp = '<?php echo $mostrarForm_Certo ?>'; 
        window.onload = function() {
            mostrarForms(PHPresp);
        } */
        /************************************* FIM DA INTEGRAÇÃO COM O PHP *************************************/
        window.onload = function() {
            var contentGrid = document.querySelector('.contentGrid');
            var topPosition = contentGrid.offsetTop;
            document.querySelector('.container__logo').style.top = `${topPosition - 150/3}px`
        }
        document.addEventListener('touchmove', function (event) {
            event.preventDefault();
        }, {
            passive: false
        });
        //aqui é pro codigo de verificacao, gambiarra, precisa de ajuste - não mexer pfv
        const inputElements = [...document.querySelectorAll('input.code-input')]
        const hiddenInput = document.getElementById('full-code')
        const formElement = document.getElementById('codigoSenha__form-container')

        inputElements.forEach((ele, index) => {
            ele.addEventListener('keydown', (e) => {
                if (e.keyCode === 8 && e.target.value === '') {
                    inputElements[Math.max(0, index - 1)].focus()
                }
            });

            ele.addEventListener('input', (e) => {
                const [first, ...rest] = e.target.value
                e.target.value = first || ''

                const lastInputBox = index === inputElements.length - 1
                const didInsertContent = first !== undefined

                if (didInsertContent && !lastInputBox) {
                    inputElements[index + 1].focus()
                    inputElements[index + 1].value = rest.join('')
                    inputElements[index + 1].dispatchEvent(new Event('input'))
                }

                updateHiddenInput();
            })
        })

        

        // mudar background e outras coisas dependendo se é cad/log
        function mostrarModal() {
            $('#modalExemploHDBJAH').modal('show')
        }


        document.addEventListener('DOMContentLoaded', function () {

            document.body.style.backgroundImage =  "url('https://i.pinimg.com/originals/92/74/5e/92745ee536b8f6e2045f9ad74fd9094f.jpg')";

            const paraCadastro = document.querySelector('#paraCadastro')
            const paraLogin = document.querySelector('#paraLogin')
            const cadForm = document.querySelector('.cad-viewport')
            const logForm = document.querySelector('.login-viewport')
            const paraLoginV2 = document.querySelector('#paraLoginV2')

            const recSenhaForm_btn = document.querySelector('#enviarEmailRecSenha_btn');
            const codigoForm = document.querySelector('#codigoSenha__form-container');
            const voltarRecSenha = document.querySelector('#voltarRecSenha');
            const recSenhaForm = document.querySelector('#recupSenha__form-container');
            const headerConfRecSenha = document.querySelector('#headerConfRecSenha');
            const emailInput = document.querySelector('#email-esqueciSenha');
            recSenhaForm_btn.addEventListener('click', () => {
                const email = emailInput.value;

                if (validarEmail(email)) {
                    setTimeout(() => {
                        recSenhaForm.style.display = 'none';
                        codigoForm.style.display = 'flex';
                        headerConfRecSenha.innerText = 'Verificação de código';
                    }, 5000)
                } else {
                    emailInput.borderBottom = '2px solid red'
                    emailInput.focus()
                }
            });

            voltarRecSenha.addEventListener('click', () => {
                recSenhaForm.style.display = 'flex'
                codigoForm.style.display = 'none'
                headerConfRecSenha.innerText = 'Esqueceu sua senha?'
            })


            const esqueciSenha = document.querySelector('.esqueciSenha-viewport')
            document.querySelector('#esqueciSenha').addEventListener('click', () => {
                esqueciSenha.style.display = 'flex'
                logForm.style.display = 'none'
                document.title = 'Recuperar senha | BECO'
            })

            paraLoginV2.addEventListener('click', function () {
                document.title = "Login | BECO";
                logForm.style.transform = "TranslateX(0%)";
                cadForm.style.transform = "TranslateX(100%)";
                document.body.style.backgroundImage =
                    "url('https://i.pinimg.com/originals/92/74/5e/92745ee536b8f6e2045f9ad74fd9094f.jpg')";
            })

            document.querySelector('#voltarLogin').addEventListener('click', () => {
                esqueciSenha.style.display = 'none'
                document.title = "Login | BECO";
                logForm.style.display = 'flex'
            })
            cadForm.style.transform = "TranslateX(100%)";

            paraCadastro.addEventListener('click', function () {
                document.title = "Cadastro | BECO";
                logForm.style.transform = "TranslateX(100%)";
                cadForm.style.transform = "TranslateX(0%)";
                document.body.style.backgroundImage =
                    "url('https://static.vecteezy.com/system/resources/previews/036/303/474/original/modern-wall-art-with-organic-irregular-geometric-shapes-minimalistic-image-for-creative-design-in-style-retro-vector.jpg')";
            });

            paraLogin.addEventListener('click', function () {
                console.log('clicou no paraLogin')
                document.title = "Login | BECO";
                logForm.style.transform = "TranslateX(0%)";
                cadForm.style.transform = "TranslateX(100%)";
                document.body.style.backgroundImage =
                    "url('https://i.pinimg.com/originals/92/74/5e/92745ee536b8f6e2045f9ad74fd9094f.jpg')";
            });
        });

        // validacao dos forms
        document.getElementById('cdstr__form-container').addEventListener('submit', function (event) {
            const emailCadastro = document.getElementById('email-cad')
            const recaptchaResponse = grecaptcha.getResponse()

            if (!validarEmail(emailCadastro.value)) {
                event.preventDefault()
            }

            if (recaptchaResponse === '') {
                event.preventDefault()
            }
        })

        // cpf 
        document.querySelector("#cpf-cad").addEventListener("blur", function () {
            const cpfValido = validarCPF(this.value)
            if (!cpfValido) {
                this.style.borderBottom = '2px solid red'
            } else if (this.value === '') {
                this.style.borderBottom = '1px solid #e8e8e8'
            } else {
                this.style.borderBottom = '2px solid #1473E6'
            }
        })

        document.querySelector("#cpf-cad").addEventListener("input", function () {
            this.value = aplicarMascaraCPF(this.value)
        })

        // etapas do cadastro
        var proxEtapa = document.querySelector('#proxEtapa')
        var voltarEtapa = document.querySelector('#voltarEtapa')
        var etapa2 = document.querySelector('#etapa2_cadViewPrtCntIndex2')
        var etapa1 = document.querySelector('#etapa1_cadViewPrtCntIndex1')

        mostrarModal()
        const usernameAlert = document.getElementById('username-match');
        const emailAlert = document.getElementById('email-match');
        const cpfAlert = document.getElementById('cpf-match');
        document.getElementById('email-cad').addEventListener('blur', function () {
            if (this.value.trim() === '' && !validarEmail(this.value.trim())) {
                emailAlert.style.display = 'block'
                this.style.borderBottom = '2px solid red'
            } else {
                emailAlert.style.display = 'none'
                this.style.borderBottom = '1px solid #e8e8e8'
            }
        })
        document.getElementById('cpf-cad').addEventListener('blur', function () {
            if (this.value.trim() === '' && !validarCPF(this.value.trim())) {
                cpfAlert.style.display = 'block'
                this.style.borderBottom = '2px solid red'
            } else {
                cpfAlert.style.display = 'none'
                this.style.borderBottom = '1px solid #e8e8e8'
            }
        })

        document.querySelector("#user-cad").addEventListener("blur", function () {
            const usr = this.value.trim();
            const alert = document.querySelector("#username-match");

            if (usr === '') {
                this.style.borderBottom = '2px solid red';
                alert.innerText = '*Username não pode estar vazio';
                alert.style.display = 'block';
            } else if (!usr.startsWith("@")) {
                this.style.borderBottom = '2px solid red';
                alert.innerText = '*O username deve começar com "@"';
                alert.style.display = 'block';
            } else if (vldUnd(usr)) {
                this.style.borderBottom = '1px solid #e8e8e8';
                alert.style.display = 'none';

            } else if (usr == '@') {
                this.style.borderBottom = '2px solid red';
                alert.innerText = '*username inválido';
                alert.style.display = 'block';
            } else if (vldPnt(usr) && !vldUnd(usr)) {
                this.style.borderBottom = '2px solid red';
                alert.innerText = '*O username não pode começar ou terminar com "."';
                alert.style.display = 'block';
            } else if (vldPntA(usr)) {
                this.style.borderBottom = '2px solid red';
                alert.innerText = '*Não pode haver "." após o "@"';
                alert.style.display = 'block';
            } else if (!vldCrt(usr)) {
                this.style.borderBottom = '2px solid red';
                if(window.innerWidth < 750){
                    alert.innerText = '*Os caracteres especiais permitidos são "_" e "."';
                }else{
                    alert.innerText = '*O username só pode conter letras, números, "_" e "."';
                }
                alert.style.display = 'block';
            } else {
                this.style.borderBottom = '1px solid #e8e8e8';
                alert.style.display = 'none';
            }
        })
        proxEtapa.addEventListener('click', function (event) {
            const nomeUsuario = document.getElementById('user-cad')
            const emailCadastro = document.getElementById('email-cad')
            const cpfCad = document.getElementById('cpf-cad')

            let formValid = true
            if (!nomeUsuario.value.trim()) {
                nomeUsuario.style.borderBottom = '2px solid red'
                usernameAlert.style.display = 'block'
                formValid = false
            } else {
                nomeUsuario.style.borderBottom = '1px solid #e8e8e8'
                usernameAlert.style.display = 'none'
            }
            if (!validarEmail(emailCadastro.value.trim())) {
                emailCadastro.style.borderBottom = '2px solid red'
                emailAlert.style.display = 'block'
                formValid = false
            } else {
                emailCadastro.style.borderBottom = '1px solid #e8e8e8'
                emailAlert.style.display = 'none'
            }
            if (!cpfCad.value.trim() || !validarCPF(cpfCad.value.trim())) {
                cpfCad.style.borderBottom = '2px solid red'
                cpfAlert.style.display = 'block'
                formValid = false
            } else {
                cpfAlert.style.display = 'none'
                cpfCad.style.borderBottom = '1px solid #e8e8e8'
            }
            if (!formValid) {
                event.preventDefault()
                return false
            }
            etapa1.style.display = 'none'
            etapa2.style.display = 'flex'
        })
        document.querySelector('#cadastrarBTN').addEventListener('click', () => {
            document.getElementById('cdstr__form-container').submit()
        })

        function adicionarEventoDeBorda() {
            const inputs = document.querySelectorAll('#etapa1_cadViewPrtCntIndex1 input')

            inputs.forEach(input => {
                input.addEventListener('focus', function () {
                    const alertSpan = this.closest('.input-container').querySelector('.alerta_inptRED');
                    if (this.value.trim() === '') {
                        this.style.borderBottom = '2px solid red';
                        alertSpan.style.display = 'block';
                    } else if (this.id === 'email-cad' && !validarEmail(this.value.trim())) {
                        this.style.borderBottom = '2px solid red';
                        alertSpan.style.display = 'block';
                    } else if (this.id === 'cpf-cad' && !validarCPF(this.value.trim())) {
                        this.style.borderBottom = '2px solid red';
                        alertSpan.style.display = 'block';
                    } else {
                        this.style.borderBottom = '2px solid #1473E6';
                        alertSpan.style.display = 'none';
                    }
                });

                input.addEventListener('blur', function () {
                    const alertSpan = this.closest('.input-container').querySelector('.alerta_inptRED');
                    if (this.value.trim() === '') {
                        this.style.borderBottom = '2px solid red';
                        alertSpan.style.display = 'block';
                    } else if (this.id === 'email-cad' && !validarEmail(this.value.trim())) {
                        this.style.borderBottom = '2px solid red';
                        alertSpan.style.display = 'block';
                    } else if (this.id === 'cpf-cad' && !validarCPF(this.value.trim())) {
                        this.style.borderBottom = '2px solid red';
                        alertSpan.style.display = 'block';
                    } else {
                        this.style.borderBottom = '1px solid #e8e8e8';
                        alertSpan.style.display = 'none';
                    }
                });
            })
        }

        // Inicializa os eventos ao carregar a página
        document.addEventListener('DOMContentLoaded', adicionarEventoDeBorda)

        voltarEtapa.addEventListener('click', function () {
            etapa2.style.display = 'none'
            etapa1.style.display = 'flex'
        })

        // input do npome de usuario
        document.querySelector('#user-cad').addEventListener('input', function () {
            let value = this.value;

            if (!value.startsWith('@')) {
                value = '@' + value;
            }

            value = value.replace(/\s+/g, '_').replace(/[^a-zA-Z0-9._@]/g, '');
            this.value = value;
        })
        //confirmacao de sennha
        document.querySelector('#senha_inp_conf-cad').addEventListener('input', function () {
            const senhaInput = document.querySelector('#senha_inp-cad');
            const passwordMatchMessage = document.querySelector('#password-match');
            const confBorder = document.querySelector('.formConfirma');

            if (this.value !== senhaInput.value) {
                passwordMatchMessage.style.display = 'block';
                confBorder.style.borderBottom = '2px solid red';
            } else {
                passwordMatchMessage.style.display = 'none';
                confBorder.style.borderBottom = this.value ? '2px solid #1473E6' : '2px solid transparent';
            }
        })

        // signIn do Google
        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            console.log('ID: ' + profile.getId());
            console.log('Name: ' + profile.getName());
            console.log('Image URL: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail());
        }

        function onSuccess(googleUser) {
            console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
        }

        function onFailure(error) {
            console.log(error);
        }

        function renderButton() {
            gapi.signin2.render('my-signin2', {
                'scope': 'profile email',
                'width': 240,
                'height': 50,
                'longtitle': true,
                'theme': 'dark',
                'onsuccess': onSuccess,
                'onfailure': onFailure
            });
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        // Seleciona os elementos do DOM
        var mostrarSenhaV2 = document.querySelector('#mostrarSenhaV2')
        var NmostrarSenhaV2 = document.querySelector('#NmostrarSenhaV2')
        var mostrarSenha = document.querySelector('#mostrarSenha')
        var NmostrarSenha = document.querySelector('#NmostrarSenha')

        var senha_inp = document.querySelector('#senha_inp-cad')
        var senha_inpConf = document.querySelector('#senha_inp_conf-cad')

        NmostrarSenhaV2.style.display = 'none'
        NmostrarSenha.style.display = 'none'

        mostrarSenha.addEventListener('click', () => {
            mostrarSenha.style.display = 'none'
            NmostrarSenha.style.display = 'block'
            senha_inp.type = 'text'
        });

        NmostrarSenha.addEventListener('click', () => {
            NmostrarSenha.style.display = 'none'
            mostrarSenha.style.display = 'block'
            senha_inp.type = 'password'
        });

        mostrarSenhaV2.addEventListener('click', () => {
            console.log('clicou')
            mostrarSenhaV2.style.display = 'none'
            NmostrarSenhaV2.style.display = 'block'
            senha_inpConf.type = 'text'
        });

        NmostrarSenhaV2.addEventListener('click', () => {
            console.log('clicou')

            NmostrarSenhaV2.style.display = 'none'
            mostrarSenhaV2.style.display = 'block'
            senha_inpConf.type = 'password'
        });


        const senhaInput = document.querySelector('#senha_inp-cad')
        const senhaConfInput = document.querySelector('#senha_inp_conf-cad')
        const passwordMatchMessage = document.querySelector('#password-match')
        const confBorder = document.querySelector('.formConfirma')
        senhaConfInput.addEventListener('contextmenu', function (event) {
            event.preventDefault()
        })
        senhaConfInput.addEventListener('paste', function (event) {
            event.preventDefault()
        })
        senhaConfInput.addEventListener('drop', function (event) {
            event.preventDefault()
        })
        senhaConfInput.addEventListener('input', function () {
            if (senhaConfInput.value !== senhaInput.value) {
                passwordMatchMessage.style.display = 'block'
                confBorder.style.borderBottom = '2px solid red';
            } else if (senhaConfInput.value == '') {
                passwordMatchMessage.style.display = 'none'
                confBorder.style.borderBottom = '2px solid transparent';
            } else {
                passwordMatchMessage.style.display = 'none'
                confBorder.style.borderBottom = '2px solid #1473E6';
            }
        })
        //login
        const senha_Inp = document.querySelector('#senha_inp-log')
        const MostrarSen = document.querySelector('#mostrarSenha__login')
        const NMostrarSen = document.querySelector('#NmostrarSenha__login')
        NMostrarSen.style.display = 'none';

        MostrarSen.addEventListener('click', () => {
            MostrarSen.style.display = 'none';
            NMostrarSen.style.display = 'block';
            senha_Inp.type = 'text';
        });

        NMostrarSen.addEventListener('click', () => {
            NMostrarSen.style.display = 'none';
            MostrarSen.style.display = 'block';
            senha_Inp.type = 'password';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if(isset($_REQUEST["erro"])){

        echo "
        
        <script>
Swal.fire({
  title: 'Atenção!',
  text: '".$_REQUEST['erro']."',
  icon: 'error',
  confirmButtonText: 'Ok'
})


        </script>
        
        ";
    }


    if(isset($_REQUEST["success"])){

        echo "
        <script>
Swal.fire({
  title: 'Sucesso!',
  text: '".$_REQUEST['success']."',
  icon: 'success',
  confirmButtonText: 'Ok'
})


        </script>
        
        ";
    }
    
    if (isset($_REQUEST["form_recuperar_resposta"])){
        echo "
        <script>
        mostrarForms('".$_REQUEST["form_recuperar_resposta"]."');
        </script>
        ";
    }
    
    
    
    ?>
</body>

</html>
