<?php 
$title = 'Message de ' . $message['pseudo'];
?>

<?php ob_start(); ?>
<h1 class="display-1 text-center mb-5" >Mon super chat !</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?php echo $message['pseudo'] ?></h5>
        <p class="card-text"><?php echo $message['message'] ?></p>
    </div>
    

    <?php
    while ( $comment = $comments->fetch() ) {
    ?>


    <ul class="list-group list-group-flush">
        <p style="padding:20px 20px 0 20px;margin-left:15px;"><strong><?php echo $comment['author'] ?></strong> à répondu :</p>
        <li class="list-group-item" style="margin-left:15px;"><?php echo $comment['comment'] ?></li>
        <div style="padding:10px 10px 10px 10px;">
        <a href="index.php?action=commentView&amp;id=<?php echo $comment['id'];?>">Modifier le commentaire</a>
        <a href="#" class="card-link" style="margin-left:15px">Répondre</a>
        </div>
    </ul>
    <?php 
    }
    ?>
</div>
<div class="card-body">
    <a href="index.php" class="card-link" style="float:right;color:red">Retour acceuil</a>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>