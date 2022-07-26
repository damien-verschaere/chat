<?php 
session_start();
require ("./assets/templates/header.php") ;
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
            <a href="index.php">Accueil</a>
                <?php if (empty($_SESSION['user'])) {?>
                    <a href="views/Inscription.php">Inscription</a>
                    <a href="views/connexion.php">Connexion</a><?php
                }
                elseif (isset($_SESSION['user'])) {?>
                    <a href="views/chat.php">Chat</a>
                    <a href="views/profil.php">Profil</a>
                    <a href="deco.php">deconnexion</a>
                    <?php
                    if ($_SESSION['user']['id_droit']==1) {?>
                        <a href="views/admin.php">Admin</a><?php
                    }
                } ?> 

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