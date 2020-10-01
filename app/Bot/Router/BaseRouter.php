<?php

namespace App\Bot\Router;

use Viber\Bot;

class BaseRouter
{
    private $bot;

    public function __construct(Bot $bot)
    {
        $this->bot = $bot;
    }

    public function addRoute(string $command, $controller, string $method)
    {
        $this->bot->onText('|^' . $command . '$|', function ($event) use ($controller, $method) {
            call_user_func_array([$controller, $method], [$event]);
        });
    }

    public function run()
    {
        $this->bot->run();
    }
}
