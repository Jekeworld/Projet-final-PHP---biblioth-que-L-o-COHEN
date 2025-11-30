<?php
require_once __DIR__ . '/Database.php';

class Livre {

    public static function getAll() {
        $pdo = Database::connection();
        $stmt = $pdo->query("SELECT * FROM livres");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $pdo = Database::connection();
        $stmt = $pdo->prepare("SELECT * FROM livres WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($titre, $auteur, $annee) {
        $pdo = Database::connection();
        $stmt = $pdo->prepare("INSERT INTO livres (titre, auteur, annee_publication) VALUES (?, ?, ?)");
        return $stmt->execute([$titre, $auteur, $annee]);
    }

    public static function update($id, $titre, $auteur, $annee) {
        $pdo = Database::connection();
        $stmt = $pdo->prepare("UPDATE livres SET titre = ?, auteur = ?, annee_publication = ? WHERE id = ?");
        return $stmt->execute([$titre, $auteur, $annee, $id]);
    }

    public static function delete($id) {
        $pdo = Database::connection();
        $stmt = $pdo->prepare("DELETE FROM livres WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function setDisponibilite($id, $disponible) {
        $pdo = Database::connection();
        $stmt = $pdo->prepare("UPDATE livres SET disponible = ? WHERE id = ?");
        return $stmt->execute([$disponible, $id]);
    }
}