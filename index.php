<?php

require ('controller/frontend.php');

if ( isset($_GET['action']) ) {
    if ( $_GET['action'] == 'listMessagesView' ) {
        frontPageView();

    } elseif ($_GET['action'] == 'messageView') {
        if ( isset( $_GET['id'] ) && $_GET['id'] > 0 ) {
            messageView();
        } else {
            echo 'Erreur : aucun id de message envoyé...';
        }

    } elseif ($_GET['action'] == 'createPost') {
        createPost($_GET['pseudo'], $_GET['message']);

    } elseif ($_GET['action'] == 'checkNumber') {
        checkNumber( $_POST['phone'], ($_POST['mail']) ); var_dump($_POST);

    } elseif ($_GET['action'] == 'checkMail') {
        checkMail($_POST['mail']);
    }

}  else {
    frontPageView();
    }

