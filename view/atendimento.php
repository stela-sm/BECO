<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Atendimento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
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
            --default_borderCardFiltroHover: 2px solid #4398d6;
            --default_background: #f9f9f9;
            --default_backgroundDSAD: #f9f9f9;
            --offwhite: #f0f0f0;
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
            --cardFiltroHover: transparent;
        }

        textarea {
            resize: none;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .character-counter {
            font-size: 0.9rem;
            color: #6c757d;
        }
        .class-submit{
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            max-height: 3rem;
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
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;    display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 1vw;    cursor: pointer;
        }
        .class-reset{
            background-color: transparent;
            border: 1px solid rgb(255 0 0 / 50%) !important;    
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 1vw;
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
            max-height: 3rem;
        }
        .class-reset>*{
            color: rgb(255 0 0 / 50%);
            stroke: rgb(255 0 0 / 50%);
        }
        .class-submit:hover{
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5);
        }
        .class-reset:hover{
            background-color: transparent;
            box-shadow: 0 0 0 .2rem rgb(255 0 0 / 50%);
        }
        .containerButtons{
            display: flex;
            flex-direction: row;
            justify-content: left;
            align-items: center;
            gap: 2vw;
        }
        .col-3.col-lateral > h5{
            width: 100%;
    display: flex;
    padding-left: 0;
    color: #000;
        }
    </style>
</head>
<body>

    <!-- menu -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid navbaraq">
            <a class="navbar-brand" href="#">
                <img src="../assets/media/logo/4.png" style="    width: 46px;">
            </a>
            <button class="btn btn-danger" id="SysLogout__confMenu" onclick="window.close();">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
                <span>Fechar</span>
            </button>
        </div>
    </nav>
    <div class="container my-5" id="formSection">
        <!-- Card pra pessoa sabe q ngm é de ferro -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Atenção!</h5>
                <p class="card-text">O tempo de resposta do atendimento pode variar de acordo com a demanda dos administradores. Pedimos sua compreensão e paciência.</p>
            </div>
        </div>

        <form id="chamadoForm" method="post"action="../controller/controller.php?chamado=1">
            <!-- Input para Nome de Usuario caso ele n esteja logado tendeu-->
            
            <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="username" placeholder="Digite seu email">
            </div>
        

            <div class="mb-3">
                <label for="textareaChamado" class="form-label">Descreva seu problema</label>
                <textarea class="form-control" name="text" id="textareaChamado" rows="4" maxlength="500" placeholder="Descreva seu problema aqui..."></textarea>
                <div class="character-counter" id="charCount">500/500</div>
            </div>
            <div class="containerButtons">
            <button type="submit" class="class-submit btn btn-primary">
                <span>Enviar</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-send-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M4.698 4.034l16.302 7.966l-16.302 7.966a.503 .503 0 0 1 -.546 -.124a.555 .555 0 0 1 -.12 -.568l2.468 -7.274l-2.468 -7.274a.555 .555 0 0 1 .12 -.568a.503 .503 0 0 1 .546 -.124z" />
                    <path d="M6.5 12h14.5" />
                </svg>
            </button>
            <button type="reset" class="class-reset btn btn-danger">
                <span>Apagar</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-x">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if(isset($_REQUEST['finalizado'])){
        echo "
        <script>

 Swal.fire({
                    icon: 'success',
                    title: 'Chamado registrado!',
                    text: 'Muito obrigado, entraremos em contato com você!',
                    confirmButtonText: 'Ok'
                });

                setTimeout(() => {
  swal.close();
  window.close();
}, 3000);
        </script>
        
        
        ";
    }
    
    ?>
   
    <script>
        const textarea = document.getElementById('textareaChamado');
        const charCount = document.getElementById('charCount');

        textarea.addEventListener('input', function() {
            const remaining = 500 - textarea.value.length;
            charCount.textContent = `${remaining}/500`;
        });

        document.getElementById('chamadoForm').addEventListener('submit', function(event) {
            if (textarea.value.trim() === "") {
                event.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Campo vazio!',
                    text: 'Por favor, preencha o campo de descrição do problema.',
                    confirmButtonText: 'Ok'
                });
            }
        });
    </script>

</body>
</html>
