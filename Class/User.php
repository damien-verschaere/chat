<?php

require_once("Bdd.php");
class User extends Bdd
{

    public $login;
    public $password;
    public $email;
    public $droits;


    function __construct(){
        $this->login;
        $this->password;
        $this->email;
        $this->droits;
        parent::__construct($this->db);
    }

    public function inscription($login, $password, $email){
        $insert = $this->db->prepare("INSERT INTO user (login,password,email,id_droit) VALUES (:logi,:mdp,:mail,2)");
        $insert->execute(array(
            ':logi' => $login,
            ':mdp' => $password,
            ':mail' => $email
        ));
    }
    public function verifLogin($login){
        $verificationLogin = $this->db->prepare("SELECT * FROM user where login= :login");
        $verificationLogin->execute(array(
            ':login' => $login
        ));
        $verification = $verificationLogin->rowCount();
        // var_dump($verification);
        echo json_encode($verification);
    }
    public function verifInscription(){
        if (isset($_POST['valider'])) {
            if (empty($_POST['logi']) || empty($_POST['mdp']) || empty($_POST['mail'])) {
                echo "veuiller remplir tous les champs .";
            } else {
                echo ("passe L42 else ");
                $login       = htmlspecialchars($_POST['logi']);
                $password    = htmlspecialchars(password_hash($_POST['mdp'], PASSWORD_BCRYPT));
                $email       = htmlspecialchars($_POST['mail']);
                $inscription = new User;
                $inscription->inscription($login, $password, $email);
                header('location: ../index.php');
            }
        }
    }
    public function connexion($login){
        $connexion = $this->db->prepare("SELECT * FROM user WHERE login = :login ");
        $connexion->execute(array(
            ":login"     => $login,

        ));
        $user = $connexion->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function verifconnexion($login){
        $verificationLogin = $this->db->prepare("SELECT * FROM user where login= :login");
        $verificationLogin->execute(array(
            ':login' => $login
        ));
        $verification = $verificationLogin->rowCount();
        // var_dump($verification);
       return $verification;
    }
    public function connexionUser(){
        if (isset($_POST['covalid'])) {
            if (empty($_POST['login']) || empty($_POST['password'])) {
                echo "veuillez remplir tous les champs";
            }
            $model = new User;
            $verif = $model->verifconnexion($_POST['login']);
            if ($verif == 0) {
                echo "aucun utilisateur avec ce login";
            } else {
                $user = new User;
                $connexionUser = $user->connexion($_POST['login']);
                if (password_verify(htmlspecialchars($_POST['password'], ENT_QUOTES, "ISO-8859-1"), $connexionUser['password'])) {
                    session_start();
                    $_SESSION['user'] = $connexionUser;
                    header('location: ../index.php');
                } else {
                    echo "login ou mdp incorrect";
                }
            }
        }
    }
    function getUser(){
        $id = $_SESSION['user']['id'];
        $select = $this->db->prepare("SELECT * FROM user WHERE id=$id");
        $select->execute();
        $user = $select->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }
    function updateProfil($login, $email){
        $id = $_SESSION['user']['id'];
        $update = $this->db->prepare("UPDATE user SET login= :login,email=:email WHERE id=$id");
        $update->execute(array(
            ":login" => $login,
            ":email" => $email
        ));
    }
    function verifUpdate(){
        if (isset($_POST['modifier'])) {
            if (empty($_POST['login']) || empty($_POST['email'])) {
                echo "veuillez remplir les champs";
            } else {

                $login = htmlentities($_POST['login']);
                $email = htmlentities($_POST['email']);
                $updateProfil = new User;
                $updateProfil->updateProfil($login,$email);
            }
        }
    }
    function verifUpdatePassword(){
        if (isset($_POST['modifPass'])) {
            if (empty($_POST['ancienMdp'])||empty($_POST['nouveauMdp'])) {
                echo "veuillez remplir les champs password.";
                
            }
            else{
                echo "Ligne 118";
                $user = new User;
                $verif = $user->getUser();
                if (password_verify(htmlspecialchars($_POST['ancienMdp'], ENT_QUOTES, "ISO-8859-1"), $verif[0]['password'])) {
                    $verifPassword = htmlspecialchars(password_hash($_POST['nouveauMdp'], PASSWORD_BCRYPT));
                    $update = new User;
                    $update->updatePassword($verifPassword);
                }
                
            }
        }
     
    }
    function updatePassword($password){
        $id=$_SESSION['user']['id'];
        $updatePass =$this->db->prepare("UPDATE user SET password= :nouveauMdp  WHERE id=$id ");
        $updatePass->execute(array(
            ":nouveauMdp"=>$password,
        ));
    }
}
$user = new User;
@$user->verifLogin($_POST['login']);
