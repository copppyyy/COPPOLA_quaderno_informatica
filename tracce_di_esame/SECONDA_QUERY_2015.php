<a href="Traccia_2015.php"> 
      torna indietro
    </a><br>
<h1>Elenco dei membri che non hanno mai inserito un commento</h1><br><br>
<p> SELECT U.Nickname, U.Nome, U.Cognome<br>
FROM UTENTE U<br>
LEFT JOIN COMMENTO C ON U.Id_Utente = C.FK_Id_Utente<br>
WHERE C.FK_Id_Utente IS NULL;<br><br>
Spiegazione:<br>
Obiettivo: Mostrare gli utenti che non hanno mai inserito un commento.<br>

Dettagli:<br>

LEFT JOIN COMMENTO: Si unisce la tabella UTENTE alla tabella COMMENTO <br>
tramite Id_Utente per includere anche gli utenti senza commenti.<br>

WHERE C.FK_Id_Utente IS NULL: Se un utente non ha inserito commenti, <br>
il campo FK_Id_Utente nella tabella COMMENTO sarà NULL.<br>

Web Page: Utilizza il tag  per mostrare questi utenti nella pagina web.<br>
</p>