<?php
require_once './Models/AuthManager.class.php';
require_once './Models/MyDbConnect.php';

class LoginController {
    private $authManager;

    public function __construct() {
        $this->authManager = new AuthManager();
        $this->authManager->startSession();
    }

    public function login() {
        $error = null;

        if (isset($_POST['email'], $_POST['pwd'])) {
            $email = $_POST['email'];
            $password = $_POST['pwd'];

            $userId = $this->authManager->authenticate($email, $password);

            if ($userId) {
                $_SESSION['id'] = $userId;
                header('Location: ' . URL . 'accueil');
                exit();
            } else {
                $error = "Email ou mot de passe incorrect.";
            }
        }

        require './views/login.view.php';
    }
}
