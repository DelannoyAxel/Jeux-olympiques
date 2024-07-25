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

            // Mettre à jour le profil utilisateur
            $this->authManager->mettreAJourUtilisateur($_SESSION["id"], $nom, $prenom, $email, $password);

            // Rediriger vers la page de profil après la mise à jour
            header("Location: " . URL . "profil");
            exit();
        }

        // Afficher le profil après mise à jour (si besoin)
        $this->afficherProfil();
    }
}
