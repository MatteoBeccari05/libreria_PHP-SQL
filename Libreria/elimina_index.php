<?php

require_once "operazioni.php";
// recupero dei dati dal form
$titolo = $_POST['name'];
$autore = $_POST['autore'];



elimina($titolo, $autore);   //richiamo la funzione creata nel file operazioni

?>
<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminazione di un libro</title>
    <link rel="stylesheet" href="style/inserimento_index.css">
</head>
<body>

</body>
</html>