CREATE TABLE Utente(
    email varchar(255) PRIMARY KEY NOT NULL,
    nome varchar(255) NOT NULL,
    cognome varchar(255) NOT NULL,
    psw vrachan varchar(255) NOT NULL
);
CREATE TABLE Tappa(
	id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255)
);