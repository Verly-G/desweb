// Ao carregar a página 
window.onload = () =>{
    // Traz os filmes por meio de uma  requisição ajaj
    filmeListarFetch();
    // Já carrega os gêneros no modal através de outra requisição  AJAJ
    //  Vai ser útil quando formos utilizar a opção de inserir um novo filme
    // filmeListarGeneroInserirFetch();
}

// Uma função que faz  fetch e usa  o método GET por default. Por isso não precisamos explicitar
let filmeListarFetch = function(){
    document.querySelector('tbody').innerHTML="";   
    fetch("../controller/filmeListar.php")
        .then(function(resposta){
            if(!resposta.ok===true){
                let msg = resposta.status + " - " + resposta.statusText;
                throw new Error(msg);
            }else
                return resposta.json();        
        })
        .then(function(respostaJSON){
            if(respostaJSON.erro===false)
                cbSucessoListarFilme(respostaJSON);
            else
                cbErroListarFilme(respostaJSON.msgErro);
        })
        .catch(function(erro){
            document.querySelector('#msgErro').textContent = erro;
        });
}

function cbSucessoListarFilme(respostaJSON){
    montarTabela(respostaJSON.dados)
}
function cbErroListarFilme(erro){
    document.querySelector('#msgErro').textContent = erro;
}
function montarTabela(dados){
    for (const i in dados) {
        let filme = dados[i];
        const $tr = document.createElement('tr');
        //p/ cada atributo faça
        criarTDePendurar($tr, filme.id , false);
        criarTDePendurar($tr, filme.titulo , false);
        criarTDePendurar($tr, filme.avaliacao , false);
        criarTDePendurar($tr, filme.genero_descricao , false);
        let links = "<a href=# '>[Editar]</a>";
        links+= "<a href=# '>[Excluir]</a>" 
        criarTDePendurar($tr, links , true);
        //Pendura a linha criada a cada iteração no tbody da tabela
        document.querySelector('tbody').appendChild($tr);
    }//Fim do for in
}//Fim da função

function criarTDePendurar(noPai, informacao, ehHtml){
    let td = document.createElement('td');
    if(ehHtml)
        td.innerHTML = informacao;
    else
        td.textContent = informacao;
    noPai.appendChild(td);
}

const $corpoTabela = document.querySelector('tbody');
$corpoTabela.addEventListener('click',function(event){
    if(event.target.tagName==='A'){
        let link = event.target;
        let filmeId = obterValorDaColunaId(link);
        if(filmeId>0 && link.textContent === "[Excluir]")
            filmeExcluirFetch(filmeId);
        else if(filmeId>0 && link.textContent === "[Editar]")
            filmeBuscarFetch(filmeId);
    }  
});

function obterValorDaColunaId(link){
    let coluna = link.parentNode;
    let linha = coluna.parentNode;
    let idText = linha.firstChild;
    return parseInt(idText.textContent);
}

function limparSpans(){
    document.querySelector('#msgErro').textContent = "";
    document.querySelector('#msgSucesso').textContent = "";     
}