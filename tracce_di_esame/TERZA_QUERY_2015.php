<a href="Traccia_2015.php"> 
      torna indietro
    </a><br>
<h1> . Per ogni evento, il voto medio ottenuto in ordine di categoria e titolo</h1><br> <br>
<p> SELECT C.Nome AS Categoria, E.Titolo, AVG(Co.Voto) AS Voto_Medio<br>
FROM EVENTO E<br>
JOIN CATEGORIA C ON E.FK_Id_Categoria = C.Id_Categoria<br>
JOIN COMMENTO Co ON E.Id_Evento = Co.FK_Id_Evento<br>
GROUP BY C.Nome, E.Titolo<br>
ORDER BY C.Nome ASC, E.Titolo ASC;<br><br>piegazione:<br>
Obiettivo: Calcolare il voto medio per ogni evento, ordinato per categoria e titolo.<br>

Dettagli:<br>

AVG(Co.Voto): Calcola la media dei voti per ogni evento.<br>

GROUP BY C.Nome, E.Titolo: Raggruppa i risultati per categoria e titolo dell'evento.<br>

ORDER BY C.Nome ASC, E.Titolo ASC: Ordina prima per categoria e poi per titolo in ordine alfabetico crescente.<br>

Web Page: Puoi visualizzare i risultati in una pagina web con il tag <br>
</p>