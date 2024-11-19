<?php
session_start();
if (!isset($_SESSION["name"], $_SESSION["email"])) {
    header("Location: giaregistrato.php"); // Reindirizza alla pagina di accesso se non loggato
    exit();
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
            <td><?php echo htmlspecialchars($_SESSION["name"]); ?></td>
            <td><?php echo htmlspecialchars($_SESSION["email"]); ?></td>
        </tr>
    </table>
</body>
</html>
