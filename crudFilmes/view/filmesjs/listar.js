import { exibirMensagemErro, fazFetch } from "../utilJs/funcoesUtil.js";
import { filmeBuscarFetch } from "./buscar.js";
import { filmeExcluirFetch } from "./excluir.js";
import { filmeListarGeneroInserirFetch } from "./inserir.js";

document.querySelector("#btn-novo").addEventListener('click',()=>{
    filmeListarGeneroInserirFetch();
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
    filmeListarFetch();
}

let filmeListarFetch = function(){
    document.querySelector('tbody').innerHTML="";
    fazFetch("../controller/filmeListar.php","GET",null,fcSucessoListarFilme,fcErroListarFilme);
};

function fcSucessoListarFilme(respostaJSON){
    montarTabela(respostaJSON.dados);
}
function fcErroListarFilme(erro){
    exibirMensagemErro('#msg',erro,2000);
}

function montarTabela(dados){
    const corpoTabela=document.querySelector('tbody');
    dados.forEach(function(filme){
        const tr = document.createElement('tr');
        pendurarColunas(tr,filme);
        corpoTabela.appendChild(tr);
    })
}

function pendurarColunas(noPai,objeto){
    const[td1,td2,td3,td4,td5] = ['td','td','td','td','td'].map(td=>document.createElement(td));
    /*const td1 = document.createElement('td');
    const td2 = document.createElement('td');
    const td3 = document.createElement('td');*/
    td1.textContent=objeto.id;
    td2.textContent=objeto.titulo;
    td3.textContent=objeto.avaliacao;
    td4.textContent=objeto.genero_descricao;
    const[aEditar,aExcluir] = ['a','a'].map(a=>{
        let link = document.createElement(a);
        link.setAttribute('href','#');
        return link;
    });
    aEditar.textContent="[Editar]";
    aEditar.classList.add('editar');
    aExcluir.textContent="[Excluir]";
    aExcluir.classList.add('excluir');
    td5.append(aEditar,aExcluir);
    noPai.append(td1,td2,td3,td4,td5);
}

const $corpoTabela = document.querySelector('tbody');
$corpoTabela.addEventListener('click',function(event){
    if(event.target.tagName==='A'){
        let link = event.target;
        let filmeId = obterValorDaColunaId(link);
        if(filmeId>0 && link.className==="excluir"){
            filmeExcluirFetch(filmeId); 
        }
        else if(filmeId>0 && link.className ==="editar"){
            filmeBuscarFetch(filmeId);
        }        
    } 
});

function obterValorDaColunaId(link){
    let coluna = link.parentNode;
    let linha = coluna.parentNode;
    let primeiraColuna = linha.firstChild;
    return parseInt(primeiraColuna.textContent);
}

export {filmeListarFetch}









       