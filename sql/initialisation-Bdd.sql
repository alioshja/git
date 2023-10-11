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