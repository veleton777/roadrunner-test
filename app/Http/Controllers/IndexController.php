<?php

namespace App\Http\Controllers;

use App\Bot\Router\Router;
use Exception;


class IndexController extends Controller
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function getIndex()
    {
        try {
            $this->router->route();
            $this->router->run();
        } catch (Exception $e) {}

        return '';
    }
}
