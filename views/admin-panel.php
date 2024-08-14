<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/admin-panel.css">
    <link rel="stylesheet" href="../public/css/page-crud.css">
    <script src="https://kit.fontawesome.com/e33af3981e.js" crossorigin="anonymous"></script>

    
    <title><?= htmlspecialchars($title) ?></title>

</head>

<body>
    <section>
        <div class="admin-panel">
            <nav class="sidebar">
                <a href=<?= URL. 'accueil'?>><img class="logoJo" src="../public/images/LOGO JO 1.svg" alt="Logo des jeux olympiques"></a>
                <h2>Panneau Admin</h2>
                <ul>
                    <li><a href=<?= URL . 'accueil'?>>Accueil</a></li>
                    <li><a href=<?= URL . 'user'?>>Utilisateurs</a></li>
                    <li><a href=<?= URL . 'classementCrud'?>>Classements</a></li>
                    <li><a href=<?= URL . 'equipeCrud'?>>Équipes</a></li>
                    <li><a href=<?= URL . 'participantCrud'?>>Participants</a></li>
                    <li><a href="profil">Mon compte</a></li>
                    <li><a href="logout">Deconnexion</a></li>
                </ul>
            </nav>
        </div>


        <?= $content ?>
    </section>

    <script src="public/js/style.js"></script>
</body>

</html>