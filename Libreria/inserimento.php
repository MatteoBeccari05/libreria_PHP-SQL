<?php
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/inserimento.css">
    <title>Inserimento Libro</title>
</head>
<body>

<h1>Inserimento di un libro</h1>

<form method="post" action="inserimento_index.php">
    <label for="name">Inserisci il titolo del libro:</label>
    <input type="text" id="name" name="name" required>

    <label for="autore">Inserisci l'autore del libro:</label>
    <input type="text" id="autore" name="autore" required>

    <label for="genere">Inserisci il genere del libro:</label>
    <input type="text" id="genere" name="genere" required>

    <label for="prezzo">Inserisci il prezzo del libro:</label>
    <input type="text" id="prezzo" name="prezzo" required>

    <label for="data">Inserisci la data di pubblicazione del libro:</label>
    <input type="date" id="data" name="data" required>

    <input type="submit" value="Inserisci">
</form>

<footer>
    <span>© 2025 Libreria</span>
    <img src="https://cdn-icons-png.flaticon.com/512/2784/2784539.png" alt="Book Icon">
</footer>

<script src="script.js"></script>
</body>
</html>

