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
    //Fazer requisição Ajax/ajaj para enviar pro servidor com fetch
    fetch("processaAluno.php",{
        method:"POST",
        body: JSON.stringify(aluno),
        headers:{
            "Content-Type":"application/json;charset=UTF-8"
        }
    })
    .then(resposta =>{
        console.log(resposta)
        if(resposta.ok!==true){
            limparSpans()
            let msgErro = resposta.status + '-' + resposta.statusText
            document.querySelector("#erro").textContent = msgErro
        }return resposta
    })
    .then(resposta => resposta.json())
    .then(aluno =>{
        preencherSpans(aluno)
    })
    .catch(erro=> console.log("Erro ", erro))
});

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