<?php
class Bdd{

    protected $db;
    function __construct(){
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=littlediscord;charset=utf8','root','');
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Echec de la connexion : ' . $e->getMessage();
            exit;
        }
    }
}