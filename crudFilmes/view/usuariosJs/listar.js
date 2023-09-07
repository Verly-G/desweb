import { exibirMensagemErro, fazFetch } from "../utilJs/funcoesUtil.js";
import { usuarioExcluirFetch } from "./excluir.js";
import { usuarioBuscarFetch } from "./buscar.js";

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
    usuarioListarFetch();
}

let usuarioListarFetch = function(){
    document.querySelector('tbody').innerHTML="";
    fazFetch("../controller/usuarioListar.php","GET",null,fcSucessoListarUsuario,fcErroListarUsuario);
};

function fcSucessoListarUsuario(respostaJSON){
    montarTabela(respostaJSON.dados);
}
function fcErroListarUsuario(erro){
    exibirMensagemErro('#msg',erro,2000);
}

function montarTabela(dados){
    const corpoTabela=document.querySelector('tbody');
    dados.forEach((usuario,i)=>{
        //O i (índice) não está sendo usado
        const tr = document.createElement('tr');
        pendurarColunas(tr,usuario);
        corpoTabela.appendChild(tr);
    })
}

function pendurarColunas(noPai,objeto){
    const[td1,td2,td3] = ['td','td','td'].map(td=>document.createElement(td));
    /*const td1 = document.createElement('td');
    const td2 = document.createElement('td');
    const td3 = document.createElement('td');*/
    td1.textContent=objeto.id;
    td2.textContent=objeto.nome;
    const[aEditar,aExcluir] = ['a','a'].map(a=>{
        let link = document.createElement(a);
        link.setAttribute('href','#');
        return link;
    });
    aEditar.textContent="[Editar]";
    aEditar.classList.add('editar');
    aExcluir.textContent="[Excluir]";
    aExcluir.classList.add('excluir');
    td3.append(aEditar,aExcluir);
    noPai.append(td1,td2,td3);
}

const $corpoTabela = document.querySelector('tbody');
$corpoTabela.addEventListener('click',function(event){
    if(event.target.tagName==='A'){
        let link = event.target;
        let usuarioId = obterValorDaColunaId(link);
        if(usuarioId>0 && link.className==="excluir"){
            usuarioExcluirFetch(usuarioId); 
        }
        else if(usuarioId>0 && link.className ==="editar"){
            usuarioBuscarFetch(usuarioId);
        }        
    } 
});

function obterValorDaColunaId(link){
    let coluna = link.parentNode;
    let linha = coluna.parentNode;
    let primeiraColuna = linha.firstChild;
    return parseInt(primeiraColuna.textContent);
}

export {usuarioListarFetch};
