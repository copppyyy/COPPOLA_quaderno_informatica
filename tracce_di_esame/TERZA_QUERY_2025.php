<a href="Traccia_2025.php"> 
      torna indietro
    </a><br>

    <?php
// Connessione al database
$servername = "localhost";
$username = "andr"; 
$password = "srtVn120."; 
$database = "db_2025";

$conn = new mysqli($servername, $username, $password, $database);

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Query per contare il numero di corsi per ogni esercizio
$query = "SELECT 
            E.Id_esercizio,
            E.titolo,
            COUNT(C.Id_corso) AS numero_corsi
          FROM ESERCIZI E
          LEFT JOIN CORSI C ON E.Id_corso = C.Id_corso
          GROUP BY E.Id_esercizio, E.titolo
          ORDER BY numero_corsi DESC";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Numero di corsi per esercizio</title>
</head>
<body>

<h2>Numero di corsi in cui è utilizzato ciascun esercizio</h2>

<table border="1">
    <tr>
        <th>ID Esercizio</th>
        <th>Titolo</th>
        <th>Numero di corsi</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['Id_esercizio']}</td>
                    <td>{$row['titolo']}</td>
                    <td>{$row['numero_corsi']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Nessun esercizio trovato</td></tr>";
    }
    ?>
</table>

<?php
$conn->close();
?><br><br>
<p> 
SELECT <br>
    E.Id_esercizio,<br>
    E.titolo,<br>
    COUNT(C.Id_corso) AS numero_corsi<br>
FROM ESERCIZI E<br>
LEFT JOIN CORSI C ON E.Id_corso = C.Id_corso<br>
GROUP BY E.Id_esercizio, E.titolo<br>
ORDER BY numero_corsi DESC;<br>

<br><br><br>
Spiegazione <br>
Questa query serve a contare il numero di corsi in cui ogni esercizio viene utilizzato.<br>  

Per farlo, selezioniamo l'ID e il titolo di ogni esercizio dalla tabella ESERCIZI.<br>  
Poi, utilizziamo una LEFT JOIN con la tabella CORSI  per collegare ogni esercizio al suo corso.<br>  

La funzione COUNT(C.Id_corso) conta quanti corsi sono associati a ciascun esercizio.<br>  
Se un esercizio non è assegnato ad alcun corso, il conteggio restituirà `0` grazie alla LEFT JOIN.<br>  

Infine, raggruppiamo i dati per ID e titolo dell'esercizio (`GROUP BY E.Id_esercizio, E.titolo`) e ordiniamo i risultati in ordine decrescente di numero di corsi (`ORDER BY numero_corsi DESC`).<br>
</p><br><br><br>
<h2> SPIEGAZIONE DELLA QUERY </h2><br>
<br>
<p>
    prima di tutto ho fatto il collegamento con il mio DB, successivamente ho scritto la query per <br>
    controllare quanti eserciszi sono presenti per i corsi.<br>
    ho fatto un select degli attributi necessari quindi id_esercizio - e il titolo dell'esecizio per caire quale fosse quello corretto<br>
    poi ho fatto un conto dell'id corso per il numero di corsi che ci sono, <br>
    partendo da esercizi. e facendo un left join quindi prendendo i vallri di sinistra di corso da id corsi<br>
    facendo un group by e order by di id esecizio e il nuemro che si ha dei corsi.<br> 
    dopo aver fatto la query ho fatto la stampa. 
</p>

</body>
</html>
