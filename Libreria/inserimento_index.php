<?php

// recupero dei dati dal form
$titolo = $_POST['name'];
$autore = $_POST['autore'];
$genere = $_POST['genere'];
$prezzo = $_POST['prezzo'];
$data = $_POST['data'];

$db = new PDO('mysql:host=localhost;dbname=libreria', 'root', '', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ]);

$query = "INSERT INTO libri (titolo, autore, genere, data_pubblicazione, prezzo) VALUES (:titolo, :autore, :genere, :data, :prezzo)";

try
{
    if ($titolo != null && $autore != null && $genere != null && $data != null && is_numeric($prezzo))
    {
        $stm = $db->prepare($query);
        $stm->bindValue(':titolo', $titolo);
        $stm->bindValue(':autore', $autore);
        $stm->bindValue(':genere', $genere);
        $stm->bindValue(':data', $data);
        $stm->bindValue(':prezzo', $prezzo);

        if ($stm->execute())
        {
            $stm->closeCursor();  // chiudo la connessione
            echo "<h1>Inserimento del libro avvenuto con successo!</h1>";
            echo '<a href="home.php"><button>Torna alla Home</button></a>';
        }
        else
        {
            throw new PDOException("Libro non inserito correttamente");  // sollevo l'eccezione
        }
    }
    else
    {
        throw new PDOException("Controlla i dati inseriti");  // sollevo l'eccezione
        echo '<a href="inserimento.php"><button>Torna ad inserimento</button></a>';
    }

}
catch (Exception $eccezione)
{
    logError($eccezione);
}

function logError(Exception $ex): void
{
    echo '<h1>Controllare i dati inseriti</h1>';  // messaggio di errore nella pagina
    error_log($ex->getMessage() . ' -- ' . date('Y-m-d H:i:s') . "\n", 3, 'log/error.log');  // appende il messaggio in un file di destinazione
    echo '<a href="home.php"><button>Torna alla Home</button></a>';
}

?>
<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inserimento Libro</title>
    <link rel="stylesheet" href="style/inserimento_index.css">
</head>
<body>

</body>
</html>
