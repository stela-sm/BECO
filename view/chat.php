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

    <title>Chat</title>
</head>
<body>



<?php
session_start();
require "../model/manager.class.php";
$manager = new Manager();
$r = $manager-> showMessages("1");


var_dump($r);

?>

    <input type="hidden" name="" class="pfp-outgoing" value="nopfp.png">
    <input type="hidden" name="" class="pfp-incoming" value="nopfp.png">
    <div class=" col-8 chat">
        <header>
            <h5>@somuch</h5>
        </header>
        <ul class="chatbox">

<?php
        for($i=0;$i<=$r["number"];$i++){
    if($r[$i]["id_remetente"]==$_SESSION["ADM_ID"]){
        
        echo "
            <li class='chat outgoing'>
            <p>".$r[$i]["texto_mensagem"]."</p>
            <div class='img'>
                    <img class='img-src img-outgoing' src='../assets/media/pfp/nopfp.png' alt=''>
                </div>
               
            </li>";
    }else{
        echo "<li class='chat incoming'>
        <div class='img '>
            <img class='img-src img-incoming' src='../assets/media/pfp/nopfp.png' alt=''>
        </div>
          <p>".$r[$i]["texto_mensagem"]."</p>
    </li>";

    }
}

?>
            <li class="chat incoming">
                <div class="img ">
                    <img class="img-src img-incoming " src="../assets/media/pfp/nopfp.png" alt="">
                </div>
                <p>Hi there, how can i help you?</p>
            </li>

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
   
    <script  src="../assets/js/chat.js"></script>
</body>
</html>