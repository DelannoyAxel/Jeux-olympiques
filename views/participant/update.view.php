<?php
ob_start();
?>

<section class="formulaireUtilisateur">
    <form action="<?= URL ?>updateParticipant/<?= htmlspecialchars($participant['id']) ?>" method="post">
        <label for="nomDuJoueur">Nom du joueur :</label>
        <input type="text" id="nomDuJoueur" name="nomDuJoueur" value="<?= htmlspecialchars($participant['nomDuJoueur']) ?>" required>

        <label for="sexe">Sexe :</label>
        <input type="text" id="sexe" name="sexe" value="<?= htmlspecialchars($participant['sexe']) ?>" required>

        <label for="positionClassement">Position de classement :</label>
        <input type="text" id="positionClassement" name="positionClassement" value="<?= htmlspecialchars($participant['positionClassement']) ?>" required>

        <label for="resultatJoueur">Résultat du joueur :</label>
        <input type="number" id="resultatJoueur" name="resultatJoueur" value="<?= htmlspecialchars($participant['resultatJoueur']) ?>" required>

        <label for="id_equipe">Équipe :</label>
        <select id="id_equipe" name="id_equipe" style="margin-bottom: 10px; padding-bottom: 2px;" required>
            <?php foreach ($equipeList as $equipe): ?>
                <option value="<?= htmlspecialchars($equipe['id']) ?>" <?= $participant['id_equipe'] == $equipe['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($equipe['pays']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="id_Classement">Classement :</label>
        <select id="id_Classement" name="id_Classement" style="margin-bottom: 20px; padding-bottom: 2px;"  required >
            <?php foreach ($classementList as $classement): ?>
                <option value="<?= htmlspecialchars($classement['id']) ?>" <?= $participant['id_Classement'] == $classement['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($classement['sexe']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" >Mettre à jour le participant</button>
    </form>
</section>

<?php
$content = ob_get_clean();
$title = "Mettre à jour un participant";
require "./views/admin-panel.php";
?>
