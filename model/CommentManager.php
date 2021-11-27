<?php 
namespace App\model;

require_once('model/Manager.php');

class CommentManager extends Manager {

    function getComments($postId) {

        $db = $this->dbConnect();

        $commentsStatement = $db->prepare('SELECT id, author, comment FROM comments WHERE post_id = ?');
        $commentsStatement->execute( array($postId) );

    
        return $commentsStatement;
    }

    function getComment($commentId) {

        $db = $this->dbConnect();

        $commentStatement = $db->prepare('SELECT post_id, author, comment FROM comments WHERE id = ?');
        $commentStatement->execute( array($commentId) );
        $comment = $commentStatement->fetch(\PDO::FETCH_ASSOC);

        return $comment;
    }

    function getTest() {

        $db = $this->dbConnect();

        $commentStatement = $db->prepare('SELECT post_id FROM comments');
        $commentStatement->execute();

        return $commentStatement;

    }

    function updateComment($comment) {
        $db = $this->dbConnect();
        $commentStatement = $db->prepare('UPDATE comments SET comments WHERE comments_id = ?');
        $commentStatement->execute( array($comment) );
    }
}

