<?php $title = 'Mon super chat !'; ?>

<?php ob_start(); ?>
<a href="index.php" style="text-decoration:none; color:#212529;"><h1 class="display-1 text-center mb-5">Mon super chat !</h1></a>

<div style="margin:10px 0 30px 0;">
<a href="testView.php"><button type="button" formaction="index.php?action=checkNumber">Tester un format</button></a>
</div>

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
<!-- boucle post view (data protected by htmlspecialchars on router) -->
    <?php
    while ( $dataChat = $messagesStatement->fetch() ) {
    ?>
    <div style="margin-bottom: 30px;">
        <p><strong><?php echo $dataChat['pseudo']?></strong><span style="font-style:italic"> à écrit :</span></p>
        <p><?php echo $dataChat['message']?></p>
        <div>
        <a href="index.php?action=postView&amp;id=<?php echo $dataChat['id']; ?>"><?php if (isset($commentsStatement)):echo ('afficher les commentaires'); endif; var_dump($commentsStatement);?></a>
        </div>
    </div>
    <?php
    }
    $messagesStatement->closeCursor();
    ?>
</div>

<h2 class="display-4 text-center mb-5 mt-5">Have good day !</h2>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>