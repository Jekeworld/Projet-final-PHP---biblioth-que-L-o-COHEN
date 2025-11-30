CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE livres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(200) NOT NULL,
    auteur VARCHAR(150) NOT NULL,
    annee_publication INT,
    disponible TINYINT(1) DEFAULT 1
);

CREATE TABLE emprunts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_utilisateur INT NOT NULL,
    id_livre INT NOT NULL,
    date_emprunt DATETIME DEFAULT CURRENT_TIMESTAMP,
    date_retour DATETIME NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id),
    FOREIGN KEY (id_livre) REFERENCES livres(id)
);