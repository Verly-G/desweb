import { exibirMensagem, exibirMensagemErro, fazFetch } from "../utilJs/funcoesUtil.js";
import { usuarioListarFetch } from "./listar.js";

function usuarioExcluirFetch(id){
    if(confirm(`Confirma a exclusão do usuário de id ${id}?`)){
        let usuario = {"id": id};
        fazFetch("../controller/usuarioExcluir.php","DELETE",usuario,fcSucessoExcluirUsuario,fcErroExcluirUsuario);
    }
}

function fcSucessoExcluirUsuario(respostaJSON){
    exibirMensagem('#msg',respostaJSON.msg,2000);
    usuarioListarFetch();
}

function fcErroExcluirUsuario(respostaJSON){
    exibirMensagemErro('#msg',respostaJSON.msg,2000);
}

export {usuarioExcluirFetch};