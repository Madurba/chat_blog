<?php 
$title = 'mon blog falsh';

?>

<?php ob_start();?>

<body>
    

<form action="index.php?action=checkNumber" method="POST">
    <div class="mb-3">
        <label for="phone" class="form-label">Numéro de téléphone à tester</label>
        <input type="text" class="form-control mb-3" id="phone" name="phone" rows="3" placeholder="Tapez votre numéro..." ></input>
    </div>
    <button type="submit" class="btn btn-primary mb-3">tester le numéro</button>

</form>
<form action="index.php?action=checkMail" method="POST">
    <div class="mb-3">
        <label for="mail" class="form-label">Adresse email à tester</label>
        <input type="text" class="form-control mb-3" id="mail" name="mail" rows="3" placeholder="Tapez votre email..." ></input>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Tester le mail</button>
</form>



<h1 class="display-1">Résultat du test</h1>

<!-- if $check !isset = ne pas afficher les echo -->
<?php
    if ($check === 1) {
        echo "<script>alert('$input . est valide !');</script>";
    } elseif ($check === 0) {
        echo "<script>alert('$input . n\'est pas valide...');</script>";
    }
  ?>


<a href="index.php">Retour Home</a>


<?php $content = ob_get_clean();

require('view/frontend/template.php');
