const senChatBtn = document.querySelector(".send") //pega o botão de envio da msg
const input = document.querySelector(".chat-input textarea") //pega o input da msg
const chatbox =document.querySelector(".chatbox")
const pfpO = document.querySelector(".pfp-outgoing").value
const pfpI = document.querySelector(".pfp-incoming").value
const id = document.querySelector(".ID_SESSION").value
let msg;





const handleChat = () =>{
    
msg = input.value.trim()
enviarMensagem(1,id,msg)


}


function enviarMensagem(idConversa, idRemetente, textoMensagem) {
  
    console.log(textoMensagem + "ooiiii")
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

}




senChatBtn.addEventListener("click", handleChat) // ao clicar, chama a função handlechat



function checkForGetParameter() {
    var urlParams = new URLSearchParams(window.location.search);
    var roomParam = urlParams.get('room');

    if (roomParam) {
        console.log('Parâmetro room encontrado:', roomParam);
        atualizarChat(roomParam);
        // Aqui você pode adicionar lógica adicional, se necessário
    } else {
        console.log('Nenhum parâmetro room encontrado.');
    }
}

// Verifica a cada 3 segundos (3000 milissegundos)
setInterval(checkForGetParameter, 1000);

// Chama a função imediatamente para verificar na carga inicial da página
checkForGetParameter();
