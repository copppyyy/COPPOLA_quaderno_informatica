<!DOCTYPE html>
<html lang="en">
<head>
    <title> ES1 </title>
    <style>
        table {
            border-collapse: separate; /* Separazione tra le celle */
            border-spacing: 5px;        /* Aggiungi spazio tra le celle */
            width: 60%;                 /* Larghezza della tabella */
            margin: 0 auto;             /* Centra la tabella nella pagina */
        }
        th, td {
            padding: 10px;              /* Aggiungi padding dentro le celle */
            text-align: center;         /* Centra il testo nelle celle */
            border:  1px solid black;    /* Aggiungi bordo alle celle */
        }
    </style>
</head>
<body>

     <a href="index.html"> 
     &#8592; Torna alla Home
    </a>

    <H1 align=center>Primi 3 esercizi corrispettivi</H1>

    <h2>Esercizio 1 </h2>
   <p> Tavola Pitagorica 10x10 </p> 
    <?php 
    echo '<table>';

    // Prima riga con i numeri da 1 a 10 (intestazioni delle colonne)
    echo '<tr><th>0</th>'; // Cella vuota in alto a sinistra
    for ($col = 1; $col <= 10; $col++) {
        echo "<th>$col</th>"; // Intestazione della colonna
    }
    echo '</tr>';

    // Generazione delle righe con i numeri da 1 a 10 (intestazioni delle righe)
    for ($row = 1; $row <= 10; $row++) {
        echo "<tr>";
        echo "<th>$row</th>"; // Intestazione della riga

        // Generazione delle celle con i prodotti (riga * colonna)
        for ($col = 1; $col <= 10; $col++) {
            $product = $row * $col; // Prodotto della riga e colonna
            echo "<td>$product</td>"; // Mostra il prodotto
        }

        echo "</tr>";
    }

    echo "</table>";
    ?>

    <h2> Esercizio 2 </h2>
    <p> Ecco a te il tuo orario attuale: </p>
    <?php
    $today = new DateTime("now", new DateTimeZone('Europe/Rome'));
    echo $today ->format('h:i:s:a');
    $ora = $today ->format('h:a');
    echo "\nSono le "," $ora";
    if ($ora >= 8 && $ora < 12) {
        
        echo "Buongiorno";
        
    } elseif ($ora >= 12 && $ora < 20) {
        
        echo "Buonasera";
    
    } elseif ($ora >= 20 && $ora < 24 || $ora >= 1 && $ora < 8) {

        echo "Buonanotte Paolo,
                                benvenuto nella mia prima pagina PHP ";
    }
    ?>
    <br> 
    <br>
    <br> 
    <h2> Esercizio 3 </h2>
   <?php 
$j = "*";
$l = "";
echo "<p> Trinagolo di asterischi </p><br>";
echo "<p> (A) Crescente </p><br>";
for($i=0 ; $i<7; $i++) {
    $l = $l . $j;
    echo "$l <br>";
}
$d = "*******" ;
echo "<p> (B) Decrescente</p><br>";
for($e=7 ; $e>0; $e--) {
    echo "$d <br>";
    $d = substr($d, 0, strlen($d) - 1);
}
echo "<p> (C) Decrescente Specchtiato </p><br>";

$c = "*******";
$lunghezza_iniziale = strlen($c);

for ($k = $lunghezza_iniziale; $k > 0; $k--) {
    echo str_repeat("&nbsp;&nbsp;", $lunghezza_iniziale - strlen($c)) . $c . "<br>";
    $c = substr($c, 0, -1);
}
$t = "*";
$h = "";

echo "<p> (D) decrescente specchiato </p><br>";
for($n=0 ; $n<7; $n++){
    $h = $h . $t;
    echo str_repeat("&nbsp;&nbsp;", 6 - $n) . $h . "<br>";
}
?>

<p> per la creazione di questa pagina ho per prima cosa messo mano all'interno dello style per creare un impaginazione<br>
per la tavola pitagorica quindi ho fatto una separazione delle celle <br>
- spazio-larghezza maggiore della tabella - e centrato la tabella nella nostra pagina . <br>
poi ho stabilito la grandezza dei riquadri centrato il testo nelle celle <br>
e poi aggiunto un leggero bordo. dopo aver fatto ciò mi sono interfacciato al body della pagina <br>
ho inserito in alto a sinistra una freccia che ti riporta all indice iniziale<br>
poi ho iniziato a scrivere in php il codice della tavola pitagorica <br>
ho stampto prima la cella vuota in alto a sinistra con uno zero. poi in un ciclo di for <br>
ho inserito le colonne in modo tale di farle aumentare sino a 10<br>
tornando a capo. poi ho fatto la generazione delle righe con i numeri sempre da 1 a 10 <br> sempre come ho fatto per le colonne.
dopo aver inserito le colonne e le righe devo riempirle.<br> 
quindi ho fatto un altro ciclo di for con al suo internp la generazione delle celle con al suo interno la scrittura dei valori <br>
moltiplicando riga * colonna 
e poi ho stampato la variabile che possedeva questi calcoli con un echo. 
<br>
dopo questo primo esercizio nel secondo avevo il compito di far visualizzare l'orario e un messaggio ( buongiorno / buonasera paolo ) <br>
ho sempre creato dentro un php una variabile $today con al suo interno <br>
dei valori delineti secondo un codice già prestabilito in html che visualizza il tuo orario new DateTime("now", new DateTimeZone('Europe/Rome')); <br>
ho stampato la variabile $today con un formati seguendo delle specifiche scelte da me <br>
-h = ora nel formato delle 12 ore <br>
-i = mostra i minuti 59 <br>
-s = mostra i secondi 00-59 <br>
-a = mostra il prefisso am o pm <br>
grazie a ciò si riesce a comprende molto meglio che ore sono. <br>
poi ho assegnato ad una nuova variabile chiama ora i valori di $today con una formatazzione <br>
-h= ora nel formato 12 ore <br>
-a= prefisso am o pm <br>
fatto ciò ho stampato l'orario $ora con un echo. <br>
dopo aver eseguito questo codice è sorto un problema cioè la visualizzazione della scritta buongirno/buonanotte <br>
quindi ho creato per prima cosa un if con la variabile ora che faceva un controllo <br> che se fosse compresa fra 8 && 12 stampi buongiorno. <br>
poi ho creato un elseif con al suo interno un altro controllo su due valori che se $ora fosse compreso fra 12 && 24 stampi buona sera <br>
per finire ultimo else if con controllo $ora se fosse compreso fra <br>
20 &&24 || 1 && 8 stampi buonanotte paolo.<br>
così si conclude l'esercizio 2 <br>
mentre per la realizzazione dell'esercizio 3 
ho creato due variabili $j = assegnando un asterischo<br>
che verrà utilizzato per creare i triangolo crescenti <br>
poi ho creato una variabile $l che è una stringa vuota che conta gli spazi <br>
per il primo triangolo <br>
-A <br>
ho cretato un ciclo di for con al suo interno for($i = 0; $i < 7; $i++)<br>
fatto ciò ho aggiunto un asterisco a $l ad ogni iterazione <br>
per finire ho stampato la stringa di asterischi <br>
per il secondo triangolo <br>
-B <br>
ho creato una variabile $d = con al suo interno 7 asterischi. poi una stampa della triangolo decrescente <br>
poi ho fatto un ciclo di for con al suo interno for($e = 7; $e > 0; $e--) <br>
poi ho stampato la riga $d con asterischi.<br>
poi rimuovo l'ultimo carattere di $d.<br>
dopo il secondo triangolo ho creato il terzo<br>
-C<br>
ho creato una variabile $c= con sette asterischi <br>
poi ho creato una variabile chiamata <br>
$lunghezza_iniziale = strlen($c) che calcola la lunghezza della sringa $c<br>
il compito di strlen è quello di restituire una lunghezza di una stringa.<br>
ho creato succesivamente un ciclo di for con al suo intenro ho passato il valore di lunghezza iniale a $k<br>  for ($k = $lunghezza_iniziale; $k > 0; $k--) 
<br>
poi ho fatto la stampa degli spazi all'inizio della riga in modo tale<br> da poter spostare gli asterischi verso destra <br>
ho utilizzato str_repeat che ripete una stringa e gli spazi &nbsp che viene usato un numero specificato di volte in modo tale da creare gli spazi per centrare il triangolo<br>
per finire ho fatto come il triangolo precedente ho rimosso l'ultimo carattere della stringa $c per il prossimo ciclo <br>

dopo il terzo triangolo ho creato il quarto <br>
-D<br>
ho creato due variabili <br>
$t = assegnando un asterisco<br>
$h assegnando una stringa vuota per costruire il triangolo.<br>
ho creato un ciclo di for for($n = 0; $n < 7; $n++) <br>
poi ho aggiuntoun asterisco alla stringa $h dopo ogni iterazione <br>
$h = $h . $t <br>
poi ho stampato gli spazi come avevo fatto nel triangolo precedente in modo tale da centrarlo. <br> 

</body>
</html>