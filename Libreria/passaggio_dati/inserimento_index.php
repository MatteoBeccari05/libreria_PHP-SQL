<?php

 require_once "../connessione_db/operazioni.php";
// recupero dei dati dal form
$titolo = $_POST['name'];
$autore = $_POST['autore'];
$genere = $_POST['genere'];
$prezzo = $_POST['prezzo'];
$data = $_POST['data'];

if(!verificaConnessione())
{
    header("location:error_connection.html");
}
else
{
    inserimento($titolo, $autore, $genere, $prezzo, $data);   //richiamo la funzione creata nel file operazioni
}

?>

