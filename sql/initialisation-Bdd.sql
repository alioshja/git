-- Active: 1694069296748@@127.0.0.1@3306@trtconseil
CREATE DATABASE TRTConseil;
--bdd de migration de compte qui contient les demandes de création de compte devant etre valider par un consultant
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
--utiulisateurs pour tester l'app
INSERT INTO users (nom, prenom, mail, Password, role) VALUES ('loub','ali','lapanade12@gmail.com','Coucoutoi1234','recruteur');
INSERT INTO users (nom, prenom, mail, Password, role) VALUES ('aldri','jean','heyhoheyhey12@gmail.com','Bienvenuatoi101','employé');
INSERT INTO users (nom, prenom, mail, Password, role) VALUES ('dupont','fabien','fabienteveutdubien@outlook.fr','savapasNON123','administrateur');
INSERT INTO users (nom, prenom, mail, Password, role) VALUES ('tecnu','isabelle','laplusbelledesisabelle@gmail.com','lemelon181','consultant');
DROP TABLE users;
--offre d'emploi est la bdd qui permet d'afficher les offres en attentes de validation pour les modérateurs.
CREATE TABLE offresemploi (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    offre VARCHAR(100) NOT NULL,
    adresse VARCHAR(150) NOT NULL,
    coordonees VARCHAR(150) NOT NULL,
    competences VARCHAR(150) NOT NULL,
    taches VARCHAR(250) NOT NULL,
    salaire VARCHAR(10) NOT NULL,
    lundi VARCHAR(40),
    mardi VARCHAR(40),
    mercredi VARCHAR(40),
    jeudi VARCHAR(40),
    vendredi VARCHAR(40),
    samedi VARCHAR(40),
    dimanche VARCHAR(40),
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) 
);

INSERT INTO offresemploi (offre, adresse, coordonees, competences, taches, salaire, lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche, user_id) VALUES (
    'cuisinier en collectivité à Paris',
    '14 Rue des Trois Frères\, 75018 Paris',
    'nous joindre au (09-20-12-12-12)',
    'Connaissance des regles d\'hygienne\, des règles de sécurité et en gastronomie en collectivité',
    'Il vous sera demandé de préparer les repas pour les ouvriers de l\'usine et de le servir. 
    Après le service\, vous devrez nettoyer la cuisine et la salle de restauration. 
    Pour plus d\'informations\, contactez-le (09-20-12-12-12);',
    '1523.34',
    '8H à 12H et 13H à 20H',
    '8H à 12H et 13H à 20H',
    '8H à 12H et 13H à 20H',
    '8H à 12H et 13H à 20H',
    '8H à 12H et 13H à 20H',
    'non travaillé',
    'non travaillé',
     1
    )

DROP TABLE offresemploi;
--bdd qui contient les offres d'emploi ayant ete validées
CREATE TABLE offres_validees(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    offre VARCHAR(100) NOT NULL,
    adresse VARCHAR(150) NOT NULL,
    coordonees VARCHAR(150) NOT NULL,
    competences VARCHAR(150) NOT NULL,
    taches VARCHAR(250) NOT NULL,
    salaire VARCHAR(10) NOT NULL,
    lundi VARCHAR(40),
    mardi VARCHAR(40),
    mercredi VARCHAR(40),
    jeudi VARCHAR(40),
    vendredi VARCHAR(40),
    samedi VARCHAR(40),
    dimanche VARCHAR(40),
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) 
);

INSERT INTO offres_validees (offre, adresse,  coordonees, competences, taches, salaire, lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche, user_id)
VALUES
('cuisinier',
 'rue du palmier',
 'tel ou mail', 
'diplome cuisinier', 
'boulot a faire', 
'1451.12', 
'9H a 12H 13H a 18H', 
'9H a 12H 13H a 18H', 
'9H a 12H 13H a 18H', 
'9H a 12H 13H a 18H', 
'9H a 12H 13H a 18H', 
'9H a 12H 13H a 18H', 
'9H a 12H 13H a 18H',
1)

DROP TABLE offres_validees;
--contient les cv des employées ils sont associées a l'id utilisateur
CREATE TABLE pdf_files (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    file_name VARCHAR(255),
    file_data LONGBLOB,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
DROP TABLE pdf_files;
--bdd contenant les coordonées des employeurs leurs éeme coordonées
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

--relation est la table qui vas etre afficher a l'administrateur afin quil décide si cette demande est utile pour c'est employeur.
CREATE TABLE relation_employe_ouvrier (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    id_offre INT NOT NULL,
    id_cv INT NOT NULL,
    Foreign Key (id_offre) REFERENCES offresemploi(id),
    Foreign Key (id_cv) REFERENCES pdf_files(id)
);

INSERT INTO relation_employe_ouvrier(id_offre, id_cv)VALUES(1 ,1);
DROP TABLE relation_employe_ouvrier;

--si l'administrateur a confirmé la demande c'est sur la table postuler que la demande sera migré.
CREATE TABLE postuler (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    cv_id INT NOT NULL,
    offre_id INT NOT NULL,
    Foreign Key (cv_id) REFERENCES relation_employe_ouvrier (id_cv),
    Foreign Key (offre_id) REFERENCES relation_employe_ouvrier (id_offre)
);

DROP TABLE postuler;