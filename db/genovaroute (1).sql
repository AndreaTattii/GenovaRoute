-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 30, 2022 alle 12:35
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genovaroute`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `citta`
--

CREATE TABLE `citta` (
  `nome` varchar(255) NOT NULL,
  `x` varchar(255) DEFAULT NULL,
  `y` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `citta`
--

INSERT INTO `citta` (`nome`, `x`, `y`) VALUES
('Aachen', '50.7333', '6.0833'),
('Amiens', '49.9', '2.4333'),
('Ancona', '43.5833', '13.5'),
('Angers', '47.4333', '-0.5667'),
('Antwerp', '51.2167', '4.4667'),
('Aosta', '46.0667', '7.4167'),
('Ascoli Piceno', '42.8333', '13.5833'),
('Asti', '44.8333', '8.2333'),
('Augsburg', '48.3667', '10.8833'),
('Bari', '41.1155', '16.8981'),
('Belfast', '54.6', '-5.9667'),
('Benevento', '41.1167', '14.75'),
('Bergamo', '45.6667', '9.8833'),
('Berlin', '52.5167', '13.3833'),
('Besancon', '47.25', '7.3333'),
('Biella', '45.5333', '8.7333'),
('Birmingham', '52.4833', '-1.8667'),
('Bochum', '51.4833', '7.2167'),
('Bologna', '44.4942', '11.3116'),
('Bolzano', '46.3667', '9.8333'),
('Bonn', '50.7333', '7.0833'),
('Bordeaux', '44.8333', '-0.5833'),
('Bournemouth', '50.7333', '-1.85'),
('Bremen', '53.0833', '8.05'),
('Brest', '48.4667', '-4.5'),
('Brighton', '50.8333', '-0.15'),
('Bristol', '51.4333', '-2.5833'),
('Bruges', '51.2', '3.2'),
('Brussels', '50.8333', '4.35'),
('Bruxelles', '50.8333', '4.35'),
('Caen', '49.1833', '-0.4333'),
('Cagliari', '39.2167', '9.1333'),
('Caltanissetta', '37.0833', '14.1'),
('Cambridge', '52.2', '0.1167'),
('Campobasso', '41.5', '15.6333'),
('Cardiff', '51.4833', '-3.2167'),
('Catania', '37.5667', '15.0833'),
('Catanzaro', '38.8833', '15.6333'),
('Charleroi', '50.4667', '4.4667'),
('Chemnitz', '50.8833', '12.3833'),
('Cologne', '50.9667', '6.95'),
('Como', '45.8333', '9.0833'),
('Cosenza', '38.2', '16.2833'),
('Coventry', '52.4667', '-1.5'),
('Cremona', '45.0667', '10.0667'),
('Cuneo', '44.3667', '7.5333'),
('Dijon', '47.4333', '5.0333'),
('Dortmund', '51.5', '7.4667'),
('Dresden', '51.0667', '13.7667'),
('Duisburg', '51.45', '6.7333'),
('Düsseldorf', '51.2', '6.7833'),
('Edinburgh', '55.95', '-3.2167'),
('Essen', '51.4333', '7.0333'),
('Ferrara', '44.8333', '11.6'),
('Firenze', '43.7696', '11.3116'),
('Foggia', '41.4333', '15.5333'),
('Frankfurt', '50.1167', '8.6833'),
('Genova', '44.4074', '8.9881'),
('Ghent', '51.0333', '3.7'),
('Glasgow', '55.8333', '-4.25'),
('Gorizia', '45.9', '15.6333'),
('Grenoble', '45.7', '6.1667'),
('Hamburg', '53.6', '9.9667'),
('Hannover', '52.3667', '9.7667'),
('Ischia', '40.6333', '15.7167'),
('Isernia', '41.5833', '15.5333'),
('Karlsruhe', '49.0167', '8.4667'),
('Kiel', '54.3333', '10.1333'),
('Koprivnica', '43.8333', '16.65'),
('L Aquila', '42.7167', '13.5333'),
('La Spezia', '44.1', '9.0333'),
('Le Havre', '49.4833', '0.1'),
('Le Mans', '48.0833', '0.1667'),
('Lecce', '40.35', '18.15'),
('Lecco', '45.7833', '9.3667'),
('Leeds', '53.8667', '-1.5333'),
('Leipzig', '51.3667', '12.3833'),
('Liege', '50.6333', '5.5833'),
('Lille', '50.6333', '3.0667'),
('Liverpool', '53.4667', '-2.9667'),
('Livorno', '43.7', '10.8333'),
('Lodi', '45.1833', '9.2167'),
('London', '51.5', '-0.1333'),
('Lyon', '45.7', '4.8333'),
('Manchester', '53.5', '-2.2'),
('Mannheim', '49.4833', '8.4667'),
('Mantova', '45.5167', '10.9167'),
('Marseille', '43.3', '5.3667'),
('Matera', '40.65', '16.6333'),
('Medio Campidano', '38.5167', '15.7167'),
('Messina', '38.1833', '15.5555'),
('Metz', '49.1167', '6.1667'),
('Milano', '45.4642', '9.1899'),
('Modena', '44.65', '10.9167'),
('Mönchengladbach', '51.2', '6.4333'),
('Mons', '50.45', '3.9667'),
('Montpellier', '43.6', '3.8833'),
('Munich', '48.15', '11.55'),
('Münster', '51.95', '7.6333'),
('Namur', '50.4667', '4.9'),
('Nancy', '48.6833', '6.1833'),
('Nantes', '47.2', '1.7'),
('Napoli', '40.8981', '14.2464'),
('Newcastle', '55.0333', '-1.5'),
('Nice', '43.7167', '7.2667'),
('Nottingham', '52.95', '-1.5'),
('Novara', '45.3333', '7.6667'),
('Nuremberg', '49.45', '11.3667'),
('Osijek', '45.55', '18.6'),
('Oxford', '51.8667', '1.25'),
('Padova', '45.4167', '11.8333'),
('Palermo', '38.1155', '13.3613'),
('Paris', '48.8566', '2.3522'),
('Parma', '44.8', '10.3167'),
('Pavia', '45.1833', '9.1833'),
('Perugia', '43.6333', '12.1333'),
('Pesaro e Urbino', '43.7', '12.6667'),
('Pescara', '42.45', '14.2'),
('Pisa', '43.7167', '12.5'),
('Pistoia', '43.8333', '12.8333'),
('Plymouth', '50.7333', '-4.1667'),
('Pordenone', '46.0667', '13.6667'),
('Portsmouth', '50.8333', '-1.0833'),
('Potenza', '40.6333', '15.0833'),
('Pula', '44.8333', '15.3333'),
('Ragusa', '36.9', '14.7333'),
('Ravenna', '44.4', '12.25'),
('Reading', '51.4667', '-0.9667'),
('Reggio di Calabria', '38.0833', '15.5833'),
('Reims', '49.25', '4.0333'),
('Rennes', '48.0667', '-1.6'),
('Rijeka', '45.35', '15.45'),
('Roma', '41.8719', '12.5674'),
('Rouen', '49.4333', '1.0833'),
('Rovigo', '46.3167', '11.3333'),
('Salerno', '40.7167', '14.7'),
('Sassari', '40.7167', '9.5333'),
('Siena', '43.31667', '11.35'),
('Siracusa', '37.0833', '15.0833'),
('Sondrio', '46.2', '9.9333'),
('Southampton', '50.9667', '-1.4667'),
('Split', '43.5667', '15.5'),
('Strasbourg', '48.5833', '7.75'),
('Stuttgart', '48.7667', '9.1833'),
('Swansea', '51.6333', '-3.95'),
('Taranto', '40.5333', '17.6333'),
('Terni', '42.6833', '12.5333'),
('Torino', '45.0667', '7.6667'),
('Toulon', '43.1233', '5.9333'),
('Toulouse', '43.6', '1.4667'),
('Trapani', '38.01667', '12.4167'),
('Trento', '46.0667', '11.0833'),
('Trieste', '45.8333', '13.3667'),
('Udine', '46.0667', '13.0833'),
('Venezia', '44.4167', '12.3'),
('Verbano-Cusio-Ossola', '45.9', '8.0333'),
('Verona', '45.4167', '10.9'),
('Vibo Valentia', '37.7167', '16.0333'),
('Vicenza', '45.7333', '11.5333'),
('Wiesbaden', '50.0833', '8.1833'),
('Wuppertal', '51.2833', '7.2833'),
('Zadar', '44.2', '15.4667'),
('Zagreb', '45.8', '15.9167');

-- --------------------------------------------------------

--
-- Struttura della tabella `percorso`
--

CREATE TABLE `percorso` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descrizione` varchar(255) NOT NULL,
  `dataInserimento` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `percorso`
--

INSERT INTO `percorso` (`id`, `nome`, `descrizione`, `dataInserimento`) VALUES
(1, 'Visita a Genova', 'Percorso per i monumenti, musei e ristoranti di Genova', '2022-05-13 13:47:32'),
(8, 'Visita a Berlino', 'Berlino è la capitale e maggiore città della Germania. ', '2022-05-26 13:47:32'),
(10, 'Il Centro Storico di Firenze', 'Quest\'itinerario vi consentirà di visitare tutti i principali siti turistici e famosi della città.', '2022-05-28 14:59:06'),
(11, 'Prova', 'Prova per debug ', '2022-05-29 19:28:38');

-- --------------------------------------------------------

--
-- Struttura della tabella `tappa`
--

CREATE TABLE `tappa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descrizione` mediumtext NOT NULL,
  `citta` varchar(255) NOT NULL,
  `via` varchar(255) NOT NULL,
  `lon` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tappa`
--

INSERT INTO `tappa` (`id`, `nome`, `descrizione`, `citta`, `via`, `lon`, `lat`) VALUES
(1, 'Arco della Vittoria', 'L\'Arco della Vittoria, detto anche Monumento ai Caduti o Arco dei Caduti, è un imponente arco di trionfo, realizzato durante il regime fascista, situato in Piazza della Vittoria a Genova. È dedicato ai genovesi caduti nel corso della Prima guerra mondiale e fu inaugurato il 31 maggio del 1931. La scelta di edificare un monumento celebrativo fu presa nel 1923 dal Comune di Genova, il quale, durante i lavori di urbanizzazione e riqualificazione dell\'area all\'epoca erbosa e umida, bandì un concorso nazionale prescrivendo che l\'architettura avesse forma di arco e fosse posizionata nell\'allora prato adiacente al torrente Bisagno, ancora non interrato sotto Viale Brigate Partigiane.\r\nLa commissione giudicatrice scelse nella seconda fase - dai sedici progetti pervenuti - la bozza dell\'architetto Marcello Piacentini (architetto che realizzò parecchie opere per il regime) e dello scultore Arturo Dazzi perché, come commentò la commissione, nel progetto si valorizzarono gli elementi architettonici della Roma Imperiale e del Cinquecento dando al monumento una forte funzione commemorativa eroica e trionfale.\r\nIl disegno originale del 1924 venne poi modificato dallo stesso Piacentini due anni dopo, rendendo il monumento ad arco più semplice e asciutto. Le opere per la costruzione del monumento furono eseguite dall\'azienda locale \'Impresa Garbarino e Sciaccaluga, dirette personalmente dall\'architetto Piacentini.\r\n            ', 'Genova', 'Piazza della Vittoria', '8.944978513772323 ', '44.403077306694875'),
(2, 'Ponte monumentale', '  \r\n                Il Ponte Monumentale è un\'imponente costruzione in marmo, edificata nel 1895 dove prima sorgeva la Porta d\'Arco delle Mura Nuove; il progetto fu presentato nel 1890 dall\'ingegnere Cesare Gamba e dagli architetti Ronco e Haupt.\r\n                Il Ponte attraversa in senso longitudinale via XX Settembre ed è alto 21 metri, la struttura portante è costituita da un grande arco di mattoni, le arcate sottostanti sono sorrette da colonne in marmo sulle quali è posta una decorazione scultorea in pietra.\r\n            ', 'Genova', 'Corso Andrea Podesta\'', '8.939335738048305', '44.40591531858697'),
(3, 'Fontana de Ferrari', '\r\n                La piazza, intitolata al politico e banchiere genovese Luigi Raffaele De Ferrari, prese forma nei primi decenni del XX secolo in seguito alla realizzazione di via XX Settembre e Via Dante e allo sbancamento del colle di Sant\'Andrea.\r\n                Fin dai primi anni sorse il problema di come arredare il centro della piazza per permettere la realizzazione di una rotatoria intorno alla quale incanalare i veicoli provenienti dalle varie direzioni. Venne inizialmente realizzata una grande aiuola con palmizi, ma la soluzione non risultò convincente e agli inizi degli anni trenta l\'architetto Giuseppe Crosa di Vergagni fu incaricato di ideare una nuova sistemazione.\r\n                Il progetto di Crosa di Vergagni prevedeva una grande fontana costituita da una vasca centrale in bronzo posizionata al centro di una serie di vasche concentriche rivestite in travertino. Il bacile in bronzo fu donato alla citta dall\'ingegnere Carlo Piaggio per esaudire il desiderio testamentario del padre - il banchiere e armatore Erasmo Piaggio - di lasciare qualcosa di duraturo in dono alla citta. La vasca venne fusa negli stabilimenti Tirreno di Genova-Le Grazie e trasportata in Piazza De Ferrari il 23 aprile 1936. Il trasporto del manufatto si rivelò particolarmente impegnativo perché la vasca, composta da un unico elemento di 11 metri di diametro e 36 tonnellate di peso, non poteva passare tra i vicoli del centro storico genovese. Il bacile fu quindi caricato su un pontone e trainato fino alla zona della Foce, da dove un trattore lo trasportò lungo il futuro Viale Brigate Partigiane e Via XX Settembre fino alla sua destinazione finale.\r\n            ', 'Genova', 'Piazza Raffaele de Ferrari', '8.934016640162541', '44.40712785099835'),
(4, 'Cattedrale di San Lorenzo', '\r\n                È stata consacrata al santo il 10 ottobre del 1118 da papa Gelasio II quando ne esistevano solo l\'altare e una zona circostante, riservata alla preghiera, ma nessuna struttura in elevato. Nel corso del XII secolo fu costruita, ma ancora nel terzo quarto del secolo restava incompiuta e priva di una facciata vera e propria.\r\n                Una prima basilica vi sorse intorno al VI-VII secolo[3] Una leggenda vuole che in citta si siano fermati San Lorenzo e papa Sisto II, diretti in Spagna, venendo ospitati in una casa sita nella zona dell\'attuale cattedrale, dove, dopo la loro uccisione, sarebbero sorte una cappella e poi una chiesa dedicate al santo.\r\n            ', 'Genova', 'Piazza San Lorenzo', '8.931458789833469', '44.40763134514167'),
(5, 'Ombre Rosse', 'Ottimo ristorante con piatti tipici genovesi', 'Genova', 'Vico degli Indoratori', '8.931197246472893 ', '44.4086854746386'),
(6, 'Acquario di Genova', '\r\n                L\'Acquario di Genova è un acquario situato a Ponte Spinola, nel cinquecentesco porto antico di Genova. Al momento dell\'inaugurazione era il più grande d\'Europa e il secondo nel mondo.\r\n                Il percorso di 2 ore e 30 minuti comprende 39 vasche cui si aggiungono le 4 a cielo aperto del Padiglione Cetacei inaugurato nell\'estate del 2013. La superficie totale della struttura è di 27 000 metri quadrati. Le vasche ospitano circa 15 000 animali di 400 specie diverse tra pesci, mammiferi marini, uccelli, rettili, anfibi, invertebrati in ambienti che riproducono quelli originari delle singole specie con evidenti finalità didattiche.\r\n            ', 'Genova', 'Porto Antico, Molo Ponte Calvi', '8.92666193224689', '44.41020428824749'),
(7, 'Palazzo Doria Tursi', '\r\n                Il palazzo Doria-Tursi, o palazzo Niccolò Grimaldi, è un edificio sito in via Garibaldi al civico 9 nel centro storico di Genova, inserito il 13 luglio del 2006 nella lista tra i 42 palazzi iscritti ai Rolli di Genova, divenuti in tale data Patrimonio dell\'umanità dell\'UNESCO. L\'edificio è sede del Comune di Genova e fa parte del polo museale della citta.\r\n                Il palazzo, il maggiore per estensione in Strada Nuova, come era detta all\'epoca via Giuseppe Garibaldi, fu eretto a partire dal 1565 dai fratelli Domenico e Giovanni Ponzello, architetti manieristi discepoli di Galeazzo Alessi, per Niccolò Grimaldi, appellato \'il Monarca\' per il novero di titoli nobiliari di cui poteva vantarsi, e ai quali sommava gli innumerevoli crediti che aveva nei confronti di Filippo II, di cui era il principale banchiere.\r\n                È l\'edificio più maestoso della via, unico edificato su ben tre lotti di terreno, con due ampi giardini a incorniciare il corpo centrale. Le ampie logge affacciate sulla strada vennero aggiunte nel 1597, quando il palazzo divenne proprietà di Giovanni Andrea Doria che lo acquisì per il figlio cadetto Carlo, duca di Tursi, al quale si deve l\'attuale denominazione.\r\n                A seguito dell\'annessione della Repubblica di Genova nel Regno di Sardegna, fu acquistato da Vittorio Emanuele I di Savoia nel 1820, ed in tale occasione ristrutturato dall\'architetto di corte Carlo Randoni, cui è dovuta la costruzione della torretta dell\'orologio.\r\n                Dal 1848 è sede del municipio genovese.\r\n            ', 'Genova', 'Via Garibaldi', '8.932595267635298', '44.411243317284956'),
(8, 'Pesciolino', 'Ristorante di buonissimo pesce genovese', 'Genova', 'Vico Domoculta', '8.935454975015281', '44.409211995678156'),
(9, 'Porta di Brandeburgo', 'La Porta di Brandeburgo (in tedesco Brandenburger Tor) è una porta in stile neoclassico di Berlino. Si trova sul lato occidentale del Pariser Platz, nel quartiere di Mitte al confine con il quartiere del Tiergarten. È il monumento più famoso di Berlino ed è conosciuto in tutto il mondo come simbolo della città stessa e dell’intera Germania.', 'Berlin', 'Pariser Platz', '13.377436', '52.516262'),
(10, 'Palazzo del Reichstag', 'Il palazzo del Reichstag di Berlino fu costruito come sede per le riunioni del Reichstag, il parlamento del Reich tedesco. Fu inaugurato nel 1894 e tornò ad essere la sede del parlamento tedesco nel 1999.\r\n\r\nL\'attuale parlamento tedesco si chiama Bundestag. Il Reichstag inteso come parlamento risale al Sacro Romano Impero e cessò di esistere negli anni della Germania nazista (1933-1945). Nell\'uso odierno, il termine tedesco Reichstag si riferisce quindi principalmente all\'edificio.\r\n\r\nRimasto fortemente danneggiato dopo l\'incendio del 1933, il palazzo non fu più utilizzato durante il Terzo Reich ma venne ritenuto un simbolo della Germania; fu quindi attaccato dai soldati sovietici dell\'Armata Rossa durante la fase decisiva della battaglia di Berlino del 1945, che lo conquistarono dopo un violento combattimento contro la guarnigione tedesca asserragliata all\'interno e nei sotterranei, e vi issarono la bandiera della Vittoria.\r\n\r\nEsso è uno dei parlamenti più visitati al mondo. Ogni anno circa 3 milioni di persone provenienti da tutti i paesi del mondo visitano il palazzo del reichstag e gli altri edifici ( Jacob-Kaiser-Haus, Marie-Elisabeth-Lüders-Haus, Paul-Löbe-Haus) del quartiere parlamentare di Berlino.', 'Berlin', 'Platz der Republik ', '13.375222 ', '52.518692'),
(11, 'Torre della televisione', 'La torre della televisione di Berlino (in tedesco Berliner Fernsehturm) è una torre per le antenne trasmittenti radiotelevisive nel centro di Berlino in Germania. Fa parte della World Federation of Great Towers. È un conosciuto punto di riferimento della città, presso Alexanderplatz.\r\n\r\nCon i suoi 368 m è la costruzione più alta di tutta la Germania e la quarta costruzione più alta d\'Europa.\r\n\r\nLa torre della televisione è stata eretta tra il 1965 e il 1969 dalle Poste tedesche della DDR nel centro storico di Berlino (parte del distretto Mitte). Il 3 ottobre 1969 vi fu l\'inaugurazione. La costruzione è di oltre 220 metri più alta rispetto alla torre della radio risalente agli anni \'20 e locata nella parte ovest della città. Simbolo e punto di riferimento ben visibile anche da lontano, la torre della televisione fa parte dello skyline cittadino.\r\n\r\nLa costruzione, chiamata internamente anche \"Torre radioemittente 32\" svolge, oltre che il suo compito principale di emittente per molteplici stazioni radiofoniche e televisive, anche la funzione di torre panoramica con un bar e ristorante girevole a 203 metri di altezza. La torre, già simbolo di Berlino Est e della Repubblica Democratica Tedesca, è diventata dopo il 1989 uno dei simboli della Berlino riunificata.\r\n\r\nIn considerazione della sua importanza storica e tecnica, la torre è posta sotto tutela monumentale.', 'Berlin', 'Panoramastraße 1A', '13.409595', '52.520517'),
(12, 'Isola dei musei', 'L\'Isola dei musei (in tedesco Museumsinsel) è la parte settentrionale dell\'isola della Sprea, al centro di Berlino (quartiere Mitte).\r\n\r\nIl nome \"Isola dei musei\" è dovuto al gran numero di musei di importanza internazionale che si trovano nell\'area. I musei sono parte del gruppo dei Musei statali di Berlino, appartenenti alla Fondazione del patrimonio culturale prussiano (Stiftung Preußischer Kulturbesitz). Per l\'immensa importanza culturale ed artistica, l\'Isola dei musei è stata dichiarata dall\'UNESCO patrimonio dell\'umanità, nel 1999.', 'Berlin', 'Isola dei musei', '13.402527', '52.516831'),
(13, 'Zoologischer Garten', 'Il Zoologischer Garten Berlin (giardino zoologico di Berlino) è insieme al Tierpark Berlin uno dei due giardini zoologici di Berlino. È uno dei più grandi zoo della Germania e anche dei più forniti, in termini di specie animali, del mondo.\r\nSi trova al limite occidentale del quartiere Tiergarten, nelle vicinanze del Kurfürstendamm e della stazione ferroviaria Zoologischer Garten.\r\n\r\nAdiacente allo zoo vi è il grande parco del Tiergarten. Anche all\'interno dello zoo ci sono molti giardini e piccoli laghetti. Nel dicembre 2006, nel parco è nato l\'orso polare Knut, rapidamente diventato una delle maggiori attrazioni dello zoo berlinese.\r\n\r\nLe vicende del libro (e del film) Noi, i ragazzi dello zoo di Berlino (Wir Kinder vom Bahnhof Zoo) sono invece ambientate nei dintorni della stazione ferroviaria Zoologischer Garten, adiacente al giardino zoologico.', 'Berlin', 'Hardenbergpl 8', '13.336639', '52.507867'),
(14, 'Schloss Charlottenburg', 'Il celebre salottino di porcellana e la stanza del tè Belvedere sono i momenti principali di una visita che si snoda attraverso magnifiche sale barocche e rococò. La ricca collezione di argenteria e porcellane cinesi e giapponesi offre un piccolo spaccato del lusso della vita quotidiana della famiglia reale. Nell’ex teatro, danneggiato durante la Seconda guerra mondiale e poi ricostruito, ha vita un Museo della preistoria e dell’antichità che conserva i tesori troiani portati in Germania da Heinrich Schliemann. I due ingressi, allo Schloss e al Museo della preistoria, richiedono due biglietti distinti. Accanto al palazzo si trova la Kleine Orangerie, con un bar molto suggestivo che - tempo permettendo - è il luogo ideale per una pausa.', 'Berlin', 'Spandauer Damm 10-22', '13.295714', '52.520262'),
(15, 'Checkpoint Charlie', 'É luogo di diversi thriller e romanzi di spionaggio, da \"Octopussy\" di James Bond a \"La spia che venne dal freddo\" di John le Carré; il Checkpoint Charlie. All\'attraversamento del confine tedesco-tedesco, a partire dal 22 settembre 1961, le postazioni degli alleati controllavano gli appartenenti alle forze armate americane, britanniche e francesi prima del loro viaggio verso Berlino Est. I turisti stranieri possono informarsi lì riguardo alla permanenza. In qualità di passaggio per gli appartenenti alle forze armate alleate, il punto di controllo alla frontiera di Friedrichstraße fu nell\'ottobre del 1961 teatro della cosiddetta \"Panzerkonfrontation\" (scontro di panzer). Oggi è un\'opera dell\'artista Frank Thiel e un grande cartello che presenta una grande foto a ricordare l\'ex-punto di passaggio. Nelle immediate vicinanze si trova anche il \"Museo del Muro - Museo Casa al Checkpoint Charlie\", che sulla mezzeria della via Friedrichstraße presenta l\'esposizione di una ricostruzione del primo posto di guardia.', 'Berlin', 'Friedrichstraße 43', '13.390338', '52.507466'),
(16, 'Cattedrale di Santa Maria del Fiore', 'La Cattedrale di Santa Maria del Fiore è una imponente Chiesa in stile gotico costruita sul sito dove si ergeva l\'antica cattedrale di Firenze, la Chiesa di Santa Reparata, i cui resti sono visibili nella cripta.\r\nLa cattedrale fu iniziata alla fine del XIII secolo da Arnolfo di Cambio, mentre la bellissima cupola di Filippo Brunelleschi fu aggiunta nel XV secolo.\r\nLa chiesa fu consacratata quando la facciata era ancora da terminare (fu poi completamente rifatta nel XIX secolo). La facciata è ricoperta di marmi color rosa, bianco e verde. L\' interno della cattedrale, in contrasto, è piuttosto austero.\r\nL\'esterno è decorate con un mix di marmi rosa, bianchi e verde. L\'interno, in contrasto, è molto meno decorata, sembra quasi vuota quando appena entri ma ogni singola parte ha il suo perchè. Vedete i pavimenti in mosaico nella foto qui sopra? Sono davvero spettacolari, sembrano tappeti stesi sul pavimento.\r\nPoi se vi girate dopo essere entrati, nel dietro della facciata troverete questo orologio del 1443 di Paolo Uccello con affreschi dei quattro profeti. L\'orologio mostra le 24 ore dell\'hora italica, il modo in cui si teneva conto delle 24 ore del giorno che finivano al tramonto, usato fino agli ottocento. E\' uno dei pochi orologi al mondo di quel tempo che esiste ancora... e che funziona!\r\nAll\' interno della cupola si può vedere da vicino i bellissimi affreschi di Giorgio Vasari. Il Vasari progettò e lavorò ad uno straordinario Giudizio Universale, che, alla sua morte, fu terminato da Federico Zuccari, suo allievo, nel 1579.\r\nCi sono da notare anche 3 affreschi che si trovano sul lato sinistro della navata: Dante davanti alla città di Firenze di Domenico di Michelino (1465) che è particolarmente interessante perchè ci mostra, a parte scene della Divina Commedia, una veduta di Firenze che nel 1465 non poteva essere la Firenze del tempo di Dante.', 'Firenze', 'Piazza del Duomo', '11.255467', '43.772692'),
(18, 'Museo Nazionale del Bargello', 'Il Museo del Bargello, situato nel centro storico di Firenze, si trova nell\' imponente Palazzo del Bargello, detto anche Palazzo del Popolo. Il palazzo, la cui costruzione iniziò nel 1255, nel corso dei secoli ha ospitato il Capitano del Popolo di Firenze, il Podestà, il Consiglio di Giustizia e nel 1574 divenne la sede del \"bargello\" ovvero del Capitano di Giustizia. Per circa tre secoli il palazzo fu adibito a carcere.\r\n\r\nIl palazzo tra il XIV ed il XV secolo ha subito numerose modifiche ed ampliamenti che hanno alterato la sua struttura originale, ma non hanno tuttavia modificato il suo aspetto imponente e severo, ancora oggi ben evidente nel bel cortile, nel balcone e nel grande salone al primo piano. Una scala coperta, costruita nel XIV secolo, porta alla loggia superiore. I muri del cortile sono coperti con dozzine di scudi dei vari Podestà e Giudici di Ruota.\r\nDal 1859 il palazzo ospita il Museo Nazionale (il primo museo nazionale nell\'Italia unita) che riunisce molte importanti sculture del Rinascimento ed alcune opere di artisti minori di vari periodi, incluso capolavori di Donatello, Luca della Robbia, Verrocchio, Michelangelo e Cellini. Il museo fu successivamente arricchito con splendide collezioni di bronzi, maioliche, cere, smalti, medaglie, sigilli, avori, arazzi, mobili e tessuti provenienti dalle collezioni del Medici ed alcuni oggetti di collezioni private. Per gli amanti del Rinascimento, il Bargello sta alla scultura come gli Uffizi alla pittura.', 'Firenze', 'Via del Proconsolo 4', '11.2524717', '43.770615'),
(19, 'Piazza della Signoria', 'Piazza della Signoria è stata al centro della vita politica di Firenze fin dal XIV secolo. La Piazza ha visto realizzarsi importanti eventi storici e grandi trionfi, come il ritorno dei Medici nel 1530. Nel 1497 fu qui organizzato il Falò delle Vanità promosso dal frate domenicano Girolamo Savonarola, che fece bruciare nella piazza migliaia di oggetti da lui ritenuti \"peccaminosi\", tra cui libri e dipinti. Solo un anno più tardi il Savonarola fu accusato di eresia e fu bruciato sul rogo nella stessa Piazza della Signoria, come ci ricorda una targa in marmo posizionata di fronte alla fontana del Nettuno.\r\nLe famose sculture collocate in Piazza della Signoria hanno riferimenti alle vicende politiche di Firenze, con qualche contrasto. Il David (l\'originale si trova alla Galleria dell\' Accademia) fu realizzato da Michelangelo e posizionato di fronte a Palazzo Vecchio a simboleggiare il potere della Repubblica fiorentina in contrasto con la tirannia dei Medici. Ercole e Caco (1534) di Bandinelli simboleggia invece il potere fisico della famiglia.\r\n\r\nIl Nettuno (1575) di Ammannati ricorda le ambizioni marittime dei Medici, mentre la statua equestre del Duca Cosimo I (1595) del Giambologna è un elegante ritratto di un grande uomo, che riuscì a portare tutta la Toscana sotto il potere militare dei Medici. Finalmente, dopo due anni di restauro, la fontana del Nettuno è tornata all\'antico splendore: sarà impossibile non soffermarsi ad ammirarla da vicino.', 'Firenze', 'Piazza della Signoria', '11.2534535', '43.7696855'),
(20, 'Palazzo Vecchio', 'E’ possibile viaggiare nel tempo? Palazzo Vecchio offre senz’altro la possibilità di ripercorrere facilmente tre periodi storici attraverso un’emozionante visita alla scoperta di rovine romane, d’una fortezza medievale e di stanze rinascimentali affrescate magistralmente. Un piccolo microcosmo dove storia ed arte sono legate indissolubilente nella struttura da secoli.\r\nPalazzo Vecchio è il simbolo politico della città di Firenze, il cui progetto originale viene attribuito ad Arnolfo di Cambio. Arnolfo disegnò una solida fortezza nel 1299 che doveva sorgere sulle rovine delle torri ghibelline degli Uberti, sconfitti per sempre dalla fazione guelfa dopo lotte intestine. L’imponente costruzione si appoggia sulle antiche rovine del teatro romano di Florentia, datato I° sec. d.C., ancora visibili lungo un circuito che si snoda nel livello sotterraneo del Palazzo.\r\nIl corpo originale di Palazzo Vecchio fu progettato per ospitare il Consiglio della Repubblica di Firenze, composto da membri nominati dalle Arti Fiorentine (Priori). L’edificio fu in seguito allargato verso via della Ninna dal Duca di Brienne, dando sempre più l’immagine austera di fortezza e aggiungendo una scala segreta che serviva per uscire indisturbato durante scorribande notturne.\r\nOggi il Museo ospita meravigliose sale e appartamenti privati frutto di trasformazioni architettoniche rinascimentali.', 'Firenze', 'Piazza della Signoria', '11.248613', '43.7735825'),
(21, 'La Galleria degli Uffizi', 'Come ogni tesoro prezioso, la Galleria degli Uffizi si lascia conquistare solo dopo alcune ardue prove: pathos all’ingresso, code e caos per rintracciare la giusta porta di accesso, 141 scale fino alla loggia del secondo piano e poi... ecco concedersi alla vista le delizie dei soffitti affrescati e un labirinto di sale dense di opere!\r\nPortate pazienza se il Museo per eccellenza vi riserverà sorprese di ogni genere. Gli Uffizi non erano stati concepiti per accogliere 10.000 visitatori al giorno ma solo per ospitare uffici, un teatro e spazi assolutamente privati e rigorosamente custoditi dai Granduchi Medicei. L’inizio della monumentale costruzione risale al 1560, per mano di Giorgio Vasari che concepì la Galleria come geniale macchina prospettica per esaltare la Torre di Palazzo Vecchio. Un insieme brulicante di spazi funzionali per le sedi delle Arti, gli Ufficiali della Grascia, gli Ufficiali dell’Onestà e le Manifatture granducali. Spazi pratici e riservati alla famiglia, al personale e pochissimi eletti ospiti dei Medici.\r\nI Medici avevano da sempre sviluppato collezioni private ma la concezione di spazio per accogliere “maraviglie d’ogni sorta” trionfa con Francesco I, che volle costruire un piccolo cuore ottagonale all’interno della Galleria che potesse accoglierle. Un piccolo scrigno, la Tribuna, inaugurata nel 1584. Sculture, camei, libri, dipinti, monete, armature, un potpurri di elementi riorganizzato solo dal 1769 con Pietro Leopoldo di Lorena. A lui si deve l’effettiva apertura al pubblico della Galleria degli Uffizi nel 1769, senza certo aspettarsi che un giorno sarebbe divenuto uno dei musei più visitati al mondo.\r\n\r\nPortate pazienza dunque se le porte di ingresso sono tre e non sempre si azzecca subito l’ingresso giusto, se le sale sono affollate o se in qualcuna mancano opere, partite per una mostra fuori Firenze. La Galleria saprà riportarvi indietro nel tempo passeggiando sotto volte affrescate, riportando l’eco dei Granduchi e dei loro servitori.', 'Firenze', 'Piazzale degli Uffizi 6', '11.2531221', '43.7677856'),
(22, 'La Chiesa di Orsanmichele', 'Orsanmichele è un nome piuttosto lungo per una chiesa, con tre parole diverse che si fondono in un unico termine. Documentato per la prima volta nel 895 come oratorio di San Michele, era circondato dall\'orto appartenente all\'omonimo monastero benedettino. \r\nSi dice che in epoca romana, nel luogo dove oggi sorge il complesso monumentale, fosse stato edificato un tempio dedicato ad Isis, la dea egizia della fertilità, venerata dai Greci e dai Romani che la ritenevano essere la Dea Suprema creatrice dell\'universo.\r\nL\'austera parte esterna della chiesa rivela che l\'edificio si sviluppa su tre piani, un pò come se fosse un palazzo di uffici, e rappresenta una fusione di semplici pareti in pietra serena, complicati archi e finestre in stile gotico, nicchie esterne che proteggono varie sculture. Nemmeno a cercarla riuscirai a trovare un\'entrata in classico stile formale e maestoso.\r\nLa struttura fu distrutta intorno al 1239 e verso il 1290 Arnolfo di Cambio fu incaricato di costruire una loggia per il mercato; quest\'ultima, fatta di legno, fu nuovamente e pesantemente danneggiata durante un incendio e costruita di nuovo nel 1336 come luogo di conservazione delle granaglie per il mercato, su commissione della Compagnia della Seta.\r\nL\'architettura della loggia era caratterizzata da ampie aperture a forma di arco per il grano del mercato, la paglia ed i cereali; il secondo piano era dedicato agli uffici, mentre il terzo ospitava uno dei magazzini di cereali della città, dove erano stivate le scorte per resistere in caso di carestia o assedio.', 'Firenze', 'Via dell\'Arte della Lana', '11.252816', '43.7706834');

-- --------------------------------------------------------

--
-- Struttura della tabella `tappa_appartiene_percorso`
--

CREATE TABLE `tappa_appartiene_percorso` (
  `id_tappa` int(11) NOT NULL,
  `id_percorso` int(11) NOT NULL,
  `ordine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tappa_appartiene_percorso`
--

INSERT INTO `tappa_appartiene_percorso` (`id_tappa`, `id_percorso`, `ordine`) VALUES
(1, 1, 0),
(2, 1, 1),
(3, 1, 2),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(7, 1, 6),
(8, 1, 7),
(9, 8, 0),
(9, 11, 0),
(10, 8, 1),
(11, 8, 2),
(12, 8, 3),
(13, 8, 4),
(14, 8, 6),
(15, 8, 5),
(16, 10, 0),
(17, 10, 0),
(18, 10, 1),
(19, 10, 2),
(20, 10, 3),
(21, 10, 4),
(22, 10, 5),
(22, 11, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `admn` int(1) NOT NULL,
  `xp` int(11) NOT NULL,
  `livello` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`email`, `username`, `nome`, `cognome`, `psw`, `admn`, `xp`, `livello`) VALUES
('a@a', 'tata🔥', 'Andrea', 'Tatti', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', 0, 200, 4),
('admin@admin', 'admin', 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 400, 4),
('canepasara@virgilio.it', 'Sassalove', 'Sara', 'Canepa', '8be874ab42250c2c69139ce38f15d60e0e605db34cd51f6f1f5f3f6ef95946eb', 0, 0, 0),
('d@d', 'jackPasto💪🏻', 'Giacomo ', 'Pastorino', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', 0, 0, 0),
('j@j', 'Rhsjbsvdjs', 'Dnbsns', 'Dhjsnss', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', 0, 200, 2),
('p@p', 'prova', 'Pro', 'Va', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', 0, 0, 1),
('t@t', 'taratata', 'rata', 'tata', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', 0, 0, 0),
('z@z', 'Dan', 'Daniele', 'Scaffai', '594e519ae499312b29433b7dd8a97ff068defcba9755b6d5d00e84c524d67b06', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente_percorre_tappa`
--

CREATE TABLE `utente_percorre_tappa` (
  `email` varchar(255) NOT NULL,
  `id_tappa` int(11) NOT NULL,
  `piace` int(11) DEFAULT NULL,
  `commento` mediumtext DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente_percorre_tappa`
--

INSERT INTO `utente_percorre_tappa` (`email`, `id_tappa`, `piace`, `commento`, `data`) VALUES
('a@a', 2, NULL, NULL, '2022-05-30 10:26:47'),
('a@a', 3, 0, NULL, '2022-05-30 10:26:06'),
('a@a', 4, NULL, NULL, '2022-05-30 10:24:56'),
('admin@admin', 1, 1, NULL, '2022-05-30 10:24:25'),
('admin@admin', 2, NULL, NULL, '2022-05-30 10:26:51'),
('admin@admin', 3, 0, NULL, '2022-05-30 10:26:06');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente_preferisce_percorso`
--

CREATE TABLE `utente_preferisce_percorso` (
  `email` varchar(255) NOT NULL,
  `id_percorso` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente_preferisce_percorso`
--

INSERT INTO `utente_preferisce_percorso` (`email`, `id_percorso`, `data`) VALUES
('a@a', 8, '2022-05-26 11:33:05'),
('admin@admin', 1, '2022-05-30 06:33:44'),
('admin@admin', 8, '2022-05-30 06:33:42'),
('admin@admin', 11, '2022-05-30 06:33:39'),
('z@z', 1, '2022-05-26 11:48:06'),
('z@z', 8, '2022-05-26 11:48:05');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `citta`
--
ALTER TABLE `citta`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `percorso`
--
ALTER TABLE `percorso`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indici per le tabelle `tappa`
--
ALTER TABLE `tappa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indici per le tabelle `tappa_appartiene_percorso`
--
ALTER TABLE `tappa_appartiene_percorso`
  ADD PRIMARY KEY (`id_tappa`,`id_percorso`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indici per le tabelle `utente_percorre_tappa`
--
ALTER TABLE `utente_percorre_tappa`
  ADD PRIMARY KEY (`email`,`id_tappa`);

--
-- Indici per le tabelle `utente_preferisce_percorso`
--
ALTER TABLE `utente_preferisce_percorso`
  ADD PRIMARY KEY (`email`,`id_percorso`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `percorso`
--
ALTER TABLE `percorso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `tappa`
--
ALTER TABLE `tappa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
