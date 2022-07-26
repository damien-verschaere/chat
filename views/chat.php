<?php

session_start();
require_once('../Class/Message.php');
require_once('../Class/Admin.php');
$message= new Message;
$admin = new Admin;
?>


<?php require("../assets/templates/header2.php"); ?>
<script src="../js/chat.js"></script>
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
    </header>
    <input type="hidden" id="idUser" value="<?= $_SESSION['user']['id'] ?>">
    <input type="hidden" id="nameUser" value="<?= $_SESSION['user']['login'] ?>">
    <main id="mainChat">
        <select name="" id="choixCanal">
            <option value="">chosir un canal</option>
            <?php $admin->selectCanaux() ?>
        </select>
        <section id="chat" class="tchat">
            
        </section>
        <div id="userChat">
        <form method="post" class="formchat">
            <textarea id="textChat"> </textarea>
            <input type="button" id="sendChat" name="sendMessage" value="envoyer">
        </form>
    </div>
    </main>
    