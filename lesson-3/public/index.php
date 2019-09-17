<?

use app\models\{Basket, Product, User};
use app\engine\Db;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);




// $test = new User();
// $test->login = 'test';
// $test->pass = '123';
// var_dump($test);
// $test->insert();


// $product = new Product();
// $product->name = 'mouse';
// $product->description = 'pc accesories';
// $product->price = 50;
// var_dump($product);
// $product->insert();

// var_dump($product->getOne(1));


