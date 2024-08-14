<?php
ob_start();
?>

<div class="gestionCrud">
    <header>
        <h1>Gestion des utilisateurs</h1>
        <a class="btn" href="createUser">Ajouter un utilisateur</a>
    </header>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Est Admin ?</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['nom']) ?></td>
                    <td><?= htmlspecialchars($user['prenom']) ?></td>
                    <td><?= htmlspecialchars($user['isAdmin']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td class="actions">
                        <a class="btn btn-edit" href="<?php echo URL . 'updateUser/' . $user['id']; ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a class="btn btn-delete" href="<?php echo URL . 'deleteUser/' . $user['id']; ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
$title = "Gestion des utilisateurs";
require "./views/admin-panel.php";
?>
