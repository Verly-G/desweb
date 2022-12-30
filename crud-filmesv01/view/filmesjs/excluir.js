function excluirFilme(id) {
    if (confirm('Confirma a exclusão do filme de id ' + id + '?')) {
        let filme = { "id": id }

        let configMetodo = {
            method: "DELETE",
            body: JSON.stringify(filme),
            headers: {
                "Content-Type": "application/json;charset=UTF-8"
            }
        }
        
        fetch("../controller/filmeExcluir.php", configMetodo)
            .then(function (resposta) {
                if (!resposta.ok === true) {
                    let msg = resposta.status + " - " + resposta.statusText
                    document.querySelector('#msgErro').textContent = msg
                } else
                    return resposta.json();
            })
            .then(function (respostaJSON) {
                if (respostaJSON.erro === false) {
                    cbSucessoExcluirFilme(respostaJSON)
                }
                else
                    document.querySelector('#msgErro').textContent = respostaJSON.msgErro
            })
            .catch(function (erro) {
                document.querySelector('#msgErro').textContent = erro
            })
    }
}
function cbSucessoExcluirFilme(repostaJSON) {
    document.querySelector('#msgSucesso').textContent = repostaJSON.msgSucesso
    setTimeout(function () {
        window.location.href = "../view/filmes.html"
    }, 3500)
}