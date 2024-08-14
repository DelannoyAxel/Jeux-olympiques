<?php
ob_start();
?>

<section class="formulaireUtilisateur">
    <h1>Mettre à jour l'utilisateur</h1>

    <form action="<?= URL . 'updateUser/' . htmlspecialchars($user['id']); ?>" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($user['nom'] ?? ''); ?>" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenom'] ?? ''); ?>" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" required>

        <label for="motDePasse">Mot de passe :</label>
        <input type="password" id="motDePasse" name="motDePasse">

        <label>Administrateur :</label>
        <div class="admin-options">
            <label for="admin-yes">
                <input type="radio" id="admin-yes" name="isAdmin" value="1" <?php echo isset($user['isAdmin']) && $user['isAdmin'] ? 'checked' : ''; ?>>
                Oui
            </label>
            <label for="admin-no">
                <input type="radio" id="admin-no" name="isAdmin" value="0" <?php echo isset($user['isAdmin']) && !$user['isAdmin'] ? 'checked' : ''; ?>>
                Non
            </label>
        </div>

        <button type="submit">Mettre à jour l'utilisateur</button>
    </form>
</section>

<?php
$content = ob_get_clean();
$title = "Mettre à jour l'utilisateur";
require "./views/admin-panel.php";
?>
