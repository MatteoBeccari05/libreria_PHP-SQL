<?php

class DB_Connect
{
    private static ?PDO $db = null;  // La connessione è inizialmente nulla

    public static function getDB(array $config) : PDO
    {
        if (self::$db === null) {  // Verifica se la connessione è già stata creata
            self::$db = new PDO($config['dns'], $config['username'], $config['password'], $config['options']);
        }
        return self::$db;
    }
}