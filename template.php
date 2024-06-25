<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=M+PLUS+1p&display=swap" rel="stylesheet">
    <title><?php $title ?> </title>
</head>

<body>
    <header>
        <!-- Navbar PC -->
        <nav class="navPc">
            <div class="GroupeLeft">
                <a href="index.php">ACCEUIL</a>
                <a href="classement.php">CLASSEMENT</a>
            </div>

            <img class="logoJo" src="./public/images/LOGO JO 1.svg" alt="Logo des jeux olympiques">
            </a>

            <div class="GroupeRight">
                <a href="#">INFORMATIONS</a>
                <a href="login.php">CONNEXION</a>
                <?php if (isset($_SESSION['idUtilisateur'])) : ?>
                    <a class="navProfil" href="profil.php">MON PROFIL</a></li>
                <?php endif; ?>
            </div>
        </nav>

        <!-- Navbar mobile -->
        <nav class="navTel">
            <div class="GroupeLeft">
                <!-- icone burger -->
            </div>

            <img class="logoJo" src="./public/images/LOGO JO 1.svg" alt="Logo des jeux olympiques">
            </a>

            <div class="GroupeRight">
                <!-- icone profil  -->
            </div>
        </nav>

        
            <h1> <?php $titrePrincipal ?> </h1>
        
    </header>

    <!-- CONTENU PRINCIPAL DE LA PAGE -->
    <?= $content ?>

    <footer>
        <div>
            <p>Axel Delannoy @All right reserved</p>
            <p>Par Royalties — https://www.paris2024.org/fr/, marque déposée, https://fr.wikipedia.org/w/index.php?curid=11309986</p>
        </div>
    </footer>
</body>

</html>