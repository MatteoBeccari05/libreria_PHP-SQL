<?php
 //file con connessione al database e varie operazioni crud
// Assicurati che il file di configurazione venga incluso correttamente
$config = require 'db_config.php';

// Includi la classe di connessione
require 'DB_Connect.php';


function verificaConnessione() : bool
{
    global $db;
    global $config;
    try
    {
        $db = DB_Connect::getDB($config);
        // Verifica la connessione con una semplice query
        $db->query("SELECT 1");
        return true;
    }
    catch (Exception $e)
    {
        // Log dell'errore
        error_log("Errore di connessione al database: " . $e->getMessage() . ' -- ' . date('Y-m-d H:i:s') . "\n", 3, '../log/error.log');
        return false;
    }
}




function inserimento($titolo, $autore, $genere, $prezzo, $data) : void
{
    if(verificaConnessione())
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
                    header('Location:../redirect/confirm.html');  //per non avere problemi di scrittura doppia
                }
                else
                {
                    throw new PDOException("Libro non inserito correttamente");  // sollevo l'eccezione
                }
            }
            else
            {
                header('Location:../redirect/error.html');  //per non avere problemi di scrittura doppia
                throw new PDOException("Controlla i dati inseriti");  // sollevo l'eccezione
            }

        }
        catch (Exception $eccezione)
        {
            logError($eccezione);
        }
    }
    else
    {
        header("location:../redirect/error_connection.html");
    }

}


function visualizza() : void
{
    if(verificaConnessione())
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
    else
    {
        header("location:../redirect/error_connection.html");
    }
}



function elimina($titolo, $autore) : void
{
    if(verificaConnessione())
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
                header('Location:../redirect/confirm.html');  //per non avere problemi di scrittura doppia
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
    else
    {
        header("location:../redirect/error_connection.html");
    }

}




function aggiorna($titolo, $autore,  $prezzo) : void
{
    if(verificaConnessione())
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
                    header('Location:../redirect/confirm.html');  //per non avere problemi di scrittura doppia
                }
                else
                {
                    throw new PDOException("Aggiornamento del libro non riuscito");  // sollevo l'eccezione
                }
            }
            else
            {
                header('Location:../redirect/error.html');  //per non avere problemi di scrittura doppia
                throw new PDOException("Controlla i dati inseriti");
            }

        }
        catch (Exception $eccezione)
        {
            logError($eccezione);
        }
    }
    else
    {
        header("location:../redirect/error_connection.html");
    }

}


//salva l'errore in un file log
function logError(Exception $ex): void
{
    error_log($ex->getMessage() . ' -- ' . date('Y-m-d H:i:s') . "\n", 3, '../log/error.log');  // appende il messaggio in un file di destinazione
    header('Location:../redirect/error.html');  //per non avere problemi di scrittura doppia
}