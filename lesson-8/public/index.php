<?
use app\engine\Session;
use app\engine\Request;
use app\engine\TwigRender;
use app\models\repositories\UserRepository;
use app\models\entities\User;

try {
    include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
//include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/../vendor/Autoload.php";

//spl_autoload_register([new Autoload(), 'loadClass']);

    new Session();
    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'product';
    $actionName = $request->getActionName();

    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new TwigRender());
        $controller->runAction($actionName);
    } else {
        echo "Не правильный контроллер";
    }

//    $user = (new UserRepository())->getOne(22);
//    $user->setPass(password_hash("123", PASSWORD_DEFAULT));
//    (new UserRepository())->save($user);          // работает как задумывалось


//    $user = new User('test', '123');             // вписывает две строчки
//    (new UserRepository())->save($user);         // в бд с одинаковыми данными

} catch (\Exception $e) {
    var_dump($e->getTrace());
}


