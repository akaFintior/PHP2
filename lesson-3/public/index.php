<?

use app\models\{Basket, Product, User};
use app\engine\Db;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);




$test = new User('test', '123');
$test->insert();
$test->update('newName', '123');

// $test->delete(3);

// $product = new Product("Keyboard", "pc accesories", 30);
// var_dump($product);

// $product->insert();
// $product->delete();
// var_dump($product->getOne(1));
// $product->update("Keyboard", "pc accesories", 25, 12);
