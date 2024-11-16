<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accesso </title>
</head>
<body>
<a href="esac.php"> 
     &#8592; Torna indietro 
    </a>
    <br>
    <br>
    <a href="index.html">
    &#8592; Torna alla home  
    </a>

    <h3>Controllo accesso </h3>
    <br>
    <br>

    <?php
// Verifica che il modulo sia stato inviato con il metodo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    // Controlla se i dati sono stati inviati tramite POST e verifica la presenza di tutti i campi
    if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["date"]) &&
        isset($_POST["email"]) && isset($_POST["codicefiscale"]) && 
        isset($_POST["numerotelefono"]) && isset($_POST["Via"]) && 
        isset($_POST["Città"]) && isset($_POST["stato"]) && isset($_POST["Provincia"]) &&
        isset($_POST["password"]) && isset($_POST["nickname"])) {

        // Recupera i valori dal form
        $usr = $_POST["name"];
        $pwd = $_POST["password"];
        $sur = $_POST["surname"];
        $data = $_POST["date"];
        $cpp = $_POST["codicefiscale"];
        $mail = $_POST["email"];
        $num = $_POST["numerotelefono"];
        $vi = $_POST["Via"];
        $state = $_POST["stato"];
        $prov = $_POST["Provincia"];
        $nick = $_POST["nickname"];
        $city = $_POST["Città"];

        // Visualizza i valori in una tabella HTML
        echo "<table border='1'>";
        echo "<tr><th>Nome</th><th>Password</th><th>Cognome</th><th>Data di Nascita</th><th>Codice Fiscale</th><th>Email</th><th>Numero di Telefono</th><th>Via</th><th>Stato</th><th>Provincia</th><th>Nickname</th><th>Città</th></tr>";
        echo "<tr>";
        echo "<td>$usr</td>";
        echo "<td>$pwd</td>";
        echo "<td>$sur</td>";
        echo "<td>$data</td>";
        echo "<td>$cpp</td>";
        echo "<td>$mail</td>";
        echo "<td>$num</td>";
        echo "<td>$vi</td>";
        echo "<td>$state</td>";
        echo "<td>$prov</td>";
        echo "<td>$nick</td>";
        echo "<td>$city</td>";
        echo "</tr>";
        echo "</table>";
    } else {
        echo "Alcuni campi non sono stati compilati correttamente.";
    }
}
?>

<p> ho creato un'altra pagina PHP che si collega a quella precedente ho fatto sempre una verifica con isset post per controllare se i dati inseriti fossero stati inviati<br>
di tutte le variabili inserite precedentemente quindi ho fatto il controllo su ognuna. successivamente ho preso questi valori che erano nel form<br>
e ho assegnato ad ogni valore il nome di una variabile. <br>
fatto ciò ho creato un riquadro per far visualizzare con echo tutte le nostre variabili, e ho messo come sempre due frecce in alto a sinistra per tornare all'indice oppure alla pagina precedente.



</p>

    
</body>
</html>