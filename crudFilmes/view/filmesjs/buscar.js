import { exibirMensagem,exibirMensagemErro, paginaInicial } from "../utilJs/funcoesUtil.js";
//Para fechar o modal de alterar via jquery
$("#btn-fechar-alterar").click(function(){
    $("#modal-alterar").modal('hide');
});

//Exemplo de async/await
let filmeBuscarFetch = async function(id){  
    try{
        //Estou usando console.log p/ mostrar a sincronicidade
        console.log(1)
        let resposta = await fetch("../controller/filmeBuscar.php?id="+id+"");
        console.log('resposta',resposta)
        if(!resposta.ok===true){
            console.log('resposta',resposta)
            let msg = resposta.status + " - " + resposta.statusText;
            if(resposta.status===401)
                window.location.href = paginaInicial;
            throw new Error(msg); 
        }
        console.log(2)
        let respostaJSON = await resposta.json();
        console.log(respostaJSON)
        if(respostaJSON.erro===false)
            fcSucessoBuscarFilme(respostaJSON);
        else
            fcErroBuscarFilme(respostaJSON.msgErro);
        console.log(3)
        await buscarEposicionarGeneros(respostaJSON.dados.genero_id);
        console.log(4)
    }catch(erro){
        exibirMensagemErro('#msg',erro,2000);
    }finally{
        console.log('Requisição 1 encerrada')
    } 
};

function fcSucessoBuscarFilme(respostaJSON){
    $("#modal-alterar").modal({backdrop: 'static'});
	$("#modal-alterar").modal('show');
    let formAlterarFilme = document.querySelector('#form-alterar');
    let filme = respostaJSON.dados;
    formAlterarFilme.querySelector('#id').value = filme.id;
    formAlterarFilme.querySelector('#titulo').value = filme.titulo;
    formAlterarFilme.querySelector('#avaliacao').value = filme.avaliacao;
}
function fcErroBuscarFilme(erro){
    exibirMensagemErro('#msg',erro,2000);
}

//Outro exemplo de async/await
async function buscarEposicionarGeneros(idGeneroAtual){
    try{
        let resposta = await fetch("../controller/generoListar.php");
        if(!resposta.ok===true){
            console.log('resposta',resposta)
            let msg = resposta.status + " - " + resposta.statusText;
            if(resposta.status===401)
                window.location.href = paginaInicial;
            throw new Error(msg); 
        }
        let respostaJSON = await resposta.json();
        if(respostaJSON.erro===false){
            fcSucessoListarGeneroBuscar(respostaJSON,idGeneroAtual);
            exibirMensagem('#msg',respostaJSON.msgSucesso,2000);
        }else
            fcErroListarGeneroBuscar(respostaJSON.msgErro);
    }catch(erro){
        exibirMensagemErro('#msg',erro,2000);
    }finally{
        console.log('Requisição 2 encerrada')
    }
}

//Funções que podem ser de callback de listarGenero p/ inserir 
function fcSucessoListarGeneroBuscar(respostaJSON,idGeneroAtual){
    console.log("id", idGeneroAtual)
    let generos = respostaJSON.dados;
    if(generos!=null)
        montarSelectGeneros(generos,idGeneroAtual);
}
function fcErroListarGeneroBuscar(erro){
    exibirMensagemErro('#msg',erro);
}

function montarSelectGeneros(generos, idGeneroAtual){
    let formAlterarFilme = document.querySelector('#form-alterar');
    formAlterarFilme.querySelector('#cmbGeneros').innerHTML="";
    for (const i in generos) {
        let genero = generos[i];
        let $opt = document.createElement('option');
        $opt.value= genero.id;
        if(genero.id == idGeneroAtual)
            $opt.setAttribute('selected', 'selected');
        $opt.textContent = genero.descricao;
        formAlterarFilme.querySelector('#cmbGeneros').appendChild($opt);
    }
}

export {filmeBuscarFetch}
