<?php

require "Models/EquipeManager.php";

class EquipeController
{
    public function index()
    {
        $equipeManager = new EquipeManager();
        $equipes = $equipeManager->getAllEquipes();
        include "./views/equipe/read.view.php";
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pays = ($_POST['pays']);
            $imagePath = 'pas_dimage';
    
            if (isset($_FILES['imgDrapeau']) && $_FILES['imgDrapeau']['error'] === UPLOAD_ERR_OK) {
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!in_array($_FILES['imgDrapeau']['type'], $allowedMimeTypes)) {
                    die('Type de fichier non autorisé.');
                }
    
                $imageName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $_FILES['imgDrapeau']['name']);
                $imagePath = 'uploads/' . $imageName;
    
                if (!is_dir('uploads')) {
                    mkdir('uploads', 0755, true);
                }
    
                if (!move_uploaded_file($_FILES['imgDrapeau']['tmp_name'], $imagePath)) {
                    die('Erreur lors du déplacement du fichier.');
                }
            }
    
            if (empty($pays)) {
                die('Tous les champs sont requis.');
            }
    
            $equipeManager = new EquipeManager();
            $equipeManager->addEquipe($pays, $imagePath);
    
            header('Location: ' . URL . 'equipeCrud');
            exit();
        }
    
        include './views/equipe/create.view.php';
    }

    public function update($id)
    {
        $equipeManager = new EquipeManager();
        $equipe = $equipeManager->getEquipeById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pays = $_POST['pays'];
            $imagePath = $equipe['image'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageName = time() . '_' . $_FILES['image']['name'];
                $imagePath = 'uploads/' . $imageName;
                move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            }

            if (empty($pays)) {
                die('Tous les champs sont requis.');
            }

            $equipeManager->updateEquipe($id, $pays, $imagePath);

            header('Location: ' . URL . 'equipeCrud');
            exit();
        }

        if (!$equipe) {
            die('Equipe non trouvée.');
        }

        include './views/equipe/update.view.php';
    }

    public function delete($id)
    {
        $equipeManager = new EquipeManager();
        $equipe = $equipeManager->getEquipeById($id);
        if ($equipe['image'] && file_exists($equipe['image'])) {
            unlink($equipe['image']);
        }
        $equipeManager->deleteEquipe($id);
        header('Location: ' . URL . 'equipeCrud');
        exit();
    }
}
