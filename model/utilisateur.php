<?php
require_once __DIR__ . '/Database.php';

class Utilisateur {

    public static function getAll() {
        $pdo = Database::connection();
        $stmt = $pdo->query("SELECT * FROM utilisateurs");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($nom, $email) {
        $pdo = Database::connection();
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email) VALUES (?, ?)");
        return $stmt->execute([$nom, $email]);
    }

    public static function getById($id) {
        $pdo = Database::connection();
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}