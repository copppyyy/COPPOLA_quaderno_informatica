<a href="Traccia_Film.php"> 
      torna indietro
    </a><br>
<?php


$host = 'localhost';
$dbname = 'Film';
$username = 'root';
$password = ''; // Aggiungi la tua password, se necessaria

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Errore nella connessione: " . $e->getMessage();
    exit;
}


$query2 = "
    SELECT DISTINCT NomeRegista
    FROM FILM
    WHERE Anno = 1993
";

$stmt2 = $pdo->query($query2);
$registi_1993 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

echo "<h3>Registi che hanno diretto film nel 1993:</h3><ul>";
foreach ($registi_1993 as $regista) {
    echo "<li>" . $regista['NomeRegista'] . "</li>";
}
echo "</ul>";
?><br> <br> <br>

<p> 

SELECT DISTINCT NomeRegista<br>
FROM FILM<br>
WHERE Anno = 1993;<br><br><br>

Questa query seleziona i nomi dei registi che hanno diretto almeno un film nel 1993.<br>

Si utilizza la tabella FILM per recuperare tutti i registi che hanno film con l'anno uguale a 1993.<br>

DISTINCT è usato per evitare duplicati nel risultato.<br>

</p>
