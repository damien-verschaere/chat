<?php

session_start();
require_once("../Class/User.php");
$user = new User;
$test=$user->getUser();

?>
<script src="../js/profil.js"></script>
<?php require("../assets/templates/header2.php"); ?>
<title>DAMCORD</title>
</head>
<body>
    <header>

    <nav class="drop">
            <!-- menu drop vers les liens des pages  -->
            <button class="dropbutton">MENU</button>
            <div class="container-button">
            <a href="../index.php">Accueil</a>
                <?php if (empty($_SESSION['user'])) {?>
                    <a href="Inscription.php">Inscription</a>
                    <a href="connexion.php">Connexion</a><?php
                }
                elseif (isset($_SESSION['user'])) {?>
                    <a href="chat.php">Chat</a>
                    <a href="profil.php">Profil</a>
                    <a href="../deco.php">deconnexion</a>
                    <?php
                    if ($_SESSION['user']['id_droit']==1) {?>
                        <a href="admin.php">Admin</a><?php
                    }
                } ?> 

            </div>
        </nav>
    <main id="profil">
        <form action="" method="POST" id="formProfil">
            <input type="text" value="<?= $test[0]['login'] ?>"name="login">
            <input type="text" value="<?= $test[0]['email']?>"name="email">
            <input type="submit" name="modifier" value="modifier">
            <input type="button" id="myBtn" value="modifier password">
            <?php $user->verifUpdate() ?>
            
        </form>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Modification password</h2>
                <form  id="updatepassword" method="POST">
                <input type="password" placeholder="ancien password" name="ancienMdp">
                <input type="password" placeholder="nouveau  password" name="nouveauMdp">
                <input type="submit" name="modifPass" id="modifPassword" value="modifier">
                <?php $user ->verifUpdatePassword()?>
                </form>
            </div>

        </div>



    </main>