<?php
require_once __DIR__ . '/../model/Emprunt.php';
require_once __DIR__ . '/../model/Utilisateur.php';
require_once __DIR__ . '/../model/Livre.php';

class EmpruntController {

    public function liste() {
        $emprunts = Emprunt::getActifs();
        require __DIR__ . '/../view/emprunts/liste.php';
    }

    public function formulaire() {
        $utilisateurs = Utilisateur::getAll();
        $livres = Livre::getAll();
        require __DIR__ . '/../view/emprunts/formulaire.php';
    }

    public function sauvegarder() {
        $id_utilisateur = $_POST['id_utilisateur'] ?? null;
        $id_livre = $_POST['id_livre'] ?? null;

        if ($id_utilisateur && $id_livre) {
            Emprunt::create($id_utilisateur, $id_livre);
            Livre::setDisponibilite($id_livre, 0);
        }

        header("Location: index.php?controller=emprunt&action=liste");
        exit;
    }

    public function retour() {
        if (!empty($_GET['id'])) {
            $emprunt = Emprunt::getById((int)$_GET['id']);
            if ($emprunt) {
                Emprunt::marquerRetour($emprunt['id']);
                Livre::setDisponibilite($emprunt['id_livre'], 1);
            }
        }
        header("Location: index.php?controller=emprunt&action=liste");
        exit;
    }
}