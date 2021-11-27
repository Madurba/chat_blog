<?php
require_once('model/CommentManager.php');
require_once('model/PostManager.php');



function frontPageView() {
    
    $postManager = new App\model\PostManager(); //création de l'objet
    $commentManager = new \App\Model\CommentManager();
    $messagesStatement = $postManager->getMessages(); // appel d'une fonction(méthode) de cet objet
    $commentsStatement = $commentManager->getTest();
    

    require('view/frontend/listMessagesView.php');
}

function postView() {

    $postManager = new App\model\PostManager();
    $commentManager = new App\model\CommentManager();

    $message = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function commentsView() {

    $commentManager = new App\model\CommentManager();
    $comment = $commentManager->getComment($_GET['id']);

    require('view/frontend/commentView.php');
}

function createPost($pseudo, $message) {

    $postManager = new App\model\PostManager();

    $affectedLines = $postManager->messageCreate($pseudo, $message);
        if ($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php');
        }
}

function checkNumber($input) { 
    
    $check = preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $input);

    //if check ok = return var1 else ko return var2

    require('testView.php');
    return $check;
}

function checkMail($input) { 
    
    $check = preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $input);
 
    require('testView.php');
    return $check;
}



