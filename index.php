<?php

require ('controller/frontend.php');

if ( isset($_GET['action']) ) {
    if ( $_GET['action'] == 'listMessagesView' ) {
        frontPageView();

    } elseif ($_GET['action'] == 'postView') {
        if ( isset( $_GET['id'] ) && $_GET['id'] > 0 ) {
            postView();
        } else {
            echo 'Erreur : aucun id de message envoyé...';
        }

    } elseif ($_GET['action'] == 'createPost') {
        createPost( htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['message']) );

    } elseif ($_GET['action'] == 'checkNumber') {
        checkNumber( htmlspecialchars($_POST['phone']) );

    } elseif ($_GET['action'] == 'checkMail') {
        checkMail( htmlspecialchars($_POST['mail']) );

    } elseif ($_GET['action'] == 'commentView') {
        commentsView();
    }

}  else {
    frontPageView();
    }

