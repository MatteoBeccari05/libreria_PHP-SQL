<?php
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inserimento libro</title>
</head>
<body>
<h1> Inserimento di un libro </h1>

<form method="post" action="index.php">

    <label for="name"> Inserisci il titolo del libro:</label>
    <br>
    <input type="text" id="name" name="name">
    <br><br>

    <label for="autore"> Inserisci l'autore del libro:</label>
    <br>
    <input type="text" id="autore" name="autore">
    <br><br>

    <label for="genere"> Inserisci il genere del libro:</label>
    <br>
    <input type="text"  id="genere" name="genere">
    <br><br>

    <label for="prezzo"> Inserisci il prezzo del libro:</label>
    <br>
    <input type="text" id="prezzo" name="prezzo">
    <br><br>

    <label for="data"> Inserisci la data di pubblicazione del libro:</label>
    <br>
    <input type="date" id="data" name="data">
    <br><br>

    <input type="submit" value="Inserisci">
</form>

</body>
</html>
