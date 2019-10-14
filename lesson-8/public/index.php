<?

use app\engine\App;

require_once "../vendor/autoload.php";
$config = include __DIR__ . "/../config/config.php";

try {
    App::call()->run($config);
    App::call()->session;
} catch (Exception $e) {
    var_dump($e->getTrace());
}


