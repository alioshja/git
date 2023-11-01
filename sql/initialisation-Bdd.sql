-- Active: 1694069296748@@127.0.0.1@3306@trtconseil
CREATE DATABASE TRTConseil;

CREATE TABLE usersenattente (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(40) NOT NULL,
prénom VARCHAR(40) NOT NULL,
MAIL VARCHAR(50) NOT NULL,
Password VARCHAR(60) NOT NULL
);

DROP TABLE usersenattente;

CREATE TABLE users (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(40) NOT NULL,
prenom VARCHAR(40) NOT NULL,
mail VARCHAR(50) NOT NULL,
Password VARCHAR(60) NOT NULL,
role varchar(60) NOT NULL
);

INSERT INTO users (nom, prenom, mail, Password, role) VALUES ('loub','ali','lapanade@gmail.com','Coucoutoi1234','recruteur');
INSERT INTO users (nom, prenom, mail, Password, role) VALUES ('aldri','jean','heyhohey@gmail.com','Bienvenuatoi101','employé');
INSERT INTO users (nom, prenom, mail, Password, role) VALUES ('dupont','fabien','fabienteveutdubien@outlook.fr','savapasNON123','administrateur');
INSERT INTO users (nom, prenom, mail, Password, role) VALUES ('tecnu','isabelle','laplusbelledesisabelle@outlook.fr','lemelon181','consultant');
DROP TABLE users;

CREATE TABLE offresemploi (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    offre VARCHAR(100) NOT NULL,
    adresse VARCHAR(150) NOT NULL,
    coordonees VARCHAR(150) NOT NULL,
    competences VARCHAR(150) NOT NULL,
    taches VARCHAR(250) NOT NULL,
    salaire VARCHAR(10) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) 
);

INSERT INTO offresemploi (offre, adresse, coordonees, competences, taches, salaire, user_id) VALUES (
    'cuisinier en collectivité à Paris',
    '14 Rue des Trois Frères\, 75018 Paris',
    'nous joindre au (09-20-12-12-12)',
    'Connaissance des regles d\'hygienne\, des règles de sécurité et en gastronomie en collectivité',
    'Il vous sera demandé de préparer les repas pour les ouvriers de l\'usine et de le servir. 
    Après le service\, vous devrez nettoyer la cuisine et la salle de restauration. 
    Pour plus d\'informations\, contactez-le (09-20-12-12-12);',
    '1523.34',
    1
    )

DROP TABLE offresemploi;

CREATE TABLE horaires_offres (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    lundi VARCHAR(40),
    mardi VARCHAR(40),
    mercredi VARCHAR(40),
    jeudi VARCHAR(40),
    vendredi VARCHAR(40),
    samedi VARCHAR(40),
    dimanche VARCHAR(40),
    offre_id INT NOT NULL,
    FOREIGN KEY (offre_id) REFERENCES offresemploi(id) 
);
INSERT INTO horaires_offres (lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche, offre_id) VALUES (
    '8H à 12H et 13H à 20H',
    '8H à 12H et 13H à 20H',
    '8H à 12H et 13H à 20H',
    '8H à 12H et 13H à 20H',
    '8H à 12H et 13H à 20H',
    'non travaillé',
    'non travaillé',
    1
);
DROP TABLE horaires_offres;

CREATE TABLE pdf_files (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    file_name VARCHAR(255),
    file_data LONGBLOB,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
DROP TABLE pdf_files;
CREATE TABLE coordonees (
    coordonnee_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nomentreprise VARCHAR(60) NOT NULL,
    adresse TEXT NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
DROP TABLE coordonees;

CREATE TABLE relation_employe_ouvrier (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    id_offre INT NOT NULL,
    id_cv INT NOT NULL,
    Foreign Key (id_offre) REFERENCES offresemploi(id),
    Foreign Key (id_cv) REFERENCES pdf_files(id)
);

DROP TABLE relation_employe_ouvrier;

CREATE TABLE postuler (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    cv_id INT NOT NULL,
    Foreign Key (cv_id) REFERENCES relation_employe_ouvrier (id_cv)
);

DROP TABLE postuler;