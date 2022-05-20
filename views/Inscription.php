<?php 
require ("../assets/templates/header2.php") ;
require_once("../Class/User.php");
$user = new User;
$user ->verifInscription();



?>

<main id="inscription">
    <form method="post" id="formInscription">
        <input type="text" id="login" placeholder="login" name="logi">
        <p id="erreurLogin"></p>
        <input type="email" id="email" placeholder="email@email.com" name="mail">
        <p id="erreurEmail"></p>
        <input type="password" id="password" placeholder="password" name="mdp">
        <p id="erreurPassword"></p>
        <input type="password" id="vPassword" placeholder="verification password">
        <p id="erreurVpass"></p>
        <input type="submit" value="S'inscrire" id="validInscription" name="valider">
        
    </form>

</main>
<footer>

</footer>