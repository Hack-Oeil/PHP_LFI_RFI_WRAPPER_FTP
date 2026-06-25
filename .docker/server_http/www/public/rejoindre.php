<?php
if(sizeof($_POST) && sizeof($_FILES)) {
    if(empty($_POST['lastname']) || !is_string($_POST['lastname']) 
        || empty($_POST['firstname']) || !is_string($_POST['firstname']) 
        || !isset($_FILES['cv']) || empty($_FILES['cv']['tmp_name'])
    ) {
        $error = __("Tous les champs sont obligatoires");
    }
    else {
        // Connexion FTP
        $conn = ftp_connect($_ENV['FTP_HOST']);
        if(!$conn) exit(__("La connexion au serveur FTP a échouée !"));
        
        // Authentification FTP
        $login = ftp_login($conn, $_ENV['FTP_USER'], $_ENV['FTP_PASSWORD']);
        if (!$login) exit(__("L'authentification au serveur FTP a échouée !"));
    
        // Activation du mode passif
        ftp_set_option($conn, FTP_USEPASVADDRESS, false); 
        $passivMode = ftp_pasv($conn, true);
        if(!$passivMode) exit(__("L'authentification au serveur FTP a échouée !"));

        // Envoi du fichier
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $fileExtension = strtolower(pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION));
        $filetype = finfo_file($finfo, $_FILES['cv']['tmp_name']);
        if($filetype == 'application/pdf' && $fileExtension == 'pdf') {
            if (ftp_put($conn, $_FILES['cv']['name'], $_FILES['cv']['tmp_name'], FTP_BINARY)) {
                $success = __(
                    "Nous avons bien reçu votre CV (<b>{{filename}}</b>), nous l'avons précieusement stoqué sur notre <b>serveur FTP !</b>", 
                    [ "filename" => htmlspecialchars($_FILES['cv']['name'])]
                );
            }
        } else {
            $error = __("Votre CV doit être au format PDF !");
        }
        finfo_close($finfo);
        // Fermeture de la connexion FTP
        ftp_close($conn);
    }
}
?>
<?php include('header.php'); ?>
<div class="text-center mb-4">
    <h2 class="fw-bold" style="color: #2c3e50;"><?= __("Vous voulez nous rejoindre ?") ?></h2>
    <p class="text-muted fs-5"><?= __("Envoyez votre candidature !") ?></p>
</div>

<?php if(!empty($error)) : ?>
<div class="alert alert-danger shadow-sm mb-4" role="alert">
    <strong>Oops!</strong> <?= $error ?>
</div>
<?php endif; ?>

<?php if(!empty($success)) : ?>
<div class="alert alert-success shadow-sm mb-4" role="alert">
    <strong>Succès!</strong> <?= $success ?>
</div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data" class="mt-4">
    <div class="row">
        <div class="col-md-6 mb-4">
            <label class="form-label fw-bold" for="firstname" style="color: #555;"><?= __("Prénom") ?></label>
            <input class="form-control form-control-lg" type="text" name="firstname" placeholder="<?= __("Votre prénom") ?>" required>
        </div>
        <div class="col-md-6 mb-4">
            <label class="form-label fw-bold" for="lastname" style="color: #555;"><?= __("Nom") ?></label>
            <input class="form-control form-control-lg" type="text" name="lastname" placeholder="<?= __("Votre nom") ?>" required>
        </div>
    </div>
    <div class="mb-5">
        <label class="form-label fw-bold" for="cv" style="color: #555;"><?= __("CV") ?> (PDF)</label>
        <input class="form-control form-control-lg" type="file" name="cv" accept="application/pdf" required style="cursor: pointer;">
    </div>
    <div class="text-center mt-2">
        <button class="btn btn-primary btn-lg px-5 w-100" type="submit">
            <span class="fw-bold"><?= __("Envoyer ma candidature") ?></span>
        </button>
    </div>
</form>
<?php include('footer.php'); ?>

