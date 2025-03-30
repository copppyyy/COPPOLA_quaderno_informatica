<a href="Traccia_Aeroporti.php"> 
      torna indietro
    </a><br><br>
    <?php


$host = 'localhost';
$dbname = 'aeroporti';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT A1.Nazione AS Partenza, A2.Nazione AS Arrivo FROM (AEROPORTO A1 JOIN VOLO ON A1.Città = VOLO.CittàPar) JOIN AEROPORTO A2 ON VOLO.CittàArr = A2.Città WHERE VOLO.IdVolo = 'AZ274'";
    $stmt = $pdo->query($query);
    $nazioni = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h3>Nazioni di partenza e arrivo del volo AZ274:</h3>";
    foreach ($nazioni as $nazione) {
        echo "Partenza: " . $nazione['Partenza'] . " - Arrivo: " . $nazione['Arrivo'] . "<br>";
    }

} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
}
?>
