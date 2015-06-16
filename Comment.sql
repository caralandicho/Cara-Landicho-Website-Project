DROP DATABASE IF EXISTS Comment;

CREATE DATABASE Comment;

USE Comment;

CREATE TABLE Commenttable
(
   ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   commentname text,
   comment text
);