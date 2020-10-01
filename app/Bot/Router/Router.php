<?php

namespace App\Bot\Router;

use App\Bot\Controllers\MainController;
use Viber\Bot;

class Router extends BaseRouter
{
    private $mainController;

    public function __construct(Bot $bot, MainController $mainController)
    {
        parent::__construct($bot);
        $this->mainController = $mainController;
    }

    public function route()
    {
        $this->addRoute('tel', $this->mainController, 'getMain');
        $this->addRoute('btn-click', $this->mainController, 'getClick');
        $this->addRoute('test', $this->mainController, 'getTest');
        $this->addRoute('get-viber', $this->mainController, 'getViberId');
    }
}
