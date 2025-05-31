<?php
if(sizeof($_POST) && sizeof($_FILES)) {
    if(empty($_POST['lastname']) || empty($_POST['firtsname']) || !isset($_FILES['cv']) || empty($_FILES['cv']['tmp_name'])) {
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
<h3><?= __("Vous voulez nous rejoindre ?") ?></h3>
<p><?= __("Envoyez votre candidature !") ?></p>
<?php if(!empty($error)) : ?>
<div class="alert alert-danger" role="alert"><?= $error ?></div>
<?php endif; ?>
<?php if(!empty($success)) : ?>
<div class="alert alert-success" role="success"><?= $success ?></div>
<?php endif; ?>
<form action="<?= $proxyUrl; ?>/?page=rejoindre.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label" for="lastname"><?= __("Nom") ?></label>
        <input class="form-control" type="text" name="lastname">
    </div>
    <div class="mb-3">
        <label class="form-label" for="firtsname"><?= __("Prénom") ?></label>
        <input class="form-control" type="text" name="firtsname">
    </div>
    <div class="mb-3">
        <label class="form-label" for="cv"><?= __("CV") ?></label>
        <input class="form-control" type="file" name="cv" accept="application/pdf">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="<?= __("Envoyer ma candidature") ?>">
    </div>
</form>
<?php include('footer.php'); ?>

