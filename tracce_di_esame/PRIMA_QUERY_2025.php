<a href="Traccia_2025.php"> 
      torna indietro
    </a><br>
<?php 
$servername = "localhost";
$username = "andr"; // Cambia se necessario
$password = "srtVn120."; // Cambia se necessario
$database = "db_2025";

// Connessione al database
$conn = new mysqli($servername, $username, $password, $database);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Scrivi la query SQL
$sql = "SELECT 
            E.Id_esercizio,
            E.titolo,
            E.tipo_di_esercizio,
            C.livello_corso,
            I.lingua_di_riferimento
        FROM ESERCIZI E
        JOIN CORSI C ON E.Id_corso = C.Id_corso
        JOIN INSEGNANTE I ON C.Id_insegnante = I.Id_insegnante
        ORDER BY I.lingua_di_riferimento ASC, E.titolo ASC";

// Esegui la query
$result = $conn->query($sql);

// Verifica se ci sono risultati
if ($result->num_rows > 0) {
    
    echo "<h2>Elenco esercizi per tema linguistico</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID Esercizio</th>
                <th>Titolo</th>
                <th>Tipo di esercizio</th>
                <th>Livello Corso</th>
                <th>Tema Linguistico</th>
            </tr>";

    // Stampa ogni riga dei risultati
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['Id_esercizio']}</td>
                <td>{$row['titolo']}</td>
                <td>{$row['tipo_di_esercizio']}</td>
                <td>{$row['livello_corso']}</td>
                <td>{$row['lingua_di_riferimento']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Nessun esercizio trovato.";
}

// Chiudi la connessione
$conn->close();
?>
<h2> spiegazione della QUERY </h2><br>
<br>
<p> SELECT <br>
    E.Id_esercizio,<br>
    E.titolo,<br>
    E.tipo_di_esercizio,<br>
    C.livello_corso,<br>
    I.lingua_di_riferimento<br>
FROM ESERCIZI E<br>
JOIN CORSI C ON E.Id_corso = C.Id_corso<br>
JOIN INSEGNANTE I ON C.Id_insegnante = I.Id_insegnante<br>
ORDER BY I.lingua_di_riferimento ASC, E.titolo ASC;<br><br> <br>
Questa query serve a ottenere l'elenco degli esercizi disponibili, mostrando il loro ID, titolo, tipo, livello del corso e lingua di riferimento.<br>  

Per farlo, uniamo tre tabelle:<br>  
- ESERCIZI, che contiene gli esercizi.<br>  
- CORSI, che collega ogni esercizio al suo corso.<br>  
- iNSEGNANTE , che indica la lingua del corso.<br>  

L'unione avviene collegando gli esercizi ai corsi e i corsi agli insegnanti.<br>  

Infine, ordiniamo tutto prima per lingua di riferimento e poi per titolo, così gli esercizi risultano organizzati meglio.<br>
</p><br><br>
<p> 
    prima di tutto ho fatto il collegamnto al mio DB. <br>
    fatto ciò ho scritto la query ho fatto un select degli attributi che mi servivano<br>
    successivamente ho fatto partire la query dall'entità STUDENTE vsito che aveva un collegamento con CORSI <br>
    che collega sia studente che insegnante, successiavemnte ho fatto un altro join <br>
    da corsi ad insegnate. Dopo aver fatto questo collegamnto con i join <br>
    dovevo trovare un modo per fare l'elenco in ordine alfabetico degli es' classificati per tema linguistico.<br>
    ho fatto un ORDER BY inserendo l atribut lingua di riferimento ASCENDENTE e titolo ASCENDENTE in modo tale <br>
    da far comprendere quale fosse l'esecrizio che stiamo parladno. 
    <br>
    ho fatto partire la query e ho fatto un controllo per verificare se ci fossero i risultati <br>
    dopo ho fatto in una tabella la stampa dei dati che mi servono da far visualizzare all'utente.
</p>