<?

use app\models\Product, app\engine\Db, app\interfaces\IModel, app\models\User;


include_once "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());
echo $product->getOne(3);

$user = new User(new Db());
echo $user->getAll();



function foo(IModel $model) {

}