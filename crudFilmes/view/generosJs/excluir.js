import { exibirMensagem, exibirMensagemErro, fazFetch } from "../utilJs/funcoesUtil.js";
import { generoListarFetch } from "./listar.js";

function generoExcluirFetch(id){    
    if(confirm(`Confirma a exclusão do genero de id ${id}?`)){ 
        let genero = {"id": id};
        fazFetch("../controller/generoExcluir.php","DELETE",genero,fcSucessoExcluirGenero,fcErroExcluirGenero);
    }
}

function fcSucessoExcluirGenero(respostaJSON){
    exibirMensagem('#msg',respostaJSON.msg,2000);
    generoListarFetch();
}

function fcErroExcluirGenero(respostaJSON){
    exibirMensagemErro('#msg',respostaJSON.msg,2000);
}

export {generoExcluirFetch};
