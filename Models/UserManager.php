<?php

require_once "DbConnect.php";

class UserManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = MyDbConnect::getInstance();
    }

    public function getAllUsers()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM utilisateur');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function addUser($nom, $prenom, $motDePasse, $email, $isAdmin)
    {
        $stmt = $this->pdo->prepare('INSERT INTO  utilisateur (nom, prenom, motDePasse, email, isAdmin) VALUES (?,?,?,?,?)');
        $stmt->execute([$nom,$prenom,password_hash($motDePasse, PASSWORD_BCRYPT), $email, $isAdmin]);
        return $this->pdo->lastInsertId();
    }


    public function deleteUser($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM utilisateur WHERE id = ? ");
        $stmt->execute([$id]);
    }

    public function updateUser($id, $nom, $prenom, $motDePasse, $email, $isAdmin){
        $stmt = $this->pdo->prepare('UPDATE utilisateur SET nom = ?, prenom = ?, motDePasse = ?, email = ?, isAdmin = ? WHERE id = ?');
        $stmt->execute([$nom, $prenom, password_hash($motDePasse, PASSWORD_BCRYPT), $email, $isAdmin, $id]);
    }

    public function getUserById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM utilisateur WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
}
