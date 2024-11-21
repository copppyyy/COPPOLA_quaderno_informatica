<?php
session_start(); // Avvia la sessione

// Verifica che l'utente sia loggato (se non è loggato, lo reindirizza alla pagina di accesso)
if (!isset($_SESSION["name"], $_SESSION["email"])) {
    header("Location: giaregistrato.php"); // Reindirizza alla pagina di accesso
    exit(); // Termina il flusso di script
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dati Utente</title>
</head>
<body>
    <a href="pagina_inizale_accesso.php">← Torna alla pagina iniziale</a>
    <h1>Dati Utente</h1>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($_SESSION["name"]); ?></td> <!-- Mostra il nome dell'utente -->
            <td><?php echo htmlspecialchars($_SESSION["email"]); ?></td> <!-- Mostra l'email dell'utente -->
        </tr>
    </table>

    <h2>Cronologia Accessi</h2>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Ora Accesso</th>
        </tr>
        <?php foreach ($_SESSION["history"] as $entry): ?>
        <tr>
            <td><?php echo htmlspecialchars($entry["name"]); ?></td> <!-- Mostra il nome dall'accesso -->
            <td><?php echo htmlspecialchars($entry["email"]); ?></td> <!-- Mostra l'email dall'accesso -->
            <td><?php echo htmlspecialchars($entry["time"]); ?></td> <!-- Mostra l'orario dell'accesso -->
        <?php endforeach; ?>
        </tr>
        </table>
        <p>
in questa pagina di accesso viene sempre avviata una sessione <br>
e in un if viene verificato che l'utente che sta inserendo le credenziali sia <br>
già registrato alla pagina. e poi reindirizzato alla pagina di accesso <br>
finita questa piccolissima parte di logica passiamo alla <br>
visualizzazione/ stampa quindi vengono inseriti <br>
nome e mail in una tabella poi con il php <br>
viene mostrato con echo il nome e la mail dell utente <br>
fatto ciò si passa alla cronologia degli accessi invece dove vi saranno <br>
- nome, email, ora di accesso<br>
viene stampato con il php quindi nella sessione della storia degli utnti entrati nel sito viene stampata la loro variabile.<br>
come sempre per migliorare la navigabilità ho inserito in alto a sinistra <br>
una freccia che serve per tornare alla pagina precedente<br>


</p>
</body>
</html>