<?php
error_reporting(0);
ini_set('display_errors', 0);

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['SERVER_NAME'];
$port = $_SERVER['SERVER_PORT'];

// Ajouter le port uniquement s'il est non standard
if (($protocol === "http://" && $port != 80) || ($protocol === "https://" && $port != 443)) {
    $host .= ':' . $port;
}
$proxyHttp = $_SERVER['HTTP_X_FORWARDED_PREFIX_PROXY'] ?? '';
if (preg_match('/^[a-zA-Z0-9_-]+$/', $proxyHttp)) {
    $baseUrl = $_SERVER['HTTP_X_FORWARDED_PREFIX_PROXY'];
} else {
    $baseUrl = $protocol.$host ?? '';
}
define('URL_BASE', $baseUrl);


// On securise le cookie de session (PHPSESSID)
session_set_cookie_params(60*60, null, null, false, true);

require '../vendor/autoload.php';

$kernel = new Yoop\Kernel();
(new Yoop\Database\Wait)->tryMySQL();


function __(string $trad, array $p=[]) { global $kernel; return $kernel->__($trad, $p); }

$router = $kernel->getRouter();
$router->load('/app/routes.php');
$router->run($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);