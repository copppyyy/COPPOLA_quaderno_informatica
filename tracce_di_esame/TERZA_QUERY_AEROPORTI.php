<a href="Traccia_Aeroporti.php"> 
      torna indietro
    </a><br><BR>
    <?php

$host = 'localhost';
$dbname = 'aeroporti';
$username = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT IdVolo, NumPasseggeri, QtaMerci FROM VOLO V JOIN AEREO A ON V.TipoAereo = A.TipoAereo WHERE NumPasseggeri > 0 AND QtaMerci > 0";
    $stmt = $pdo->query($query);
    $voli = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h3>Voli misti (merci e passeggeri):</h3>";
    echo "<table border='1'><tr><th>IdVolo</th><th>NumPasseggeri</th><th>QtaMerci</th></tr>";
    foreach ($voli as $volo) {
        echo "<tr><td>" . $volo['IdVolo'] . "</td><td>" . $volo['NumPasseggeri'] . "</td><td>" . $volo['QtaMerci'] . "</td></tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
}
?>
