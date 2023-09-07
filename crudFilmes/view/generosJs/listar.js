import { exibirMensagemErro, fazFetch } from "../utilJs/funcoesUtil.js";
import { generoExcluirFetch } from "./excluir.js";
import { generoBuscarFetch } from "./buscar.js";

document.querySelector("#btn-novo").addEventListener('click',()=>{
    $("#modal-inserir").modal({backdrop: 'static'});
    $("#modal-inserir").modal('show');
});
document.querySelector("#btn-home").addEventListener('click',()=> 
    window.location.href = "index.html");
document.querySelector("#btn-fechar-inserir").addEventListener('click',()=>
    $("#modal-inserir").modal('hide'));
document.querySelector("#btn-fechar-alterar").addEventListener('click',()=>
    $("#modal-alterar").modal('hide'));

window.onload = ()=>{
    generoListarFetch();
}

let generoListarFetch = function(){
    document.querySelector('tbody').innerHTML=""; 
    fazFetch("../controller/generoListar.php","GET",null,fcSucessoListarGenero,fcErroListarGenero);
};

function fcSucessoListarGenero(respostaJSON){
    montarTabela(respostaJSON.dados);
}
function fcErroListarGenero(erro){
    exibirMensagemErro('#msg',erro,2000);
}

function montarTabela(dados){
    const corpoTabela=document.querySelector('tbody');
    for (const i in dados) {
        let genero = dados[i];
        const tr = document.createElement('tr');
        pendurarColunas(tr,genero);
        corpoTabela.appendChild(tr);
    }//Fim do for in
}//Fim da função

function pendurarColunas(noPai,objeto){
    //const[td1,td2,td3] = ['td','td','td'].map(td=>document.createElement(td));
    const td1 = document.createElement('td');
    const td2 = document.createElement('td');
    const td3 = document.createElement('td');
    td1.textContent=objeto.id;
    td2.textContent=objeto.descricao;
    /*const[aEditar,aExcluir] = ['a','a'].map(a=>{
        let link = document.createElement(a);
        link.setAttribute('href','#');
        return link;
    });*/
    let aEditar = document.createElement('a');
    aEditar.setAttribute('href','#');
    aEditar.textContent="[Editar]";
    aEditar.classList.add('editar');
    let aExcluir = document.createElement('a');
    aExcluir.setAttribute('href','#');
    aExcluir.textContent="[Excluir]";
    aExcluir.classList.add('excluir');
    td3.append(aEditar,aExcluir);
    noPai.append(td1,td2,td3);
}

const $corpoTabela = document.querySelector('tbody');
$corpoTabela.addEventListener('click',function(event){
    if(event.target.tagName==='A'){
        let link = event.target;
        let generoId = obterValorDaColunaId(link);
        if(generoId>0 && link.className==="excluir"){
            generoExcluirFetch(generoId); 
        }
        else if(generoId>0 && link.className ==="editar"){
            generoBuscarFetch(generoId);
        }        
    } 
});

function obterValorDaColunaId(link){
    let coluna = link.parentNode;
    let linha = coluna.parentNode;
    let primeiraColuna = linha.firstChild;
    return parseInt(primeiraColuna.textContent);
}

export {generoListarFetch};
