<?php
session_start(); // Inizia la sessione

// Verifica che l'utente abbia inviato il modulo di login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"]; // Ottieni l'email dall'input dell'utente
    $password = $_POST["password"]; // Ottieni la password

    // Verifica se l'utente esiste e se la password è corretta
    foreach ($_SESSION["users"] as $user) {
        if ($user["email"] === $email && password_verify($password, $user["password"])) {
            // Se le credenziali sono corrette, memorizza i dati nella sessione
            $_SESSION["name"] = $user["name"];
            $_SESSION["email"] = $email;

            // Registra l'accesso dell'utente nella cronologia
            $_SESSION["history"][] = ["name" => $user["name"], "email" => $email, "time" => date("Y-m-d H:i:s")];

            header("Location: accesso(c).php"); // Reindirizza alla pagina iniziale
            exit(); // Termina il flusso di script
        }
    }

    // Se le credenziali sono errate, mostra un errore
    $error = "Email o password errati!";
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
    <!-- Mostra l'errore se le credenziali non sono corrette -->
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

    <p>
il codice inizia con la creazione di una sessione in modo tale da poter <br> 
salvare i dati dell'utente all'interno del sito<br>
successivamente fa un if per verificare se l'utente <br> 
ha inviato correttamente i dati nel modulo di login fatto precedentemente <br>
chiedere al server con il metodo post e ottiene utente e passowrd dell'utente <br>
che sono quelle che ci servono per eseguire l'accesso.<br>
assegna alle variabili password e email tramite il metodo post i valori <br>
che sono stati presi nella pagina di login. <br>
si esegue successivamente con un foreach, un controllo per verificare se l'utente e la password<br>
siano corrette quindi esegue che per ogni user all'interno della sessione che ci troviamo sarà uguale a nome, <br>
mentre in un if interno al foreach si fa un controllo per email e email <br>
con la coincidenza perfetta === e così anche la password con ( password_verify ) <br>
che controlla se la stringa password corrisponde .<br>
se le credenziali inserite sono corrette vengono memorizzati all'interno della nostra sessione <br>
quindi <br>
-email<br>
-password<br>
dopo aver salvato queste credenziali viene registrato l'acceso nella cronologia <br>
in modo tale da poter visualizzare in una tabella tutti i nomi,password,email che hanno <br>
eseguito l'accesso nel sito.<br>
questo controllo viene esguito all'interno della sessione scrivendo [history] <br>
che salva name = user, email = email, e anche il tempo con la data per visualizzare<br>
quando è stato eseguito l'accesso all'utente. 
<br> poi si esegue un reindirizzamento nella pagina iniziale di accesso<br>
e poi viene terminato lo script<br>.
per finire se le credenziali inserite sono diverse da quelle salvate in memoria <br>
compare un messaggio di errore.

<br>
finita questa parte di logica si passa a quella di visualizzazione del sito. <br>
viene sempre impostato in alto a sinistra la freccia per tornare indietro.<br>
poi viene fatto un ultimo controllo sempre in php <br> 
che se le credenziali inserite sono errate allore viene stampato un messaggio di errore <br>
dopo in un form inseriamo i campi che ci servono quindi <br>
-email<br>
-password<br>
e per ultimo un bottone di invio.<br>

</p>

</body>
</html>
