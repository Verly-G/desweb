import { exibirMensagemErro, fazFetch } from "../utilJs/funcoesUtil.js";
function usuarioBuscarFetch(id){  
    //fetch enviando o id do usuario a ser recuperado
    fazFetch("../controller/usuarioBuscar.php?id="+id+"","GET",null,fcSucessoBuscarUsuario,fcErroBuscarUsuario);
}

function fcSucessoBuscarUsuario(respostaJSON){
    $("#modal-alterar").modal({backdrop: 'static'});
	$("#modal-alterar").modal('show');
    let formAlterar = document.querySelector('#form-alterar');
    let usuario = respostaJSON.dados;
    formAlterar.querySelector('#id').value = usuario.id;
    formAlterar.querySelector('#nome').value = usuario.nome;
}

function fcErroBuscarUsuario(respostaJSON){
    exibirMensagemErro('#msg',respostaJSON.msg,2000);
}

export {usuarioBuscarFetch};