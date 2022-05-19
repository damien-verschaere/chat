document.addEventListener("DOMContentLoaded", () => {
console.log("bijour")
let login          = document.getElementById('login')
let password       = document.querySelector("#password")
let vpass          = document.querySelector("#vPassword")
let email          = document.querySelector("#email") 
let regexLowerCase = /[a-z]+/;
let regexUpperCase = /[A-Z]+/;
let regexMail = /.+\@.+\..+/;
let formData = new FormData





function verifLogin() {
    let erreurLogin    = document.querySelector("#erreurLogin")
    login.addEventListener('keyup',()=>{
        if (regexLowerCase.test(login.value) == false || regexUpperCase.test(login.value) == false) {
            if (erreurLogin.innerHTML.length == 0) {
                erreurLogin.innerHTML = "Votre nom doit contenir une minuscule et une majuscule"
            }
      
        } 
        else {
            erreurLogin.innerHTML = ""
           document.getElementById("login").style.border = "thick solid green" 
           return true
        }
    })
    
}
function verifBdd(){
   
        let erreurLogin    = document.querySelector("#erreurLogin")
        login.addEventListener('blur',()=>{
            log = login.value
            formData.append("login",encodeURIComponent(log))
            fetch("Class/User.php",{
               method:"POST",
               body:formData, 
            }).then(reponse=>reponse.json()).then(rep=>console.log(rep))
        })
    
   
}
function verifEmail(){
    let erreurMail    = document.querySelector("#erreurEmail")
    email.addEventListener('keyup',()=>{
        if (regexMail.test(email.value)== false) {
                erreurMail.innerHTML = "Veuillez rentrer un Email Valide"
        }else{
            erreurMail.innerHTML=""
            document.getElementById("email").style.border= "thick solid green"
        }
    })
}

function verifPassword(){
    let erreurPassword = document.getElementById("erreurPassword")
    password.addEventListener('keyup',()=>{
        console.log(password.value)
        if (regexLowerCase.test(password.value) == false || regexUpperCase.test(password.value) == false) {
                erreurPassword.innerHTML="Le mot de passe doit contenir une majuscule et une minuscule"
        } 
        else {
            erreurPassword.innerHTML = ""
           document.getElementById("password").style.border = "thick solid green" 
        }
    })
}
function verifPassVpass(){
    let verifpass = document.getElementById("erreurVpass")
    vpass.addEventListener('keyup',()=>{
        if (vpass.value != password.value) {
            verifpass.innerHTML="les mots de passes de correspondent pas "
        }
        else{
            verifpass.innerHTML=""
            document.getElementById("vPassword").style.border = "thick solid green" 
        }
    })
}




verifBdd()
verifPassVpass()
verifPassword()
verifLogin()
verifEmail()
})