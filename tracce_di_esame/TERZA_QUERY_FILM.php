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


$query3 = "
    SELECT Film
    FROM INTERPRETA
    GROUP BY Film
    HAVING COUNT(*) > 1
    AND COUNT(DISTINCT Attore) = 1
";

$stmt3 = $pdo->query($query3);
$film_multiple_personaggi = $stmt3->fetchAll(PDO::FETCH_ASSOC);

echo "<h3>Film con un solo attore che però interpreta più personaggi:</h3><ul>";
foreach ($film_multiple_personaggi as $film) {
    echo "<li>" . $film['Film'] . "</li>";
}
echo "</ul>";
?><br> <br> <br> 
<p>
SELECT Film<br> 
FROM INTERPRETA<br> 
GROUP BY Film<br> 
HAVING count(*) > 1<br> 
AND count(distinct Attore) = 1;<br> <br> <br> 

Questa query restituisce i titoli dei film in cui un attore ha interpretato più di un personaggio.<br>

Si raggruppa per Film e si conta quante volte lo stesso attore appare.<br>

La condizione HAVING count(*) > 1 verifica che l'attore appaia più di una volta nel film.<br>

AND count(distinct Attore) = 1 assicura che solo un attore interpreti più di un personaggio.<br>


</p>