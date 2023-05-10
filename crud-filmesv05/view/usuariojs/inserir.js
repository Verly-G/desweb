const $btnEnviar = document.querySelector('#enviar');
$btnEnviar.addEventListener('click', function(event){
    event.preventDefault();

    usuarioInserirFetch();
    $("#modal-formulario").modal('hide')
})

let usuarioInserirFetch = function(){
    let usuario = {
        "nome": document.querySelector('#form-inserir').querySelector('#nome').value,
        "login": document.querySelector('#form-inserir').querySelector('#login').value,
        "senha": document.querySelector('#form-inserir').querySelector('#senha').value
    }
    let configMetodo ={
        method: "POST", body: JSON.stringify(usuario),headers: {"Content-Type": "application/json;charset=UTF-8"}
    }
    fetch("../controller/usuarioInserir.php", configMetodo)
    .then(function(resposta){
        if(!resposta.ok===true){
            let msg = resposta.status + " - " + resposta.statusText;
            throw new Error(msg)
        }
        else
            return resposta.json();
    })
    .then(function(respostaJSON){
        if(respostaJSON.erro===false)
            cbSucessoInserirUsuario(respostaJSON);
        else
            cbErroInserirUsuario(respostaJSON.msgErro)
    })
    .catch(function(erro){
        cbErroInserirUsuario(erro)
    });
}
function limparSpans(){
    document.querySelector('#msgErro').textContent = "";
    document.querySelector('#msgSucesso').textContent = "";
}
function cbSucessoInserirUsuario(respostaJSON){
    document.querySelector('#msgSucesso').textContent = respostaJSON.msgSucesso;
    setTimeout(function(){
        limparSpans();
        usuarioListarFecth();
    },1500);
}
function cbErroInserirUsuario(erro){
    document.querySelector('#msgErro').textContent = erro
    setTimeout(function(){
        limparSpans();
    },1500)
}
