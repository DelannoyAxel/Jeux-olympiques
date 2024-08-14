<?php

require_once "Models/EquipeManager.php";
require_once "Models/ClassementManager.php";
require_once "Models/ParticipantManager.php";

class ParticipantController
{
    public function index()
    {
        $participantManager = new ParticipantManager();
        $participants = $participantManager->getParticipants();
        
        // Récupérer les équipes et classements pour les passer à la vue
        $equipeManager = new EquipeManager();
        $equipeList = $equipeManager->getAllEquipes();

        $classementManager = new ClassementManager();
        $classementList = $classementManager->getAllClassement();
        
        include './views/participant/read.view.php';
    }

    public function create()
    {
        // Récupérer les équipes et classements
        $equipeManager = new EquipeManager();
        $equipeList = $equipeManager->getAllEquipes();
    
        $classementManager = new ClassementManager();
        $classementList = $classementManager->getAllClassement(); // Assure-toi que le nom de la méthode est correct
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomDuJoueur = $_POST['nomDuJoueur'];
            $sexe = $_POST['sexe'];
            $positionClassement = $_POST['positionClassement'];
            $resultatJoueur = $_POST['resultatJoueur'];
            $id_equipe = $_POST['id_equipe'];
            $id_Classement = $_POST['id_Classement'];

            $participantManager = new ParticipantManager();
            $participantManager->addParticipant($nomDuJoueur, $sexe, $positionClassement, $resultatJoueur, $id_equipe, $id_Classement);
    
            header('Location: ' . URL . 'participantCrud');
            exit();
        }
    
        include './views/participant/create.view.php';
    }
    

    public function update($id)
    {
        $participantManager = new ParticipantManager();
        $participant = $participantManager->getParticipantById($id);
    
        if (!$participant) {
            die('Participant non trouvé.');
        }
    
        // Récupérer les équipes et classements
        $equipeManager = new EquipeManager();
        $equipeList = $equipeManager->getAllEquipes();
    
        $classementManager = new ClassementManager();
        $classementList = $classementManager->getAllClassement();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomDuJoueur = $_POST['nomDuJoueur'];
            $sexe = $_POST['sexe'];
            $positionClassement = $_POST['positionClassement'];
            $resultatJoueur = $_POST['resultatJoueur'];
            $id_equipe = $_POST['id_equipe'];
            $id_Classement = $_POST['id_Classement'];
    
            if (empty($nomDuJoueur) || empty($sexe) || empty($positionClassement) || empty($resultatJoueur) || empty($id_equipe) || empty($id_Classement)) {
                die('Tous les champs sont requis.');
            }
    
            $participantManager->updateParticipant($id, $nomDuJoueur, $sexe, $positionClassement, $resultatJoueur, $id_equipe, $id_Classement);
    
            header('Location: ' . URL . 'participantCrud');
            exit();
        }
    
        include './views/participant/update.view.php';
    }

    public function delete($id)
    {
        $participantManager = new ParticipantManager();
        $participantManager->deleteParticipant($id);
        
        header('Location: ' . URL . 'participantCrud');
        exit();
    }
}
