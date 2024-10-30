const chat = document.querySelector("#btnChat")
const notificacoes = document.querySelector("#btnNotifacoes")
const teste = document.querySelector('#btnTeste')
const esqueceusenha = document.querySelector('#esqueSenha')

chat.addEventListener("click",emDesenvolvimento)
notificacoes.addEventListener("click",emDesenvolvimento)
teste.addEventListener("click",emDesenvolvimento)
esqueceusenha.addEventListener("click",emDesenvolvimento)


function emDesenvolvimento(){
    alert("Funcão em desenvolvimento")
    console.log("teste")
}



