<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>cx
<body>
<a href="esab.php"> 
     &#8592; Torna indietro 
    </a>
    <br>
    <br>
    <a href="index.html">
    &#8592; Torna alla home  
    </a>
   
    
    <h3>Controllo delle credenziali</h3>

    <?php
    // Verifica che il modulo sia stato inviato con il metodo POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {// controllo per verificare se il codice venga eseguito 
        // Controlla se i dati sono stati inviati tramite POST
        if (isset($_POST["nomeutente"]) && isset($_POST["password"])) { //isset controllo che i dati siano stati inviati 
            $usr = $_POST["nomeutente"];
            $pwd = $_POST["password"];

            // Verifica le credenziali
            if ($usr != "admin" || $pwd != "password") {
                echo "<h4>Attenzione! Nome utente o password sbagliati. <br>Accesso negato!</h4>";
            } else {
                echo "<h4>Benvenuto $usr! <br>Nell'area riservata del sito.</h4>";
            }
        } else {
            echo "<h4>Per favore inserisci nome utente e password.</h4>";
        }
    }
    ?>

<p> in questa parte di login come accennato prima si visualizza il messaggio o di errore o di accesso all'area riservata del sito 
<br>
ho creato un php che verifica se il modulo precedente sia stato inviato con POST e faccio un controllo se anche le variabili siano state inviate con il metodo POST.<br>
con un if al suo interno ( isset ) che ha il compito di controllare ciò.<br>
fatto ciò si assegna una variabile ai valori di password e nome per facilitare la loro gestione <br>
e controllo che le credenziali siano quelle preimpostate cioè "admin - password " <br>
lo faccio con un if al suo interno la variabile nome che se dovesse essere diversa ad admin e se la variabile password dovesse essere diversa anche lei da password <br>
stampa un messaggio di errore visualizzando che i dati inseriti sono errati.
<br> se i dati invece dovessero essere corretti stampo un messaggio di benvenuto con il nome della variabile per chiamare il mio utente con il suo nome inserito.<br>
se dovesse inserire nessun dato si visualizzerà un messaggio di richiesta di inserire i dati. <br>
in alto a sinistra ho inserito due frecce che permettono una di tornare all indice iniziale e l'altra di riportarti invece alla pagina precedente.

</p>
</body>
</html>
