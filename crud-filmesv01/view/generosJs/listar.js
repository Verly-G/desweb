//Usando o método fetch. 
//OBS: Quando usamos o método GET, não precisamos explicitar
//Pegando os dados do arquivo generoListar.php
fetch("../controller/generoListar.php")
.then(function(resposta){
    if(!resposta.ok === true){
        //Caso de erro
        //Escreve uma mensagem mostrando o erro
        let msg = resposta.status + " - " + resposta.statusText
        //Em seguida mando para a tela
        document.querySelector('#msgErro').textContent = msg;
    }
    //Caso de certo, envie uma resposta em JSON
    else return resposta.json();
})
.then(function(respostaJSON){
    if(respostaJSON.erro === false){
        //Se não existir erro, chame a função passando o respostaJSON
        cbSucessoListarGenero(respostaJSON)
    }
    //Caso contrário, mande o erro na tela
    else
    document.querySelector("#msgErro").textContent = respostaJSON.msgErro;
})
//Caso de erro em algum lugar, vai para o catch e mostre o erro
.catch(function(erro){
    document.querySelector('#msgErro').textContent = erro;
})
//função chamada no .then que manda para outra função
function cbSucessoListarGenero(respostaJSON){
    montarTabela(respostaJSON.dados);
}
//A função seguinte cria as linhas da tabela com os dados dos generos
function montarTabela(dados){
    for(const i in dados){
        let genero = dados[i]
        const $tr = document.createElement('tr');

        criarTDePendurar($tr, genero.id, false)
        criarTDePendurar($tr, genero.descricao, false)
        let links = "<a href=generoFormBuscar.html?id="+genero.id+">[Editar]</a>"
        links += "<a href=#>[Excluir]</a>"
        criarTDePendurar($tr,links, true)
        
        document.querySelector('tbody').appendChild($tr)
    }
}

const $corpoTabela = document.querySelector('tbody')
$corpoTabela.addEventListener('click', function(event){
    if(event.target.tagName === 'A'){
        let link = event.target
        let generoAExcluir = obterValorDaColunaId(link)
        if(generoAExcluir>0){
            excluirGenero(generoAExcluir)
        }
    }
})
function obterValorDaColunaId(link){
    if(link.textContent === "[Excluir]"){
        let coluna = link.parentNode
        let linha = coluna.parentNode
        let idText = linha.firstChild
        return parseInt(idText.textContent)
    }
    return null
}
function criarTDePendurar(noPai, informacao, ehHtml){
    let td = document.createElement('td')
    if(ehHtml)
        td.innerHTML = informacao
    else
        td.textContent = informacao
    noPai.appendChild(td)
}
