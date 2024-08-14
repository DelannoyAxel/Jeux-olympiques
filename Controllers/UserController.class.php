<?php

require "Models/UserManager.php";


class UserController
{
    public function index()
    {
        $userManager = new UserManager();
        $users = $userManager->getAllUsers();

        include "./views/user/read.view.php";
    }


    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $motDePasse = $_POST['motDePasse'];
            $isAdmin = $_POST["isAdmin"];

            if (empty($nom) || empty($prenom) || empty($email) || empty($motDePasse)) {
                die('Tous les champs sont requis.');
            }

            $userManager = new UserManager();
            $userManager->addUser($nom, $prenom, $motDePasse, $email, $isAdmin);

            header('Location: ' . URL . 'user');
            exit();
        }

        include './views/user/create.view.php';
    }

    public function delete($id)
    {
        $userManager = new UserManager();
        $userManager->deleteUser($id);
        header('Location: ' . URL . 'user');
        exit();
    }

    public function update($id)
    {
        $userManager = new UserManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $motDePasse = $_POST['motDePasse'];
            $isAdmin = isset($_POST['isAdmin']) ? (int) $_POST['isAdmin'] : 0;

            if (empty($nom) || empty($prenom) || empty($email)) {
                die('Tous les champs sont requis.');
            }

            $userManager->updateUser($id, $nom, $prenom, $motDePasse, $email, $isAdmin);

            header('Location: ' . URL . 'user');
            exit();
        }

        $user = $userManager->getUserById($id);
        if (!$user) {
            die('Utilisateur non trouvé.');
        }

        include 'views/user/update.view.php';
    }
}
