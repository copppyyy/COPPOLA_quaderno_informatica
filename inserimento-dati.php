<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci Dati - Libri e Wishlist</title>
</head>
<body>
    <h1>Inserimento Dati - Libri e Wishlist</h1>

    <?php
    // Connessione al database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library"; // Nome del database

    // Creazione della connessione
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica della connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Variabili per l'inserimento dei dati
    $title = $author = $price = $description = "";
    $wishlist_title = $wishlist_description = "";

    // Controllo se il modulo è stato inviato
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera i dati dal modulo
        if (isset($_POST['book_submit'])) {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $price = $_POST['price'];
            $description = $_POST['description'];

            // Query SQL per inserire i dati nella tabella 'books'
            $sql = "INSERT INTO books (title, author, price, description)
                    VALUES ('$title', '$author', '$price', '$description')";

            // Esegui la query
            if ($conn->query($sql) === TRUE) {
                echo "<p>Nuovo libro inserito con successo!</p>";
            } else {
                echo "Errore: " . $conn->error;
            }
        }

        if (isset($_POST['wishlist_submit'])) {
            $wishlist_title = $_POST['wishlist_title'];
            $wishlist_description = $_POST['wishlist_description'];

            // Query SQL per inserire i dati nella tabella 'wishlist'
            $sql = "INSERT INTO wishlist (title, description)
                    VALUES ('$wishlist_title', '$wishlist_description')";

            // Esegui la query
            if ($conn->query($sql) === TRUE) {
                echo "<p>Nuovo libro aggiunto alla Wishlist con successo!</p>";
            } else {
                echo "Errore: " . $conn->error;
            }
        }
    }

    // Chiudi la connessione
    $conn->close();
    ?>
  <a href="indice-database.php"> 
     &#8592; Torna indietro 
    </a>
    <br>
    <br>
    <h2>Inserisci un nuovo Libro</h2>
    <!-- Modulo per inserire i dati del libro -->
    <form method="POST" action="">
        <label for="title">Titolo:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="author">Autore:</label>
        <input type="text" id="author" name="author" required><br><br>

        <label for="price">Prezzo:</label>
        <input type="number" id="price" name="price" required><br><br>

        <label for="description">Descrizione:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <input type="submit" name="book_submit" value="Inserisci Libro">
    </form>
    <h2>Aggiungi un Libro alla Wishlist</h2>
    <!-- Modulo per inserire i dati della Wishlist -->
    <form method="POST" action="">
        <label for="wishlist_title">Titolo del Libro:</label>
        <input type="text" id="wishlist_title" name="wishlist_title" required><br><br>

        <label for="wishlist_description">Descrizione del Libro:</label>
        <textarea id="wishlist_description" name="wishlist_description" required></textarea><br><br>

        <input type="submit" name="wishlist_submit" value="Aggiungi alla Wishlist">
    </form>

    <p>Clicca sul link qui sotto per tornare alla home page.</p>
    <a href="indice-database.php">Home</a>

</body>
</html>
