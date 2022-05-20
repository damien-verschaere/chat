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

public function Inscription($login,$password,$email){
    $insert = $this->db->prepare("INSERT INTO USER (login,password,email) VALUES (:login,:password,:email)");
    $insert ->execute(array(
        ':login'=>$login,
        ':password'=>$password,
        ':email'=>$email
    ));
}
public function verifLogin(){
    $login =$_POST['login'];
    $verificationLogin = $this->db->prepare("SELECT login FROM user where login= :login");
    $verificationLogin->execute(array(
        ':login'=>$login
    ));
    $verification = $verificationLogin->rowCount();
    echo $verification;
}
}
$user = new User;
@ $user -> verifLogin();