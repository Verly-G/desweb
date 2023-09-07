import { exibirMensagem, exibirMensagemErro, fazFetch } from "../utilJs/funcoesUtil.js";
import { filmeListarFetch } from "./listar.js";

function filmeExcluirFetch(id){
    if(confirm(`Confirma a exclusão do filme de id ${id}?`)){ 
        let filme = {"id": id};
        fazFetch("../controller/filmeExcluir.php","DELETE",filme,fcSucessoExcluirFilme,fcErroExcluirFilme);
    }
}

function fcSucessoExcluirFilme(respostaJSON){
    exibirMensagem('#msg',respostaJSON.msg,2000);
    filmeListarFetch();
}

function fcErroExcluirFilme(respostaJSON){
    exibirMensagemErro('#msg',respostaJSON.msg,2000);
}

export {filmeExcluirFetch}
