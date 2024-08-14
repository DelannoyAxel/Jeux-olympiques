<?php
ob_start();
?>

<section class="formulaireUtilisateur">
    <form action="<?= URL ?>createParticipant" method="post">
        <label for="nomDuJoueur">Nom du joueur :</label>
        <input type="text" id="nomDuJoueur" name="nomDuJoueur" required>

        <label for="sexe">Sexe :</label>
        <input type="text" id="sexe" name="sexe" required>

        <label for="positionClassement">Position de classement :</label>
        <input type="text" id="positionClassement" name="positionClassement" required>

        <label for="resultatJoueur">Résultat du joueur :</label>
        <input type="number" id="resultatJoueur" name="resultatJoueur" required>

        <label for="id_equipe">Équipe :</label>
        <select id="id_equipe" name="id_equipe" required>
            <?php foreach ($equipeList as $equipe): ?>
                <option value="<?= htmlspecialchars($equipe['id']) ?>">
                    <?= htmlspecialchars($equipe['pays']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="id_Classement">Classement :</label>
        <select id="id_Classement" name="id_Classement" required>
            <?php foreach ($classementList as $classement): ?>
                <option value="<?= htmlspecialchars($classement['id']) ?>">
                    <?= htmlspecialchars($classement['sexe']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Ajouter le participant</button>
    </form>
</section>

<?php
$content = ob_get_clean();
$title = "Créer un participant";
require "./views/admin-panel.php";
?>
