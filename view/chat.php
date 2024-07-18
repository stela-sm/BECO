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

    <title>Chat</title>
</head>
<body>



<?php

session_start();
echo "<input type=\"hidden\" name=\"\" class=\"ID_SESSION\" value='".$_SESSION["ADM_ID"]."'>";
echo "<input type=\"hidden\" name=\"\" class=\"pfp-outgoing\" value='".$_SESSION["ADM_PFP"]."'>";
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
                            if (mensagem.id_remetente == <?php echo $_SESSION["ADM_ID"]; ?>) {
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
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Erro na requisição:', error);
                    }
                });
            }

     
    </script>


        </ul>
        <div class="chat-input">
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
</body>
</html>