<?php

require_once "../connessione_db/operazioni.php";
// recupero dei dati dal form
$titolo = $_POST['name'];
$autore = $_POST['autore'];

if(!verificaConnessione())
{
    header("location:error_connection.html");
}
else
{
    elimina($titolo, $autore);   //richiamo la funzione creata nel file operazioni
}
?>