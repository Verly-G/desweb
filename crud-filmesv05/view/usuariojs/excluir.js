function usuarioExcluirFetch(id){
    if(confirm('Confirma a exclusão do usuario de id '+id+'?')){ 
        let usuario = {"id": id};
        let configMetodo = {
            method: "DELETE",
            body: JSON.stringify(usuario),
            headers:{
                "Content-Type": "application/json;charset=UTF-8"
            }
        };
        //fetch enviando o id do genero a ser excluído
        fetch("../controller/usuarioExcluir.php", configMetodo)
            .then(function(resposta){
                if(!resposta.ok===true){
                    let msg = resposta.status + " - " + resposta.statusText;
                    throw new Error(msg)
                }else
                    return resposta.json();
            })
            .then(function(respostaJSON){
                if(respostaJSON.erro===false)
                    cbSucessoExcluirUsuario(respostaJSON);
                else
                    cbErroExcluirUsuario(respostaJSON)
            })
            .catch(function(erro){
                cbErroExcluirUsuario(erro)
            })
    }
}

//Função de callback
function cbSucessoExcluirUsuario(respostaJSON){
    document.querySelector('#msgSucesso').textContent = respostaJSON.msgSucesso;
    //Em seguida, redirecione para a página principal
    setTimeout(function(){
        limparSpans();
        usuarioListarFecth();
    },1500); 
}

function cbErroExcluirUsuario(erro){
    document.querySelector('#msgErro').textContent = erro;
    setTimeout(function(){
        limparSpans()
    }, 1500)
}
