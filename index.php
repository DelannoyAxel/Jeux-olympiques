<?php

define("URL", str_replace("index.php", "", (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]));

require_once './Controllers/LoginController.class.php';
require_once './Controllers/LogoutController.class.php';
require_once './controllers/ProfilController.class.php';
require_once "./Controllers/UserController.class.php";

try {
    if (empty($_GET["page"])) {
        header("location: " . URL . "accueil");
        exit();
    } else {
        $url = explode("/", filter_var($_GET["page"], FILTER_SANITIZE_URL));

        switch ($url[0]) {
            case 'accueil':
                require "./views/accueil.view.php";
                break;

            case 'classement':
                require "./views/classement.view.php";
                break;

            case "login":
                $controller = new LoginController();
                $controller->login();
                break;

            case "logout":
                $controller = new LogoutController();
                $controller->logout();
                break;

            case 'profil':
                $controller = new ProfilController();
                $controller->mettreAJourProfil();
                break;

            case 'crud':
                require "./views/dashboard.view.php";
                break;

            case 'create':
                $controller = new UserController();
                $controller->create();
                break;

            case 'user':
                $controller = new UserController();
                $controller->index();
                break;

            case 'update_user':
                $controller = new UserController();
                if (isset($url[1])) {
                    $controller->update($url[1]);
                } else {
                    throw new Exception("ID utilisateur non spécifié pour la mise à jour.");
                }
                break;

            case 'delete_user':
                $controller = new UserController();
                if (isset($url[1])) {
                    $controller->delete($url[1]);
                }

            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
