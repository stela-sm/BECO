const senChatBtn = document.querySelector(".send") //pega o botão de envio da msg
const input = document.querySelector(".chat-input textarea") //pega o input da msg
const chatbox =document.querySelector(".chatbox")
const pfpO = document.querySelector(".pfp-outgoing").value
const pfpI = document.querySelector(".pfp-incoming").value
const idsession = document.querySelector(".ID_SESSION").value
const idconv = document.querySelector(".ID_CONV").value
let msg;





const scrollToBottom = () =>{
    window.scrollTo(0, document.body.scrollHeight);
    
}




const handleChat = () =>{
    
msg = input.value.trim()
enviarMensagem(idconv,idsession,msg)


}


function enviarMensagem(idConversa, idRemetente, textoMensagem) {
    
    $.ajax({
        url: '../controller/controller_chat.php?inserir=1',
        method: 'POST',
        data: {
            id_conversa: idConversa,
            id_remetente: idRemetente,
            texto_mensagem: textoMensagem
        },
        error: function(xhr, status, error) {
            alert('Erro na requisição: ' + error);
        }
    });
    scrollToBottom()
}




senChatBtn.addEventListener("click", handleChat) // ao clicar, chama a função handlechat



function inserirConversa(idUser1, idUser2, pfp) {
    $.ajax({
        url: '../controller/controller_chat.php?inserir_conv=1',
        method: 'POST',
        dataType: 'json',
        data: {
            id_user1: idUser1,
            id_user2: idUser2
        },
        success: function(response) {
            if (response.result === 1) {
                var room = response.room.room; 
                
                var url = 'chat.php?room=' + encodeURIComponent(room) + "&pfp=" + encodeURIComponent(pfp);


                
                window.location.href = url;

            } else {
                console.error('Erro ao inserir conversa:', response.error);
            }
        },
        error: function(xhr, status, error) {
            console.error('Erro na requisição AJAX:', error);
        }
    });
}





function checkForGetParameter() {
    var urlParams = new URLSearchParams(window.location.search);
    var roomParam = urlParams.get('room');
    var pfpParam = urlParams.get('pfp');

    if (!isNaN(roomParam)) {
        atualizarChat(roomParam, pfpO, pfpI);
        scrollToBottom()
        
    } else {
        
        var idnew = document.querySelector(".ID_NEW").value
        inserirConversa(idsession, idnew, pfpParam);
        
        
    }
}



// window.onload = function() {
//     scrollToBottom();
// };

 setInterval(checkForGetParameter, 100);
 setInterval(scrollToBottom, 100);
checkForGetParameter();
