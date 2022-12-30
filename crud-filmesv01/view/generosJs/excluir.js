function excluirGenero(id){
    if(confirm('Confirma a exclusão do genero de id '+id+'?')){
        let genero = {"id": id}
        let configMetodo = {
            method:"DELETE",
            body: JSON.stringify(genero),
            headers:{
                "Content-Type": "application/json;charset=UTF-8"
            }
        }
        fetch("../controller/generoExcluir.php", configMetodo)
        .then(function(resposta){
            if(!resposta.ok ===true){
                let msg = resposta.status + " - " + resposta.statusText
                document.querySelector('#msgErro').textContent = msg
            }else
                return resposta.json()
        })
        .then(function(respostaJSON){
            if(respostaJSON.erro ===false)
                cbSucessoExcluirGenero(respostaJSON)
            else
                document.querySelector('#msgErro').textContent = respostaJSON.msgErro
        })
        .catch(function(erro){
            document.querySelector('#msgErro').textContent = erro
        })
    }
}

function cbSucessoExcluirGenero(respostaJSON){
    document.querySelector('#msgSucesso').textContent = respostaJSON.msgSucesso
    setTimeout(function(){
        window.location.href = "../view/generos.html"
    }, 3500)
}