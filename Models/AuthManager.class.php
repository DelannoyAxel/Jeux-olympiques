<?php

require_once "MyDbConnect.php";


class AuthManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = MyDbConnect::getInstance();
    }

    public function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function authenticate($email, $password)
    {
        $stmt = $this->pdo->prepare('SELECT id, motDePasse FROM utilisateur WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['motDePasse'])) {
            return $user['id'];
        } else {
            return false;
        }
    }

    public function estAdmin($Id)
    {
        $stmt = $this->pdo->prepare('SELECT isAdmin FROM utilisateur WHERE id = ?');
        $stmt->execute([$Id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return (bool)$result["isAdmin"];
        } else {
            return false;
        }
    }

    public function verifierAdmin()
    {
        $this->startSession();
        if (!isset($_SESSION['id'])) {
            echo "Session utilisateur non définie.";
            exit();
        } else {
            $userId = $_SESSION['id'];
            if (!$this->estAdmin($userId)) {
                echo "L'utilisateur avec l'ID $userId n'est pas un administrateur.";
                exit();
            }
        }
    }

    public function logout()
    {
        $this->startSession();
        session_unset();
        session_destroy();
    }

    public function informationsUser()
    {
        $this->startSession();
        if (!isset($_SESSION["id"])) {
            echo "Session utilisateur non définie.";
            exit();
        } else {
            $userId = $_SESSION["id"];
            $stmt = $this->pdo->prepare('SELECT * FROM utilisateur WHERE id = ?');
            $stmt->execute([$userId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
    

    public function mettreAJourUtilisateur($id, $nom, $prenom, $email, $password = null)
    {
        $sql = "UPDATE utilisateur SET nom = ?, prenom = ?, email = ?" . ($password ? ", motDePasse = ?" : "") . " WHERE id = ?";
        
        $params = [$nom, $prenom, $email];
        
        if ($password) {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $params[] = $password; // Ajouter le mot de passe haché aux paramètres
        }
        
        $params[] = $id; // ID utilisateur
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
    }
    
}
