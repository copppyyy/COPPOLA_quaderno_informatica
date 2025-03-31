<a href="Traccia_2025.php"> 
      torna indietro
    </a><br>

<?php
$servername = "localhost";
$username = "andr"; 
$password = "srtVn120."; 
$database = "db_2025";

$conn = new mysqli($servername, $username, $password, $database);

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Recupera l'elenco dei corsi disponibili
$corsi_query = "SELECT Id_corso, livello_corso FROM CORSI";
$corsi_result = $conn->query($corsi_query);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Classifica Studenti</title>
</head>
<body>

<h2>Seleziona un corso per vedere la classifica</h2>
<form method="POST" action="">
    <label for="corso">Scegli un corso:</label>
    <select name="corso" required>
        <?php
        if ($corsi_result->num_rows > 0) {
            while ($row = $corsi_result->fetch_assoc()) {
                echo "<option value='{$row['Id_corso']}'>{$row['livello_corso']}</option>";
            }
        } else {
            echo "<option value=''>Nessun corso disponibile</option>";
        }
        ?>
    </select>
    <button type="submit">Mostra classifica</button>
</form>

<?php
// Se un corso è stato selezionato
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['corso'])) {
    $id_corso = $_POST['corso'];

    // Query per ottenere la classifica degli studenti in base ai punti
    $query = "SELECT 
                S.Id_studente,
                S.registrazione,
                SUM(EG.Punti_ottenuti_dallo_studente) AS totale_punti
            FROM ESEGUE EG
            JOIN STUDENTE S ON EG.Id_studente = S.Id_studente
            JOIN ESERCIZI E ON EG.Id_esercizio = E.Id_esercizio
            WHERE E.Id_corso = ?
            GROUP BY S.Id_studente
            ORDER BY totale_punti DESC";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_corso);
    $stmt->execute();
    $result = $stmt->get_result();

    // Mostra i risultati
    if ($result->num_rows > 0) {
        echo "<h2>Classifica Studenti</h2>";
        echo "<table border='1'>
                <tr>
                    <th>ID Studente</th>
                    <th>Data Registrazione</th>
                    <th>Punti Totali</th>
                </tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['Id_studente']}</td>
                    <td>{$row['registrazione']}</td>
                    <td>{$row['totale_punti']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nessuno studente ha completato esercizi in questo corso.</p>";
    }
}
$conn->close();
?>
<h2> SPIEGAZIONE DELLA QUERY </h2><br>
<br>
<p> SELECT <br>
    S.Id_studente,<br>
    S.registrazione,<br>
    SUM(EG.Punti_ottenuti_dallo_studente) AS totale_punti<br>
FROM ESEGUE EG<br>
JOIN STUDENTE S ON EG.Id_studente = S.Id_studente<br>
JOIN ESERCIZI E ON EG.Id_esercizio = E.Id_esercizio<br>
WHERE E.Id_corso = ?<br>
GROUP BY S.Id_studente<br>
ORDER BY totale_punti DESC;<br><br> <br>

Questa query serve a creare una classifica degli studenti in base ai punti ottenuti nei vari esercizi di un determinato corso.<br>  

Per farlo, iniziamo selezionando l'ID dello studente e la sua data di registrazione.<br> Poi, sommiamo tutti i punti che ha ottenuto negli esercizi che ha svolto.<br> Per ottenere questi dati, colleghiamo tre tabelle:<br>  

- ESEGUE , che tiene traccia degli esercizi svolti dagli studenti e dei punti ottenuti<br>  
- STUDENTE , che contiene le informazioni sugli studenti<br>  
-ESERCIZI , che contiene gli esercizi assegnati ai corsi<br>  

Il collegamento tra queste tabelle avviene così:<br>  
- Uniamo ESEGU con STUDENTE grazie all'ID dello studente, in modo da sapere chi ha svolto gli esercizi.<br>  
- Poi, uniamo ESEGUE con ESERCIZI usando l'ID dell'esercizio, così possiamo capire a quale corso appartiene ogni esercizio.<br>  

A questo punto, filtriamo i risultati selezionando solo gli esercizi appartenenti al corso scelto dallo studente (questo avviene con `WHERE E.Id_corso = ?`).<br>  

Ora che abbiamo isolato i dati che ci servono, raggruppiamo i risultati per studente (`GROUP BY S.Id_studente`) e sommiamo i punti che ogni studente ha accumulato.<br> Infine, ordiniamo tutto in ordine decrescente di punteggio (`ORDER BY totale_punti DESC`), così lo studente con più punti apparirà in cima alla classifica.<br>  

Se nessuno studente ha svolto esercizi in quel corso, il programma mostra un messaggio che lo comunica.<br>
</p><br> <br><br>
<p> 
    prima di tutto ho fatto il collegamento con il DB, successivamente ho iniziato a scrivere la query.<br>
    ricordiamo che la query in questione era di trovare la classifica delgi studenti che partecipano ai corsi<br>
    ho cercato primadi trovare i corsi dionbili quiendi quelli che sono abitati<br>
    fatto ciò ho fatto un form con una casella che permette di far vedere il croso desideratao da parte dell'utente.<br>
    per la query ho sicritto grazie al metodo post quindi per controllare se fossero stati paati i valori e se<br>
    la qury fosse popolata, ho fatto un controllo della mia entità corsi.<br>
    la query ho fattoun SELECT degli attributi che mi servivano quindi id_studente - id_ registazrione e la somma dei punti per lo tsudente.<br>
    FROM esegue che è un relazione perchè farla partire da esegue perchè esegue al suo interno ha come attributo i dati degli studenti quando <br>
    eseguono gli esercizi, ho fatto un join passando per studneit e poi succesivamente ad esercizi usando le PK .<br>
    ma per esegue erano le FK quindi era molto comoda la connessione, facendo un GROPU BY E ORDER BY FRA id_ dello studente quindi ep identificare quale fosse lo studnete <br>
    e totale dei punti dello studente che ha acqusito.<br>
    fatto ciò ho fatto la stampa dei miei risultati. 

</p>
</body>
</html>