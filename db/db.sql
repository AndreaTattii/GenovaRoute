CREATE DATABASE IF NOT EXISTS GenovaRoute;

CREATE TABLE IF NOT EXISTS Utente(
    email varchar(255) PRIMARY KEY,
    nome varchar(255) NOT NULL,
    cognome varchar(255) NOT NULL,
    psw varchar(255) NOT NULL 
);

CREATE TABLE IF NOT EXISTS Tappa(
	id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
    descrizione varchar(255) NOT NULL,
    via varchar(255) NOT NULL,
    città varchar(255)
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
INSERT INTO Percorso (nome, descrizione) VALUES ('Visita a Genova', 'Percorso per i monumenti, musei e ristoranti di Genova');
INSERT INTO Percorso (nome, descrizione) VALUES ('Vicolata', 'Percorso per la vicolata');

--fill table Tappa with data
INSERT INTO Tappa (nome, descrizione, via, città) VALUES ('Arco della Vittoria', 'Arco della Vittoria della seconda guerra mondiale', 'Piazza della Vittoria', 'Genova');
INSERT INTO Tappa (nome, descrizione, via, città) VALUES ('Ponte monumentale', 'Bellissimo ponte monumentale in centro città', 'Via XX Settembre', 'Genova');
INSERT INTO Tappa (nome, descrizione, via, città) VALUES ('Fontana de Ferrari', 'Fontana bellissima in una bella piazza', 'Piazza de Ferrari', 'Genova');
INSERT INTO Tappa (nome, descrizione, via, città) VALUES ('Cattedrale di San Lorenzo', 'Meravigliosa cattedrale', 'Piazza San Lorenzo', 'Genova');
INSERT INTO Tappa (nome, descrizione, via, città) VALUES ('Ombre Rosse', 'Ottimo ristorante con piatti tipici genovesi', 'Vico degli Indoratori', 'Genova');
INSERT INTO Tappa (nome, descrizione, via, città) VALUES ('Vascello Neptune', 'Arco della Vittoria della seconda guerra mondiale', 'Piazza della Vittoria', 'Genova');
INSERT INTO Tappa (nome, descrizione, via, città) VALUES ('Arco della Vittoria', 'Arco della Vittoria della seconda guerra mondiale', 'Piazza della Vittoria', 'Genova');
INSERT INTO Tappa (nome, descrizione, via, città) VALUES ('Arco della Vittoria', 'Arco della Vittoria della seconda guerra mondiale', 'Piazza della Vittoria', 'Genova');

--fill table Tappa_Appartiene_Percorso with data
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso) VALUES (1, 1);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso) VALUES (2, 1);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso) VALUES (3, 2);






