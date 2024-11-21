<?php
session_start(); // Avvia la sessione. Necessario per poter accedere a $_SESSION

// Se non esistono ancora, inizializza le variabili di sessione per memorizzare gli utenti registrati e la cronologia degli accessi
if (!isset($_SESSION["users"])) {
    $_SESSION["users"] = []; // Memorizza gli utenti registrati (come una lista)
}
if (!isset($_SESSION["history"])) {
    $_SESSION["history"] = []; // Memorizza la cronologia degli accessi (come una lista)
}

// Controlla se il modulo di registrazione è stato inviato (se è una richiesta POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prende e sanitizza i dati dell'utente per prevenire attacchi XSS
    $name = htmlspecialchars($_POST["name"]); // Sanitizza il nome
    $email = htmlspecialchars($_POST["email"]); // Sanitizza l'email
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Cifra la password per la sicurezza

    // Controlla se il nome o l'email esistono già tra gli utenti registrati
    foreach ($_SESSION["users"] as $user) {
        if ($user["name"] === $name || $user["email"] === $email) {
            // Se il nome o l'email sono già registrati, mostra un errore
            $error = "Nome o email già registrati!";
            break; // Interrompe il ciclo non appena trova una corrispondenza
        }
    }

    // Se non ci sono errori, salva l'utente nella sessione e reindirizza alla pagina iniziale
    if (!isset($error)) {
        // Aggiungi l'utente registrato alla sessione
        $_SESSION["users"][] = ["name" => $name, "email" => $email, "password" => $password];
        $_SESSION["name"] = $name; // Memorizza il nome dell'utente corrente nella sessione
        $_SESSION["email"] = $email; // Memorizza l'email dell'utente corrente nella sessione

        // Aggiungi un record alla cronologia degli accessi con il nome, email e orario
        $_SESSION["history"][] = ["name" => $name, "email" => $email, "time" => date("Y-m-d H:i:s")];

        header("Location: pagina_inizale_accesso.php"); // Reindirizza l'utente alla pagina iniziale
        exit(); // Termina il flusso di script
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <!-- Link per tornare alla pagina iniziale -->
    <a href="pagina_inizale_accesso.php">← Torna alla pagina iniziale</a>
    <h1>Login</h1>
    <!-- Mostra l'errore se il nome o l'email sono già registrati -->
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>

    <p>
in questa pagina invece avviamo sempre una sessione che serve sempre per <br>
ricordare al sito i nostri dati e chi siamo <br>
dopo in un if viene eseguito un controllo per le variabili <br>
di registrazione quindi se non esistono non inserisce nulla <br>
mentre se l 'utente inserisce qualcosa viene salvato e registrato come se fosse una lista <br>
memorizzato grazie ad History che permette di memorizzare la cronologia <br>
dopo viene fatto un controllo sul modulo di registrazione se i dati dell'utente siano stati inviati con POST<br>
fatto ciò prende i dati dell'utente e previene gli attacchi xss con htmlspecialchars<br>
e cifra anche la password per sicurezza. <br>
successivamente si esegue un controllo se mail, nome, siano già esistenti e in tal caso non vi è possibile accederci <br>
quindi esegue un foreach quindi per ogni sessione di user quindi il dato che viene salvato nel sito <br> se nome e email hanno una coincidenza perfetta <br> con una mail o password già presente nel sito <br>
compare un messaggio di errore e viene interrotto il ciclo quando ciò accade <br>
se invece in tal caso <br> non ci dovessero esserci errori viene salvato l'utente nella sessione e aggiunto alla lista della cronologia degli accessi <br>
e reindirizzati alla pagina iniziale. <br>
finita questa sezione di logica si passa alla parte di stampa e viene <br>
inserito una riga di php che serve per comunicare all'utente se email e password siano già registrati.<br>
in un form viene inserito nome email e password <br> 
e un pulsante di invio.<br>
e come sempre per agevolare la navigabilità una freccia in alto a sinistra che reindirizza l'utente alla pagina precedente. <br> 


</p>


</body>
</html>
