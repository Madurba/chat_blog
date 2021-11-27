<?php
namespace App\Model;

require_once('model/Manager.php');

class PostManager extends Manager {

    public function getMessages() {

        $db = $this->dbConnect();
        //préparation d'une requête
        $messagesStatement = $db->query('SELECT id, pseudo, message FROM minichat ORDER BY id DESC LIMIT 0, 10');
        return $messagesStatement;
    }
    
    //get message selon id
    public function getPost($postId) {

        $db = $this->dbConnect();
        $messageStatement = $db->prepare('SELECT pseudo, message FROM minichat WHERE id = ?');
        $messageStatement->execute( array($postId) );
        $message = $messageStatement->fetch();
    
        return $message;
    }

    function messageCreate($pseudo, $message) {

        $db = $this->dbConnect();
        $messageCreateStatement = $db->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
        $affectedLines = $messageCreateStatement->execute(array($pseudo, $message));
    
        return $affectedLines;
    }
}