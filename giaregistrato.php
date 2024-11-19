<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Verifica credenziali
    if (isset($_SESSION["email"], $_SESSION["password"]) &&
        $email === $_SESSION["email"] &&
        password_verify($password, $_SESSION["password"])) {
        header("Location: accesso(c).php"); // Reindirizza alla pagina dei dati
        exit();
    } else {
        $error = "Email o password errati!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accesso</title>
</head>
<body>
    <a href="pagina_inizale_accesso.php">← Torna alla pagina iniziale</a>
    <h1>Accesso</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Accedi</button>
    </form>
</body>
</html>
