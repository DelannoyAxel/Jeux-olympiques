<?php

require "Models/classementManager.php";


class ClassementController
{
    public function index()
    {
        $classementManager = new ClassementManager();
        $classements = $classementManager->getAllClassement();

        include "./views/classement/read.view.php";
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sexe = $_POST['sexe'];


            if (empty($sexe)) {
                die('Tous les champs sont requis.');
            }

            $classementManager = new ClassementManager();
            $classementManager->addClassement($sexe);

            header('Location: ' . URL . 'classementCrud');
            exit();
        }

        include './views/classement/create.view.php';
    }

    public function delete($id)
    {
        $classementManager = new ClassementManager();
        $classementManager->deleteClassement($id);
        header('Location: ' . URL . 'classementCrud');
        exit();
    }

    public function update($id)
    {
        $classementManager = new ClassementManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sexe = $_POST['sexe'];


            if (empty($sexe)) {
                die('Tous les champs sont requis.');
            }

            $classementManager->updateClassement($id, $sexe);

            header('Location: ' . URL . 'classementCrud');
            exit();
        }

        $classement = $classementManager->getClassementById($id);
        if (!$classement) {
            die('classement non trouvé.');
        }

        include 'views/classement/update.view.php';
    }
}
