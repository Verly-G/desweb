window.onload = function(){
    let qs = window.location.search.replace('?', '');
    let parametroBuscar = qs.split('=');
    let id = parametroBuscar[1];
    buscarGenero(id);
}
function buscarGenero(id){
    fetch("../controller/generoBuscar.php?id="+id+"")
    .then(function(resposta){
        if(!resposta.ok ===true){
            let msg = resposta.status + " - " + resposta.statusText;
            document.querySelector("#msgErro").textContent = msg;
        }
        else
            return resposta.json();
    })
    .then(function(respostaJSON){
        if(respostaJSON.erro === false){
            cbSucessoBuscarGenero(respostaJSON);
            document.querySelector("#msgSucesso").textContent = respostaJSON.msgSucesso;
            setTimeout(function(){
                document.querySelector('#msgSucesso').textContent = respostaJSON.msgErro;
            }, 2500)
        }else
            document.querySelector('#msgSucesso').textContent = respostaJSON.msgErro
    })
    .catch(function(erro){
        document.querySelector('#msgSucesso').textContent = erro;
    })
}
function cbSucessoBuscarGenero(respostaJSON){
    let genero = respostaJSON.dados;
    document.querySelector('#id').value = genero.id;
    document.querySelector('#descricao').value = genero.descricao;
}
