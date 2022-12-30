const $btnAlterar = document.querySelector('#alterar')

$btnAlterar.addEventListener('click', function(event){
  event.preventDefault()

  let filme = {
    "id": document.querySelector('#id').value,
    "titulo": document.querySelector('#titulo').value,
    "avaliacao": parseFloat(document.querySelector('#avaliacao').value),
    "genero_id": parseInt(document.querySelector('#cmbGeneros').value)
  }

  let configMetodo = {
    method : "PUT",
    body : JSON.stringify(filme),
    headers : {
      "Content-Type" : "application/json;charset=UTF-8"
    }
  }

  fetch("../controller/filmeAlterar.php", configMetodo)
    .then(function(resposta){
      if(!resposta.ok===true){
        let msg = resposta.status + " - " + resposta.statusText
        document.querySelector('#msgErro').textContent = msg
      }else
        return resposta.json()
    })
    .then(function(respostaJSON){
      if(respostaJSON.erro===false){
        cbSucessoAlterarFilme(respostaJSON)
      }else
        document.querySelector('#msgErro').textContent = respostaJSON.msgErro
    })
    .catch(function(erro){
      document.querySelector('#msgErro').textContent = erro
    })
})

const $btnCancelar =  document.querySelector('#cancelar')

$btnCancelar.addEventListener('click', function(){
  if(confirm('Deseja mesmo cancelar a alteração?'))
    window.location.href = "../view/filmes.html"
})

function cbSucessoAlterarFilme(respostaJSON){
  document.querySelector('#msgSucesso').textContent = respostaJSON.msgSucesso
  setTimeout(function(){
    window.location.href = "../view/filmes.html"
  }, 3500)
}