CREATE DATABASE IF NOT EXISTS GenovaRoute;

CREATE TABLE IF NOT EXISTS Utente(
    email varchar(255) PRIMARY KEY,
    nome varchar(255) NOT NULL,
    cognome varchar(255) NOT NULL,
    psw varchar(255) NOT NULL,
    admn int(1) NOT NULL
);

CREATE TABLE IF NOT EXISTS Tappa(
	id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
    descrizione mediumtext NOT NULL,
    via varchar(255) NOT NULL,
    città varchar(255),
    img1 varchar(255) NOT NULL,
    img2 varchar(255) NOT NULL,
    img3 varchar(255) NOT NULL
    lon varchar(255),
    lat varchar(255)
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
    ordine int UNIQUE NOT NULL,
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

INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) 
    VALUES (
            'Arco della Vittoria', 
            "
                L'Arco della Vittoria, detto anche Monumento ai Caduti o Arco dei Caduti, è un imponente arco di trionfo, realizzato durante il regime fascista, situato in Piazza della Vittoria a Genova. È dedicato ai genovesi caduti nel corso della Prima guerra mondiale e fu inaugurato il 31 maggio del 1931. La scelta di edificare un monumento celebrativo fu presa nel 1923 dal Comune di Genova, il quale, durante i lavori di urbanizzazione e riqualificazione dell'area all'epoca erbosa e umida, bandì un concorso nazionale prescrivendo che l'architettura avesse forma di arco e fosse posizionata nell'allora prato adiacente al torrente Bisagno, ancora non interrato sotto Viale Brigate Partigiane.
                La commissione giudicatrice scelse nella seconda fase - dai sedici progetti pervenuti - la bozza dell'architetto Marcello Piacentini (architetto che realizzò parecchie opere per il regime) e dello scultore Arturo Dazzi perché, come commentò la commissione, nel progetto si valorizzarono gli elementi architettonici della Roma Imperiale e del Cinquecento dando al monumento una forte funzione commemorativa eroica e trionfale.
                Il disegno originale del 1924 venne poi modificato dallo stesso Piacentini due anni dopo, rendendo il monumento ad arco più semplice e asciutto. Le opere per la costruzione del monumento furono eseguite dall'azienda locale 'Impresa Garbarino e Sciaccaluga, dirette personalmente dall'architetto Piacentini.
            ", 
            'Piazza della Vittoria', 
            'Genova',
            'http://www.visitgenoa.it/sites/default/files/gallery/PiazzadellaVittoria%20(2).jpg',
            'https://upload.wikimedia.org/wikipedia/it/3/3e/Genova_piazza_della_Vittoria_anni_trenta.jpg',
            'https://life-globe.com/image/cache/catalog/italia/liguria/genova/ploschad-pobedy/piazza-della-vittoria-genova-8-915x610.jpg'
    );
INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) 
    VALUES (
            'Ponte monumentale', 
            "  
                Il Ponte Monumentale è un'imponente costruzione in marmo, edificata nel 1895 dove prima sorgeva la Porta d'Arco delle Mura Nuove; il progetto fu presentato nel 1890 dall'ingegnere Cesare Gamba e dagli architetti Ronco e Haupt.
                Il Ponte attraversa in senso longitudinale via XX Settembre ed è alto 21 metri, la struttura portante è costituita da un grande arco di mattoni, le arcate sottostanti sono sorrette da colonne in marmo sulle quali è posta una decorazione scultorea in pietra.
            ", 
            "Corso Andrea Podesta'",
            'Genova',
            'https://i.ebayimg.com/images/g/MnEAAOSwPCFeVWvC/s-l400.jpg',
            'https://www.ilmugugnogenovese.it/wp-content/uploads/2016/02/4BD70B00-AE33-4AEE-856F-1F6EA0C4E1BC.jpeg',
            'http://4.bp.blogspot.com/-oKbxGlHoK3I/UdLxW96MtQI/AAAAAAAAC8I/nPJuUpELhqs/s1600/61+P.Monumentale+afdga+Mondani.jpg'
    );
INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) 
    VALUES (
            'Fontana de Ferrari', 
            "
                La piazza, intitolata al politico e banchiere genovese Luigi Raffaele De Ferrari, prese forma nei primi decenni del XX secolo in seguito alla realizzazione di via XX Settembre e Via Dante e allo sbancamento del colle di Sant'Andrea.
                Fin dai primi anni sorse il problema di come arredare il centro della piazza per permettere la realizzazione di una rotatoria intorno alla quale incanalare i veicoli provenienti dalle varie direzioni. Venne inizialmente realizzata una grande aiuola con palmizi, ma la soluzione non risultò convincente e agli inizi degli anni trenta l'architetto Giuseppe Crosa di Vergagni fu incaricato di ideare una nuova sistemazione.
                Il progetto di Crosa di Vergagni prevedeva una grande fontana costituita da una vasca centrale in bronzo posizionata al centro di una serie di vasche concentriche rivestite in travertino. Il bacile in bronzo fu donato alla città dall'ingegnere Carlo Piaggio per esaudire il desiderio testamentario del padre - il banchiere e armatore Erasmo Piaggio - di lasciare qualcosa di duraturo in dono alla città. La vasca venne fusa negli stabilimenti Tirreno di Genova-Le Grazie e trasportata in Piazza De Ferrari il 23 aprile 1936. Il trasporto del manufatto si rivelò particolarmente impegnativo perché la vasca, composta da un unico elemento di 11 metri di diametro e 36 tonnellate di peso, non poteva passare tra i vicoli del centro storico genovese. Il bacile fu quindi caricato su un pontone e trainato fino alla zona della Foce, da dove un trattore lo trasportò lungo il futuro Viale Brigate Partigiane e Via XX Settembre fino alla sua destinazione finale.
            ", 
            'Piazza Raffaele de Ferrari', 
            'Genova',
            'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Genoa_fontana_di_piazza_De_Ferrari.jpg/1200px-Genoa_fontana_di_piazza_De_Ferrari.jpg',
            'https://i.ebayimg.com/images/g/jtUAAOSwZFdaja0N/s-l400.jpg',
            'http://www.lavocedigenova.it/typo3temp/pics/p_ed7a0648c8.jpeg'
    );
INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) 
    VALUES (
            'Cattedrale di San Lorenzo', 
            "
                È stata consacrata al santo il 10 ottobre del 1118 da papa Gelasio II quando ne esistevano solo l'altare e una zona circostante, riservata alla preghiera, ma nessuna struttura in elevato. Nel corso del XII secolo fu costruita, ma ancora nel terzo quarto del secolo restava incompiuta e priva di una facciata vera e propria.
                Una prima basilica vi sorse intorno al VI-VII secolo[3] Una leggenda vuole che in città si siano fermati San Lorenzo e papa Sisto II, diretti in Spagna, venendo ospitati in una casa sita nella zona dell'attuale cattedrale, dove, dopo la loro uccisione, sarebbero sorte una cappella e poi una chiesa dedicate al santo.
            ", 
            'Piazza San Lorenzo', 
            'Genova',
            'https://images.placesonline.com/photos/424010405180500_Genova_772146049.jpg',
            'https://images.fidhouse.com/fidelitynews/wp-content/uploads/sites/9/2014/12/Cattedrale-di-San-Lorenzo-Genova-59994-2.jpg',
            'https://www.mentelocale.it/immagini/schede/462x260/138594.jpg'
            );
INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) 
    VALUES (
            'Ombre Rosse', 
            'Ottimo ristorante con piatti tipici genovesi', 
            'Vico degli Indoratori', 
            'Genova',
            'https://res.cloudinary.com/tf-lab/image/upload/restaurant/890f6db5-56cc-4c67-9d67-acdce6ff1acd/670a4514-f276-40c0-93e0-7012ff008ec9.jpg',
            'https://res.cloudinary.com/tf-lab/image/upload/restaurant/890f6db5-56cc-4c67-9d67-acdce6ff1acd/275a0d5a-2f53-4db4-8bb5-9faf6548b514.jpg',
            'https://res.cloudinary.com/tf-lab/image/upload/restaurant/890f6db5-56cc-4c67-9d67-acdce6ff1acd/de87e653-94dd-4cc6-a394-171089d546ea.jpg'
    );
INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) 
    VALUES (
            'Acquario di Genova', 
            "
                L'Acquario di Genova è un acquario situato a Ponte Spinola, nel cinquecentesco porto antico di Genova. Al momento dell'inaugurazione era il più grande d'Europa e il secondo nel mondo.
                Il percorso di 2 ore e 30 minuti comprende 39 vasche cui si aggiungono le 4 a cielo aperto del Padiglione Cetacei inaugurato nell'estate del 2013. La superficie totale della struttura è di 27 000 metri quadrati. Le vasche ospitano circa 15 000 animali di 400 specie diverse tra pesci, mammiferi marini, uccelli, rettili, anfibi, invertebrati in ambienti che riproducono quelli originari delle singole specie con evidenti finalità didattiche.
            ", 
            'Porto Antico, Molo Ponte Calvi', 
            'Genova',
            'https://www.poli-listaperta.it/wp-content/uploads/2021/11/unnamed.jpg',
            'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/08/e4/63/cb/acquario-di-genova.jpg?w=1200&h=1200&s=1',
            'https://fai-platform.imgix.net/media/convenzioni/liguria/ge/acquario-di-genova_104669.jpg'
    );
INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3)
     VALUES (
            'Palazzo Doria Tursi', 
            "
                Il palazzo Doria-Tursi, o palazzo Niccolò Grimaldi, è un edificio sito in via Garibaldi al civico 9 nel centro storico di Genova, inserito il 13 luglio del 2006 nella lista tra i 42 palazzi iscritti ai Rolli di Genova, divenuti in tale data Patrimonio dell'umanità dell'UNESCO. L'edificio è sede del Comune di Genova e fa parte del polo museale della città.
                Il palazzo, il maggiore per estensione in Strada Nuova, come era detta all'epoca via Giuseppe Garibaldi, fu eretto a partire dal 1565 dai fratelli Domenico e Giovanni Ponzello, architetti manieristi discepoli di Galeazzo Alessi, per Niccolò Grimaldi, appellato 'il Monarca' per il novero di titoli nobiliari di cui poteva vantarsi, e ai quali sommava gli innumerevoli crediti che aveva nei confronti di Filippo II, di cui era il principale banchiere.
                È l'edificio più maestoso della via, unico edificato su ben tre lotti di terreno, con due ampi giardini a incorniciare il corpo centrale. Le ampie logge affacciate sulla strada vennero aggiunte nel 1597, quando il palazzo divenne proprietà di Giovanni Andrea Doria che lo acquisì per il figlio cadetto Carlo, duca di Tursi, al quale si deve l'attuale denominazione.
                A seguito dell'annessione della Repubblica di Genova nel Regno di Sardegna, fu acquistato da Vittorio Emanuele I di Savoia nel 1820, ed in tale occasione ristrutturato dall'architetto di corte Carlo Randoni, cui è dovuta la costruzione della torretta dell'orologio.
                Dal 1848 è sede del municipio genovese.
            ",
             'Via Garibaldi', 
             'Genova',
             'https://img2.juzaphoto.com/002/shared_files/uploads/2795110.jpg',
             'http://hiddenarchitecture.net/wp-content/uploads/2019/09/raschdorf-017.jpg',
             'https://as2.ftcdn.net/v2/jpg/02/16/81/89/1000_F_216818917_4jbTMQnjEK9MXZ2NvwVVcBBV98HhQ91L.jpg'
    );
INSERT INTO Tappa (nome, descrizione, via, città, img1, img2, img3) 
    VALUES (    
            'Pesciolino', 
            'Ristorante di buonissimo pesce genovese', 
            'Vico Domoculta', 
            'Genova',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQguLzVCcKg9eURHqSOtLHg6TXax9dLHSa6Bk3M0SXFWQeoDwOkKeE-n1PzFsGIFv1abpQ&usqp=CAU',
            'https://4.bp.blogspot.com/-3YmCKTJPT7w/VtRZuCAwuHI/AAAAAAAACuI/6Iq1QDTKH4U/w1200-h630-p-k-no-nu/ambiente.jpg',
            'https://www.hotelcitygenova.it/resources/images/1c65a6a2-a14f-4049-972e-dc87d804b370/it/FWB/ristorante-pesciolino.jpg'
    );

INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (1, 1, 0);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (2, 1, 1);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (3, 1, 2);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (4, 1, 3);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (5, 1, 4);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (6, 1, 5);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (7, 1. 6);
INSERT INTO Tappa_Appartiene_Percorso (id_tappa, id_percorso, ordine) VALUES (8, 1, 7);


INSERT INTO Utente (email, nome, cognome, psw, admn) VALUES ('admin@admin', 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1);
