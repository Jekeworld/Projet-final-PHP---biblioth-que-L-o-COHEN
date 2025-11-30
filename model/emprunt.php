<?php
require_once __DIR__ . '/Database.php';

class Emprunt {

    public static function getActifs() {
        $pdo = Database::connection();
        $sql = "SELECT e.*, u.nom, l.titre
                FROM emprunts e
                JOIN utilisateurs u ON e.id_utilisateur = u.id
                JOIN livres l ON e.id_livre = l.id
                WHERE e.date_retour IS NULL";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($id_utilisateur, $id_livre) {
        $pdo = Database::connection();
        $stmt = $pdo->prepare("INSERT INTO emprunts (id_utilisateur, id_livre) VALUES (?, ?)");
        return $stmt->execute([$id_utilisateur, $id_livre]);
    }

    public static function marquerRetour($id) {
        $pdo = Database::connection();
        $stmt = $pdo->prepare("UPDATE emprunts SET date_retour = NOW() WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function getById($id) {
        $pdo = Database::connection();
        $stmt = $pdo->prepare("SELECT * FROM emprunts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}