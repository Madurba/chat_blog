<?php 
$title = 'mon blog falsh';

?>

<?php ob_start();?>

<body>
    

<form action="index.php?action=checkNumber" method="POST">
    <div class="mb-3">
        <label for="phone" class="form-label">Numéro de téléphone à tester</label>
        <textarea class="form-control mb-3" id="phone" name="phone" rows="3" placeholder="Tapez votre numéro..." ></textarea>
    </div>

    <div class="mb-3">
        <label for="mail" class="form-label">adresse email à tester</label>
        <textarea class="form-control mb-3" id="mail" name="mail" rows="3" placeholder="Tapez votre email..." ></textarea>
    </div>
    <button type="submit" class="btn btn-primary mb-3">tester le mail</button>
</form>



<h1 class="display-1">Résultat du test</h1>

<?php 
if ($check[0] === 1) {
    echo $number . ' est ok !';
} else {
    echo $number . ' est ko...';
}
?>



<?php var_dump($check) ?>


<?php $content = ob_get_clean();






require('view/frontend/template.php');
