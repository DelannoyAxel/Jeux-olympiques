<?php
session_start();
require 'dbConnect.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    
    // Connexion
    if (isset($_POST['login'])) {
        $password = $_POST['password'];
        $query = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $query->execute([$email]);
        $user = $query->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Email ou mot de passe incorrect.";
        }
    }
    // Inscription
    elseif (isset($_POST['register'])) {
        $name = $_POST['name'];
        $title = $_POST['title'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $query = $pdo->prepare("INSERT INTO users (email, password, name, title) VALUES (?, ?, ?, ?)");
        if ($query->execute([$email, $password, $name, $title])) {
            $_SESSION['user_id'] = $pdo->lastInsertId();
            header("Location: index.php");
            exit();
        } else {
            $error = "Une erreur s'est produite lors de la création du compte.";
        }
    }
}

// Vérification de l'email
$email_exists = false;
if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    $query = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);
    $email_exists = $query->fetch();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion / Inscription</title>
    <style>
        /* Style de base */
    </style>
</head>
<body>
    <div id="form-container">
        <?php if ($email_exists): ?>
            <form action="login_register.php" method="post">
                <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" name="login">Connexion</button>
            </form>
        <?php else: ?>
            <form action="login_register.php" method="post">
                <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
                <label for="name">Prénom</label>
                <input type="text" id="name" name="name" required>
                
                <label for="password">Créer un mot de passe</label>
                <input type="password" id="password" name="password" required>
                
                <label for="title">Sélectionnez le titre</label>
                <select id="title" name="title">
                    <option value="mr">Monsieur</option>
                    <option value="mrs">Madame</option>
                    <option value="miss">Mademoiselle</option>
                </select>
                
                <button type="submit" name="register">Créer un compte</button>
            </form>
        <?php endif; ?>
    </div>
    <?php if ($error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</body>
</html>
