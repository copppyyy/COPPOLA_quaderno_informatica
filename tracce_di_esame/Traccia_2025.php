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

    <H1> In questa pagina analizzeremo la traccia del 2025</H1><br>

    <h2> Analisi del testo e comprensione </h2> <br>

    <p>In questa Prima parte della nostra traccia ci viene espressamente detto 
<br> di dover creare una piattaforma che ci peremetta di sviluppare <br>
una piattaforma WEB per migliorare l'apprendimento di varie lingue con esercizi iterattizi<br>
e ogni INSEGNANTE può creare il corso e inserire all'interno del corso<br>
i diversi esercizi possibili, <br>
la piattaforma consente un catalogo ampio di esercizi per ogni tema limguistico ( vocab, gramm, compre) <br>
ogni es ha un titolo, e un paragrafo di descrizione,<br>
successivamente dopo l'iscrizione degli STUDENTI, potranno accedere al materiale del professore <br>
ogni studente dopo aver completato degli esercizi otterrà dei punti che andranno <br>
a raggrupparsi con il punteggio totale<br>
la piattaforma ha una classifica parziale, e generale.<br>
il docente può monitorare l'anamento dei propri studenti<br>
gli studenti possono anche confrontarsi anche con altri studenti. e possono preparasi a sfide.<br>

    </p>

<br>
<br>
<h2> Queste sono i nostri Attributi-ENTITà-RELAZIONI</h2><br>
<p> 
Insegnante = è un entità perchè è un qualcosa di tangibile visto che è un qualcosa che può svolgere diverse <br>
attività, come creare si o no il corso - aggiungere esercizi- intergire con i propri studenti<br>
-aggiungere immagini V video nel proprio corso.<br>
<br>
Corsi = è un entità perchè è un qualcosa che contiene diversi attributi, <br>
livello del corso es( c1-c2-b1)-contiene gli esercizi al suo interno-contiene il materiale didattico-<br>
contiene anche una classifica generale per ogni corso.<br>
<br>
Studenti = è un entità perchè è un qualcosa di tangibile come l'Insegnante<br>
è può commettere diverse azioni come iscriversi al corso - partecipare alle sfide settimanali- <br>
visualizzare il materiale-ottenere punti per ogni esercizio completato.<br>
<br>
Esercizio = è un entità perchè è un qualcoda che contiene diversi attributi<br>
e permette di far compiere diverse azioni come <br>
essere all interno del corso-far guadagnare punti agli studenti se completati correttamente-<br>
essere di diversi tipi e livelli.
<br>
<br>
PARTECIPANO = è una relazione fra studenti e corsi, perchè gli studenti possono partecipare,<br>
al corso e la relazione contiene diversi attrubuti come quando ciò accade.<br>
<br>
ESEGUE = è una relazione fra studenti e esercizi, perchè gli stuendit possono <br>
eseguire gli sercizi e così ottentere i punti. la relazione possiede attrubuti per tenere traccia dei punti degli studenti.<br>
<br>
</p>
<h2> Dopo aver scirtto cosa ho compreso le mie ipotesi e idee dopo aver letto la traccia specificherò gli attributi e le chiavi</h2><br>
<p>
 INSEGNANTE ( PK_Id_insegnante, registrazione, lingua_di_riferimento, Livello )<br>
 <br>
 STUDENTI ( PK_Id_studente, registrazione, punteggio,)
 <br>
 <br>
 CORSI ( PK_Id_corso, Livello_corso, materiale_didattico, classifica_del_corso, FK_Id_studente, FK_Id_insegnante )<br>
 <br>
 ESERCIZIO (PK_Id_esercizio, punti_per_es, tipo_di_esercizio, descrizione, titolo)<br>
 <br>
 PARTECIPANO (FK_Id_studente, FK_Id_corso, Data_partecipazione)<br>
 <br>
 ESEGUE (FK_Id_studente, FK_Id_esercizio, Punti_ottenuti_dallo_studente, data_esercizio)<br>
 <br>
 <br>
 <h2> Qua successivamente spiegherò le cardinalitaà e successiavemnte allegherò il mio schema </h2><br>
 <br>
 </p>
 <p> Partendo dall'inizio, <br>
 -insegnante ha una cardinalità (0;n) con corsi perchè <br>
un insegnante può o non può creare i corsi.<br>
- corsi ha sempre una cardinalità (0;n) con insegnante perchè potrebbe ssere creato o non creato.<br>
-corsi ha altre relazioni una relazione a molti a molti con studenti e questo fa si che le FK siano nella relazione.<br>
ha anche una relazione fra esercizi di (1;n) perchè 1 o più esercizi posso contenere uno o più esercizi<br>
-studente invece ha sempre una relaizone molti a molti con corsi e fa si che le FK siano sulla relazione <br>
successiavemnte ha un'altra cardinalità (n;m) con esercizi facendo si che le FK siano nella relazione.<br>
-esecrizi ha una doppia relazione, (1;n) con corsi perchè uno più escizi possono essere inseriti nei corsi.<br>
mentre ha una relaizone molti a molti ( n;m) con studente facendo si che le FK siano nella relazione.<br>
<br>
</p>
<h2> Qua troverai in allegato URL per visuallizzare il mio schema E-R <br>
</h2>
<br>
<a href="https://drive.google.com/file/d/1C3t_zX-tzUWuFbQsn3rGuxL5fE3HUka_/view?usp=sharing">Vai alla foto </a>
<br>
<br>
<h2> Qua invece potrai visualizzare il modello sql - php </h2><br>

<?php
$servername = "localhost";
$username = "andr"; // Cambia se hai un altro utente
$password = "srtVn120."; // Lascia vuoto se usi XAMPP
$database = "db_2025";

// Creazione connessione
$conn = new mysqli($servername, $username, $password, $database);

// Controllo connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>

<a href="PRIMA_QUERY_2025.php"> 
     &#8592; Prima Query.
    </a><br>
    <BR>

    <a href="SECONDA_QUERY_2025.php"> 
     &#8592; Seconda Query
    </a>
    <br>
    <br>


    <a href="TERZA_QUERY_2025.php"> 
     &#8592; Terza Query
    </a>
    <br>
    <br>

    <h2> Ora ti allegherò una struttura della mia applicazione web del mio progetto </h2><br>


    <a href="https://drive.google.com/file/d/1CqQmzWFmmIuSDP00O3ApgnTEsT2XXddO/view?usp=sharing"> INSEGNANTE
    </a><br>
<br>
     <a href="https://drive.google.com/file/d/1FvCuwqXsKtGH8PmMTd1C9GGBYyFkkaQT/view?usp=sharing"> STUDENTE
    </a><br>
    <br>
    <h2> ORA qua sottostante iserirò i 2 esecizi dei 4 della seocnda parte </h2><br>
    <br>
    
    <a href="PRIMO_ESERCIZIO_SECONDA_PARTE_2025.php"> PRIMO_ES_II
    </a><br><br>

    <a href="SECONDO_ESERCIZIO_SECONDA_PARTE_2025.php"> SECONDO_ES_II
    </a><br>
</body>
</html>