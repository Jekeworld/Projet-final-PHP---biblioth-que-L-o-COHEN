<?php
require_once __DIR__ . '/../model/Livre.php';

class LivreController {

    public function liste() {
        $livres = Livre::getAll();
        require __DIR__ . '/../view/livres/liste.php';
    }

    public function formulaire() {
        $livre = null;
        if (!empty($_GET['id'])) {
            $livre = Livre::getById((int)$_GET['id']);
        }
        require __DIR__ . '/../view/livres/formulaire.php';
    }

    public function sauvegarder() {
        $id = $_POST['id'] ?? null;
        $titre = trim($_POST['titre'] ?? '');
        $auteur = trim($_POST['auteur'] ?? '');
        $annee = $_POST['annee'] ?? null;

        if ($titre && $auteur) {
            if ($id) {
                Livre::update($id, $titre, $auteur, $annee);
            } else {
                Livre::create($titre, $auteur, $annee);
            }
        }
        header("Location: index.php?controller=livre&action=liste");
        exit;
    }

    public function supprimer() {
        if (!empty($_GET['id'])) {
            Livre::delete((int)$_GET['id']);
        }
        header("Location: index.php?controller=livre&action=liste");
        exit;
    }
}