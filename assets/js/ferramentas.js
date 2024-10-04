function updateHiddenInput() {
    const code = inputElements.map(({
        value
    }) => value).join('')
    hiddenInput.value = code;
    if (code.length === inputElements.length) {
        formElement.submit()
    }
}

function onSubmit(e) {
    e.preventDefault()
}
document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('a.link[ajudaCenter="ligado"]');
    links.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            window.open('view/atendimento.php', '_blank',
                "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=800,width=431,height=585"
            )
        })
    })
})
// validacoes e etc
function validarEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    return emailPattern.test(email)
}

function vldCrt(username) { //aq é pra limitar os caracteres
    const r = /^[a-zA-Z0-9]+([._][a-zA-Z0-9]+)*$/;
    return r.test(username.slice(1));
}

function vldPnt(username) {
    const p = username.slice(1);
    return p.startsWith(".") || p.endsWith(".");
}

// vê se tem . dps do arroba inicial, tb n pode
function vldPntA(username) {
    return username.slice(1).includes(".");
}
//aq vê se tem _ no começo/fim pq pode pq eu quero
function vldUnd(username) {
    const p = username.slice(1);
    return (p.startsWith("_") || p.endsWith("_"));
}

// aq v^e tudo, usa todas as funções que fazem a mema coisa só q eu n sei faze tudo junto, tmj
function vldUsr(username) {
    const p = username.slice(1);
    return username.startsWith("@") && (vldUnd(username) || !vldPnt(username)) && !vldPntA(username) && vldCrt(
        username);
}

function aplicarMascaraCPF(cpf) {
    cpf = cpf.replace(/\D/g, "");
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
    return cpf;
}
function tPassAst(pass) {
    const senha = pass;
    const output = document.querySelector('#senha_output')
    if (output && senha) {
        output.value = '*'.repeat(senha.length);  
    }
}
function aplicarAsteriscosCPF(cpf) {
    let cpfFormatado = aplicarMascaraCPF(cpf);
    cpfFormatado = cpfFormatado.replace(/^(\d{3})\.\d{3}\.\d{3}-(\d{2})$/, "$1.***.***-$2");
    return cpfFormatado;
}

function validarCPF(cpf) {
    cpf = cpf.replace(/\D/g, '');
    if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) {
        return false;
    }
    let soma = 0,
        resto;
    for (let i = 1; i <= 9; i++) {
        soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
    }
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) return false;
    soma = 0;
    for (let i = 1; i <= 10; i++) {
        soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
    }
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    return resto === parseInt(cpf.substring(10, 11));
}



