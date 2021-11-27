<?php 
$title = 'Commentaire de ' . $comment['author'];
?>

<?php ob_start(); ?>
<h1 class="display-1 text-center mb-5" >Mon super chat !</h1>
<h2 class="display-5 text-center mb-3">Modifier le commentaire de <?php echo $comment['author']; ?></h2>

<form action="index.php?action=" method="POST">
    <div class="mb-3">
        <label for="comment" class="form-label" hidden >Commentaire</label>
        <textarea class="form-control mb-3" id="comment" name="comment" rows="3"><?php echo $comment['comment']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-danger mb-3">Modifier</button>
</form>

<div class="card-body">
    <a href="index.php" class="card-link" style="float:right;color:red">Retour acceuil</a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>