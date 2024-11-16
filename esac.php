<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raccolta Info</title>
</head>
<body>
<a href="index.html"> 
     &#8592; Torna alla Home
    </a>
<H1 align=center>Raccolta Informazioni Utente </H1>
<form align=center action="accesso(c).php" method="post">

<label for="name"><b>Nome*:</b></label>

    <input type="text" id="name" name="name" required pattern="[A-Za-z\s]+" title="Inserisci solo lettere">
   

    <label for="surname"><b>Cognome*:</b></label>
    <input type="text" id="surname" name="surname" required pattern="[A-Za-z\s-']+" title="Inserisci solo lettere">
    
    <br>
    <br>
<tr>
<td>Date*:</td><td><input type="date" name="date" title="Inserisci solo numeri" required / /><br /></td>
</tr>
<br>
<label for="email"><b>Email*:</b></label>
    <input type="text" id="email" name="email" title="Inserisci i dati" required />
    
    <label for="codice fiscale"><b>CodiceFiscale*:</b></label>
    <input type="text" id="codicefiscale" name="codicefiscale" maxlength="20" >
    <br>
    <label for="numerotelefono"><b>Cellulare ( inserisci anche il prefisso ):</b></label>
    <input type="text" id="numerotelefono" name="numerotelefono" pattern="[0-9]+" title="Sono ammessi solo numeri" maxlength="14" >
<br>
<br>

    <label for="Via">Via*:</label>
    <input type="text" id="Via" name="Via" required>
    <br>

    <label for="Città">Città*:</label>
    <input type="text" id="Città" name="Città" required>
    <br>

    <label for="stato">stato*:</label>
    <input type="text" id="stato" name="stato" required>
    <br>

    <label for="CP">CP*:</label>
    <input type="text" id="CP" name="CP" pattern="[0-9]+" title="inserisci un CP valido " maxlength="5" required>
    <br>

    <label for=" Provincia ">Provincia*:</label>
    <input type="text" id="Provincia" name="Provincia" required>
    <br>


    <label for="nickname">Nickname:</label>
    <input type="text" id="nickname" name="nickname" required><br>

    

    <label for="password">Password*:</label>
<input type="password" id="password" name="password" 
    pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
    maxlength="20" required 
    title="La password deve contenere almeno una lettera maiuscola, un numero, un carattere speciale e almeno 8 caratteri.">
<br>
<br>
<input name="submit" type="submit" value="Invia" />
<br>
<button type="reset">reset</button>

</form>


<?php
if (isset($_POST['name'], $_POST['surname'], $_POST['nickname'])) {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $nickname = trim($_POST['nickname']);

    // Verifica che il nickname sia diverso da nome e cognome
    if (strcasecmp($nickname, $name) === 0 || strcasecmp($nickname, $surname) === 0) {
        echo "Errore: Il nickname deve essere diverso dal nome e dal cognome.";
    } else {
        echo "Registrazione completata con successo!<br>";
        echo "Nome: " . htmlspecialchars($name) . "<br>";
        echo "Cognome: " . htmlspecialchars($surname) . "<br>";
        echo "Nickname: " . htmlspecialchars($nickname);
        
    }
} else {
    echo "Per favore, compila tutti i campi del form assegnati da un simbolo ( * ).";
}
?>
<?php
if (isset($_POST["email"])) { // Controlla se il campo email è stato inviato
    $email = $_POST["email"];
    
    // Controlla che l'email sia valida
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'indirizzo email è valido.";
    } else {
        echo "L'indirizzo email non è valido.";
    }
} else {
    echo "Il campo email è obbligatorio.";
}


?>

<p> per fare tutti questi punti di selezione ho usato un semplicissimo form dove al suo interno<br> sono stati inseriti i valori necessari per la pagina WEB<br>
ho usato per tutti un input type text un nome e id scelto da me mentre per i punti obbligatori ho inserito ( required) vale a dire valore obbligatorio <br>
ho usato un (pattern) per scegliere i valori/ lettere che si posso usare per compilare il il label <br>
mentre per la data ho usato un input type di tipo 'date' creata già da html ti permette di accedere più facilmente alla data<br>
nei punti dove era necessario inserire un numero massimo di parole o numeri ho usato un ( maxlenght) scegliendo il numero adeguato di valori,<br>
per la sezione del numero di telfono ho usato un input type di tipo number, mentre invece per il controllo del nickname ( che il valore nickname deve essere != name & cognome)<br>
ho usato un controllo con il php fuori dal form faceno un if ( isset) devi valori name-cognome-nickname. <br>
il compito di isset è il controllo dei campi prima di accedere al valore inserito. successivamente all'interno dell'if <br>
ho inserito le variabili = trim -> che rimuove gli spazi vuoti dentro la riga in modo tale da eliminare gli errori <br>
ho fatto poi un altro if interno con strcasecmp(): che Confronta due stringhe ignorando le differenze tra maiuscole e minuscole<br>
ciò serve per assicurarci che "Mario" e "mario" siano considerati uguali.<br> 
ho fatto un controllo dei valori che se nickname e nome e cognome corrisponodo a 0 stampa errore.<br>
mentre se non corrisponde nessun errore si prosegue con l avanzamento del programma passando i nuovi dati di nickname però con un accorgimento usando .<br>
htmlspecialchars ( variabile 'x') rende i caratteri speciali in caso si fossere inseriti e li sostituisce in enitità HTML rendendo più sicura la visualizzazione della pagina.<br>
ho fatto un'ultimo controllo in PHP della mail sempre con ( isset ) per verificare se il valore sia stato inviato poi con un if al suo interno <br>
 (filter_var($email, FILTER_VALIDATE_EMAIL)) == che serve per verificare se la variabile $email contiene un indirizzo email valido.
per concludere <br> 
in alto a sinistra ho inserito un pulsante con un ahref che ci permette di tornare alla pagina di indice inziale.
</p>

</table>





</form>
</body>
</html>