<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/conversas.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Chat</title>
</head>
<body>
    <div class="row-all">
    <div class="col-9">
        <iframe src="chat.php" frameborder="0" name="iframe_chat" class="iframe-chat" height="100%"></iframe>
    </div>
    <div class="col-3 col-lateral">
        <h5>Conversas</h5>
        <div class="searchbar-div">
            <form action="">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="#707070" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
              </svg>
            <input type="text" name="" id="" class="searchbar" placeholder="Pesquise...">        
            </div>
            </form>
            <div class="lista-conversas">
                <ul class="ul-conversa" id='ul-conversa'>
                    <?PHP
                    session_start();
                 
?>

<script>
 function searchConversations(query) {
            $.ajax({
                url: '../controller/controller_chat.php',
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
                                var listItem = '<li class="li-conversa"><a href="chat.php?room=new&pfp=' + conversa.pfp + '&new=' + conversa.ID_ADM + '" target="iframe_chat" class="a-conversa">' +
                                    '<div class="img-pfp">' +
                                    '<img src="../assets/media/pfp/' + conversa.pfp + '" alt="">' +
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
    //console.log('CHAMOU')
            $.ajax({
                url: '../controller/controller_chat.php?conversas=1',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    //console.log(response)
                    var chatList = $('.ul-conversa');
                    chatList.empty();
                    // Itera sobre as propriedades numéricas da resposta
                    Object.keys(response).forEach(function(key) {
                        // Verifica se a chave é um número e não é "result"
                        if (!isNaN(key)) {
                            var conversa = response[key];
                            var listItem = '<li class="li-conversa" onclick="list()" ><a href="chat.php?room=' + conversa.id_conversa + '&pfp=' + conversa.pfp2 + '" target="iframe_chat" class="a-conversa">' +
                                '<div class="img-pfp">' +
                                '<img src="../assets/media/pfp/' + conversa.pfp2 + '" alt="" srcset="">' +
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
                    // console.error('Erro na requisição:', error);
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




                           
                </ul>
            </div>
    </div>
    </div>

    <script src="../assets/js/conversas.js"></script>
</body>
</html>