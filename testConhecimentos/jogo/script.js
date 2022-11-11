const form = document.querySelector('form')

form.addEventListener('submit',function(e) {
    e.preventDefault()
    let usuario = {
        nome: document.querySelector("#nome").value,
        email: document.querySelector("#email").value,
        jogo: document.querySelector("#jogo").value
    }
    fetch("processaDados.php", {
        method: "POST",
        body: JSON.stringify(usuario),
        headers: {
            "Content-Type":"application/json;charset=UTF-8"
        } 
    })
    .then(function(resposta){
        if(resposta.ok !== true){
            limpaSpan()
            let msgErro = resposta.status + '-' + resposta.statusText
            document.querySelector("#erro").textContent = msgErro
        }return resposta
    })
    .then(function(resposta){
        return resposta.json()
    })
    .then(function(usuario){
        return preencheSpan(usuario)
    })
    .catch(function(erro){
        console.log("Erro: ", erro)
    })
})

function limpaSpan(){
    document.querySelector("#Nome").textContent = ""
    document.querySelector("#Email").textContent = ""
    document.querySelector("#Jogo").textContent = ""
}
function preencheSpan(usuario){
    document.querySelector("#Nome").textContent ="Nome: " + usuario.nome
    document.querySelector("#Email").textContent ="Email: " + usuario.email
    document.querySelector("#Jogo").textContent ="Jogo Favorito: " + usuario.jogo
}