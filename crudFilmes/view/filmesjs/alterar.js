import { exibirMensagem, exibirMensagemErro, fazFetch } from "../utilJs/funcoesUtil.js";
import { filmeListarFetch } from "./listar.js";
//Recupera o botão alterar (Também poderíamos usar o form e o evento submit)        
const $btnAlterar = document.querySelector('#alterar');
$btnAlterar.addEventListener('click', function(event){
    event.preventDefault();
    filmeAlterarFetch();
    $("#modal-alterar").modal('hide');
});

let filmeAlterarFetch = function(){
    let formAlterar = document.querySelector('#form-alterar');
    let filme = {
        "id": formAlterar.querySelector('#id').value,"titulo": formAlterar.querySelector('#titulo').value,
        "avaliacao" : parseFloat(formAlterar.querySelector('#avaliacao').value),
        "genero_id" : parseInt(formAlterar.querySelector('#cmbGeneros').value)
    };
    fazFetch("../controller/filmeAlterar.php","PUT",filme, fcSucessoAlterarFilme, fcErroAlterarFilme);
};

const $btnCancelar = document.querySelector('#cancelar');
$btnCancelar.addEventListener('click',function(){
    if(confirm('Deseja mesmo cancelar a alteração?'))
        window.location.href = "../view/filmes.html";
})

function fcSucessoAlterarFilme(respostaJSON){
    exibirMensagem('#msg',respostaJSON.msg,2000);
    filmeListarFetch();
}

function fcErroAlterarFilme(respostaJSON){
    exibirMensagemErro('#msg',respostaJSON.msg,2000);
}