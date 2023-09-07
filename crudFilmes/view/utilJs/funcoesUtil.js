const paginaInicial = "../view/index.html";

function exibirMensagemErro(idElemento,msg,tempo=null){
    document.querySelector(idElemento).classList.remove('msgSucesso');
    document.querySelector(idElemento).classList.add('msgErro');
    document.querySelector(idElemento).textContent=msg;
    setTimeout(() => {
        document.querySelector(idElemento).textContent="";
    }, tempo);
}

function exibirMensagem(idElemento,msg,tempo=null){
    document.querySelector(idElemento).classList.remove('msgErro');
    document.querySelector(idElemento).classList.add('msgSucesso');
    document.querySelector(idElemento).textContent=msg;
    setTimeout(() => {
        document.querySelector(idElemento).textContent="";
    }, tempo);
}

function fazFetch(url,metodo,objetoLiteral,cbSucesso,cbErro){
    let configMetodo = {
        method: metodo
        ,body: (objetoLiteral!=null)?JSON.stringify(objetoLiteral):null
        ,headers: {"Content-Type":"application/json;charset=UTF-8"}
    };
    fetch(url, configMetodo)
    .then(function(resposta){
        if(!resposta.ok===true){
            let msg = resposta.status + " - " + resposta.statusText;
            if(resposta.status===401){
                window.location.href = paginaInicial;
            }
            throw new Error(msg); 
        }else
            return resposta.json();
    })
    .then(function(respostaJSON){
        if(respostaJSON.erro===false)
            cbSucesso(respostaJSON);
        else
            cbErro(respostaJSON);
    })
    .catch(function(erro){
       cbErro(erro);
    })
    .finally(()=> console.log('requisição encerrada'))
}  
export {exibirMensagem, exibirMensagemErro, fazFetch, paginaInicial};