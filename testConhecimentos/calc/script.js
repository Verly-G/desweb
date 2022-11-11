const calculoForm = document.querySelector('form')

calculoForm.addEventListener('submit', (e) =>{
    // Usamos o preventDefault para página não ficar atualizando
    e.preventDefault()

    // Tranformando os dados em objeto
    let valor = {
        number1: parseFloat(document.querySelector("#n1").value),
        number2: parseFloat(document.querySelector("#n2").value),
        operacaoCalc: document.querySelector("#operacao").value
    }
    fetch("processaCalc.php", {
        method: "POST",
        body: JSON.stringify(valor),
        headers: {
            "Content-Type":"application/json;chatset=UTF-8"
        }
    })
    .then(resposta =>{
        console.log(resposta)
        if(resposta.ok !== true){
            limpaSpan()
            let msgErro = resposta.status + " - " + resposta.statusText
            document.querySelector("#erro").textContent = msgErro
        }return resposta
    })
    .then(resposta => resposta.json())
    .then(valor => {
        preencheSpan(valor)
    })
    .catch(erro => console.log("Erro: ", erro))
})

function limpaSpan(){
    document.querySelector("#resultado").textContent = ""
}
function preencheSpan(usuario){
    document.querySelector("#resultado").textContent = usuario.resultado
}