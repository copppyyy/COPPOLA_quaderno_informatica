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
