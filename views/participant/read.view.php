<?php
ob_start();
?>

<div class="gestionCrud">
    <header>
        <h1>Gestion des participants</h1>
        <a class="btn" href="createParticipant">Ajouter un participant</a>
    </header>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Sexe</th>
                <th>Position classement</th>
                <th>Resultat</th>
                <th>Equipe</th>
                <th>Classement</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($participants as $participant): ?>
                <?php
                // Trouver le nom de l'équipe en fonction de l'ID
                $equipeNom = array_search($participant['id_equipe'], array_column($equipeList, 'id')) !== false
                    ? $equipeList[array_search($participant['id_equipe'], array_column($equipeList, 'id'))]['pays']
                    : 'Inconnu';

                // Trouver le sexe du classement en fonction de l'ID
                $classementSexe = array_search($participant['id_Classement'], array_column($classementList, 'id')) !== false
                    ? $classementList[array_search($participant['id_Classement'], array_column($classementList, 'id'))]['sexe']
                    : 'Inconnu';
                ?>

                <tr>
                    <td><?= htmlspecialchars($participant['id']) ?></td>
                    <td><?= htmlspecialchars($participant['nomDuJoueur']) ?></td>
                    <td><?= htmlspecialchars($participant['sexe']) ?></td>
                    <td><?= htmlspecialchars($participant['positionClassement']) ?></td>
                    <td><?= htmlspecialchars($participant['resultatJoueur']) ?></td>
                    <td><?= htmlspecialchars($equipeNom) ?></td>
                    <td><?= htmlspecialchars($classementSexe) ?></td>

                    <td class="actions">
                        <a class="btn btn-edit" href="<?= URL ?>updateParticipant/<?= $participant['id'] ?>">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <a class="btn btn-delete" href="<?= URL ?>deleteParticipant/<?= $participant['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
$title = "Gestion des participants";
require "./views/admin-panel.php";
?>