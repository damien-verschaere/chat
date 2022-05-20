<?php 

require_once("../Class/User.php");


?>
    <?php require("../assets/templates/header2.php") ?>
    <main id="connexion">
        <form method="post" id="formConnexion">
            <input type="text" id="login" name="log" placeholder="login">
            <input type="password" id="password" name="mdp" placeholder="password">
            <input type="submit" id="validConnexion" name="covalid" value="se connecter">
        </form>
    </main>
</body>
</html>