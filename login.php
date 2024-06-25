<?php

ob_start();
require_once "dbConnect.php";

if (isset($_POST['pwd'], $_POST['email'])) {
    $mdp = $_POST['pwd'];
    $email = $_POST['email'];
    $pdo = getPDOConnexion();
    $stmt = $pdo->prepare('SELECT id, motDePasse, email FROM UTILISATEUR WHERE email = ?');
    $stmt->execute([$email]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {
        if (password_verify($mdp, $utilisateur['motDePasse'])) {
            session_start();

            $_SESSION['id'] = $utilisateur['id'];
            $_SESSION['email'] = $utilisateur['email'];

            echo "Vous êtes bien connecté. Vous allez être redirigé vers la page d'accueil dans 2 secondes...";
            header("refresh:2;url=index.php");
            exit();
        } else {
            echo "Identifiant ou mot de passe incorrect.";
        }
    } else {
        echo "Identifiant ou mot de passe de merde.";
    }
}

?>

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

<?php
$content = ob_get_clean();
$titre = "Identification Espace Admin";
require "template.php";
?>