<?php 

require_once("../Class/User.php");
$user = new User;
$user->connexionUser();

?>
    <?php require("../assets/templates/header2.php") ?>
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
    <main id="connexion">
        <form method="post" id="formConnexion">
        <input type="text" placeholder="login" name="login">
                <input type="password" placeholder="password" name="password">
            <input type="submit" id="validConnexion" name="covalid" value="se connecter">
        </form>
    </main>
</body>
</html>