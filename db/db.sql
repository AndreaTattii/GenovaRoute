CREATE DATABASE IF NOT EXISTS GenovaRoute;

CREATE TABLE IF NOT EXISTS Utente(
    email varchar(255) PRIMARY KEY,
    nome varchar(255) NOT NULL,
    cognome varchar(255) NOT NULL,
    psw varchar(255) NOT NULL 
);

CREATE TABLE IF NOT EXISTS Tappa(
	id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Percorso(
	nome varchar(255) PRIMARY KEY ,
    descrizione varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Qr_Code(
	link varchar(255) PRIMARY KEY,
    id_tappa int REFERENCES Tappa(id)
);

CREATE TABLE IF NOT EXISTS Utente_Percorre_Tappa(
    email varchar(255) REFERENCES Utente(email),
    id_tappa int REFERENCES Tappa(id),
    PRIMARY KEY (email, id_tappa),
    data date NOT NULL
);

CREATE TABLE IF NOT EXISTS Tappa_Appartiene_Percorso(
    id_tappa int REFERENCES Tappa(id),
    id_percorso int REFERENCES Percorso(id),
    PRIMARY KEY (id_tappa, id_percorso)
);

--fill table Percorso with data
INSERT INTO Percorso (nome, descrizione) VALUES ('Monumenti di Genova', 'Percorso per i monumenti di Genova');
INSERT INTO Percorso (nome, descrizione) VALUES ('Vicolata', 'Percorso per la vicolata');

--fill table Tappa with data
INSERT INTO Tappa (nome) VALUES ('Piazza de Ferrari');
INSERT INTO Tappa (nome) VALUES ('Statua Colombo');
INSERT INTO Tappa (nome) VALUES ('Statua Garibaldi');

--fill table Tappa_Appartiene_Percorso with data
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso) VALUES (1, 1);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso) VALUES (2, 1);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso) VALUES (3, 2);






