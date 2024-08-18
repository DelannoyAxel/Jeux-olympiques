<?php

require "Models/classementManager.php";
require_once './Models/ParticipantManager.php';


class ClassementController
{
    public function index()
    {
        $classementManager = new ClassementManager();
        $classements = $classementManager->getAllClassement();

        include "./views/classement/read.view.php";
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sexe = $_POST['sexe'];


            if (empty($sexe)) {
                die('Tous les champs sont requis.');
            }

            $classementManager = new ClassementManager();
            $classementManager->addClassement($sexe);

            header('Location: ' . URL . 'classementCrud');
            exit();
        }

        include './views/classement/create.view.php';
    }

    public function delete($id)
    {
        $classementManager = new ClassementManager();
        $classementManager->deleteClassement($id);
        header('Location: ' . URL . 'classementCrud');
        exit();
    }

    public function update($id)
    {
        $classementManager = new ClassementManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sexe = $_POST['sexe'];


            if (empty($sexe)) {
                die('Tous les champs sont requis.');
            }

            $classementManager->updateClassement($id, $sexe);

            header('Location: ' . URL . 'classementCrud');
            exit();
        }

        $classement = $classementManager->getClassementById($id);
        if (!$classement) {
            die('classement non trouvé.');
        }

        include 'views/classement/update.view.php';
    }

    
    public function resultatClassement()
    {
        $participantManager = new ParticipantManager();
        
        // Récupération de tous les classements (homme et femme)
        $classements = $participantManager->getAllClassements();
        
        // Définir la variable pour le titre du classement
        $titreClassement = 'Individuel Femme';  // Valeur par défaut
        $id_classement = null;
        
        // Déterminer l'ID de classement par défaut et le titre correspondant
        foreach ($classements as $classement) {
            if ($classement['sexe'] === 'Individuel Femme') {
                $id_classement = $classement['id'];
                $titreClassement = $classement['sexe'];
                break;
            }
        }
        
        // Si un classement est sélectionné par l'utilisateur, on l'utilise
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_classement'])) {
            $id_classement = (int)$_POST['id_classement'];
            // Mettre à jour le titre du classement sélectionné
            foreach ($classements as $classement) {
                if ($classement['id'] === $id_classement) {
                    $titreClassement = $classement['sexe'];
                    break;
                }
            }
        }
        
        // Récupération des participants pour le classement sélectionné
        $participants = $participantManager->getParticipantsByClassement($id_classement);
        
        // Charger la vue avec les données
        include './views/resultat.view.php';
    }
    
    
}
