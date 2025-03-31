<a href="Traccia_Aeroporti.php"> 
      torna indietro
    </a><br>

<?php

$host = 'localhost';
$dbname = 'aeroporti';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT Città FROM AEROPORTO WHERE NumPiste IS NULL";
    $stmt = $pdo->query($query);
    $citta = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h3>Città con aeroporti senza numero di piste:</h3><ul>";
    foreach ($citta as $city) {
        echo "<li>" . $city['Città'] . "</li>";
    }
    echo "</ul>";

} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
}
?><br> <br> <br> 
<p>
SELECT Città <br>
FROM AEROPORTO <br>
WHERE NumPiste IS NULL;<br><br>

Questa query serve a trovare le città che hanno aeroporti senza un numero di piste registrato.<br>

Selezioniamo la colonna Città dalla tabella AEROPORTO.<br>
Filtriamo i risultati con WHERE NumPiste IS NULL, che seleziona solo gli aeroporti dove il numero di piste non è stato specificato (cioè è NULL).<br>

In questo modo, otteniamo un elenco delle città che hanno aeroporti con informazioni incomplete riguardo al numero di piste.<br>
</p>
