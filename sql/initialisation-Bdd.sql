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
    salaire VARCHAR(10) NOT NULL
);

INSERT INTO offresemploi (offre, adresse, coordonees, competences, taches, salaire) VALUES (
    'cuisinier en collectivité à Paris',
    '14 Rue des Trois Frères\, 75018 Paris',
    'nous joindre au (09-20-12-12-12)',
    'Connaissance des regles d\'hygienne\, des règles de sécurité et en gastronomie en collectivité',
    'Il vous sera demandé de préparer les repas pour les ouvriers de l\'usine et de le servir. 
    Après le service\, vous devrez nettoyer la cuisine et la salle de restauration. 
    Pour plus d\'informations\, contactez-le (09-20-12-12-12);',
    '1523.34'
    )

DROP TABLE offresemploi;

CREATE TABLE pdf_files (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    file_name VARCHAR(255),
    file_data LONGBLOB,
    FOREIGN KEY (user_id) REFERENCES users(id)
);