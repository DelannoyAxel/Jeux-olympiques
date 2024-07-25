<?php

define("URL", str_replace("index.php", "", (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]));


require_once './Controllers/LoginController.class.php';
require_once './Controllers/LogoutController.class.php';
require_once './controllers/ProfilController.class.php';

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

            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {

    echo $e->getMessage();
}
