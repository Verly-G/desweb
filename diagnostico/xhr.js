const $formAluno = document.querySelector('form')
$formAluno.addEventListener('submit', function (e){
    //Para não ficar atualizando toda hora
    e.preventDefault();
    //extrair os dados do formulário e criar um objeto literal aluno
    let aluno = {
        nome: document.querySelector("#nome").value,
        nota1: parseFloat(document.querySelector("#nota1").value),
        nota2: parseFloat(document.querySelector("#nota2").value)
    }
    //Fazer requisição Ajax/ajaj para enviar pro servidor com XmlHttpRequest
    const xhr = new XMLHttpRequest()
    xhr.open("POST", "processaAluno.php")
    xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8")
    xhr.send(JSON.stringify(aluno))
    //Monitorar mudança de estados
    xhr.onreadystatechange=function(){
        console.log('Estado atual: ', xhr.readyState)
        if(xhr.readyState === 4){
            if(xhr.status === 200 || xhr.status === 304 ){
                alunoJSON = JSON.parse(xhr.responseText)
                console.log(alunoJSON)
                preencherSpans(alunoJSON)
            }else{
                limparSpans()
                let msgErro = xhr.status + '-' + xhr.statusText
                document.querySelector("#erro").textContent = msgErro
            }
        }
    }

})//Fim do addEventListener



// function criaElemnt(){
//     let novoAluno = document.createElement("div")
//     novoAluno.textContent = "teste"
//     document.section.appendChild(novoAluno);
// }



// criaElemnt()
function limparSpans() {
    // O textContent é usado para escrever textos
    // Limpando os dados que estavam nesses spans
    document.querySelector("#dados").textContent="";
    document.querySelector("#alunoNome").textContent="";
    document.querySelector("#alunoMedia").textContent="";
    document.querySelector("#alunoGrau").textContent="";
}

function preencherSpans(aluno){
    // Preencheno os spans
    document.querySelector("#dados").textContent="Informações do aluno";
    document.querySelector("#alunoNome").textContent="Nome: " + aluno.nome;
    document.querySelector("#alunoMedia").textContent="Média: " + aluno.media;
    document.querySelector("#alunoGrau").textContent="Grau: " + aluno.grau;
}