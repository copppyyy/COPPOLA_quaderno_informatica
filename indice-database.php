<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Libri e Wishlist</title>
</head>
<body>

<a href="index.html"> 
     &#8592; Torna indietro 
    </a>
    <br>
    <br>



    <h1>Gestione Libri e Wishlist</h1>

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
    ?>

    <form action="indice-database.php" method="post">
        <input type="submit" name="view_books" value="Visualizza Libri">
        <input type="submit" name="view_wishlist" value="Visualizza Wishlist">
    </form>

    <?php
        // Gestione della visualizzazione dei libri
        if (isset($_POST['view_books'])) {
            // Query per recuperare tutti i libri
            $result = $conn->query("SELECT * FROM books");
            echo "<h2>Libri</h2><table border='1'><tr><th>ID</th><th>Titolo</th><th>Autore</th><th>Prezzo</th><th>Descrizione</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . htmlspecialchars($row['title']) . "</td>
                        <td>" . htmlspecialchars($row['author']) . "</td>
                        <td>" . $row['price'] . "€</td>
                        <td>" . htmlspecialchars($row['description']) . "</td>
                      </tr>";
            }
            echo "</table>";
        }

        // Gestione della visualizzazione della wishlist
        if (isset($_POST['view_wishlist'])) {
            // Query per recuperare tutti i libri nella wishlist
            $result = $conn->query("SELECT * FROM wishlist");
            echo "<h2>Wishlist</h2><table border='1'><tr><th>ID</th><th>Titolo</th><th>Descrizione</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . htmlspecialchars($row['title']) . "</td>
                        <td>" . htmlspecialchars($row['description']) . "</td>
                      </tr>";
            }
            echo "</table>";
        }

        // Chiudi la connessione
        $conn->close();
    ?>

    <p>Clicca sul link qui sotto per andare alla pagina di inserimento dati:</p>
    <a href="inserimento-dati.php">Pagina di inserimento dati</a>

</body>
</html>

