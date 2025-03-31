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

    $query = "SELECT DISTINCT CittàPar FROM VOLO WHERE CittàArr = 'Roma' ORDER BY CittàPar";
    $stmt = $pdo->query($query);
    $citta = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h3>Città con voli diretti a Roma:</h3><ul>";
    foreach ($citta as $city) {
        echo "<li>" . $city['CittàPar'] . "</li>";
    }
    echo "</ul>";

} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
}
?>
<br><BR>
<p> 
SELECT DISTINCT CittàPar <br>
FROM VOLO <br>
WHERE CittàArr = 'Roma' <br>
ORDER BY CittàPar;<br><br><br>

Questa query serve a trovare tutte le città di partenza che hanno voli diretti per Roma.<br>

Selezioniamo la colonna CittàPar dalla tabella VOLO, che rappresenta la città da cui parte il volo.<br>
Usiamo WHERE CittàArr = 'Roma' per filtrare solo i voli che arrivano a Roma.<br>
Mettiamo DISTINCT per evitare città duplicate, così ogni città appare una sola volta.<br>
Infine, ordiniamo le città in ordine alfabetico con ORDER BY CittàPar, rendendo l'elenco più leggibile.<br>
</p>