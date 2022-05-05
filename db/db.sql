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
    città varchar(255),
    img1 varchar(255) NOT NULL,
    img2 varchar(255) NOT NULL,
    img3 varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Percorso(
    id int PRIMARY KEY AUTO_INCREMENT,
	nome varchar(255),
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

INSERT INTO Percorso (nome, descrizione) VALUES ('Visita a Genova', 'Percorso per i monumenti, musei e ristoranti di Genova');
INSERT INTO Percorso (nome, descrizione) VALUES ('Vicolata', 'Percorso per la vicolata');
INSERT INTO Percorso (nome, descrizione) VALUES ('Chiese di Genova', 'Percorso per le chiese di Genova');
INSERT INTO Percorso (nome, descrizione) VALUES ('Musei di Genova', 'Percorso per i musei di Genova');
INSERT INTO Percorso (nome, descrizione) VALUES ('Fontane di Genova', 'Percorso per le fontane di Genova');
INSERT INTO Percorso (nome, descrizione) VALUES ('Visita a Dublino', 'Percorso per i monumenti, musei e ristoranti di Dublino');
INSERT INTO Percorso (nome, descrizione) VALUES ('Chiese di Dublino', 'Percorso per le chiese di Dublino');
INSERT INTO Percorso (nome, descrizione) VALUES ('Musei di Dublino', 'Percorso per i musei di Dublino');
INSERT INTO Percorso (nome, descrizione) VALUES ('Visita a Pisa', 'Percorso per i monumenti, musei e ristoranti di Pisa');
INSERT INTO Percorso (nome, descrizione) VALUES ('Chiese di Pisa', 'Percorso per le chiese di Pisa');

INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) VALUES ('Arco della Vittoria', 'Arco della Vittoria della seconda guerra mondiale', 'Piazza della Vittoria', 'Genova','https://www.costacrociere.it/content/dam/costa/costa-magazine/photo/hub-photo/genoa/foto-genova.jpg.image.750.563.low.jpg','https://www.giuliophoto.it/easyUp/image/22_img_3795_883d.jpg','https://www.cbgenova.it/easyUp/image/11_11_genova-1.jpg');
INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) VALUES ('Ponte monumentale', 'Bellissimo ponte monumentale in centro città', 'Via XX Settembre', 'Genova','https://www.costacrociere.it/content/dam/costa/costa-magazine/photo/hub-photo/genoa/foto-genova.jpg.image.750.563.low.jpg','https://www.giuliophoto.it/easyUp/image/22_img_3795_883d.jpg','https://www.cbgenova.it/easyUp/image/11_11_genova-1.jpg');
INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) VALUES ('Fontana de Ferrari', 'Fontana bellissima in una bella piazza', 'Piazza Raffaele de Ferrari', 'Genova','https://www.costacrociere.it/content/dam/costa/costa-magazine/photo/hub-photo/genoa/foto-genova.jpg.image.750.563.low.jpg','https://www.giuliophoto.it/easyUp/image/22_img_3795_883d.jpg','https://www.cbgenova.it/easyUp/image/11_11_genova-1.jpg');
INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) VALUES ('Cattedrale di San Lorenzo', 'Meravigliosa cattedrale di mio fratello Lorenzo', 'Piazza San Lorenzo', 'Genova','https://www.costacrociere.it/content/dam/costa/costa-magazine/photo/hub-photo/genoa/foto-genova.jpg.image.750.563.low.jpg','https://www.giuliophoto.it/easyUp/image/22_img_3795_883d.jpg','https://www.cbgenova.it/easyUp/image/11_11_genova-1.jpg');
INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) VALUES ('Ombre Rosse', 'Ottimo ristorante con piatti tipici genovesi', 'Vico degli Indoratori', 'Genova','https://www.costacrociere.it/content/dam/costa/costa-magazine/photo/hub-photo/genoa/foto-genova.jpg.image.750.563.low.jpg','https://www.giuliophoto.it/easyUp/image/22_img_3795_883d.jpg','https://www.cbgenova.it/easyUp/image/11_11_genova-1.jpg');
INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) VALUES ('Acquario di Genova', 'Meraviglioso acquario pieno di pesci belli', 'Porto Antico, Molo Ponte Calvi', 'Genova','https://www.costacrociere.it/content/dam/costa/costa-magazine/photo/hub-photo/genoa/foto-genova.jpg.image.750.563.low.jpg','https://www.giuliophoto.it/easyUp/image/22_img_3795_883d.jpg','https://www.cbgenova.it/easyUp/image/11_11_genova-1.jpg');
INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) VALUES ('Palazzo Doria Tursi', 'Palazzo dei Doria, famiglia genovese stabilitasi nel 1742', 'Via Garibaldi', 'Genova','https://www.costacrociere.it/content/dam/costa/costa-magazine/photo/hub-photo/genoa/foto-genova.jpg.image.750.563.low.jpg','https://www.giuliophoto.it/easyUp/image/22_img_3795_883d.jpg','https://www.cbgenova.it/easyUp/image/11_11_genova-1.jpg');
INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) VALUES ('PEsciolino', 'Ristorante di buonissimo pesce genovese', 'Vico Domoculta', 'Genova','https://www.costacrociere.it/content/dam/costa/costa-magazine/photo/hub-photo/genoa/foto-genova.jpg.image.750.563.low.jpg','https://www.giuliophoto.it/easyUp/image/22_img_3795_883d.jpg','https://www.cbgenova.it/easyUp/image/11_11_genova-1.jpg');

INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso) VALUES (1, 1);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso) VALUES (2, 1);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso) VALUES (3, 1);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso) VALUES (4, 1);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso) VALUES (5, 1);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso) VALUES (6, 1);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso) VALUES (7, 1);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso) VALUES (8, 1);






