<?php
error_reporting(0);
ini_set('display_errors', 0);
stream_wrapper_unregister("http");
stream_wrapper_unregister("https");

$_ENV['DEFAULT_CTF_FLAG'] = '0717251325908a4ac004cc7e8be0440b37d76eed';

// On securise le cookie de session (PHPSESSID)
session_set_cookie_params(60 * 60, null, null, false, true);

require '../vendor/autoload.php';

$kernel = new Yoop\Kernel();
(new Yoop\Database\Wait)->tryMySQL();


$csp = $kernel->contentSecurityPolicy();
$csp->enableStrictMode(false);
$csp->addStyleSrc(['https://fonts.googleapis.com', 'https://fonts.googleapis.com/css2']);
$csp->addFontSrc(['https://fonts.gstatic.com']);
$csp->addScriptSrc(["'unsafe-inline'"]);

function __(string $trad, array $p = [])
{
    global $kernel;
    return $kernel->__($trad, $p);
}

$router = $kernel->getRouter();
$router->load('/app/routes.php');
$router->run($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);