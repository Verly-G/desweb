import { exibirMensagem,exibirMensagemErro,fazFetch } from "../utilJs/funcoesUtil.js";
import { generoListarFetch } from "./listar.js";

//Recupera o elemento input:submit(Também poderíamos usar o form e o mesmo evento submit)        
const $btnEnviar = document.querySelector('#enviar');
$btnEnviar.addEventListener('click', function(event){
    event.preventDefault();
    generoInserirFetch();
    $("#modal-inserir").modal('hide');
});

let generoInserirFetch = function(){
    let genero = {
        "descricao": document.querySelector('#form-inserir').querySelector('#descricao').value,
    };
    fazFetch("../controller/generoInserir.php","POST",genero,fcSucessoInserirGenero,fcErroInserirGenero);
};

function fcSucessoInserirGenero(respostaJSON){
    exibirMensagem('#msg',respostaJSON.msg,2000);
    generoListarFetch();
}

function fcErroInserirGenero(respostaJSON){
    exibirMensagemErro('#msg',respostaJSON.msg,2000);
}
