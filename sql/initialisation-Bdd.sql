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
prénom VARCHAR(40) NOT NULL,
MAIL VARCHAR(50) NOT NULL,
Password VARCHAR(60) NOT NULL
);

DROP TABLE users;