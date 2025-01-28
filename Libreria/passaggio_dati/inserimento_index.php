<?php

 require_once "../connessione_db/operazioni.php";
// recupero dei dati dal form
$titolo = $_POST['name'];
$autore = $_POST['autore'];
$genere = $_POST['genere'];
$prezzo = $_POST['prezzo'];
$data = $_POST['data'];


inserimento($titolo, $autore, $genere, $prezzo, $data);   //richiamo la funzione creata nel file operazioni

?>
<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inserimento Libro</title>
    <link rel="stylesheet" href="../style/index.css">
</head>
<body>

</body>
</html>
