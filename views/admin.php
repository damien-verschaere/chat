<?php
session_start();
require_once('../Class/Admin.php');
$admin = new Admin;
?>
<?= require('../assets/templates/header2.php') ?>
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
                    
                } 
                if ($_SESSION['user']['id_droit']==1) {?>
                    <a href="admin.php">Admin</a><?php
                }
                ?> 

            </div>
        </nav>
    </header>
    <main id="mainAdmin">
        <form id="creerCanal" method="post">
            <label for="nomCanal">nom du canal :
            <input type="text" name="nomCanal" placeholder="nom du canal">
            </label>
            <input type="submit" name="creerCanal">
            <?= $admin->verifCreation() ?>
        </form>
        <section id="tableauAdmin">
            <table>
                <thead>
                    <tr>
                        <th colspan="4">Liste Utilisateur</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?= $admin->afficheUserAdmin() ?>
                    </tr>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <th colspan="3">Liste Canaux</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?= $admin->afficheCanaux() ?>
                    </tr>
                </tbody>
            </table>
        </section>

    </main>