<?php
ob_start();
?>

<section class="hero">
    <img src="public/images/escrim-big.png" alt="Pentathlon Moderne à Paris" class="hero-image">
    <div>
        <h1>Découvrez l'excellence athlétique : le classement du Pentathlon Moderne</h1>
    </div>
</section>

<section class="resultatClassement">
    <h1>Consulter les résulatats des jeux pour Paris 2024</h1>

    <!-- Formulaire pour sélectionner le classement -->
    <form method="post" action="">
        <!-- <label for="id_classement">Sélectionnez un classement :</label> -->
        <select name="id_classement" id="id_classement" required>
            <?php foreach ($classements as $classement): ?>
                <option value="<?= htmlspecialchars($classement['id']) ?>"
                    <?= (isset($id_classement) && $id_classement == $classement['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($classement['sexe']) ?> <!-- Affichez "Homme" ou "Femme" selon le classement -->
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Voir le classement</button>
    </form>
</section>

<section class="classementTable">
    <h2>Résultats du classement</h2>
    <?php if (!empty($participants)): ?>
        <div class="table-container"> <!-- Conteneur pour le défilement horizontal -->
            <table>
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Participant</th>
                        <th>Équipe</th>
                        <th>Résultat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($participants as $participant): ?>
                        <tr>
                            <td><?= htmlspecialchars($participant['positionClassement']) ?></td>
                            <td><?= htmlspecialchars($participant['nomDuJoueur']) ?></td>
                            <td>
                                <img src="<?= URL . htmlspecialchars($participant['imgDrapeau']) ?>" alt="Drapeau de <?= htmlspecialchars($participant['pays']) ?>" width="30">
                                <?= htmlspecialchars($participant['pays']) ?>
                            </td>
                            <td><?= htmlspecialchars($participant['resultatJoueur']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p>Aucun résultat trouvé pour ce classement.</p>
    <?php endif; ?>
</section>

<?php
$content = ob_get_clean();
$title = "Classement";
require "template.php";
