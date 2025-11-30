<?php
require_once __DIR__ . '/../model/Utilisateur.php';

class UtilisateurController {

    public function liste() {
        $utilisateurs = Utilisateur::getAll();
        require __DIR__ . '/../view/utilisateurs/liste.php';
    }

    public function formulaire() {
        require __DIR__ . '/../view/utilisateurs/formulaire.php';
    }

    public function sauvegarder() {
        $nom = trim($_POST['nom'] ?? '');
        $email = trim($_POST['email'] ?? '');

        if ($nom && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Utilisateur::create($nom, $email);
            header("Location: index.php?controller=utilisateur&action=liste");
            exit;
        } else {
            echo "Nom ou email invalide.";
        }
    }
}