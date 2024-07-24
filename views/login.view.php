<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/connexion.css">
    <title>Document</title>
</head>

<body>

    <div class="logoAccueil">
        <a href="accueil"><img class="logoJo" src="./public/images/LOGO JO 1.svg" alt="Logo des jeux olympiques"></a>
    </div>

    <div class="login-container">
        <?php if (isset($error)) : ?>
            <p class="error"><?= htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required>

            <label for="pwd">Password :</label>
            <input type="password" name="pwd" id="pwd" required>
            <input type="submit" value="Connexion">
        </form>
    </div>

</body>

</html>