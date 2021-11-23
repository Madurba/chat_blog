<?php 

const DB_NAME = 'chat_oc';
const DB_HOST = 'localhost';
const DB_PORT = 3306;
const DB_USER = 'root';
const DB_PASSWORD = '';

function dbConnect() {

    try {
        //connection db & display error
        $db = new PDO(
            sprintf('mysql:host=%s;dbname=%s;port=%d', DB_HOST, DB_NAME, DB_PORT),
            DB_USER,
            DB_PASSWORD
        );
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;

    } catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
    }
}

function getMessages() {

    $db = dbConnect();
    //préparation d'une requête
    $messagesStatement = $db->query('SELECT id, pseudo, message FROM minichat ORDER BY id DESC LIMIT 0, 10');
    return $messagesStatement;
}

//get message selon id
function getMessage($messageId) {

    $db = dbConnect();
    $messageStatement = $db->prepare('SELECT pseudo, message FROM minichat WHERE id = ?');
    $messageStatement->execute( array($messageId) );
    $message = $messageStatement->fetch();

    return $message;
}

function getComments($messageId) {

    $db = dbConnect();
    $commentsStatement = $db->prepare('SELECT author, comment FROM comments WHERE post_id = ?');
    $commentsStatement->execute( array($messageId) );

    return $commentsStatement;
}

function messageCreate($pseudo, $message) {
    $db = dbConnect();

    $messageCreateStatement = $db->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
    $affectedLines = $messageCreateStatement->execute(array($_POST['pseudo'], $_POST['message']));

    return $affectedLines;
}





