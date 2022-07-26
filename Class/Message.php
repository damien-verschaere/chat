<?php
require_once("Bdd.php");



class Message extends Bdd{


private $id;
public  $id_user;
public  $id_channel;
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

public function insertMessage($id_channel,$id_user,$login_user,$message){
    $insert = $this->db->prepare("INSERT INTO `message`(`id_channel`,`id_user`, `login_user`, `message`, `date`) VALUES (:idCanale,:idUser,:login,:message,NOW())");
    $insert->execute(array(
        ":idCanale"=>$id_channel,
        'idUser'=>$id_user,
        ":login"=>$login_user,
        ":message"=>$message,
    ));
}

public function verifMessage($id_channel,$id_user,$login_user,$message){
    
        if (empty($id_user)||empty($login_user)||empty($message)|| empty($id_channel)) {
             echo "MESSAGE VIDE ";
        }
        elseif ($_POST['choixCanal'] = 0) {
            echo "veuillez choisir un canal ";
        }
        else{
            $chat = new Message ; 
            $envoi=$chat->insertMessage(htmlentities($_POST['idCanal']),htmlentities($_POST['idUser']),htmlentities($_POST['login']),htmlentities($_POST['message']));
            echo json_encode($envoi);
        }
    }


public function afficheMessage($id_channel){
    $select = $this->db->prepare("SELECT login_user,message,date FROM message WHERE id_channel=:idCanal order by date DESC ");
    $select->execute(array(
        "idCanal"=>$id_channel
    ));
    $chat= $select->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($chat);

}


}



if( @ $_GET['complete']==1){
    $test=new message;
    @$test->verifMessage($_POST['idCanal'],$_POST['idUser'],$_POST['login'],$_POST['message']); 
}


if( @ $_GET['complete']==2){
    $test=new message;
    @ $test->afficheMessage($_POST['idCanal']);
}





?>