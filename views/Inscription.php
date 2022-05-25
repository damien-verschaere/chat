<?php 
require ("../assets/templates/header2.php") ;
require_once("../Class/User.php");
$user = new User;
$user ->verifInscription();



?>
<script src="../index.js"></script>
    <title>DAMCORD</title>
</head>
<body>
<header>    
    
        <nav class="drop">
            <!-- menu drop vers les liens des pages  -->
            <button class="dropbutton">MENU</button>
            <div class="container-button">
                <a href="../index.php">Accueil</a>
                <a href="inscription.php">Inscription</a>
                <a href="connexion.php">Connexion</a>
                <a href="chat.php">CHAT</a>
            </div>
        </nav>
    </header>
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