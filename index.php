<?php 
session_start();

require ("./assets/templates/header.php") ; ?>
<script src="../index.js"></script>
    <title>DAMCORD</title>
</head>
<body>
<header>    
    
        <nav class="drop">
            <!-- menu drop vers les liens des pages  -->
            <button class="dropbutton">MENU</button>
            <div class="container-button">
                <a href="index.php">Accueil</a>
                <a href="views/Inscription.php">Inscription</a>
                <a href="views/connexion.php">Connexion</a>
                <a href="views/chat.php">CHAT</a>
            </div>
        </nav>
    </header>
    <div class="logoaccueil">
        <img src="./assets/image/capture.PNG" alt="">
    </div>
    <main>

    </main>
    <footer>

    </footer>
</body>
</html>