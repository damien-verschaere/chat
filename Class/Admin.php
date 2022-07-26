<?php

require_once('Bdd.php');

class Admin extends Bdd {
   public $id_droit;

    function __construct(){
        $this->id_droit;
        parent::__construct($this->db);
    }

    function createCanal($nom){
        $insert = $this->db->prepare("INSERT INTO channel (nom) values(:nomCanal)");
        $insert->execute(array(
            ":nomCanal"=>$nom,
        ));
    }
    function verifCreation(){
        if (isset($_POST['creerCanal'])) {
            if (empty($_POST['nomCanal'])) {
                echo "le canal doit avoir un nom ";
            }
            else{
                $nom = htmlentities($_POST['nomCanal']);
                $admin = new Admin;
                $admin->createCanal($nom);
            }
        }
    }
function getAllUser(){
    $select = $this->db->prepare("SELECT * FROM user");
    $select->execute();
    $affichage= $select ->fetchAll(PDO::FETCH_ASSOC);
    return $affichage;
}
function afficheUserAdmin(){
    $admin = new Admin;
    $affiche=$admin ->getAllUser();
    foreach ($affiche as $key ) {?>
       <tr>
           <td><?= $key['id']?></td>
           <td><input type="text" value="<?= $key['id_droit']?>"></td>
           <td><?= $key['login']?></td>
           <td><?= $key['email']?></td>
         
           <td><input type="button" id="deleteUser" value="supprimer"><input type="button"id="modifUser"value="modifier" ></td>
        </tr> <?php
    }
}
function getAllCanal(){
    $select = $this->db->prepare("SELECT * FROM channel");
    $select->execute();
    $affichage= $select ->fetchAll(PDO::FETCH_ASSOC);
    return $affichage;
}
function afficheCanaux(){
    $admin = new Admin;
    $affiche=$admin ->getAllCanal();
    foreach ($affiche as $key ) {?>
       <tr>
           <td><?= $key['id']?></td>
           <td><?= $key['nom']?></td>
           <td><input type="checkbox" value="<?= $key['id'] ?>"></td>
           
        </tr> <?php
    }
}
function selectCanaux(){
    $admin = new Admin;
    $affiche=$admin ->getAllCanal();
    foreach ($affiche as $key) {?>
    <option value="<?= $key['id']?>"><?= $key['nom']?></option>
     <?php
    }
}
}
