<?php
 
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['SERVER_NAME'];
$port = $_SERVER['SERVER_PORT'];

// Ajouter le port uniquement s'il est non standard
if (($protocol === "http://" && $port != 80) || ($protocol === "https://" && $port != 443)) {
    $host .= ':' . $port;
}

define('URL_BASE', $protocol . $host);


// On securise le cookie de session (PHPSESSID)
session_set_cookie_params(60*60, null, null, false, true);

require '../vendor/autoload.php';

$kernel = new Yoop\Kernel();
(new Yoop\Database\Wait)->tryMySQL();


function __(string $trad, array $p=[]) { global $kernel; return $kernel->__($trad, $p); }

$router = $kernel->getRouter();
$router->load('/app/routes.php');
$router->run($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);