CREATE TABLE Membre (
    id_membre INT PRIMARY KEY AUTO_INCREMENT ,
    Nom VARCHAR(30) , 
    Email VARCHAR(50),
    Pwd VARCHAR(50)
);

INSERT INTO Membre(Nom , Email , Pwd) VALUES ("Tendry" , "Tendry@gmail.com" , "tendry");
INSERT INTO Membre(Nom , Email , Pwd) VALUES ("Kevin" , "Kevin@gmail.com" , "kevin");

Create Table Publication(
    id_membre INT ,
    moment TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    texte  TEXT,
    id_pub INT PRIMARY KEY AUTO_INCREMENT
);

create table Commentaire(
    id_membre INT ,
    temps TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    coms  TEXT,
    id_pub INT,
    id_coms INT PRIMARY KEY AUTO_INCREMENT
);