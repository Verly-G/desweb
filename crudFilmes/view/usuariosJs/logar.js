import { exibirMensagemErro, fazFetch } from "../utilJs/funcoesUtil.js";
const formLogin = document.querySelector("#form-login");
formLogin.addEventListener('submit',function(event){
    event.preventDefault();
    usuarioLogarFetch();
    $("#modal-login").modal({backdrop: 'static'});
    $("#modal-login").modal('hide');
});

let usuarioLogarFetch = function(){
    let usuario = {
        "login":document.querySelector("#login").value,
        "senha":document.querySelector("#senha").value
    };
    fazFetch("../controller/usuarioLogar.php","POST",usuario,fcSucessoLogarUsuario,fcErroLogarUsuario);
}

function fcSucessoLogarUsuario(respostaJSON){
    console.log(respostaJSON.dados[0])
}

function fcErroLogarUsuario(erro){
    exibirMensagemErro('#msg',erro);
    setTimeout(function(){
        document.querySelector('#msg').textContent="";
    },1500);
    window.location.href = "../view/index.html";
}