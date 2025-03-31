<a href="Traccia_2015.php"> 
      torna indietro
    </a><br>
<h1> PRIMA QUERY</h1><br>
<br>
<H2> a. Elenco degli eventi già svolti, in ordine alfabetico di provincia</H2><br><br>
<p> SELECT * <br>
FROM EVENTO <br>
WHERE Data < CURDATE() <br>
ORDER BY Provincia ASC;<br>
<br>
Obiettivo: Mostrare gli eventi già svolti, ordinati alfabeticamente per provincia.<br>

Dettagli:<br>

WHERE Data < CURDATE(): Seleziona solo gli eventi la cui data è passata (prima della data odierna).<br>

ORDER BY Provincia ASC: Ordina gli eventi per provincia in ordine alfabetico crescente.<br>

Web Page: Puoi visualizzare questa query in una pagina web usando il tag <br>
 per mostrare l'elenco degli eventi già svolti.
 <br>
 <br>
 
 
</p>