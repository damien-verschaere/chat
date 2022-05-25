<?php

session_start();
var_dump($_SESSION['user']['id']);
require('../Class/Message.php');
$message= new Message;

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
                <a href="inscription.php">Inscription</a>
                <a href="connexion.php">Connexion</a>
                <a href="chat.php">CHAT</a>
            </div>
        </nav>
    </header>
    <input type="hidden" id="idUser" value="<?= $_SESSION['user']['id'] ?>">
    <input type="hidden" id="nameUser" value="<?= $_SESSION['user']['login'] ?>">
    <main id="mainChat">

        <section id="chat" class="tchat">
            
        </section>
        <div id="userChat">
        <form method="post" class="formchat">
            <textarea id="textChat"> </textarea>
            <input type="button" id="sendChat" name="sendMessage" value="envoyer">
        </form>
    </div>
    </main>
    