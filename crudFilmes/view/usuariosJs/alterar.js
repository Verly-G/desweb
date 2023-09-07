import { exibirMensagem,exibirMensagemErro, fazFetch } from "../utilJs/funcoesUtil.js";
import { usuarioListarFetch } from "./listar.js";

//Recupera o botão alterar (Também poderíamos usar o form e o evento submit)        
const $btnAlterar = document.querySelector('#alterar');
$btnAlterar.addEventListener('click', function(event){
    event.preventDefault();
    usuarioAlterarFetch();
    $("#modal-alterar").modal('hide');
});

let usuarioAlterarFetch = function(){
    let formAlterar = document.querySelector('#form-alterar');
    let usuario = {
        "id": formAlterar.querySelector('#id').value,
        "nome": formAlterar.querySelector('#nome').value
    };
    fazFetch("../controller/usuarioAlterar.php","PUT",usuario,fcSucessoAlterarUsuario,fcErroAlterarUsuario);
}

const $btnCancelar = document.querySelector('#cancelar');
$btnCancelar.addEventListener('click',function(){
    if(confirm('Deseja mesmo cancelar a alteração?'))
        window.location.href = "../view/usuarios.html";
})

function fcSucessoAlterarUsuario(respostaJSON){
    exibirMensagem('#msg',respostaJSON.msg,2000);
    usuarioListarFetch();
}

function fcErroAlterarUsuario(respostaJSON){
    exibirMensagemErro('#msg',respostaJSON.msg,2000);
}