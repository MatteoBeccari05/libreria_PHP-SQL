<?php

require_once "../connessione_db/operazioni.php";

visualizza();

?>

<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizza Libri</title>
    <link rel="stylesheet" href="../style/visualizza_libri.css">
</head>
<body>

<div>
    <a href="../home.php"><button>Torna alla Home</button></a>
</div>

<div>
    <button onclick="window.location.href='form_inserimento.php';">Inserisci libro</button>
    <button onclick="window.location.href='form_elimina.php';">Elimina libro</button>
    <button onclick="window.location.href='form_aggiorna.php';">Aggiorna libro</button>
</div>

<footer>
    <span>© 2025 Libreria</span>
    <img src="https://cdn-icons-png.flaticon.com/512/2784/2784539.png" style="height: 30px; width: 30px" alt="Book Icon">
</footer>
</body>
</html>
