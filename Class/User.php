<?php

require_once("Bdd.php");
class User extends Bdd{

public $login;
public $password;
public $email;


function __construct(){
    $this->login;
    $this->password;
    $this->email;
    parent::__construct($this->db);

}

public function inscription($login,$password,$email){
    $insert = $this->db->prepare("INSERT INTO user (login,password,email) VALUES (:logi,:mdp,:mail)");
    $insert ->execute(array(
        ':logi'=>$login,
        ':mdp'=>$password,
        ':mail'=>$email
    ));
}
public function verifLogin($login){
    $verificationLogin = $this->db->prepare("SELECT * FROM user where login= :login");
    $verificationLogin->execute(array(
        ':login'=>$login
    ));
    $verification = $verificationLogin->rowCount();
    // var_dump($verification);
    return $verification;
}
public function verifInscription(){
    if (isset($_POST['valider'])) {
        if (empty($_POST['logi'])|| empty($_POST['mdp'])||empty($_POST['mail'])) {
           echo "veuiller remplir tous les champs .";
        }
        else{
            echo ("passe L42 else ");
            $login       = htmlspecialchars($_POST['logi']);
            $password    = htmlspecialchars(password_hash($_POST['mdp'],PASSWORD_BCRYPT));
            $email       = htmlspecialchars($_POST['mail']);
            $inscription = new User ;
            $inscription->inscription($login,$password,$email);
            header('location: ../index.php');
        }
    }
}
public function connexion($login){
    $connexion = $this->db->prepare("SELECT * FROM user WHERE login = :login ");
    $connexion ->execute(array(
        ":login"     => $login,
     
    ));
    $user = $connexion->fetch(PDO::FETCH_ASSOC);
    return $user;
}
public function connexionUser(){
    if (isset($_POST['covalid'])) {
        if (empty($_POST['login']) || empty($_POST['password'])) {
            echo "veuillez remplir tous les champs";
        }
        $model = new User;
        $verif = $model->verifLogin($_POST['login']);
        if ($verif == 0) {
            echo "aucun utilisateur avec ce login";
            
        }
        else {
            $user = new User;
            $connexionUser = $user->connexion($_POST['login']);
            if(password_verify(htmlspecialchars($_POST['password'],ENT_QUOTES,"ISO-8859-1"),$connexionUser['password'])) {
                session_start();
                $_SESSION['user'] = $connexionUser ; 
                header('location: ../index.php');
            }
        
            else{
                echo "login ou mdp incorrect";
            }
        }
    }
}



}
$user = new User;
@ $user -> verifLogin($_POST['logi']);