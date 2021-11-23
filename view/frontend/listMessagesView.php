<?php $title = 'Mon super chat !'; ?>

<?php ob_start(); ?>
<a href="index.php" style="text-decoration:none; color:#212529;"><h1 class="display-1 text-center mb-5">Mon super chat !</h1></a>

<!--formulaire listView-->
<form action="index.php?action=createPost" method="POST">
    <div class="mb-3">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudonyme">
    </div>
    
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control mb-3" id="message" name="message" rows="3" placeholder="Tapez votre message..." ></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Poster</button>
</form>

<div class="border border-3 rounded-3" style="padding:20px; margin: 50px 0 50px 0;" >

<!-- boucle post view (données protégées par htmlspecialchars) -->
    <?php
    while ( $dataChat = $messagesStatement->fetch() ) {
    ?>

    <div style="margin-bottom: 30px;">
        <p><strong><?php echo htmlspecialchars($dataChat['pseudo'])?></strong><span style="font-style:italic"> à écrit :</span></p>
        <p><?php echo htmlspecialchars($dataChat['message'])?></p>
        <a href="index.php?action=messageView&amp;id=<?php echo $dataChat['id']; ?>">afficher les commentaires</a>
    </div>
    <?php
    }
    $messagesStatement->closeCursor();
    ?>
</div>

<h2 class="display-4 text-center mb-5 mt-5">Vérifier mes informations...</h2>

<!--checkPhoneNumber-->
<form method="GET">
    <div id="ancre" class="mb-3">
        <label for="phone" class="form-label">Téléphone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="numéro de téléphone à tester">
    </div>
    <button type="submit" class="btn btn-primary mb-3">Tester phone</button>
</form>

<!--checkPhone-->
<?php
if ( isset($_GET['phone']) ) {
    $_GET['phone'] = htmlspecialchars($_GET['phone']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

    if ( preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_GET['phone']) ) {
        echo 'Le numéro ' . $_GET['phone'] . ' est <strong>valide</strong> !';
    } else {
        echo 'Le numéro ' . $_GET['phone'] . ' n\'est pas valide, recommencez !';
    }
}
?>


<!--checkEmail-->
<form action="#ancre" method="GET">
    <div id="ancre" class="mb-3">
        <label for="mail" class="form-label">Email</label>
        <input type="text" class="form-control" id="mail" name="mail" placeholder="adresse email à tester">
    </div>
    <button type="submit" class="btn btn-primary mb-3">Tester mail</button>
</form>

<!--script verif mail-->
<?php
if ( isset($_GET['mail']) ) {
    $_GET['mail'] = htmlspecialchars($_GET['mail']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

    if ( preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_GET['mail']) ) {
        echo 'L\'adresse ' . $_GET['mail'] . ' est <strong>valide</strong> !';
    } else {
        echo 'L\'adresse ' . $_GET['mail'] . ' n\'est pas valide, recommencez !';
    }
}
?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>