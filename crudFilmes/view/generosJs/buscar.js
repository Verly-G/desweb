import { exibirMensagemErro,fazFetch } from "../utilJs/funcoesUtil.js";
//Ao carregar a página
/*window.onload = function(){
    //Pegue o parâmetro id contido na query string da url
    let qs = window.location.search.replace('?','');
    let parametrosBuscar = qs.split('=');
    let id = parametrosBuscar[1];
    generoBuscarFetch(id);   
}*/
function generoBuscarFetch(id){  
    //fetch enviando o id do genero a ser recuperado
    fazFetch("../controller/generoBuscar.php?id="+id+"","GET",null,fcSucessoBuscarGenero,fcErroBuscarGenero);
}

function fcSucessoBuscarGenero(respostaJSON){
    $("#modal-alterar").modal({backdrop: 'static'});
	$("#modal-alterar").modal('show');
    let formAlterar = document.querySelector('#form-alterar');
    let genero = respostaJSON.dados;
    formAlterar.querySelector('#id').value = genero.id;
    formAlterar.querySelector('#descricao').value = genero.descricao;
}

function fcErroBuscarGenero(respostaJSON){
    exibirMensagemErro('#msg',respostaJSON.msg,2000);
}

export {generoBuscarFetch};


