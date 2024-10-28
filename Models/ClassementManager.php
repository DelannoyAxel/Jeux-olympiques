<?php

require_once "MyDbConnect.php";

class ClassementManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = MyDbConnect::getInstance();
    }

    public function getAllClassement()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM classement');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addClassement($sexe)
    {
        $stmt = $this->pdo->prepare('INSERT INTO  classement (sexe) VALUES (?)');
        $stmt->execute([$sexe]);
        return $this->pdo->lastInsertId();
    }

    
    public function deleteClassement($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM classement WHERE id = ? ");
        $stmt->execute([$id]);
    }

    public function updateClassement($id, $sexe){
        $stmt = $this->pdo->prepare('UPDATE classement SET sexe = ? WHERE id = ?');
        $stmt->execute([$sexe, $id]);
    }

    public function getClassementById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM classement WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
