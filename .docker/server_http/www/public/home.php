<?php include('header.php'); ?>
<div class="text-center">
    <h2 class="mb-4 text-primary fw-bold"><?= __("Envoyez votre CV on vous embauche !!!") ?></h2>
    <div class="alert alert-info d-inline-block shadow-sm">
        <?= __("Le flag est dans le fichier <b>flag.txt</b> à la racine du site !") ?>
    </div>
    <div class="mt-5">
        <a class="btn btn-primary btn-lg px-5 py-3" style="border-radius: 50px;" href="./index.php?page=rejoindre.php">
            <?= __("Nous rejoindre, envoyer votre CV ici") ?>
        </a>
    </div>
</div>
<?php include('footer.php'); ?>