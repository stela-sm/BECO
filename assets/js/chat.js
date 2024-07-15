const senChatBtn = document.querySelector(".send") //pega o botão de envio da msg
const input = document.querySelector(".chat-input textarea") //pega o input da msg
const chatbox =document.querySelector(".chatbox")
const pfpO = document.querySelector(".pfp-outgoing").value
const pfpI = document.querySelector(".pfp-incoming").value
let msg;



const createChatLi = (message, className) =>{
    const li = document.createElement("li")
    li.classList.add("chat", className)
    let chatContent = `<p> ${message} </p> <div class="img">
                    <img class="img-src img-outgoing" src="../assets/media/pfp/${pfpO}" alt="">
                </div>
               ` 
    li.innerHTML = chatContent
    return li;
}



const handleChat = () =>{
    msg = input.value.trim() //valor do input
    console.log(msg) //teste
    if(msg.length == 0){ return //se tiver vazio, volta
    }else{
       chatbox.appendChild(createChatLi(msg, "outgoing"));
       input.value = ""
    }

}


senChatBtn.addEventListener("click", handleChat) // ao clicar, chama a função handlechat