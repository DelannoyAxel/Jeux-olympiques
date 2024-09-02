<?php

define("URL", str_replace("index.php", "", (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]));

require_once './Controllers/LoginController.class.php';
require_once './Controllers/LogoutController.class.php';
require_once './controllers/ProfilController.class.php';
require_once "./Controllers/UserController.class.php";
require_once './Controllers/ClassementController.class.php';
require_once './Controllers/EquipeController.class.php';
require_once './Controllers/ParticipantController.class.php';




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
                // case 'resultat':
            case 'resultat':
                $controller = new ClassementController();
                $controller->resultatClassement();
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

            case 'user':
                $controller = new UserController();
                $controller->index();
                break;

            case 'createUser':
                $controller = new UserController();
                $controller->create();
                break;

            case 'updateUser':
                $controller = new UserController();
                if (isset($url[1])) {
                    $controller->update($url[1]);
                } else {
                    throw new Exception("ID utilisateur non spécifié pour la mise à jour.");
                }
                break;

            case 'deleteUser':
                $controller = new UserController();
                if (isset($url[1])) {
                    $controller->delete($url[1]);
                }
                break;

            case 'classementCrud':
                $controller = new ClassementController();
                $controller->index();
                break;

            case 'createClassement':
                $controller = new ClassementController();
                $controller->create();
                break;

            case 'deleteClassement':
                $controller = new ClassementController();
                if (isset($url[1])) {
                    $controller->delete($url[1]);
                }
                break;

            case 'updateClassement':
                $controller = new ClassementController();
                if (isset($url[1])) {
                    $controller->update($url[1]);
                } else {
                    throw new Exception("ID classement non spécifié pour la mise à jour.");
                }
                break;

            case 'equipeCrud':
                $controller = new EquipeController();
                $controller->index();
                break;

            case 'createEquipe':
                $controller = new EquipeController();
                $controller->create();
                break;

            case 'updateEquipe':
                $controller = new EquipeController();
                if (isset($url[1])) {
                    $controller->update($url[1]);
                } else {
                    throw new Exception("ID équipe non spécifié pour la mise à jour.");
                }
                break;

            case 'deleteEquipe':
                $controller = new EquipeController();
                if (isset($url[1])) {
                    $controller->delete($url[1]);
                }
                break;

            case 'participantCrud':
                $controller = new ParticipantController();
                $controller->index();
                break;

            case 'createParticipant':
                $controller = new ParticipantController();
                $controller->create();
                break;

            case 'updateParticipant':
                $controller = new ParticipantController();
                if (isset($url[1])) {
                    $controller->update($url[1]);
                } else {
                    throw new Exception("ID participant non spécifié pour la mise à jour.");
                }
                break;

            case 'deleteParticipant':
                $controller = new ParticipantController();
                if (isset($url[1])) {
                    $controller->delete($url[1]);
                }
                break;

            case 'mentionsLegales':
                require "./views/mentionlegal.view.php";
                break;

            case 'planDuSite':
                require "./views/planDuSite.view.php";
                break;

            case 'politiqueCookies':
                require "./views/politique-cookies.view.php";
                break;

            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
