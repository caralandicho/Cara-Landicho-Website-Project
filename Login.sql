DROP DATABASE IF EXISTS Login;

CREATE DATABASE Login;

USE Login;

CREATE TABLE Logintable
(
   ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   username varchar(100),
   password varchar(100)
   email varchar(100)
);

INSERT INTO Logintable VALUES ( 1, 'caralandicho', 'password' );