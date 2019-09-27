<?php

namespace app\engine;

use app\interfaces\IRenderer;

class TwigRender implements IRenderer
{
    public $menu = [
        [
            "src" => "/",
            "name" => "Главная"
        ],
        [
            "src" => "/?c=product&a=catalog",
            "name" => "Каталог"
        ],
        [
            "src" => "/?c=basket&a=catalog",
            "name" => "Корзина"
        ]
    ];
    public function renderTemplate($template, $params = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . "/../twigtemplates");
        $twig = new \Twig\Environment($loader);
        $template = $template . '.tmpl';
        $params["menu"] = $this->menu;
        echo $twig->render($template, $params);
    }
}