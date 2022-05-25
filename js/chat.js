document.addEventListener("DOMContentLoaded",()=>{

let textarea   = document.getElementById('textChat')
let chatButton = document.getElementById('sendChat')
let chatView   = document.getElementById('chat') 
let userLogin  = document.getElementById('nameUser')
let idUser     = document.getElementById("idUser").value
let formdata   = new FormData






function getMessage(){
    chatButton.addEventListener('click',()=>{
        // console.log(textarea.value)
        let nom  = userLogin.value
        let chat = textarea.value
        formdata.append("idUser",idUser)
        formdata.append("login",nom)
        formdata.append("message",chat)
        fetch("../Class/Message.php",{
            method:"POST",
            body:formdata
        }).then(reponse=>reponse.json()).then(rep=>console.log(rep))
       
        textarea.value=""
    })
}

function afficheMessage(){

    let section = document.getElementById('chat')
    section.innerHTML=""
    fetch("../Class/Message.php",{
        method:"POST"
    }).then(reponse=>reponse.json()).then((rep)=>rep.forEach((element) => {
        
        section.innerHTML += `<p>${element.date} ${element.login_user} dit : ${element.message}<p>`
        
    }))

 
}
console.log()
   setInterval(afficheMessage,1000)
    // afficheMessage()
   getMessage() 
    

    
})