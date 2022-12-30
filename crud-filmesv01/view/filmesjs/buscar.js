window.onload = function(){
    let qs = window.location.search.replace('?', '');
    let parametroBuscar = qs.split('=');
    let id = parametroBuscar[1];
    buscarFilme(id);
}

function buscarFilme(id){
    fetch("../controller/filmeBuscar.php?id="+id+"")
        .then(function(resposta){
            if(!resposta.ok===true){
                let msg = resposta.status + " - " + resposta.statusText
                document.querySelector('#msgErro').textContent = msg
            }else
                return resposta.json()
        })
        .then(function(respostaJSON){
            if(respostaJSON.erro === false)
                cbSucessoBuscarFilme(respostaJSON)
            else{
                document.querySelector('#msgErro').textContent = respostaJSON.msgErro
                return respostaJSON.dados.genero_id
            }
        })
        .then(function(idGeneroAtual){
            buscarEposicionarGeneros(idGeneroAtual)
        })
        .catch(function(erro){
            document.querySelector('#msgErro').textContent = erro
        })
}

function cbSucessoBuscarFilme(respostaJSON){
    let filme = respostaJSON.dados

    document.querySelector('#id').value = filme.id
    document.querySelector('#titulo').value = filme.titulo
    document.querySelector('#avaliacao').value = filme.avaliacao
}

function buscarEposicionarGeneros(idGeneroAtual){
    fetch("../controller/generoListar.php")
        .then(function(resposta){
            if(!resposta.ok === true){
                let msg = resposta.status + " - " + resposta.status
                document.querySelector('#msgErro').textContent = msg
            }else
                return resposta.json()
        })
        .then(function(respostaJSON){
            if(respostaJSON.erro===false){
                cbSucessoListarGeneroBuscar(respostaJSON, idGeneroAtual)

                document.querySelector('#msgSucesso').textContent = respostaJSON.msgSucesso
                setTimeout(function(){
                    document.querySelector('#msgSucesso').textContent = "";
                }, 2500)
            }else
                document.querySelector('#msgSucesso').textContent = respostaJSON.msgErro
        })
        .catch(function(erro){
            document.querySelector('#msgErro').textContent = erro
        })
}

function cbSucessoListarGeneroBuscar(respostaJSON, idGeneroAtual){
    let generos = respostaJSON.dados
    if(generos!=null)
        montarSelectGeneros(generos, idGeneroAtual)
}

function montarSelectGeneros(generos, idGeneroAtual){
    for(const i in generos){
        let genero = generos[i]
        let $opt = document.createElement('option')
        $opt.value = genero.id
        if(genero.id == idGeneroAtual)
            $opt.setAttribute('selected', 'selected')
        $opt.textContent = genero.descricao
        document.querySelector('#cmbGeneros').appendChild($opt)
    }
}