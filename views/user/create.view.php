<?php
ob_start();
?>

<section class="formulaireUtilisateur">
    <h1>Ajouter un nouvel utilisateur</h1>

    <form action="<?= URL ?>createUser" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="motDePasse">Mot de passe :</label>
        <input type="password" id="motDePasse" name="motDePasse" required>

        <label>Administrateur :</label>
        <div class="admin-options">
            <label for="admin-yes">
                <input type="radio" id="admin-yes" name="isAdmin" value="1">
                Oui
            </label>
            <label for="admin-no">
                <input type="radio" id="admin-no" name="isAdmin" value="0" checked>
                Non
            </label>
        </div>

        <button type="submit">Ajouter l'utilisateur</button>
    </form>
</section>

<?php
$content = ob_get_clean();
$title = "Créer un utilisateur";
require "./views/admin-panel.php";
?>
