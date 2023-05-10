window.onload = () =>{
    usuarioListarFecth();
}

let usuarioListarFecth = function(){
    document.querySelector('tbody').innerHTML="";
    fetch("../controller/usuarioListar.php")
    .then(function(resposta){
        if(! resposta.ok===true){
            let msg = resposta.status + " - " + resposta.statusText;
            throw new Error(msg);
        }else
            return resposta.json();
    })
    .then(function(respostaJSON){
        if(respostaJSON.erro===false)
            cbSucessoListarUsuario(respostaJSON);
        else
            cbErroListarUsuario(respostaJSON.msgErro)
    })
    .catch(function(erro){
        document.querySelector('#msgErro').textContent = erro;
    })
}
function cbSucessoListarUsuario(respostaJSON){
    montarTabela(respostaJSON.dados)
}
function cbErroListarUsuario(erro){
    document.querySelector('#msgErro').textContent = erro;
}
function montarTabela(dados){
    for(const i in dados){
        let usuario = dados[i];
        const $tr = document.createElement('tr');
        criarTDePendurar($tr, usuario.id, false);
        criarTDePendurar($tr, usuario.nome, false);

        let links = "<a href=#>[Editar]</a>"
        links += "<a href=#>[Excluir]</a>"
        criarTDePendurar($tr,links, true);
        document.querySelector('tbody').appendChild($tr);
    }
}

const $corpoTabela = document.querySelector('tbody');
$corpoTabela.addEventListener('click', function(event){
    if(event.target.tagName==='A'){
    let link = event.target;
    let usuarioId = obterValorDaColunaId(link);
    if(usuarioId > 0 && link.textContent === "[Excluir]")
        usuarioExcluirFetch(usuarioId);
    else if(usuarioId>0 && link.textContent === "[Editar]")
        usuarioBuscarFetch(usuarioId);
    }
})

function obterValorDaColunaId(link){
    if(link.textContent === "[Excluir]" || link.textContent === "[Editar]"){
        let coluna = link.parentNode;
        let linha = coluna.parentNode;
        let idText = linha.firstChild;
        return parseInt(idText.textContent);
    }
    return null
}

function criarTDePendurar(noPai, informacao, ehHtml){
    let td = document.createElement('td');
    if(ehHtml)
        td.innerHTML = informacao;
    else
        td.textContent = informacao;
    noPai.appendChild(td);
}