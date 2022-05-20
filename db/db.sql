CREATE DATABASE IF NOT EXISTS GenovaRoute;

USE GenovaRoute;

CREATE TABLE IF NOT EXISTS Utente(
    email varchar(255) PRIMARY KEY,
    username varchar(255) NOT NULL UNIQUE,
    nome varchar(255) NOT NULL,
    cognome varchar(255) NOT NULL,
    psw varchar(255) NOT NULL,
    admn int(1) NOT NULL
);

CREATE TABLE IF NOT EXISTS citta(
    nome varchar(255) PRIMARY KEY,
    x varchar(255),
    y varchar(255)
);

CREATE TABLE IF NOT EXISTS Tappa(
	id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255) UNIQUE NOT NULL,
    descrizione mediumtext NOT NULL,
    citta varchar(255) NOT NULL REFERENCES citta(nome),
    via varchar(255) NOT NULL,
    lon varchar(255),
    lat varchar(255)
);

CREATE TABLE IF NOT EXISTS Percorso(
    id int PRIMARY KEY AUTO_INCREMENT,
	nome varchar(255) UNIQUE,
    descrizione varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Utente_Percorre_Tappa(
    email varchar(255) REFERENCES Utente(email),
    id_tappa int REFERENCES Tappa(id),
    PRIMARY KEY (email, id_tappa),
    data TIMESTAMP NOT NULL
);

CREATE TABLE IF NOT EXISTS Utente_Preferisce_Percorso(
    email varchar(255) REFERENCES Utente(email),
    id_percorso int REFERENCES Percorso(id),
    PRIMARY KEY (email, id_percorso)
);

CREATE TABLE IF NOT EXISTS Tappa_Appartiene_Percorso(
    id_tappa int REFERENCES Tappa(id),
    id_percorso int REFERENCES Percorso(id),
    ordine int NOT NULL,
    PRIMARY KEY (id_tappa, id_percorso)
);


INSERT INTO citta (nome, x, y) VALUES
('Genova', '8.9881', '44.4074'),
('Milano', '9.1899', '45.4642'),
('Roma', '12.5674', '41.8719'),
('Firenze', '11.3116', '43.7696'),
('Napoli', '14.2464', '40.8981'),
('Palermo', '13.3613', '38.1155'),
('Bologna', '11.3116', '44.4942'),
('Bari', '16.8981', '41.1155'),
('Torino', '7.6667', '45.0667'),
('Messina', '15.5555', '38.1833'),
('Catania', '15.0833', '37.5667'),
('Taranto', '17.6333', '40.5333'),
('Cagliari', '9.1333', '39.2167'),
('Pescara', '14.2', '42.45'),
('Lecce', '18.15', '40.35'),
('Foggia', '15.5333', '41.4333'),
('Benevento', '14.75', '41.1167'),
('Aosta', '7.4167', '46.0667'),
('Perugia', '12.1333', '43.6333'),
('Pisa', '12.5', '43.7167'),
('Ravenna', '12.25', '44.4'),
('Terni', '12.5333', '42.6833'),
('Ancona', '13.5', '43.5833'),
('Reggio di Calabria', '15.5833', '38.0833'),
('Modena', '10.9167', '44.65'),
('Pordenone', '13.6667', '46.0667'),
('Ferrara', '11.6', '44.8333'),
('Venezia', '12.3','44.4167'),
('Vicenza', '11.5333', '45.7333'),
('Livorno', '10.8333', '43.7'),
('Trento', '11.0833', '46.0667'),
('Bolzano', '9.8333', '46.3667'),
('Verona', '10.9', '45.4167'),
('Trieste', '13.3667', '45.8333'),
('Padova', '11.8333', '45.4167'),
('Parma', '10.3167', '44.8'),
('Rovigo', '11.3333', '46.3167'),
('Udine', '13.0833', '46.0667'),
('Como', '9.0833', '45.8333'),
('Gorizia', '15.6333', '45.9'),
('Cuneo', '7.5333', '44.3667'),
('Novara', '7.6667', '45.3333'),
('Asti', '8.2333', '44.8333'),
('Biella', '8.7333', '45.5333'),
('Lecco', '9.3667', '45.7833'),
('Siena', '11.35', '43.31667'),
('Lodi', '9.2167', '45.1833'),
('Mantova', '10.9167', '45.5167'),
('Pesaro e Urbino', '12.6667', '43.7'),
('Pistoia', '12.8333', '43.8333'),
('Ragusa', '14.7333', '36.9'),
('Siracusa', '15.0833', '37.0833'),
('Trapani', '12.4167', '38.01667'),
('Caltanissetta', '14.1', '37.0833'),
('Sassari', '9.5333', '40.7167'),
('Matera', '16.6333', '40.65'),
('Catanzaro', '15.6333', '38.8833'),
('Vibo Valentia', '16.0333', '37.7167'),
('Medio Campidano', '15.7167', '38.5167'),
('Cosenza', '16.2833', '38.2'),
('Ascoli Piceno', '13.5833', '42.8333'),
('Isernia', '15.5333', '41.5833'),
('Campobasso', '15.6333', '41.5'),
('Ischia', '15.7167', '40.6333'),
("L Aquila", '13.5333', '42.7167'),
('Potenza', '15.0833', '40.6333'),
('Salerno', '14.7', '40.7167'),
('Pavia', '9.1833', '45.1833'),
('Verbano-Cusio-Ossola', '8.0333', '45.9'),
('La Spezia', '9.0333', '44.1'),
('Cremona', '10.0667', '45.0667'),
('Bergamo', '9.8833', '45.6667'),
('Sondrio', '9.9333', '46.2');

INSERT INTO citta (nome, x, y) VALUES
('Paris', '2.3522', '48.8566'),
('Lyon', '4.8333', '45.7'),
('Marseille', '5.3667', '43.3'),
('Toulouse', '1.4667', '43.6'),
('Nice', '7.2667', '43.7167'),
('Strasbourg', '7.75', '48.5833'),
('Montpellier', '3.8833', '43.6'),
('Bordeaux', '-0.5833', '44.8333'),
('Lille', '3.0667', '50.6333'),
('Rennes', '-1.6', '48.0667'),
('Le Havre', '0.1', '49.4833'),
('Toulon', '5.9333', '43.1233'),
('Grenoble', '6.1667', '45.7'),
('Dijon', '5.0333', '47.4333'),
('Angers', '-0.5667', '47.4333'),
('Nancy', '6.1833', '48.6833'),
('Reims', '4.0333', '49.25'),
('Brest', '-4.5', '48.4667'),
('Le Mans', '0.1667', '48.0833'),
('Amiens', '2.4333', '49.9'),
('Metz', '6.1667', '49.1167'),
('Besancon', '7.3333', '47.25'),
('Caen', '-0.4333', '49.1833'),
('Rouen', '1.0833', '49.4333'),
('Nantes', '1.7', '47.2');

INSERT INTO citta (nome, x, y) VALUES
('Berlin', '13.3833', '52.5167'),
('Hamburg', '9.9667', '53.6'),
('Munich', '11.55', '48.15'),
('Cologne', '6.95', '50.9667'),
('Frankfurt', '8.6833', '50.1167'),
('Stuttgart', '9.1833', '48.7667'),
('Dortmund', '7.4667', '51.5'),
('Dresden', '13.7667', '51.0667'),
('Leipzig', '12.3833', '51.3667'),
('Nuremberg', '11.3667', '49.45'),
('Düsseldorf', '6.7833', '51.2'),
('Bremen', '8.05', '53.0833'),
('Hannover', '9.7667', '52.3667'),
('Duisburg', '6.7333', '51.45'),
('Essen', '7.0333', '51.4333'),
('Bochum', '7.2167', '51.4833'),
('Wuppertal', '7.2833', '51.2833'),
('Bonn', '7.0833', '50.7333'),
('Münster', '7.6333', '51.95'),
('Mannheim', '8.4667', '49.4833'),
('Augsburg', '10.8833', '48.3667'),
('Karlsruhe', '8.4667', '49.0167'),
('Wiesbaden', '8.1833', '50.0833'),
('Mönchengladbach', '6.4333', '51.2'),
('Chemnitz', '12.3833', '50.8833'),
('Aachen', '6.0833', '50.7333'),
('Kiel', '10.1333', '54.3333');

INSERT INTO citta (nome, x, y) VALUES
('London', '-0.1333', '51.5'),
('Manchester', '-2.2', '53.5'),
('Liverpool', '-2.9667', '53.4667'),
('Birmingham', '-1.8667', '52.4833'),
('Leeds', '-1.5333', '53.8667'),
('Glasgow', '-4.25', '55.8333'),
('Bristol', '-2.5833', '51.4333'),
('Cardiff', '-3.2167', '51.4833'),
('Edinburgh', '-3.2167', '55.95'),
('Belfast', '-5.9667', '54.6'),
('Coventry', '-1.5', '52.4667'),
('Nottingham', '-1.5', '52.95'),
('Newcastle', '-1.5', '55.0333'),
('Plymouth', '-4.1667', '50.7333'),
('Swansea', '-3.95', '51.6333'),
('Southampton', '-1.4667', '50.9667'),
('Portsmouth', '-1.0833', '50.8333'),
('Reading', '-0.9667', '51.4667'),
('Brighton', '-0.15', '50.8333'),
('Bournemouth', '-1.85', '50.7333'),
('Cambridge', '0.1167', '52.2'),
('Oxford', '1.25', '51.8667');

INSERT INTO citta (nome, x, y) VALUES
('Brussels', '4.35', '50.8333'),
('Antwerp', '4.4667', '51.2167'),
('Ghent', '3.7', '51.0333'),
('Charleroi', '4.4667', '50.4667'),
('Liege', '5.5833', '50.6333'),
('Namur', '4.9', '50.4667'),
('Bruges', '3.2', '51.2'),
('Mons', '3.9667', '50.45'),
('Bruxelles', '4.35', '50.8333');
INSERT INTO citta (nome, x, y) VALUES
('Zagreb', '15.9167', '45.8'),
('Split', '15.5', '43.5667'),
('Rijeka', '15.45', '45.35'),
('Zadar', '15.4667', '44.2'),
('Osijek', '18.6', '45.55'),
('Pula', '15.3333', '44.8333'),
('Koprivnica', '16.65', '43.8333');













INSERT INTO Percorso (nome, descrizione) VALUES ('Visita a Genova', 'Percorso per i monumenti, musei e ristoranti di Genova');
INSERT INTO Percorso (nome, descrizione) VALUES ('Vicolata', 'Percorso per la vicolata');
INSERT INTO Percorso (nome, descrizione) VALUES ('Chiese di Genova', 'Percorso per le chiese di Genova');
INSERT INTO Percorso (nome, descrizione) VALUES ('Musei di Genova', 'Percorso per i musei di Genova');
INSERT INTO Percorso (nome, descrizione) VALUES ('Fontane di Genova', 'Percorso per le fontane di Genova');
INSERT INTO Percorso (nome, descrizione) VALUES ('Visita a Dublino', 'Percorso per i monumenti, musei e ristoranti di Dublino');
INSERT INTO Percorso (nome, descrizione) VALUES ('Chiese di Dublino', 'Percorso per le chiese di Dublino');

 
INSERT INTO Tappa (nome, descrizione, citta, via,  lon, lat) 
    VALUES (
            'Arco della Vittoria', 
            "
                L'Arco della Vittoria, detto anche Monumento ai Caduti o Arco dei Caduti, è un imponente arco di trionfo, realizzato durante il regime fascista, situato in Piazza della Vittoria a Genova. È dedicato ai genovesi caduti nel corso della Prima guerra mondiale e fu inaugurato il 31 maggio del 1931. La scelta di edificare un monumento celebrativo fu presa nel 1923 dal Comune di Genova, il quale, durante i lavori di urbanizzazione e riqualificazione dell'area all'epoca erbosa e umida, bandì un concorso nazionale prescrivendo che l'architettura avesse forma di arco e fosse posizionata nell'allora prato adiacente al torrente Bisagno, ancora non interrato sotto Viale Brigate Partigiane.
                La commissione giudicatrice scelse nella seconda fase - dai sedici progetti pervenuti - la bozza dell'architetto Marcello Piacentini (architetto che realizzò parecchie opere per il regime) e dello scultore Arturo Dazzi perché, come commentò la commissione, nel progetto si valorizzarono gli elementi architettonici della Roma Imperiale e del Cinquecento dando al monumento una forte funzione commemorativa eroica e trionfale.
                Il disegno originale del 1924 venne poi modificato dallo stesso Piacentini due anni dopo, rendendo il monumento ad arco più semplice e asciutto. Le opere per la costruzione del monumento furono eseguite dall'azienda locale 'Impresa Garbarino e Sciaccaluga, dirette personalmente dall'architetto Piacentini.
            ", 
            'Genova',
            'Piazza della Vittoria', 
            '44.403077306694875',
            '8.944978513772323'
    );
INSERT INTO Tappa (nome, descrizione, citta, via,  lon, lat) 
    VALUES (
            'Ponte monumentale', 
            "  
                Il Ponte Monumentale è un'imponente costruzione in marmo, edificata nel 1895 dove prima sorgeva la Porta d'Arco delle Mura Nuove; il progetto fu presentato nel 1890 dall'ingegnere Cesare Gamba e dagli architetti Ronco e Haupt.
                Il Ponte attraversa in senso longitudinale via XX Settembre ed è alto 21 metri, la struttura portante è costituita da un grande arco di mattoni, le arcate sottostanti sono sorrette da colonne in marmo sulle quali è posta una decorazione scultorea in pietra.
            ", 
            'Genova',
            "Corso Andrea Podesta'",
            '44.40591531858697', 
            '8.939335738048305'
    );
INSERT INTO Tappa (nome, descrizione, citta, via, lon, lat) 
    VALUES (
            'Fontana de Ferrari', 
            "
                La piazza, intitolata al politico e banchiere genovese Luigi Raffaele De Ferrari, prese forma nei primi decenni del XX secolo in seguito alla realizzazione di via XX Settembre e Via Dante e allo sbancamento del colle di Sant'Andrea.
                Fin dai primi anni sorse il problema di come arredare il centro della piazza per permettere la realizzazione di una rotatoria intorno alla quale incanalare i veicoli provenienti dalle varie direzioni. Venne inizialmente realizzata una grande aiuola con palmizi, ma la soluzione non risultò convincente e agli inizi degli anni trenta l'architetto Giuseppe Crosa di Vergagni fu incaricato di ideare una nuova sistemazione.
                Il progetto di Crosa di Vergagni prevedeva una grande fontana costituita da una vasca centrale in bronzo posizionata al centro di una serie di vasche concentriche rivestite in travertino. Il bacile in bronzo fu donato alla citta dall'ingegnere Carlo Piaggio per esaudire il desiderio testamentario del padre - il banchiere e armatore Erasmo Piaggio - di lasciare qualcosa di duraturo in dono alla citta. La vasca venne fusa negli stabilimenti Tirreno di Genova-Le Grazie e trasportata in Piazza De Ferrari il 23 aprile 1936. Il trasporto del manufatto si rivelò particolarmente impegnativo perché la vasca, composta da un unico elemento di 11 metri di diametro e 36 tonnellate di peso, non poteva passare tra i vicoli del centro storico genovese. Il bacile fu quindi caricato su un pontone e trainato fino alla zona della Foce, da dove un trattore lo trasportò lungo il futuro Viale Brigate Partigiane e Via XX Settembre fino alla sua destinazione finale.
            ", 
            'Genova',
            'Piazza Raffaele de Ferrari', 
            '44.40712785099835', 
            '8.934016640162541'
    );
INSERT INTO Tappa (nome, descrizione, citta, via,  lon, lat) 
    VALUES (
            'Cattedrale di San Lorenzo', 
            "
                È stata consacrata al santo il 10 ottobre del 1118 da papa Gelasio II quando ne esistevano solo l'altare e una zona circostante, riservata alla preghiera, ma nessuna struttura in elevato. Nel corso del XII secolo fu costruita, ma ancora nel terzo quarto del secolo restava incompiuta e priva di una facciata vera e propria.
                Una prima basilica vi sorse intorno al VI-VII secolo[3] Una leggenda vuole che in citta si siano fermati San Lorenzo e papa Sisto II, diretti in Spagna, venendo ospitati in una casa sita nella zona dell'attuale cattedrale, dove, dopo la loro uccisione, sarebbero sorte una cappella e poi una chiesa dedicate al santo.
            ", 
            'Genova',
            'Piazza San Lorenzo', 
            '44.40763134514167', 
            '8.931458789833469'
            );
INSERT INTO Tappa (nome, descrizione, citta, via,  lon, lat) 
    VALUES (
            'Ombre Rosse', 
            'Ottimo ristorante con piatti tipici genovesi', 
            'Genova',
            'Vico degli Indoratori', 
            '44.4086854746386', 
            '8.931197246472893'
    );
INSERT INTO Tappa (nome, descrizione, citta, via,  lon, lat) 
    VALUES (
            'Acquario di Genova', 
            "
                L'Acquario di Genova è un acquario situato a Ponte Spinola, nel cinquecentesco porto antico di Genova. Al momento dell'inaugurazione era il più grande d'Europa e il secondo nel mondo.
                Il percorso di 2 ore e 30 minuti comprende 39 vasche cui si aggiungono le 4 a cielo aperto del Padiglione Cetacei inaugurato nell'estate del 2013. La superficie totale della struttura è di 27 000 metri quadrati. Le vasche ospitano circa 15 000 animali di 400 specie diverse tra pesci, mammiferi marini, uccelli, rettili, anfibi, invertebrati in ambienti che riproducono quelli originari delle singole specie con evidenti finalità didattiche.
            ", 
            'Genova',
            'Porto Antico, Molo Ponte Calvi', 
            '44.41020428824749', 
            '8.92666193224689'
    );
INSERT INTO Tappa (nome, descrizione, citta, via,  lon, lat)
     VALUES (
            'Palazzo Doria Tursi', 
            "
                Il palazzo Doria-Tursi, o palazzo Niccolò Grimaldi, è un edificio sito in via Garibaldi al civico 9 nel centro storico di Genova, inserito il 13 luglio del 2006 nella lista tra i 42 palazzi iscritti ai Rolli di Genova, divenuti in tale data Patrimonio dell'umanità dell'UNESCO. L'edificio è sede del Comune di Genova e fa parte del polo museale della citta.
                Il palazzo, il maggiore per estensione in Strada Nuova, come era detta all'epoca via Giuseppe Garibaldi, fu eretto a partire dal 1565 dai fratelli Domenico e Giovanni Ponzello, architetti manieristi discepoli di Galeazzo Alessi, per Niccolò Grimaldi, appellato 'il Monarca' per il novero di titoli nobiliari di cui poteva vantarsi, e ai quali sommava gli innumerevoli crediti che aveva nei confronti di Filippo II, di cui era il principale banchiere.
                È l'edificio più maestoso della via, unico edificato su ben tre lotti di terreno, con due ampi giardini a incorniciare il corpo centrale. Le ampie logge affacciate sulla strada vennero aggiunte nel 1597, quando il palazzo divenne proprietà di Giovanni Andrea Doria che lo acquisì per il figlio cadetto Carlo, duca di Tursi, al quale si deve l'attuale denominazione.
                A seguito dell'annessione della Repubblica di Genova nel Regno di Sardegna, fu acquistato da Vittorio Emanuele I di Savoia nel 1820, ed in tale occasione ristrutturato dall'architetto di corte Carlo Randoni, cui è dovuta la costruzione della torretta dell'orologio.
                Dal 1848 è sede del municipio genovese.
            ",
            'Genova',
             'Via Garibaldi', 
             '44.411243317284956', 
             '8.932595267635298'
    );
INSERT INTO Tappa (nome, descrizione, citta, via,  lon, lat) 
    VALUES (    
            'Pesciolino', 
            'Ristorante di buonissimo pesce genovese', 
            'Genova',
            'Vico Domoculta', 
            '44.409211995678156', 
            '8.935454975015281'
    );

INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (1, 1, 0);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (2, 1, 1);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (3, 1, 2);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (4, 1, 3);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (5, 1, 4);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (6, 1, 5);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (7, 1, 6);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (8, 1, 7);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (9, 2, 0);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (8, 2, 1);


INSERT INTO Utente (email, username, nome, cognome, psw, admn) VALUES ('admin@admin','admin', 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1);
