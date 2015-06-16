DROP DATABASE IF EXISTS Blog;

CREATE DATABASE Blog;

USE Blog;

CREATE TABLE Blogtable
(
   ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   title text,
   description longtext,
   comment text
);