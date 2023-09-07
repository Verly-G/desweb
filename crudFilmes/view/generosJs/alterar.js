import { exibirMensagem, exibirMensagemErro, fazFetch } from "../utilJs/funcoesUtil.js";
import { generoListarFetch } from "./listar.js";

//Recupera o botão alterar (Também poderíamos usar o form e o evento submit)        
const $btnAlterar = document.querySelector('#alterar');
$btnAlterar.addEventListener('click', function(event){
    event.preventDefault();
    generoAlterarFetch();
    $("#modal-alterar").modal('hide');
});

let generoAlterarFetch = function(){
    let formAlterar = document.querySelector('#form-alterar');
    let genero = {
        "id": formAlterar.querySelector('#id').value,
        "descricao": formAlterar.querySelector('#descricao').value
    };
    fazFetch("../controller/generoAlterar.php","PUT",genero,fcSucessoAlterarGenero,fcErroAlterarGenero);
}

const $btnCancelar = document.querySelector('#cancelar');
$btnCancelar.addEventListener('click',function(){
    if(confirm('Deseja mesmo cancelar a alteração?'))
        window.location.href = "../view/generos.html";
})

function fcSucessoAlterarGenero(respostaJSON){
    exibirMensagem('#msg',respostaJSON.msg,2000);
    generoListarFetch();
}

function fcErroAlterarGenero(respostaJSON){
    exibirMensagemErro('#msg',respostaJSON.msg,2000);
}