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
public function verifLogin(){
    $login =$_POST['logi'];
    $verificationLogin = $this->db->prepare("SELECT login FROM user where login= :logi");
    $verificationLogin->execute(array(
        ':logi'=>$login
    ));
    $verification = $verificationLogin->rowCount();
   echo json_encode($verification);
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
public function connexion($login,$password){
    $select = $this->db->prepare("SELECT * FROM user WHERE login = :login AND password=:password");
    $select->execute(array(
        ':login'=>$login,
        ':password'=>$password
    ));
    $result = $select ->fetch(PDO::FETCH_ASSOC);
    return $result;

}
public function verifConnexion(){
    if (isset($_POST['covalid'])) {
        if (empty($_POST['log']) && empty($_POST['mdp']) ) {
            echo "veuillez remplir les champs";
        }
        $user = new User;
        $client=$user->verifLogin($_POST['logi']);
        if ($client == 0) {
            echo "le login n'existe pas ";
        }
        else{

        }
    }
}



}
$user = new User;
@ $user -> verifLogin($_POST['logi']);