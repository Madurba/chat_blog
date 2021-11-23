<?php
require('model/frontend.php');



function frontPageView() { 
    $messagesStatement = getMessages();
    require('view/frontend/listMessagesView.php');
}

function messageView() {
    $message = getMessage( $_GET['id'] );
    $comments = getComments( $_GET['id'] );
    require('view/frontend/messageView.php');
}

function createPost($pseudo, $message) {
    $affectedLines = messageCreate($pseudo, $message);
        if ($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php');
        }
}

function checkNumber($number, $mail) { 
    
    $numberTest = preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $number);
    $mailTest = preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail);

    $check = array($numberTest, $mailTest);

    require('postView.php');var_dump($check);
    return $check;
}

function checkMail($mail) { 
    
    $mailTest = preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail);
       
   require('postView.php');
   return $mailTest;
}



