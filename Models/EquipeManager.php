<?php

require_once "MyDbConnect.php";

class EquipeManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = MyDbConnect::getInstance();
    }

    public function getAllEquipes()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM equipe');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEquipe($pays, $imagePath)
    {
        $stmt = $this->pdo->prepare('INSERT INTO equipe (pays, imgDrapeau) VALUES (?, ?)');
        $stmt->execute([$pays, $imagePath]);
        return $this->pdo->lastInsertId();
    }

    public function updateEquipe($id, $pays, $imagePath = null)
    {
        if ($imagePath) {
            $stmt = $this->pdo->prepare('UPDATE equipe SET pays = ?, imgDrapeau = ? WHERE id = ?');
            $stmt->execute([$pays, $imagePath, $id]);
        } else {
            $stmt = $this->pdo->prepare('UPDATE equipe SET pays = ? WHERE id = ?');
            $stmt->execute([$pays, $id]);
        }
    }

    public function deleteEquipe($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM equipe WHERE id = ?');
        $stmt->execute([$id]);
    }

    public function getEquipeById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM equipe WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
