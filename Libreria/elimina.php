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
    <title>Elimina libro</title>
</head>
<body>

<h1>Eliminazione di un libro</h1>

<form method="post" action="elimina_index.php">
    <label for="name">Inserisci il titolo del libro da eliminare:</label>
    <input type="text" id="name" name="name" required>

    <label for="autore">Inserisci l'autore del libro da eliminare:</label>
    <input type="text" id="autore" name="autore" required>

    <input type="submit" value="Elimina">
</form>

<footer>
    <span>© 2025 Libreria</span>
    <img src="https://cdn-icons-png.flaticon.com/512/2784/2784539.png" style="height: 30px; width: 30px" alt="Book Icon">
</footer>

<script src="script.js"></script>
</body>
</html>

