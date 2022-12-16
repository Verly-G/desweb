const formTest = document.querySelector('form')

formTest.addEventListener('submit', (e)=>{
    e.preventDefault()

    fetch('comandoExec.php', {
        method: 'POST',
        body: JSON.stringify(),
        headers: {
            "Content-Type":"application/json;charset=UTF-8"
        }
    })
    .then((resposta) => {
        if(resposta.ok === true){
            
        }
    })
})