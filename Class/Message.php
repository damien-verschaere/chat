<?php
require_once("Bdd.php");



class Message extends Bdd{


private $id;
public  $id_user;
public  $login_user;
public  $message;
public  $date;

function __construct(){
    
    $this->id;
    $this->id_user;
    $this->login_user;
    $this->message;
    $this->date;
    parent::__construct($this->db);

}

public function insertMessage($id_user,$login_user,$message){
    $insert = $this->db->prepare("INSERT INTO `message`(`id_user`, `login_user`, `message`, `date`) VALUES (:idUser,:login,:message,NOW())");
    $insert->execute(array(
        'idUser'=>$id_user,
        ":login"=>$login_user,
        ":message"=>$message,
    ));
}

public function verifMessage($id_user,$login_user,$message){
    
        if (empty($id_user)||empty($login_user)||empty($message)) {
             
        }
        else{
            $chat = new Message ; 
            $envoi=$chat->insertMessage(htmlentities($_POST['idUser']),htmlentities($_POST['login']),htmlentities($_POST['message']));
            echo json_encode($envoi);
        }
    }


public function afficheMessage(){
    $select = $this->db->prepare("SELECT login_user,message,date FROM message order by date DESC ");
    $select->execute();
    $chat= $select->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($chat);

}

}


$test=new message;
@$test->verifMessage($_POST['idUser'],$_POST['login'],$_POST['message']);

$test->afficheMessage();




?>