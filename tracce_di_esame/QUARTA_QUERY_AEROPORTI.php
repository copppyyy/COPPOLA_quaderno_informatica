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
<br> <br> <br> 
<p> 
SELECT A1.Nazione AS Partenza, A2.Nazione AS Arrivo <br> 
FROM (AEROPORTO A1 JOIN VOLO ON A1.Città = VOLO.CittàPar) <br> 
JOIN AEROPORTO A2 ON VOLO.CittàArr = A2.Città <br> 
WHERE VOLO.IdVolo = 'AZ274';<br> 
<br> <br> 

Questa query serve a trovare le nazioni di partenza e di arrivo per il volo con ID 'AZ274'.<br>

Per farlo, uniamo due volte la tabella AEROPORTO (A1 e A2):<br>

La prima volta per ottenere la nazione di partenza associando la città di partenza nel volo (CittàPar) alla città degli aeroporti di partenza.<br>

La seconda volta per ottenere la nazione di arrivo associando la città di arrivo nel volo (CittàArr) alla città degli aeroporti di arrivo.<br>

La query filtra il volo con WHERE VOLO.IdVolo = 'AZ274', in modo da ottenere solo le informazioni relative a quel volo specifico.<br>

Alla fine, otteniamo le nazioni di partenza e arrivo per quel volo.


</p>