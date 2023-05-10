function  usuarioBuscarFetch(id){  
    //fetch enviando o id do genero a ser recuperado
    fetch("../controller/usuarioBuscar.php?id="+id+"")
        .then(function(resposta){
            if(!resposta.ok===true){
                let msg = resposta.status + " - " + resposta.statusText;
                throw new Error(msg)
            }
            else
                return resposta.json();
        })
        .then(function(respostaJSON){
            if(respostaJSON.erro===false){
                cbSucessoBuscarUsuario(respostaJSON);
                document.querySelector('#msgSucesso').textContent = respostaJSON.msgSucesso;
                setTimeout(function(){
                    document.querySelector('#msgSucesso').textContent = "";
                },1500);
            }else{
                cbErroBuscarUsuario(respostaJSON.msgErro);
            }
        })
        .catch(function(erro){
            document.querySelector('#msgSucesso').textContent = erro;
        });
}
//Função de callback
function cbSucessoBuscarUsuario(respostaJSON){
    $("#modal-formulario-alterar").modal({backdrop: 'static'});
    $("#modal-formulario-alterar").modal('show');
    let formAlterar = document.querySelector('#form-alterar');
    let usuario = respostaJSON.dados;
    //Preencha os inputs com os dados trazidos
    formAlterar.querySelector('#id').value = usuario.id;
    formAlterar.querySelector('#nome').value = usuario.nome;
    formAlterar.querySelector('#login').value = usuario.login;
    formAlterar.querySelector('#senha').value = usuario.senha;
}
function cbErroBuscarUsuario(erro){
    document.querySelector('#msgErro').textContent = erro;
    setTimeout(function(){
        //Recarrega depois de 1,5 e uma mensagem é exibida
        limparSpans();
        usuarioListarFetch();
    }, 1500);
}