<a href="Traccia_2025.php"> 
      torna indietro
    </a><br>
    <?php
// Connessione al database
$servername = "localhost";
$username = "andr"; // Cambia se necessario
$password = "srtVn120."; // Cambia se necessario
$database = "db_2025";

$conn = new mysqli($servername, $username, $password, $database);

// Controllo connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Classe virtuale selezionata (modificabile)
$classe_selezionata = "Intermedio";  // Può essere "Base", "Avanzato", ecc.

$query = "SELECT 
            S.Id_studente,
            SUM(E.Punti_ottenuti_dallo_studente) AS totale_punti
          FROM STUDENTE S
          JOIN PARTECIPANO P ON S.Id_studente = P.Id_studente
          JOIN ESEGUE E ON S.Id_studente = E.Id_studente
          JOIN ESERCIZI EX ON E.Id_esercizio = EX.Id_esercizio
          JOIN CORSI C ON EX.Id_corso = C.Id_corso
          WHERE C.livello_corso = ?
          GROUP BY S.Id_studente
          ORDER BY totale_punti DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $classe_selezionata);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Classifica Studenti</title>
</head>
<body>

<h2>Classifica generale degli studenti - Classe: <?php echo $classe_selezionata; ?></h2>

<table border="1">
    <tr>
        <th>Posizione</th>
        <th>ID Studente</th>
        <th>Punti Totali</th>
    </tr>
    <?php
    $posizione = 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$posizione}</td>
                    <td>{$row['Id_studente']}</td>
                    <td>{$row['totale_punti']}</td>
                  </tr>";
            $posizione++;
        }
    } else {
        echo "<tr><td colspan='3'>Nessuno studente ha ancora guadagnato punti.</td></tr>";
    }
    ?>
</table>

<?php
$conn->close();
?>
<p> <br><br><br>
SELECT <br>
    S.Id_studente,<br>
    SUM(E.Punti_ottenuti_dallo_studente) AS totale_punti<br>
FROM STUDENTE S<br>
JOIN PARTECIPANO P ON S.Id_studente = P.Id_studente<br>
JOIN ESEGUE E ON S.Id_studente = E.Id_studente<br>
JOIN ESERCIZI EX ON E.Id_esercizio = EX.Id_esercizio<br>
JOIN CORSI C ON EX.Id_corso = C.Id_corso<br>
WHERE C.livello_corso = ?<br>
GROUP BY S.Id_studente<br>
ORDER BY totale_punti DESC;<br><br> <br>

Questa query serve a creare una classifica degli studenti in base ai punti ottenuti, filtrando per un livello di corso specifico.<br>

Per farlo, selezioniamo l'ID dello studente e calcoliamo la somma totale dei punti che ha ottenuto negli esercizi.<br>

Per ottenere questi dati, uniamo diverse tabelle:<br>

STUDENTE per identificare gli studenti.<br>

PARTECIPANO per sapere a quali corsi sono iscritti.<br>

ESEGUE  per ottenere i punti guadagnati dagli studenti negli esercizi.<br>

ESERCIZI  per collegare gli esercizi ai corsi.<br>

CORSI  per filtrare gli studenti in base al livello del corso scelto (WHERE C.livello_corso = ?).<br>

Infine, raggruppiamo i risultati per studente (GROUP BY S.Id_studente) e li ordiniamo in ordine decrescente di punti (ORDER BY totale_punti DESC).<br>


</p>
<br>
<h2> ORA SPIEGERò LA QUERY </h2><br>
<br>
<p> 
    per prima cosa eseguo il collegamento con il mio DB, fatto ciò mi preparo ad eseguiere la query<br>
    per trovare la classifica
generale degli studenti di una certa classe virtuale, in base al punteggio raccolto in tutti i
corsi di quella classe.<br>
ho creato una classe inserendo l attributo di un livello scelto da me in questo caso interemrndio per far visualizzare l utente di quel livello <br>
poi ho fatto un select degli attributi come id_dello studenete <br> e una somma dei punti dello studente che come avevo spiegato <br>
nelle query precedenti ci serve per fare il conteggio del punt. tot <br>
partendo da studente quindi FROM STUDENTE. e un join con la relazione partecipano quindi per collegarmi all entitaà corsi <br>
pi un altro join con esgeu che è sempre una relazione molto importnate perchè possiede come attibruti i punti deloo studente per ogni es e che compie<br>
e per finire un join  arrivando al corso quindi trovando id_ del corso <br>
facedno un group by e un order by dell id studnete e dei punti totali in valore DESC. <br>
fatta lq query ho svoto la parte di visualizzazione dell'utente stanpandoi dati a schermo.
</p>
</body>
</html>
