<?php
 //file con connessione al database e varie operazioni crud

$db = new PDO('mysql:host=localhost;dbname=libreria', 'root', '', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ]);


function inserimento($titolo, $autore, $genere, $prezzo, $data) : void
{
    global $db;
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
}


function visualizza() : void
{
    $query = "select * from libri";
    global $db;
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
}



function elimina($titolo, $autore) : void
{
    $query = 'DELETE FROM libri WHERE titolo=:titolo && autore=:autore';
    global $db;
    try
    {
        $stm = $db->prepare($query);
        $stm->bindValue(':titolo', $titolo);
        $stm->bindValue(':autore', $autore);

        if ($stm->execute())
        {
            $stm->closeCursor();  // chiudo la connessione
            echo "<h1>Rimozione del libro avvenuta con successo!</h1>";
            echo '<a href="home.php"><button>Torna alla Home</button></a>';
        }
        else
        {
            throw new PDOException("Eliminazione del libro non corretta");  // sollevo l'eccezione
        }
    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}




function aggiorna($titolo, $autore,  $prezzo) : void
{
    $query = 'UPDATE libri SET prezzo=:prezzo WHERE titolo=:titolo && autore=:autore';
    global $db;
    try
    {
        if(is_numeric($prezzo))
        {
            $stm = $db->prepare($query);
            $stm->bindValue(':titolo', $titolo);
            $stm->bindValue(':autore', $autore);
            $stm->bindValue(':prezzo', $prezzo);

            if ($stm->execute())
            {
                $stm->closeCursor();  // chiudo la connessione
                echo "<h1>Aggiornamento del libro avvenuta con successo!</h1>";
                echo '<a href="home.php"><button>Torna alla Home</button></a>';
            }
            else
            {
                throw new PDOException("Aggiornamento del libro non riuscito");  // sollevo l'eccezione
            }
        }
        else
        {
            throw new PDOException("Controlla i dati inseriti");
        }

    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}



function logError(Exception $ex): void
{
    echo '<h1>Controllare i dati inseriti</h1>';  // messaggio di errore nella pagina
    error_log($ex->getMessage() . ' -- ' . date('Y-m-d H:i:s') . "\n", 3, 'log/error.log');  // appende il messaggio in un file di destinazione
    echo '<a href="home.php"><button>Torna alla Home</button></a>';
}