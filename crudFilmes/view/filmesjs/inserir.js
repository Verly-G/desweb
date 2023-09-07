import { exibirMensagemErro, exibirMensagem, fazFetch } from "../utilJs/funcoesUtil.js";
import { filmeListarFetch } from "./listar.js";

//Recupera o elemento (Também poderíamos usar o form e o evento submit)        
const $btnEnviar = document.querySelector('#enviar');
$btnEnviar.addEventListener('click', function(event){
    event.preventDefault();    
    filmeInserirFetch();
    $("#modal-inserir").modal('hide');
})

//Carregando os generos no combo 
let filmeListarGeneroInserirFetch = function(){
    fazFetch("../controller/generoListar.php","GET",null,fcSucessoListarGeneroInserir,fcErroListarGeneroInserir);
};
//funções que poderiam ser de callback p/ listar os gêneros no select do form
function fcSucessoListarGeneroInserir(respostaJSON){
    montarSelect(respostaJSON.dados);
}
function fcErroListarGeneroInserir(respostaJSON){
    exibirMensagemErro('#msg',respostaJSON.msg,2000);
}
//Monta o select de gêneros
function montarSelect(dados){
    //Limpa o select
    document.querySelector('#cmbGeneros').innerHTML="";
    //Preenche o select com os generos recebidos (dados)
    for (const i in dados) {
        let genero = dados[i];
        let opt = document.createElement('option');
        opt.value= genero.id;
        opt.textContent = genero.descricao;
        document.querySelector('#cmbGeneros').appendChild(opt);
    }
}

//fetch enviando o filme a ser inserido
let filmeInserirFetch = function(){
    //Monta um objeto filme recuperando os elementos do DOM
    let filme = {
        "titulo": document.querySelector('#titulo').value,
        "avaliacao" : parseFloat(document.querySelector('#avaliacao').value),
        "genero_id" : parseInt(document.querySelector('#cmbGeneros').value)
    };
    fazFetch("../controller/filmeInserir.php","POST",filme,fcSucessoInserirFilme,fcErroInserirFilme);
};

function fcSucessoInserirFilme(respostaJSON){
    exibirMensagem('#msg',respostaJSON.msg,2000);
    filmeListarFetch();
}

function fcErroInserirFilme(respostaJSON){
    exibirMensagemErro('#msg',respostaJSON.msg,2000);
}

export {filmeListarGeneroInserirFetch}

