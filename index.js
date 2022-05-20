document.addEventListener("DOMContentLoaded", () => {
    let login = document.getElementById('login')
    let password = document.querySelector("#password")
    let vpass = document.querySelector("#vPassword")
    let email = document.querySelector("#email")
    let regexLowerCase = /[a-z]+/;
    let regexUpperCase = /[A-Z]+/;
    let regexMail = /.+\@.+\..+/;
    let formData = new FormData
    
    function verifLogin() {
        let erreurLogin = document.querySelector("#erreurLogin")
        login.addEventListener('keyup', () => {
            if (regexLowerCase.test(login.value) == false || regexUpperCase.test(login.value) == false) {
                if (erreurLogin.innerHTML.length == 0) {
                    erreurLogin.innerHTML = "X Votre nom doit contenir une minuscule et une majuscule"
                }

            }
            else {
                erreurLogin.innerHTML = ""
                document.getElementById("login").style.border = "thick solid green"
                return true
            }
        })

    }
    function verifBdd() {
        let result;
        let erreurLogin = document.querySelector("#erreurLogin")
        login.addEventListener('blur', () => {
            log = login.value
            console.log(log)
            formData.append("login", encodeURIComponent(log))
            fetch("../Class/User.php", {
                method: "POST",
                body: formData,
            }).then(reponse => reponse.json()).then(rep => result = rep)
            if (result != 0) {
                erreurLogin.innerHTML = "X le login existe deja"
            }
            else {
                erreurLogin.innerHTML = ""
            }
        })


    }
    function verifEmail() {
        let erreurMail = document.querySelector("#erreurEmail")
        email.addEventListener('keyup', () => {
            if (regexMail.test(email.value) == false) {
                erreurMail.innerHTML = "X Veuillez rentrer un Email Valide"
            } else {
                erreurMail.innerHTML = ""
                document.getElementById("email").style.border = "thick solid green"
                return true
            }
        })
    }

    function verifPassword() {
        let erreurPassword = document.getElementById("erreurPassword")
        password.addEventListener('keyup', () => {
            console.log(password.value)
            if (regexLowerCase.test(password.value) == false || regexUpperCase.test(password.value) == false) {
                erreurPassword.innerHTML = "X Le mot de passe doit contenir une majuscule et une minuscule"
            }
            else {
                erreurPassword.innerHTML = ""
                document.getElementById("password").style.border = "thick solid green"
                return true
            }
        })
    }
    function verifPassVpass() {
        let verifpass = document.getElementById("erreurVpass")
        vpass.addEventListener('keyup', () => {
            if (vpass.value != password.value) {
                verifpass.innerHTML = "X les mots de passes de correspondent pas "
            }
            else {
                verifpass.innerHTML = ""
                document.getElementById("vPassword").style.border = "thick solid green"
                return true
            }
        })
    }

    function verifAllOk() {
        if (verifLogin() == true , verifEmail() == true , verifPassword() == true , verifPassVpass() == true) {
        vpass.addEventListener('blur', () => {
            console.log("rvent L97")
            
                console.log("L96 verif ok")
                inscription.disabled = false
            


        })
    }

    }



    verifAllOk()
    verifBdd()
    // verifPassVpass()
    // verifPassword()
    // verifLogin()
    // verifEmail()
})