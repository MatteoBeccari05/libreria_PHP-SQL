<?php
$db = new PDO('mysql:host=localhost;dbname=libreria', 'root', '', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ]);

$query = "select * from libri";

try
{
    $stm = $db->prepare($query);
    $stm->execute(); // eseguo
    echo '<table>';
    echo '<tr><th>Titolo</th><th>Autore</th><th>Genere</th><th>Data di pubblicazione</th><th>Prezzo</th></tr>';

    while ($libro = $stm->fetch()) {
        // Righe della tabella
        echo '<tr>';
        echo '<td>' . $libro->titolo . '</td>';
        echo '<td>' . $libro->autore . '</td>';
        echo '<td>' . $libro->genere . '</td>';
        echo '<td>' . $libro->data_pubblicazione . '</td>';
        echo '<td>' . $libro->prezzo . '</td>';
        echo '</tr>';
    }

    echo '</table>'; // Fine della tabella

    $stm->closeCursor();  // chiudo la connessione
}
catch (Exception $eccezione)
{
    logError($eccezione);
}

echo '<a href="home.php"><button>Torna alla Home</button></a>';

function logError(Exception $ex): void
{
    echo 'Errore nel database, contatta assistenza';  // messaggio di errore nella pagina
    error_log($ex->getMessage() . ' -- ' . date('Y-m-d H:i:s') . "\n", 3, 'log/error.log');  // appende il messaggio in un file di destinazione
}

?>

<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizza Libri</title>
    <!-- Link al file CSS -->
    <link rel="stylesheet" href="style/visualizza_libri.css">
</head>
<body>
<footer>
    <span>© 2025 Libreria</span>
    <img src="https://cdn-icons-png.flaticon.com/512/2784/2784539.png" alt="Book Icon">
</footer>
</body>
</html>
