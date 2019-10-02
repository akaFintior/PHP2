<?
use app\engine\Session;
use app\engine\Request;
use app\engine\TwigRender;

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
} catch (\Exception $e) {
    var_dump($e->getTrace());
}


