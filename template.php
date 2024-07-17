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
    <link rel="stylesheet" href="../public/css/template.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=M+PLUS+1p&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e33af3981e.js" crossorigin="anonymous"></script>
    <title><?= htmlspecialchars($title) ?></title>
</head>

<body>
    <header>
        <!-- Navbar PC -->
        <nav class="navPc">
            <div class="GroupeLeft">
                <a href="index.php">ACCUEIL</a>
                <a href="classement.php">CLASSEMENT</a>
            </div>

            <img class="logoJo" src="./public/images/LOGO JO 1.svg" alt="Logo des jeux olympiques">

            <div class="GroupeRight">
                <a href="#">INFORMATIONS</a>
                <a href="login.php">CONNEXION</a>
                <?php if (isset($_SESSION['idUtilisateur'])) : ?>
                    <a class="navProfil" href="profil.php">MON PROFIL</a>
                <?php endif; ?>
            </div>
        </nav>

        <!-- Navbar mobile -->
        <nav class="navTel">
            <div class="burger" id="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="menu" id="menu">
                <a href="index.php">ACCUEIL</a>
                <a href="classement.php">CLASSEMENT</a>
                <a href="#">INFORMATIONS</a>
            </div>

            <img class="logoJo" src="./public/images/LOGO JO 1.svg" alt="Logo des jeux olympiques">

            <div class="profil" id="profil">
                <i class="fa-solid fa-user" style="color: #ffffff;"></i>
            </div>
        </nav>
    </header>


    <!-- CONTENU PRINCIPAL DE LA PAGE -->
    <?= $content ?>

    <footer>
        <div>
            <img src="public/images/LOGO JO 1.svg" alt="icone logo jo ">
        </div>

        <div class="containerLinksReseaux">

            <div class="footerLinks">
                <h4>Jeux Olympiques</h4>
                <div>
                    <a href="index.php">ACTUALITÉS</a>
                    <a href="classement.php">HISTOIRE</a>
                    <a href="#">EPREUVES</a>
                    <a href="#">BILLETERIE</a>
                    <a href="#">CLASSEMENT</a>
                </div>
            </div>


            <div class="reseaux">
                <div>
                    <h2>ON RESTE EN CONTACT ?</h2>
                </div>
                <div class="mesReseaux">
                    <div><a href="https://github.com/DelannoyAxel" target="_blank"><img src="public/images/github.svg" alt="GitHub"></a></div>
                    <div><a href="https://discordapp.com/users/325593412336353280" target="_blank"><img src="public/images/discord.svg" alt="Discord"></a></div>
                    <div><a href="https://www.linkedin.com/in/axel-delannoy-b1b0a6262/" target="_blank"><img src="public/images/linkedin.svg" alt="LinkedIn"></a></div>
                </div>
            </div>
        </div>
     


        <div class="royalties">
            <p>Par Royalties — https://www.paris2024.org/fr/</p>
            <a href="">Mentions légals</a>
            <a href="">Plan du site</a>
            <a href="">Politique des cookies</a>
        </div>

    </footer>

    <script src="public/js/style.js"></script>
</body>

</html>