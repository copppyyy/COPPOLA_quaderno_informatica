 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ES2</title>
</head>
<body>
<a href="index.html"> 
     &#8592; Torna alla Home
    </a>
    <H1 align=center>Accesso a pagina riservata</H1>
    <form align=center action="login.php" method="post">

    <label for="username" ><b> Username</b></label>
    <input type="text" name="nomeutente" placeholder="Inserisci il nome utente" /><br />
    <br>
    <br>    
    <label for="password" ><b> Password</b></label>
    <input typer="text" name="password" placeholder="inserisci la password" /><br />
    <input name="submit" type="submit" value="Invia" />
</form>
<br>
<br>
<h2>Generazione della Tabella dei Quadrati e Cubi</h2>
    
    <?php 
    // Verifica se è stato inviato un numero N tramite POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera il valore N selezionato dal menu a tendina
        $n = (int)$_POST['numero'];
        
        // Verifica se il numero N è valido (compreso tra 1 e 10)
        if ($n >= 1 && $n <= 10) {
            // Stampa la tabella dei quadrati e cubi
            echo "<h3>Tabella dei Quadrati e Cubi da 1 a $n</h3>";
            echo "<table border='1' style='border-collapse: collapse; text-align: center;'>";
            echo "<tr><th>Numero</th><th>Quadrato</th><th>Cubo</th></tr>"; // Intestazione della tabella

            // Ciclo per stampare i numeri, i quadrati e i cubi
            for ($i = 1; $i <= $n; $i++) {
                $quadrato = $i * $i;  // Calcola il quadrato
                $cubo = $i * $i * $i; // Calcola il cubo
                echo "<tr><td>$i</td><td>$quadrato</td><td>$cubo</td></tr>";
            }

            echo "</table>"; // Fine della tabella
        } else {
            echo "<h4 style='color: red;'>Per favore, inserisci un numero tra 1 e 10.</h4>";
        }
    } else {
        // Se il modulo non è stato inviato, mostra il form
    ?>
        <form action="" method="POST">
            <label for="numero"><b>Seleziona un numero da 1 a 10:</b></label>
            <select name="numero" id="numero">
                <?php
                    // Ciclo per creare le opzioni da 1 a 10 nel menu a tendina
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                ?>
            </select><br><br>
            <input type="submit" value="Crea Tabella">
        </form>
    <?php
    }
    ?>
    
<p> dovevo creare una pagina che gestisse nome e password e una creazione di una tabella con un menù a tendina <br>
per la creazione del menù della password e dell utente ho usato un form inserendo i dati necessri all'utente poi ho creato un tasto invia,<br>
che grazie all'action=login.php inserita ad inzio pagina mi si collegerà ad un altra pagina php dove ci ritornerà una scritta se i dati inseriti saranno corretti o meno . <br>
successivamente per la creazioone della tabella dei quadrati e cubi di un numero ho creto nel php<br>
  una richiesta di tipo POST per controllare se il dato N fosse inserito.<br>
poi ho dato il valore dell'utente alla nostra variabile, poi ho verificato con un if se il numero fosse valido cioè compreso fra 1 && 10.<br>
fatto ciò avviene la stampa della tabella con un ciclo di for interno all if. <br>
facendo il calcolo del quadrato ( x * x ) e il cubo ( x * x * x). fatto ciò ho fatto una stampa echo in una tabella.<br>
dovessero mancare i valori adeguati si visualizza un messaggio di errore. per finire se il modulo non dovesse essere arrivato si rimostra il form.
<br>
ho inserito in alto a sinistra una freccia che ti permette di tornare all indice grazie a questo metodo <br>
href="index.html"> 
     &#8592; Torna alla Home <br>
     tutti quei numeri che si vedono è già prestabilito da html che crea una freccia in modo tale da facilitare la gestione del sito.
    


</p>
</body>
</html>