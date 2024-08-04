<?php

require_once "./models/AuthManager.class.php";

class ProfilController
{
    private $authManager;

    public function __construct()
    {
        $this->authManager = new AuthManager();
    }

    public function afficherProfil()
    {
        $this->authManager->startSession();

        if (!isset($_SESSION["id"])) {
            header("Location: " . URL . "login");
            exit();
        }

        $user = $this->authManager->informationsUser();
        $isAdmin = $this->authManager->estAdmin($_SESSION['id']);


        require "./views/profil.view.php";
    }

    public function mettreAJourProfil()
    {
        $this->authManager->startSession();

        if (!isset($_SESSION["id"])) {
            header("Location: " . URL . "login");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $this->authManager->mettreAJourUtilisateur($_SESSION["id"], $nom, $prenom, $email, $password);

            $_SESSION['success_message'] = 'Votre profil a été mis à jour avec succès.';
            header("Location: " . URL . "profil");
            exit();
        }

        $this->afficherProfil();
    }

}
