<?
use app\models\{Basket, Product, User};
use app\engine\Db;

session_start();

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

var_dump(session_id());
die();

// $controllerName = $_GET['c'] ?: 'product';
// $actionName = $_GET['a'];

// $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName)  . "Controller";

// if (class_exists($controllerClass)) {
//     $controller = new $controllerClass();
//     $controller->runAction($actionName);
// } else {
//     echo "Не правильный контроллер";
// }




/**
 * @var Product $product
 */

// $product = new Product("Сникерс", "Вкусный", 12);
//$product->save();
//$product->delete();

// $product = Product::getOne(3);

// $product->setName("Шоколад2");
// $product->setDescription("Горький");
// $product->setPrice(40);
// var_dump(($product));
// $product->save();


//var_dump(get_class_methods($product));

