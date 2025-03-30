<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="indice.html"> 
     &#8592; Torna alla Home
    </a>

    <H1> In questa pagina analizzeremo la traccia del 2015</H1><br>

    <h2> Analisi del testo e comprensione </h2> <br>

    <p>
    vogliamo realizzare una web communisity per condividee dati commenti per eventi dal vivo <br>
    ( concerti - teatri ecc.. ) gli eventi sono inseriti dagli utenti, <br>
    dopo essersi registrati sul sito tramite diverse generalità.<br>
    e potendo scegliere una o più categorie di eventi, tutti i membri iscirtti ricevono per posta <br>
    periodicmanete una newsletter, riportando gli eventi delle categorie che l'utente sceglie. <br>
    che si svolgeranno nella settimana seguente del proprio territorio. i memebri possono iteagire con la community<br>
    inserendo i dati di un nuovo evento, il che occorre specificare luofo e categorie, <br>
    e potendo anche scrivere un post con commento e votazione da 1 a 5. <br>
    il sito offre anche a tutti la consultazione di dati oline one . <br>
    possibilità di visualizzazzione in ordine cronologico o appliccando filtir alla scelta, <br>
    visualizzare i commnti e voti ad un evento.<br>

    </p>

<br>
<br>
<h2> Queste sono i nostri Attributi-ENTITà-RELAZIONI</h2><br>
<p> 
UTENTE = è un entità perchè è qualcosa di tangibile e quindi può agire all'interno del sito <br>
portando cambiamenti, e anche avendo molti attributi.<br>
CATEGORIA = è sempre un entità perchè al suo interno vi psosono essere diversi tipi di categorie come specificato nell'analisi <br>
del testo soprastante. <br>
EVENTO = è sempre un entità perchè prima di tutto possiede la FK di id_ categoria<br>
perchè all inetrno dell evento si deve in qualche moo specificare di quale categoria si sta par,ando e inaftti evento ottiene <br>
questa FK per controllare ciò oltre questo evento è molto importante perchè è doive tutti gli utenti <br>
inseriscono i dati rispettivamente ai concerti - tetatri - eventi che potrebbero presentarsi.<br>
INTERESSE_UTENTE = è una relazione perchè da questo serve per registare le categorie e eventi scelti degli uetenti <br>
inaftti funziona tipo da tramite ottenendo sia la FK di uetente e di categoria.<br>
COMMENTO = commento serve per comprendere l'andamento dell'evento o della categoria <br>
e può essere di diverso tipo come una votazione oppure un post, <br>
il commento possiede le FK di utente e evento perchè da li possono interagire per inserire al suo interno i commenti <br>

</p>
<br>
<br>
<h2>
    Ora scriverò le relazioni fra loro
</h2><br>
<br>
<p> 
-Un utente può essere interessato a più categorie (Relazione 1:N tra Utente e Interesse_Utente).<br>

-Una categoria può essere associata a più eventi (Relazione 1:N tra Categoria e Evento).<br>

-Un utente può inserire più commenti, ma ogni commento è scritto da un solo utente (Relazione 1:N tra Utente e Commento).<br>

-Un evento può avere più commenti, ma ogni commento si riferisce a un solo evento (Relazione 1:N tra Evento e Commento).<br>
</p><br><br>


<h2> Dopo aver scirtto cosa ho compreso le mie ipotesi e idee dopo aver letto la traccia specificherò gli attributi e le chiavi</h2><br>
<p>

- UTENTE (PK_Id_Utente, Nickname, Nome, Cognome, Email, Provincia, Password, Newsletter_Attiva)<br>  
- CATEGORIA (PK_Id_Categoria, Nome_Categoria)  <br>
- EVENTO (PK_Id_Evento, FK_Id_Categoria, Titolo, Luogo, Data, Provincia, Artisti_Invitati)  <br>
- INTERESSE_UTENTE (PK_Id_Interesse, FK_Id_Utente, FK_Id_Categoria)  <br>
- COMMENTO (PK_Id_Commento, FK_Id_Utente, FK_Id_Evento, Testo_Commento, Voto, Data_Commento)  <br>
 </p>
 <p> 
</p>
<h2> Qua troverai in allegato URL per visuallizzare il mio schema E-R <br>
</h2>
<br>
<a href="https://drive.google.com/file/d/1QjBbjVTy_ZdKU-Ft-jWqEKTkK1WNbarZ/view?usp=sharing">Vai alla foto </a>
<br>
<br>
<h2> Qua invece potrai visualizzare il modello sql - php </h2>
<br><br>
<a href="PRIMA_QUERY_2015.php"> Prima Query </a>

<br><br>
<a href="SECONDA_QUERY_2015.php"> Secona Query </a>

<br><br>
<a href="TERZA_QUERY_2015.php"> Terza Query </a>
<br><br>
<a href="QUARTA_QUERY_2015.php"> Quarta Query </a>
<br>
<br>
<a href="DB_2015.SQL"> Visualizza il mio db </a>
<br>
<br>
<br><h2> Ora ti allegherò una struttura della mia applicazione web del mio progetto </h2><br>
<a href="https://drive.google.com/file/d/16QFp9ar6UujiIgfjQHJDw8SlEsWwgcO4/view?usp=sharing"> visualizza la struttura </a>
<br>
<br> <h2> ORA qua sottostante iserirò i 2 esecizi dei 4 della seocnda parte </h2><br>
<br>
<p> 
<h3>Nella formalizzazione di uno schema concettuale, le associazioni tra entità sono caratterizzate
da una cardinalità: esponga il significato e la casistica che si può presentare.</h3><br><br>

Nella formalizzazione di uno schema, la cardinalità di una relazione è fondamentale descrive anche le istanze con le entità<br>
le cardinalità definiscono i vincoli di quantità che regolano assocciazioni.<br>
<br> 
<br>
<h3>Mi viene chiesto di verificare la normalizzazione e fare uno schema che rispetti la 3 fn.</h3> <br><br>
1. Prima Forma Normale (1NF):<br><br>
I dati sono già in 1NF poiché tutti i valori sono atomici e non ci sono colonne ripetute.<br><br>

2. Seconda Forma Normale (2NF):<br>
La tabella non è in 2NF perché ci sono dipendenze parziali:<br> <br>Livello, Tutor, e Tel-tutor dipendono solo dal Livello, non da tutta la chiave (Cognome, Nome, Telefono).<br><br>

3. Terza Forma Normale (3NF):<br><br>
La tabella non è in 3NF perché c'è una dipendenza transitiva tra Tutor, Tel-tutor e Livello.<br><br>

Schema Normalizzato in 3NF<br><br>

<a href="https://drive.google.com/file/d/1qZx7SYi6xVjTdB1dycA1C2o2_ciGszh-/view?usp=sharing"> visualizza le tabelle con le normalizzazioni</a>
<br><br>

Motivazione delle Scelte:<br><br>
Tabella "Studente": Contiene solo le informazioni relative agli studenti, eliminando ridondanze.<br><br>

Tabella "Livello": Contiene solo informazioni sui livelli e i relativi tutor.<br><br>

Tabella "Iscrizione": Collega gli studenti ai loro livelli senza ridondanza di dati.<br><br>

Conclusione:<br><br>
Lo schema in 3NF rimuove le dipendenze parziali e transitive, migliorando l'efficienza e la manutenzione dei dati.<br><br>

</p>