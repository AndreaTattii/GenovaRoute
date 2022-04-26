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

CREATE TABLE Qr_Code(
	link varchar(255) PRIMARY KEY,
    id_tappa int REFERENCES Tappa(id) NOT NULL
);

CREATE TABLE Utente_Percorre_Tappa(
    email varchar(255) REFERENCES Utente(email) NOT NULL,
    id_tappa int REFERENCES Tappa(id) NOT NULL,
    PRIMARY KEY (email, id_tappa)
    data 
);



