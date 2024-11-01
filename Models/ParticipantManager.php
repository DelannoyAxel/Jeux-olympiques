<?php

require_once "MyDbConnect.php";

class ParticipantManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = MyDbConnect::getInstance();
    }

    // Créer un participant
    public function addParticipant($nomDuJoueur, $sexe, $positionClassement, $resultatJoueur, $id_equipe, $id_Classement)
    {
        $stmt = $this->pdo->prepare("INSERT INTO participant (nomDuJoueur, sexe, positionClassement, resultatJoueur, id_equipe, id_Classement) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nomDuJoueur, $sexe, $positionClassement, $resultatJoueur, $id_equipe, $id_Classement]);
    }

    // Lire tous les participants
    public function getParticipants()
    {
        $stmt = $this->pdo->query("SELECT * FROM participant");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lire un participant par son ID
    public function getParticipantById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM participant WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un participant
    public function updateParticipant($id, $nomDuJoueur, $sexe, $positionClassement, $resultatJoueur, $id_equipe, $id_Classement)
    {
        $stmt = $this->pdo->prepare("UPDATE participant SET nomDuJoueur = ?, sexe = ?, positionClassement = ?, resultatJoueur = ?, id_equipe = ?, id_Classement = ? WHERE id = ?");
        $stmt->execute([$nomDuJoueur, $sexe, $positionClassement, $resultatJoueur, $id_equipe, $id_Classement, $id]);
    }

    // Supprimer un participant
    public function deleteParticipant($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM participant WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function getAllClassements()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM classement");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer tous les participants pour un classement spécifique
    public function getParticipantsByClassement($id_classement)
    {
        $stmt = $this->pdo->prepare("
            SELECT p.positionClassement, p.nomDuJoueur, p.resultatJoueur, e.pays, e.imgDrapeau
            FROM participant p
            JOIN equipe e ON p.id_equipe = e.id
            WHERE p.id_Classement = ?
            ORDER BY p.positionClassement ASC
        ");
        $stmt->execute([$id_classement]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
