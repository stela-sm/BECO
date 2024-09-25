<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/chat.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../assets/js/texto_audio.js"></script>

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
    <title>Chat</title>
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
    </script>
        <script src="../assets/js/font.js"></script>
<script>
/*        document.addEventListener('DOMContentLoaded', function() {
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
})  */

</script>
</head>
<body style="background-color: var(--sidebar-color)">



<?php

session_start();
echo "<input type=\"hidden\" name=\"\" class=\"ID_SESSION\" value='".$_SESSION["USER_ID"]."'>";
echo "<input type=\"hidden\" name=\"\" class=\"pfp-outgoing\" value='".$_SESSION["USER_PFP"]."'>";
if(isset($_REQUEST["new"])){
    
echo "<input type=\"hidden\" name=\"\" class=\"ID_NEW\" value='".$_REQUEST["new"]."'>";
}
if(isset($_REQUEST["room"])){
echo "<input type=\"hidden\" name=\"\" class=\"ID_CONV\" value='".$_REQUEST["room"]."'>";
echo "<input type=\"hidden\" name=\"\" class=\"pfp-incoming\" value='".$_REQUEST["pfp"]."'>";

?>

    <input type="hidden" name="" class="" value="nopfp.png">
    
    <input type="hidden" name="" class="pfp-incoming" value="nopfp.png">
    <div class=" chat">
        <header>
            <h5>Chat</h5>
            <br><br><br><br><br><br>
        </header>
        <ul class="chatbox">
        
<script>
  

            function atualizarChat(idConvo, imgO, imgI) {
                console.log(idConvo, imgO, imgI)
                $.ajax({
                    url: '../controller/controller_chat.php?select=1',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        id_conversa: idConvo 
                    },
                    success: function(response) {
                        var chatList = $('.chatbox');
                        chatList.empty();
                        for (var i = 0; i <= response.number; i++) {
                            var mensagem = response[i];
                            /* console.log(response) */
                            if(mensagem.texto_mensagem != false){
                            if (mensagem.id_remetente == <?php echo $_SESSION["USER_ID"]; ?>) {
                              
                                chatList.append(
                                    "<li class='chat outgoing'>" +
                                        "<p>" + mensagem.texto_mensagem + "</p>" +
                                        "<div class='img'>" +
                                            "<img class='img-src img-outgoing' src='../assets/media/pfp/"+imgO+"' alt=''>" +
                                        "</div>" +
                                    "</li>"
                                );
                            } else {
                                chatList.append(
                                    "<li class='chat incoming'>" +
                                        "<div class='img '>" +
                                            "<img class='img-src img-incoming' src='../assets/media/pfp/"+imgI+"' alt=''>" +
                                        "</div>" +
                                        "<p>" + mensagem.texto_mensagem + "</p>" +
                                    "</li>"
                                );
                            }}else if(mensagem.texto_mensagem == false){
                                if (mensagem.id_remetente == <?php echo $_SESSION["USER_ID"]; ?>) {
                              
                              chatList.append(
                                  "<li class='chat file outgoing'>"+
    
"<p>"+
"<a href='../assets/media/chat/"+mensagem.file+"' style='color:white !important;' download='"+mensagem.file+"'>"+
"<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-file-download' width='24' height='24' viewBox='0 0 24 24' stroke-width='1.5' stroke='white' fill='none' stroke-linecap='round' stroke-linejoin='round'>"+
  "<path stroke='none' d='M0 0h24v24H0z' fill='none'/>"+
  "<path d='M14 3v4a1 1 0 0 0 1 1h4' />"+
  "<path d='M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z' />"+
  "<path d='M12 17v-6' />"+
  "<path d='M9.5 14.5l2.5 2.5l2.5 -2.5' />"
+"</svg> "+
    mensagem.file
+ "</p>"+
"<div class='img'>" +
                                            "<img class='img-src img-outgoing' src='../assets/media/pfp/"+imgO+"' alt=''>" +
                                        "</div>" +
"</a>"+
       "</li>"
                              );
                          } else {
                              chatList.append(
                                "<li class='chat file incoming'>"+
    
    "<p>"+
    "<a href='../assets/media/chat/"+mensagem.file+"' style='color:white !important;' download='"+mensagem.file+"'>"+
    "<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-file-download' width='24' height='24' viewBox='0 0 24 24' stroke-width='1.5' stroke='white' fill='none' stroke-linecap='round' stroke-linejoin='round'>"+
      "<path stroke='none' d='M0 0h24v24H0z' fill='none'/>"+
      "<path d='M14 3v4a1 1 0 0 0 1 1h4' />"+
      "<path d='M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z' />"+
      "<path d='M12 17v-6' />"+
      "<path d='M9.5 14.5l2.5 2.5l2.5 -2.5' />"
    +"</svg> "+
        mensagem.file
    + "</p>"+
    "<div class='img'>" +
                                                "<img class='img-src img-outgoing' src='../assets/media/pfp/"+imgI+"' alt=''>" +
                                            "</div>" +
    "</a>"+
           "</li>"
                              );
                          }
                            }
                        }
                        

                    },
                    error: function(xhr, status, error) {
                        console.error('Erro na requisição:', error);
                    }
                });
            }

            function arquivoInput() {
      document.getElementById('arquivoInput').click();
    }
    </script>


        </ul>
        
        <div class="chat-input">
        
        <div class="atached" style="align-self:center;">
            <input type="file" name="arquivo" style="display:none;" id="arquivoInput">
        <svg class="inputArquivo" xmlns="http://www.w3.org/2000/svg" onclick="arquivoInput()" style="margin-right:10px;" width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-paperclip"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5" /></svg>
        </div>
            <textarea name="" id="" class="msg" placeholder="Digite uma mensagem..."></textarea>
            <div class="send">
            
            <svg xmlns="http://www.w3.org/2000/svg" class=" icon icon-tabler icon-tabler-send-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M4.698 4.034l16.302 7.966l-16.302 7.966a.503 .503 0 0 1 -.546 -.124a.555 .555 0 0 1 -.12 -.568l2.468 -7.274l-2.468 -7.274a.555 .555 0 0 1 .12 -.568a.503 .503 0 0 1 .546 -.124z" />
      <path d="M6.5 12h14.5" />
    </svg>
            </div>
        </div>
      
    </div>
        <?php } else{
            
         ?>

<div class="container-flex">
    <p class="frase">
        Selecione uma conversa ao lado
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mood-wink" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
  <path d="M15 10h.01" />
  <path d="M9.5 15a3.5 3.5 0 0 0 5 0" />
  <path d="M8.5 8.5l1.5 1.5l-1.5 1.5" />
</svg>
    </p>
</div>

<?php
            

        }?>
    <script  src="../assets/js/chat.js"></script>
    <script>



const idRemetente = document.querySelector(".ID_SESSION").value

const idConversa = document.querySelector(".ID_CONV").value

function uploadFile(file, idConversa, idRemetente) {
    var formData = new FormData();
    formData.append('arquivo', file);
    formData.append('id_conversa', idConversa); // Adiciona o parâmetro id_conversa ao FormData
    formData.append('id_remetente', idRemetente); // Adiciona o parâmetro id_remetente ao FormData

    $.ajax({
        url: '../controller/controller_chat.php?inserir_file=1', // URL para onde o arquivo será enviado
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log('Arquivo enviado com sucesso:', response);
            // Faça algo com a resposta aqui
        },
        error: function(xhr, status, error) {
            console.error('Erro ao enviar o arquivo:', status, error);
        }
    });
}

    // Adiciona um listener para o evento 'change' no input file
    document.getElementById('arquivoInput').addEventListener('change', function(event) {
        console.log("AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA")
      var file = event.target.files[0]; // Obtém o arquivo selecionado
      if (file) {
        uploadFile(file, idConversa,idRemetente); // Chama a função AJAX para enviar o arquivo
      }
    });
    </script>
</body>
</html>
