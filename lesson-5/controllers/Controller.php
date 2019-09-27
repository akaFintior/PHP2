<?php


namespace app\controllers;

use app\engine\Render;
use app\interfaces\IRenderer;

abstract class Controller
{
    private $action;
    private $defaultAction = "index";
    private $layout = 'main';
//    private $useLayouts = true;
    private $renderer;

    public function runAction($action = null) {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            var_dump($method);
            echo "404";
        }
    }
    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function render($template, $params = []) {
        if ($this->renderer instanceof Render) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'content' => $this->renderTemplate($template, $params),
                'menu' => $this->renderTemplate('menu')
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->renderer->renderTemplate($template, $params);
    }
}