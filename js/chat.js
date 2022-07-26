document.addEventListener("DOMContentLoaded",()=>{

let textarea   = document.getElementById('textChat')
let chatButton = document.getElementById('sendChat')
let section   = document.getElementById('chat') 
let userLogin  = document.getElementById('nameUser')
let idUser     = document.getElementById("idUser").value
let formdata   = new FormData
let select = document.querySelector("#choixCanal")
let sendMessage = document.querySelector('#sendChat')
let idCanal
let tab = []
let tab2 = []



sendMessage.addEventListener('click',()=>{
    if (select.value == NAN) {
        alert("chosir un canl svp ");
    }
})


function getMessage(){
    chatButton.addEventListener('click',()=>{
        let nom  = userLogin.value
        let chat = textarea.value
        let idCanale=document.querySelector("#choixCanal").value
        console.log(idCanale)
        formdata.append("idCanal",idCanale)
        formdata.append("idUser",idUser)
        formdata.append("login",nom)
        formdata.append("message",chat)
        fetch("../Class/Message.php?complete=1",{
            method:"POST",
            body:formdata
        }).then(reponse=>reponse.json())
        textarea.value=""
    })
    
}

function afficheMessage() {
    section.innerHTML=""
    idCanal = document.querySelector("#choixCanal").value
    formdata.append("idCanal",encodeURI(idCanal))
    fetch("../Class/Message.php?complete=2",
        {
            method: 'POST',
            body: formdata,
        })
        .then(response => response.json())
        .then((results) => results.forEach((element) => tab.push(element)))
        .then(function () {
            tab.forEach((element) =>
            section.innerHTML += `<p>${element.date} ${element.login_user} dit : ${element.message}</p>` 
            );

        })
}
function check() {
    idCanal = document.querySelector("#choixCanal").value
    formdata.append("idCanal",encodeURI(idCanal))
    fetch("../Class/Message.php?complete=2",
        {
            method: 'POST',
            body: formdata,
        })
        .then(response => response.json())
        .then((results) => results.forEach((element) => tab2.push(element)))
        .then(function () {
            if (tab === tab2) {
                return
            } else {
                section.innerHTML = ''
                tab = tab2
                tab2 = []
                tab.forEach((element) =>  section.innerHTML += `<p>${element.date} ${element.login_user} dit : ${element.message}</p>` 
            );
            }
            setTimeout(check, 1);
        })
}

    afficheMessage()
   getMessage() 
    check()

    
})