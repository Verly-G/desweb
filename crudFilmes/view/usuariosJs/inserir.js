import { exibirMensagem, exibirMensagemErro,fazFetch } from "../utilJs/funcoesUtil.js";
import { usuarioListarFetch } from "./listar.js";

//Recupera o elemento input:submit(Também poderíamos usar o form e o mesmo evento submit)        
const $btnEnviar = document.querySelector('#enviar');
$btnEnviar.addEventListener('click', function(event){
    event.preventDefault();
    usuarioInserirFetch();
    $("#modal-inserir").modal('hide');
});

let usuarioInserirFetch = function(){
    let usuario = {
        "nome": document.querySelector('#form-inserir').querySelector('#nome').value,
        "login": document.querySelector('#form-inserir').querySelector('#login').value,
        "senha": document.querySelector('#form-inserir').querySelector('#senha').value
    };
    fazFetch("../controller/usuarioInserir.php","POST",usuario,fcSucessoInserirUsuario,fcErroInserirUsuario);
};

function fcSucessoInserirUsuario(respostaJSON){
    exibirMensagem('#msg',respostaJSON.msg,2000);
    usuarioListarFetch();
}

function fcErroInserirUsuario(respostaJSON){
    exibirMensagemErro('#msg',respostaJSON.msg,2000);
}
