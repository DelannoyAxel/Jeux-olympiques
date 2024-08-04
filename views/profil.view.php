<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../public/css/template.css">
    <link rel="stylesheet" href="../public/css/style.css"> -->
    <link rel="stylesheet" href="../public/css/profil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=M+PLUS+1p&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e33af3981e.js" crossorigin="anonymous"></script>
    <title>Mon profil</title>
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
                <a href="#">BILLETERIE</a>
                <?php if (isset($_SESSION['id'])) : ?>
                    <a href="" class="btnMonCompte">MON COMPTE ↓</a>
                    <div class="menuHiddenCompte">
                        <ul>
                            <li><a href="">Votre compte</a></li>
                            <li><a href="<?= URL ?>logout">Déconnexion</a></li>
                        </ul>
                    </div>
                <?php else : ?>
                    <a href="<?= URL ?>login">CONNEXION</a>
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
                <a href="#">BILLETERIE</a>
            </div>

            <img class="logoJo" src="./public/images/LOGO JO 1.svg" alt="Logo des jeux olympiques">

            <div class="profil" id="profil">
                <?php if (isset($_SESSION['id'])) : ?>
                    <a href="" class="btnMonCompte"><i class="fa-solid fa-user" style="color: #D6C278;"></i></a>
                    <div class="menuHiddenCompte">
                        <ul>
                            <li><a href="">Votre compte</a></li>
                            <li><a href="<?= URL ?>logout">Déconnexion</a></li>
                        </ul>
                    </div>
                <?php else : ?>
                    <a href="<?= URL ?>login"><i class="fa-solid fa-user" style="color: #ffffff;"></i></a>
                <?php endif; ?>

            </div>
        </nav>
    </header>

    <section class="profilSection">
        <h2>Mon profil</h2>
        <div id="profilDetails">
            <div>
                <label for="nom">Nom :</label>
                <p id="nom"><?= htmlspecialchars($user["nom"] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div>
                <label for="prenom">Prénom :</label>
                <p id="prenom"><?= htmlspecialchars($user["prenom"] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div>
                <label for="email">Email :</label>
                <p id="email"><?= htmlspecialchars($user["email"] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div>
                <button id="editButton">Modifier mes informations personnelles</button>
            </div>
            <?php if (isset($_SESSION['success_message'])) : ?>
                <div id="success-message"><?= $_SESSION['success_message']; ?></div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="profilSectionUpdate">
        <h2>Mon profil</h2>

        <form id="profilForm" action="<?= URL ?>profil" method="POST">
            <div>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($user["nom"] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($user["prenom"] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div>
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($user["email"] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div>
                <label for="password">Nouveau mot de passe :</label>
                <input type="password" id="password" name="password" placeholder="Laissez vide si inchangé">
            </div>
            <div>
                <button id="majProfil" type="submit">Mettre à jour</button>
            </div>
        </form>
        <?php if (isset($_SESSION['success_message'])) : ?>
            <div id="success-message"><?= $_SESSION['success_message']; ?></div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>
    </section>

    <section>
        <a href="<?= URL ?>logout">Déconnexion</a>
        <?php if (isset($isAdmin) && $isAdmin): ?>
            <a href="<?= URL ?>crud">CRUD</a>
        <?php endif; ?>
    </section>

    <script src="public/js/style.js"></script>
</body>

</html>