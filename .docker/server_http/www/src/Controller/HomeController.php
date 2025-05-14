<?php
 
namespace App\Controller;

use App\Entity\User;

use App\Service\Level0;
use Yoop\AbstractController;
use App\Service\ControlLevel;

class HomeController extends AbstractController
{
    public function print() 
    {
        $page = $_GET['page']??'home.php';
        if( file_exists($page) 
            && $page!=='index.php' 
            && $page !== __DIR__.'/index.php' 
            && $page !== __DIR__.'/flag.txt' 
            && $page !== dirname(__DIR__).'/flag.txt' 
            && md5_file($page)!=='b7d81f93280e203b364866e661c8bff0' 
            && md5_file($page)!=='9a0f1af743510a44e86ebf89aef8b2e4' 
        
        ) {
            include($page); 
        } else {
            if( file_exists($page)) {
                header("HTTP/1.1 403 Forbidden");
                echo 'Accès non autorisé, pour ce challenge ;-)';
            } else {
                header("HTTP/1.1 404 Not Found");
                echo 'Page non trouvée';
            }
        }
    }
}
