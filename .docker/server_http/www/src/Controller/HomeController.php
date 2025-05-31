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
        $page = (!empty($_GET['page']) && is_string($_GET['page'])?$_GET['page'] : 'home.php');
        if(file_exists($page) && is_file($page)
            && $page!=='index.php' 
            && $page !== __DIR__.'/index.php' 
            && $page !== __DIR__.'/flag.txt' 
            && $page !== dirname(__DIR__).'/flag.txt' 
            && md5_file($page)!=='b7d81f93280e203b364866e661c8bff0' 
            && md5_file($page)!=='9a0f1af743510a44e86ebf89aef8b2e4' 
            && md5_file($page)!=='789e1bacbfdb17d210d8938a34f2be0d'
            && strpos($page, "flag.txt") === false           
        ) {
            include($page); 
        } elseif(file_exists($page) && is_file($page)) {
            header("HTTP/1.1 403 Forbidden");
            echo 'Accès non autorisé, pour ce challenge ;-)';
        } else {
             header("HTTP/1.1 404 Not Found");
            echo 'Page non trouvée';
        }
    }
}
