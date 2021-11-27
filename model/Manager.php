<?php
namespace App\model;

const DB_NAME = 'chat_oc';
const DB_HOST = 'localhost';
const DB_PORT = 3306;
const DB_USER = 'root';
const DB_PASSWORD = '';

class Manager {

    protected function dbConnect() {

        try {
            //connection db & display error
            $db = new \PDO(
                sprintf('mysql:host=%s;dbname=%s;port=%d', DB_HOST, DB_NAME, DB_PORT),
                DB_USER,
                DB_PASSWORD
            );
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $db;
    
        } catch(\Exception $e) {
                die('Erreur : ' . $e->getMessage());
        }
    }
}