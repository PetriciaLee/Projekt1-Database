<?php
 include 'spajanje_bp.php';
 mysqli_query ($con, "SET NAMES UTF8");


$upit1 ="CREATE TABLE Drzava
        (
        ID_drzava INT(15) NOT NULL AUTO_INCREMENT,
        Naziv_drzave VARCHAR(15) ,
        CONSTRAINT pk_Drzava PRIMARY KEY (ID_drzava) 
        )";
mysqli_query ($con, $upit1);

$upit2 ="CREATE TABLE Umjetnik
(
ID_Umjetnik INT(15) NOT NULL AUTO_INCREMENT,
Ime_prezime VARCHAR(15) ,
Drzava INT(15),
CONSTRAINT pk_Umjetnik PRIMARY KEY (ID_Umjetnik),
CONSTRAINT fk_Drzava FOREIGN KEY (Drzava) REFERENCES Drzava(ID_drzava)
)"; 
mysqli_query ($con, $upit2);


$upit4 ="CREATE TABLE Pokret
        (
        ID_Pokret INT(15) NOT NULL AUTO_INCREMENT,
        Vrsta_pokreta VARCHAR(15) ,
        CONSTRAINT pk_Pokret PRIMARY KEY (ID_Pokret) 
        )";
mysqli_query ($con, $upit4);

$upit3 ="CREATE TABLE Djela
(
ID_Djela INT(15) NOT NULL AUTO_INCREMENT,
Naziv_djela VARCHAR(20),
Godina INT(15),
Umjetnik INT(15),
Mjesto izrade INT(15),
Žanr INT(15),
Pokret INT(15),
CONSTRAINT pk_Djela PRIMARY KEY (ID_Djela),
CONSTRAINT fk_Umjetnik FOREIGN KEY (Umjetnik) REFERENCES Umjetnik(ID_Umjetnik),
CONSTRAINT fk_Pokret FOREIGN KEY (Pokret) REFERENCES Pokret(ID_Pokret)
)"; 
mysqli_query ($con, $upit3);


?>