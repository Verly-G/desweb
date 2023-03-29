//Recupera o botão alterar (Também poderíamos usar o form e o evento submit)        
const $btnAlterar = document.querySelector('#alterar');
$btnAlterar.addEventListener('click', function(event){
    event.preventDefault();
    let genero = {
        "id": document.querySelector('#id').value,
        "descricao": document.querySelector('#descricao').value
    };
    let configMetodo = {
        method: "PUT",
        body: JSON.stringify(genero),
        headers: {
            "Content-Type":"application/json;charset=UTF-8"
        }
    };
    //fetch enviando o genero a ser alterado
    fetch("../controller/generoAlterar.php", configMetodo)
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
                cbSucessoAlterarGenero(respostaJSON);
            else
                document.querySelector('#msgErro').textContent = respostaJSON.msgErro;
        })
        .catch(function(erro){
            document.querySelector('#msgSucesso').textContent = erro;
        });
});

//Recupera o botão cancelar
const $btnCancelar = document.querySelector('#cancelar');
$btnCancelar.addEventListener('click',function(){
    if(confirm('Deseja mesmo cancelar a alteração?'))
        window.location.href = "../view/generos.html";
})

//Função de callback
function cbSucessoAlterarGenero(respostaJSON){
    document.querySelector('#msgSucesso').textContent = respostaJSON.msgSucesso;
    setTimeout(function(){
       window.location.href = "../view/generos.html";
    },1500);
}