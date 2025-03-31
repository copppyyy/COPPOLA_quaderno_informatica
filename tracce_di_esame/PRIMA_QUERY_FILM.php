<a href="Traccia_Film.php"> 
      torna indietro
    </a><br>
<?php

$host = 'localhost';
$dbname = 'film';
$username = 'root';
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Errore nella connessione: " . $e->getMessage();
    exit;
}


$query1 = "
    SELECT DISTINCT Nazionalità
    FROM REGISTA
    WHERE Nome IN (SELECT NomeRegista FROM FILM WHERE Anno = 1992)
    AND Nome NOT IN (SELECT NomeRegista FROM FILM WHERE Anno = 1993)
";

$stmt1 = $pdo->query($query1);
$registi_nazionalita = $stmt1->fetchAll(PDO::FETCH_ASSOC);

echo "<h3>Nazionalità dei registi che hanno diretto film nel 1992 ma non nel 1993:</h3><ul>";
foreach ($registi_nazionalita as $regista) {
    echo "<li>" . $regista['Nazionalità'] . "</li>";
}
echo "</ul>";
?><br> <br> <br> 
<p> 

SELECT DISTINCT Nazionalità<br> 
FROM REGISTA<br> 
WHERE Nome IN (SELECT NomeRegista FROM FILM WHERE Anno = 1992)<br> 
AND Nome NOT IN (SELECT NomeRegista FROM FILM WHERE Anno = 1993);<br> <br> <br> 

Questa query restituisce le nazionalità dei registi che hanno diretto almeno un film nel 1992 ma nessun film nel 1993.<br>

La subquery restituisce i nomi dei registi che hanno diretto film nel 1992.<br>

La seconda subquery restituisce i registi che hanno diretto film nel 1993.<br>

L'operatore NOT IN esclude i registi che sono presenti anche nel 1993.<br>
</p>