window.onload = function(){
    fetch("../controller/generoListar.php")
    .then(function(resposta){
        if(!resposta.ok===true){
            let msg = resposta.status + " - " + resposta.statusText
            document.querySelector('#msgErro').textContent = msg
        }else
            return resposta.json()
    })
    .then(function(respostaJSON){
        if(respostaJSON.erro===false)
            cbSucessoListarGeneroInserir(respostaJSON)
        else
            document.querySelector('#msgErro').textContent = respostaJSON.msgErro
    })
    .catch(function(erro){
        document.querySelector('#msgErro').textContent = erro
    })
}

function cbSucessoListarGeneroInserir(respostaJSON){
    montarSelect(respostaJSON.dados)
}

function montarSelect(dados){
    for(const i in dados){
        let genero = dados[i]
        let $opt = document.createElement('option')
        $opt.value = genero.id
        $opt.textContent = genero.descricao
        document.querySelector('#cmbGeneros').appendChild($opt)
    }
}

const $btnEnviar = document.querySelector('#enviar')
$btnEnviar.addEventListener('click', function(event){
    event.preventDefault()
    let filme = {
        "titulo": document.querySelector('#titulo').value,
        "avaliacao":parseFloat(document.querySelector('#avaliacao').value),
        "genero_id":parseInt(document.querySelector('#cmbGeneros').value)
    }
    let configMetodo = {
        method: "POST",
        body: JSON.stringify(filme),
        headers: {
            "Content-Type" : "application/json;charset=UTF-8"
        }
    }
    fetch("../controller/filmeInserir.php", configMetodo)
    .then(function(resposta){
        if(!resposta.ok === true){
            let msg = resposta.status + " - " + resposta.statusText
            document.querySelector('#msgErro').textContent = msg
        }else
            return resposta.json()
    })
    .then(function(respostaJSON){
        if(respostaJSON.erro===false)
            cbSucessoInserirFilme(respostaJSON)
        else
            document.querySelector('#msgErro').textContent = respostaJSON.msgErro
    })
})

function cbSucessoInserirFilme(respostaJSON){
    document.querySelector('#msgSucesso').textContent = respostaJSON.msgSucesso
    setTimeout(function(){
        window.location.href = "../view/filmes.html"
    }, 3500)
}
